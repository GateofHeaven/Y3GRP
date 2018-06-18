<?php
class Good_model extends CI_Model  {
	public function __construct()
        {
            parent::__construct();
        }
	//Goods 'status'=>0:ban 1:normal 2:locked 3:Dealing 4 Finish.
	//ex_record 'active'=> 0:match 1:confirm 2:dealing 3:cancel 4:finish.
	
    public function bangood()
	{
		$data=array('status'=>'0');
		$where=$this->input->get_post('banid', TRUE);
		
		$this->db->update('Goods',$data,"goodid=$where");
	}
	
	public function lockgood($where){
		$data=array('status'=>'2');
		$this->db->update('Goods',$data,"goodid=$where");
	}
	
	public function getexidbysubid($sid){
		$query=$this->db->get_where('Exchange_record',array('subid'=>$sid));
		$checkid=$query->row();
		return $checkid->exid;
	}
	
	public function confrim($where,$recordid){//goodid,subid//true:all confrimed turn to dealing. False:not all confrim
		$data2=array('active'=>'1');
		$this->db->update('Exchange_record',$data2,"subid=$recordid");
		//
		//
		$cheid=$this->Good_model->getexidbysubid($recordid);
		$query=$this->db->get_where('Exchange_record',array('exid'=>$cheid));
		$rows=$query->result_array();
		foreach ($rows as $row){
			if ($row['active']!=1){
				return FALSE;
				//not all confrim.
			}
		}
		$data3=array('active'=>'2');
		$this->db->update('Exchange_record',$data3,"exid=$cheid");//ex_record =>dealing
		$data4=array('status'=>'3');
		foreach ($rows as $row){
			//$this->db->update('Exchange_record',$data3,"subid=$row['subid']");
			$this->db->update('Goods',$data4,array('goodid'=>$row['goodid']));//good Lock =>dealing
		}
		return TRUE;
	}
	
	public function cancel($where,$recordid){
		$data=array('status'=>'1','matchtime'=>time());
		$this->db->update('Goods',$data,"goodid=$where");
		$cheid=$this->Good_model->getexidbysubid($recordid);
		$query=$this->db->get_where('Exchange_record',array('exid'=>$cheid));
		$rows=$query->result_array();
		$data2=array('active'=>'3');
		$data3=array('status'=>'1');
		foreach ($rows as $row){
			$this->db->update('Exchange_record',$data2,array('subid'=>$row['subid']));
			$this->db->update('Goods',$data3,array('goodid'=>$row['goodid']));
		}
	}
	
	public function searchlike($name){
		$this->db->where('status', '1');
		$this->db->like('name',$name,'both');
		$query=$this->db->get('Goods');
		return $query->result_array();
	}
	public function getbyitem($item){
		$this->db->where('status', '1');
		$this->db->where('item', $item);
		$query=$this->db->get('Goods');
		return $query->result_array();
	}
	public function getallnormal(){
		$this->db->where('status', '1');
		$query=$this->db->get('Goods');
		return $query->result_array();
	}
	public function findgbyid($gid){
		$query=$this->db->get_where('Goods',array('goodid'=>$gid));
		return $query->row_array();
	}
	
	public function match($have,$except,$arr)
	{	
		if (count($arr)>=6){
			return FALSE;
		}
		$this->db->where('status', '1');
		$this->db->like('e_name',$have,'both');
		$query=$this->db->get('Goods');
		
		
		
		
		//$query=$this->db->get_where('Goods',array('e_name'=>$have,'status'=>'1'));
		if ($query->num_rows()==0){
			return FALSE;
		}
		$rows=$query->result_array();
		foreach ($rows as $row){
			if (strstr($except,$row['name'])||$row['name']==$except){
				array_push($arr,$row['goodid']);
				$query->free_result();
				return $arr;
			}
		}
		$query->free_result();
		//$sql="SELECT * FROM Goods WHERE e_name= ? and status=1 ORDER BY matchtime ASC;";
		$this->db->where('status', '1');
		$this->db->like('e_name',$have,'both');
		$this->db->order_by('matchtime','ASC');
		$query2=$this->db->get('Goods');
		//$query2=$this->db->query($sql,array($have));
		$nextmatch=$query2->row();
		//orderby***
		array_push($arr,$nextmatch->goodid);
		//array_push
		$query2->free_result();
		return $this->Good_model->match($nextmatch->name,$except,$arr);
		
	}
	public function getgoodbyid($gid){
		$query=$this->db->get_where('Goods',array('goodid'=>$gid));
		return $query->row();
	}
	public function getgoodbyowner($oid){
		$query=$this->db->get_where('Goods',array('ownerid'=>$oid));
		return $query->result();
	}
	public function getgoodbysubid($sid){
		$query=$this->db->get_where('Exchange_record',array('subid'=>$sid));
		return $query->row();
	}
	public function createresult($arr){
		$exid=date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
		$last=count($arr);
		$giver=$this->Good_model->getgoodbyid($arr[$last-1]);
		for($x=0;$x<count($arr);$x++){
			$this->Good_model->lockgood($arr[$x]);
			$data=array(
				'exid'=>$exid,
				'goodid'=>$giver->goodid,
				'sender_userid'=>$giver->ownerid,
				'receiver_userid'=>$this->Good_model->getgoodbyid($arr[$x])->ownerid,
				'time_ready'=>time()
			);
			$this->db->insert('Exchange_record', $data);
			$giver=$this->Good_model->getgoodbyid($arr[$x]);
		}
	}
	public function finish($subid){
		$data=array('active'=>'4','time_ready'=>time());
		$this->db->update('Exchange_record',$data,array('subid'=>$subid));
		$data2=array('status'=>'4');
		$this->db->update('Goods',$data2,array('goodid'=>$this->Good_model->getgoodbysubid($subid)->goodid));
			
	}
	public function insert($arr,$arr1)
	{
		$this->db->insert('Goods',$arr);
		$data = $this->db->query('SELECT max(goodid) FROM Goods')->result_array();
		$arr2['goodid'] = $data[0]['max(goodid)'];
		$size = count($arr1);
		for ($i = 0; $i < $size; $i ++ ) {
			$arr2['imgPath'] = $arr1[$i];
			$this->db->insert('imgPath',$arr2);
		}

		return $arr2['goodid'];
	}
	public function getoneimgurl($goodid){
		$query=$this->db->get_where('imgPath',array('goodid'=>$goodid));
		if ($query->row()){
			return $query->row()->imgPath;
		}else{
			return "assets/img/error.jpg";
		}
	}
	public function getallimg($goodid){
		$query=$this->db->get_where('imgPath',array('goodid'=>$goodid));
		return $query->result_array();
	}
}
?>
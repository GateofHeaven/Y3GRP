<?php
class Record_model extends CI_Model  {
	public function __construct()
        {
            parent::__construct();
        }
	//Goods 'status'=>0:ban 1:normal 2:locked 3:Dealing 4 Finish.
	//ex_record 'active'=> 0:match 1:confirm 2:dealing 3:cancel 4:finish.
	public function getmatchresult($uid){
		$sql="select * from Exchange_record where active in ? and receiver_userid = ? order by active";
		$query=$this->db->query($sql,array(array(0,1),$uid));
		return $query->result_array();
	}
	public function getgoodbyownerexid($owner,$exid){
		$query=$this->db->get_where('Exchange_record',array('sender_userid'=>$owner,'exid'=>$exid));
		return $query->row();
	}
	public function getunfinishtrade($uid){
		$sql="select * from Exchange_record where active in ? and receiver_userid = ? order by active";
		$query=$this->db->query($sql,array(array(2),$uid));
		return $query->result_array();
	}
	public function getfinishedtrade($uid){
		$sql="select * from Exchange_record where active in ? and receiver_userid = ? order by active";
		$query=$this->db->query($sql,array(array(4),$uid));
		return $query->result_array();
	}
}
?>
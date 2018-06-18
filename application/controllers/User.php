<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        // Your own constructor code
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->model('Good_model');
		$this->load->model('User_model');
		$this->load->model('Record_model');
		if (!isset($_SESSION['username'])){
			redirect('/Backyard/index');
		}
		
    }
	public function mygoods(){
		$data['list']=$this->input->get_post('banid', TRUE);
		if (isset($data['list'])){
			$this->Good_model->bangood();
		}
		$this->load->view('Backyard/header');
		$this->load->view('Backyard/sidemenu');
		$this->load->view('Backyard/mygoods');
	}
	public function deletegood(){
		
	}
	public function matchresult(){
		
		$this->load->view('Backyard/header');
		$this->load->view('Backyard/sidemenu');
		$this->load->view('Backyard/mresult');
	}
	public function myinfo(){
		$this->load->view('Backyard/header');
		$this->load->view('Backyard/sidemenu');
		$this->load->view('Backyard/myinfo');
	}
	public function mytrade(){
		$this->load->view('Backyard/header');
		$this->load->view('Backyard/sidemenu');
		$this->load->view('Backyard/mytrade');
	}
	public function confrim(){
		$rid=$this->input->get_post('rid', TRUE);
		$gid=$this->input->get_post('gid', TRUE);
		if ($this->Good_model->confrim($gid,$rid)){
			redirect('/User/mytrade');
		}else{
			redirect('/User/matchresult');
		}
	}
	public function cancel(){
		$rid=$this->input->get_post('rid', TRUE);
		$gid=$this->input->get_post('gid', TRUE);
		$this->Good_model->cancel($gid,$rid);
		redirect('/User/matchresult');
	}
	public function finish(){
		$rid=$this->input->get_post('rid', TRUE);
		$this->Good_model->finish($rid);
		redirect('/User/mytrade');
	}
	public function upload(){
		$this->load->view('Backyard/header');
		$this->load->view('Backyard/sidemenu');
		$this->load->view('Backyard/upload');
	}

	public function do_upload()
    {
        
        $name = $_POST['Ntitle'];
        $arr['name'] = $name;
        echo $name. "<br>";

        $classify = $_POST['classify'];     
        $tmp = 0;
        if(strcmp($classify,"clothing")== 0){$tmp = 1;}
        if(strcmp($classify,"staple")== 0){$tmp = 2;}
        if(strcmp($classify,"cosmetics")== 0){$tmp = 3;}
        if(strcmp($classify,"medicine")== 0){$tmp = 4;}
        if(strcmp($classify,"jewelry")== 0){$tmp = 5;}
        if(strcmp($classify,"digital")== 0){$tmp = 6;}
        if(strcmp($classify,"electrical")== 0){$tmp = 7;}
        $arr['item'] = $tmp;
        echo $classify. $arr['item']."<br>";

        $price1 = $_POST['Oprice'];
        $arr['value'] = $price1;//item purchase price
        echo $price1. "<br>";

        $price2 = $_POST['Oprice2'];
        $arr['value_estm'] = $price2;//item estimated price
        echo $price2. "<br>";

        $Bdate = $_POST['Bdate'];
        $arr['buy_time'] = $Bdate;//purchase date
        echo $Bdate. "<br>";

        $arr['lasttime'] = time();//match time

        $Oapproach = $_POST['Oapproach'];
        $arr['item_appor'] = $Oapproach;
        echo $Oapproach. "<br>";

        $classificationss = $_POST['classify2'];
        if(strcmp($classificationss,"clothing")== 0){$tmp = 1;}
        if(strcmp($classificationss,"staple goods")== 0){$tmp = 2;}
        if(strcmp($classificationss,"cosmetics")== 0){$tmp = 3;}
        if(strcmp($classificationss,"medicine")== 0){$tmp = 4;}
        if(strcmp($classificationss,"jewelry")== 0){$tmp = 5;}
        if(strcmp($classificationss,"digital")== 0){$tmp = 6;}
        if(strcmp($classificationss,"electrical")== 0){$tmp = 7;}
        $arr['e_item'] = $tmp;
        echo $classificationss. $arr['e_item']."<br>";

        $arr['e_name'] = $_POST['e_name'];
        echo $arr['e_name']. "<br>";


        $arr['ownerid'] = $_SESSION['id'];
        
        $config['upload_path']      = 'uploads/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']     = 0;
        $config['max_width']        = 1024;
        $config['max_height']       = 768;

        $this->load->library('upload', $config);
        $arr1 = array();
        $this->upload->initialize($config);// 重点
        foreach($_FILES as $key=>$value)
        {
            
            $filename = $_FILES[$key]['name'];
            array_push($arr1,'uploads/'.$filename);
            $tmp = explode('.', $filename);
            $ext = $tmp[count($tmp) - 1];//获取文件后缀
                                /*组合$config*/
            $this->upload->do_upload($key);
                                //$info[$key] = $config['file_name'];
        }

        $this->load->model('Good_model');
        $mstr=$this->Good_model->insert($arr,$arr1);
		//match
		$new=array();	
		array_push($new,$mstr);
		$have=$arr['name'];
		$except=$arr['e_name'];
		$data['matchlist']=$this->Good_model->match($have,$except,$new);
		if ($data['matchlist']){
		$this->Good_model->createresult($data['matchlist']);
		redirect('/User/matchresult');
		}
		else{
		redirect('/User/mygoods');
		}
        // if ( ! $this->upload->do_upload('userfile'))
        // {
        //     $error = array('error' => $this->upload->display_errors());

        //     $this->load->view('upload_form', $error);
        // }
        // else
        // {
        //     $data = array('upload_data' => $this->upload->data());
        //     // $this->load->view('upload_success', $data); // use upload_success

        //     // $data['upload_data'] = $this->upload->data(); //上传文件的一些信息
        //     $img = $data['upload_data']['file_name']; //取得文件名
        //     echo "---------------<br>";
        //     echo $img . "<br>";
        //     foreach ($data['upload_data'] as $item => $value) {
        //         echo $item . ":" . $value . "<br>";
        //     }
        // }
    }
}
?>
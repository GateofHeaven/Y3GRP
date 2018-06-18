<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backyard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->view('Backyard/header');
		$this->load->view('Backyard/main');
	//main page 	
	}
	public function register(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');

		$this->load->database();
		$this->form_validation->set_rules('username', 'Username', 'required|max_length[12]|is_unique[User.username]',array('is_unique'=>'User arleady exsist'));
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('tel', 'tel', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('Backyard/header');
			$this->load->view('Backyard/main');
		}
		else
		{
			$this->load->model('user_model');
			$this->user_model->register();
			$this->load->library('session');
			$query=$this->db->get_where('User',array('username'=>$this->input->post('username')));
			$row=$query->row_array();
			$this->session->set_userdata($row);
			redirect('/Backyard/index');
		}
	}
	public function login(){
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('loginusername', 'Username', 'required');
		$this->form_validation->set_rules('loginpassword', 'Password', 'required');
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('Backyard/header');
			$this->load->view('Backyard/main');
			

		}
		else
		{
			$data['username']=$this->input->get_post('loginusername', TRUE);
			$data['password']=$this->input->get_post('loginpassword', TRUE);
			if ($data['username']=='admin'&&$data['password']=='admin'){
				redirect('admin/view');
			}
			$query=$this->db->get_where('User',array('username'=>$data['username']));
			if ($query->num_rows() == 0){
				//用户不存在
				$data['nouser']=1;
				$this->load->view('Backyard/header',$data);
				$this->load->view('Backyard/main');
				return;
			
			}
			$this->load->model('user_model');
			if ($this->user_model->login($data)){
				
				//密码正确
				$this->load->library('session');
				$row=$query->row_array();
				$this->session->set_userdata($row);
				redirect('/Backyard/index');

			}
			else{
				$data['passwrong']=1;
				$this->load->view('Backyard/header',$data);
				$this->load->view('Backyard/main');
			}
		}
	}

	public function search() {  
 
		$a = array('<foo>','<bar>','baz','&blong&');
		$text = $_POST['searchtext']; 
		$this->load->model('Search');
		$data = $this->Search->user_search($text);
		//echo("<script>console.log(".json_encode($array).");</script>");
		echo json_encode($data); 
		
		exit;
		/*大佬在这加一下和model的数据交换，后面的只是做显示测试、、*/
		/*if(!empty($text)){  
			if ($text=="<" ) {  
				echo json_encode(array('<foo>','<bar>'));  
				exit;  
			}else{  
				echo json_encode(array('<foo>','<bar>','baz','&blong&'));  
				exit;     
			}  
		}*/
	}
	public function logout(){
		$this->load->library('session');
		$this->session->sess_destroy();
		$this->load->helper('url');
		redirect('/Backyard/index');
	}
	
	public function goodlist(){
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Good_model');
		$data['searchby']=$this->input->get_post('searchCol', TRUE);
		if (isset($data['searchby'])){
			$data['goodlist']=$this->Good_model->searchlike($data['searchby']);
			$this->load->view('Backyard/header');
			$this->load->view('Backyard/goodlist',$data);
			return;
		}
		if ($this->uri->segment(3)){
			$data['goodlist']=$this->Good_model->getbyitem($this->uri->segment(3));
			$this->load->view('Backyard/header');
			$this->load->view('Backyard/goodlist',$data);
			return;
		}
		$data['goodlist']=$this->Good_model->getallnormal();
		$this->load->view('Backyard/header');
		$this->load->view('Backyard/goodlist',$data);
	}
	public function gooddetail(){
		$this->load->library('session');
		$this->load->database();
		$this->load->helper('form');
		$gid=$this->uri->segment(3);
		$this->load->model('Good_model');
		$this->load->model('User_model');
		$data= $this->Good_model->findgbyid($gid);
		if (!isset($data)){
			show_404();
		}
		$this->load->view('Backyard/header');
		$this->load->view('Backyard/gooddetail',$data);
		
	}
	public function help(){
		$this->load->library('session');
		$this->load->database();
		$this->load->helper('form');
		$this->load->view('Backyard/header');
		$this->load->view('Backyard/help');
	}
}

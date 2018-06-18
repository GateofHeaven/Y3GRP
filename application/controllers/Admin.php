<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	public function view()
	{
		$this->load->database();
		$this->load->view('/admin/header');
		$this->load->view('/admin/content');
	}
	public function userlist()
	{	
		$this->load->database();
		$data['list']=$this->input->get_post('banid', TRUE);
		$this->load->model('user_model');
		if (isset($data['list'])){
			$this->user_model->banuser();
		}
		$data['userlist']=$this->user_model->searchuser();
		$this->load->helper('form');
		$this->load->view('/admin/header');
		$this->load->view('/admin/userlist',$data);
	}
	public function userban()
	{	
		$this->load->database();
		$data['list']=$this->input->get_post('unblock', TRUE);
		$this->load->model('user_model');
		if (isset($data['list'])){
			$this->user_model->unblockuser();
		}
		$data['banlist']=$this->user_model->searchban();
		$this->load->helper('form');
		$this->load->view('/admin/header');
		$this->load->view('/admin/userban',$data);
	}
	public function goodlist()
	{	
		$this->load->database();
		$data['list']=$this->input->get_post('banid', TRUE);
		if (isset($data['list'])){
			$this->load->model('good_model');
			$this->good_model->bangood();
		}
		$this->load->helper('form');
		$this->load->view('/admin/header');
		$this->load->view('/admin/goodlist');
	}
	public function exrecord()
	{	
		$this->load->database();
		//$data['list']=$this->input->get_post('banid', TRUE);
		//if (isset($data['list'])){
		//	$this->load->model('good_model');
		//	$this->good_model->bangood();
		//}
		$this->load->helper('form');
		$this->load->view('/admin/header');
		$this->load->view('/admin/exchangerecord');
	}
}

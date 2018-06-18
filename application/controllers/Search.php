<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//header('Content-type:text/json'); 
class Search extends CI_Controller {

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
	public function index()
	{
		//$this->load->view('welcome_message');
	}


	public function search() {  
 
		$a = array('<foo>','<bar>','baz','&blong&');
		$text = $_POST['searchtext']; 
		$this->load->model('Search');
		$data = $this->Search->user_search($text);
		//echo("<script>console.log(".json_encode($array).");</script>");
		echo json_encode($a); 
		
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
}

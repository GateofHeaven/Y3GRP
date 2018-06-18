<?php
class Search extends CI_Model { 
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function user_search($arr)
	{
		if($arr != ""){
			$sql = "SELECT DISTINCT name FROM Goods WHERE name LIKE '%".$arr."%'";
			$data = $this->db->query($sql)->result_array();
			$data_column = array_column($data, 'name');
			
			return $data_column;
		}
	}

}
?>
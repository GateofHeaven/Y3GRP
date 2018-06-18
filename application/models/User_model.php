<?php
class User_model extends CI_Model  {
	public function __construct()
        {
            parent::__construct();
        }
	//User 'active'=>1:0 normal/banned.
    public function banuser()
	{
		$data=array('active'=>'0');
		$where=$this->input->get_post('banid', TRUE);
		
		$this->db->update('User',$data,"id=$where");
	}
	
	public function unblockuser()
	{
		$data=array('active'=>'1');
		$where=$this->input->get_post('unblock', TRUE);
		
		$this->db->update('User',$data,"id=$where");
	}
	public function searchuser(){
		$query=$this->db->query("select * from User;");
		return $query->result_array();
	}
	
	public function searchban(){
		$query=$this->db->query("select * from User where active=0;");
		return $query->result_array();
	}
	
	public function getuserbyid($uid){
		$query=$this->db->get_where('User',array('id'=>$uid));
		return $query->row();
	}
	public function register(){
		$data = array(
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'),
		'email'=>$this->input->post('email'),
		'tel'=>$this->input->post('tel')
    );
		$this->db->insert('User',$data);

	}
	
	public function get_by_username($username)
    {
        $query=$this->db->get_where('User',array('username'=>$username));
        //return $query->row();                            //不判断获得什么直接返回
        if ($query->num_rows() == 1)
        {
            return $query->row();
        }
        else
        {
            return FALSE;
        }
    }
     
    /**
      * 用户名不存在时,返回false
      * 用户名存在时，验证密码是否正确
      */
    function login($array)
    {                
        if($user = $this->get_by_username($array['username']))
        {
            return $user->password == $array['password'] ? TRUE : FALSE;
        }
         return FALSE;                                    //当用户名不存在时
    }
}
?>
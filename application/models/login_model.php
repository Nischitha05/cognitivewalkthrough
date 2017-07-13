<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {
	function login($username, $password){
		$this->db->select('adminid,firstname,lastname,email,username,password,level');
		$this->db->from('admin_table');
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()==1){
			return $query->result();
		} else{
			return false;
		}
	}
	function register(){
		$fn = $this->input->post('firstname');
		$ln = $this->input->post('lastname');
		$em = $this->input->post('email');
		$un = $this->input->post('username');
		$pw = md5($this->input->post('password'));
		$lvl = $this->input->post('level');
		$data = array(
			'adminid' => '',
			'firstname' => $fn,
			'lastname' => $ln,
			'email' => $em,
			'username' => $un,
			'password' => $pw,
			'level' => $lvl
		);
		$this->db->insert('admin_table', $data);
	}

	function savefeedback($questiondata){

		$this->db->insert('feedback', $questiondata);
	}

	function filename_exists($username)
	{
	    $this->db->select('*');
	    $this->db->from('admin_table');
	    $this->db->where('username', $username);
	    $query = $this->db->get();
	    $result = $query->result_array();
	    return $result;
	}

	public function getExpertFeedback(){
		return $this->db->select('feedback.*,admin_table.*')
																->from('feedback')
																->join('admin_table', 'admin_table.adminid = feedback.adminid')
																->where('admin_table.level',1)
																->get()
																->result();
	}

	public function getUserFeedback(){
		return $this->db->select('feedback.*,admin_table.*')
																->from('feedback')
																->join('admin_table', 'admin_table.adminid = feedback.adminid')
																->where('admin_table.level',2)
																->get()
																->result();
	}
}

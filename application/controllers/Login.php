<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	public function index()
	{
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required|callback_basisdata_cek');
		if($this->form_validation->run()==false){
			$this->load->view('login_view');
		} else{
			redirect(base_url('index.php/home'), 'refresh');
		}
	}
	function basisdata_cek($password){
		$username = $this->input->post('username');
		$result = $this->login->login($username,$password);
		if($result){
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = $arrayName = array('adminid' => $row->adminid, 'username' => $row->username, 'firstname' => $row->firstname, 'lastname' => $row->lastname,'email'=>$row->email,'level'=>$row->level);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return true;
		} else{
			$this->form_validation->set_message('basisdata_cek', 'Invalid username or password ');
			return false;
		}
	}
	public function register(){
	  $this->load->library('form_validation');
	   $this->form_validation->set_rules('firstname','First name','trim|required');
		$this->form_validation->set_rules('lastname','Last name','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required');
	   $this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_rules('level','Level','required');

		if($this->form_validation->run() == FALSE)
		{
		    $this->load->view('register_view');
		}
		else{
		    $this->load->model('login_model');

		    if($this->input->post('register'))
		    {
		        $this->login_model->register();
		        redirect('login');
		    }
		    else
{
   $this->load->view('register_view');
}

		}
	}

	function filename_exists()
	{
	    $username = $this->input->post('username');
	    $exists = $this->login->filename_exists($username);

	    $count = count($exists);
	    // echo $count

	    if (empty($count)) {
				echo "<span style='color:green;'>Username is unique</span>";

	    } else {
	        echo "<span style='color: red;'>Please choose another Username as it already exists</span>";
					    }
	}
}

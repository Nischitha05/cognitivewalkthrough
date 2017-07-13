<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{

	}

	public function displayresultslist()
	{

	     if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
$adminid = $session_data['adminid'];
			$this->load->model('results_model');
			$data['groups'] = $this->results_model->getresultlist($adminid);
			$this->load->view('resultslist_view', $data);
			 }else{
			redirect('login', 'refresh');
		}
	}


}

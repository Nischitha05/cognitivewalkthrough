<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['lastname'] = $session_data['lastname'];
			$data['email'] = $session_data['email'];
			$data['username'] = $session_data['username'];
			$data['level'] = $session_data['level'];
			$this->load->view('home_view', $data);
		} else{
			redirect('login', 'refresh');
		}
	}

	public function createpersona()
	{
	if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
			$data['level'] = $session_data['level'];
			$this->load->view('createpersona_view', $data);
		} else{
			redirect('login', 'refresh');
		}
	}

	public function viewpersona()
	{
  //  $title['title'] ='Persona list';

     //$this->load->model("persona_model","m");
     // $this->persona_model->view();
	if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
			$data['level'] = $session_data['level'];
			 $data['data']='Persona list';
			 $adminid = $session_data['adminid'];
    $this->load->model('persona_model');
    $data['persona']=$this->persona_model->view($adminid);
    $this->load->view('viewpersonalist',$data);

		//	$this->load->view('viewpersonalist', $data);
		} else{
			redirect('login', 'refresh');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect(site_url('login'), 'refresh');
	}


	public function createtask()
	{
	if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
			$data['level'] = $session_data['level'];
			$this->load->view('createtask_view', $data);
		} else{
			redirect('login', 'refresh');
		}
	}

	public function listofCWmethodsview(){
	    if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
			$data['level'] = $session_data['level'];
$adminid = $session_data['adminid'];
			$this->load->model('task_model');
			$data['groups'] = $this->task_model->getTasklist($adminid);
			$data['variant'] = $this->db->select('*')
																->from('variantname')
																->get()
																->result();


			$this->load->view('listofCWmethods_view', $data);
		} else{
			redirect('login', 'refresh');
		}
	}

	public function listofCWmethodsview1(){
	    if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
			$data['level'] = $session_data['level'];
//$adminid = $session_data['adminid'];
			$this->load->model('task_model');
			$data['groups'] = $this->task_model->getTasklist1();
			$data['variant'] = $this->db->select('*')
																->from('variantname')
																->get()
																->result();

			$this->load->view('listofCWmethods_view1', $data);
		} else{
			redirect('login', 'refresh');
		}
	}

	public function editmcwview()
	{

	     if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
$data['level'] = $session_data['level'];
$adminid = $session_data['adminid'];
			$this->load->model('task_model');
			$data['groups'] = $this->task_model->getTasklist($adminid);
			$this->load->view('editmcw_view', $data);
			 }else{
			redirect('login', 'refresh');
		}
	}

	public function invite()
	{
	if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
			$data['level'] = $session_data['level'];
			$adminid = $session_data['adminid'];
			$this->load->model('task_model');
			$data['groups'] = $this->task_model->getTasklist($adminid);
			$data['variants'] = $this->db->select('*')
																 ->from('variantname')
																 ->get('')
																 ->result();
			$this->load->view('inviteexperts_view', $data);
		} else{
			redirect('login', 'refresh');
		}
	}

	public function displayresultslist()
	{

			 if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
			$data['level'] = $session_data['level'];
$adminid = $session_data['adminid'];
$this->load->model('task_model');

$data['admin'] = $this->task_model->getadmindata($adminid);
$conn= mysqli_connect("localhost","root","","cognitivewalkthrough");

$qry6 = mysqli_query($conn,"select DISTINCT perform.* from perform where exists(select task.* from task where task.taskid=perform.taskid and task.adminid='" . mysqli_escape_string($conn,$adminid) . "') GROUP by perform.timest");

$data['groups'] = $qry6;

//$this->task_model->getresultlist($adminid);



			$this->load->view('resultslist_view', $data);
			 }else{
			redirect('login', 'refresh');
		}
	}

	public function givefeedback()
	{
		if($this->session->userdata('logged_in')){
	 $session_data = $this->session->userdata('logged_in');
	 $data['adminid'] = $session_data['adminid'];
	 $data['firstname'] = $session_data['firstname'];
	 $data['username'] = $session_data['username'];
$data['level'] = $session_data['level'];

	 $this->load->view('questionnaire_view', $data);
		}else{
	 redirect('login', 'refresh');
 }
	}

	public function viewfeedback()
	{
		if($this->session->userdata('logged_in')){
	 $session_data = $this->session->userdata('logged_in');
	 $data['adminid'] = $session_data['adminid'];
	 $data['firstname'] = $session_data['firstname'];
	 $data['username'] = $session_data['username'];
$data['level'] = $session_data['level'];

	 $this->load->view('viewfeedback_view', $data);
		}else{
	 redirect('login', 'refresh');
 }
	}

	public function expertfeedback()
	{
		if($this->session->userdata('logged_in')){
	 $session_data = $this->session->userdata('logged_in');
	 $data['adminid'] = $session_data['adminid'];
	 $data['firstname'] = $session_data['firstname'];
	 $data['username'] = $session_data['username'];
$data['level'] = $session_data['level'];
$this->load->model('login_model');

$data['records'] = $this->login_model->getExpertFeedback();

	 $this->load->view('listofExpertFeedback_view', $data);
		}else{
	 redirect('login', 'refresh');
 }
	}

	public function userfeedback()
	{
		if($this->session->userdata('logged_in')){
	 $session_data = $this->session->userdata('logged_in');
	 $data['adminid'] = $session_data['adminid'];
	 $data['firstname'] = $session_data['firstname'];
	 $data['username'] = $session_data['username'];
	$data['level'] = $session_data['level'];
	$this->load->model('login_model');
	$data['records'] = $this->login_model->getUserFeedback();
	 $this->load->view('listofUserFeedback_view', $data);
		}else{
	 redirect('login', 'refresh');
	}
	}

	public function savefeedback(){
		if($this->session->userdata('logged_in')){
	 $session_data = $this->session->userdata('logged_in');
	 $data['adminid'] = $session_data['adminid'];
	 $data['firstname'] = $session_data['firstname'];
	 $data['username'] = $session_data['username'];
	 $data['level'] = $session_data['level'];
	 $adminid = $session_data['adminid'];



$question1 = $this->input->post('question1');
$question2 = $this->input->post('question2');
$question3 = $this->input->post('question3');
$question4 = $this->input->post('question4');
$question5 = $this->input->post('question5');
$question6 = $this->input->post('question6');
$description1 = $this->input->post('question1_text');
$description2 = $this->input->post('question2_text');
$description3 = $this->input->post('question3_text');
$description4 = $this->input->post('question4_text');
$description5 = $this->input->post('question5_text');
$description6 = $this->input->post('question6_text');

$questiondata = array(
	'adminid' => $adminid,
	'question1' => $question1,
	'description1' => $description1,
	'question2' => $question2,
	'description2' => $description2,
	'question3' => $question3,
	'description3' => $description3,
	'question4' => $question4,
	'description4' => $description4,
	'question5' => $question5,
	'description5' => $description5,
	'question6' => $question6,
	'description6' => $description6,
);


$this->load->model('login_model');

$data['feedback'] = $this->login_model->savefeedback($questiondata);

	 $this->load->view('home_view', $data);
		}else{
	 redirect('login', 'refresh');
 }
	}

	public function viewexpertreview()
	{
					        if($this->session->userdata('logged_in')){
							$session_data = $this->session->userdata('logged_in');
							$data['adminid'] = $session_data['adminid'];
							$data['firstname'] = $session_data['firstname'];
							$data['lastname'] = $session_data['lastname'];
							$data['email'] = $session_data['email'];
							$data['username'] = $session_data['username'];
							$data['level'] = $session_data['level'];
				  //  $data['data'] = 'Edit persona';
					$feedbackid = $this->uri->segment(3);


					$data['feedback'] = $this->db->select('*')
																			->from('feedback')
																			->where('feedbackid',$feedbackid)
																			->get()
																			->result();

			$this->load->view('viewexpertreview_view',$data);

			}
				else{
							redirect('login', 'refresh');
						}
	}

	public function viewuserreview()
	{
					        if($this->session->userdata('logged_in')){
							$session_data = $this->session->userdata('logged_in');
							$data['adminid'] = $session_data['adminid'];
							$data['firstname'] = $session_data['firstname'];
							$data['lastname'] = $session_data['lastname'];
							$data['email'] = $session_data['email'];
							$data['username'] = $session_data['username'];
							$data['level'] = $session_data['level'];
				  //  $data['data'] = 'Edit persona';
					$feedbackid = $this->uri->segment(3);


					$data['feedback'] = $this->db->select('*')
																			->from('feedback')
																			->where('feedbackid',$feedbackid)
																			->get()
																			->result();

			$this->load->view('viewuserreview_view',$data);

			}
				else{
							redirect('login', 'refresh');
						}
	}
}

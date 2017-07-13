<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Variants extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['userid'] = $session_data['userid'];
			$data['firstname'] = $session_data['firstname'];
			$data['lastname'] = $session_data['lastname'];
			$data['email'] = $session_data['email'];
			$data['username'] = $session_data['username'];
			$this->load->view('listofCWmethodsview', $data);
		} else{
			redirect('login/user', 'refresh');
		}
	}

public function getoverviewfrommethodlistvariant(){
	if($this->session->userdata('logged_in')){
$session_data = $this->session->userdata('logged_in');
$data['adminid'] = $session_data['adminid'];
$data['firstname'] = $session_data['firstname'];
$data['lastname'] = $session_data['lastname'];
$data['email'] = $session_data['email'];
$data['username'] = $session_data['username'];


	$taskid = $this->uri->segment(3);
	$personaid = $this->uri->segment(4);
	$data['personaid']=$personaid;
	$data['taskid']=$taskid;
	//$data['timestamp']=$timestamp;
	$data['taskid']=$taskid;
	$data['task']= $this->db->select('*')
														 ->from('task')
														 ->where('taskid',$taskid)
														 ->get('')
														 ->result();
		$data['method'] = $this->db
				 ->select('method.methodid,method.methodname,method.description')
				 ->from('method')
				 ->join('task_method', 'method.methodid = task_method.methodid')
				 ->where('task_method.taskid',$taskid)
				 ->get()
				 ->result();

		$data['steps']= $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image,task.taskid,task.taskname,method_step.methodid')
						->from('task')
						->join('task_method','task_method.taskid = task.taskid')
						->join('method_step','task_method.methodid = method_step.methodid')
						->join('steps','method_step.stepid = steps.stepid')
						->order_by('method_step.sort', 'asc')
						->where('task.taskid',$taskid)
						->get()
						->result();


			// $data['result'] = $this->db->select('*')
			// 													 ->from('perform')
			// 													 ->where('timest',$timestamp)
			// 													 ->limit(1)
			// 													 ->get('')
			// 													 ->result();

$this->load->view('getoverviewfrommethodlist',$data);

}else{
	redirect('login', 'refresh');
}}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect(site_url('login'), 'refresh');
	}


	public function streamlinedCW()
	{
	if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
			$this->load->view('streamlinedCW_view', $data);
		} else{
			redirect('login', 'refresh');
		}
	}

	public function CWforWeb(){
	    if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
			$this->load->view('CWforWeb_view', $data);
		} else{
			redirect('login', 'refresh');
		}
	}
	public function groupwareCW(){
	    if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
			$this->load->view('groupwareCW_view', $data);
		} else{
			redirect('login', 'refresh');
		}
	}

	public function activityCW(){
	    if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
			$this->load->view('activityCW_view', $data);
		} else{
			redirect('login', 'refresh');
		}
	}

	public function interactionCW(){
	    if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
			$this->load->view('interactionCW', $data);
		} else{
			redirect('login', 'refresh');
		}
	}

	public function extendedCW(){
	    if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
			$this->load->view('extendedCW_view', $data);
		} else{
			redirect('login', 'refresh');
		}
	}

	public function distributedCW(){
	    if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
			$this->load->view('distributedCW_view', $data);
		} else{
			redirect('login', 'refresh');
		}
	}

	public function enhancedCW(){
	    if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
			$this->load->view('enhancedCW_view', $data);
		} else{
			redirect('login', 'refresh');
		}
	}

	public function ownvariantCW(){
	    if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];

			$this->load->view('createownvariant_view', $data);
		} else{
			redirect('login', 'refresh');
		}
	}
		public function createvariant()
	{

	if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
		//	 $data['data']='Persona list';
			 $this->load->model('variant_model');
			 $variantdata = array(
      'variantname' => $this->input->post('variantname')
    );


           $results =  $this->variant_model->createvariant($variantdata);
					 $data['groups'] = $this->db->select('task.*')
																			 ->from('task')
																			 ->get('')
																			 ->result();
					 $data['variant'] = $this->db->select('*')
																			 ->from('variantname')
																			 ->get('')
																			 ->result();

					 if($results){
						 echo "<script>alert('Data saved')</script>";
						  $this->load->view('listofCWmethods_view',$data);
					 }

           //$this->load->view('listofCWmethods_view',$data);
				 } else{
			redirect('login', 'refresh');
		}

	}

public function viewvariant(){

				$this->load->helper(array('form','file','url'));
				if($this->session->userdata('logged_in')){
		$session_data = $this->session->userdata('logged_in');
		$data['adminid'] = $session_data['adminid'];
		$data['firstname'] = $session_data['firstname'];
		$data['lastname'] = $session_data['lastname'];
		$data['email'] = $session_data['email'];
		$data['username'] = $session_data['username'];
//  $data['data'] = 'Edit persona';
$now = new DateTime();
   // MySQL datetime format
$data['timestamp'] = $now->getTimestamp();           // Unix Timestamp -- Since PHP 5.3

$personaid=$this->input->post('personadrop');
$data['personaid']=$personaid;
//echo $personaid;
//$methodid = $this->input->post('teacher');
$variantid =$this->input->post('variants');
//print_r($methodid);

	$this->load->model('variant_model');

  $taskdata = $this->input->post('taskname');
	$data['taskid'] = $taskdata;
  //echo $taskdata;

	$data['results']=$this->variant_model->getvariant($taskdata,$personaid);
	$data['records'] = $this->db
			 ->select('method.methodid,method.methodname,method.description')
			 ->from('method')
			 ->join('task_method', 'method.methodid = task_method.methodid')
			 ->where('task_method.taskid',$taskdata)
			 ->get()
			 ->result();

 $data['variants']=$this->db
					->select('variantid,variantname')
					->from('variantname')
					->get()
					->result();



	$this->load->view('viewvariant_view',$data);
}
else{
		redirect('login', 'refresh');
	}
}

public function viewvariantfromoverview(){

				$this->load->helper(array('form','file','url'));
				if($this->session->userdata('logged_in')){
		$session_data = $this->session->userdata('logged_in');
		$data['adminid'] = $session_data['adminid'];
		$data['firstname'] = $session_data['firstname'];
		$data['lastname'] = $session_data['lastname'];
		$data['email'] = $session_data['email'];
		$data['username'] = $session_data['username'];
//  $data['data'] = 'Edit persona';
$now = new DateTime();
   // MySQL datetime format
$data['timestamp'] = $now->getTimestamp();           // Unix Timestamp -- Since PHP 5.3


$personaid=$this->uri->segment(4);
$data['personaid']=$personaid;
//echo $personaid;
//$methodid = $this->input->post('teacher');
$variantid =$this->input->post('variants');
//print_r($methodid);

	$this->load->model('variant_model');

  $taskdata = $this->uri->segment(3);
	$data['taskid'] = $taskdata;
  //echo $taskdata;

	$data['results']=$this->variant_model->getvariant($taskdata,$personaid);
	$data['records'] = $this->db
			 ->select('method.methodid,method.methodname,method.description')
			 ->from('method')
			 ->join('task_method', 'method.methodid = task_method.methodid')
			 ->where('task_method.taskid',$taskdata)
			 ->get()
			 ->result();

 $data['variants']=$this->db
					->select('variantid,variantname')
					->from('variantname')
					->get()
					->result();



	$this->load->view('viewvariant_view',$data);
}
else{
		redirect('login', 'refresh');
	}
}

public function cwperform()
{

		   $conn= mysqli_connect("localhost","root","","cognitivewalkthrough");
	$this->load->helper(array('form','file','url'));
	if($this->session->userdata('logged_in')){
$session_data = $this->session->userdata('logged_in');
$data['adminid'] = $session_data['adminid'];
$data['firstname'] = $session_data['firstname'];
$data['lastname'] = $session_data['lastname'];
$data['email'] = $session_data['email'];
$data['username'] = $session_data['username'];
//  $data['data'] = 'Edit persona';

$data['timestamp'] = $this->input->post('timestamp');
//echo $timestamp;

$timestamp = $this->input->post('timestamp');
$personaid = $this->input->post('personaid');
//echo $personaid;
$taskid = $this->input->post('taskid');
//echo $taskid;
$methodid = $this->input->post('method');
//echo $methodid;
$variantid = $this->input->post('variants');
//echo $variantid;
//$variantname = $this->input->post('variantname');
//echo $variantname;

if($_POST['variants']=='6'){
	$qry8 = mysqli_query($conn,"SELECT steps.stepid,steps.stepname,steps.action_description,steps.image FROM steps join method_step on method_step.stepid=steps.stepid WHERE method_step.methodid ='" . mysqli_real_escape_string($conn,$methodid) . "' limit 1 ");
	$rows4 = mysqli_fetch_assoc($qry8);
	$stepname=$rows4['stepname'];
	$qry9 = mysqli_query($conn,"SELECT * FROM perform as b
	WHERE b.timest= '" . mysqli_escape_string($conn,$timestamp) . "' and b.stepname= '" . mysqli_escape_string($conn,$stepname) . "' and EXISTS
	(
	SELECT * FROM steps as a
	WHERE b.stepname = a.stepname
	)");
	$rows5 = mysqli_fetch_assoc($qry9);

			 if(!empty($rows5)){

			//	echo "in new if";
		$data['records'] = $this->db->select('method.methodid,method.methodname,method.description')
				 												->from('method')
				 												->where('methodid',$methodid)
				 												->get()
				 												->result();

		$data['variants']=$this->db->select('variantid,variantname')
				 											 ->from('variantname')
															 ->where('variantid',$variantid)
				 										 	 ->get()
				 										 	 ->result();

		$data['task']=$this->db->select('*')
											 		 ->from('task')
													 ->where('taskid',$taskid)
											 		 ->get()
											 		 ->result();

		$data['persona']=$this->db->select('*')
													 		->from('persona')
													 		->where('personaid',$personaid)
													 		->get()
													 		->result();

		$data['steps'] = $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image,altsteps.altstepid,altsteps.altstepname,altsubsteps.altsubstepid,altsubsteps.altsubstepimage,altsubsteps.altsubstepname,altsubsteps.subaction_description')
																->from('steps')
														  	->join('method_step', 'method_step.stepid = steps.stepid')
																->join('steps_altsteps','steps.stepid = steps_altsteps.stepid')
																->join('altsteps','steps_altsteps.altstepid = altsteps.altstepid')
																->join('altsteps_altsubsteps','altsteps.altstepid = altsteps_altsubsteps.altstepid')
																->join('altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
																->where('method_step.methodid',$methodid)
																->get()
																->result();

		 $data['substeps']=$this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image')
		 													->from('steps')
		 													->join('method_step', 'method_step.stepid = steps.stepid')
		 												->where('method_step.methodid',$methodid)
		 												->limit(1)
														->get()
		 												->result();

			$data['substeps1'] = $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image')
																->from('steps')
																->join('method_step', 'method_step.stepid = steps.stepid')
															->where('method_step.methodid',$methodid)
															->limit(1)
															->get()
															->result();

	$data['qry9'] = $qry9;


	//SELECT steps.stepid,steps.stepname,steps.image, perform.* from perform,steps where perform.timest=1495701790 and steps.stepname = perform.stepname and perform.stepid=steps.stepid and perform.methodid = 204
		$data['questions'] = $this->db->select('questions.questionid,questions.questionname')
																	->from('questions')
																	->join('variant_question', 'variant_question.questionid = questions.questionid')
																	->where('variant_question.variantid',$variantid)
																	->get()
																	->result();

																	$data['steppresent'] = $qry8;
		$this->load->view('cwperformsteppresent_view1',$data);
	}else{

$data['records'] = $this->db->select('method.methodid,method.methodname,method.description')
		 												->from('method')
		 												->where('methodid',$methodid)
		 												->get()
		 												->result();

$data['task']=$this->db->select('*')
									 		 ->from('task')
											 ->where('taskid',$taskid)
									 		 ->get()
									 		 ->result();

$data['persona']=$this->db->select('*')
											 		->from('persona')
											 		->where('personaid',$personaid)
											 		->get()
											 		->result();

$data['variants']=$this->db->select('variantid,variantname')
		 											 ->from('variantname')
													 ->where('variantid',$variantid)
		 										 	 ->get()
		 										 	 ->result();

$data['steps'] = $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image,altsteps.altstepid,altsteps.altstepname,altsubsteps.altsubstepid,altsubsteps.altsubstepimage,altsubsteps.altsubstepname,altsubsteps.subaction_description')
														->from('steps')
												  	->join('method_step', 'method_step.stepid = steps.stepid')
														->join('steps_altsteps','steps.stepid = steps_altsteps.stepid')
														->join('altsteps','steps_altsteps.altstepid = altsteps.altstepid')
														->join('altsteps_altsubsteps','altsteps.altstepid = altsteps_altsubsteps.altstepid')
														->join('altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
														->where('method_step.methodid',$methodid)
														->get()
														->result();

 $data['substeps']=$this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image')
 													->from('steps')
 													->join('method_step', 'method_step.stepid = steps.stepid')
 												->where('method_step.methodid',$methodid)
 												->limit(1)
												->get()
 												->result();

	$data['substeps1'] = $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image')
														->from('steps')
														->join('method_step', 'method_step.stepid = steps.stepid')
													->where('method_step.methodid',$methodid)
													->limit(1)
													->get()
													->result();

$this->load->view('cwperform_viewfornone',$data);
}}else{
	$qry6 = mysqli_query($conn,"SELECT steps.stepid,steps.stepname,steps.action_description,steps.image FROM steps join method_step on method_step.stepid=steps.stepid WHERE method_step.methodid ='" . mysqli_real_escape_string($conn,$methodid) . "' limit 1 ");
 $rows2 = mysqli_fetch_assoc($qry6);
 $stepname=$rows2['stepname'];
 $qry7 = mysqli_query($conn,"SELECT * FROM perform as b
 WHERE b.timest= '" . mysqli_escape_string($conn,$timestamp) . "' and b.stepname= '" . mysqli_escape_string($conn,$stepname) . "' and EXISTS
 (
 	SELECT * FROM steps as a
 	WHERE b.stepname = a.stepname
 )");
 $rows3 = mysqli_fetch_assoc($qry7);



		 if(!empty($rows3)){

		//	echo "in new if";
	$data['records'] = $this->db->select('method.methodid,method.methodname,method.description')
			 												->from('method')
			 												->where('methodid',$methodid)
			 												->get()
			 												->result();

	$data['variants']=$this->db->select('variantid,variantname')
			 											 ->from('variantname')
														 ->where('variantid',$variantid)
			 										 	 ->get()
			 										 	 ->result();

	$data['task']=$this->db->select('*')
										 		 ->from('task')
												 ->where('taskid',$taskid)
										 		 ->get()
										 		 ->result();

	$data['persona']=$this->db->select('*')
												 		->from('persona')
												 		->where('personaid',$personaid)
												 		->get()
												 		->result();

	$data['steps'] = $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image,altsteps.altstepid,altsteps.altstepname,altsubsteps.altsubstepid,altsubsteps.altsubstepimage,altsubsteps.altsubstepname,altsubsteps.subaction_description')
															->from('steps')
													  	->join('method_step', 'method_step.stepid = steps.stepid')
															->join('steps_altsteps','steps.stepid = steps_altsteps.stepid')
															->join('altsteps','steps_altsteps.altstepid = altsteps.altstepid')
															->join('altsteps_altsubsteps','altsteps.altstepid = altsteps_altsubsteps.altstepid')
															->join('altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
															->where('method_step.methodid',$methodid)
															->get()
															->result();

	 $data['substeps']=$this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image')
	 													->from('steps')
	 													->join('method_step', 'method_step.stepid = steps.stepid')
	 												->where('method_step.methodid',$methodid)
	 												->limit(1)
													->get()
	 												->result();

		$data['substeps1'] = $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image')
															->from('steps')
															->join('method_step', 'method_step.stepid = steps.stepid')
														->where('method_step.methodid',$methodid)
														->limit(1)
														->get()
														->result();

$data['qry7'] = $qry7;


//SELECT steps.stepid,steps.stepname,steps.image, perform.* from perform,steps where perform.timest=1495701790 and steps.stepname = perform.stepname and perform.stepid=steps.stepid and perform.methodid = 204
	$data['questions'] = $this->db->select('questions.questionid,questions.questionname')
																->from('questions')
																->join('variant_question', 'variant_question.questionid = questions.questionid')
																->where('variant_question.variantid',$variantid)
																->get()
																->result();

																$data['steppresent'] = $qry6;
	$this->load->view('cwperformsteppresent_view',$data);
}else{

	//echo "in old if";
	$data['records'] = $this->db->select('method.methodid,method.methodname,method.description')
			 												->from('method')
			 												->where('methodid',$methodid)
			 												->get()
			 												->result();

	$data['variants']=$this->db->select('variantid,variantname')
			 											 ->from('variantname')
														 ->where('variantid',$variantid)
			 										 	 ->get()
			 										 	 ->result();

	$data['task']=$this->db->select('*')
										 		 ->from('task')
												 ->where('taskid',$taskid)
										 		 ->get()
										 		 ->result();

	$data['persona']=$this->db->select('*')
												 		->from('persona')
												 		->where('personaid',$personaid)
												 		->get()
												 		->result();

	$data['steps'] = $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image,altsteps.altstepid,altsteps.altstepname,altsubsteps.altsubstepid,altsubsteps.altsubstepimage,altsubsteps.altsubstepname,altsubsteps.subaction_description')
															->from('steps')
													  	->join('method_step', 'method_step.stepid = steps.stepid')
															->join('steps_altsteps','steps.stepid = steps_altsteps.stepid')
															->join('altsteps','steps_altsteps.altstepid = altsteps.altstepid')
															->join('altsteps_altsubsteps','altsteps.altstepid = altsteps_altsubsteps.altstepid')
															->join('altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
															->where('method_step.methodid',$methodid)
															->get()
															->result();

	 $data['substeps']=$this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image')
	 													->from('steps')
	 													->join('method_step', 'method_step.stepid = steps.stepid')
	 												->where('method_step.methodid',$methodid)
	 												->limit(1)
													->get()
	 												->result();

		$data['substeps1'] = $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image')
															->from('steps')
															->join('method_step', 'method_step.stepid = steps.stepid')
														->where('method_step.methodid',$methodid)
														->limit(1)
														->get()
														->result();

//SELECT steps.stepid,steps.stepname,steps.image, perform.* from perform,steps where perform.timest=1495701790 and steps.stepname = perform.stepname and perform.stepid=steps.stepid and perform.methodid = 204
	$data['questions'] = $this->db->select('questions.questionid,questions.questionname')
																->from('questions')
																->join('variant_question', 'variant_question.questionid = questions.questionid')
																->where('variant_question.variantid',$variantid)
																->get()
																->result();
	$this->load->view('cwperform_view',$data);
}


}
}
else{
redirect('login', 'refresh');
}
}

public function resultsview()
{


		        if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['adminid'] = $session_data['adminid'];
				$data['firstname'] = $session_data['firstname'];
				$data['lastname'] = $session_data['lastname'];
				$data['email'] = $session_data['email'];
				$data['username'] = $session_data['username'];
	  //  $data['data'] = 'Edit persona';
		$timestamp = $this->uri->segment(3);
$data['timestamp'] =$timestamp;
$data['result'] = $this->db->select('*')
															->from('perform')
															->where('timest',$timestamp)
															->get()
															->result();

																	$this->load->view('results_view',$data);
}
	else{
				redirect('login', 'refresh');
			}
}

public function deletevariant($variantid){
	$this->load->model('variant_model');
	$this->variant_model->deletevariant($variantid);
	redirect('home/listofCWmethodsview');
}

public function send_mail() {
	if($this->session->userdata('logged_in')){
$session_data = $this->session->userdata('logged_in');
$data['adminid'] = $session_data['adminid'];
$data['firstname'] = $session_data['firstname'];
$data['lastname'] = $session_data['lastname'];
$data['email'] = $session_data['email'];
$data['username'] = $session_data['username'];
//  $data['data'] = 'Edit persona';
$adminid = $session_data['adminid'];
$this->load->library('form_validation');
// $this->load->library(array('form_validation','upload'));
		$this->form_validation->set_rules('email','Email','trim|required');
		$this->form_validation->set_rules('message','Message','trim|required');
		$this->form_validation->set_rules('taskname','Task','required');
		$this->form_validation->set_rules('personadrop','Persona','required');
		$this->form_validation->set_rules('variantname','Variant','required');
$this->load->library('email');
	$config = Array(
'protocol' => 'smtp',
'smtp_host' => 'ssl://smtp.googlemail.com',
'smtp_port' => 465,
'smtp_user' => 'nischithagowdagopinath@gmail.com',// your mail name
'smtp_pass' => 'P@$$word1',
'mailtype'  => 'html',
 'mailpath' => '/usr/sbin/sendmail',
'charset'   => 'iso-8859-1',
 'wordwrap' => TRUE
);
$this->email->initialize($config);
         $from_email = "nischithagowdagopinath@gmail.com";
         $to_email = $this->input->post('email');
				 $task = $this->input->post('taskname');
				 $persona = $this->input->post('personadrop');
				 $variant = $this->input->post('variantname');
				 $message = $this->input->post('message');


         //Load email library

				 $this->db->select('persona.*,task_persona.*,task.*,variantname.*');
				 $this->db->from('persona,variantname');
				 $this->db->join('task_persona', 'persona.personaid = task_persona.personaid');
				 $this->db->join('task', 'task.taskid = task_persona.taskid');
				 $this->db->where('task_persona.taskid',$task);
				 $this->db->where('task_persona.personaid',$persona);
				 $this->db->where('variantname.variantid',$variant);
				 $records1 = $this->db->get('');
 $output1 = null;
 foreach ($records1->result() as $row1)
	{
         $this->email->from($from_email, 'Nischitha');
         $this->email->to($to_email);
         $this->email->subject('Invitation for performing Cognitive Walkthrough');
        // $this->email->message('Task:'. $row1->taskname.',
				 					//							Persona:' .$row1->firstname. '
									//							,'.$message.'.'.$message2);

									$this->email->message('<html>

									<body>'.$message.'
									<p>Kindly register to this web app by following the link to perform Cognitive Walkthrough.
									The walkthrough has to be performed for the task keeping persona in mind. Kindly register as expert. The link to register is:<a href="http://localhost/cognitivewalkthrough/index.php/login/register" title="mcw">Multiway Cognitive Walkthrough</a></p>
										<b>Task:</b>'.$row1->taskname.'<br>
										<b>Persona</b>'.$row1->firstname.'<br>
										<b>Variant</b>'.$row1->variantname.'<br>									</body>
									</html>
									');

      }   //Send mail
			$this->load->model('task_model');
			$data['groups'] = $this->task_model->getTasklist($adminid);
			$data['variants'] = $this->db->select('*')
																 ->from('variantname')
																 ->get('')
																 ->result();

         if($this->email->send()){


//$this->load->view('inviteexperts_view',$data);
echo "<script>alert('email sent successfully. Go back or send another email');
</script>";
    //  echo "<p>Email sent successfully. Go back or send another email</p>";
			}
         else
         {

//$this->load->view('inviteexperts_view',$data);
					 echo "<script>alert('Error in sending email. Please try again');
					 </script>";

				 }
 $this->load->view('inviteexperts_view',$data);
      }}


			public function fetchstep(){
					$conn= mysqli_connect("localhost","root","","cognitivewalkthrough");
				$action = $this->input->post('action');
			 if($action=="nextstep"){
				 $taskid = $this->input->post('taskid');
			//	 echo $taskid;
				 $timestamp = $this->input->post('timestamp');
			//	 echo $timestamp;
					$variantid=$this->input->post('variantid');
				 $stepid=$this->input->post('stepname');
				// echo $stepid;
				 $stepname = $this->input->post('stepsname');
			//	 echo $stepname;
				 $altmethod=$this->input->post('altmethod');
				 echo $altmethod;
				 $methodid=$this->input->post('methodid');
				 $chosen_altmethod = $this->input->post('chosen_altmethod');
			//	 echo $chosen_altmethod;
				 $timestamp = $this->input->post('timestamp');
				 $query1 = $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image,altsteps.altstepid,altsteps.altstepname,altsubsteps.altsubstepid,altsubsteps.altsubstepimage,altsubsteps.altsubstepname,altsubsteps.subaction_description')
																		->from('steps')
																		->join('method_step', 'method_step.stepid = steps.stepid')
																		->join('steps_altsteps','steps.stepid = steps_altsteps.stepid')
																		->join('altsteps','steps_altsteps.altstepid = altsteps.altstepid')
																		->join('altsteps_altsubsteps','altsteps.altstepid = altsteps_altsubsteps.altstepid')
																		->join('altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
																		->where('method_step.methodid',$methodid)
																		->get()
																		->result();

				$query4 = $this->db->select('questions.questionid,questions.questionname')
																			->from('questions')
																			->join('variant_question', 'variant_question.questionid = questions.questionid')
																			->where('variant_question.variantid',$variantid)
																			->get()
																			->result();

		if($altmethod!='undefined' || $altmethod==''){


		$qry6 = mysqli_query($conn,"SELECT * FROM perform as b
		WHERE b.timest= '" . mysqli_escape_string($conn,$timestamp) . "' and b.stepname= '" . mysqli_escape_string($conn,$stepname) . "' and b.noneoftheabove!='" . mysqli_escape_string($conn,'None of the above') . "' and EXISTS
		(
			SELECT * FROM altsubsteps as a
			WHERE b.stepname = a.altsubstepname
		)");
		$rows2 = mysqli_fetch_assoc($qry6);


		$query5 = $this->db->select('*')
														 ->from('altsubsteps')
														 ->join('altsteps_altsubsteps', 'altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
														 ->join('altsteps','altsteps.altstepid = altsteps_altsubsteps.altstepid')
														 ->join('steps_altsteps','steps_altsteps.altstepid = altsteps.altstepid')
														 ->join('steps','steps_altsteps.stepid = steps.stepid')
															->join('method_step','method_step.stepid = steps.stepid')
															 ->join('method','method_step.methodid = method.methodid')
															 ->where('method_step.methodid',$methodid)
														 ->where('altsteps_altsubsteps.altstepid',$altmethod)
														 ->limit(1)
														 ->get()
														 ->result();

															if (!empty($rows2)) {
														 //if($row_cnt>1){
											//			 echo "in query 7";
																														 foreach ($query5 as $row2) {


																																			echo "
																															<div id='stepslists_'$stepid' value='$stepid' class='quest'>
																															<div id='img_div'>
																															<h2 id='stepslist_'".$row2->altsubstepid."' class='step'>".$row2->altsubstepname."</h2>
																														<img src='http://localhost/cognitivewalkthrough/uploads/".$row2->altsubstepimage."'>
																																												 </div>";
														 break;
														 }

																					echo "<br><br><br><br><input type='hidden' id='chosen_altmethod' value='$altmethod' readonly />
																					<div style='position: relative; display: inline-block;' id='getstep'>
																					<h4>Description:</h4>
																				  <textarea name='desc' id='desc' rows='3' cols='73' disabled> $row2->action_description</textarea><br>

																					<input type='hidden' name='alternativelistid' id='alternativelistid' value='$stepid' />


																				  <h3>View Alternatives:</h3><input type='button' value='View alternatives' style='padding: 0px;' class='alternatives btn btn-success btn-lg form-control' id='alternativelist' />
																				  <ul id='alternatedrop'>
																				  </ul></div>
																						 <input type='hidden' name='nextstepid' id='nextsteplistid' value='".$row2->altsubstepid."' />
																						 <input type='hidden' name='nextstepname' id='nextsteplistname' value='".$row2->altsubstepname."' />

																						 <input type='hidden' name='nextstepimage' id='nextsteplistimage' value='".$row2->altsubstepimage."' />
																						 <div id='removenextaction'>
																						<h3>Feedback upon performing the current action</h3><input type='button' style='padding: 0px;' value='Next Action' class='nextsteplist btn btn-success btn-lg form-control' id='nextsteplist' />
																						 <ul id='stepdrop'>
 																						</ul>
 																						</div>

 																						<ul id='getimage'>
 																						</ul><div id='removeaction'>
<div id='removestep'>
<div style='position: relative; display: inline-block;' id='getstep'>
<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>																						 <span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
																						 Rating 1:'Completely likely' for the user to go wrong at a particular action\n
																						 Rating 2: 'Very likely' for the user to go wrong at a particular action\n
																						 Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
																						 Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
																						 Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>



																						 <br>  <label class='radio-inline'></label>";
foreach ($qry6 as $row) {
	# code...

														 if($row['rating']== "1"){
															echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' checked/>  <input type='radio' name='rating' id='rating2' value='2' />
															 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
															<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

														 }else if($row['rating'] == '2'){
															echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1'/>  <input type='radio' name='rating' id='rating2' value='2' checked/>
															 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
															<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

														 }else if($row['rating'] == '3'){
															echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
															 <input type='radio' name='rating' id='rating3' value='3' checked/>  <input type='radio' name='rating' id='rating4' value='4' />
															<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

														 }else if($row['rating'] == '4'){
															echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
															 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' checked/>
															<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

														 }else{
															echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
															 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
															<input type='radio' name='rating' id='rating5' value='5' checked/> <b>Success</b> <label class='radio-inline'></label><br><br>";
														 }

																	echo "				 <h3><b> Reasons?</h3>
																					 <textarea name='reason' id='reason' rows='3' cols='73' >".$row['reasons']."</textarea><br>
<div style='position: relative; display: inline-block;' id='getstep'>
																						<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' disabled/>
																								 <input type='button' value='Next' class='del_button btn btn-danger btn-md' id='nextstep' />
																								 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>

																								</div> </div></div>";

														 }}


		else{

														 foreach ($query5 as $row1) {


																			echo " <input type='hidden' id='chosen_altmethod' value='$altmethod' readonly />


															<div id='stepslists_$row1->altsubstepid' value='$row1->altsubstepid' class='quest'>
															<div id='img_div'>
															<h2 id='stepslist_'$row1->altsubstepid' class='step'>$row1->altsubstepname</h2>
														<img src='http://localhost/cognitivewalkthrough/uploads/$row1->altsubstepimage'>
																												 </div>";

								echo "</div>";


							 }
					echo " <br><br><br><br><br><br>
<div style='position: relative; display: inline-block;' id='getstep'>
<h4>Description:</h4>
<textarea name='desc' id='desc' rows='3' cols='73' disabled> $row1->subaction_description</textarea><br>

<input type='hidden' name='alternativelistid' id='alternativelistid' value='$row1->altsubstepid' />


<h3>View Alternatives:</h3><input type='button' style='padding: 0px;' value='View alternatives' class='alternatives btn btn-success btn-lg form-control' id='alternativelist' />
<ul id='alternatedrop'>
</ul></div>
						 <input type='hidden' name='nextstepid' id='nextsteplistid' value='$row1->altsubstepid' />
						 <input type='hidden' name='nextstepname' id='nextsteplistname' value='$row1->altsubstepname' />

						 <input type='hidden' name='nextstepimage' id='nextsteplistimage' value='$row1->altsubstepimage' />
						 <div id='removenextaction'>
						 <h3>Feedback upon performing the current action</h3><input type='button' style='padding: 0px;' value='Next Action' class='nextsteplist btn btn-success btn-lg form-control' id='nextsteplist' />
						 <ul id='stepdrop'>
 						</ul>
 						</div>

 						<ul id='getimage'>
 						</ul><div id='removeaction'>


<div id='removestep'>
<div style='position: relative; display: inline-block;' id='getstep'>
<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>						 <span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
						 Rating 1:'Completely likely' for the user to go wrong at a particular action\n
						 Rating 2: 'Very likely' for the user to go wrong at a particular action\n
						 Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
						 Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
						 Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>

						 <br>  <label class='radio-inline'></label><b>Failure</b> <input type='radio' name='rating' id='rating1' value='1' reuired/>  <input type='radio' name='rating' id='rating2' value='2' required/>
							 <input type='radio' name='rating' id='rating3' value='3' required/>  <input type='radio' name='rating' id='rating4' value='4' required/>
							<input type='radio' name='rating' id='rating5' value='5' required/> <b>Success</b> <label class='radio-inline'></label><br><br>

					 <h3><b> Reasons?</h3>
					 <textarea name='reason' id='reason' rows='3' cols='73' required></textarea><br>
					 <div style='position: relative; display: inline-block;' id='getstep'>
						<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' />
								 <input type='button' value='Next' class='del_button btn btn-danger btn-md' id='nextstep' />
								 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>
</div>
								 </div></div>";

							}

		}else if($stepid!='undefined'){



		$qry7 = mysqli_query($conn,"SELECT * FROM perform as b
		WHERE b.timest= '" . mysqli_escape_string($conn,$timestamp) . "' and b.stepname= '" . mysqli_escape_string($conn,$stepname) . "' and b.noneoftheabove!='" . mysqli_escape_string($conn,'None of the above') . "' and EXISTS
		(
		 SELECT * FROM steps as a
		 WHERE b.stepname = a.stepname
		)");
		$rows = mysqli_fetch_assoc($qry7);
		//  $row_cnt =mysqli_num_rows($qry7);
		//	$query7=$this->db->query($qry7);


		if($stepid > 900){

		if (!empty($rows)) {
		//if($row_cnt>1){
		$query2 = $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image')
		->from('steps')
		->join('method_step', 'method_step.stepid = steps.stepid')
		->where('method_step.methodid',$methodid)
		->where('method_step.stepid',$stepid)
		->limit(1)
		->get()
		->result();
		//echo "in query 7";
																 foreach ($query2 as $row2) {


																					echo " <input type='hidden' id='chosen_altmethod' value='$altmethod' readonly />
																					<br><br><br><br><div style='position: relative; display: inline-block;' id='getstep'>
																	<div id='stepslists_'$stepid' value='$stepid' class='quest'>
																	<div id='img_div'>
																	<h2 id='stepslist_'".$row2->stepid."' class='step'>".$row2->stepname."</h2>
																<img src='http://localhost/cognitivewalkthrough/uploads/".$row2->image."'>
																														 </div>";
		break;
		}

							echo " <br><br><br><br><br><br><div style='position: relative; display: inline-block;' id='getstep'>
							<h4>Description:</h4>
						  <textarea name='desc' id='desc' rows='3' cols='73' disabled>$row2->action_description</textarea><br>

							<input type='hidden' name='alternativelistid' id='alternativelistid' value='$stepid' />


						  <h3>View Alternatives:</h3><input type='button' value='View alternatives' style='padding: 0px;' class='alternatives btn btn-success btn-lg form-control' id='alternativelist' />
						  <ul id='alternatedrop'>
						  </ul></div>
								 <input type='hidden' name='nextstepid' id='nextsteplistid' value='".$row2->stepid."' />
								 <input type='hidden' name='nextstepname' id='nextsteplistname' value='".$row2->stepname."' />

								 <input type='hidden' name='nextstepimage' id='nextsteplistimage' value='".$row2->image."' />
<div id='removenextaction'>
								 <h3>Feedback upon performing the current action</h3><input type='button' style='padding: 0px;' value='Next Action' class='nextsteplist btn btn-success btn-lg form-control' id='nextsteplist' />
								 <ul id='stepdrop'>
		 						</ul>
		 						</div>

		 						<ul id='getimage'>
		 						</ul><div id='removeaction'>


		<div id='removestep'><div style='position: relative; display: inline-block;' id='getstep'>
<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>								 <span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
								 Rating 1:'Completely likely' for the user to go wrong at a particular action\n
								 Rating 2: 'Very likely' for the user to go wrong at a particular action\n
								 Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
								 Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
								 Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>



								 <br>  <label class='radio-inline'></label>";
foreach ($qry7 as $row) {
	# code...

		if($row['rating']== "1"){
		echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' checked/>  <input type='radio' name='rating' id='rating2' value='2' />
		<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
		<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

		}else if($row['rating'] == '2'){
		echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1'/>  <input type='radio' name='rating' id='rating2' value='2' checked/>
		<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
		<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

		}else if($row['rating'] == '3'){
		echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
		<input type='radio' name='rating' id='rating3' value='3' checked/>  <input type='radio' name='rating' id='rating4' value='4' disabled/>
		<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

		}else if($row['rating'] == '4'){
		echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
		<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' checked/>
		<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

		}else{
		echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
		<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
		<input type='radio' name='rating' id='rating5' value='5' checked/> <b>Success</b> <label class='radio-inline'></label><br><br>";
		}

			echo "				 <h3><b> Reasons?</h3>
							 <textarea name='reason' id='reason' rows='3' cols='73' >".$row['reasons']."</textarea><br>
							 <div style='position: relative; display: inline-block;' id='getstep'>
								<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' />
										 <input type='button' value='Next' class='del_button btn btn-danger btn-md' id='nextstep' disabled/>
										 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>

										 </div></div></div>";

		}



}
		else{
			$query2 = $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image')
			->from('steps')
			->join('method_step', 'method_step.stepid = steps.stepid')
			->where('method_step.methodid',$methodid)
			->where('method_step.stepid',$stepid)
			->limit(1)
			->get()
			->result();
		foreach ($query2 as $row1) {

																				echo "	<div id='stepslists_$row1->stepid' value='$row1->stepid' class='quest'>

																					<div id='img_div'>
																						<h2 id='stepslist' class='step'>".$row1->stepname."</h2>


																 <img src='http://localhost/cognitivewalkthrough/uploads/".$row1->image."'>
													 </div>";



															echo "</div>";


														 }
												echo " <br><br><br><br><div style='position: relative; display: inline-block;' id='getstep'>
												<h4>Description:</h4>
												<textarea name='desc' id='desc' rows='3' cols='73' disabled> $row1->action_description</textarea><br>

											  <input type='hidden' name='alternativelistid' id='alternativelistid' value='".$row1->stepid."' />
											  <h3>View Alternatives:</h3><input type='button' value='View alternatives' style='padding: 0px;' class='alternatives btn btn-success btn-lg form-control' id='alternativelist' />
											  <ul id='alternatedrop'>
											  </ul></div>

													 <input type='hidden' name='nextstepid' id='nextsteplistid' value='".$row1->stepid."' />
													 <input type='hidden' name='nextstepname' id='nextsteplistname' value='".$row1->stepname."' />
													 <input type='hidden' name='nextstepimage' id='nextsteplistimage' value='".$row1->image."' />
<div id='removenextaction'>
													 <h3>Feedback upon performing the current action</h3><input type='button' style='padding: 0px;' value='Next Action' class='nextsteplist btn btn-success btn-lg form-control' id='nextsteplist' />
													 <ul id='stepdrop'>
							 						</ul>
							 						</div>

							 						<ul id='getimage'>
							 						</ul><div id='removeaction'>


							<div id='removestep'><div style='position: relative; display: inline-block;' id='getstep'>
<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>													 <span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
													 Rating 1:'Completely likely' for the user to go wrong at a particular action\n
													 Rating 2: 'Very likely' for the user to go wrong at a particular action\n
													 Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
													 Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
													 Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>

													 <br>  <label class='radio-inline'></label><b>Failure</b> <input type='radio' name='rating' id='rating1' value='1' reuired/>  <input type='radio' name='rating' id='rating2' value='2' required/>
														 <input type='radio' name='rating' id='rating3' value='3' required/>  <input type='radio' name='rating' id='rating4' value='4' required/>
														<input type='radio' name='rating' id='rating5' value='5' required/> <b>Success</b> <label class='radio-inline'></label><br><br>

												 <h3> Reasons?</h3>
												 <textarea name='reason' id='reason' rows='3' cols='73' required></textarea><br>
												 <div style='position: relative; display: inline-block;' id='getstep'>
													<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' />
															 <input type='button' value='Next' class='del_button btn btn-danger btn-md' id='nextstep' />
															 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>
</div>
															 </div></div>";


		}
		}										else{





		$qry8 = mysqli_query($conn,"SELECT * FROM perform as b
		WHERE b.timest= '" . mysqli_escape_string($conn,$timestamp) . "' and b.stepname= '" . mysqli_escape_string($conn,$stepname) . "' and b.noneoftheabove!='" . mysqli_escape_string($conn,'None of the above') . "' and EXISTS
		(
			SELECT * FROM altsubsteps as a
			WHERE b.stepname = a.altsubstepname
		)");
		$rows1 = mysqli_fetch_assoc($qry8);


		//  $row_cnt1 = $query7->num_rows;

																		 $query3 = $this->db->select('*')
																																	->from('altsubsteps')
																																->join('altsteps_altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
																																->join('altsteps','altsteps_altsubsteps.altstepid = altsteps.altstepid')
																																->where('altsteps_altsubsteps.altsubstepid',$stepid)
																																->where('altsteps_altsubsteps.altstepid',$chosen_altmethod)
																																->limit(1)
																															->get()
																														->result();
																												//		echo ("success query3");

																														 if (!empty($rows1)) {
																														//if($row_cnt>1){
																													//	echo "in query 7";
																																														 foreach ($query3 as $row2) {


																																																			echo " <input type='hidden' id='chosen_altmethod' value='$chosen_altmethod' readonly />

																																															<div id='stepslists_'$stepid' value='$stepid' class='quest'>
																																															<div id='img_div'>
																																															<h2 id='stepslist_'".$row2->altsubstepid."' class='step'>".$row2->altsubstepname."</h2>
																																														<img src='http://localhost/cognitivewalkthrough/uploads/".$row2->altsubstepimage."'>
																																																												 </div>";
																														break;
																													}

																																					echo " 	<br><br><br><br><div style='position: relative; display: inline-block;' id='getstep'>
																																					<h4>Description:</h4>
																																					<textarea name='desc' id='desc' rows='3' cols='73' disabled>$row2->subaction_description</textarea><br>

																																				  <input type='hidden' name='alternativelistid' id='alternativelistid' value='$stepid' />
																																				  <h3>View Alternatives:</h3><input type='button' style='padding: 0px;' value='View alternatives' class='alternatives btn btn-success btn-lg form-control' id='alternativelist' />
																																				  <ul id='alternatedrop'>
																																				  </ul></div>
																																						 <input type='hidden' name='nextstepid' id='nextsteplistid' value='".$row2->altsubstepid."' />
																																						 <input type='hidden' name='nextstepname' id='nextsteplistname' value='".$row2->altsubstepname."' />

																																						 <input type='hidden' name='nextstepimage' id='nextsteplistimage' value='".$row2->altsubstepimage."' />
																																						 <div id='removenextaction'>
																																						 <h3>Feedback upon performing the current action</h3><input type='button' style='padding: 0px;' value='Next Action' class='nextsteplist btn btn-success btn-lg form-control' id='nextsteplist' />
																																						 <ul id='stepdrop'>
																																 						</ul>
																																 						</div>

																																 						<ul id='getimage'>
																																 						</ul><div id='removeaction'>


																																<div id='removestep'><div style='position: relative; display: inline-block;' id='getstep'>

<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>
																																						 <span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
																																						 Rating 1:'Completely likely' for the user to go wrong at a particular action\n
																																						 Rating 2: 'Very likely' for the user to go wrong at a particular action\n
																																						 Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
																																						 Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
																																						 Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>


																																						 <br>  <label class='radio-inline'></label>";
foreach ($qry8 as $row) {
	# code...

																														if($row['rating']== "1"){
																															echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' checked/>  <input type='radio' name='rating' id='rating2' value='2' />
																															 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
																															<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																														}else if($row['rating'] == '2'){
																															echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1'/>  <input type='radio' name='rating' id='rating2' value='2' checked/>
																															 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
																															<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																														}else if($row['rating'] == '3'){
																															echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																															 <input type='radio' name='rating' id='rating3' value='3' checked/>  <input type='radio' name='rating' id='rating4' value='4' />
																															<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																														}else if($row['rating'] == '4'){
																															echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																															 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' checked/>
																															<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																														}else{
																															echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																															 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
																															<input type='radio' name='rating' id='rating5' value='5' checked/> <b>Success</b> <label class='radio-inline'></label><br><br>";
																														}

																																	echo "				 <h3><b> Reasons?</h3>
																																					 <textarea name='reason' id='reason' rows='3' cols='73'>".$row['reasons']."</textarea><br>
																																					 <div style='position: relative; display: inline-block;' id='getstep'>
																																						<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' disabled/>
																																								 <input type='button' value='Next' class='del_button btn btn-danger btn-md' id='nextstep' />
																																								 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>

																																								 </div></div></div>";

																														}
}

																		else{

																			foreach ($query3 as $row1) {
																				echo "
		<input type='hidden' id='chosen_altmethod' value='$chosen_altmethod' readonly />
																<div id='stepslists_$row1->altsubstepid' value='$row1->altsubstepid' class='quest'>

																					<div id='img_div'>
																						<h2 id='stepslist_'$row1->altsubstepid' class='step'>$row1->altsubstepname</h2>


																 <img src='http://localhost/cognitivewalkthrough/uploads/$row1->altsubstepimage'>
													 </div>";

		echo "</div>";


		}
		echo " 		<br><br><br><br><div style='position: relative; display: inline-block;' id='getstep'>
		<h4>Description:</h4>
		<textarea name='desc' id='desc' rows='3' cols='73' disabled> $row1->subaction_description</textarea><br>


		<input type='hidden' name='alternativelistid' id='alternativelistid' value='$row1->altsubstepid' />
		<h3>View Alternatives:</h3><input type='button' value='View alternatives' style='padding: 0px;' class='alternatives btn btn-success btn-lg form-control' id='alternativelist' />
		<ul id='alternatedrop'>
		</ul></div>
		<input type='hidden' name='nextstepid' id='nextsteplistid' value='$row1->altsubstepid' />
		<input type='hidden' name='nextstepname' id='nextsteplistname' value='$row1->altsubstepname' />
		<input type='hidden' name='nextstepimage' id='nextsteplistimage' value='$row1->altsubstepimage' />
<div id='removenextaction'>
		<h3>Feedback upon performing the current action</h3><input type='button' value='Next Action' style='padding: 0px;' class='nextsteplist btn btn-success btn-lg form-control' id='nextsteplist' />
		<ul id='stepdrop'>
	 </ul>
	 </div>

	 <ul id='getimage'>
	 </ul><div id='removeaction'>


<div id='removestep'><div style='position: relative; display: inline-block;' id='getstep'>
<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>		<span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
		Rating 1:'Completely likely' for the user to go wrong at a particular action\n
		Rating 2: 'Very likely' for the user to go wrong at a particular action\n
		Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
		Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
		Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>


		<br>  <label class='radio-inline'></label><b>Failure</b> <input type='radio' name='rating' id='rating1' value='1' reuired/>  <input type='radio' name='rating' id='rating2' value='2' required/>
		<input type='radio' name='rating' id='rating3' value='3' required/>  <input type='radio' name='rating' id='rating4' value='4' required/>
		<input type='radio' name='rating' id='rating5' value='5' required/> <b>Success</b> <label class='radio-inline'></label><br><br>

		<h3> Reasons?</h3>
		<textarea name='reason' id='reason' rows='3' cols='73' required></textarea><br>
		<div style='position: relative; display: inline-block;' id='getstep'>
		<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' />
		<input type='button' value='Next' class='del_button btn btn-danger btn-md' id='nextstep' />


		<a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>
</div>
		</div></div>";

		}


		}
																					 }
																	}

			}



			public function fetchnextstep(){
				$action = $this->input->post('action');
		 	 if($action=="nextsteplist"){
				  //$variantid=$this->input->post('variantid');
				 $stepid=$this->input->post('stepid');
	  		 $methodid=$this->input->post('methodid');
				 $chosen_altmethod = $this->input->post('chosen_altmethod');
				 $query1 = $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image,altsteps.altstepid,altsteps.altstepname,altsubsteps.altsubstepid,altsubsteps.altsubstepimage,altsubsteps.altsubstepname,altsubsteps.subaction_description')
				 														->from('steps')
				 												  	->join('method_step', 'method_step.stepid = steps.stepid')
				 														->join('steps_altsteps','steps.stepid = steps_altsteps.stepid')
				 														->join('altsteps','steps_altsteps.altstepid = altsteps.altstepid')
				 														->join('altsteps_altsubsteps','altsteps.altstepid = altsteps_altsubsteps.altstepid')
				 														->join('altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
				 														->where('method_step.methodid',$methodid)

				 														->get()
				 														->result();

if($stepid > 900){
																		$query2 = $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image')
																		->from('steps')
																		->join('method_step', 'method_step.stepid = steps.stepid')
																		->where('method_step.methodid',$methodid)
																		->where('method_step.stepid',$stepid)

																		->get()
																		->result();

																		if($query2){


																				// echo "<select class='form-control' name='stepname' id='stepname'>";


																					foreach ($query2 as $row1) {


																				//  echo "  <option value=''>Select</option>


	echo "<input type='hidden' id='stepsid' name='stepsid' value='$row1->stepid'>";
																				 echo "  <img src='http://localhost/cognitivewalkthrough/uploads/$row1->image'>";

																				//  <option id='stepsid' value='$row1->stepid'>$row1->stepname </option>";
																			// 	 	echo "</select>";
echo "<input type='hidden' id='stepsname' name='stepsname' value='$row1->stepname'>";
																					 }
																				 }
																				 else{
																					 echo "<p style='color:red'>There is no next action. Kindly look at alternatives to proceed from the current action or end the evaluation if no alternatives or actions are available</p>";
																				 }
																			 }
																	else{
																		$query3 = $this->db->select('altsteps.altstepid,altsteps.altstepname,altsubsteps.altsubstepid,altsubsteps.altsubstepimage,altsubsteps.altsubstepname,altsubsteps.subaction_description')
													 				 														->from('altsubsteps')
																																->join('altsteps_altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
																																->join('altsteps','altsteps_altsubsteps.altstepid = altsteps.altstepid')
																															->where('altsteps_altsubsteps.altsubstepid',$stepid)
																															->where('altsteps_altsubsteps.altstepid',$chosen_altmethod)
																															->get()
																															->result();

																		if($query3){

																			// echo "<select class='form-control' name='stepname' id='stepname'>";
																				foreach ($query3 as $row1) {

																					echo "<input type='hidden' id='stepsid' name='stepsid' value='$row1->altsubstepid'>";
																		echo "  <img src='http://localhost/cognitivewalkthrough/uploads/$row1->altsubstepimage'>";
																		// 	 echo "  <option value=''>Select</option>
																		// 	 <option id='stepsid' value='$row1->altsubstepid'>$row1->altsubstepname </option>";
																		// echo "</select>";

																		echo "<input type='hidden' id='stepsname' name='stepsname' value='$row1->altsubstepname'>";

											 }


										 }else {
										 echo "<p style='color:red'>There are no actions available.Kindly End the evaluation if no actions or alternatives are available after entering all the required details</p>";
										 }
																	}

			}
}



			public function fetchalternatives(){
		//		$action = $this->input->post('action');
		 	// if($action=="getalternatives"){
				  //$variantid=$this->input->post('variantid');
				 $stepid=$this->input->get('stepid');
			//	 echo $stepid;
	  		 $methodid=$this->input->get('methodid');


if($stepid > 900){
	$query1 = $this->db->select('altsteps.altstepid,altsteps.altstepname')
														 ->from('altsteps')
														  ->join('steps_altsteps','altsteps.altstepid = steps_altsteps.altstepid')
														 ->join('steps','steps.stepid = steps_altsteps.stepid')
														 ->where('steps_altsteps.stepid',$stepid)
														 ->get()
														 ->result();

																		if($query1){
echo "<select class='form-control' name='altmethodname' id='altmethodname'>";
 echo "  <option value=''>Select</option>";
	                                     foreach ($query1 as $row1) {
	 																		echo "<option id='stepsid' value='$row1->altstepid'>$row1->altstepname </option>";

}
echo "<option id='stepsid' value='None of the above'>None of the above</option>";

																			   echo "</select>";
																				// echo "<div class='checkbox'>
																			//	 <label><input id='noneoftheabove' name='noneoftheabove' type='checkbox' value='None of the above'>Not mentioned here</label>
																			//	 </div>";

																				 }else{
																					 echo "<div class='checkbox'>
																					 <label><input id='noneoftheabove' name='noneoftheabove' type='checkbox' value='None of the above'>Not mentioned here(If checked then uncheck the checkbox to proceed with the evaluation)</label>
																					 </div>";

																					// echo "<p style='color:red'>There are no further actions available. End the evaluation if no actions or alternatives are available after entering all the required details</p>";
																				 }
																			 }
																	else{
																		 $this->db->select('altsteps.altstepid,altsteps.altstepname,altsubsteps.altsubstepid,altsubsteps.altsubstepimage,altsubsteps.altsubstepname,altsubsteps.subaction_description');
													 				 	$this->db->from('altsubsteps');
																		$this->db->join('altsteps_altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid');
																		$this->db->join('altsteps','altsteps_altsubsteps.altstepid = altsteps.altstepid');
																		$this->db->join('steps_altsteps','altsteps.altstepid = steps_altsteps.altstepid');
																		$this->db->join('steps','steps_altsteps.stepid = steps.stepid');
																		$this->db->join('method_step', 'method_step.stepid = steps.stepid');
																		$this->db->join('method','method.methodid = method_step.methodid');
																		$this->db->where('method_step.methodid',$methodid);
																		$this->db->where('altsteps_altsubsteps.altsubstepid',$stepid);
																		$this->db->limit(1);
														$query3 =$this->db->get();


																		if ($query3->num_rows() > 1){

																			foreach ($query3 as $row1) {
																				echo "<select class='form-control' name='altmethodname' id='altmethodname' >";
																				 echo "  <option value=''>Select</option>";
																					                                     foreach ($query1 as $row1) {

																					echo "<option id='stepsid' value='$row1->altstepid'>$row1->altstepname </option>";

																				}

																									   echo "</select>";
																										 echo "<div class='checkbox'>
						 <label><input id='noneoftheabove' name='noneoftheabove' type='checkbox' value='None of the above'>Not mentioned here(If checked then uncheck the checkbox to proceed with the evaluation)</label>
						 </div>";

											 }


																					 }
																					 else {
																					 	echo "<div class='checkbox'>
  <label><input id='noneoftheabove' name='noneoftheabove' type='checkbox' value='None of the above'>Not mentioned here(If checked then uncheck the checkbox to proceed with the evaluation)</label>
</div>";
																					 }
																	}


}

public function fetchprevstep(){
	$action = $this->input->post('action');
 if($action=="nextsteplist"){
		//$variantid=$this->input->post('variantid');
	 $stepid=$this->input->post('stepid');
	 $methodid=$this->input->post('methodid');
	 $chosen_altmethod = $this->input->post('chosen_altmethod');
	 $query1 = $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image,altsteps.altstepid,altsteps.altstepname,altsubsteps.altsubstepid,altsubsteps.altsubstepimage,altsubsteps.altsubstepname,altsubsteps.subaction_description')
															->from('steps')
															->join('method_step', 'method_step.stepid = steps.stepid')
															->join('steps_altsteps','steps.stepid = steps_altsteps.stepid')
															->join('altsteps','steps_altsteps.altstepid = altsteps.altstepid')
															->join('altsteps_altsubsteps','altsteps.altstepid = altsteps_altsubsteps.altstepid')
															->join('altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
															->where('method_step.methodid',$methodid)

															->get()
															->result();

if($stepid > 900){
															$query2 = $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image')
															->from('steps')
															->join('method_step', 'method_step.stepid = steps.stepid')
															->where('method_step.methodid',$methodid)
															->where('method_step.stepid',$stepid)

															->get()
															->result();

															if($query2){


																	// echo "<select class='form-control' name='stepname' id='stepname'>";


																		foreach ($query2 as $row1) {


																	//  echo "  <option value=''>Select</option>


echo "<input type='hidden' id='stepsid' name='stepsid' value='$row1->stepid'>";
																	 echo "  <img src='http://localhost/cognitivewalkthrough/uploads/$row1->image'>";

																	//  <option id='stepsid' value='$row1->stepid'>$row1->stepname </option>";
																// 	 	echo "</select>";
echo "<input type='hidden' id='stepsname' name='stepsname' value='$row1->stepname'>";
																		 }
																	 }
																	 else{
																		 echo "<p style='color:red'>There is no next action. Kindly look at alternatives to proceed from the current action</p>";
																	 }
																 }
														else{
															$query3 = $this->db->select('altsteps.altstepid,altsteps.altstepname,altsubsteps.altsubstepid,altsubsteps.altsubstepimage,altsubsteps.altsubstepname,altsubsteps.subaction_description')
																												->from('altsubsteps')
																													->join('altsteps_altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
																													->join('altsteps','altsteps_altsubsteps.altstepid = altsteps.altstepid')
																												->where('altsteps_altsubsteps.altsubstepid',$stepid)
																												->where('altsteps_altsubsteps.altstepid',$chosen_altmethod)
																												->get()
																												->result();

															if($query3){

																// echo "<select class='form-control' name='stepname' id='stepname'>";
																	foreach ($query3 as $row1) {

																		echo "<input type='hidden' id='stepsid' name='stepsid' value='$row1->altsubstepid'>";
															echo "  <img src='http://localhost/cognitivewalkthrough/uploads/$row1->altsubstepimage'>";
															// 	 echo "  <option value=''>Select</option>
															// 	 <option id='stepsid' value='$row1->altsubstepid'>$row1->altsubstepname </option>";
															// echo "</select>";

															echo "<input type='hidden' id='stepsname' name='stepsname' value='$row1->altsubstepname'>";

								 }


							 }else {
							 echo "<p style='color:red'>There are no actions available.Kindly End the evaluation if no actions or alternatives are available after entering all the required details</p>";
							 }
														}

}
}

public function gotomethodview(){

				$this->load->helper(array('form','file','url'));
				if($this->session->userdata('logged_in')){
		$session_data = $this->session->userdata('logged_in');
		$data['adminid'] = $session_data['adminid'];
		$data['firstname'] = $session_data['firstname'];
		$data['lastname'] = $session_data['lastname'];
		$data['email'] = $session_data['email'];
		$data['username'] = $session_data['username'];
//  $data['data'] = 'Edit persona';
$now = new DateTime();
   // MySQL datetime format
$data['timestamp'] = $this->uri->segment(3);

$taskid = $this->uri->segment(4);
$data['taskid'] = $taskid;
$personaid = $this->uri->segment(5);
$variantid = $this->uri->segment(6);
//print_r($methodid);

	$this->load->model('variant_model');

  //echo $taskdata;
$data['persona']= $this->db->select('task.*,persona.*')
													 ->from('task')
													 ->join('task_persona', 'task_persona.taskid = task.taskid')
													 ->join('persona', 'task_persona.personaid = persona.personaid')
													 ->where('task.taskid',$taskid)
													 ->where('persona.personaid',$personaid)
													 ->get('')
													 ->result();


$data['task'] = $this->db->select('*')
												->from('task')
												->where('taskid',$taskid)
												->get('')
												->result();
 $data['variants']=$this->db
					->select('variantid,variantname')
					->from('variantname')
					->where('variantid',$variantid)
					->get()
					->result();
$data['records'] = $this->db
							 ->select('method.methodid,method.methodname,method.description,method.action')
							 ->from('method')
							 ->join('task_method', 'method.methodid = task_method.methodid')
							 ->where('task_method.taskid',$taskid)
							 ->get()
							 ->result();
$data['task']=$this->db->select('*')
																	 ->from('task')
																	 ->where('taskid',$taskid)
																	 ->get()
																	 ->result();

	$data['questions'] = $this->db->select('questions.questionid,questions.questionname')
																					->from('questions')
																					->join('variant_question', 'variant_question.questionid = questions.questionid')
																					->where('variant_question.variantid',$variantid)
																					->get()
																					->result();


if($variantid=='6'){
		$this->load->view('firststepinmcwperform_fornone',$data);
	}else{
			$this->load->view('firststepinmcwperform',$data);
	}}
else{
		redirect('login', 'refresh');
	}
}

public function getoverview(){
	if($this->session->userdata('logged_in')){
$session_data = $this->session->userdata('logged_in');
$data['adminid'] = $session_data['adminid'];
$data['firstname'] = $session_data['firstname'];
$data['lastname'] = $session_data['lastname'];
$data['email'] = $session_data['email'];
$data['username'] = $session_data['username'];


	$taskid = $this->uri->segment(3);
	$timestamp = $this->uri->segment(4);

	$data['timestamp']=$timestamp;
	$data['task']= $this->db->select('*')
														 ->from('task')
														 ->where('taskid',$taskid)
														 ->get('')
														 ->result();
		$data['method'] = $this->db
				 ->select('method.methodid,method.methodname,method.description')
				 ->from('method')
				 ->join('task_method', 'method.methodid = task_method.methodid')
				 ->where('task_method.taskid',$taskid)
				 ->get()
				 ->result();

		$data['steps']= $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image,task.taskid,task.taskname,method_step.methodid')
						->from('task')
						->join('task_method','task_method.taskid = task.taskid')
						->join('method_step','task_method.methodid = method_step.methodid')
						->join('steps','method_step.stepid = steps.stepid')
						->order_by('method_step.sort', 'asc')
						->where('task.taskid',$taskid)
						->get()
						->result();


			$data['result'] = $this->db->select('*')
																 ->from('perform')
																 ->where('timest',$timestamp)
																 ->limit(1)
																 ->get('')
																 ->result();

$this->load->view('overview',$data);

}else{
	redirect('login', 'refresh');
}}

public function getoverviewfromresults(){
	if($this->session->userdata('logged_in')){
$session_data = $this->session->userdata('logged_in');
$data['adminid'] = $session_data['adminid'];
$data['firstname'] = $session_data['firstname'];
$data['lastname'] = $session_data['lastname'];
$data['email'] = $session_data['email'];
$data['username'] = $session_data['username'];


	$taskid = $this->uri->segment(3);
	$timestamp = $this->uri->segment(4);

	$data['timestamp']=$timestamp;
	$data['task']= $this->db->select('*')
														 ->from('task')
														 ->where('taskid',$taskid)
														 ->get('')
														 ->result();
		$data['method'] = $this->db
				 ->select('method.methodid,method.methodname,method.description')
				 ->from('method')
				 ->join('task_method', 'method.methodid = task_method.methodid')
				 ->where('task_method.taskid',$taskid)
				 ->get()
				 ->result();

		$data['steps']= $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image,task.taskid,task.taskname,method_step.methodid')
						->from('task')
						->join('task_method','task_method.taskid = task.taskid')
						->join('method_step','task_method.methodid = method_step.methodid')
						->join('steps','method_step.stepid = steps.stepid')
						->order_by('method_step.sort', 'asc')
						->where('task.taskid',$taskid)
						->get()
						->result();


			$data['result'] = $this->db->select('*')
																 ->from('perform')
																 ->where('timest',$timestamp)
																 ->limit(1)
																 ->get('')
																 ->result();

$this->load->view('getoverviewfromresults',$data);

}else{
	redirect('login', 'refresh');
}}

public function getoverviewfromedittask(){
	if($this->session->userdata('logged_in')){
$session_data = $this->session->userdata('logged_in');
$data['adminid'] = $session_data['adminid'];
$data['firstname'] = $session_data['firstname'];
$data['lastname'] = $session_data['lastname'];
$data['email'] = $session_data['email'];
$data['username'] = $session_data['username'];


	$taskid = $this->uri->segment(3);

	$data['task']= $this->db->select('*')
														 ->from('task')
														 ->where('taskid',$taskid)
														 ->get('')
														 ->result();
		$data['method'] = $this->db
				 ->select('method.methodid,method.methodname,method.description')
				 ->from('method')
				 ->join('task_method', 'method.methodid = task_method.methodid')
				 ->where('task_method.taskid',$taskid)
				 ->get()
				 ->result();

		$data['steps']= $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image,task.taskid,task.taskname,method_step.methodid')
						->from('task')
						->join('task_method','task_method.taskid = task.taskid')
						->join('method_step','task_method.methodid = method_step.methodid')
						->join('steps','method_step.stepid = steps.stepid')
						->order_by('method_step.sort', 'asc')
						->where('task.taskid',$taskid)
						->get()
						->result();


$this->load->view('getoverview',$data);

}else{
	redirect('login', 'refresh');
}}




public function getoverviewfromviewvariant(){
	if($this->session->userdata('logged_in')){
$session_data = $this->session->userdata('logged_in');
$data['adminid'] = $session_data['adminid'];
$data['firstname'] = $session_data['firstname'];
$data['lastname'] = $session_data['lastname'];
$data['email'] = $session_data['email'];
$data['username'] = $session_data['username'];


	$taskid = $this->uri->segment(3);
	$personaid = $this->uri->segment(4);
	$data['personaid']=$personaid;
	$data['taskid']=$taskid;
	//$data['timestamp']=$timestamp;
	$data['taskid']=$taskid;
	$data['task']= $this->db->select('*')
														 ->from('task')
														 ->where('taskid',$taskid)
														 ->get('')
														 ->result();
		$data['method'] = $this->db
				 ->select('method.methodid,method.methodname,method.description')
				 ->from('method')
				 ->join('task_method', 'method.methodid = task_method.methodid')
				 ->where('task_method.taskid',$taskid)
				 ->get()
				 ->result();

		$data['steps']= $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image,task.taskid,task.taskname,method_step.methodid')
						->from('task')
						->join('task_method','task_method.taskid = task.taskid')
						->join('method_step','task_method.methodid = method_step.methodid')
						->join('steps','method_step.stepid = steps.stepid')
						->order_by('method_step.sort', 'asc')
						->where('task.taskid',$taskid)
						->get()
						->result();


			// $data['result'] = $this->db->select('*')
			// 													 ->from('perform')
			// 													 ->where('timest',$timestamp)
			// 													 ->limit(1)
			// 													 ->get('')
			// 													 ->result();

$this->load->view('gotooverviewfromvariant',$data);

}else{
	redirect('login', 'refresh');
}}

public function getvariantpage(){
	if($this->session->userdata('logged_in')){
$session_data = $this->session->userdata('logged_in');
$data['adminid'] = $session_data['adminid'];
$data['firstname'] = $session_data['firstname'];
$data['lastname'] = $session_data['lastname'];
$data['email'] = $session_data['email'];
$data['username'] = $session_data['username'];


	$variantid = $this->uri->segment(3);

	$data['variantid']=$variantid;

	$data['variant']= $this->db->select('*')
														 ->from('variantname')
														 ->where('variantid',$variantid)
														 ->get('')
														 ->result();

	$data['questions'] = $this->db->select('questions.questionid,questions.questionname')
																->from('questions')
																->join('variant_question', 'variant_question.questionid = questions.questionid')
																->where('variant_question.variantid',$variantid)
																->get()
																->result();

$this->load->view('getvariantpage_view',$data);

}else{
	redirect('login', 'refresh');
}}


			public function fetchstep1(){
		//		$name=$_POST;

					$conn= mysqli_connect("localhost","root","","cognitivewalkthrough");

			//	$action = $this->input->post('action');
		 	 //if($action=="nextstep"){
				 $taskid = $this->input->post('taskid');
				 //echo 'taskid\n'.$taskid;
				 $timestamp = $this->input->post('timestamp');
				// echo $timestamp;
				  $variantid=$this->input->post('variantid');
				 $stepid=$this->input->get('stepname');
			//	 echo $stepid;
				 $stepname = $this->input->get('stepsname');
			//	 echo $stepname;
				 $altmethod=$this->input->get('altmethod');
				// echo $altmethod;
	  		 $methodid=$this->input->post('method');
			//	 echo 'methodid:'.$methodid;
				 $chosen_altmethod = $this->input->get('chosen_altmethod');
			//	 echo $chosen_altmethod;
				// $timestamp = $this->input->post('timestamp');
				 $query1 = $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image,altsteps.altstepid,altsteps.altstepname,altsubsteps.altsubstepid,altsubsteps.altsubstepimage,altsubsteps.altsubstepname,altsubsteps.subaction_description')
				 														->from('steps')
				 												  	->join('method_step', 'method_step.stepid = steps.stepid')
				 														->join('steps_altsteps','steps.stepid = steps_altsteps.stepid')
				 														->join('altsteps','steps_altsteps.altstepid = altsteps.altstepid')
				 														->join('altsteps_altsubsteps','altsteps.altstepid = altsteps_altsubsteps.altstepid')
				 														->join('altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
				 														->where('method_step.methodid',$methodid)
				 														->get()
				 														->result();

				$query4 = $this->db->select('questions.questionid,questions.questionname')
																			->from('questions')
																			->join('variant_question', 'variant_question.questionid = questions.questionid')
																			->where('variant_question.variantid',$variantid)
																			->get()
																			->result();

if($altmethod!='undefined' || $altmethod==''){


		$qry6 = mysqli_query($conn,"SELECT * FROM perform as b
		WHERE b.timest= '" . mysqli_escape_string($conn,$timestamp) . "' and b.stepname= '" . mysqli_escape_string($conn,$stepname) . "' and EXISTS
		(
			SELECT * FROM altsubsteps as a
			WHERE b.stepname = a.altsubstepname
		)");
	 $rows2 = mysqli_fetch_assoc($qry6);


	$query5 = $this->db->select('*')
														 ->from('altsubsteps')
														 ->join('altsteps_altsubsteps', 'altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
														 ->join('altsteps','altsteps.altstepid = altsteps_altsubsteps.altstepid')
														 ->join('steps_altsteps','steps_altsteps.altstepid = altsteps.altstepid')
														 ->join('steps','steps_altsteps.stepid = steps.stepid')
														  ->join('method_step','method_step.stepid = steps.stepid')
															 ->join('method','method_step.methodid = method.methodid')
															 ->where('method_step.methodid',$methodid)
														 ->where('altsteps_altsubsteps.altstepid',$altmethod)
														 ->limit(1)
														 ->get()
														 ->result();

														  if (!empty($rows2)) {
														 //if($row_cnt>1){
												//		 echo "in query 7";
														 																 foreach ($query5 as $row2) {


														 				 																	echo " <input type='hidden' id='chosen_altmethod' value='$altmethod' readonly />
														 																					<div id='steplist'>
														 				 													<div id='stepslists_'$stepid' value='$stepid' class='quest'>
														 																	<div id='img_div'>
														 				 													<h2 id='stepslist_'".$row2->altsubstepid."' class='step'>".$row2->altsubstepname."</h2>
														 		 														<img src='http://localhost/cognitivewalkthrough/uploads/".$row2->altsubstepimage."'>
														 				 																										 </div>
																																												 <br><br><div style='position: relative; display: inline-block;' id='getstep'>
																				 																								<h3>View Alternatives:</h3><input type='button' style='padding: 0px;' value='View alternatives' class='alternatives btn btn-success btn-lg form-control' id='alternativelist' />
																				 	 														 								 <ul id='alternatedrop'>
																				 	 														 								 </ul>
																																											 <ul id='getimage'>
																																											 </ul>

																				 																							 </div>	<input type='hidden' name='nextstepid' id='nextsteplistid' value='".$row2->altsubstepid."' />
																			 																								 <input type='hidden' name='nextstepname' id='nextsteplistname' value='".$row2->altsubstepname."' />

																			 																								 <input type='hidden' name='nextstepimage' id='nextsteplistimage' value='".$row2->altsubstepimage."' />
";
														 break;
													 }echo "<div id='stepremove'>";
													 foreach ($qry6 as $row3) {



														 										echo 	"

														 											 <h4>Question</h4><input type='text' name='questions[]' class='form-control' id='questions' style='font-weight:bold;background-color:#F0FFFF' value='".$row3['questionname']."' disabled/>
														 								 <input type='hidden' name='questionid[]' id='questionsid' value='".$row3['question']."'/>
														 								 <input type='hidden' name='questionname[]' id='questionsname' value='".$row3['questionname']."'/>
														 										 <h4>Add question</h4>
														 										 <input type='text' class='form-control' name='newquestion[]' style='font-weight:bold;background-color:#F0FFFF' id='new_questions'".$row3['stepname']."' value='".$row3['added_question']."' disabled/>


														 										 <h4>Answer:</h4>";
$answer = $row3['answer'];
																								        if ($answer=='no'){
																								      echo "<select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
																								    <option value=''>Select</option>
																								    <option selected='selected' value='no'>no</option>
																								    <option value='probably no'>probably no</option>
																								   <option value='unknown'>unknown</option>
																								   <option value='probably yes'>probably yes</option>
																								   <option value='yes'>yes</option></select>";

																								 }else if ($answer=='probably no'){
																							echo "<select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
																						<option value=''>Select</option>
																								 <option value='no'>no</option>
																								 <option selected='selected' value='probably no'>probably no</option>
																								 <option value='unknown'>unknown</option>
																								 <option value='probably yes'>probably yes</option>
																								 <option value='yes'>yes</option></select>";

																								 }else if ($answer=='unknown'){
																								echo "<select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
																							<option value=''>Select</option>
																								 <option value='no'>no</option>
																								 <option value='probably no'>probably no</option>
																								 <option selected='selected' value='unknown'>unknown</option>
																								 <option value='probably yes'>probably yes</option>
																								 <option value='yes'>yes</option></select>";

																								}else if ($answer=='probably yes'){
																								 echo "<select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
	 																						<option value=''>Select</option>
																							<option value='no'>no</option>
																							<option value='probably no'>probably no</option>
																								 <option value='unknown'>unknown</option>
																								 <option selected='selected' value='probably yes'>probably yes</option>
																								 <option value='yes'>yes</option></select>";

																								}else if ($answer=='yes'){
																								echo " <select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
																						 <option value=''>Select</option>
																						 <option value='no'>no</option>
																						 <option value='probably no'>probably no</option>
																								<option value='unknown'>unknown</option>
																								 <option value='probably yes'>probably yes</option>
																								 <option selected='selected' value='yes'>yes</option></select>";

																								  }


														 									echo "<h4>Credible story</h4><textarea name='question1_text[]' id='description'".$row3['question']."' rows='3' cols='73' value='".$row3['description']."' >".$row3['description']."</textarea><br>";



														 }
echo "</div></div>";
														 							echo " <br><br><br><br><br><br>
																						 <div id='removenextaction'>
																						<h3>Feedback upon performing the current action</h3><input type='button' style='padding: 0px;' value='Next Action' class='nextsteplist btn btn-success btn-lg form-control' id='nextsteplist' />
																						 <ul id='stepdrop'>
																 						</ul>
																 						</div>


																				 								 <input type='hidden' name='alternativelistid' id='alternativelistid' value='$stepid' />

																 						<div id='removeaction'>
<div id='removestep'>
<div style='position: relative; display: inline-block;' id='getstep'>
														 								 <h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>

																						 <span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
																						 Rating 1:'Completely likely' for the user to go wrong at a particular action\n
																						 Rating 2: 'Very likely' for the user to go wrong at a particular action\n
																						 Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
																						 Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
																						 Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>


														 								 <br>  <label class='radio-inline'></label>";

														 if($row3['rating']== "1"){
														 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' checked/>  <input type='radio' name='rating' id='rating2' value='2' />
														 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
														 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

														}else if($row3['rating'] == '2'){
														 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1'/>  <input type='radio' name='rating' id='rating2' value='2' checked/>
														 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
														 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

														 }else if($row3['rating'] == '3'){
														 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
														 	 <input type='radio' name='rating' id='rating3' value='3' checked/>  <input type='radio' name='rating' id='rating4' value='4' />
														 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

														 }else if($row3['rating'] == '4'){
														 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
														 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' checked/>
														 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

														 }else{
														 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
														 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
														 	<input type='radio' name='rating' id='rating5' value='5' checked/> <b>Success</b> <label class='radio-inline'></label><br><br>";
														 }

														 			echo "				 <h3><b> Reasons?</h3>
														 							 <textarea name='reason' id='reason' rows='3' cols='73' >".$row3['reasons']."</textarea><br>
																					 <div style='position: relative; display: inline-block;' id='getstep'>
														 								<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' disabled/>
														 										 <input type='button' value='Next' class='del_button btn btn-danger btn-md' id='nextstep' />
														 										 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>
</div>
														 										 </div></div></div>
																								 </div>";

														 }


else{

														 foreach ($query5 as $row1) {


		 																	echo " <input type='hidden' id='chosen_altmethod' value='$altmethod' readonly />
																			<div id='steplist'>


		 													<div id='stepslists_$row1->altsubstepid' value='$row1->altsubstepid' class='quest'>
															<div id='img_div'>
		 													<h2 id='stepslist_'$row1->altsubstepid' class='step'>$row1->altsubstepname</h2>
 														<img src='http://localhost/cognitivewalkthrough/uploads/$row1->altsubstepimage'>
		 																										 </div>
																												 <input type='hidden' name='alternativelistid' id='alternativelistid' value='$row1->altsubstepid' />

																												 <br><br><div style='position: relative; display: inline-block;' id='getstep'>
																				 								<h3>View Alternatives:</h3><input type='button' value='View alternatives' style='padding: 0px;' class='alternatives btn btn-success btn-lg form-control' id='alternativelist' />
																				 							 <ul id='alternatedrop'>
																				 							 </ul><ul id='getimage'></ul>

																				 							 </div> <input type='hidden' name='nextstepid' id='nextsteplistid' value='$row1->altsubstepid' />
																			 										 <input type='hidden' name='nextstepname' id='nextsteplistname' value='$row1->altsubstepname' />

																			 										 <input type='hidden' name='nextstepimage' id='nextsteplistimage' value='$row1->altsubstepimage' />
";echo "<div id='stepremove'>";

$questions_array = $_POST['questionid1'];
	$questionname_array = $_POST['questionname1'];
$newquestion_array = $_POST['newquestion1'];
for ($i = 0; $i < count($questions_array); $i++) {
	$question = mysqli_real_escape_string($conn,$questions_array[$i]);
	//echo 'question:'.$question;
	$questionname = mysqli_real_escape_string($conn,$questionname_array[$i]);
		//echo 'question:'.$questionname;
	$newquestion = mysqli_real_escape_string($conn,$newquestion_array[$i]);

			//				foreach($query4 as $each){

								echo 	"
								<br><br>
									<h4>Question</h4> <input type='text' name='questions[]' class='form-control' id='questions' style='font-weight:bold;background-color:#F0FFFF' value='$questionname' disabled/>
						 <input type='hidden' name='questionid[]' id='questionsid' value='$question'/>
						 <input type='hidden' name='questionname[]' id='questionsname' value='$questionname'/>
								 <h4>Add question</h4>
								 <input type='text' class='form-control' name='newquestion[]' style='font-weight:bold;background-color:#F0FFFF' id='new_questions$question' value='$newquestion' />


								 <h4>Answer:</h4>  <select class='form-control' name='answer[]' id='answer' required>
							<option value=''>Select</option>
							<option value='no'>no</option>
							<option value='probably no'>probably no</option>
						 <option value='unknown'>unknown</option>
						 <option value='probably yes'>probably yes</option>
						 <option value='yes'>yes</option></select>

								 <h4>Credible story</h4><textarea name='question1_text[]' id='description$question' rows='3' cols='73' required></textarea><br>";

						 }
					 }

								echo "</div></div>";



					echo " <br><br>

				<div id='removenextaction'>
						<h3>Feedback upon performing the current action</h3><input type='button' style='padding: 0px;' value='Next Action' class='nextsteplist btn btn-success btn-lg form-control' id='nextsteplist' />
						 <ul id='stepdrop'>
						 </ul>

						 <div id='removeaction'>
<div id='removestep'>
<div style='position: relative; display: inline-block;' id='getstep'>

						<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>
						 <span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
						 Rating 1:'Completely likely' for the user to go wrong at a particular action\n
						 Rating 2: 'Very likely' for the user to go wrong at a particular action\n
						 Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
						 Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
						 Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>

						 <br>  <label class='radio-inline'></label><b>Failure</b> <input type='radio' name='rating' id='rating1' value='1' reuired/>  <input type='radio' name='rating' id='rating2' value='2' required/>
					 		 <input type='radio' name='rating' id='rating3' value='3' required/>  <input type='radio' name='rating' id='rating4' value='4' required/>
					 		<input type='radio' name='rating' id='rating5' value='5' required/> <b>Success</b> <label class='radio-inline'></label><br><br>

					 <h3><b> Reasons?</h3>
					 <textarea name='reason' id='reason' rows='3' cols='73' required></textarea><br>
					 <div style='position: relative; display: inline-block;' id='getstep'>
						<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' />
								 <input type='button' value='Next' class='del_button btn btn-danger btn-md' id='nextstep' />
								 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>

								</div> </div></div></div></div>";

							}

}else if($stepid!='undefined'){

	$query8 = $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image')
	->from('steps')
	->join('method_step', 'method_step.stepid = steps.stepid')
	->where('method_step.methodid',$methodid)
	->where('method_step.stepid',$stepid)
	->limit(1)
	->get()
	->result();

	$qry7 = mysqli_query($conn,"SELECT * FROM perform as b
	WHERE b.timest= '" . mysqli_escape_string($conn,$timestamp) . "' and b.stepname= '" . mysqli_escape_string($conn,$stepname) . "' and EXISTS
	(
		 SELECT * FROM steps as a
		 WHERE b.stepname = a.stepname
	)");
 $row = mysqli_fetch_assoc($qry7);
//  $row_cnt =mysqli_num_rows($qry7);
	//	$query7=$this->db->query($qry7);


 if($stepid > 900){

 if (!empty($row)) {
//if($row_cnt>1){
//echo "in query 7";
																 foreach ($query8 as $row2) {


				 																	echo " <input type='hidden' id='chosen_altmethod' value='$altmethod' readonly />
																					<div id='steplist'>
				 													<div id='stepslists_'$stepid' value='$stepid' class='quest'>
																	<div id='img_div'>
				 													<h2 id='stepslist_'".$row2->stepid."' class='step'>".$row2->stepname."</h2>
		 														<img src='http://localhost/cognitivewalkthrough/uploads/".$row2->image."'>
				 																										 </div><br><br>
																														 <div style='position: relative; display: inline-block;' id='getstep'>
																				 										<h3>View Alternatives:</h3><input type='button' style='padding: 0px;' value='View alternatives' class='alternatives btn btn-success btn-lg form-control' id='alternativelist' />
																				 									 <ul id='alternatedrop'>
																				 									 </ul>
																													 <ul id='getimage'>
																													 </ul>
																				 									 </div><input type='hidden' name='nextstepid' id='nextsteplistid' value='".$row2->stepid."' />
																			 										 <input type='hidden' name='nextstepname' id='nextsteplistname' value='".$row2->stepname."' />

																			 										 <input type='hidden' name='nextstepimage' id='nextsteplistimage' value='".$row2->image."' />";
break;
}echo "<div id='stepremove'>";
foreach ($qry7 as $row3) {

										echo 	"

										<br><br>

											 <h4>Question</h4><input type='text' name='questions[]' class='form-control' id='questions' style='font-weight:bold;background-color:#F0FFFF' value='".$row3['questionname']."' disabled/>
								 <input type='hidden' name='questionid[]' id='questionsid' value='".$row3['question']."'/>
								 <input type='hidden' name='questionname[]' id='questionsname' value='".$row3['questionname']."'/>
										 <h4>Add question</h4>
										 <input type='text' class='form-control' name='newquestion[]' style='font-weight:bold;background-color:#F0FFFF' id='new_questions'".$row3['stepname']."' value='".$row3['added_question']."' disabled/>


										 <h4>Answer:</h4>";

 $answer = $row3['answer'];
 													 if ($answer=='no'){
 												 echo "<select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
 											 <option value=''>Select</option>
 											 <option selected='selected' value='no'>no</option>
 											 <option value='probably no'>probably no</option>
 											<option value='unknown'>unknown</option>
 											<option value='probably yes'>probably yes</option>
 											<option value='yes'>yes</option></select>";

 										}else if ($answer=='probably no'){
 								 echo "<select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
 							 <option value=''>Select</option>
 										<option value='no'>no</option>
 										<option selected='selected' value='probably no'>probably no</option>
 										<option value='unknown'>unknown</option>
 										<option value='probably yes'>probably yes</option>
 										<option value='yes'>yes</option></select>";

 										}else if ($answer=='unknown'){
 									 echo "<select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
 								 <option value=''>Select</option>
 										<option value='no'>no</option>
 										<option value='probably no'>probably no</option>
 										<option selected='selected' value='unknown'>unknown</option>
 										<option value='probably yes'>probably yes</option>
 										<option value='yes'>yes</option></select>";

 									 }else if ($answer=='probably yes'){
 										echo "<select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
 								 <option value=''>Select</option>
 								 <option value='no'>no</option>
 								 <option value='probably no'>probably no</option>
 										<option value='unknown'>unknown</option>
 										<option selected='selected' value='probably yes'>probably yes</option>
 										<option value='yes'>yes</option></select>";

 									 }else if ($answer=='yes'){
 									 echo " <select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
 								<option value=''>Select</option>
 								<option value='no'>no</option>
 								<option value='probably no'>probably no</option>
 									 <option value='unknown'>unknown</option>
 										<option value='probably yes'>probably yes</option>
 										<option selected='selected' value='yes'>yes</option></select>";

 										 }


										echo"<h4>Credible story</h4><textarea name='question1_text[]' id='description'".$row3['question']."' rows='3' cols='73' value='".$row3['description']."' >".$row3['description']."</textarea><br>";



}
echo "</div></div>";
							echo " <br><br>
<br>
								<div id='removenextaction'>
								 <h3>Feedback upon performing the current action</h3><input type='button' value='Next Action' style='padding: 0px;' class='nextsteplist btn btn-success btn-lg form-control' id='nextsteplist' />
								 <ul id='stepdrop'>
								 </ul></div>

								 <input type='hidden' name='alternativelistid' id='alternativelistid' value='$stepid' />
							<div id='removeaction'>	 <div id='removestep'>
<div style='position: relative; display: inline-block;' id='getstep'>
								 <h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>

								 <span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
								 Rating 1:'Completely likely' for the user to go wrong at a particular action\n
								 Rating 2: 'Very likely' for the user to go wrong at a particular action\n
								 Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
								 Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
								 Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>


								 <br>  <label class='radio-inline'></label>";

if($row3['rating']== "1"){
	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' checked/>  <input type='radio' name='rating' id='rating2' value='2' />
	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

}else if($row3['rating'] == '2'){
	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1'/>  <input type='radio' name='rating' id='rating2' value='2' checked/>
	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

}else if($row3['rating'] == '3'){
	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
	 <input type='radio' name='rating' id='rating3' value='3' checked/>  <input type='radio' name='rating' id='rating4' value='4' />
	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

}else if($row3['rating'] == '4'){
	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' checked/>
	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

}else{
	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
	<input type='radio' name='rating' id='rating5' value='5' checked/> <b>Success</b> <label class='radio-inline'></label><br><br>";
}

			echo "				 <h3><b> Reasons?</h3>
							 <textarea name='reason' id='reason' rows='3' cols='73' >".$row3['reasons']."</textarea><br>
							 <div style='position: relative; display: inline-block;' id='getstep'>
								<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' disabled/>
										 <input type='button' value='Next' class='del_button btn btn-danger btn-md' id='nextstep' />
										 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>

										</div></div> </div></div></div>";

}




		else{
			$query2 = $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image')
			->from('steps')
			->join('method_step', 'method_step.stepid = steps.stepid')
			->where('method_step.methodid',$methodid)
			->where('method_step.stepid',$stepid)
			->limit(1)
			->get()
			->result();
		foreach ($query2 as $row1) {

																				echo "<div id='steplist'>
																				<div id='stepslists_$row1->stepid' value='$row1->stepid' class='quest'>

																					<div id='img_div'>
																						<h2 id='stepslist_'$row1->stepid' class='step'>$row1->stepname</h2>


																 <img src='http://localhost/cognitivewalkthrough/uploads/$row1->image'>
													 </div>
													 <br><br><div style='position: relative; display: inline-block;' id='getstep'>
													 <h3>View Alternatives:</h3><input type='button' value='View alternatives' style='padding: 0px;' class='alternatives btn btn-success btn-lg form-control' id='alternativelist' />
													 <ul id='alternatedrop'>
													 </ul>
													 <ul id='getimage'>
													</ul>
													<input type='hidden' name='alternativelistid' id='alternativelistid' value='$row1->stepid' />

													 </div><input type='hidden' name='nextstepid' id='nextsteplistid' value='$row1->stepid' />
													 <input type='hidden' name='nextstepname' id='nextsteplistname' value='$row1->stepname' />
													 <input type='hidden' name='nextstepimage' id='nextsteplistimage' value='$row1->image' />
";
echo "<div id='stepremove'>";


$questions_array = $_POST['questionid1'];
	$questionname_array = $_POST['questionname1'];
$newquestion_array = $_POST['newquestion1'];
for ($i = 0; $i < count($questions_array); $i++) {
	$question = mysqli_real_escape_string($conn,$questions_array[$i]);
	//echo 'question:'.$question;
	$questionname = mysqli_real_escape_string($conn,$questionname_array[$i]);
		//echo 'question:'.$questionname;
	$newquestion = mysqli_real_escape_string($conn,$newquestion_array[$i]);
															//	 foreach($query4 as $each){
																	 echo 	"
																	 <br><br>

																<h4>Question</h4> <input type='text' name='questions[]' class='form-control' id='questions' style='font-weight:bold;background-color:#F0FFFF' value='$questionname' disabled/>
													 <input type='hidden' name='questionid[]' id='questionsid' value='$question'/>
													 <input type='hidden' name='questionname[]' id='questionsname' value='$questionname'/>
															 <h4>Add question</h4>
															 <input type='text' class='form-control' name='newquestion[]' style='font-weight:bold;background-color:#F0FFFF' id='new_questions$question' value='$newquestion' disabled/>


															 <h4>Answer:</h4>  <select class='form-control' name='answer[]' id='answer' required>
														<option value=''>Select</option>
														<option value='no'>no</option>
														<option value='probably no'>probably no</option>
													 <option value='unknown'>unknown</option>
													 <option value='probably yes'>probably yes</option>
													 <option value='yes'>yes</option></select>

															 <h4>Credible story</h4><textarea name='question1_text[]' id='description$question' rows='3' cols='73' required></textarea><br>";

													 }}

															echo "</div></div>";



												echo " <br><br>

													<div id='removenextaction'>
													 <h3>Feedback upon performing the current action</h3><input type='button' value='Next Action' style='padding: 0px;' class='nextsteplist btn btn-success btn-lg form-control' id='nextsteplist' />
													 <ul id='stepdrop'>
													 </ul></div>

													 <div id='removeaction'>
<div id='removestep'>
<div style='position: relative; display: inline-block;' id='getstep'>


													 <h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>
													 <span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
													 Rating 1:'Completely likely' for the user to go wrong at a particular action\n
													 Rating 2: 'Very likely' for the user to go wrong at a particular action\n
													 Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
													 Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
													 Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>

													 <br>  <label class='radio-inline'></label><b>Failure</b> <input type='radio' name='rating' id='rating1' value='1' reuired/>  <input type='radio' name='rating' id='rating2' value='2' required/>
												 		 <input type='radio' name='rating' id='rating3' value='3' required/>  <input type='radio' name='rating' id='rating4' value='4' required/>
												 		<input type='radio' name='rating' id='rating5' value='5' required/> <b>Success</b> <label class='radio-inline'></label><br><br>

												 <h3> Reasons?</h3>
												 <textarea name='reason' id='reason' rows='3' cols='73' required></textarea><br>
												 <div style='position: relative; display: inline-block;' id='getstep'>
												 	<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' />
												 			 <input type='button' value='Next' class='del_button btn btn-danger btn-md' id='nextstep' />
															 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>

												 			</div></div> </div></div><div>";


}
}										else{





		$qry8 = mysqli_query($conn,"SELECT * FROM perform as b
		WHERE b.timest= '" . mysqli_escape_string($conn,$timestamp) . "' and b.stepname= '" . mysqli_escape_string($conn,$stepname) . "' and EXISTS
		(
			SELECT * FROM altsubsteps as a
			WHERE b.stepname = a.altsubstepname
		)");
	 $rows1 = mysqli_fetch_assoc($qry8);


	//  $row_cnt1 = $query7->num_rows;

																		 $query3 = $this->db->select('*')
																		  														->from('altsubsteps')
																		 														->join('altsteps_altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
																		 														->join('altsteps','altsteps_altsubsteps.altstepid = altsteps.altstepid')
																		 														->where('altsteps_altsubsteps.altsubstepid',$stepid)
																																->where('altsteps_altsubsteps.altstepid',$chosen_altmethod)
																																->limit(1)
																		 													->get()
																	 													->result();
																												//		echo ("success query3");

																														 if (!empty($rows1)) {
																														//if($row_cnt>1){
																													//	echo "in query 7";
																																														 foreach ($query3 as $row2) {


																																																			 	echo " <input type='hidden' id='chosen_altmethod' value='$chosen_altmethod' readonly />
																																																		 	<div id='steplist'>
																																		 													<div id='stepslists_'$stepid' value='$stepid' class='quest'>
																																															<div id='img_div'>
																																		 													<h2 id='stepslist_'".$row2->altsubstepid."' class='step'>".$row2->altsubstepname."</h2>
																																 														<img src='http://localhost/cognitivewalkthrough/uploads/".$row2->altsubstepimage."'>
																																		 																										 </div>
																																																												 <br><br><div style='position: relative; display: inline-block;' id='getstep'>
																				 																																								<h3>View Alternatives:</h3><input type='button' value='View alternatives' style='padding: 0px;' class='alternatives btn btn-success btn-lg form-control' id='alternativelist' />
																				 																	 														 								 <ul id='alternatedrop'>
																				 																	 														 								 </ul>
																																																											 <ul id='getimage'>
																																																											</ul>
																				 																																							 </div><input type='hidden' name='nextstepid' id='nextsteplistid' value='".$row2->altsubstepid."' />
																			 																																									 <input type='hidden' name='nextstepname' id='nextsteplistname' value='".$row2->altsubstepname."' />

																			 																																									 <input type='hidden' name='nextstepimage' id='nextsteplistimage' value='".$row2->altsubstepimage."' />
";
																														break;
																													}
																													echo "<div id='stepremove'>";
																													foreach ($qry8 as $row3) {

																																								echo 	"
																																								<br><br>

																																									 <h4>Question</h4><input type='text' name='questions[]' class='form-control' id='questions' style='font-weight:bold;background-color:#F0FFFF' value='".$row3['questionname']."' disabled/>
																																						 <input type='hidden' name='questionid[]' id='questionsid' value='".$row3['question']."'/>
																																						 <input type='hidden' name='questionname[]' id='questionsname' value='".$row3['questionname']."'/>
																																								 <h4>Add question</h4>
																																								 <input type='text' class='form-control' style='font-weight:bold;background-color:#F0FFFF' name='newquestion[]' id='new_questions'".$row3['stepname']."' value='".$row3['added_question']."' disabled/>
";


 															 $answer = $row3['answer'];
 															 																								        if ($answer=='no'){
 															 																								      echo "<select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
 															 																								    <option value=''>Select</option>
 															 																								    <option selected='selected' value='no'>no</option>
 															 																								    <option value='probably no'>probably no</option>
 															 																								   <option value='unknown'>unknown</option>
 															 																								   <option value='probably yes'>probably yes</option>
 															 																								   <option value='yes'>yes</option></select>";

 															 																								 }else if ($answer=='probably no'){
 															 																							echo "<select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
 															 																						<option value=''>Select</option>
 															 																								 <option value='no'>no</option>
 															 																								 <option selected='selected' value='probably no'>probably no</option>
 															 																								 <option value='unknown'>unknown</option>
 															 																								 <option value='probably yes'>probably yes</option>
 															 																								 <option value='yes'>yes</option></select>";

 															 																								 }else if ($answer=='unknown'){
 															 																								echo "<select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
 															 																							<option value=''>Select</option>
 															 																								 <option value='no'>no</option>
 															 																								 <option value='probably no'>probably no</option>
 															 																								 <option selected='selected' value='unknown'>unknown</option>
 															 																								 <option value='probably yes'>probably yes</option>
 															 																								 <option value='yes'>yes</option></select>";

 															 																								}else if ($answer=='probably yes'){
 															 																								 echo "<select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
 															 	 																						<option value=''>Select</option>
 															 																							<option value='no'>no</option>
 															 																							<option value='probably no'>probably no</option>
 															 																								 <option value='unknown'>unknown</option>
 															 																								 <option selected='selected' value='probably yes'>probably yes</option>
 															 																								 <option value='yes'>yes</option></select>";

 															 																								}else if ($answer=='yes'){
 															 																								echo " <select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
 															 																						 <option value=''>Select</option>
 															 																						 <option value='no'>no</option>
 															 																						 <option value='probably no'>probably no</option>
 															 																								<option value='unknown'>unknown</option>
 															 																								 <option value='probably yes'>probably yes</option>
 															 																								 <option selected='selected' value='yes'>yes</option></select>";

 															 																								  }

																																								 echo "<h4>Credible story</h4><textarea name='question1_text[]' id='description'".$row3['question']."' rows='3' cols='73' value='".$row3['description']."' >".$row3['description']."</textarea><br>";



																														}
	echo "</div></div>";
																																					echo " <br><br>
</div>
																																								 <div id='removenextaction'>
																																						 <h3>Feedback upon performing the current action</h3><input type='button' value='Next Action' style='padding: 0px;' class='nextsteplist btn btn-success btn-lg form-control' id='nextsteplist' />
																																						 <ul id='stepdrop'>
																																						 </ul></div>

																																						 <input type='hidden' name='alternativelistid' id='alternativelistid' value='$stepid' />

																																						 <div id='removeaction'>
<div id='removestep'>

																																						 <div style='position: relative; display: inline-block;' id='getstep'>
																																						 <h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>
																																						 <span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
																																						 Rating 1:'Completely likely' for the user to go wrong at a particular action\n
																																						 Rating 2: 'Very likely' for the user to go wrong at a particular action\n
																																						 Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
																																						 Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
																																						 Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>



																																						 <br>  <label class='radio-inline'></label>";

																														if($row3['rating']== "1"){
																															echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' checked/>  <input type='radio' name='rating' id='rating2' value='2' disabled/>
																															 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' disabled/>
																															<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																														}else if($row3['rating'] == '2'){
																															echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1'/>  <input type='radio' name='rating' id='rating2' value='2' checked/>
																															 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
																															<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																														}else if($row3['rating'] == '3'){
																															echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																															 <input type='radio' name='rating' id='rating3' value='3' checked/>  <input type='radio' name='rating' id='rating4' value='4' />
																															<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																														}else if($row3['rating'] == '4'){
																															echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																															 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' checked/>
																															<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																														}else{
																															echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																															 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
																															<input type='radio' name='rating' id='rating5' value='5' checked/> <b>Success</b> <label class='radio-inline'></label><br><br>";
																														}

																																	echo "				 <h3><b> Reasons?</h3>
																																					 <textarea name='reason' id='reason' rows='3' cols='73' >".$row3['reasons']."</textarea><br>
<div style='position: relative; display: inline-block;' id='getstep'>
																																						<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' disabled/>
																																								 <input type='button' value='Next' class='del_button btn btn-danger btn-md' id='nextstep' />
																																								 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>

																																						</div>		</div> </div></div></div>";

																														}


																		else{

																			foreach ($query3 as $row1) {
																				echo "
<input type='hidden' id='chosen_altmethod' value='$chosen_altmethod' readonly />
																				<div id='steplist'>
<div id='stepslists_$row1->altsubstepid' value='$row1->altsubstepid' class='quest'>

																					<div id='img_div'>
																						<h2 id='stepslist_'$row1->altsubstepid' class='step'>$row1->altsubstepname</h2>


																 <img src='http://localhost/cognitivewalkthrough/uploads/$row1->altsubstepimage'>
													 </div>
													 <br><br><div style='position: relative; display: inline-block;' id='getstep'>
													 <h3>View Alternatives:</h3><input type='button' value='View alternatives' style='padding: 0px;' class='alternatives btn btn-success btn-lg form-control' id='alternativelist' />
													 <ul id='alternatedrop'>
													 </ul> <ul id='getimage'>
 													 </ul>
													 </div>
													 <input type='hidden' name='nextstepid' id='nextsteplistid' value='$row1->altsubstepid' />
													 <input type='hidden' name='nextstepname' id='nextsteplistname' value='$row1->altsubstepname' />
													 <input type='hidden' name='nextstepimage' id='nextsteplistimage' value='$row1->altsubstepimage' />

													 ";
													 echo "<div id='stepremove'>";
													 $questions_array = $_POST['questionid1'];
		 												$questionname_array = $_POST['questionname1'];
		 											$newquestion_array = $_POST['newquestion1'];
		 											for ($i = 0; $i < count($questions_array); $i++) {
		 												$question = mysqli_real_escape_string($conn,$questions_array[$i]);
		 												//echo 'question:'.$question;
		 												$questionname = mysqli_real_escape_string($conn,$questionname_array[$i]);
		 													//echo 'question:'.$questionname;
		 												$newquestion = mysqli_real_escape_string($conn,$newquestion_array[$i]);
//foreach($query4 as $each){

echo 	"
<br><br>

<h4>Question</h4><input type='text' name='questions[]' class='form-control' id='questions' style='font-weight:bold;background-color:#F0FFFF' value='$questionname' disabled/>
<input type='hidden' name='questionid[]' id='questionsid' value='$question'/>
<input type='hidden' name='questionname[]' id='questionsname' value='$questionname'/>
<h4>Add question</h4>
<input type='text' class='form-control' name='newquestion[]' style='font-weight:bold;background-color:#F0FFFF' id='new_questions$question' value='$newquestion' disabled/>


<h4>Answer:</h4>  <select class='form-control' name='answer[]' id='answer' required>
<option value=''>Select</option>
<option value='no'>no</option>
<option value='probably no'>probably no</option>
<option value='unknown'>unknown</option>
<option value='probably yes'>probably yes</option>
<option value='yes'>yes</option></select>

<h4>Credible story</h4><textarea name='question1_text[]' id='description$question' rows='3' cols='73' required></textarea><br>";

}}

echo "</div></div>";



echo " <br><br>

<div id='removenextaction'>
<h3>Feedback upon performing the current action</h3><input type='button' value='Next Action' style='padding: 0px;' class='nextsteplist btn btn-success btn-lg form-control' id='nextsteplist' />
<ul id='stepdrop'>
</ul></div>

<input type='hidden' name='alternativelistid' id='alternativelistid' value='$row1->altsubstepid' />
<div id='removeaction'>
<div id='removestep'>
<div style='position: relative; display: inline-block;' id='getstep'>
<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>
<span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
Rating 1:'Completely likely' for the user to go wrong at a particular action\n
Rating 2: 'Very likely' for the user to go wrong at a particular action\n
Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>

<br>  <label class='radio-inline'></label><b>Failure</b> <input type='radio' name='rating' id='rating1' value='1' reuired/>  <input type='radio' name='rating' id='rating2' value='2' required/>
	<input type='radio' name='rating' id='rating3' value='3' required/>  <input type='radio' name='rating' id='rating4' value='4' required/>
 <input type='radio' name='rating' id='rating5' value='5' required/> <b>Success</b> <label class='radio-inline'></label><br><br>

<h3> Reasons?</h3>
<textarea name='reason' id='reason' rows='3' cols='73' required></textarea><br>
<div style='position: relative; display: inline-block;' id='getstep'>
<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' />
<input type='button' value='Next' class='del_button btn btn-danger btn-md' id='nextstep' />


<a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>
</div>
</div></div></div></div>";

}


}
																					 }


			}

			public function getaltstepimage(){
				   $conn= mysqli_connect("localhost","root","","cognitivewalkthrough");
			 $stepid= $this->input->post('stepid'); //receiving the ajax post from view
			// echo $stepid;
			 $chosen_altmethod= $this->input->post('chosen_altmethod');
			 //echo $chosen_altmethod;
			 $timestamp = $this->input->post('timestamp');
			 //echo $timestamp;
			 //Persona
			 $nextstepname =$this->input->post('nextstepname');
			 //echo $nextstepname;
			 $qry8 = mysqli_query($conn,"SELECT * FROM altsteps WHERE altstepid ='" . mysqli_real_escape_string($conn,$stepid) . "'");
			 $rows4 = mysqli_fetch_assoc($qry8);
			 $stepname=$rows4['altstepname'];
			// echo $stepname;
			 $qry9 = mysqli_query($conn,"SELECT * FROM perform as b
			 WHERE b.timest= '" . mysqli_escape_string($conn,$timestamp) . "' and b.stepname= '" . mysqli_escape_string($conn,$stepname) . "' and b.noneoftheabove='" . mysqli_escape_string($conn,'') . "' and EXISTS
			 (
			 SELECT * FROM altsteps as a
			 WHERE b.stepname = a.altstepname
			 )");
			 $row2 = mysqli_fetch_assoc($qry9);
if($stepid !='None of the above'){
			 if(!empty($row2)){
				// echo "if for step present";
				 $query3 = $this->db->select('*')
																	->from('altsubsteps')
																	->join('altsteps_altsubsteps', 'altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
																	->join('altsteps','altsteps.altstepid = altsteps_altsubsteps.altstepid')
																	->join('steps_altsteps','steps_altsteps.altstepid = altsteps.altstepid')
																	->join('steps','steps_altsteps.stepid = steps.stepid')
																	 ->join('method_step','method_step.stepid = steps.stepid')
																		->join('method','method_step.methodid = method.methodid')
																		->where('method_step.methodid',$chosen_altmethod)
																	->where('altsteps_altsubsteps.altstepid',$stepid)
																	->limit(1)
																	->get()
																	->result();
					if($query3){

					 //  echo "<select class='form-control' name='stepname' id='stepname'>";
							foreach ($query3 as $row1) {
								echo "<input type='hidden' id='stepsid' name='stepsid' value='$row1->altsubstepid'>";
				 echo " <img src='http://localhost/cognitivewalkthrough/uploads/$row1->altsubstepimage'>";

					echo "<input type='hidden' id='stepsname' name='stepsname' value='$row1->altsubstepname'>";



		echo " <input type='hidden' name='alternativelistid' id='alternativelistid' value='$row1->altsubstepid' />


<div id='stepremove'>
					<div style='position: relative; display: inline-block;' id='getstep'>
<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>
																											 <span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
																											 Rating 1:'Completely likely' for the user to go wrong at a particular action\n
																											 Rating 2: 'Very likely' for the user to go wrong at a particular action\n
																											 Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
																											 Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
																											 Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>


																			 								 <br>  <label class='radio-inline'></label>";

																			 if($row2['rating']== "1"){
																			 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' checked/>  <input type='radio' name='rating' id='rating2' value='2' />
																			 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
																			 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																			 }else if($row2['rating'] == '2'){
																			 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1'/>  <input type='radio' name='rating' id='rating2' value='2' checked/>
																			 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
																			 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																			 }else if($row2['rating'] == '3'){
																			 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																			 	 <input type='radio' name='rating' id='rating3' value='3' checked/>  <input type='radio' name='rating' id='rating4' value='4' />
																			 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																			 }else if($row2['rating'] == '4'){
																			 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																			 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' checked/>
																			 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																			 }else{
																			 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																			 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
																			 	<input type='radio' name='rating' id='rating5' value='5' checked/> <b>Success</b> <label class='radio-inline'></label><br><br>";
																			 }

																			 			echo "				 <h3><b> Reasons?</h3>
																			 							 <textarea name='reason' id='reason' rows='3' cols='73' >".$row2['reasons']."</textarea><br>
<div style='position: relative; display: inline-block;' id='getstep'>
																											<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' disabled/>
																			 										 <input type='button' value='Next' class='del_button btn btn-danger btn-md' id='nextstep' />
																			 										 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>

																			 										</div> </div></div>";

																			 }

}
}else{


																					 $query3 = $this->db->select('*')
																			 														 ->from('altsubsteps')
																			 														 ->join('altsteps_altsubsteps', 'altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
																			 														 ->join('altsteps','altsteps.altstepid = altsteps_altsubsteps.altstepid')
																			 														 ->join('steps_altsteps','steps_altsteps.altstepid = altsteps.altstepid')
																			 														 ->join('steps','steps_altsteps.stepid = steps.stepid')
																			 															->join('method_step','method_step.stepid = steps.stepid')
																			 															 ->join('method','method_step.methodid = method.methodid')
																			 															 ->where('method_step.methodid',$chosen_altmethod)
																			 														 ->where('altsteps_altsubsteps.altstepid',$stepid)
																			 														 ->limit(1)
																			 														 ->get()
																			 														 ->result();
																					 if($query3){

																						//  echo "<select class='form-control' name='stepname' id='stepname'>";
																							 foreach ($query3 as $row1) {
																								 echo "<input type='hidden' id='stepsid' name='stepsid' value='$row1->altsubstepid'>";
	 																				echo " <img src='http://localhost/cognitivewalkthrough/uploads/$row1->altsubstepimage'>";

																					 echo "<input type='hidden' id='stepsname' name='stepsname' value='$row1->altsubstepname'>";
																					 echo "			<div id='stepremove'> <div style='position: relative; display: inline-block;' id='getstep'>
<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>																	               <span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action.Starting from the rating close to Failure(Left to right)\n
																	               Rating 1:'Completely likely' for the user to go wrong at a particular action\n
																	               Rating 2: 'Very likely' for the user to go wrong at a particular action\n
																	               Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
																	               Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
																	               Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>


																	             <br>  <label class='radio-inline'></label><b>Failure</b> <input type='radio' name='rating' id='rating1' value='1' reuired/>  <input type='radio' name='rating' id='rating2' value='2' required/>
																	                <input type='radio' name='rating' id='rating3' value='3' required/>  <input type='radio' name='rating' id='rating4' value='4' required/>
																	               <input type='radio' name='rating' id='rating5' value='5' required/> <b>Success</b> <label class='radio-inline'></label><br><br>

	 <h3><b> Reasons?</h3>
																										<textarea name='reason' id='reason' rows='3' cols='73' ></textarea><br>
<div style='position: relative; display: inline-block;' id='getstep'>
																										 <input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' />
																													<input type='button' value='Next' class='del_button btn btn-danger btn-md' id='nextstep' />
																													<a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>

																												</div>	</div></div>";
															}
													}
}
}else{

	$qry19 = mysqli_query($conn,"SELECT * FROM perform as b
	WHERE b.timest= '" . mysqli_escape_string($conn,$timestamp) . "' and b.methodname='" . mysqli_escape_string($conn,$nextstepname) . "' and b.noneoftheabove='" . mysqli_escape_string($conn,$stepid) . "' ");
	$row12 = mysqli_fetch_assoc($qry19);
	if(!empty($row12)){
		//echo "true";
		echo "
			<div id='stepremove'>
								<div style='position: relative; display: inline-block;' id='getstep'>
<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>
																														 <span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
																														 Rating 1:'Completely likely' for the user to go wrong at a particular action\n
																														 Rating 2: 'Very likely' for the user to go wrong at a particular action\n
																														 Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
																														 Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
																														 Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>


																						 								 <br>  <label class='radio-inline'></label>";

																						 if($row12['rating']== "1"){
																						 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' checked/>  <input type='radio' name='rating' id='rating2' value='2' />
																						 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
																						 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																						}else if($row12['rating'] == '2'){
																						 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1'/>  <input type='radio' name='rating' id='rating2' value='2' checked/>
																						 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
																						 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																						}else if($row12['rating'] == '3'){
																						 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																						 	 <input type='radio' name='rating' id='rating3' value='3' checked/>  <input type='radio' name='rating' id='rating4' value='4' />
																						 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																						}else if($row12['rating'] == '4'){
																						 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																						 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' checked/>
																						 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																						 }else{
																						 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																						 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
																						 	<input type='radio' name='rating' id='rating5' value='5' checked/> <b>Success</b> <label class='radio-inline'></label><br><br>";
																						 }

																						 			echo "				 <h3><b> Reasons?</h3>
																						 							 <textarea name='reason' id='reason' rows='3' cols='73' >".$row12['reasons']."</textarea><br>
		<div style='position: relative; display: inline-block;' id='getstep'>
								<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' disabled/>

										 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>

									 </div>	</div></div>";
}else{
	//echo "false";
	echo "		<div id='stepremove'>	 <div style='position: relative; display: inline-block;' id='getstep'>
<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>				<span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action.Starting from the rating close to Failure(Left to right)\n
				Rating 1:'Completely likely' for the user to go wrong at a particular action\n
				Rating 2: 'Very likely' for the user to go wrong at a particular action\n
				Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
				Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
				Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>


			<br>  <label class='radio-inline'></label><b>Failure</b> <input type='radio' name='rating' id='rating1' value='1' reuired/>  <input type='radio' name='rating' id='rating2' value='2' required/>
				 <input type='radio' name='rating' id='rating3' value='3' required/>  <input type='radio' name='rating' id='rating4' value='4' required/>
				<input type='radio' name='rating' id='rating5' value='5' required/> <b>Success</b> <label class='radio-inline'></label><br><br>

<h3><b> Reasons?</h3>
					 <textarea name='reason' id='reason' rows='3' cols='73' ></textarea><br>
<div style='position: relative; display: inline-block;' id='getstep'>
						<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' />

								 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>

							 </div>	</div></div>";
}


}
}
public function getaltstepimage1(){
	$conn= mysqli_connect("localhost","root","","cognitivewalkthrough");
$stepid= $this->input->get('stepid'); //receiving the ajax post from view
// echo $stepid;
$chosen_altmethod= $this->input->get('chosen_altmethod');
//echo $chosen_altmethod;
$timestamp = $this->input->get('timestamp');
$variantid=$this->input->get('variantid');
//echo $variantid;
//Persona
$question = $this->db->select('questions.questionid,questions.questionname')
														 ->from('questions')
														 ->join('variant_question', 'variant_question.questionid = questions.questionid')
														 ->where('variant_question.variantid',$variantid)
														 ->get()
														 ->result();

$nextstepname =$this->input->post('nextstepname');
//echo $nextstepname;
$qry8 = mysqli_query($conn,"SELECT * FROM altsteps WHERE altstepid ='" . mysqli_real_escape_string($conn,$stepid) . "'");
$rows4 = mysqli_fetch_assoc($qry8);
$stepname=$rows4['altstepname'];
//echo $stepname;
$qry9 = mysqli_query($conn,"SELECT * FROM perform as b
WHERE b.timest= '" . mysqli_escape_string($conn,$timestamp) . "' and b.stepname= '" . mysqli_escape_string($conn,$stepname) . "' and b.noneoftheabove='" . mysqli_escape_string($conn,'') . "' and EXISTS
(
SELECT * FROM altsteps as a
WHERE b.stepname = a.altstepname
)");
$row2 = mysqli_fetch_assoc($qry9);
if($stepid !='None of the above'){

 if(!empty($row2)){
	 //echo "if for step present";
	 $query3 = $this->db->select('*')
														->from('altsubsteps')
														->join('altsteps_altsubsteps', 'altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
														->join('altsteps','altsteps.altstepid = altsteps_altsubsteps.altstepid')
														->join('steps_altsteps','steps_altsteps.altstepid = altsteps.altstepid')
														->join('steps','steps_altsteps.stepid = steps.stepid')
														 ->join('method_step','method_step.stepid = steps.stepid')
															->join('method','method_step.methodid = method.methodid')
															->where('method_step.methodid',$chosen_altmethod)
														->where('altsteps_altsubsteps.altstepid',$stepid)
														->limit(1)
														->get()
														->result();
		if($query3){

		 //  echo "<select class='form-control' name='stepname' id='stepname'>";

foreach ($qry9 as $row3) {
	# code...


		echo 	"<br><br>

			<h4>Question</h4> <input type='text' name='questions[]' class='form-control' id='questions' style='font-weight:bold;background-color:#F0FFFF' value='".$row3['questionname']."' disabled/>
	<input type='hidden' name='questionid[]' id='questionsid' value='".$row3['question']."'/>
	<input type='hidden' name='questionname[]' id='questionsname' value='".$row3['questionname']."'/>
		 <h4>Add question</h4>
		 <input type='text' class='form-control' style='font-weight:bold;background-color:#F0FFFF' name='newquestion[]' id='new_questions'".$row3['stepname']."' value='".$row3['added_question']."' disabled/>
	<h4>Answer</h4>";


	$answer = $row3['answer'];
					if ($answer=='no'){
				echo "<select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
			<option value=''>Select</option>
			<option selected='selected' value='no'>no</option>
			<option value='probably no'>probably no</option>
		 <option value='unknown'>unknown</option>
		 <option value='probably yes'>probably yes</option>
		 <option value='yes'>yes</option></select>";

	 }else if ($answer=='probably no'){
	echo "<select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
	<option value=''>Select</option>
	 <option value='no'>no</option>
	 <option selected='selected' value='probably no'>probably no</option>
	 <option value='unknown'>unknown</option>
	 <option value='probably yes'>probably yes</option>
	 <option value='yes'>yes</option></select>";

	 }else if ($answer=='unknown'){
	echo "<select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
	<option value=''>Select</option>
	 <option value='no'>no</option>
	 <option value='probably no'>probably no</option>
	 <option selected='selected' value='unknown'>unknown</option>
	 <option value='probably yes'>probably yes</option>
	 <option value='yes'>yes</option></select>";

	}else if ($answer=='probably yes'){
	 echo "<select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
	<option value=''>Select</option>
	<option value='no'>no</option>
	<option value='probably no'>probably no</option>
	 <option value='unknown'>unknown</option>
	 <option selected='selected' value='probably yes'>probably yes</option>
	 <option value='yes'>yes</option></select>";

	}else if ($answer=='yes'){
	echo " <select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
	<option value=''>Select</option>
	<option value='no'>no</option>
	<option value='probably no'>probably no</option>
	<option value='unknown'>unknown</option>
	 <option value='probably yes'>probably yes</option>
	 <option selected='selected' value='yes'>yes</option></select>";

		}

		 echo "<h4>Credible story</h4><textarea name='question1_text[]' id='description'".$row3['question']."' rows='3' cols='73' value='".$row3['description']."' >".$row3['description']."</textarea><br>";


		echo "</div>";
	}
foreach ($query3 as $row1) {
	echo " <br><br>
	<ul id='stepdrop'>
	</ul>

	<ul id='getimage'>
	</ul>
	<input type='hidden' name='nextstepid' id='nextsteplistid' value='".$row1->altsubstepid."' />
	<input type='hidden' name='nextstepname' id='nextsteplistname' value='".$row1->altsubstepname."' />

	<input type='hidden' name='nextstepimage' id='nextsteplistimage' value='".$row1->altsubstepimage."' />
	<div id='removenextaction'>
	<h3>Please click on the below button to checkt </h3>
	";
	echo "<input type='hidden' id='stepsid' name='stepsid' value='$row1->altsubstepid'>";
	echo " <img src='http://localhost/cognitivewalkthrough/uploads/$row1->altsubstepimage'>";

	echo "<input type='hidden' id='stepsname' name='stepsname' value='$row1->altsubstepname'>";
}
	echo "</div><ul id='getimage'></ul><input type='hidden' name='alternativelistid' id='alternativelistid' value='$stepid' />
	<div id='removeaction'>
<div id='stepremove'>
	<div style='position: relative; display: inline-block;' id='getstep'>
<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>	<span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
	Rating 1:'Completely likely' for the user to go wrong at a particular action\n
	Rating 2: 'Very likely' for the user to go wrong at a particular action\n
	Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
	Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
	Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>



	<br>  <label class='radio-inline'></label>";

	if($row3['rating']== "1"){
	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' checked/>  <input type='radio' name='rating' id='rating2' value='2' disabled/>
	<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' disabled/>
	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

}else if($row3['rating'] == '2'){
	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1'/>  <input type='radio' name='rating' id='rating2' value='2' checked/>
	<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

}else if($row3['rating'] == '3'){
	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
	<input type='radio' name='rating' id='rating3' value='3' checked/>  <input type='radio' name='rating' id='rating4' value='4' />
	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

}else if($row3['rating'] == '4'){
	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
	<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' checked/>
	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

	}else{
	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
	<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
	<input type='radio' name='rating' id='rating5' value='5' checked/> <b>Success</b> <label class='radio-inline'></label><br><br>";
	}

	echo "				 <h3><b> Reasons?</h3>
	<textarea name='reason' id='reason' rows='3' cols='73' >".$row3['reasons']."</textarea><br>
	<div style='position: relative; display: inline-block;' id='getstep'>
	<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' />
		 <input type='button' value='Next' class='del_button btn btn-danger btn-md' id='nextstep' />
		 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>
</div>
		</div> </div>";


																 }

}
else{
	$questions = $this->db->select('questions.questionid,questions.questionname')
															 ->from('questions')
															 ->join('variant_question', 'variant_question.questionid = questions.questionid')
															 ->where('variant_question.variantid',$variantid)
															 ->get()
															 ->result();

																		 $query3 = $this->db->select('*')
																														 ->from('altsubsteps')
																														 ->join('altsteps_altsubsteps', 'altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
																														 ->join('altsteps','altsteps.altstepid = altsteps_altsubsteps.altstepid')
																														 ->join('steps_altsteps','steps_altsteps.altstepid = altsteps.altstepid')
																														 ->join('steps','steps_altsteps.stepid = steps.stepid')
																															->join('method_step','method_step.stepid = steps.stepid')
																															 ->join('method','method_step.methodid = method.methodid')
																															 ->where('method_step.methodid',$chosen_altmethod)
																														 ->where('altsteps_altsubsteps.altstepid',$stepid)
																														 ->limit(1)
																														 ->get()
																														 ->result();
																		 if($query3){
																			// echo "no data available";
																			  foreach ($query3 as $row1) {

//foreach($question as $each){
 //echo "questions"; echo "no data available";
  $conn= mysqli_connect("localhost","root","","cognitivewalkthrough");
  $questions_array = $_POST['questionid1'];
 	 $questionname_array = $_POST['questionname1'];
  $newquestion_array = $_POST['newquestion1'];
  for ($i = 0; $i < count($questions_array); $i++) {
 	 $question = mysqli_real_escape_string($conn,$questions_array[$i]);
 //echo 'question:'.$question;
 	 $questionname = mysqli_real_escape_string($conn,$questionname_array[$i]);
 	//echo 'question:'.$questionname;
 	 $newquestion = mysqli_real_escape_string($conn,$newquestion_array[$i]);
 	//foreach ($questions as $each) {
 		# code...

 echo "<div id='removestep'>
 <br><br>
 	 <h4>Question</h4><input type='text' name='questions[]' class='form-control' id='questions' style='font-weight:bold;background-color:#F0FFFF' value='$questionname' disabled/>
 <input type='hidden' name='questionid[]' id='questionsid' value='$question'/>
 <input type='hidden' name='questionname[]' id='questionsname' value='$questionname'/>
  <h4>Add question</h4>
  <input type='text' class='form-control' name='newquestion[]' style='font-weight:bold;background-color:#F0FFFF' id='new_questions$question' value='$newquestion' disabled/>


  <h4>Answer:</h4>  <select class='form-control' name='answer[]' id='answer' required>
 <option value=''>Select</option>
 <option value='no'>no</option>
 <option value='probably no'>probably no</option>
 <option value='unknown'>unknown</option>
 <option value='probably yes'>probably yes</option>
 <option value='yes'>yes</option></select>

  <h4>Credible story</h4><textarea name='question1_text[]' id='description$question' rows='3' cols='73' required></textarea><br>";

 }

	echo "</div></div><div id='removenextaction'>
	<h3>Feedback upon performing the current action</h3>";


																			//  echo "<select class='form-control' name='stepname' id='stepname'>";

																					 echo "<input type='hidden' id='stepsid' name='stepsid' value='$row1->altsubstepid'>";
																		echo " <img src='http://localhost/cognitivewalkthrough/uploads/$row1->altsubstepimage'>";

																		 echo "<input type='hidden' id='stepsname' name='stepsname' value='$row1->altsubstepname'>
																		</div><ul id='getimage'></ul>< <input type='hidden' name='alternativelistid' id='alternativelistid' value='$row1->altsubstepid' />
<div id='removeaction'><div id='removestep'>
																		 <div style='position: relative; display: inline-block;' id='getstep'>
<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>																		 <span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
																		 Rating 1:'Completely likely' for the user to go wrong at a particular action\n
																		 Rating 2: 'Very likely' for the user to go wrong at a particular action\n
																		 Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
																		 Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
																		 Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>

																		 <br>  <label class='radio-inline'></label><b>Failure</b> <input type='radio' name='rating' id='rating1' value='1' reuired/>  <input type='radio' name='rating' id='rating2' value='2' required/>
																		 	<input type='radio' name='rating' id='rating3' value='3' required/>  <input type='radio' name='rating' id='rating4' value='4' required/>
																		  <input type='radio' name='rating' id='rating5' value='5' required/> <b>Success</b> <label class='radio-inline'></label><br><br>

																		 <h3> Reasons?</h3>
																		 <textarea name='reason' id='reason' rows='3' cols='73' required></textarea><br>
																		 <div style='position: relative; display: inline-block;' id='getstep'>
																		 <input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' />
																		 	 <input type='button' value='Next' class='del_button btn btn-danger btn-md' id='nextstep' />
																		 	 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>
																		 </div>
																		 	</div> </div>";
												}
										}
}
}else{
//echo "here";

	$qry19 = mysqli_query($conn,"SELECT * FROM perform as b
	WHERE b.timest= '" . mysqli_escape_string($conn,$timestamp) . "' and b.methodname='" . mysqli_escape_string($conn,$nextstepname) . "' and b.noneoftheabove='" . mysqli_escape_string($conn,$stepid) . "' ");
	$row12 = mysqli_fetch_assoc($qry19);
	if(!empty($row12)){
		//echo "true";
		echo "
			<div id='removestep'>
								<div style='position: relative; display: inline-block;' id='getstep'>
<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>
																														 <span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
																														 Rating 1:'Completely likely' for the user to go wrong at a particular action\n
																														 Rating 2: 'Very likely' for the user to go wrong at a particular action\n
																														 Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
																														 Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
																														 Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>


																						 								 <br>  <label class='radio-inline'></label>";

																						 if($row12['rating']== "1"){
																						 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' checked/>  <input type='radio' name='rating' id='rating2' value='2' />
																						 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
																						 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																						}else if($row12['rating'] == '2'){
																						 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1'/>  <input type='radio' name='rating' id='rating2' value='2' checked/>
																						 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
																						 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																						}else if($row12['rating'] == '3'){
																						 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																						 	 <input type='radio' name='rating' id='rating3' value='3' checked/>  <input type='radio' name='rating' id='rating4' value='4' />
																						 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																						}else if($row12['rating'] == '4'){
																						 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																						 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' checked/>
																						 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																						 }else{
																						 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																						 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
																						 	<input type='radio' name='rating' id='rating5' value='5' checked/> <b>Success</b> <label class='radio-inline'></label><br><br>";
																						 }

																						 			echo "				 <h3><b> Reasons?</h3>
																						 							 <textarea name='reason' id='reason' rows='3' cols='73' >".$row12['reasons']."</textarea><br>
		<div style='position: relative; display: inline-block;' id='getstep'>
								<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' />

										 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>

									 </div>	</div></div>";
}else{
	//echo "false";
	echo "		<div id='removestep'>	 <div style='position: relative; display: inline-block;' id='getstep'>
<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>				<span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action.Starting from the rating close to Failure(Left to right)\n
				Rating 1:'Completely likely' for the user to go wrong at a particular action\n
				Rating 2: 'Very likely' for the user to go wrong at a particular action\n
				Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
				Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
				Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>


			<br>  <label class='radio-inline'></label><b>Failure</b> <input type='radio' name='rating' id='rating1' value='1' reuired/>  <input type='radio' name='rating' id='rating2' value='2' required/>
				 <input type='radio' name='rating' id='rating3' value='3' required/>  <input type='radio' name='rating' id='rating4' value='4' required/>
				<input type='radio' name='rating' id='rating5' value='5' required/> <b>Success</b> <label class='radio-inline'></label><br><br>

<h3><b> Reasons?</h3>
					 <textarea name='reason' id='reason' rows='3' cols='73' ></textarea><br>
<div style='position: relative; display: inline-block;' id='getstep'>
						<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' />

								 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>

							 </div>	</div></div>";
}


}
}

public function getnextstepimage(){
		   $conn= mysqli_connect("localhost","root","","cognitivewalkthrough");
	$methodid=$this->input->post('methodid');
	//echo "methodid:".$methodid;
	$substeps=$this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image')
													 ->from('steps')
													 ->join('method_step', 'method_step.stepid = steps.stepid')
												 ->where('method_step.methodid',$methodid)
												 ->limit(1)
												 ->get()
												 ->result();
	//echo 'methodid:'.$methodid;
		$timestamp=$this->input->post('timestamp');
		$personaid = $this->input->post('personaid');
		$home = $this->input->post('home');
		//echo $personaid;
		$taskid = $this->input->post('taskid');
		$variantid = $this->input->post('variants');
		$qry8 = mysqli_query($conn,"SELECT * FROM method WHERE methodid ='" . mysqli_real_escape_string($conn,$methodid) . "'");


	 $rows4 = mysqli_fetch_assoc($qry8);

	 $methodname=$rows4['methodname'];
		$qry9 = mysqli_query($conn,"SELECT * FROM perform as b
													 		WHERE b.timest= '" . mysqli_escape_string($conn,$timestamp) . "' and b.methodname= '" . mysqli_escape_string($conn,$home) . "' and b.stepname='" . mysqli_escape_string($conn,$methodname) . "' and b.noneoftheabove='" . mysqli_escape_string($conn,'') . "' and EXISTS
													 		(
													 		SELECT * FROM method as a
													 		WHERE b.stepname = a.methodname
													 		)");
		$row2 = mysqli_fetch_assoc($qry9);
		if($methodid != 'None of the above'){
			//echo "in none of the above";

			if(!empty($row2)){
		//echo"checking if row2 is empty";
		 		if($qry8){
		//echo"checking if qey8 is empty";
		 		 //  echo "<select class='form-control' name='stepname' id='stepname'>";

			foreach ($substeps as $row1) {
	//	echo "getting next step";
		 echo "
		 <p>The feedback you would get upon selecting this alternative is:</p>
		 <input type='hidden' id='stepsid' name='stepsid' value='$row1->stepid'>";
		echo " <img src='http://localhost/cognitivewalkthrough/uploads/$row1->image'>";

		echo "<input type='hidden' id='stepsname' name='stepsname' value='$row1->stepname'>
		 	<div style='position: relative; display: inline-block;' id='getstep'>
		 <h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>	<span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
		 	Rating 1:'Completely likely' for the user to go wrong at a particular action\n
		 	Rating 2: 'Very likely' for the user to go wrong at a particular action\n
		 	Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
		 	Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
		 	Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>



		 	<br>  <label class='radio-inline'></label>";

		 	if($row2['rating']== "1"){
		 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' checked/>  <input type='radio' name='rating' id='rating2' value='2' disabled/>
		 	<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' disabled/>
		 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

		 }else if($row2['rating'] == '2'){
		 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1'/>  <input type='radio' name='rating' id='rating2' value='2' checked/>
		 	<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
		 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

		 }else if($row2['rating'] == '3'){
		 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
		 	<input type='radio' name='rating' id='rating3' value='3' checked/>  <input type='radio' name='rating' id='rating4' value='4' />
		 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

		 }else if($row2['rating'] == '4'){
		 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
		 	<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' checked/>
		 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

		 	}else{
		 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
		 	<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
		 	<input type='radio' name='rating' id='rating5' value='5' checked/> <b>Success</b> <label class='radio-inline'></label><br><br>";
		 	}

		 	echo "				 <h3><b> Reasons?</h3>
		 	<textarea name='reason' id='reason' rows='3' cols='73' >".$row2['reasons']."</textarea><br>
		 	<div style='position: relative; display: inline-block;' id='getstep'>
		 	<input type='button' value='Save' class='save btn btn-primary btn-md' id='save' disabled/>
		 		<input type='submit' value='Next' class='del_button btn btn-danger btn-md' id='nextstep' />
		 		 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>
		 </div>
		 		</div> </div>";


		 																 }

		 }
		 }else{
		//	 echo "method not present";

														 if($substeps){
		//echo"get questions for none of the above";
															//  echo "<select class='form-control' name='stepname' id='stepname'>";


																		 echo "</div>";
																	  foreach ($substeps as $row1) {

																	 echo "
																	 <p>The feedback you would get upon selecting this alternative is:</p>
																	 <input type='hidden' id='stepsid' name='stepsid' value='$row1->stepid'>";
														echo " <img src='http://localhost/cognitivewalkthrough/uploads/$row1->image'>";

														 echo "<input type='hidden' id='stepsname' name='stepsname' value='$row1->stepname'>";
													echo "	 <div id='removestep'><div style='position: relative; display: inline-block;' id='getstep'>
		<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>											<span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action.Starting from the rating close to Failure(Left to right)
													Rating 1: Completely likely for the user to go wrong at a particular action
													Rating 2: Very likely for the user to go wrong at a particular action
													Rating 3: Moderately likely for the user to go wrong at a particular action
													Rating 4: Slightly likely for the user to go wrong at a particular action
													Rating 5: Not at all likely  for the user to go wrong at a particular action'>Information about the rating(i)</span>

														 						 <br>  <label class='radio-inline'></label><b>Failure</b> <input type='radio' name='rating' id='rating1' value='1' reuired/>  <input type='radio' name='rating' id='rating2' value='2' required/>
														 							 <input type='radio' name='rating' id='rating3' value='3' required/>  <input type='radio' name='rating' id='rating4' value='4' required/>
														 							<input type='radio' name='rating' id='rating5' value='5' required/> <b>Success</b> <label class='radio-inline'></label><br><br>

														 					 <h3><b> Reasons?</h3>
														 					 <textarea name='reason' id='reason' rows='3' cols='73' required></textarea><br>
														 					 <div style='position: relative; display: inline-block;' id='getstep'>
														 						<input type='button' value='Save' class='save btn btn-primary btn-md' id='save' />
														 								 <input type='submit' value='Next' class='del_button btn btn-danger btn-md' id='nextstep' />
														 								 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>
														 </div>
														 								 </div></div>";
														}
													}
												}
											}
											else{
	//	echo"checking not none of the above";
													$qry19 = mysqli_query($conn,"SELECT * FROM perform as b
													WHERE b.timest= '" . mysqli_escape_string($conn,$timestamp) . "' and b.methodname='" . mysqli_escape_string($conn,$home) . "' and b.noneoftheabove='" . mysqli_escape_string($conn,$methodid) . "' ");
													$row12 = mysqli_fetch_assoc($qry19);
													if(!empty($row12)){
														//echo "true";
												//		echo"checking none of the above";
														echo "
															<div id='removestep'>
																				<div style='position: relative; display: inline-block;' id='getstep'>
												<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>
																																										 <span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
																																										 Rating 1:'Completely likely' for the user to go wrong at a particular action\n
																																										 Rating 2: 'Very likely' for the user to go wrong at a particular action\n
																																										 Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
																																										 Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
																																										 Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>


																																		 								 <br>  <label class='radio-inline'></label>";

																																		 if($row12['rating']== "1"){
																																		 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' checked/>  <input type='radio' name='rating' id='rating2' value='2' />
																																		 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
																																		 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																																		}else if($row12['rating'] == '2'){
																																		 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1'/>  <input type='radio' name='rating' id='rating2' value='2' checked/>
																																		 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
																																		 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																																		}else if($row12['rating'] == '3'){
																																		 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																																		 	 <input type='radio' name='rating' id='rating3' value='3' checked/>  <input type='radio' name='rating' id='rating4' value='4' />
																																		 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																																		}else if($row12['rating'] == '4'){
																																		 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																																		 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' checked/>
																																		 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																																		 }else{
																																		 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																																		 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
																																		 	<input type='radio' name='rating' id='rating5' value='5' checked/> <b>Success</b> <label class='radio-inline'></label><br><br>";
																																		 }

																																		 			echo "				 <h3><b> Reasons?</h3>
																																		 							 <textarea name='reason' id='reason' rows='3' cols='73' >".$row12['reasons']."</textarea><br>
														<div style='position: relative; display: inline-block;' id='getstep'>
																				<input type='button' value='Save' class='save btn btn-primary btn-md' id='save' disabled/>

																						 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>

																					 </div>	</div></div>";
												}

													else {
										//				echo "none of the above not present";
												echo "<div id='removestep'>
														<div style='position: relative; display: inline-block;' id='getstep'>
		<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>												<span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action.Starting from the rating close to Failure(Left to right)
														Rating 1: Completely likely for the user to go wrong at a particular action
														Rating 2: Very likely for the user to go wrong at a particular action
														Rating 3: Moderately likely for the user to go wrong at a particular action
														Rating 4: Slightly likely for the user to go wrong at a particular action
														Rating 5: Not at all likely  for the user to go wrong at a particular action'>Information about the rating(i)</span>

																				 <br>  <label class='radio-inline'></label><b>Failure</b> <input type='radio' name='rating' id='rating1' value='1' reuired/>  <input type='radio' name='rating' id='rating2' value='2' required/>
																					 <input type='radio' name='rating' id='rating3' value='3' required/>  <input type='radio' name='rating' id='rating4' value='4' required/>
																					<input type='radio' name='rating' id='rating5' value='5' required/> <b>Success</b> <label class='radio-inline'></label><br><br>

																			 <h3><b> Reasons?</h3>
																			 <textarea name='reason' id='reason' rows='3' cols='73' required></textarea><br>
																			 <div style='position: relative; display: inline-block;' id='getstep'>
																				<input type='button' value='Save' class='save btn btn-primary btn-md' id='save' />

																						 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>
														</div>
																						 </div></div>";

													}
		}
}


public function getnextstepimage1(){
		   $conn= mysqli_connect("localhost","root","","cognitivewalkthrough");
	$methodid=$this->input->post('methodid');
	echo 'methodid'.$methodid;
		$timestamp=$this->input->post('timestamp');
		$personaid = $this->input->post('personaid');
		$home = $this->input->post('home');
		echo $home;
		$taskid = $this->input->post('taskid');
		$variantid = $this->input->post('variants');
		$questions = $this->db->select('questions.questionid,questions.questionname')
		 															->from('questions')
		 															->join('variant_question', 'variant_question.questionid = questions.questionid')
		 															->where('variant_question.variantid',$variantid)
		 															->get()
		 															->result();
		$substeps=$this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image')
														 ->from('steps')
														 ->join('method_step', 'method_step.stepid = steps.stepid')
													 ->where('method_step.methodid',$methodid)
													 ->limit(1)
													 ->get()
													 ->result();

 $qry8 = mysqli_query($conn,"SELECT * FROM method WHERE methodid ='" . mysqli_real_escape_string($conn,$methodid) . "'");
$rows4 = mysqli_fetch_assoc($qry8);
$methodname=$rows4['methodname'];
											 		//echo $stepname;
$qry9 = mysqli_query($conn,"SELECT * FROM perform as b
											 		WHERE b.timest= '" . mysqli_escape_string($conn,$timestamp) . "' and b.stepname= '" . mysqli_escape_string($conn,$methodname) . "' and b.noneoftheabove='" . mysqli_escape_string($conn,'') . "' and EXISTS
											 		(
											 		SELECT * FROM method as a
											 		WHERE b.stepname = a.methodname
											 		)");
$row2 = mysqli_fetch_assoc($qry9);
if($methodid != 'None of the above'){
	//echo "in none of the above";

	if(!empty($row2)){
//echo"checking if row2 is empty";
 		if($qry8){
//echo"checking if qey8 is empty";
 		 //  echo "<select class='form-control' name='stepname' id='stepname'>";

 foreach ($qry9 as $row3) {
 	# code...
echo"checking get questions";

 		echo 	"<br><br>

 			<h4>Question</h4> <input type='text' name='questions[]' class='form-control' id='questions' style='font-weight:bold;background-color:#F0FFFF' value='".$row3['questionname']."' disabled/>
 	<input type='hidden' name='questionid[]' id='questionsid' value='".$row3['question']."'/>
 	<input type='hidden' name='questionname[]' id='questionsname' value='".$row3['questionname']."'/>
 		 <h4>Add question</h4>
 		 <input type='text' class='form-control' style='font-weight:bold;background-color:#F0FFFF' name='newquestion[]' id='new_questions'".$row3['stepname']."' value='".$row3['added_question']."' readonly/>
 	<h4>Answer</h4>";


 	$answer = $row3['answer'];
 					if ($answer=='no'){
 				echo "<select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
 			<option value=''>Select</option>
 			<option selected='selected' value='no'>no</option>
 			<option value='probably no'>probably no</option>
 		 <option value='unknown'>unknown</option>
 		 <option value='probably yes'>probably yes</option>
 		 <option value='yes'>yes</option></select>";

 	 }else if ($answer=='probably no'){
 	echo "<select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
 	<option value=''>Select</option>
 	 <option value='no'>no</option>
 	 <option selected='selected' value='probably no'>probably no</option>
 	 <option value='unknown'>unknown</option>
 	 <option value='probably yes'>probably yes</option>
 	 <option value='yes'>yes</option></select>";

 	 }else if ($answer=='unknown'){
 	echo "<select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
 	<option value=''>Select</option>
 	 <option value='no'>no</option>
 	 <option value='probably no'>probably no</option>
 	 <option selected='selected' value='unknown'>unknown</option>
 	 <option value='probably yes'>probably yes</option>
 	 <option value='yes'>yes</option></select>";

 	}else if ($answer=='probably yes'){
 	 echo "<select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
 	<option value=''>Select</option>
 	<option value='no'>no</option>
 	<option value='probably no'>probably no</option>
 	 <option value='unknown'>unknown</option>
 	 <option selected='selected' value='probably yes'>probably yes</option>
 	 <option value='yes'>yes</option></select>";

 	}else if ($answer=='yes'){
 	echo " <select class='form-control' id='".$row3['stepid']."' name='answer[]' id='answer' >
 	<option value=''>Select</option>
 	<option value='no'>no</option>
 	<option value='probably no'>probably no</option>
 	<option value='unknown'>unknown</option>
 	 <option value='probably yes'>probably yes</option>
 	 <option selected='selected' value='yes'>yes</option></select>";

 		}

 		 echo "<h4>Credible story</h4><textarea name='question1_text[]' id='description'".$row3['question']."' rows='3' cols='73' value='".$row3['description']."' >".$row3['description']."</textarea><br>";


 		echo "</div>";
 	}
	foreach ($substeps as $row1) {
echo "getting next step";
 echo "
 <p>The feedback you would get upon selecting this alternative is:</p>
 <input type='hidden' id='stepsid' name='stepsid' value='$row1->stepid'>";
echo " <img src='http://localhost/cognitivewalkthrough/uploads/$row1->image'>";

echo "<input type='hidden' id='stepsname' name='stepsname' value='$row1->stepname'>
 	<div style='position: relative; display: inline-block;' id='getstep'>
 <h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>	<span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
 	Rating 1:'Completely likely' for the user to go wrong at a particular action\n
 	Rating 2: 'Very likely' for the user to go wrong at a particular action\n
 	Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
 	Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
 	Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>



 	<br>  <label class='radio-inline'></label>";

 	if($row3['rating']== "1"){
 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' checked/>  <input type='radio' name='rating' id='rating2' value='2' disabled/>
 	<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' disabled/>
 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

 }else if($row3['rating'] == '2'){
 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1'/>  <input type='radio' name='rating' id='rating2' value='2' checked/>
 	<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

 }else if($row3['rating'] == '3'){
 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
 	<input type='radio' name='rating' id='rating3' value='3' checked/>  <input type='radio' name='rating' id='rating4' value='4' />
 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

 }else if($row3['rating'] == '4'){
 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
 	<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' checked/>
 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

 	}else{
 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
 	<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
 	<input type='radio' name='rating' id='rating5' value='5' checked/> <b>Success</b> <label class='radio-inline'></label><br><br>";
 	}

 	echo "				 <h3><b> Reasons?</h3>
 	<textarea name='reason' id='reason' rows='3' cols='73' >".$row3['reasons']."</textarea><br>
 	<div style='position: relative; display: inline-block;' id='getstep'>
 	<input type='button' value='Save' class='save btn btn-primary btn-md' id='save' disabled/>
 		<input type='submit' value='Next' class='del_button btn btn-danger btn-md' id='nextstep' />
 		 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>
 </div>
 		</div> </div>";


 																 }

 }
 }else{
	 echo "method not present";

												 if($substeps){
echo"get questions for none of the above";
													//  echo "<select class='form-control' name='stepname' id='stepname'>";

															 foreach ($questions as $each) {
																 echo 	"<br><br>
																		<h4>Question</h4><input type='text' name='questions[]' class='form-control' id='questions' style='font-weight:bold;background-color:#F0FFFF' value='$each->questionname' disabled/>
															<input type='hidden' name='questionid[]' id='questionsid' value='$each->questionid'/>
															<input type='hidden' name='questionname[]' id='questionsname' value='$each->questionname'/>
																	<h4>Add question</h4>
																	<input type='text' class='form-control' name='newquestion[]' style='font-weight:bold;width:100%;background-color:#F0FFFF' id='new_questions$each->questionid' />


																	<h4>Answer:</h4>  <select class='form-control' name='answer[]' id='answer' required>
															 <option value=''>Select</option>
															 <option value='no'>no</option>
															 <option value='probably no'>probably no</option>
															<option value='unknown'>unknown</option>
															<option value='probably yes'>probably yes</option>
															<option value='yes'>yes</option></select>

																	<h4>Credible story</h4><textarea name='question1_text[]' id='description$each->questionid' rows='3' cols='73' required></textarea><br>";

															}

																 echo "</div>";
															  foreach ($substeps as $row1) {

															 echo "
															 <p>The feedback you would get upon selecting this alternative is:</p>
															 <input type='hidden' id='stepsid' name='stepsid' value='$row1->stepid'>";
												echo " <img src='http://localhost/cognitivewalkthrough/uploads/$row1->image'>";

												 echo "<input type='hidden' id='stepsname' name='stepsname' value='$row1->stepname'>";
											echo "	 <div id='removestep'><div style='position: relative; display: inline-block;' id='getstep'>
<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>											<span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action.Starting from the rating close to Failure(Left to right)
											Rating 1: Completely likely for the user to go wrong at a particular action
											Rating 2: Very likely for the user to go wrong at a particular action
											Rating 3: Moderately likely for the user to go wrong at a particular action
											Rating 4: Slightly likely for the user to go wrong at a particular action
											Rating 5: Not at all likely  for the user to go wrong at a particular action'>Information about the rating(i)</span>

												 						 <br>  <label class='radio-inline'></label><b>Failure</b> <input type='radio' name='rating' id='rating1' value='1' reuired/>  <input type='radio' name='rating' id='rating2' value='2' required/>
												 							 <input type='radio' name='rating' id='rating3' value='3' required/>  <input type='radio' name='rating' id='rating4' value='4' required/>
												 							<input type='radio' name='rating' id='rating5' value='5' required/> <b>Success</b> <label class='radio-inline'></label><br><br>

												 					 <h3><b> Reasons?</h3>
												 					 <textarea name='reason' id='reason' rows='3' cols='73' required></textarea><br>
												 					 <div style='position: relative; display: inline-block;' id='getstep'>
												 						<input type='button' value='Save' class='save btn btn-primary btn-md' id='save' />
												 								 <input type='submit' value='Next' class='del_button btn btn-danger btn-md' id='nextstep' />
												 								 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>
												 </div>
												 								 </div></div>";
												}
											}
										}
									}
									else{
echo"checking not none of the above";
											$qry19 = mysqli_query($conn,"SELECT * FROM perform as b
											WHERE b.timest= '" . mysqli_escape_string($conn,$timestamp) . "' and b.methodname='" . mysqli_escape_string($conn,$home) . "' and b.noneoftheabove='" . mysqli_escape_string($conn,$methodid) . "' ");
											$row12 = mysqli_fetch_assoc($qry19);
											if(!empty($row12)){
												//echo "true";
												echo"checking none of the above";
												echo "
													<div id='removestep'>
																		<div style='position: relative; display: inline-block;' id='getstep'>
										<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>
																																								 <span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
																																								 Rating 1:'Completely likely' for the user to go wrong at a particular action\n
																																								 Rating 2: 'Very likely' for the user to go wrong at a particular action\n
																																								 Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
																																								 Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
																																								 Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>


																																 								 <br>  <label class='radio-inline'></label>";

																																 if($row12['rating']== "1"){
																																 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' checked/>  <input type='radio' name='rating' id='rating2' value='2' />
																																 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
																																 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																																}else if($row12['rating'] == '2'){
																																 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1'/>  <input type='radio' name='rating' id='rating2' value='2' checked/>
																																 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
																																 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																																}else if($row12['rating'] == '3'){
																																 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																																 	 <input type='radio' name='rating' id='rating3' value='3' checked/>  <input type='radio' name='rating' id='rating4' value='4' />
																																 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																																}else if($row12['rating'] == '4'){
																																 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																																 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' checked/>
																																 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																																 }else{
																																 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																																 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
																																 	<input type='radio' name='rating' id='rating5' value='5' checked/> <b>Success</b> <label class='radio-inline'></label><br><br>";
																																 }

																																 			echo "				 <h3><b> Reasons?</h3>
																																 							 <textarea name='reason' id='reason' rows='3' cols='73' >".$row12['reasons']."</textarea><br>
												<div style='position: relative; display: inline-block;' id='getstep'>
																		<input type='button' value='Save' class='save btn btn-primary btn-md' id='save' disabled/>

																				 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>

																			 </div>	</div></div>";
										}

											else {
												echo "none of the above not present";
										echo "<div id='removestep'>
												<div style='position: relative; display: inline-block;' id='getstep'>
<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>												<span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action.Starting from the rating close to Failure(Left to right)
												Rating 1: Completely likely for the user to go wrong at a particular action
												Rating 2: Very likely for the user to go wrong at a particular action
												Rating 3: Moderately likely for the user to go wrong at a particular action
												Rating 4: Slightly likely for the user to go wrong at a particular action
												Rating 5: Not at all likely  for the user to go wrong at a particular action'>Information about the rating(i)</span>

																		 <br>  <label class='radio-inline'></label><b>Failure</b> <input type='radio' name='rating' id='rating1' value='1' reuired/>  <input type='radio' name='rating' id='rating2' value='2' required/>
																			 <input type='radio' name='rating' id='rating3' value='3' required/>  <input type='radio' name='rating' id='rating4' value='4' required/>
																			<input type='radio' name='rating' id='rating5' value='5' required/> <b>Success</b> <label class='radio-inline'></label><br><br>

																	 <h3><b> Reasons?</h3>
																	 <textarea name='reason' id='reason' rows='3' cols='73' required></textarea><br>
																	 <div style='position: relative; display: inline-block;' id='getstep'>
																		<input type='button' value='Save' class='save btn btn-primary btn-md' id='save' />

																				 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>
												</div>
																				 </div></div>";

											}
}
}

public function cwperformfirststep()
{

		   $conn= mysqli_connect("localhost","root","","cognitivewalkthrough");
	$this->load->helper(array('form','file','url'));
	if($this->session->userdata('logged_in')){
$session_data = $this->session->userdata('logged_in');
$data['adminid'] = $session_data['adminid'];
$data['firstname'] = $session_data['firstname'];
$data['lastname'] = $session_data['lastname'];
$data['email'] = $session_data['email'];
$data['username'] = $session_data['username'];
//  $data['data'] = 'Edit persona';

$data['timestamp'] = $this->input->post('timestamp');
//echo $timestamp;

$timestamp = $this->input->post('timestamp');
$personaid = $this->input->post('personaid');
//echo $personaid;
$taskid = $this->input->post('taskid');
//$methodid = $this->input->post('method');
//echo $methodid;
$variantid = $this->input->post('variants');
//echo $variantid;
//$variantname = $this->input->post('variantname');
//echo $variantname;s

if($variantid=='6'){
	// $qry8 = mysqli_query($conn,"SELECT steps.stepid,steps.stepname,steps.image FROM steps join method_step on method_step.stepid=steps.stepid WHERE method_step.methodid ='" . mysqli_real_escape_string($conn,$methodid) . "' limit 1 ");
	// $rows4 = mysqli_fetch_assoc($qry8);
	// $stepname=$rows4['stepname'];
	// $qry9 = mysqli_query($conn,"SELECT * FROM perform as b
	// WHERE b.timest= '" . mysqli_escape_string($conn,$timestamp) . "' and b.stepname= '" . mysqli_escape_string($conn,$stepname) . "' and EXISTS
	// (
	// SELECT * FROM steps as a
	// WHERE b.stepname = a.stepname
	// )");
	// $rows5 = mysqli_fetch_assoc($qry9);
	$data['records'] = $this->db
			 ->select('method.methodid,method.methodname,method.description,method.action')
			 ->from('method')
			 ->join('task_method', 'method.methodid = task_method.methodid')
			 ->where('task_method.taskid',$taskid)
			 ->get()
			 ->result();

	$data['variants']=$this->db
					->select('variantid,variantname')
					->from('variantname')
					->where('variantid',$variantid)
					->get()
					->result();

			//  if(!empty($rows5)){

				//echo "in new if";
		// $data['records'] = $this->db->select('method.methodid,method.methodname')
		// 		 												->from('method')
		// 		 												->where('methodid',$methodid)
		// 		 												->get()
		// 		 												->result();

		// $data['variants']=$this->db->select('variantid,variantname')
		// 		 											 ->from('variantname')
		// 													 ->where('variantid',$variantid)
		// 		 										 	 ->get()
		// 		 										 	 ->result();

		$data['task']=$this->db->select('*')
											 		 ->from('task')
													 ->where('taskid',$taskid)
											 		 ->get()
											 		 ->result();

		$data['persona']=$this->db->select('*')
													 		->from('persona')
													 		->where('personaid',$personaid)
													 		->get()
													 		->result();

		// $data['steps'] = $this->db->select('steps.stepid,steps.stepname,steps.image,altsteps.altstepid,altsteps.altstepname,altsubsteps.altsubstepid,altsubsteps.altsubstepimage,altsubsteps.altsubstepname')
		// 														->from('steps')
		// 												  	->join('method_step', 'method_step.stepid = steps.stepid')
		// 														->join('steps_altsteps','steps.stepid = steps_altsteps.stepid')
		// 														->join('altsteps','steps_altsteps.altstepid = altsteps.altstepid')
		// 														->join('altsteps_altsubsteps','altsteps.altstepid = altsteps_altsubsteps.altstepid')
		// 														->join('altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
		// 														->where('method_step.methodid',$methodid)
		// 														->get()
		// 														->result();

		//  $data['substeps']=$this->db->select('steps.stepid,steps.stepname,steps.image')
		//  													->from('steps')
		//  													->join('method_step', 'method_step.stepid = steps.stepid')
		//  												->where('method_step.methodid',$methodid)
		//  												->limit(1)
		// 												->get()
		//  												->result();

			// $data['substeps1'] = $this->db->select('steps.stepid,steps.stepname,steps.image')
			// 													->from('steps')
			// 													->join('method_step', 'method_step.stepid = steps.stepid')
			// 												->where('method_step.methodid',$methodid)
			// 												->limit(1)
			// 												->get()
			// 												->result();

	// $data['qry9'] = $qry9;


	//SELECT steps.stepid,steps.stepname,steps.image, perform.* from perform,steps where perform.timest=1495701790 and steps.stepname = perform.stepname and perform.stepid=steps.stepid and perform.methodid = 204
		// $data['questions'] = $this->db->select('questions.questionid,questions.questionname')
		// 															->from('questions')
		// 															->join('variant_question', 'variant_question.questionid = questions.questionid')
		// 															->where('variant_question.variantid',$variantid)
		// 															->get()
		// 															->result();

																	// $data['steppresent'] = $qry8;
		$this->load->view('firststepinmcwperform_fornone',$data);
	}else{
		$data['records'] = $this->db
				 ->select('method.methodid,method.methodname,method.description,method.action')
				 ->from('method')
				 ->join('task_method', 'method.methodid = task_method.methodid')
				 ->where('task_method.taskid',$taskid)
				 ->get()
				 ->result();

		$data['variants']=$this->db
						->select('variantid,variantname')
						->from('variantname')
						->where('variantid',$variantid)
						->get()
						->result();


				//	echo "in new if";

			$data['task']=$this->db->select('*')
												 		 ->from('task')
														 ->where('taskid',$taskid)
												 		 ->get()
												 		 ->result();

			$data['persona']=$this->db->select('*')
														 		->from('persona')
														 		->where('personaid',$personaid)
														 		->get()
														 		->result();

						$data['questions'] = $this->db->select('questions.questionid,questions.questionname')
																		->from('questions')
																		->join('variant_question', 'variant_question.questionid = questions.questionid')
																		->where('variant_question.variantid',$variantid)
																		->get()
																		->result();


			$this->load->view('firststepinmcwperform',$data);
	}}
else{
redirect('login', 'refresh');
}
}

public function performdatafirststep(){

		$sessionid=session_id();
		//echo "the session id is: \n".$sessionid;
		$timestamp = $this->input->post('timestamp');
		//echo 'timestamp:'.$timestamp;
$adminid = $this->input->post('adminid');
//echo 'adminid:'.$adminid;
$this->load->model('task_model');


$result= $this->task_model->performdatafirststep($adminid,$sessionid,$timestamp);

if($result){
echo "Data saved successfully";
}

}


public function performdatafirststepfromnone(){

		$sessionid=session_id();
		//echo "the session id is: \n".$sessionid;
		$timestamp = $this->input->post('timestamp');
		//echo 'timestamp:'.$timestamp;
$adminid = $this->input->post('adminid');
//echo 'adminid:'.$adminid;
$this->load->model('task_model');


$result= $this->task_model->performdatafirststepfromnone($adminid,$sessionid,$timestamp);

if($result){
echo "Data saved successfully";
}

}

public function removenextaction(){
	$conn= mysqli_connect("localhost","root","","cognitivewalkthrough");
	$timestamp = $this->input->get('timestamp');
	$nextstepname = $this->input->get('nextstepname');
$stepname = $this->input->get('stepid');
  $qry9 = mysqli_query($conn,"SELECT * FROM perform as b
  WHERE b.timest= '" . mysqli_escape_string($conn,$timestamp) . "' and b.methodname= '" . mysqli_escape_string($conn,$nextstepname) . "' and b.noneoftheabove='" . mysqli_escape_string($conn,'None of the above') . "' ");
  $row2 = mysqli_fetch_assoc($qry9);
if(!empty($row2)){

	echo "<div id='removestep'>
						<div style='position: relative; display: inline-block;' id='getstep'>
<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>
																												 <span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
																												 Rating 1:'Completely likely' for the user to go wrong at a particular action\n
																												 Rating 2: 'Very likely' for the user to go wrong at a particular action\n
																												 Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
																												 Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
																												 Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>


																				 								 <br>  <label class='radio-inline'></label>";

																				 if($row2['rating']== "1"){
																				 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' checked/>  <input type='radio' name='rating' id='rating2' value='2' />
																				 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
																				 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																				 }else if($row2['rating'] == '2'){
																				 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1'/>  <input type='radio' name='rating' id='rating2' value='2' checked/>
																				 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
																				 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																				 }else if($row2['rating'] == '3'){
																				 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																				 	 <input type='radio' name='rating' id='rating3' value='3' checked/>  <input type='radio' name='rating' id='rating4' value='4' />
																				 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																				 }else if($row2['rating'] == '4'){
																				 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																				 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' checked/>
																				 	<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

																				 }else{
																				 	echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
																				 	 <input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
																				 	<input type='radio' name='rating' id='rating5' value='5' checked/> <b>Success</b> <label class='radio-inline'></label><br><br>";
																				 }

																				 			echo "				 <h3><b> Reasons?</h3>
																				 							 <textarea name='reason' id='reason' rows='3' cols='73' >".$row2['reasons']."</textarea><br>
	<div style='position: relative; display: inline-block;' id='getstep'>
																												<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' />

																				 										 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>

																				 										</div> </div></div>";
}else{






	//foreach ($questions as $each) {
		# code...

echo "<div id='removestep'>";

	echo "<div style='position: relative; display: inline-block;' id='getstep'>
<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>							 <span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
							 Rating 1:'Completely likely' for the user to go wrong at a particular action\n
							 Rating 2: 'Very likely' for the user to go wrong at a particular action\n
							 Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
							 Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
							 Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>

							 <br>  <label class='radio-inline'></label><b>Failure</b> <input type='radio' name='rating' id='rating1' value='1' reuired/>  <input type='radio' name='rating' id='rating2' value='2' required/>
								 <input type='radio' name='rating' id='rating3' value='3' required/>  <input type='radio' name='rating' id='rating4' value='4' required/>
								<input type='radio' name='rating' id='rating5' value='5' required/> <b>Success</b> <label class='radio-inline'></label><br><br>

						 <h3><b> Reasons?</h3>
						 <textarea name='reason' id='reason' rows='3' cols='73' required></textarea><br>
						 <div style='position: relative; display: inline-block;' id='getstep'>
							<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' />

									 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>
	</div>
									 </div></div>";
}
}

public function getnextaction(){
	$timestamp = $this->input->post('timestamp');
	$conn= mysqli_connect("localhost","root","","cognitivewalkthrough");
	$timestamp = $this->input->post('timestamp');
	$nextstepname = $this->input->post('nextstepname');
	$stepname = $this->input->post('stepid');
	$qry9 = mysqli_query($conn,"SELECT * FROM perform as b
	WHERE b.timest= '" . mysqli_escape_string($conn,$timestamp) . "' and b.stepname= '" . mysqli_escape_string($conn,$nextstepname) . "' and b.noneoftheabove='" . mysqli_escape_string($conn,'') . "' ");
	$row2 = mysqli_fetch_assoc($qry9);
	if(!empty($row2)){
	echo "	<div id='removenextaction'>
										 <h3>Feedback upon performing the current action</h3><input type='button' value='Next Action' class='nextsteplist btn btn-success btn-lg form-control' id='nextsteplist' />
										 <ul id='stepdrop'>
				 						</ul>
				 						</div>

				 						<ul id='getimage'>
				 						</ul><div id='removeaction'>


				<div id='removestep'><div style='position: relative; display: inline-block;' id='getstep'>
<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>										 <span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
										 Rating 1:'Completely likely' for the user to go wrong at a particular action\n
										 Rating 2: 'Very likely' for the user to go wrong at a particular action\n
										 Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
										 Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
										 Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>



										 <br>  <label class='radio-inline'></label>";

			# code...

				if($row2['rating']== "1"){
				echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' checked/>  <input type='radio' name='rating' id='rating2' value='2' />
				<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
				<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

			}else if($row2['rating'] == '2'){
				echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1'/>  <input type='radio' name='rating' id='rating2' value='2' checked/>
				<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
				<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

			}else if($row2['rating'] == '3'){
				echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
				<input type='radio' name='rating' id='rating3' value='3' checked/>  <input type='radio' name='rating' id='rating4' value='4' disabled/>
				<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

			}else if($row2['rating'] == '4'){
				echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
				<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' checked/>
				<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

				}else{
				echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
				<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
				<input type='radio' name='rating' id='rating5' value='5' checked/> <b>Success</b> <label class='radio-inline'></label><br><br>";
				}

					echo "				 <h3><b> Reasons?</h3>
									 <textarea name='reason' id='reason' rows='3' cols='73' >".$row2['reasons']."</textarea><br>
									 <div style='position: relative; display: inline-block;' id='getstep'>
										<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' />
												 <input type='button' value='Next' class='del_button btn btn-danger btn-md' id='nextstep' />
												 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>

												 </div></div></div>";


	}else{
	echo "<div id='removenextaction'>
	<h3>Feedback upon performing the current action</h3><input type='button' value='Next Action' class='nextsteplist btn btn-success btn-lg form-control' id='nextsteplist' />
	<ul id='stepdrop'>
	</ul></div>

	<ul id='getimage'>
	</ul>";
	echo "<div id='removeaction'><div id='removestep'>
	<div style='position: relative; display: inline-block;' id='getstep'>
<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>							 <span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
							 Rating 1:'Completely likely' for the user to go wrong at a particular action\n
							 Rating 2: 'Very likely' for the user to go wrong at a particular action\n
							 Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
							 Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
							 Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>

							 <br>  <label class='radio-inline'></label><b>Failure</b> <input type='radio' name='rating' id='rating1' value='1' reuired/>  <input type='radio' name='rating' id='rating2' value='2' required/>
								 <input type='radio' name='rating' id='rating3' value='3' required/>  <input type='radio' name='rating' id='rating4' value='4' required/>
								<input type='radio' name='rating' id='rating5' value='5' required/> <b>Success</b> <label class='radio-inline'></label><br><br>

						 <h3><b> Reasons?</h3>
						 <textarea name='reason' id='reason' rows='3' cols='73' required></textarea><br>
						 <div style='position: relative; display: inline-block;' id='getstep'>
							<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' />
   <input type='button' value='Next' class='del_button btn btn-danger' id='nextstep' />
									 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>
	</div>
									 </div></div>";
}
}


public function getnextaction1(){
///	$timestamp = $this->input->post('timestamp');
	$conn= mysqli_connect("localhost","root","","cognitivewalkthrough");
	$timestamp = $this->input->get('timestamp');
	$nextstepname = $this->input->get('nextstepname');
	$variantid = $this->input->get('variantid');
	$stepname = $this->input->get('stepid');
	$questions = $this->db->select('questions.questionid,questions.questionname')
																->from('questions')
																->join('variant_question', 'variant_question.questionid = questions.questionid')
																->where('variant_question.variantid',$variantid)
																->get()
																->result();

	$qry9 = mysqli_query($conn,"SELECT * FROM perform as b
	WHERE b.timest= '" . mysqli_escape_string($conn,$timestamp) . "' and b.stepname= '" . mysqli_escape_string($conn,$nextstepname) . "' and b.noneoftheabove='" . mysqli_escape_string($conn,'') . "' ");
	$row3 = mysqli_fetch_assoc($qry9);
	if(!empty($row3)){
		foreach ($qry9 as $row2) {

	echo "



													<h4>Question</h4><input type='text' name='questions[]' class='form-control' id='questions' style='font-weight:bold;background-color:#F0FFFF' value='".$row2['questionname']."' disabled/>
										<input type='hidden' name='questionid[]' id='questionsid' value='".$row2['question']."'/>
										<input type='hidden' name='questionname[]' id='questionsname' value='".$row2['questionname']."'/>
												<h4>Add question</h4>
												<input type='text' class='form-control' name='newquestion[]' style='font-weight:bold;background-color:#F0FFFF' id='new_questions'".$row2['stepname']."' value='".$row2['added_question']."' disabled/>


												<h4>Answer:</h4>";
												$answer = $row2['answer'];
															 if ($answer=='no'){
														 echo "<select class='form-control' id='".$row2['stepid']."' name='answer[]' id='answer' >
													 <option value=''>Select</option>
													 <option selected='selected' value='no'>no</option>
													 <option value='probably no'>probably no</option>
													<option value='unknown'>unknown</option>
													<option value='probably yes'>probably yes</option>
													<option value='yes'>yes</option></select>";

												}else if ($answer=='probably no'){
										 echo "<select class='form-control' id='".$row2['stepid']."' name='answer[]' id='answer' >
									 <option value=''>Select</option>
												<option value='no'>no</option>
												<option selected='selected' value='probably no'>probably no</option>
												<option value='unknown'>unknown</option>
												<option value='probably yes'>probably yes</option>
												<option value='yes'>yes</option></select>";

												}else if ($answer=='unknown'){
											 echo "<select class='form-control' id='".$row2['stepid']."' name='answer[]' id='answer' >
										 <option value=''>Select</option>
												<option value='no'>no</option>
												<option value='probably no'>probably no</option>
												<option selected='selected' value='unknown'>unknown</option>
												<option value='probably yes'>probably yes</option>
												<option value='yes'>yes</option></select>";

											 }else if ($answer=='probably yes'){
												echo "<select class='form-control' id='".$row2['stepid']."' name='answer[]' id='answer' >
										 <option value=''>Select</option>
										 <option value='no'>no</option>
										 <option value='probably no'>probably no</option>
												<option value='unknown'>unknown</option>
												<option selected='selected' value='probably yes'>probably yes</option>
												<option value='yes'>yes</option></select>";

											 }else if ($answer=='yes'){
											 echo " <select class='form-control' id='".$row2['stepid']."' name='answer[]' id='answer' >
										<option value=''>Select</option>
										<option value='no'>no</option>
										<option value='probably no'>probably no</option>
											 <option value='unknown'>unknown</option>
												<option value='probably yes'>probably yes</option>
												<option selected='selected' value='yes'>yes</option></select>";

												 }


										 echo "<h4>Credible story</h4><textarea name='question1_text[]' id='description'".$row2['question']."' rows='3' cols='73' value='".$row2['description']."' >".$row2['description']."</textarea><br>";


											 echo "</div>";
		}

	echo "</div>

	<div id='removestep'>


										 <h3>Feedback upon performing the current action</h3><input type='button' value='Next Action' class='nextsteplist btn btn-success btn-lg form-control' id='nextsteplist' />
										 <ul id='stepdrop'>
				 						</ul>
				 						</div>

				 						<ul id='getimage'>
				 						</ul><div id='removeaction'>


				<div id='removestep'><div style='position: relative; display: inline-block;' id='getstep'>
<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>										 <span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
										 Rating 1:'Completely likely' for the user to go wrong at a particular action\n
										 Rating 2: 'Very likely' for the user to go wrong at a particular action\n
										 Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
										 Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
										 Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>



										 <br>  <label class='radio-inline'></label>";

			# code...

				if($row2['rating']== "1"){
				echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' checked/>  <input type='radio' name='rating' id='rating2' value='2' />
				<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
				<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

			}else if($row2['rating'] == '2'){
				echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1'/>  <input type='radio' name='rating' id='rating2' value='2' checked/>
				<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
				<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

			}else if($row2['rating'] == '3'){
				echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
				<input type='radio' name='rating' id='rating3' value='3' checked/>  <input type='radio' name='rating' id='rating4' value='4' />
				<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

			}else if($row2['rating'] == '4'){
				echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
				<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' checked/>
				<input type='radio' name='rating' id='rating5' value='5' /> <b>Success</b> <label class='radio-inline'></label><br><br>";

				}else{
				echo "<b>Failure</b><input type='radio' name='rating' id='rating1' value='1' />  <input type='radio' name='rating' id='rating2' value='2' />
				<input type='radio' name='rating' id='rating3' value='3' />  <input type='radio' name='rating' id='rating4' value='4' />
				<input type='radio' name='rating' id='rating5' value='5' checked/> <b>Success</b> <label class='radio-inline'></label><br><br>";
				}

					echo "				 <h3><b> Reasons?</h3>
									 <textarea name='reason' id='reason' rows='3' cols='73' >".$row2['reasons']."</textarea><br>
									 <div style='position: relative; display: inline-block;' id='getstep'>
										<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' />
												 <input type='button' value='Next' class='del_button btn btn-danger btn-md' id='nextstep' />
												 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>

												 </div></div></div>";


	}else{
		$conn= mysqli_connect("localhost","root","","cognitivewalkthrough");
	 $questions_array = $_POST['questionid1'];
		 $questionname_array = $_POST['questionname1'];
	 $newquestion_array = $_POST['newquestion1'];
	 for ($i = 0; $i < count($questions_array); $i++) {
		 $question = mysqli_real_escape_string($conn,$questions_array[$i]);
 //	echo 'question:'.$question;
		 $questionname = mysqli_real_escape_string($conn,$questionname_array[$i]);
 		//echo 'question:'.$questionname;
		 $newquestion = mysqli_real_escape_string($conn,$newquestion_array[$i]);
		//foreach ($questions as $each) {
			# code...

	echo "<div id='removestep'>
	<br><br>
		 <h4>Question</h4><input type='text' name='questions[]' class='form-control' id='questions' style='font-weight:bold;background-color:#F0FFFF' value='$questionname' disabled/>
<input type='hidden' name='questionid[]' id='questionsid' value='$question'/>
<input type='hidden' name='questionname[]' id='questionsname' value='$questionname'/>
	 <h4>Add question</h4>
	 <input type='text' class='form-control' name='newquestion[]' style='font-weight:bold;background-color:#F0FFFF' id='new_questions$question' value='$newquestion' disabled/>


	 <h4>Answer:</h4>  <select class='form-control' name='answer[]' id='answer' required>
<option value=''>Select</option>
<option value='no'>no</option>
<option value='probably no'>probably no</option>
<option value='unknown'>unknown</option>
<option value='probably yes'>probably yes</option>
<option value='yes'>yes</option></select>

	<h4>Credible story</h4> <textarea name='question1_text[]' id='description$question' rows='3' cols='73' required></textarea><br>";

}

	echo "</div>

	<h3>Feedback upon performing the current action</h3><input type='button' value='Next Action' class='nextsteplist btn btn-success btn-lg form-control' id='nextsteplist' />
	<ul id='stepdrop'>
	</ul></div>

	<ul id='getimage'>
	</ul>";
	echo "<div id='removestep'>
	<div style='position: relative; display: inline-block;' id='getstep'>
<h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>							 <span style='color:#009933;' title='Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action. Starting from the rating close to Failure(Left to right)\n
							 Rating 1:'Completely likely' for the user to go wrong at a particular action\n
							 Rating 2: 'Very likely' for the user to go wrong at a particular action\n
							 Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
							 Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
							 Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n'>Information about the rating(i)</span>

							 <br>  <label class='radio-inline'></label><b>Failure</b> <input type='radio' name='rating' id='rating1' value='1' reuired/>  <input type='radio' name='rating' id='rating2' value='2' required/>
								 <input type='radio' name='rating' id='rating3' value='3' required/>  <input type='radio' name='rating' id='rating4' value='4' required/>
								<input type='radio' name='rating' id='rating5' value='5' required/> <b>Success</b> <label class='radio-inline'></label><br><br>

						 <h3><b> Reasons?</h3>
						 <textarea name='reason' id='reason' rows='3' cols='73' required></textarea><br>
						 <div style='position: relative; display: inline-block;' id='getstep'>
							<input type='submit' value='Save' class='save btn btn-primary btn-md' id='save' />
   <input type='button' value='Next' class='del_button btn btn-danger' id='nextstep' />
									 <a href='http://localhost/cognitivewalkthrough/index.php/variants/resultsview/$timestamp'><input type='button' class='btn btn-info btn-md' value='End evaluation' /></a>
	</div>
									 </div></div>";
}
}
//}
}

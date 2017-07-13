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

		if($this->input->post('save')){
           $data['results'] =  $this->variant_model->createvariant($variantdata);
					 $data['records'] = $this->db->select('task.*')
																			 ->from('task')
																			 ->get('')
																			 ->result();
           $this->load->view('backto_listofCWmethods_view',$data);
					} else{
			redirect('login', 'refresh');
		}
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
//echo $personaid;
//$methodid = $this->input->post('teacher');
$variantid =$this->input->post('variants');
//print_r($methodid);

	$this->load->model('variant_model');

  $taskdata = $this->input->post('taskname');
  //echo $taskdata;

	$data['results']=$this->variant_model->getvariant($taskdata,$personaid);
	$data['records'] = $this->db
			 ->select('method.methodid,method.methodname')
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


$data['records'] = $this->db->select('method.methodid,method.methodname')
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

$data['steps'] = $this->db->select('steps.stepid,steps.stepname,steps.image,altsteps.altstepid,altsteps.altstepname,altsubsteps.altsubstepid,altsubsteps.altsubstepimage,altsubsteps.altsubstepname')
														->from('steps')
												  	->join('method_step', 'method_step.stepid = steps.stepid')
														->join('steps_altsteps','steps.stepid = steps_altsteps.stepid')
														->join('altsteps','steps_altsteps.altstepid = altsteps.altstepid')
														->join('altsteps_altsubsteps','altsteps.altstepid = altsteps_altsubsteps.altstepid')
														->join('altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
														->where('method_step.methodid',$methodid)
														->get()
														->result();

 $data['substeps']=$this->db->select('steps.stepid,steps.stepname,steps.image')
 													->from('steps')
 													->join('method_step', 'method_step.stepid = steps.stepid')
 												->where('method_step.methodid',$methodid)
 												->limit(1)
												->get()
 												->result();

	$data['substeps1'] = $this->db->select('steps.stepid,steps.stepname,steps.image')
														->from('steps')
														->join('method_step', 'method_step.stepid = steps.stepid')
													->where('method_step.methodid',$methodid)
													->limit(1)
													->get()
													->result();

$this->load->view('cwperform_viewfornone',$data);
}else{

	$data['records'] = $this->db->select('method.methodid,method.methodname')
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

	$data['steps'] = $this->db->select('steps.stepid,steps.stepname,steps.image,altsteps.altstepid,altsteps.altstepname,altsubsteps.altsubstepid,altsubsteps.altsubstepimage,altsubsteps.altsubstepname')
															->from('steps')
													  	->join('method_step', 'method_step.stepid = steps.stepid')
															->join('steps_altsteps','steps.stepid = steps_altsteps.stepid')
															->join('altsteps','steps_altsteps.altstepid = altsteps.altstepid')
															->join('altsteps_altsubsteps','altsteps.altstepid = altsteps_altsubsteps.altstepid')
															->join('altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
															->where('method_step.methodid',$methodid)
															->get()
															->result();

	 $data['substeps']=$this->db->select('steps.stepid,steps.stepname,steps.image')
	 													->from('steps')
	 													->join('method_step', 'method_step.stepid = steps.stepid')
	 												->where('method_step.methodid',$methodid)
	 												->limit(1)
													->get()
	 												->result();

		$data['substeps1'] = $this->db->select('steps.stepid,steps.stepname,steps.image')
															->from('steps')
															->join('method_step', 'method_step.stepid = steps.stepid')
														->where('method_step.methodid',$methodid)
														->limit(1)
														->get()
														->result();

	$data['questions'] = $this->db->select('questions.questionid,questions.questionname')
																->from('questions')
																->join('variant_question', 'variant_question.questionid = questions.questionid')
																->where('variant_question.variantid',$variantid)
																->get()
																->result();
	$this->load->view('cwperform_view',$data);
}
}
else{
redirect('login', 'refresh');
}
}

public function resultsview()
{

		        $this->load->helper(array('form','file','url'));
		        if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['adminid'] = $session_data['adminid'];
				$data['firstname'] = $session_data['firstname'];
				$data['lastname'] = $session_data['lastname'];
				$data['email'] = $session_data['email'];
				$data['username'] = $session_data['username'];
	  //  $data['data'] = 'Edit persona';


	    $this->load->view('results_view',$data);
	}
	else{
				redirect('login', 'refresh');
			}
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
				 $message = $this->input->post('message');


         //Load email library

				 $this->db->select('persona.*,task_persona.*,task.*');
				 $this->db->from('persona');
				 $this->db->join('task_persona', 'persona.personaid = task_persona.personaid');
				 $this->db->join('task', 'task.taskid = task_persona.taskid');
				 $this->db->where('task_persona.taskid',$task);
				 $this->db->where('task_persona.personaid',$persona);
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
									The walkthrough has to be performed keeping in mind the task and persona. Kindly register as expert. The link to register is:<a href="http://localhost/cognitivewalkthrough/index.php/login/register" title="mcw">Multiway Cognitive Walkthrough</a></p>
										<b>Task:</b>'.$row1->taskname.'<br>
										<b>Persona</b>'.$row1->firstname.'									</body>
									</html>
									');

      }   //Send mail
			$this->load->model('task_model');
			$data['groups'] = $this->task_model->getTasklist($adminid);
         if($this->email->send()){
      echo "Email sent successfully.";
			}
         else
         {
					 echo "Error in sending Email.";

				 }
 $this->load->view('inviteexperts_view',$data);
      }}


			public function fetchstep(){
				$action = $this->input->post('action');
		 	 if($action=="nextstep"){
				  $variantid=$this->input->post('variantid');
				 $stepid=$this->input->post('stepname');
				 echo $stepid;
				 $altmethod=$this->input->post('altmethod');
				 echo $altmethod;
	  		 $methodid=$this->input->post('methodid');
				 $chosen_altmethod = $this->input->post('chosen_altmethod');
				 echo $chosen_altmethod;
				 $query1 = $this->db->select('steps.stepid,steps.stepname,steps.image,altsteps.altstepid,altsteps.altstepname,altsubsteps.altsubstepid,altsubsteps.altsubstepimage,altsubsteps.altsubstepname')
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

if($altmethod!='undefined' || $altmethod==""){



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

if($query5){

														 foreach ($query5 as $row1) {


		 																	echo " <input type='text' id='chosen_altmethod' value='$altmethod' readonly />
																			<div id='steplist'>


		 													<div id='stepslists_$row1->altsubstepid' value='$row1->altsubstepid' class='quest'>
															<div id='img_div'>
		 													<h2 id='stepslist_'$row1->altsubstepid' class='step'>$row1->altsubstepname</h2>
 														<img src='http://localhost/cognitivewalkthrough/uploads/$row1->altsubstepimage'>
		 																										 </div>";
							foreach($query4 as $each){

								echo 	"<br><br>
									 <input type='text' name='questions[]' class='form-control' id='questions' style='font-weight:bold;width:100%;background-color:#F0FFFF' value='$each->questionname' disabled/><br/>
						 <input type='hidden' name='questionid[]' id='questionsid' value='$each->questionid'/>
								 <a id='addq'>Add question</a>
								 <input type='text' class='form-control' name='newquestion[]' style='font-weight:bold;width:100%;height:5%' id='new_questions$each->questionid' /><br>


								 Answer:  <select class='form-control' name='answer[]' id='answer' required>
							<option value=''>Select</option>
							<option value='no'>no</option>
							<option value='probably no'>probably no</option>
						 <option value='unknown'>unknown</option>
						 <option value='probably yes'>probably yes</option>
						 <option value='yes'>yes</option></select>

								 <textarea name='question1_text[]' id='description$each->questionid' rows='3' cols='73' required></textarea><br>";

						 }

								echo "</div>";


							 }
					echo " <br><br>

						 <input type='hidden' name='nextstepid' id='nextsteplistid' value='$row1->altsubstepid' />
						 <b>View next step:</b><input type='button' value='Next step' class='nextsteplist btn btn-lg form-control' id='nextsteplist' />
						 <ul id='stepdrop'>
						 </ul>

						 <input type='hidden' name='alternativelistid' id='alternativelistid' value='$row1->altsubstepid' />
						 <b>View Alternatives:</b><input type='button' value='View alternatives' class='alternatives btn btn-lg form-control' id='alternativelist' />
						 <ul id='alternatedrop'>
						 </ul>

						 <h4> Rate the current page if it was a success(if you can relate to the steps provided in the dropdown) else rate failure and give reasons</h4>
						 <br>  <label class='radio-inline'></label><b>Failure</b> <input type='radio' name='rating' id='rating1' value='1' reuired/>  <input type='radio' name='rating' id='rating2' value='2' required/>
					 		 <input type='radio' name='rating' id='rating3' value='3' required/>  <input type='radio' name='rating' id='rating4' value='4' required/>
					 		<input type='radio' name='rating' id='rating5' value='5' required/> <b>Success</b> <label class='radio-inline'></label><br><br>

					 <label for='resaon'><b> Reasons?</b></label>
					 <textarea name='reason' id='reason' rows='3' cols='73' required></textarea><br>
						<input type='button' value='Save' class='save btn btn-primary form-control' id='save' /><br>
								 <input type='button' value='Next' class='del_button btn btn-danger form-control' id='nextstep' />
								 </div>";

							}

}else if($stepid!='undefined'){

 if($stepid > 900){
																		$query2 = $this->db->select('steps.stepid,steps.stepname,steps.image')
																		->from('steps')
																		->join('method_step', 'method_step.stepid = steps.stepid')
																		->where('method_step.methodid',$methodid)
																		->where('method_step.stepid',$stepid)
																		->limit(1)
																		->get()
																		->result();

																		if($query2){

																			foreach ($query2 as $row1) {

																				echo "<div id='steplist'>
																				<div id='stepslists_$row1->stepid' value='$row1->stepid' class='quest'>

																					<div id='img_div'>
																						<h2 id='stepslist_'$row1->stepid' class='step'>$row1->stepname</h2>


																 <img src='http://localhost/cognitivewalkthrough/uploads/$row1->image'>
													 </div>";

																 foreach($query4 as $each){
															echo 	"<br><br>
																 <input type='text' name='questions[]' class='form-control' id='questions' style='font-weight:bold;width:100%;background-color:#F0FFFF' value='$each->questionname' disabled/><br/>
													 <input type='hidden' name='questionid[]' id='questionsid' value='$each->questionid'/>
															 <a id='addq'>Add question</a>
															 <input type='text' class='form-control' name='newquestion[]' style='font-weight:bold;width:100%;height:5%' id='new_questions$each->questionid' /><br>


															 Answer:  <select class='form-control' name='answer[]' id='answer' required>
														<option value=''>Select</option>
														<option value='no'>no</option>
														<option value='probably no'>probably no</option>
													 <option value='unknown'>unknown</option>
													 <option value='probably yes'>probably yes</option>
													 <option value='yes'>yes</option></select>

															 <textarea name='question1_text[]' id='description$each->questionid' rows='3' cols='73' required></textarea><br>";

													 }

															echo "</div>";


														 }
												echo " <br><br>

													 <input type='hidden' name='nextstepid' id='nextsteplistid' value='$row1->stepid' />
													 <b>View next step:</b><input type='button' value='Next step' class='nextsteplist btn btn-lg form-control' id='nextsteplist' />
													 <ul id='stepdrop'>
													 </ul>

													 <input type='hidden' name='alternativelistid' id='alternativelistid' value='$row1->stepid' />
													 <b>View Alternatives:</b><input type='button' value='View alternatives' class='alternatives btn btn-lg form-control' id='alternativelist' />
													 <ul id='alternatedrop'>
													 </ul>

													 <h4> Rate the current page if it was a success(if you can relate to the steps provided in the dropdown) else rate failure and give reasons</h4>
													 <br>  <label class='radio-inline'></label><b>Failure</b> <input type='radio' name='rating' id='rating1' value='1' reuired/>  <input type='radio' name='rating' id='rating2' value='2' required/>
												 		 <input type='radio' name='rating' id='rating3' value='3' required/>  <input type='radio' name='rating' id='rating4' value='4' required/>
												 		<input type='radio' name='rating' id='rating5' value='5' required/> <b>Success</b> <label class='radio-inline'></label><br><br>

												 <label for='resaon'><b> Reasons?</b></label>
												 <textarea name='reason' id='reason' rows='3' cols='73' required></textarea><br>
												 	<input type='button' value='Save' class='save btn btn-primary form-control' id='save' /><br>
												 			 <input type='button' value='Next' class='del_button btn btn-danger form-control' id='nextstep' />
												 			 </div>";


}
}

																	else{

																		 $query3 = $this->db->select('*')
																		  														->from('altsubsteps')
																		 														->join('altsteps_altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
																		 														->join('altsteps','altsteps_altsubsteps.altstepid = altsteps.altstepid')
																		 														->where('altsteps_altsubsteps.altsubstepid',$stepid)
																																->where('altsteps_altsubsteps.altstepid',$chosen_altmethod)
																																->limit(1)
																		 													->get()
																	 													->result();
																														echo ("success query3");

																		if($query3){

																			foreach ($query3 as $row1) {
																				echo "
<input type='text' id='chosen_altmethod' value='$chosen_altmethod' readonly />
																				<div id='steplist'>
<div id='stepslists_$row1->altsubstepid' value='$row1->altsubstepid' class='quest'>

																					<div id='img_div'>
																						<h2 id='stepslist_'$row1->altsubstepid' class='step'>$row1->altsubstepname</h2>


																 <img src='http://localhost/cognitivewalkthrough/uploads/$row1->altsubstepimage'>
													 </div>";
foreach($query4 as $each){

echo 	"<br><br>
<input type='text' name='questions[]' class='form-control' id='questions' style='font-weight:bold;width:100%;background-color:#F0FFFF' value='$each->questionname' disabled/><br/>
<input type='hidden' name='questionid[]' id='questionsid' value='$each->questionid'/>
<a id='addq'>Add question</a>
<input type='text' class='form-control' name='newquestion[]' style='font-weight:bold;width:100%;height:5%' id='new_questions$each->questionid' /><br>


Answer:  <select class='form-control' name='answer[]' id='answer' required>
<option value=''>Select</option>
<option value='no'>no</option>
<option value='probably no'>probably no</option>
<option value='unknown'>unknown</option>
<option value='probably yes'>probably yes</option>
<option value='yes'>yes</option></select>

<textarea name='question1_text[]' id='description$each->questionid' rows='3' cols='73' required></textarea><br>";

}

echo "</div>";


}
echo " <br><br>

<input type='hidden' name='nextstepid' id='nextsteplistid' value='$row1->altsubstepid' />
<b>View next step:</b><input type='button' value='Next step' class='nextsteplist btn btn-lg form-control' id='nextsteplist' />
<ul id='stepdrop'>
</ul>

<input type='hidden' name='alternativelistid' id='alternativelistid' value='$row1->altsubstepid' />
<b>View Alternatives:</b><input type='button' value='View alternatives' class='alternatives btn btn-lg form-control' id='alternativelist' />
<ul id='alternatedrop'>
</ul>

<h4> Rate the current page if it was a success(if you can relate to the steps provided in the dropdown) else rate failure and give reasons</h4>
<br>  <label class='radio-inline'></label><b>Failure</b> <input type='radio' name='rating' id='rating1' value='1' reuired/>  <input type='radio' name='rating' id='rating2' value='2' required/>
	<input type='radio' name='rating' id='rating3' value='3' required/>  <input type='radio' name='rating' id='rating4' value='4' required/>
 <input type='radio' name='rating' id='rating5' value='5' required/> <b>Success</b> <label class='radio-inline'></label><br><br>

<label for='resaon'><b> Reasons?</b></label>
<textarea name='reason' id='reason' rows='3' cols='73' required></textarea><br>
<input type='button' value='Save' class='save btn btn-primary form-control' id='save' /><br>
<input type='button' value='Next' class='del_button btn btn-danger form-control' id='nextstep' />
</div>";

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
				 $query1 = $this->db->select('steps.stepid,steps.stepname,steps.image,altsteps.altstepid,altsteps.altstepname,altsubsteps.altsubstepid,altsubsteps.altsubstepimage,altsubsteps.altsubstepname')
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
																		$query2 = $this->db->select('steps.stepid,steps.stepname,steps.image')
																		->from('steps')
																		->join('method_step', 'method_step.stepid = steps.stepid')
																		->where('method_step.methodid',$methodid)
																		->where('method_step.stepid',$stepid)

																		->get()
																		->result();

																		if($query2){


																				echo "<select class='form-control' name='stepname' id='stepname' >";
																					foreach ($query2 as $row1) {
																				 echo "  <option value=''>Select</option>
																				 <option id='stepsid' value='$row1->stepid'>$row1->stepname </option>";
   																	 	echo "</select>";

																					 }
																				 }
																			 }
																	else{
																		$query3 = $this->db->select('altsteps.altstepid,altsteps.altstepname,altsubsteps.altsubstepid,altsubsteps.altsubstepimage,altsubsteps.altsubstepname')
													 				 														->from('altsubsteps')
																																->join('altsteps_altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
																																->join('altsteps','altsteps_altsubsteps.altstepid = altsteps.altstepid')
																															->where('altsteps_altsubsteps.altsubstepid',$stepid)
																															->where('altsteps_altsubsteps.altstepid',$chosen_altmethod)

																															->get()
																															->result();

																		if($query3){

																			echo "<select class='form-control' name='stepname' id='stepname' >";
																				foreach ($query3 as $row1) {
																			 echo "  <option value=''>Select</option>
																			 <option id='stepsid' value='$row1->altsubstepid'>$row1->altsubstepname </option>";
																		echo "</select>";


											 }


																					 }
																	}

			}
}

			public function fetchalternatives(){
				$action = $this->input->post('action');
		 	 if($action=="getalternatives"){
				  //$variantid=$this->input->post('variantid');
				 $stepid=$this->input->post('stepid');
	  		 $methodid=$this->input->post('methodid');


if($stepid > 900){
	$query1 = $this->db->select('altsteps.altstepid,altsteps.altstepname')
														 ->from('altsteps')
														  ->join('steps_altsteps','altsteps.altstepid = steps_altsteps.altstepid')
														 ->join('steps','steps.stepid = steps_altsteps.stepid')
														 ->where('steps_altsteps.stepid',$stepid)
														 ->get()
														 ->result();

																		if($query1){
echo "<select class='form-control' name='altmethodname' id='altmethodname' >";
 echo "  <option value=''>Select</option>";
	                                     foreach ($query1 as $row1) {

																		echo "<option id='stepsid' value='$row1->altstepid'>$row1->altstepname </option>";

}

																			   echo "</select>";


																				 }else{
																					 echo "There are no alternatives for this step";
																				 }
																			 }
																	else{
																		$query3 = $this->db->select('altsteps.altstepid,altsteps.altstepname,altsubsteps.altsubstepid,altsubsteps.altsubstepimage,altsubsteps.altsubstepname')
													 				 														->from('altsubsteps')
																																->join('altsteps_altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
																																->join('altsteps','altsteps_altsubsteps.altstepid = altsteps.altstepid')
																																->join('steps_altsteps','altsteps.altstepid = steps_altsteps.altstepid')
																																->join('steps','steps_altsteps.stepid = steps.stepid')
																																->join('method_step', 'method_step.stepid = steps.stepid')
																																->join('method','method.methodid = method_step.methodid')
																															->where('method_step.methodid',$methodid)
																															->where('altsteps_altsubsteps.altsubstepid',$stepid)
																															->limit(1)
																															->get()
																															->result();

																		if($query3){

																			foreach ($query3 as $row1) {
																				echo "<select class='form-control' name='altmethodname' id='altmethodname' >";
																				 echo "  <option value=''>Select</option>";
																					                                     foreach ($query1 as $row1) {

																					echo "<option id='stepsid' value='$row1->altstepid'>$row1->altstepname </option>";

																				}

																																							   echo "</select>";

											 }


																					 }
																	}

			}
}
}

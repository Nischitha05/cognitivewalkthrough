<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

	public function index()
	{

	   }


	   public function methodlistview()
	   {
	       //$this->load->view('methodlist_view');
	    if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
			$this->load->view('methodlist_view', $data);
		} else{
			redirect('login', 'refresh');
		}
	}

	 public function methodview()
	   {
	       //$this->load->view('methodlist_view');
	    if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
			$id= $this->input->post('methodfields');

			$taskid = $this->input->post('taskid');


			$data['altsteps']=$this->db
			->select('task.taskid,task.taskname,method_step.methodid,altsubsteps.altsubstepid,altsubsteps.altsubstepimage,altsubsteps.altsubstepname,altsubsteps.subaction_description')
			->from('task')
		 ->join('task_method','task_method.taskid = task.taskid')
		 ->join('method_step','task_method.methodid = method_step.methodid')
		 ->join('steps','method_step.stepid = steps.stepid')
		 ->join('steps_altsteps','steps.stepid = steps_altsteps.stepid')
		 ->join('altsteps','steps_altsteps.altstepid = altsteps.altstepid')
		 ->join('altsteps_altsubsteps','altsteps.altstepid = altsteps_altsubsteps.altstepid')
		 ->join('altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
		 ->group_by('altsubsteps.altsubstepname')
		 ->where('task.taskid',$taskid)
		 ->where('method_step.methodid !=',$id)
		 ->get()
		 ->result();

			 $data['steps'] = $this->db
			 				->select('steps.stepid,steps.stepname,steps.action_description,steps.image,task.taskid,task.taskname,method_step.methodid')
			 				->from('task')
			 				->join('task_method','task_method.taskid = task.taskid')
			 				->join('method_step','task_method.methodid = method_step.methodid')
			 				->join('steps','method_step.stepid = steps.stepid')
			 				->group_by('steps.stepname')
			 				->where('task.taskid',$taskid)
			 				->where('method_step.methodid !=',$id)
			 				->get()
			 				->result();

			$data['results'] = $this->db
	         ->select('method.methodid,method.methodname,method.description,task.taskid,task.taskname')
					 ->from('task')
					 ->join('task_method', 'task.taskid = task_method.taskid')
					 ->join('method', 'method.methodid = task_method.methodid')
	         ->where('task_method.methodid',$id)
	         ->get()
	         ->result();

			$data['records'] = $this->db->select ('steps.stepid,steps.stepname,steps.action_description,steps.image,method.methodid')
				 													->from('steps')
				 													->join('method_step','steps.stepid = method_step.stepid')
																	->join('method','method.methodid = method_step.methodid')
				 													->where('method_step.methodid',$id)
				 													->get('')
				 													->result();

			$this->load->view('methodcreate_view', $data);
		} else{
			redirect('login', 'refresh');
		}
	}

	public function methodcreate()
	   {

	    if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
			$data['level'] = $session_data['level'];
			$this->load->model('task_model');
			$taskdata = array(
      'taskname' => $this->input->post('taskname')
    						);
      $methoddata=array(
                 'methodname' => $this->input->post('methodname')
                 );

              $this->task_model->createtask($taskdata, $methoddata);
			 				$this->load->view('methodcreate_view',$data);
			} else{
						redirect('login', 'refresh');
					}

	   }
	//   }
	public function getPersona()
	{
	  if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
			$data['level'] = $session_data['level'];
 $adminid = $session_data['adminid'];
    	$this->load->model('persona_model');
    	$get_persona=$this->persona_model->view($adminid);
   // $data = array();
	   	$data['personas'] = $get_persona;
    	$this->load->view('createtask_view',$data);
      } else{
						redirect('login', 'refresh');
					}
	}

			public function createtask()
		{

		if($this->session->userdata('logged_in')){
		//	var_dump($_POST);
				$session_data = $this->session->userdata('logged_in');
				$data['adminid'] = $session_data['adminid'];
				$data['firstname'] = $session_data['firstname'];
				$data['username'] = $session_data['username'];
				$data['level'] = $session_data['level'];
				$data['data']='Persona list';
				 $adminid = $session_data['adminid'];
			  $this->load->model('task_model');
	//			if($this->input->post('save')){

				 		$target="./uploads/".basename($_FILES['message']['name']);
				 //echo $target;
				 		$message=$_FILES['message']['name'];
						$description= $this->input->post('reason');
								$action= $this->input->post('action');
				// echo $message;
				 		$taskdata = array(
				 		 'taskname' => $this->input->post('taskname'),
				 		 'Startimage' => $message,
						 'adminid' => $adminid
				 	 						);

				 		$personacheckdata = $this->input->post('personaid');

				 		$methoddata=array(
				 								'methodname' => $this->input->post('methodname'),

				 								);

						$_SESSION['taskname'] = $_POST['taskname'];
			//	$_SESSION['fields[]'] = $_POST['fields[]'];
						$data['taskname'] = $_SESSION['taskname'];

			//	$data['fields']=$_SESSION['fields[]'];
	          $data['gettask'] =  $this->task_model->createtask($taskdata,$personacheckdata,$description,$action);


	 if(move_uploaded_file($_FILES['message']['tmp_name'], $target)){
			 				// echo 'File uploaded successfully';
							$getdata=	 $this->load->view('methodlist_view',$data);
			  }
			  else{
			  		echo "upload failed. Please go back in the browser";

			  }

		}else{redirect('login', 'refresh');
		}
		}

		public function editcreatedtask()
	{

	if($this->session->userdata('logged_in')){
	//	var_dump($_POST);
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
			$data['level'] = $session_data['level'];
			$data['data']='Persona list';
			 $adminid = $session_data['adminid'];
			$this->load->model('task_model');
	//			if($this->input->post('save')){


			// echo $message;
$taskid= $this->input->post('taskid');
							 		$target="./uploads/".basename($_FILES['message']['name']);
							// echo $target;
							 		$message=$_FILES['message']['name'];
//echo 'message'.$message;
if(!empty($_FILES['message']['name'])) //new image uploaded
{

				         	$data['gettask'] =  $this->task_model->editcreatedtask($message);


						}
						  else{
								$filename = $this->input->post('filename');
							  	$data['gettask'] =  $this->task_model->editcreatedtask($filename);
									 $getdata=	 $this->load->view('methodlist_view',$data);
						  	//	echo "upload failed. Please go back in the browser";

						  }
							if(!empty($_FILES['message']['name'])) //new image uploaded
							{
							if(move_uploaded_file($_FILES['message']['tmp_name'], $target)){
												 // echo 'File uploaded successfully';
												 $conn= mysqli_connect("localhost","root","","cognitivewalkthrough");

												 mysqli_query($conn,"UPDATE task SET Startimage='$message'
												 WHERE `taskid` = '$taskid'");
												 $getdata=	 $this->load->view('methodlist_view',$data);
									 }else{

		 						  		echo "upload failed. Please go back in the browser";

		 						  }
	}

}else{redirect('login', 'refresh');
	}
	}


		public function addmoremethods()
	{
//echo "in addmethodtotask controller";
	if($this->session->userdata('logged_in')){
	//	var_dump($_POST);
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
			$data['level'] = $session_data['level'];
			$data['data']='Persona list';
			 $adminid = $session_data['adminid'];
			$this->load->model('task_model');
//echo "going to model";
					$gettask =  $this->task_model->addmethodtotask();
if($gettask){
	//echo "got data from database";
	foreach ($gettask as $row) {
	echo "<input type='radio' name='methodfields' id='methodfields' value='$row->methodid' required/>$row->methodname<br>
";
	}
	echo "<div id='removedesc'>";
	foreach ($gettask as $row1) {

	   echo "<h3>Description</h3>
	<textarea name='reason' id='reason' rows='3' cols='73' >$row1->description</textarea><br>
	<input type='hidden' name='action' id='action' value='$row1->action'>
	    "; break;}
			echo "</div>";

}
	}else{
		redirect('login', 'refresh');
	}
	}

	public function addmoremethods1()
{
//echo "in addmethodtotask controller";
if($this->session->userdata('logged_in')){
//	var_dump($_POST);
		$session_data = $this->session->userdata('logged_in');
		$data['adminid'] = $session_data['adminid'];
		$data['firstname'] = $session_data['firstname'];
		$data['username'] = $session_data['username'];
		$data['level'] = $session_data['level'];
		$data['data']='Persona list';
		 $adminid = $session_data['adminid'];
		$this->load->model('task_model');
//echo "going to model";
				$gettask =  $this->task_model->addmethodtotask1();
if($gettask){
//echo "got data from database";
foreach ($gettask as $row) {
echo "<input type='radio' name='stepfields' id='stepfields' class='form-group' value='$row->altstepid' required/>$row->altstepname<br>
";
}


}
}else{
	redirect('login', 'refresh');
}
}

public function deletemethods1()
{
//echo "in addmethodtotask controller";
if($this->session->userdata('logged_in')){
//	var_dump($_POST);
	$session_data = $this->session->userdata('logged_in');
	$data['adminid'] = $session_data['adminid'];
	$data['firstname'] = $session_data['firstname'];
	$data['username'] = $session_data['username'];
	$data['level'] = $session_data['level'];
	$data['data']='Persona list';
	 $adminid = $session_data['adminid'];
	$this->load->model('task_model');
//echo "going to model";
			$gettask =  $this->task_model->deletemethods1();
if($gettask){
//echo "got data from database";
foreach ($gettask as $row) {
	echo "<input type='radio' name='stepfields' id='stepfields' class='form-group' value='$row->altstepid' required/>$row->altstepname<br>
";
}

}
}else{
redirect('login', 'refresh');
}
}


public function editstep1(){
	$this->load->model('task_model');
//echo "going to model";
			$gettask =  $this->task_model->editstep1();
if($gettask){
//echo "got data from database";
foreach ($gettask as $row) {
	echo "<input type='text' name='stepfields2' class='form-control' id='stepfields2' value='$row->altstepname' required/>
	<input type='hidden' name='stepfields3' id='stepfields3' value='$row->altstepid'> <input type='button' id='cancel' name='cancel' class='btn btn-warning' value='cancel'><input type='button' id='savestep' name='savestep' class='btn btn-success' value='Save'>";
}

}
}

public function editstep2(){
	$this->load->model('task_model');
//echo "going to model";
			$gettask =  $this->task_model->editstep2();
if($gettask){
//echo "got data from database";
foreach ($gettask as $row) {
	echo "<input type='text' name='methodfields2' class='form-control' id='methodfields2' value='$row->methodname' required/>
	<input type='hidden' name='methodfields3' id='methodfields2' value='$row->methodid'> <input type='button' id='cancel' name='cancel' class='btn btn-warning' value='cancel'><input type='button' id='savestep' name='savestep' class='btn btn-success' value='Save'>";
}

}
}

public function savestep1(){
	$this->load->model('task_model');
//echo "going to model";
			$gettask =  $this->task_model->savestep1();


if($gettask){
//echo "got data from database";


	echo "<div id='replacelist'>";

foreach ($gettask as $row1) {
	echo "  <input type='radio' name='stepfields1' id='stepfields1' class='form-group' value='$row1->altstepname' required/>$row1->altstepname<br>
	<input type='hidden' name='stepfields' id='stepfields' value='$row1->altstepid' required/><br>";

	}


}

}

public function savestep2(){
	$this->load->model('task_model');
//echo "going to model";
			$gettask =  $this->task_model->savestep2();


if($gettask){
//echo "got data from database";


	echo "<div id='replacelist'>";

foreach ($gettask as $row1) {
	echo "  <input type='radio' name='methodfields1' id='methodfields1' class='form-group' value='$row1->methodname' required/>$row1->methodname<br>
	<input type='hidden' name='methodfields' id='methodfields' value='$row1->methodid' required/><br>";

	}


}

}


public function cancelstep2(){
	$this->load->model('task_model');
//echo "going to model";
			$gettask =  $this->task_model->cancelstep2();


if($gettask){
//echo "got data from database";


	echo "<div id='replacelist'>";

foreach ($gettask as $row1) {
	echo "  <input type='radio' name='methodfields1' id='methodfields1' class='form-group' value='$row1->methodname' required/>$row1->methodname<br>
	<input type='hidden' name='methodfields' id='methodfields' value='$row1->methodid' required/><br>";

	}

}

}

public function cancelstep1(){
	$this->load->model('task_model');
//echo "going to model";
			$gettask =  $this->task_model->cancelstep1();


if($gettask){
//echo "got data from database";


	echo "<div id='replacelist'>";

foreach ($gettask as $row1) {
	echo "  <input type='radio' name='stepfields1' id='stepfields1' class='form-group' value='$row1->altstepname' required/>$row1->altstepname<br>
	<input type='hidden' name='stepfields' id='stepfields' value='$row1->altstepid' required/><br>";

	}

}

}

	public function deletemethods()
{
//echo "in addmethodtotask controller";
if($this->session->userdata('logged_in')){
//	var_dump($_POST);
		$session_data = $this->session->userdata('logged_in');
		$data['adminid'] = $session_data['adminid'];
		$data['firstname'] = $session_data['firstname'];
		$data['username'] = $session_data['username'];
		$data['level'] = $session_data['level'];
		$data['data']='Persona list';
		 $adminid = $session_data['adminid'];
		$this->load->model('task_model');
//echo "going to model";
				$gettask =  $this->task_model->deletemethods();
if($gettask){
//echo "got data from database";
foreach ($gettask as $row) {
echo "<input type='radio' name='methodfields' id='methodfields' value='$row->methodid' required/>$row->methodname<br>
";
}

}


}else{
	redirect('login', 'refresh');
}
}

			public function getpersonareults(){
			 $id1= $this->input->post('persona_id'); //receiving the ajax post from view
			 //Persona
			  $this->db->select('persona.*');
			 	$this->db->from('persona');
			 	$this->db->join('task_persona', 'persona.personaid = task_persona.personaid');
			 	$this->db->where('task_persona.taskid',$id1);
			 	$records1 = $this->db->get('');

			 $output1 = null;
			 foreach ($records1->result() as $row1)
				{
						echo "<option id='personaid' name='personaid' value='".$row1->personaid."'>".ucfirst ($row1->firstname)." ".ucfirst ($row1->lastname)."</option>";

				}

				echo $output1; // HTML example
				}


	public function addsteps()
	{

			if($this->input->post('save')){

			    $this->load->model('task_model');
			  	$this->task_model->addsteps();
			    $this->load->view('methodcreate_view');
			}
		}


	public function getmethod(){
	 $id= $this->input->post('subject_id'); //receiving the ajax post from view

   $this->db->select('method.methodid,method.methodname,method.description');
   $this->db->from('method');
   $this->db->join('task_method', 'method.methodid = task_method.methodid');
   $this->db->where('task_method.taskid',$id);
   $records = $this->db->get('');
   $output = null;
   foreach ($records->result() as $row)
    {
        echo "<option value='".$row->methodid."'>".$row->methodname."</option>";
    }

    echo $output; // HTML example
    }

   public function editselectedtask(){
      $this->load->helper(array('form','file','url'));
	    if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['adminid'] = $session_data['adminid'];
				$data['firstname'] = $session_data['firstname'];
				$data['lastname'] = $session_data['lastname'];
				$data['email'] = $session_data['email'];
				$data['username'] = $session_data['username'];
				$data['level'] = $session_data['level'];
  //  $data['data'] = 'Edit persona';
	$taskid = $this->uri->segment(3);
    		$this->load->model('task_model');
    		$data['task']=$this->task_model->getupdate($taskid);

    		$data['personas']=$this->db->select('persona.*')
																	 ->from('persona')
																	 ->join('task_persona', 'persona.personaid = task_persona.personaid')
																	 ->where('task_persona.taskid',$taskid)
																	 ->get('')
																	 ->result();

    		$data['results']=$this->db->select('taskid,taskname,Startimage')
	         												->from('task')
	         												->where('taskid',$taskid)
	         												->get()
	         												->result();
        $this->load->view('edittask_view',$data);
}
else{
			redirect('login', 'refresh');
		}
}


 public function getstep()
 {
	 $action = $this->input->post('action');
	 if($action=="addcomment"){

	 		$target="./uploads/".basename($_FILES['message']['name']);
	// $action = $this->input->post('action');
 			$methodid=$this->input->post('methodfields');
 			$name=$this->input->post('step');
			$reason=$this->input->post('reason');
 			$message=$_FILES['message']['name'];

 			$data = array(
  									'stepid' => ' ',
  									'stepname' => $name,
										'action_description' => $reason,
  									'image' => $message,
 								);
 			$this->load->model('task_model');
 			$query=$this->task_model->insertstep($data,$methodid);

  		if($query){
  	 		//	echo "Your comment has been sent";

 					echo "<ul style='list-style-type: none;' id='responds'>";

					foreach($query as $row){

  	 					echo "<li id='item_$row->stepid'>";
							echo "
							<div id='img_div'>
							<input type='radio' id='sstepid' name='sstepid' value='$row->stepid' />";
  						echo "<div class='del_wrapper'>
     								<a href='#' class='del_button' id='del-$row->stepid'><img style='height:14px;width:14px;' src='http://localhost/cognitivewalkthrough/uploads/delete-icon.png' alt='delete-icon' /></a>
														</div>";

								echo " <label style='font-weight:bold'> $row->stepname</label><br>";
								echo "<label>$row->action_description</label>";
  			 	//		echo "<b>$row->stepname</b> :<br>
  	 							echo "<img id='img1' src='http://localhost/cognitivewalkthrough/uploads/$row->image'></div></li><br><br><br><br><br><br>";
}
	 		echo "</ul><br><br>";
			echo "  <input type='submit' value='Next' id='next' name='next' class='btn btn-success btn-xl'>";
  }
		if(move_uploaded_file($_FILES['message']['tmp_name'], $target)){
				echo 'File uploaded successfully';
}
		else{
				echo "upload failed";
			}
}else if($action=="goback"){
	$taskid=$this->input->post('taskid');
	echo  "taskid:".$taskid;

 $data['records']= $this->db->select('task.*')
								 						->from('task')
								 						->join('task_method', 'task.taskidid = task_method.taskid')
								 						->where('task_method.taskid',$taskid)
								 						->get()
														->result();

 $data['results']= $this->db->select('method.*')
							 							->from('method')
							 							->join('task_method', 'method.methodid = task_method.methodid')
							 							->where('task_method.taskid',$taskid)
							 							->get()
														->result();

	echo $this->load->view('goback_view',$data);
//			$this->load->view('goback_view',$data);

}
}

public function deletestep($stepid)
{
	$this->input->get($stepid);
	$this->load->model('task_model');
	$this->task_model->deletestep($stepid);

}


public function deletealt($stepid)
{
	echo "delete alternative";

}

public function deletealtsub($stepid)
{
	echo "delete alternative sub step";

}

public function deletesubstep($altsubstepid)
{
	$this->input->get($altsubstepid);
	$this->load->model('task_model');
	$this->task_model->deletesubstep($altsubstepid);

}

public function addalternative($stepid)
{
	//$stepid=$this->input->get($stepid);
	//echo $stepid;

	echo "
	<div id='alt_$stepid'>
	<div class='del_wrapper'>
				<a href='#' class='del_step' id='del-$stepid'><img style='height:14px;width:14px;' src='http://localhost/cognitivewalkthrough/uploads/delete-icon.png' alt='delete-icon' /></a>
								</div> <b>Alternative steps to the target</b><input type='text' name='alt' class='form-control' id='alt'/><br/>
	<input type='hidden' id='stepid' name='stepid' value='$stepid' />
  <b>Image</b>
  <input type='file' accept='image/png, image/jpeg, image/gif' name='image' id='image' />
  <input type='button' value='Add' id='addalt' name='addalt'>
	<ul id='addalter'></div>";



}


public function gotomethodlist()
{
	if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['lastname'] = $session_data['lastname'];
			$data['email'] = $session_data['email'];
			$data['username'] = $session_data['username'];
$data['level'] = $session_data['level'];
			$taskid=$this->input->get('taskid');

			$data['records']=$this->db->select('method.methodid,method.methodname,method.description,method.action,task.taskid,task.taskname')
					  										->from('method')
																->join('task_method', 'method.methodid = task_method.methodid')
						 										->join('task', 'task.taskid = task_method.taskid')
																->where('task_method.taskid',$taskid)
					  										->get()
																->result();


			$this->load->view('goback_view',$data);
}

else{
		redirect('login', 'refresh');
}
}

public function deletetask(){


	$taskid=$this->uri->segment(3);

	$this->load->model('task_model');
	$this->task_model->deletetask($taskid);
	redirect('home/editmcwview');
}

public function getallpersona()
{
	$personaid=$this->input->post('personaid');

	$this->load->model('task_model');
 	$query=$this->task_model->viewpersonalist($personaid);
	if($query){
			echo "<table class='table' border='1'>
			 			<thead>
		 				<tr>
			 			<th>Select </th>
			 			<th>Firstname </th>
			 			<th>Lastname</th>
			 			</tr>
			 			</thead>
			 			<tbody>";
	 	 foreach($query as $row){

			 		echo "<tr>";
					echo "<td><input type='checkbox' name='personalistid[]' id='personalistid' value=' $row->personaid'/></td>";
					echo "<td>$row->firstname</td>";
					echo	"<td>$row->lastname</td>";
					echo "</tr>"	;

}
				echo "</tbody>
					</table>";
}
}

public function deletepersona(){
	$personaid=$this->input->post('personaid');
	$taskid=$this->input->post('taskid');
	$this->load->model('task_model');
	$query=$this->task_model->deleteselpersona($personaid,$taskid);
	if($query){
		echo "<table class='table' border='1'>
				  <thead>
			 		<tr>
				 	<th>Select </th>
				 	<th>Firstname </th>
				 	<th>Lastname</th>
				 	</tr>
				 	</thead>
				 	<tbody>";
		 foreach($query as $row){
			echo "<tr>";

							echo "<td><input type='checkbox' name='personalistid[]' id='personalistid' value=' $row->personaid'/></td>";

						echo "<td>$row->firstname</td>";
						echo	"<td>$row->lastname</td>";
						echo "</tr>"	;

	}
					echo "</tbody>
						</table>";
	}
}

public function sortsteps(){
	//$stepid=$this->input->post('item');
	var_dump($_POST);
	$methodid = $this->input->post('methodfields');
//echo $methodid;
	$sorter = $_POST['item'];
$counter = 1;
foreach ($sorter as $recordIDValue) {
	// for ($i =0; $i < count($sorter); $i++) {
	$orderEmUpGeorge = "UPDATE method_step SET sort=" . $counter . " WHERE stepid=" . $recordIDValue;
	$results = $this->db->query($orderEmUpGeorge);
$counter++;
}
}

public function addstep(){


$methodid=$this->input->get('methodfields');
	//echo $methodid;

	$stepid=$this->input->get('stepid');
	//echo $stepid;

	$this->load->model('task_model');
	$query = $this->task_model->addstep($stepid,$methodid);
	  if($query){
	 echo "<ul id='responds'>";

				foreach($query as $row){
	  	 echo "<li id='item_$row->stepid'>";


			 echo "<div id='img_div'>";
			  echo "<input type='radio' id='sstepid' name='sstepid' value='$row->stepid' required>";
	  	echo "<div class='del_wrapper'>
	     <a href='#' class='del_button' id='del-$row->stepid'><img style='height:14px;width:14px;' src='http://localhost/cognitivewalkthrough/uploads/delete-icon.png' alt='delete-icon' /></a>
	     </div>";
	  			 echo "<b>$row->stepname</b> :<br>";
					  echo "<i>$row->action_description</i> <br>";
	  	 echo "<img id='img1' src='http://localhost/cognitivewalkthrough/uploads/$row->image'></div></li><br><br><br><br><br><br><br>";
	}
		 echo "</ul><br><br><br><br>";
		 echo "<input type='submit' value='Next' id='next' name='next' class='btn btn-success btn-xl'>";
	  }
}

public function addstep1(){


$methodid=$this->input->get('methodfields');
	//echo $methodid;

	$stepid=$this->input->get('stepid');
	//echo $stepid;

	$this->load->model('task_model');
	$query = $this->task_model->addstep1($stepid,$methodid);
	  if($query){
	 echo "<ul id='responds'>";

				foreach($query as $row){
	  	 echo "<li id='item_$row->stepid'>";


			 echo "<div id='img_div'>";
			 	 echo "<input type='radio' id='sstepid' name='sstepid' value='$row->stepid' required>";
	  	echo "<div class='del_wrapper'>
	     <a href='#' class='del_button' id='del-$row->stepid'><img style='height:14px;width:14px;' src='http://localhost/cognitivewalkthrough/uploads/delete-icon.png' alt='delete-icon' /></a>
	     </div>";
	  			 echo "<b>$row->stepname</b> :<br>";
	  	 echo "<img id='img1' src='http://localhost/cognitivewalkthrough/uploads/$row->image'></div></li><br>";
	}
		 echo "</ul><br><br>";
		 echo "<input type='submit' value='Next' id='next' name='next' class='btn btn-success btn-xl'>";
	  }
}


public function addstep2(){

	$altstepid=$this->input->get('altstepfields');
		//echo $methodid;

		$altsubstepid=$this->input->get('altsubstepid');
		//echo $stepid;

		$this->load->model('task_model');
		$query = $this->task_model->addstep2($altstepid,$altsubstepid);
		  if($query){
		 echo "<ul id='responds'>";

					foreach($query as $row){
		  	 echo "<li id='item_$row->altsubstepid'>";echo "<div id='img_div'>";
		  	echo "<div class='del_wrapper'>
		     <a href='#' class='del_button' id='del-$row->altsubstepid'><img style='height:14px;width:14px;' src='http://localhost/cognitivewalkthrough/uploads/delete-icon.png' alt='delete-icon' /></a>
		     </div>";
		  			 echo "<b>$row->altsubstepname</b> :<br>";
						 echo "<i>$row->subaction_description</i> :<br>";
		  	 echo "<img id='img1' src='http://localhost/cognitivewalkthrough/uploads/$row->altsubstepimage'></div></li><br>";
		}
			 echo "</ul>";
		  }
}
public function getPersonaforCW(){

	$personaid=$this->input->get('personaid');
		//echo $methodid;

	//	$stepid=$this->input->get('stepid');
		//echo $stepid;

		$this->load->model('task_model');
		$query = $this->task_model->getPersonaforCW($personaid);
		  if($query){
		 echo "<ul id='responds'>";

					foreach($query as $row){
		  	 echo "<li id='item_$row->stepid'>";echo "<div id='img_div'>";
		  			 echo "<b>$row->firstname</b> :<br>";
		  	// echo "<img src='http://localhost/cognitivewalkthrough/uploads/$row->image'></div></li><br>";
		}
			 echo "</ul>";
		  }
 }

 public function addalt()
 {
	 $action = $this->input->post('action');
	 if($action=="addcomment"){

	 		$target="./uploads/".basename($_FILES['message']['name']);
	// $action = $this->input->post('action');
 			$altstepid=$this->input->post('altstepfields');
 			$name=$this->input->post('step');
			$reason=$this->input->post('reason');
 			$message=$_FILES['message']['name'];

 			$data = array(
  									'altsubstepid' => ' ',
  									'altsubstepname' => $name,
										'subaction_description' => $reason,
  									'altsubstepimage' => $message,
 								);
 			$this->load->model('task_model');
 			$query=$this->task_model->insertsubstep($data,$altstepid);

  		if($query){
  	 		//	echo "Your comment has been sent";

 					echo "<ul style='list-style-type: none;' id='responds'>";

					foreach($query as $row){

  	 					echo "<li id='item_$row->altsubstepid'>";
							echo "<input type='radio' name='stepid' value='$row->altsubstepid' hidden>
							<div id='img_div'>";
  						echo "<div class='del_wrapper'>
     								<a href='#' class='del_button' id='del-$row->altsubstepid'><img style='height:14px;width:14px;' src='http://localhost/cognitivewalkthrough/uploads/delete-icon.png' alt='delete-icon' /></a>
														</div>";
						//echo "<div class='add_wrapper'>
					//			<a href='#' class='add_alternatives' id='add_$row->stepid'><img style='height:14px;width:14px;' src='http://localhost/cognitivewalkthrough/assets/images/add_icon.png' alt='add-icon' /></a>

				//																	</div>";
								echo " <label style='font-weight:bold'> $row->altsubstepname</label><br>";
									echo " <label style='font-weight:italics'> $row->subaction_description</label><br>";
  			 	//		echo "<b>$row->stepname</b> :<br>
  	 							echo "<img id='img1' src='http://localhost/cognitivewalkthrough/uploads/$row->altsubstepimage'></div>

										</li><br>";
}
	 		echo "</ul>";
			//echo "<a class='btn btn-danger btn-xl' href='gotonext/?stepid=$row->altsubstepid' role='button'>Next</a>";
  }
		if(move_uploaded_file($_FILES['message']['tmp_name'], $target)){
				echo 'File uploaded successfully';
}
		else{
				echo "upload failed";
			}
}else if($action=="goback"){
	$stepid=$this->input->post('stepfields');
	echo  "stepfields:".$stepid;
	$data['records']=$this->db->select('steps.stepid,steps.stepname,altsteps.altstepid,altsteps.altstepname')
														->from('steps')
														->join('steps_altsteps', 'steps.stepid = steps_altsteps.stepid')
														->join('altsteps', 'steps_altsteps.altstepid = altsteps.altstepid')
														->where('steps_altsteps.stepid',$stepid)
														->get()
														->result();
	$this->load->view('gobackliststeps_view',$data);
//			$this->load->view('goback_view',$data);

}
}

public function deletealtstep($stepid)
{
	$this->input->get($stepid);
	$this->load->model('task_model');
	$this->task_model->deletealtstep($stepid);

}
public function addsubsteps($stepid)
{
	//$stepid=$this->input->get($stepid);
	//echo $stepid;

	echo "
	<div id='altsub_$stepid'>
	<div class='del_wrapper'>
				<a href='#' class='del_substep' id='del-$stepid'><img style='height:14px;width:14px;' src='http://localhost/cognitivewalkthrough/uploads/delete-icon.png' alt='delete-icon' /></a>
								</div> <b>Alternative methods for this step</b><input type='text' name='sub' class='form-control' id='sub'/><br/>
	<input type='hidden' id='sstepid' name='sstepid' value='$stepid' />
  <b>Image</b>
  <input type='file' accept='image/png, image/jpeg, image/gif' name='simage' id='simage' />
  <input type='button' value='Add' id='addnewsub' name='addnewsub'>
	<ul id='addsubstep'></div>";
}

public function addnewsub()
{
 $action = $this->input->post('action');
 if($action=="addnewsub"){

		$target="./uploads/".basename($_FILES['simage']['name']);
// $action = $this->input->post('action');
			$stepid=$this->input->post('sstepid');
			$name=$this->input->post('sub');
			$message=$_FILES['simage']['name'];

			$data = array(
									'altsubstepid' => ' ',
									'altsubstepname' => $name,
									'altsubstepimage' => $message,
								);
			$this->load->model('task_model');
			$query=$this->task_model->insertsubstep($data,$stepid);

		if($query){
				echo "Your comment has been sent";

					echo "<ul id='altsubstepid'>";

				foreach($query as $row){

						echo "<li id='sstep_$row->altsubstepid'>";

						echo "<div id='img_div'>";
						echo "<input type='radio' name='stepid' value='$row->altsubstepid' required>";
						echo "<div class='del_wrapper'>
										<a href='#' class='delsubstep_button' id='del-$row->altsubstepid'><img style='height:14px;width:14px;' src='http://localhost/cognitivewalkthrough/uploads/delete-icon.png' alt='delete-icon' /></a>
													</div>";
					echo "<div class='add_wrapper'>
							<a href='#' class='addsubstep_alternatives' id='add_$row->altsubstepid'><img style='height:14px;width:14px;' src='http://localhost/cognitivewalkthrough/assets/images/add_icon.png' alt='add-icon' /></a>

																				</div>";
						echo "<b>$row->altsubstepname</b> :<br>
									<img id='img1' src='http://localhost/cognitivewalkthrough/uploads/$row->altsubstepimage'></div>

									</li><br>";
}
		echo "</ul><br><br>";
		echo "<a type='submit' class='btn btn-danger btn-xl' href='gotonext/?stepid=$row->altsubstepid' role='button'>Next</a>";
 }
	if(move_uploaded_file($_FILES['simage']['tmp_name'], $target)){
			echo 'File uploaded successfully';
}
	else{
			echo "upload failed";
		}
}
}

public function gotonext()
{

	if($this->session->userdata('logged_in')){
		$session_data = $this->session->userdata('logged_in');
		$data['adminid'] = $session_data['adminid'];
		$data['firstname'] = $session_data['firstname'];
		$data['username'] = $session_data['username'];
		$data['level'] = $session_data['level'];
$adminid = $session_data['adminid'];
$stepid= $this->input->post('sstepid');
		$this->load->model('task_model');
		$get_step=$this->task_model->gotonext($stepid);
 // $data = array();
 $data['result'] =$this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image,altsteps.altstepid,altsteps.altstepname,method.methodid,method.methodname,method.description,task.taskid,task.taskname,task.Startimage')
 ->from('steps')
 ->join('steps_altsteps', 'steps.stepid = steps_altsteps.stepid')
 ->join('altsteps', 'altsteps.altstepid = steps_altsteps.altstepid')
->join('method_step', 'steps.stepid = method_step.stepid')
 ->join('method', 'method.methodid = method_step.methodid')
 ->join('task_method', 'method.methodid = task_method.methodid')
->join('task', 'task.taskid = task_method.taskid')
->where('steps_altsteps.stepid',$stepid)
													 ->get()
													 ->result();

		$data['step'] = $get_step;
		$this->load->view('addalterstep',$data);
		} else{
					redirect('login', 'refresh');
				}
}

public function createaltstep()
{

if($this->session->userdata('logged_in')){
	$session_data = $this->session->userdata('logged_in');
	$data['adminid'] = $session_data['adminid'];
	$data['firstname'] = $session_data['firstname'];
	$data['username'] = $session_data['username'];
$data['level'] = $session_data['level'];
	 $adminid = $session_data['adminid'];
	$this->load->model('task_model');

$stepid= $this->input->post('stepid');
			$getstep =  $this->task_model->insertsubstepalternative($stepid);

if($getstep){
	echo 'Data saved successfully';
}

}else{

		redirect('login', 'refresh');
}

}

public function getaltsteplist()
{

if($this->session->userdata('logged_in')){
	$session_data = $this->session->userdata('logged_in');
	$data['adminid'] = $session_data['adminid'];
	$data['firstname'] = $session_data['firstname'];
	$data['username'] = $session_data['username'];
$data['level'] = $session_data['level'];
	 $adminid = $session_data['adminid'];
	$this->load->model('task_model');

$stepid=$this->input->post('stepid');
$data['taskid']=$this->input->post('taskid');
 $getstep=  $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image,altsteps.altstepid,altsteps.altstepname,method.methodid,method.methodname,method.description,task.taskid,task.taskname,task.Startimage')
->from('steps')
->join('steps_altsteps', 'steps.stepid = steps_altsteps.stepid')
->join('altsteps', 'altsteps.altstepid = steps_altsteps.altstepid')
->join('method_step', 'steps.stepid = method_step.stepid')
->join('method', 'method.methodid = method_step.methodid')
->join('task_method', 'method.methodid = task_method.methodid')
->join('task', 'task.taskid = task_method.taskid')
->where('steps_altsteps.stepid',$stepid)
													->get()
													->result();

						$data['getstep'] =$getstep;
						if(!empty($getstep)){
							$this->load->view('altstepslist_view',$data);
						}
						else{
							echo "No alternatives are peresnt. Please go back and add alternatives. Kindly refresh the page if there is a Document Expired screen";
						}

}else{

		redirect('login', 'refresh');
}

}

public function createsubsteps()
{
	if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['lastname'] = $session_data['lastname'];
			$data['email'] = $session_data['email'];
			$data['username'] = $session_data['username'];
$data['level'] = $session_data['level'];
			$altstepid=$this->input->post('stepfields');
			$stepid =$this->input->post('stepid');
			$taskid =$this->input->post('taskid');
		//	echo $stepid;
			$data['records'] = $this->db->select ('task.taskid,task.taskname,task.Startimage,steps.stepid,steps.stepname,steps.action_description,steps.image,altsteps.altstepid,altsteps.altstepname,method.methodid,method.methodname,method.description')
				 													->from('altsteps')
																	->join('steps_altsteps','altsteps.altstepid = steps_altsteps.altstepid')
				 													->join('steps','steps.stepid = steps_altsteps.stepid')
																	->join('method_step','method_step.stepid = steps.stepid')
																	->join('method','method.methodid=method_step.methodid')
																	->join('task_method','task_method.methodid=method.methodid')
																	->join('task','task.taskid=task_method.taskid')
				 													->where('steps_altsteps.altstepid',$altstepid)
				 													->get('')
				 													->result();

			$data['results'] = $this->db->select ('altsteps.altstepid,altsteps.altstepname,altsubsteps.altsubstepid,altsubsteps.altsubstepname,altsubsteps.subaction_description,altsubsteps.altsubstepimage')
											->from('altsteps')
											->join('altsteps_altsubsteps','altsteps.altstepid = altsteps_altsubsteps.altstepid')
											->join('altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
											->where('altsteps_altsubsteps.altstepid',$altstepid)
											->get('')
											->result();

											$data['steps'] = $this->db
															->select('altsteps.altstepid,altsteps.altstepname,altsubsteps.altsubstepid,altsubsteps.altsubstepname,altsubsteps.subaction_description,altsubsteps.altsubstepimage,steps.stepid,steps.stepname,steps.action_description,steps.image')
															->from('altsteps')
															->join('altsteps_altsubsteps','altsteps.altstepid=altsteps_altsubsteps.altstepid')
															->join('steps_altsteps','altsteps.altstepid = steps_altsteps.altstepid')
															->join('altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
															->join('steps','steps.stepid = steps_altsteps.stepid')
															->group_by('altsubsteps.altsubstepname')
															->where('steps_altsteps.stepid',$stepid)
															->where('altsteps_altsubsteps.altstepid !=',$altstepid)
															->get()
															->result();

															$data['records2'] = $this->db->select ('steps.stepid,steps.stepname,steps.action_description,steps.image')
																 													->from('steps')
																													->join('method_step','method_step.stepid = steps.stepid')
																													->join('method','method.methodid=method_step.methodid')
																													->join('task_method','task_method.methodid=method.methodid')
																													->join('task','task.taskid=task_method.taskid')
																													->group_by('steps.stepname')
																 													->where('task.taskid',$taskid)
																 													->get('')
																 													->result();
															// $this->db->select('task.taskid,task.taskname,task.Startimage,steps.stepid,steps.stepname,steps.image,altsteps.altstepid,altsteps.altstepname,method.methodid,method.methodname');
														  // $this->db->from('steps');
														  // $this->db->join('steps_altsteps', 'steps.stepid = steps_altsteps.stepid');
														  // $this->db->join('altsteps', 'altsteps.altstepid = steps_altsteps.altstepid');
														  // $this->db->join('method_step', 'steps.stepid = method_step.stepid');
														  // $this->db->join('method', 'method.methodid = method_step.methodid');
															// $this
														  // $this->db->where('steps_altsteps.altstepid',$altstepid);
														  // $records = $this->db->get('');

			$this->load->view('createsubsteps_view', $data);
}

else{
		redirect('login', 'refresh');
}
}


public function gotosteplist_view()
{
	if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['lastname'] = $session_data['lastname'];
			$data['email'] = $session_data['email'];
			$data['username'] = $session_data['username'];
$data['level'] = $session_data['level'];
			$stepid=$this->input->get('stepid');
	$data['taskid']=$this->input->get('taskid');
			$data['records']=$this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image,altsteps.altstepid,altsteps.altstepname,method.methodid,method.methodname,method.description,task.taskid,task.taskname,task.Startimage')
		  ->from('steps')
		  ->join('steps_altsteps', 'steps.stepid = steps_altsteps.stepid')
		  ->join('altsteps', 'altsteps.altstepid = steps_altsteps.altstepid')
		 ->join('method_step', 'steps.stepid = method_step.stepid')
		  ->join('method', 'method.methodid = method_step.methodid')
			->join('task_method', 'method.methodid = task_method.methodid')
		 ->join('task', 'task.taskid = task_method.taskid')
		 ->where('steps_altsteps.stepid',$stepid)
					  										->get()
																->result();


			$this->load->view('gobackliststeps_view',$data);
}

else{
		redirect('login', 'refresh');
}
}
public function sortsubsteps(){
	//$stepid=$this->input->post('item');
var_dump($_POST);
	$stepid = $this->input->post('altstepfields');
	//echo 'hello'.$stepid;
//echo $stepid;
	$sorter = $_POST['item'];
$counter = 1;
foreach ($sorter as $recordIDValue) {
	// for ($i =0; $i < count($sorter); $i++) {
	$orderEmUpGeorge = "UPDATE altsteps_altsubsteps SET sort=" . $counter . " WHERE altstepid=" . $recordIDValue;
	$results = $this->db->query($orderEmUpGeorge);
$counter++;
}
}

public function methodlist_view()
{
	if($this->session->userdata('logged_in')){
	//	var_dump($_POST);
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
			$data['level'] = $session_data['level'];
			$data['data']='Persona list';
			 $adminid = $session_data['adminid'];
//$taskid = $this->uri->segment(3);
					$taskid= $this->input->get('taskid');
echo $taskid;
					$data['gettask'] = 	$this->db->select('method.methodid,method.methodname,method.description,method.action,task.taskid,task.taskname')
			    	->from('method')
			    	->join('task_method', 'method.methodid = task_method.methodid')
			 	 	->join('task', 'task.taskid = task_method.taskid')
			    	->where('task_method.taskid',$taskid)
			    	->get('')
						->result();

			$this->load->view('methodlist_view',$data);
}

else{
		redirect('login', 'refresh');
}
}

public function steplist_view()
{
	if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['lastname'] = $session_data['lastname'];
			$data['email'] = $session_data['email'];
			$data['username'] = $session_data['username'];
$data['level'] = $session_data['level'];
			$methodid=$this->input->get('methodid');

			$data['records']= $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image,method.methodid,method.methodname,method.description,task.taskid,task.taskname')
											 						->from('task')
											 						->join('task_method', 'task.taskid = task_method.taskid')
																	->join('method','method.methodid = task_method.methodid')
																	->join('method_step','method_step.methodid = method.methodid')
																	->join('steps','steps.stepid = method_step.stepid')
											 						->where('task_method.methodid',$methodid)
											 						->get()
																	->result();


			$this->load->view('steplistview',$data);
}

else{
		redirect('login', 'refresh');
}
}
public function gotonextstep()
{
	if($this->session->userdata('logged_in')){

		$session_data = $this->session->userdata('logged_in');
		$data['adminid'] = $session_data['adminid'];
		$data['firstname'] = $session_data['firstname'];
		$data['username'] = $session_data['username'];
		$data['level'] = $session_data['level'];
$adminid = $session_data['adminid'];
$stepid= $this->input->post('stepfields');
		$this->load->model('task_model');
		$get_step=$this->task_model->gotonextstep($stepid);
 // $data = array();
		$data['step'] = $get_step;
		$data['result'] =$this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image,altsteps.altstepid,altsteps.altstepname,method.methodid,method.methodname,method.description,task.taskid,task.taskname,task.Startimage')
	  ->from('steps')
	  ->join('steps_altsteps', 'steps.stepid = steps_altsteps.stepid')
	  ->join('altsteps', 'altsteps.altstepid = steps_altsteps.altstepid')
	 ->join('method_step', 'steps.stepid = method_step.stepid')
	  ->join('method', 'method.methodid = method_step.methodid')
	  ->join('task_method', 'method.methodid = task_method.methodid')
	 ->join('task', 'task.taskid = task_method.taskid')
	 ->where('steps_altsteps.stepid',$stepid)
	 													 ->get()
	 													 ->result();
		$this->load->view('addalterstep',$data);
		} else{
					redirect('login', 'refresh');
				}
}

public function addsubstep(){


$altstepid=$this->input->get('altstepfields');
	//echo $methodid;

	$altsubstepid=$this->input->get('altsubstepid');
	//echo $stepid;

	$this->load->model('task_model');
	$query = $this->task_model->addsubstep($altstepid,$altsubstepid);
	  if($query){
	 echo "<ul id='responds'>";

				foreach($query as $row){
	  	 echo "<li id='item_$row->altsubstepid'>";echo "<div id='img_div'>";
	  	echo "<div class='del_wrapper'>
	     <a href='#' class='del_button' id='del-$row->altsubstepid'><img style='height:14px;width:14px;' src='http://localhost/cognitivewalkthrough/uploads/delete-icon.png' alt='delete-icon' /></a>
	     </div>";
	  			 echo "<b>$row->altsubstepname</b> :<br>";
					 echo "<i>$row->subaction_description</i> :<br>";
	  	 echo "<img id='img1' src='http://localhost/cognitivewalkthrough/uploads/$row->altsubstepimage'></div></li><br>";
	}
		 echo "</ul>";
	  }
}

public function overview(){

		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['username'] = $session_data['username'];
			$data['level'] = $session_data['level'];
	$adminid = $session_data['adminid'];
	$taskid=$this->input->post('taskid');

	$data['result'] = $this->db->select('task.*')
														->from('task')
														->where('taskid',$taskid)
														->get()
														->result();

	$data['record']=$this->db->select('method.methodid,method.methodname,method.description,task.taskid,task.taskname')
 ->from('method')
 ->join('task_method', 'method.methodid = task_method.methodid')
 ->join('task', 'task.taskid = task_method.taskid')
 ->where('task_method.taskid',$taskid)
->get('')
 ->result();

$this->load->view('overview',$data);
			} else{
						redirect('login', 'refresh');
					}
}

public function perform(){

		$sessionid=session_id();
		//echo "the session id is: \n".$sessionid;
		$timestamp = $this->input->post('timestamp');
		//echo 'timestamp:'.$timestamp;
$adminid = $this->input->post('adminid');
//echo 'adminid:'.$adminid;
$this->load->model('task_model');


$result= $this->task_model->performdata($adminid,$sessionid,$timestamp);

if($result){
echo "Data saved successfully";
}

}


public function performfornone(){

		$sessionid=session_id();
		//echo "the session id is: \n".$sessionid;
		$timestamp = $this->input->post('timestamp');
		//echo 'timestamp:'.$timestamp;
$adminid = $this->input->post('adminid');
//echo 'adminid:'.$adminid;

$this->load->model('task_model');


$result= $this->task_model->performdatafornone($adminid,$sessionid,$timestamp);

if($result){
echo "Data saved successfully";
}

}
public function viewresults(){
			        if($this->session->userdata('logged_in')){
					$session_data = $this->session->userdata('logged_in');
					$data['adminid'] = $session_data['adminid'];
					$data['firstname'] = $session_data['firstname'];
					$data['lastname'] = $session_data['lastname'];
					$data['email'] = $session_data['email'];
					$data['username'] = $session_data['username'];
					$data['level'] = $session_data['level'];
		  //  $data['data'] = 'Edit persona';
			$timestamp = $this->uri->segment(3);
	$data['timestamp'] =$timestamp;

	$this->load->view('finalresults_view',$data);

	}
		else{
					redirect('login', 'refresh');
				}
}



public function evaluation(){
			        if($this->session->userdata('logged_in')){
					$session_data = $this->session->userdata('logged_in');
					$data['adminid'] = $session_data['adminid'];
					$data['firstname'] = $session_data['firstname'];
					$data['lastname'] = $session_data['lastname'];
					$data['email'] = $session_data['email'];
					$data['username'] = $session_data['username'];
					$data['level'] = $session_data['level'];
		  //  $data['data'] = 'Edit persona';
			$timestamp = $this->uri->segment(3);
				$variant = $this->uri->segment(4);
				$taskid = $this->uri->segment(5);
				$personaid = $this->uri->segment(6);
				$variantid = $this->uri->segment(7);
	$data['variantname'] =$variant;
$data['timestamp'] =$timestamp;

	$this->load->view('taskresultevaluation',$data);

	}
		else{
					redirect('login', 'refresh');
				}
}

public function deleteresult()
{
	$timestamp = $this->uri->segment(3);
$data['timestamp'] =$timestamp;
	$this->load->model('task_model');
	$this->task_model->deleteresult($timestamp);
	redirect('home/displayresultslist');
}

 }

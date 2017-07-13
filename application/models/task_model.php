<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_model extends CI_Model {

	public function createtask($taskdata,$personacheckdata,$description,$action){

	   $conn= mysqli_connect("localhost","root","","cognitivewalkthrough");
		 $this->db->insert('task', $taskdata);

		 if ($_POST['fields'] || $personacheckdata) {
		 		$inserted_task_id = $this->db->insert_id();
			//	echo "inserted taskid:".$inserted_task_id;

		 		foreach ( $_POST['fields']as $key=>$value ) {
		     		$sql_website = sprintf("INSERT INTO method (methodname,description,action) VALUES ('%s','%s','%s')",
						    	   mysqli_real_escape_string($conn,$value), mysqli_real_escape_string($conn,$description), mysqli_real_escape_string($conn,$action)  );
						$this->db->query($sql_website);
						$inserted_method_id = $this->db->insert_id();
						$qry = "insert into task_method(taskid,methodid) values($inserted_task_id,$inserted_method_id)";
     				$this->db->query($qry);
					}
			foreach ( $personacheckdata as $row ) {
						$qry1 = "insert into task_persona(taskid,personaid) values($inserted_task_id,$row)";
						$this->db->query($qry1);
					}
    }
      else{

        }
   	$this->db->select('method.methodid,method.methodname,method.description,method.action,task.taskid,task.taskname');
   	$this->db->from('method');
   	$this->db->join('task_method', 'method.methodid = task_method.methodid');
	 	$this->db->join('task', 'task.taskid = task_method.taskid');
   	$this->db->where('task_method.taskid',$inserted_task_id);
   	$records = $this->db->get('');
 		return $records->result();
}

public function addmethodtotask(){
//echo "in model";
	 $conn= mysqli_connect("localhost","root","","cognitivewalkthrough");
	 $taskid=  $_POST['taskid'];
	 //echo "taskid:".$taskid;
	// $this->db->insert('task', $taskdata);
	$description =  $_POST['reason'];
	//echo $description;

	$action = $_POST['action'];
//echo $action;
//if (isset($_POST['fields']) && $_POST['fields'] != "") {
	//if (isset($_POST['fields']) && $_POST['fields'] != NULL) {
	 if (count($_POST['fields'])>0 || !empty($_POST['fields'])) {
	//	 echo "whey am i here";
		//	$inserted_task_id = $this->db->insert_id();
//echo "fields available";

			foreach ( $_POST['fields'] as $key=>$value ) {
			//	echo "inserting fields";
					$sql_website = sprintf("INSERT INTO method (methodname,description,action) VALUES ('%s','%s','%s')",
									 mysqli_real_escape_string($conn,$value),mysqli_real_escape_string($conn,$description),mysqli_real_escape_string($conn,$action) );
					$this->db->query($sql_website);
					$inserted_method_id = $this->db->insert_id();
					$qry = "insert into task_method(taskid,methodid) values($taskid,$inserted_method_id)";
					$this->db->query($qry);

				}
	}

					$qry1="	UPDATE method JOIN task_method ON task_method.methodid=method.methodid SET method.description='$description',method.action='$action' WHERE task_method.taskid=$taskid";
	$this->db->query($qry1);

	$this->db->select('method.methodid,method.methodname,method.description,method.action,task.taskid,task.taskname');
	$this->db->from('method');
	$this->db->join('task_method', 'method.methodid = task_method.methodid');
	$this->db->join('task', 'task.taskid = task_method.taskid');
	$this->db->where('task_method.taskid',$taskid);
	$records = $this->db->get('');
	return $records->result();
}



public function editcreatedtask($message){
//echo "in model";
	 $conn= mysqli_connect("localhost","root","","cognitivewalkthrough");
	 $taskid=  $this->input->post('taskid');
	 $taskname=  $this->input->post('taskname');
	// $personaid = $this->input->post('personalistid');
	$qry1="	UPDATE task SET taskname='$taskname',Startimage='$message' WHERE taskid=$taskid ";
$this->db->query($qry1);
	 if ($this->input->post('personalistid')) {
		 echo "whey am i here";
//
foreach ( $_POST['personalistid'] as $key=>$value ) {
	if(!empty(value)){
	$sql_website = sprintf("INSERT INTO task_persona (taskid,personaid) VALUES ('%s','%s')",
					 mysqli_real_escape_string($conn,$taskid),mysqli_real_escape_string($conn,$value));
	$this->db->query($sql_website);
}
		}
}




	$this->db->select('method.methodid,method.methodname,method.description,method.action,task.taskid,task.taskname');
	$this->db->from('method');
	$this->db->join('task_method', 'method.methodid = task_method.methodid');
	$this->db->join('task', 'task.taskid = task_method.taskid');
	$this->db->where('task_method.taskid',$taskid);
	$records = $this->db->get('');
	return $records->result();
}


	public function getTasklist($adminid)
	{
	   return $this->db
	         ->select('taskid,taskname')
	         ->from('task')
					 ->where('adminid',$adminid)
	         ->get()
	         ->result();
	}


	function get_method_by_task($task){
        $this->db->select('methodid, methodname');
        $query = $this->db->get('method');
       if($query->result()){
            foreach ($query->result() as $method) {
                $methods[$method->methodid] = $method->methodnamename;
            }
            return $methods;
        } else {
            return FALSE;
        }
    }


	function view()
	{

	    return $this->db
	         ->select('*')
	         ->from('persona')
	         ->get()
	         ->result();
	}

	public function insertstep($data,$methodid){

				$this->db->insert('steps',$data);

		 		$inserted_step_id = $this->db->insert_id();
		// 		echo $inserted_step_id;
		// 		echo $methodid;

 				$qry = "insert ignore into method_step values($methodid,$inserted_step_id,$inserted_step_id+1)";

				$query=	$this->db->query($qry);
//$qry1="UPDATE method_step SET sort=sort+1 WHERE stepid=$inserted_step_id";
			//	$query1=	$this->db->query($qry);
				return $this->db->select ('steps.stepid,steps.stepname,steps.action_description,steps.image')
												->from('steps')
												->join('method_step','steps.stepid = method_step.stepid')
												->where('method_step.methodid',$methodid)
												->get('')
												->result();
	}


	public function getupdate($taskid){
	    return $this->db->select('method.methodid,method.methodname,method.description')
	                		->from('method')
	                		->join('task_method', 'method.methodid = task_method.methodid')
	                		->where('task_method.taskid',$taskid)
	                		->get('')
	                		->result();
	}


		public function deletemethods(){
	$methodid=$_POST['methodfields'];
	$taskid=$_POST['taskid'];
	//echo 'methodid:'.$methodid;
			  $qry = "DELETE FROM task_method
			 				WHERE methodid=$methodid";

 $this->db->query($qry);
			 $qry2="delete
			 			 from method
			 			 where methodid = $methodid";
			 $this->db->query($qry2);
			 $this->db->select('method.methodid,method.methodname,method.description,method.action,task.taskid,task.taskname');
			 $this->db->from('method');
			 $this->db->join('task_method', 'method.methodid = task_method.methodid');
			 $this->db->join('task', 'task.taskid = task_method.taskid');
			 $this->db->where('task_method.taskid',$taskid);
			 $records = $this->db->get('');
			 return $records->result();

		}

	public function deletetask($taskid){

		//  $qry = "DELETE FROM task_method
		// 				WHERE methodid IN (
    //  														SELECT * FROM (
    //      																				SELECT DISTINCT method.methodid AS mid FROM method
    //      																				INNER JOIN task_method ON task_method.methodid=method.methodid
    //  																					) AS m where task_method.taskid=$taskid
		//  													)";
	//	 $this->db->query($qry);

		//  $qry5 = "DELETE FROM task_persona
		// 			 WHERE taskid=$taskid";
		// $this->db->query($qry5);
		//
		// $qry1 = "DELETE FROM method_step
		//  				WHERE methodid NOT IN (
    //  														SELECT * FROM (
    //      																				SELECT DISTINCT steps.stepid FROM steps
		//
    //      																				INNER JOIN method_step ON method_step.stepid=steps.stepid
    // 																					) AS m
		//  													)";
		//  													$this->db->query($qry1);
		//
		//
		//
		// $qry4 = "DELETE FROM steps
		// 				WHERE stepid NOT IN (
		// 				SELECT * FROM (
		// 				SELECT DISTINCT steps.stepid FROM steps
		//
		//  			INNER JOIN method_step ON method_step.stepid=steps.stepid
		// 											) AS m
		// 			)";
		// 	$this->db->query($qry4);
		//
		// 	$qry6 = "DELETE FROM steps_altsteps
		// 					WHERE stepid NOT IN (
		// 					SELECT * FROM (
		// 					SELECT DISTINCT steps.stepid FROM steps
		//
		// 				INNER JOIN steps_altsteps ON steps_altsteps.stepid=steps.stepid
		// 												) AS m
		// 				)";
		// 		$this->db->query($qry6);
		//
		// 		$qry7 = "DELETE FROM altsteps
		// 						WHERE altstepid NOT IN (
		// 						SELECT * FROM (
		// 						SELECT DISTINCT altsteps.altstepid FROM altsteps
		//
		// 					INNER JOIN steps_altsteps ON steps_altsteps.altstepid=altsteps.altstepid
		// 													) AS m
		// 					)";
		// 			$this->db->query($qry7);
		// 			$qry8 = "DELETE FROM altsteps_altsubsteps
		// 							WHERE altstepid NOT IN (
		// 							SELECT * FROM (
		// 							SELECT DISTINCT altsteps.altstepid FROM altsteps
		//
		// 						INNER JOIN altsteps_altsubsteps ON altsteps_altsubsteps.altstepid=altsteps.altstepid
		// 														) AS m
		// 						)";
		// 				$this->db->query($qry8);
		// 				$qry9 = "DELETE FROM altsubsteps
		// 								WHERE altsubstepid NOT IN (
		// 								SELECT * FROM (
		// 								SELECT DISTINCT altsubsteps.altsubstepid FROM altsubsteps
		//
		// 							INNER JOIN altsteps_altsubsteps ON altsteps_altsubsteps.altstepid=altsteps.altstepid
		// 															) AS m
		// 							)";
		// 					$this->db->query($qry9);
		//
		// $qry3="DELETE FROM method
		//  				WHERE methodid NOT IN (
    //  														SELECT * FROM (
    //      																				SELECT DISTINCT method.methodid FROM method
    //      																				INNER JOIN task_method ON task_method.methodid=method.methodid
    //  																					) AS m
		//  													)";
		//  													$this->db->query($qry3);

		 $qry2="delete
		 			 from task
		 			 where taskid = $taskid";
		 $this->db->query($qry2);

/*
$query5 = $this->db->query("Delete task.*,method.*,task_method.*,method_step.*,altsteps.*,steps_altsteps.*,altsubsteps.*,altsteps_altsubsteps.*
from task
inner join task_method on task.taskid=task_method.taskid
inner join method on method.methodid=task_method.methodid
inner join method_step on method.methodid=method_step.methodid
inner join steps on steps.stepid=method_step.stepid
inner join steps_altsteps on steps.stepid=steps_altsteps.stepid
inner join altsteps on steps_altsteps.altstepid=altsteps.altstepid
inner join altsteps_altsubsteps on altsteps.altstepid=altsteps_altsubsteps.altstepid
inner join altsubsteps on altsubsteps.altsubstepid=altsteps_altsubsteps.altsubstepid
where task.taskid=$taskid ");
*/


	}

public function	deletestep($stepid){
	// $qry = "DELETE FROM method_step
	// 				WHERE methodid IN (
	// 														SELECT * FROM (
	// 																						SELECT DISTINCT steps.stepid AS sid FROM steps
	// 																						INNER JOIN method_step ON method_step.stepid=steps.stepid
	// 																					) AS m where method_step.stepid=$stepid
	// 													)";

	$qry = "DELETE FROM method_step where stepid=$stepid";
	$this->db->query($qry);


	$qry1="delete
				 from steps
				 where stepid = $stepid";
	$this->db->query($qry1);
}



public function deleteselpersona($personaid,$taskid){
	$qry = "DELETE FROM task_persona
					WHERE personaid=$personaid AND taskid=$taskid";
	$this->db->query($qry);

	return $this->db
			 ->select('*')
			 ->from('persona')
			 ->get()
			 ->result();

}

public function viewpersonalist($personaid){
//	echo $personaid;
$taskid=$this->input->post('taskid');


	$qry = "SELECT persona.firstname,persona.lastname,persona.personaid
	FROM persona
	WHERE persona.personaid NOT IN (
	  SELECT task_persona.personaid
	  FROM task_persona
	  WHERE task_persona.taskid =$taskid
	)";
	$query1=	$this->db->query($qry);
	return $query1->result();
}

public function addstep($stepid,$methodid){
	//echo $stepid;
	//echo $methodid;
	$qry="insert into steps (stepname,action_description,image)
				select stepname,action_description,image from steps where stepid=$stepid";

	$this->db->query($qry);

	$inserted_step_id = $this->db->insert_id();

 	$qry = "insert ignore into method_step values($methodid,$inserted_step_id,$inserted_step_id+1)";

	$query=	$this->db->query($qry);
//$qry1="UPDATE method_step SET sort=sort+1 WHERE stepid=$inserted_step_id";
//$query1=	$this->db->query($qry);
	return $this->db->select ('steps.stepid,steps.stepname,steps.action_description,steps.image')
													->from('steps')
													->join('method_step','steps.stepid = method_step.stepid')
													->where('method_step.methodid',$methodid)
													->get('')
													->result();
}

public function addstep1($stepid,$methodid){
	//echo $stepid;
	//echo $methodid;
	$qry="insert into steps (stepname,action_description,image)
				select altsubstepname,subaction_description,altsubstepimage from altsubsteps where altsubstepid=$stepid";

	$this->db->query($qry);

	$inserted_step_id = $this->db->insert_id();

 	$qry = "insert ignore into method_step values($methodid,$inserted_step_id,$inserted_step_id+1)";

	$query=	$this->db->query($qry);
//$qry1="UPDATE method_step SET sort=sort+1 WHERE stepid=$inserted_step_id";
//$query1=	$this->db->query($qry);
	return $this->db->select ('steps.stepid,steps.stepname,steps.image')
													->from('steps')
													->join('method_step','steps.stepid = method_step.stepid')
													->where('method_step.methodid',$methodid)
													->get('')
													->result();
}


public function getPersonaforCW($personaid){
	$this->db->select('*');
	$this->db->from('persona');
	$this->db->where('personaid',$personaid);
	$query = $this->db->get();
	if($query->num_rows()>0){
	return $query->result();
	}else{
			return $query->result();
	}
}

public function insertsubstep($data,$altstepid){

			$this->db->insert('altsubsteps',$data);

			$inserted_step_id = $this->db->insert_id();
	//		echo $inserted_step_id;
	//		echo $stepid;

			$qry = "insert ignore into altsteps_altsubsteps values($altstepid,$inserted_step_id,$inserted_step_id+1)";

			$query=	$this->db->query($qry);
//$qry1="UPDATE method_step SET sort=sort+1 WHERE stepid=$inserted_step_id";
		//	$query1=	$this->db->query($qry);
			return $this->db->select ('altsteps.altstepid,altsteps.altstepname,altsubsteps.altsubstepid,altsubsteps.altsubstepname,altsubsteps.subaction_description,altsubsteps.altsubstepimage')
											->from('altsteps')
											->join('altsteps_altsubsteps','altsteps.altstepid = altsteps_altsubsteps.altstepid')
											->join('altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
											->where('altsteps_altsubsteps.altstepid',$altstepid)
											->get('')
											->result();
}
public function	deletealtstep($stepid){

	$qry = "DELETE FROM steps_altsteps where altstepid=$stepid";
	$this->db->query($qry);


	$qry1="delete
				 from altsteps
				 where altstepid = $stepid";
	$this->db->query($qry1);
}

public function insertsubstepstoalternative($data,$stepid){

			$this->db->insert('altsubsteps',$data);

			$inserted_step_id = $this->db->insert_id();
//			echo $inserted_step_id;
//			echo $stepid;

			$qry = "insert ignore into altsteps_altsubsteps values($stepid,$inserted_step_id,$inserted_step_id+1)";

			$query=	$this->db->query($qry);
//$qry1="UPDATE method_step SET sort=sort+1 WHERE stepid=$inserted_step_id";
		//	$query1=	$this->db->query($qry);
			return $this->db->select ('altsubsteps.altsubstepid,altsubsteps.altsubstepname,altsubsteps.subaction_description,altsubsteps.altsubstepimage')
											->from('altsubsteps')
											->join('altsteps_altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
											->where('altsteps_altsubsteps.altsubstepid',$stepid)
											->get('')
											->result();
}


public function gotonext($stepid){


	return $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image,method.methodid,method.methodname,method.description,task.taskid,task.taskname,task.Startimage')
  ->from('steps')
 ->join('method_step', 'steps.stepid = method_step.stepid')
  ->join('method', 'method.methodid = method_step.methodid')
  ->join('task_method', 'method.methodid = task_method.methodid')
 ->join('task', 'task.taskid = task_method.taskid')
 ->where('method_step.stepid',$stepid)
 													 ->get()
 													 ->result();

}

public function insertsubstepalternative($stepid){

	$conn= mysqli_connect("localhost","root","","cognitivewalkthrough");
	//$this->db->insert('task', $taskdata);

	if ($_POST['fields']) {
		// $inserted_task_id = $this->db->insert_id();

		 foreach ( $_POST['fields']as $key=>$value ) {
				 $sql_website = sprintf("INSERT INTO altsteps (altstepname) VALUES ('%s')",
									mysqli_real_escape_string($conn,$value) );
				 $this->db->query($sql_website);
				 $inserted_altstep_id = $this->db->insert_id();
				 $qry = "insert into steps_altsteps(stepid,altstepid) values($stepid,$inserted_altstep_id)";
				 $this->db->query($qry);
			 }

 }
	 else{

		 }
 $this->db->select('steps.stepid,steps.stepname,steps.image,altsteps.altstepid,altsteps.altstepname,method.methodid,method.methodname,method.description,task.taskid,task.taskname,task.Startimage');
 $this->db->from('steps');
 $this->db->join('steps_altsteps', 'steps.stepid = steps_altsteps.stepid');
 $this->db->join('altsteps', 'altsteps.altstepid = steps_altsteps.altstepid');
 $this->db->join('method_step', 'steps.stepid = method_step.stepid');
 $this->db->join('method', 'method.methodid = method_step.methodid');
 $this->db->join('task_method', 'method.methodid = task_method.methodid');
 $this->db->join('task', 'task.taskid = task_method.taskid');
 $this->db->where('steps_altsteps.stepid',$stepid);
 $records = $this->db->get('');
 return $records->result();
}


public function addmethodtotask1(){

		$conn= mysqli_connect("localhost","root","","cognitivewalkthrough");
		//$this->db->insert('task', $taskdata);
	$stepid=$_POST['stepid'];
		if ($_POST['fields']) {
			// $inserted_task_id = $this->db->insert_id();

			 foreach ( $_POST['fields']as $key=>$value ) {
				 if(!empty($value)){
					 $sql_website = sprintf("INSERT INTO altsteps (altstepname) VALUES ('%s')",
										mysqli_real_escape_string($conn,$value) );
					 $this->db->query($sql_website);
					 $inserted_altstep_id = $this->db->insert_id();
					 $qry = "insert into steps_altsteps(stepid,altstepid) values($stepid,$inserted_altstep_id)";
					 $this->db->query($qry);
				 }
			 }

	 }
		 else{
echo "<script>alert('Nothing to update');</script>";
			 }
	 $this->db->select('steps.stepid,steps.stepname,steps.image,altsteps.altstepid,altsteps.altstepname,method.methodid,method.methodname,method.description,task.taskid,task.taskname,task.Startimage');
	 $this->db->from('steps');
	 $this->db->join('steps_altsteps', 'steps.stepid = steps_altsteps.stepid');
	 $this->db->join('altsteps', 'altsteps.altstepid = steps_altsteps.altstepid');
	 $this->db->join('method_step', 'steps.stepid = method_step.stepid');
	 $this->db->join('method', 'method.methodid = method_step.methodid');
	 $this->db->join('task_method', 'method.methodid = task_method.methodid');
	 $this->db->join('task', 'task.taskid = task_method.taskid');
	 $this->db->where('steps_altsteps.stepid',$stepid);
	 $records = $this->db->get('');
	 return $records->result();
}

public function deletemethods1(){
$altstepid=$_POST['stepfields'];
$stepid=$_POST['stepid'];
//echo 'methodid:'.$methodid;
		$qry = "DELETE FROM steps_altsteps
					WHERE altstepid=$altstepid";

$this->db->query($qry);
	 $qry2="delete
				 from altsteps
				 where altstepid=$altstepid";
				 $this->db->select('steps.stepid,steps.stepname,steps.image,altsteps.altstepid,altsteps.altstepname,method.methodid,method.methodname,method.description,task.taskid,task.taskname,task.Startimage');
				 $this->db->from('steps');
				 $this->db->join('steps_altsteps', 'steps.stepid = steps_altsteps.stepid');
				 $this->db->join('altsteps', 'altsteps.altstepid = steps_altsteps.altstepid');
				 $this->db->join('method_step', 'steps.stepid = method_step.stepid');
				 $this->db->join('method', 'method.methodid = method_step.methodid');
				 $this->db->join('task_method', 'method.methodid = task_method.methodid');
				 $this->db->join('task', 'task.taskid = task_method.taskid');
				 $this->db->where('steps_altsteps.stepid',$stepid);
				 $records = $this->db->get('');
				 return $records->result();

}
public function	deletesubstep($altsubstepid){

	$qry = "DELETE FROM altsteps_altsubsteps where altsubstepid=$altsubstepid";
	$this->db->query($qry);


	$qry1="delete
				 from altsubsteps
				 where altsubstepid=$altsubstepid";
	$this->db->query($qry1);
}

public function addstep2($altstepfields,$altsubstepid){
	//echo $stepid;
	//echo $methodid;
	$qry="insert into altsubsteps (altsubstepname,subaction_description,altsubstepimage)
				select stepname,action_description,image from steps where stepid=$altsubstepid";

	$this->db->query($qry);

	$inserted_step_id = $this->db->insert_id();

 	$qry = "insert ignore into altsteps_altsubsteps values($altstepfields,$inserted_step_id,$inserted_step_id+1)";

	$query=	$this->db->query($qry);
//$qry1="UPDATE method_step SET sort=sort+1 WHERE stepid=$inserted_step_id";
//$query1=	$this->db->query($qry);
	return $this->db->select ('altsubsteps.altsubstepid,altsubsteps.altsubstepname,altsubsteps.subaction_description,altsubsteps.altsubstepimage')
													->from('altsubsteps')
													->join('altsteps_altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
													->where('altsteps_altsubsteps.altstepid',$altstepfields)
													->get('')
													->result();
}

public function addsubstep($altstepfields,$altsubstepid){
	//echo $stepid;
	//echo $methodid;
	$qry="insert into altsubsteps (altsubstepname,subaction_description,altsubstepimage)
				select altsubstepname,subaction_description,altsubstepimage from altsubsteps where altsubstepid=$altsubstepid";

	$this->db->query($qry);

	$inserted_step_id = $this->db->insert_id();

 	$qry = "insert ignore into altsteps_altsubsteps values($altstepfields,$inserted_step_id,$inserted_step_id+1)";

	$query=	$this->db->query($qry);
//$qry1="UPDATE method_step SET sort=sort+1 WHERE stepid=$inserted_step_id";
//$query1=	$this->db->query($qry);
	return $this->db->select ('altsubsteps.altsubstepid,altsubsteps.altsubstepname,altsubsteps.subaction_description,altsubsteps.altsubstepimage')
													->from('altsubsteps')
													->join('altsteps_altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
													->where('altsteps_altsubsteps.altstepid',$altstepfields)
													->get('')
													->result();
}

public function editstep1(){
	$stepid=$this->input->post('stepfields');
	return $this->db->select('*')
														->from('altsteps')
														->where('altstepid',$stepid)
														->get()
														->result();

}

public function editstep2(){
	$methodid=$this->input->post('methodfields');
	//echo "methodid:". $methodid;
	return $this->db->select('*')
														->from('method')
														->where('methodid',$methodid)
														->get()
														->result();

}

public function savestep1(){
		$stepid=$this->input->post('stepid');
	$altstepid=$this->input->post('stepfields3');
	$stepname=$this->input->post('stepfields2');
	$qry1="	UPDATE altsteps SET altstepname='$stepname' WHERE altstepid=$altstepid ";
$this->db->query($qry1);
	return $this->db->select('steps.*,altsteps.*,method.*,task.*')
	->from('altsteps')
	->join('steps_altsteps', 'altsteps.altstepid = steps_altsteps.altstepid')
	->join('steps', 'steps.stepid = steps_altsteps.stepid')
 ->join('method_step', 'steps.stepid = method_step.stepid')
	->join('method', 'method.methodid = method_step.methodid')
	->join('task_method', 'method.methodid = task_method.methodid')
 ->join('task', 'task.taskid = task_method.taskid')
 ->where('steps_altsteps.stepid',$stepid)
														->get()
														->result();

}

public function savestep2(){
	$taskid=$this->input->post('taskid');
$altstepid=$this->input->post('methodfields3');
$stepname=$this->input->post('methodfields2');
//echo 'methodid:'.$methodid;
$qry1="	UPDATE method SET methodname='$stepname' WHERE methodid=$altstepid ";
$this->db->query($qry1);

		 $this->db->select('method.methodid,method.methodname,method.description,method.action,task.taskid,task.taskname');
		 $this->db->from('method');
		 $this->db->join('task_method', 'method.methodid = task_method.methodid');
		 $this->db->join('task', 'task.taskid = task_method.taskid');
		 $this->db->where('task_method.taskid',$taskid);
		 $records = $this->db->get('');
		 return $records->result();
}

public function cancelstep2(){
	$taskid=$this->input->post('taskid');
$altstepid=$this->input->post('methodfields3');
$stepname=$this->input->post('methodfields2');

		 //$this->db->query($qry2);
		 $this->db->select('method.methodid,method.methodname,method.description,method.action,task.taskid,task.taskname');
		 $this->db->from('method');
		 $this->db->join('task_method', 'method.methodid = task_method.methodid');
		 $this->db->join('task', 'task.taskid = task_method.taskid');
		 $this->db->where('task_method.taskid',$taskid);
		 $records = $this->db->get('');
		 return $records->result();
}


public function cancelstep1(){
		$stepid=$this->input->post('stepid');


	return $this->db->select('steps.*,altsteps.*,method.*,task.*')
	->from('altsteps')
	->join('steps_altsteps', 'altsteps.altstepid = steps_altsteps.altstepid')
	->join('steps', 'steps.stepid = steps_altsteps.stepid')
 ->join('method_step', 'steps.stepid = method_step.stepid')
	->join('method', 'method.methodid = method_step.methodid')
	->join('task_method', 'method.methodid = task_method.methodid')
 ->join('task', 'task.taskid = task_method.taskid')
 ->where('steps_altsteps.stepid',$stepid)
														->get()
														->result();

}

public function gotonextstep($stepid){


	return $this->db->select('steps.stepid,steps.stepname,steps.action_description,steps.image,altsteps.altstepid,altsteps.altstepname,method.methodid,method.methodname,method.description,task.taskid,task.taskname,task.Startimage')
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

}

public function performdata($adminid,$sessionid,$timestamp){
	 $conn= mysqli_connect("localhost","root","","cognitivewalkthrough");

if(!empty($_POST['altmethodname'])){
	echo "in altmethodname";
	$personaid = $_POST['personaid'];
	echo 'persona:'.$personaid;
	$personaname = $_POST['personaname'];
	echo 'personaname:'.$personaname;
	$taskid = $_POST['taskid'];
	echo 'taskid:'.$taskid;
	$taskname = $_POST['taskname'];
	echo 'taskname:'.$taskname;
	$methodid = $_POST['method'];
	echo 'methodid:'.$methodid;
	$methodname = $_POST['methodname'];
	echo 'methodname:'.$methodname;
	$variantid = $_POST['variants'];
	echo 'variantid:'.$variantid;
	$variantname = $_POST['variantname'];
	echo 'variantname:'.$variantname;
	$stepid = $_POST['nextstepid'];
	echo 'stepid:'.$stepid;
	$altmethodid = $_POST['altmethodname'];
	echo 'altmethodid:'.$altmethodid;

$qry21 = 	mysqli_query($conn,"SELECT * FROM altsteps WHERE altstepid= '" . mysqli_escape_string($conn,$altmethodid) . "'");
														$rows2 = mysqli_fetch_assoc($qry21);
$altmethodname=$rows2['altstepname'];
echo 'altmethodname:'.$altmethodname;
	$stepname = $_POST['nextstepname'];
	echo 'nextstepname:'.$stepname;
	$stepimage = $_POST['nextstepimage'];
	echo 'nextstepimage:'.$stepimage;
$rating = $this->input->post('rating');
echo $rating;
//$desc = $_POST['desc'];

$reason = $this->input->post('reason');
echo $reason;
	if (!empty($_POST['questionid'])) {

echo "in question if for altmethodname";
if($altmethodid!='None of the above'){
    $questions_array = $_POST['questionid1'];
		  $questionname_array = $_POST['questionname1'];
    $newquestion_array = $_POST['newquestion1'];
		$question1_text_array = $_POST['question1_text'];
    $radioquestions_array = $_POST['answer'];

    for ($i = 0; $i < count($questions_array); $i++) {

        $question = mysqli_real_escape_string($conn,$questions_array[$i]);
				echo 'question:'.$question;
				$questionname = mysqli_real_escape_string($conn,$questionname_array[$i]);
				echo 'question:'.$questionname;
        $newquestion = mysqli_real_escape_string($conn,$newquestion_array[$i]);
				echo 'newquestion:'.$newquestion;
				  $question1_text = mysqli_real_escape_string($conn,$question1_text_array[$i]);
					echo 'question1_text:'.$question1_text;
					  $radioquestions = mysqli_real_escape_string($conn,$radioquestions_array[$i]);
echo 'radioquestions:'.$radioquestions;

  $query = "INSERT INTO perform (adminid,timest,personaid,personaname,taskid,taskname,methodid,methodname,variantid,variantname,stepid,stepname,stepimage,question,questionname,answer,description,added_question,rating,reasons,sessionid) VALUES ('$adminid', '$timestamp', '$personaid','$personaname', '$taskid','$taskname', '$stepid','$stepname', '$variantid','$variantname', '$altmethodid', '$altmethodname','$stepimage','$question','$questionname','$radioquestions', '$question1_text', '$newquestion', '$rating', '$reason', '$sessionid')";
 $this->db->query($query);}
 $result = $this->db->select('*')
												 ->from('perform')
												 ->where('personaid',$personaid)
												 ->where('stepid',$altmethodid)
												 ->where('variantid',$variantid)
												 ->where('question',$question)
												 ->get()
												 ->result();
 $total = count($result);

 echo 'total:'.$total;

	$result1 = $this->db->select('*')
													 ->from('perform')
													 ->where('personaid',$personaid)
													 ->where('stepid',$altmethodid)
												 ->where('variantid',$variantid)
												 ->where('question',$question)
												 ->where('rating',1)
												 ->group_by('timest')
													 ->get()
													 ->result();




															$qry6 = mysqli_query($conn,"SELECT AVG(rating) as avg_rating FROM perform WHERE personaid= '" . mysqli_escape_string($conn,$personaid) . "' and stepid= '" . mysqli_escape_string($conn,$altmethodid) . "' and variantid= '" . mysqli_escape_string($conn,$variantid) . "' group by timest");
																												$rows2 = mysqli_fetch_assoc($qry6);
$final_average=$rows2['avg_rating'];


 $total1 = count($result1);
 $average1 = round($total1 * 100/$total);

 $where = array(
	 'personaid' => $personaid,
								'stepid' =>$altmethodid,
								'rating' => 1,
								'variantid' => $variantid,
								 'question' => $question
						 );

 $data = array('average ' => $final_average,
 'count' => $total1,
 'totalcount' => $total);
 $this->db->where($where);
 $this->db->update('perform ', $data);
// $update1 = "update perform set average=$average1 where stepid=$stepid, rating=1 and variantid=$variantid)";
//  $this->db->query($update1);
 echo 'total1'.$total1;
 echo 'average1:'.$average1;

	$query2 = $this->db->select('*')
													 ->from('perform')
													 ->where('personaid',$personaid)
													 ->where('stepid',$altmethodid)
												 ->where('variantid',$variantid)
												 ->where('question',$question)
												 ->where('rating',2)
												 ->group_by('timest')
													 ->get()
													 ->result();
	$result2 = count($query2);
	$average2 = round($result2 * 100/$total);
	$where = array(
		'personaid' => $personaid,
								 'stepid' =>$altmethodid,
								 'rating' => 2,
								 'variantid' => $variantid,
								 'question' => $question
							);

	$data = array('average ' => $final_average,
	'count' => $result2,
	'totalcount' => $total);
	$this->db->where($where);
	$this->db->update('perform ', $data);
	echo 'result2'.$result2;
	echo 'average2:'.$average2;

	$query3 = $this->db->select('*')
													->from('perform')
													->where('personaid',$personaid)
													->where('stepid',$altmethodid)
													->where('variantid',$variantid)
													->where('question',$question)
												->where('rating',3)
												->group_by('timest')
													->get()
													->result();
	$result3 = count($query3);
	$average3 = round($result3 * 100/$total);
	$where = array(
		'personaid' => $personaid,
								 'stepid' =>$altmethodid,
								 'rating' => 3,
								'variantid' => $variantid,
								 'question' => $question
							);

	$data = array('average ' => $final_average,
	'count' => $result3,
	'totalcount' => $total);
	$this->db->where($where);
	$this->db->update('perform ', $data);
	echo 'result3'.$result3;
	echo 'average3:'.$average3;

	$query4 = $this->db->select('*')
													->from('perform')
													->where('personaid',$personaid)
													->where('stepid',$altmethodid)
													->where('variantid',$variantid)
													->where('question',$question)
												->where('rating',4)
												->group_by('timest')
													->get()
													->result();
	$result4 = count($query4);
	$average4 = round($result4 * 100/$total);
	$where = array(
		'personaid' => $personaid,
								 'stepid' =>$altmethodid,
								 'rating' => 4,
								 'variantid' => $variantid,
									'question' => $question
							);

	$data = array('average ' => $final_average,
	'count' => $result4,
	'totalcount' => $total);
	$this->db->where($where);
	$this->db->update('perform ', $data);
	echo 'result4'.$result4;
	echo 'average4:'.$average4;

	$query5 = $this->db->select('*')
													->from('perform')
													->where('personaid',$personaid)
													->where('stepid',$altmethodid)
													->where('variantid',$variantid)
													->where('question',$question)
												->where('rating',5)
												->group_by('timest')
													->get()
													->result();
	$result5 = count($query5);
 echo 'result5'.$result5;
	$average5 = round($result5 * 100/$total);
	$where = array(
		'personaid' => $personaid,
								 'stepid' =>$altmethodid,
								 'rating' => 5,
								'variantid' => $variantid,
								 'question' => $question
							);

	$data = array('average ' => $final_average,
	'count' => $result5,
	'totalcount' => $total);
	$this->db->where($where);
	$this->db->update('perform ', $data);
	echo 'average5:'.$average5;
}}else{
	echo "altmethod no questions";
	  $query = "INSERT INTO perform (adminid,timest,personaid,personaname,taskid,taskname,methodid,methodname,variantid,variantname,stepname,stepimage,noneoftheabove,rating,reasons,sessionid) VALUES ('$adminid', '$timestamp', '$personaid','$personaname', '$taskid','$taskname', '$stepid','$stepname', '$variantid','$variantname','None of the above','$stepimage','None of the above','$rating', '$reason', '$sessionid')";
	//$query =  "INSERT INTO perform (adminid,timest,personaid,personaname,taskid,taskname,methodid,methodname,variantid,variantname,stepname,stepimage,noneoftheabove,rating,reasons,sessionid) VALUES ('$adminid', '$timestamp', '$personaid','$personaname', '$taskid','$taskname','$stepid','$stepname', '$variantid','$variantname', 'None of the above', '$stepimage','None of the above', '$rating', '$reason', '$sessionid')";
	 $this->db->query($query);
	 $result = $this->db->select('*')
													->from('perform')
													->where('personaid',$personaid)
													->where('stepid',$altmethodid)
													->where('variantid',$variantid)
													->get()
													->result();
	 $total = count($result);

	 echo 'total:'.$total;

	 $result1 = $this->db->select('*')
														->from('perform')
														->where('personaid',$personaid)
														->where('stepid',$altmethodid)
													->where('variantid',$variantid)
													->where('rating',1)
													->group_by('timest')
														->get()
														->result();




															 $qry6 = mysqli_query($conn,"SELECT AVG(rating) as avg_rating FROM perform WHERE personaid= '" . mysqli_escape_string($conn,$personaid) . "' and stepid= '" . mysqli_escape_string($conn,$altmethodid) . "' and variantid= '" . mysqli_escape_string($conn,$variantid) . "' group by timest");
																												 $rows2 = mysqli_fetch_assoc($qry6);
	$final_average=$rows2['avg_rating'];


	 $total1 = count($result1);
	 $average1 = round($total1 * 100/$total);

	 $where = array(
		'personaid' => $personaid,
								 'stepid' =>$altmethodid,
								 'rating' => 1,
								 'variantid' => $variantid,
							);

	 $data = array('average ' => $final_average,
	 'count' => $total1,
	 'totalcount' => $total);
	 $this->db->where($where);
	 $this->db->update('perform ', $data);
	// $update1 = "update perform set average=$average1 where stepid=$stepid, rating=1 and variantid=$variantid)";
	//  $this->db->query($update1);
	 echo 'total1'.$total1;
	 echo 'average1:'.$average1;

	 $query2 = $this->db->select('*')
														->from('perform')
														->where('personaid',$personaid)
														->where('stepid',$altmethodid)
													->where('variantid',$variantid)
													->where('rating',2)
													->group_by('timest')
														->get()
														->result();
	 $result2 = count($query2);
	 $average2 = round($result2 * 100/$total);
	 $where = array(
		 'personaid' => $personaid,
									'stepid' =>$altmethodid,
									'rating' => 2,
									'variantid' => $variantid,
							 );

	 $data = array('average ' => $final_average,
	 'count' => $result2,
	 'totalcount' => $total);
	 $this->db->where($where);
	 $this->db->update('perform ', $data);
	 echo 'result2'.$result2;
	 echo 'average2:'.$average2;

	 $query3 = $this->db->select('*')
													 ->from('perform')
													 ->where('personaid',$personaid)
													 ->where('stepid',$altmethodid)
													 ->where('variantid',$variantid)
												 ->where('rating',3)
												 ->group_by('timest')
													 ->get()
													 ->result();
	 $result3 = count($query3);
	 $average3 = round($result3 * 100/$total);
	 $where = array(
		 'personaid' => $personaid,
									'stepid' =>$altmethodid,
									'rating' => 3,
								 'variantid' => $variantid,
							 );

	 $data = array('average ' => $final_average,
	 'count' => $result3,
	 'totalcount' => $total);
	 $this->db->where($where);
	 $this->db->update('perform ', $data);
	 echo 'result3'.$result3;
	 echo 'average3:'.$average3;

	 $query4 = $this->db->select('*')
													 ->from('perform')
													 ->where('personaid',$personaid)
													 ->where('stepid',$altmethodid)
													 ->where('variantid',$variantid)
												 ->where('rating',4)
												 ->group_by('timest')
													 ->get()
													 ->result();
	 $result4 = count($query4);
	 $average4 = round($result4 * 100/$total);
	 $where = array(
		 'personaid' => $personaid,
									'stepid' =>$altmethodid,
									'rating' => 4,
									'variantid' => $variantid,
							 );

	 $data = array('average ' => $final_average,
	 'count' => $result4,
	 'totalcount' => $total);
	 $this->db->where($where);
	 $this->db->update('perform ', $data);
	 echo 'result4'.$result4;
	 echo 'average4:'.$average4;

	 $query5 = $this->db->select('*')
													 ->from('perform')
													 ->where('personaid',$personaid)
													 ->where('stepid',$altmethodid)
													 ->where('variantid',$variantid)
												 ->where('rating',5)
												 ->group_by('timest')
													 ->get()
													 ->result();
	 $result5 = count($query5);
	 echo 'result5'.$result5;
	 $average5 = round($result5 * 100/$total);
	 $where = array(
		 'personaid' => $personaid,
									'stepid' =>$altmethodid,
									'rating' => 5,
								 'variantid' => $variantid,
							 );

	 $data = array('average ' => $final_average,
	 'count' => $result5,
	 'totalcount' => $total);
	 $this->db->where($where);
	 $this->db->update('perform ', $data);
	 echo 'average5:'.$average5;
}

}
else{
	if (!empty($_POST['questionid'])) {
echo "in questions no altmethodname";
		$personaid = $_POST['personaid'];
		echo 'persona:'.$personaid;
		$personaname = $_POST['personaname'];
		echo 'personaname:'.$personaname;
		$taskid = $_POST['taskid'];
		echo 'taskid:'.$taskid;
		$taskname = $_POST['taskname'];
		echo 'taskname:'.$taskname;
		$methodid = $_POST['method'];
		echo 'methodid:'.$methodid;
		$methodname = $_POST['methodname'];
		echo 'methodname:'.$methodname;
		$variantid = $_POST['variants'];
		echo 'variantid:'.$variantid;
		$variantname = $_POST['variantname'];
		echo 'variantname:'.$variantname;
		$stepid = $_POST['nextstepid'];
		echo 'stepid:'.$stepid;
		$stepname = $_POST['nextstepname'];
		echo 'nextstepname:'.$stepname;
		$stepimage = $_POST['nextstepimage'];
		echo 'nextstepimage:'.$stepimage;
		//$noneoftheabove =
		echo 'nextstepimage:'.$stepimage;
	$rating = $this->input->post('rating');
	echo $rating;

	$reason = $this->input->post('reason');
	echo $reason;
	//$desc = $_POST['desc'];
	if(empty($this->input->post('noneoftheabove'))){
		echo "no in none of the above and no altmethodname";
		//$noneoftheabove = $_POST['noneoftheabove'];
    $questions_array = $_POST['questionid1'];
		  $questionname_array = $_POST['questionname1'];
    $newquestion_array = $_POST['newquestion1'];
		$question1_text_array = $_POST['question1_text'];
    $radioquestions_array = $_POST['answer'];

    for ($i = 0; $i < count($questions_array); $i++) {

        $question = mysqli_real_escape_string($conn,$questions_array[$i]);
				echo 'question:'.$question;
				$questionname = mysqli_real_escape_string($conn,$questionname_array[$i]);
				echo 'question:'.$questionname;
        $newquestion = mysqli_real_escape_string($conn,$newquestion_array[$i]);
				echo 'newquestion:'.$newquestion;
				  $question1_text = mysqli_real_escape_string($conn,$question1_text_array[$i]);
					echo 'question1_text:'.$question1_text;
					  $radioquestions = mysqli_real_escape_string($conn,$radioquestions_array[$i]);
echo 'radioquestions:'.$radioquestions;
//$query = "INSERT INTO perform (adminid,timest,personaid,personaname,taskid,taskname,methodid,methodname,variantid,variantname,stepid,stepname,stepimage,noneoftheabove,rating,reasons,sessionid) VALUES ('$adminid', '$timestamp', '$personaid','$personaname', '$taskid','$taskname', '$methodid','$stepname', '$variantid','$variantname', '$stepid', 'None of the above', '$stepimage', '$noneoftheabove','$rating', '$reason', '$sessionid')";
//$this->db->query($query);

//  $query = "INSERT INTO perform (adminid,timest,personaid,personaname,taskid,taskname,methodid,methodname,variantid,variantname,stepid,stepname,stepimage,noneoftheabove,question,questionname,answer,description,added_question,rating,reasons,sessionid) VALUES ('$adminid', '$timestamp', '$personaid','$personaname', '$taskid','$taskname', '$methodid','$stepname', '$variantid','$variantname', '$stepid', '$stepname','$stepimage','$question','$questionname','$radioquestions', '$question1_text', '$newquestion', '$rating', '$reason', '$sessionid')";

$query = "INSERT INTO perform (adminid,timest,personaid,personaname,taskid,taskname,methodid,methodname,variantid,variantname,stepid,stepname,stepimage,question,questionname,answer,description,added_question,rating,reasons,sessionid) VALUES ('$adminid', '$timestamp', '$personaid','$personaname', '$taskid','$taskname', '$stepid','$stepname', '$variantid','$variantname', '$stepid', '$stepname','$stepimage','$question','$questionname','$radioquestions', '$question1_text', '$newquestion', '$rating', '$reason', '$sessionid')";
 $this->db->query($query);


		}
		 $result = $this->db->select('*')
		 												 ->from('perform')
														 ->where('personaid',$personaid)
		 												 ->where('stepid',$stepid)
		 												 ->where('variantid',$variantid)
														 ->where('question',$question)
		 												 ->get()
		 												 ->result();
		 $total = count($result);

		 echo 'total:'.$total;

		  $result1 = $this->db->select('*')
		  												 ->from('perform')
															 ->where('personaid',$personaid)
		  												 ->where('stepid',$stepid)
		 												 ->where('variantid',$variantid)
														 ->where('question',$question)
		 												 ->where('rating',1)
														 ->group_by('timest')
		  												 ->get()
		  												 ->result();




																	$qry6 = mysqli_query($conn,"SELECT AVG(rating) as avg_rating FROM perform WHERE personaid= '" . mysqli_escape_string($conn,$personaid) . "' and stepid= '" . mysqli_escape_string($conn,$stepid) . "' and variantid= '" . mysqli_escape_string($conn,$variantid) . "' group by timest");
																														$rows2 = mysqli_fetch_assoc($qry6);
$final_average=$rows2['avg_rating'];


		 $total1 = count($result1);
		 $average1 = round($total1 * 100/$total);

		 $where = array(
			 'personaid' => $personaid,
		                'stepid' =>$stepid,
		                'rating' => 1,
										'variantid' => $variantid,
										 'question' => $question
		             );

		 $data = array('average ' => $final_average,
		 'count' => $total1,
		 'totalcount' => $total);
		 $this->db->where($where);
		 $this->db->update('perform ', $data);
		// $update1 = "update perform set average=$average1 where stepid=$stepid, rating=1 and variantid=$variantid)";
		//  $this->db->query($update1);
		 echo 'total1'.$total1;
		 echo 'average1:'.$average1;

		  $query2 = $this->db->select('*')
		  												 ->from('perform')
															 ->where('personaid',$personaid)
		  												 ->where('stepid',$stepid)
		 												 ->where('variantid',$variantid)
														 ->where('question',$question)
		 												 ->where('rating',2)
														 ->group_by('timest')
		  												 ->get()
		  												 ->result();
		  $result2 = count($query2);
		  $average2 = round($result2 * 100/$total);
			$where = array(
				'personaid' => $personaid,
										 'stepid' =>$stepid,
										 'rating' => 2,
										 'variantid' => $variantid,
										 'question' => $question
									);

			$data = array('average ' => $final_average,
			'count' => $result2,
			'totalcount' => $total);
			$this->db->where($where);
			$this->db->update('perform ', $data);
		  echo 'result2'.$result2;
		  echo 'average2:'.$average2;

		  $query3 = $this->db->select('*')
		 													->from('perform')
															->where('personaid',$personaid)
		 													->where('stepid',$stepid)
		 													->where('variantid',$variantid)
															->where('question',$question)
		 												->where('rating',3)
														->group_by('timest')
		 													->get()
		 													->result();
		  $result3 = count($query3);
		  $average3 = round($result3 * 100/$total);
			$where = array(
				'personaid' => $personaid,
		                 'stepid' =>$stepid,
		                 'rating' => 3,
		 								'variantid' => $variantid,
										 'question' => $question
		              );

		  $data = array('average ' => $final_average,
			'count' => $result3,
			'totalcount' => $total);
		  $this->db->where($where);
		  $this->db->update('perform ', $data);
		  echo 'result3'.$result3;
		  echo 'average3:'.$average3;

		  $query4 = $this->db->select('*')
		 													->from('perform')
															->where('personaid',$personaid)
		 													->where('stepid',$stepid)
		 													->where('variantid',$variantid)
															->where('question',$question)
		 												->where('rating',4)
														->group_by('timest')
		 													->get()
		 													->result();
		  $result4 = count($query4);
		  $average4 = round($result4 * 100/$total);
			$where = array(
				'personaid' => $personaid,
										 'stepid' =>$stepid,
										 'rating' => 4,
										 'variantid' => $variantid,
										  'question' => $question
									);

			$data = array('average ' => $final_average,
			'count' => $result4,
			'totalcount' => $total);
			$this->db->where($where);
			$this->db->update('perform ', $data);
		  echo 'result4'.$result4;
		  echo 'average4:'.$average4;

		  $query5 = $this->db->select('*')
		 													->from('perform')
															->where('personaid',$personaid)
		 													->where('stepid',$stepid)
		 													->where('variantid',$variantid)
															->where('question',$question)
		 												->where('rating',5)
														->group_by('timest')
		 													->get()
		 													->result();
		  $result5 = count($query5);
		 echo 'result5'.$result5;
		  $average5 = round($result5 * 100/$total);
			$where = array(
				'personaid' => $personaid,
		                 'stepid' =>$stepid,
		                 'rating' => 5,
		 								'variantid' => $variantid,
										 'question' => $question
		              );

		  $data = array('average ' => $final_average,
			'count' => $result5,
			'totalcount' => $total);
		  $this->db->where($where);
		  $this->db->update('perform ', $data);
		  echo 'average5:'.$average5;

}}else{
	$personaid = $_POST['personaid'];
	echo 'persona:'.$personaid;
	$personaname = $_POST['personaname'];
	echo 'personaname:'.$personaname;
	$taskid = $_POST['taskid'];
	echo 'taskid:'.$taskid;
	$taskname = $_POST['taskname'];
	echo 'taskname:'.$taskname;
	$methodid = $_POST['method'];
	echo 'methodid:'.$methodid;
	$methodname = $_POST['methodname'];
	echo 'methodname:'.$methodname;
	$variantid = $_POST['variants'];
	echo 'variantid:'.$variantid;
	$variantname = $_POST['variantname'];
	echo 'variantname:'.$variantname;
	$stepid = $_POST['nextstepid'];
	echo 'stepid:'.$stepid;
	$stepname = $_POST['nextstepname'];
	echo 'nextstepname:'.$stepname;
	$stepimage = $_POST['nextstepimage'];
	echo 'nextstepimage:'.$stepimage;
	//$noneoftheabove =
	echo 'nextstepimage:'.$stepimage;
$rating = $this->input->post('rating');
echo $rating;

$reason = $this->input->post('reason');
echo $reason;
echo "no altmenthdname and none of the above";
	$query = "INSERT INTO perform (adminid,timest,personaid,personaname,taskid,taskname,methodid,methodname,variantid,variantname,stepid,stepname,stepimage,noneoftheabove,rating,reasons,sessionid) VALUES ('$adminid', '$timestamp', '$personaid','$personaname', '$taskid','$taskname', '$stepid','$stepname', '$variantid','$variantname','$stepid','None of the above','$stepimage','None of the above','$rating', '$reason', '$sessionid')";

	//$query = "INSERT INTO perform (adminid,timest,personaid,personaname,taskid,taskname,methodid,methodname,variantid,variantname,stepid,stepname,stepimage,rating,reasons,sessionid) VALUES ('$adminid', '$timestamp', '$personaid','$personaname', '$taskid','$taskname', '$methodid','$stepname', '$variantid','$variantname', '$stepid', '$stepname', '$stepimage', '$rating', '$reason', '$sessionid')";
 $this->db->query($query);

 $result = $this->db->select('*')
												 ->from('perform')
												 ->where('personaid',$personaid)
												 ->where('stepid',$stepid)
												 ->where('variantid',$variantid)
												 ->get()
												 ->result();
 $total = count($result);

 echo 'total:'.$total;

	$result1 = $this->db->select('*')
												 ->from('perform')
												 ->where('personaid',$personaid)
												 ->where('stepid',$stepid)
												 ->where('variantid',$variantid)
												 ->where('rating',1)
												 ->get()
												 ->result();

	$qry6 = mysqli_query($conn,"SELECT AVG(rating) as avg_rating FROM perform WHERE personaid= '" . mysqli_escape_string($conn,$personaid) . "' and stepid= '" . mysqli_escape_string($conn,$stepid) . "' and variantid= '" . mysqli_escape_string($conn,$variantid) . "' group by timest");
																																										$rows2 = mysqli_fetch_assoc($qry6);
		$final_average=$rows2['avg_rating'];
 $total1 = count($result1);
 $average1 = round($total1 * 100/$total);

 $where = array(
	'personaid' => $personaid,
							 'stepid' =>$stepid,
							 'rating' => 1,
							 'variantid' => $variantid
						);

 $data = array('average ' => $final_average,
							'count' => $total1,
							'totalcount' => $total
						);
 $this->db->where($where);
 $this->db->update('perform ', $data);
 echo 'total1'.$total1;
 echo 'average1:'.$average1;

	$query2 = $this->db->select('*')
												 ->from('perform')
												 ->where('personaid',$personaid)
												 ->where('stepid',$stepid)
												 ->where('variantid',$variantid)
												 ->where('rating',2)
												 ->get()
												 ->result();
	$result2 = count($query2);
	$average2 = round($result2 * 100/$total);
	$where = array(
	 'personaid' => $personaid,
								'stepid' =>$stepid,
								'rating' => 2,
							 'variantid' => $variantid
						 );

	$data = array('average ' => $final_average,
	'count' =>$result2,
	'totalcount' =>$total);
	$this->db->where($where);
	$this->db->update('perform ', $data);
	echo 'result2'.$result2;
	echo 'average2:'.$average2;

	$query3 = $this->db->select('*')
													->from('perform')
													->where('personaid',$personaid)
													->where('stepid',$stepid)
													->where('variantid',$variantid)
												->where('rating',3)
													->get()
													->result();
	$result3 = count($query3);
	$average3 = round($result3 * 100/$total);
	$where = array(
	 'personaid' => $personaid,
								'stepid' =>$stepid,
								'rating' => 3,
								'variantid' => $variantid
						 );

	$data = array('average ' => $final_average,
	'count' =>$result3,
	'totalcount' =>$total);
	$this->db->where($where);
	$this->db->update('perform ', $data);
	echo 'result3'.$result3;
	echo 'average3:'.$average3;

	$query4 = $this->db->select('*')
													->from('perform')
													->where('personaid',$personaid)
													->where('stepid',$stepid)
													->where('variantid',$variantid)
												->where('rating',4)
													->get()
													->result();
	$result4 = count($query4);
	$average4 = round($result4 * 100/$total);
	$where = array(
	 'personaid' => $personaid,
								'stepid' =>$stepid,
								'rating' => 4,
							 'variantid' => $variantid
						 );

	$data = array('average ' => $final_average,
	'count' =>$result4,
	'totalcount' =>$total);
	$this->db->where($where);
	$this->db->update('perform ', $data);
	echo 'result4'.$result4;
	echo 'average4:'.$average4;

	$query5 = $this->db->select('*')
													->from('perform')
													->where('personaid',$personaid)
													->where('stepid',$stepid)
													->where('variantid',$variantid)
												->where('rating',5)
													->get()
													->result();
	$result5 = count($query5);
 echo 'result5'.$result5;
	$average5 = round($result5 * 100/$total);
	$where = array(
	 'personaid' => $personaid,
								'stepid' =>$stepid,
								'rating' => 5,
							 'variantid' => $variantid
						 );

	$data = array('average ' => $final_average,
	'count' =>$result5,
	'totalcount' =>$total);
	$this->db->where($where);
	$this->db->update('perform ', $data);
	echo 'average5:'.$average5;
}

}
}


public function performdatafornone($adminid,$sessionid,$timestamp){
$conn= mysqli_connect("localhost","root","","cognitivewalkthrough");

if(!empty($_POST['altmethodname'])){
	$personaid = $_POST['personaid'];
	echo 'persona:'.$personaid;
	$personaname = $_POST['personaname'];
	echo 'personaname:'.$personaname;
	$taskid = $_POST['taskid'];
	echo 'taskid:'.$taskid;
	$taskname = $_POST['taskname'];
	echo 'taskname:'.$taskname;
	$methodid = $_POST['method'];
	echo 'methodid:'.$methodid;
	$methodname = $_POST['methodname'];
	echo 'methodname:'.$methodname;
	$variantid = $_POST['variants'];
	echo 'variantid:'.$variantid;
	$variantname = $_POST['variantname'];
	echo 'variantname:'.$variantname;
	$stepid = $_POST['nextstepid'];
	echo 'stepid:'.$stepid;
	$altmethodid = $_POST['altmethodname'];
	echo 'altmethodid:'.$altmethodid;

$qry21 = 	mysqli_query($conn,"SELECT * FROM altsteps WHERE altstepid= '" . mysqli_escape_string($conn,$altmethodid) . "'");
														$rows2 = mysqli_fetch_assoc($qry21);
$altmethodname=$rows2['altstepname'];
echo 'altmethodname:'.$altmethodname;
	$stepname = $_POST['nextstepname'];
	echo 'nextstepname:'.$stepname;
	$stepimage = $_POST['nextstepimage'];
	echo 'nextstepimage:'.$stepimage;
$rating = $this->input->post('rating');
echo $rating;
//$desc = $_POST['desc'];

$reason = $this->input->post('reason');
echo $reason;
if($altmethodid!='None of the above'){
  $query = "INSERT INTO perform (adminid,timest,personaid,personaname,taskid,taskname,methodid,methodname,variantid,variantname,stepid,stepname,stepimage,rating,reasons,sessionid) VALUES ('$adminid', '$timestamp', '$personaid','$personaname', '$taskid','$taskname', '$stepid','$stepname', '$variantid','$variantname', '$altmethodid', '$altmethodname','$stepimage', '$rating', '$reason', '$sessionid')";
 $this->db->query($query);


$result = $this->db->select('*')
												 ->from('perform')
												 ->where('personaid',$personaid)
												 ->where('stepid',$altmethodid)
												 ->where('variantid',$variantid)
												 ->get()
												 ->result();
$total = count($result);

echo 'total:'.$total;

 $result1 = $this->db->select('*')
 												 ->from('perform')
												 ->where('personaid',$personaid)
 												 ->where('stepid',$altmethodid)
												 ->where('variantid',$variantid)
												 ->where('rating',1)
 												 ->get()
 												 ->result();


												 																	$qry6 = mysqli_query($conn,"SELECT AVG(rating) as avg_rating FROM perform WHERE personaid= '" . mysqli_escape_string($conn,$personaid) . "' and stepid= '" . mysqli_escape_string($conn,$altmethodid) . "' and variantid= '" . mysqli_escape_string($conn,$variantid) . "' group by timest");
												 																														$rows2 = mysqli_fetch_assoc($qry6);
												 $final_average=$rows2['avg_rating'];
$total1 = count($result1);
$average1 = round($total1 * 100/$total);

$where = array(
	'personaid' => $personaid,
							 'stepid' =>$altmethodid,
							 'rating' => 1,
							 'variantid' => $variantid
						);

$data = array('average ' => $final_average,
							'count' => $total1,
							'totalcount' => $total
						);
$this->db->where($where);
$this->db->update('perform ', $data);
echo 'total1'.$total1;
echo 'average1:'.$average1;

 $query2 = $this->db->select('*')
 												 ->from('perform')
												 ->where('personaid',$personaid)
 												 ->where('stepid',$altmethodid)
												 ->where('variantid',$variantid)
												 ->where('rating',2)
 												 ->get()
 												 ->result();
 $result2 = count($query2);
 $average2 = round($result2 * 100/$total);
 $where = array(
	 'personaid' => $personaid,
								'stepid' =>$altmethodid,
								'rating' => 2,
							 'variantid' => $variantid
						 );

 $data = array('average ' => $final_average,
 'count' =>$result2,
 'totalcount' =>$total);
 $this->db->where($where);
 $this->db->update('perform ', $data);
 echo 'result2'.$result2;
 echo 'average2:'.$average2;

 $query3 = $this->db->select('*')
													->from('perform')
													->where('personaid',$personaid)
													->where('stepid',$altmethodid)
													->where('variantid',$variantid)
												->where('rating',3)
													->get()
													->result();
 $result3 = count($query3);
 $average3 = round($result3 * 100/$total);
 $where = array(
	 'personaid' => $personaid,
                'stepid' =>$altmethodid,
                'rating' => 3,
								'variantid' => $variantid
             );

 $data = array('average ' => $final_average,
 'count' =>$result3,
 'totalcount' =>$total);
 $this->db->where($where);
 $this->db->update('perform ', $data);
 echo 'result3'.$result3;
 echo 'average3:'.$average3;

 $query4 = $this->db->select('*')
													->from('perform')
													->where('personaid',$personaid)
													->where('stepid',$altmethodid)
													->where('variantid',$variantid)
												->where('rating',4)
													->get()
													->result();
 $result4 = count($query4);
 $average4 = round($result4 * 100/$total);
 $where = array(
	 'personaid' => $personaid,
								'stepid' =>$altmethodid,
								'rating' => 4,
							 'variantid' => $variantid
						 );

 $data = array('average ' => $final_average,
 'count' =>$result4,
 'totalcount' =>$total);
 $this->db->where($where);
 $this->db->update('perform ', $data);
 echo 'result4'.$result4;
 echo 'average4:'.$average4;

 $query5 = $this->db->select('*')
													->from('perform')
													->where('personaid',$personaid)
													->where('stepid',$altmethodid)
													->where('variantid',$variantid)
												->where('rating',5)
													->get()
													->result();
 $result5 = count($query5);
echo 'result5'.$result5;
 $average5 = round($result5 * 100/$total);
 $where = array(
	 'personaid' => $personaid,
								'stepid' =>$altmethodid,
								'rating' => 5,
							 'variantid' => $variantid
						 );

 $data = array('average ' => $final_average,
 'count' =>$result5,
 'totalcount' =>$total);
 $this->db->where($where);
 $this->db->update('perform ', $data);
 echo 'average5:'.$average5;
}else{
	$query =  "INSERT INTO perform (adminid,timest,personaid,personaname,taskid,taskname,methodid,methodname,variantid,variantname,stepname,stepimage,noneoftheabove,rating,reasons,sessionid) VALUES ('$adminid', '$timestamp', '$personaid','$personaname', '$taskid','$taskname','$stepid','$stepname', '$variantid','$variantname', 'None of the above', '$stepimage','None of the above', '$rating', '$reason', '$sessionid')";
	 $this->db->query($query);

		 $result = $this->db->select('*')
														 ->from('perform')
														 ->where('personaid',$personaid)
														 ->where('stepid',$stepid)
														 ->where('variantid',$variantid)
														 ->get()
														 ->result();
		 $total = count($result);

		 echo 'total:'.$total;

			$result1 = $this->db->select('*')
															 ->from('perform')
															 ->where('personaid',$personaid)
															 ->where('stepid',$stepid)
														 ->where('variantid',$variantid)
														 ->where('rating',1)
														 ->group_by('timest')
															 ->get()
															 ->result();




																	$qry6 = mysqli_query($conn,"SELECT AVG(rating) as avg_rating FROM perform WHERE personaid= '" . mysqli_escape_string($conn,$personaid) . "' and stepid= '" . mysqli_escape_string($conn,$stepid) . "' and variantid= '" . mysqli_escape_string($conn,$variantid) . "' group by timest");
																														$rows2 = mysqli_fetch_assoc($qry6);
$final_average=$rows2['avg_rating'];


		 $total1 = count($result1);
		 $average1 = round($total1 * 100/$total);

		 $where = array(
			 'personaid' => $personaid,
										'stepid' =>$stepid,
										'rating' => 1,
										'variantid' => $variantid,
								 );

		 $data = array('average ' => $final_average,
		 'count' => $total1,
		 'totalcount' => $total);
		 $this->db->where($where);
		 $this->db->update('perform ', $data);
		// $update1 = "update perform set average=$average1 where stepid=$stepid, rating=1 and variantid=$variantid)";
		//  $this->db->query($update1);
		 echo 'total1'.$total1;
		 echo 'average1:'.$average1;

			$query2 = $this->db->select('*')
															 ->from('perform')
															 ->where('personaid',$personaid)
															 ->where('stepid',$stepid)
														 ->where('variantid',$variantid)
														 ->where('rating',2)
														 ->group_by('timest')
															 ->get()
															 ->result();
			$result2 = count($query2);
			$average2 = round($result2 * 100/$total);
			$where = array(
				'personaid' => $personaid,
										 'stepid' =>$stepid,
										 'rating' => 2,
										 'variantid' => $variantid,
									);

			$data = array('average ' => $final_average,
			'count' => $result2,
			'totalcount' => $total);
			$this->db->where($where);
			$this->db->update('perform ', $data);
			echo 'result2'.$result2;
			echo 'average2:'.$average2;

			$query3 = $this->db->select('*')
															->from('perform')
															->where('personaid',$personaid)
															->where('stepid',$stepid)
															->where('variantid',$variantid)
														->where('rating',3)
														->group_by('timest')
															->get()
															->result();
			$result3 = count($query3);
			$average3 = round($result3 * 100/$total);
			$where = array(
				'personaid' => $personaid,
										 'stepid' =>$stepid,
										 'rating' => 3,
										'variantid' => $variantid,
									);

			$data = array('average ' => $final_average,
			'count' => $result3,
			'totalcount' => $total);
			$this->db->where($where);
			$this->db->update('perform ', $data);
			echo 'result3'.$result3;
			echo 'average3:'.$average3;

			$query4 = $this->db->select('*')
															->from('perform')
															->where('personaid',$personaid)
															->where('stepid',$stepid)
															->where('variantid',$variantid)
														->where('rating',4)
														->group_by('timest')
															->get()
															->result();
			$result4 = count($query4);
			$average4 = round($result4 * 100/$total);
			$where = array(
				'personaid' => $personaid,
										 'stepid' =>$stepid,
										 'rating' => 4,
										 'variantid' => $variantid,
									);

			$data = array('average ' => $final_average,
			'count' => $result4,
			'totalcount' => $total);
			$this->db->where($where);
			$this->db->update('perform ', $data);
			echo 'result4'.$result4;
			echo 'average4:'.$average4;

			$query5 = $this->db->select('*')
															->from('perform')
															->where('personaid',$personaid)
															->where('stepid',$stepid)
															->where('variantid',$variantid)
														->where('rating',5)
														->group_by('timest')
															->get()
															->result();
			$result5 = count($query5);
		 echo 'result5'.$result5;
			$average5 = round($result5 * 100/$total);
			$where = array(
				'personaid' => $personaid,
										 'stepid' =>$stepid,
										 'rating' => 5,
										'variantid' => $variantid,
									);

			$data = array('average ' => $final_average,
			'count' => $result5,
			'totalcount' => $total);
			$this->db->where($where);
			$this->db->update('perform ', $data);
			echo 'average5:'.$average5;



}
}else{
	$personaid = $_POST['personaid'];
	echo 'persona:'.$personaid;
	$personaname = $_POST['personaname'];
	echo 'personaname:'.$personaname;
	$taskid = $_POST['taskid'];
	echo 'taskid:'.$taskid;
	$taskname = $_POST['taskname'];
	echo 'taskname:'.$taskname;
	$methodid = $_POST['method'];
	echo 'methodid:'.$methodid;
	$methodname = $_POST['methodname'];
	echo 'methodname:'.$methodname;
	$variantid = $_POST['variants'];
	echo 'variantid:'.$variantid;
	$variantname = $_POST['variantname'];
	echo 'variantname:'.$variantname;
	$stepid = $_POST['nextstepid'];
	echo 'stepid:'.$stepid;
	$stepname = $_POST['nextstepname'];
	echo 'nextstepname:'.$stepname;
	$stepimage = $_POST['nextstepimage'];
	echo 'nextstepimage:'.$stepimage;
	//$noneoftheabove =
	echo 'nextstepimage:'.$stepimage;
$rating = $this->input->post('rating');
echo $rating;

$reason = $this->input->post('reason');
echo $reason;
//$desc = $_POST['desc'];
if($this->input->post('noneoftheabove')){
	$noneoftheabove = $_POST['noneoftheabove'];
	$query = "INSERT INTO perform (adminid,timest,personaid,personaname,taskid,taskname,methodid,methodname,variantid,variantname,stepid,stepname,stepimage,noneoftheabove,rating,reasons,sessionid) VALUES ('$adminid', '$timestamp', '$personaid','$personaname', '$taskid','$taskname', '$methodid','$stepname', '$variantid','$variantname', '$stepid', 'None of the above', '$stepimage', '$noneoftheabove','$rating', '$reason', '$sessionid')";
 $this->db->query($query);

 $result = $this->db->select('*')
 												 ->from('perform')
 												 ->where('personaid',$personaid)
 												 ->where('stepid',$stepid)
 												 ->where('variantid',$variantid)
 												 ->get()
 												 ->result();
 $total = count($result);

 echo 'total:'.$total;

  $result1 = $this->db->select('*')
 												 ->from('perform')
 												 ->where('personaid',$personaid)
 												 ->where('stepid',$stepid)
 												 ->where('variantid',$variantid)
 												 ->where('rating',1)
 												 ->get()
 												 ->result();


 																													$qry6 = mysqli_query($conn,"SELECT AVG(rating) as avg_rating FROM perform WHERE personaid= '" . mysqli_escape_string($conn,$personaid) . "' and stepid= '" . mysqli_escape_string($conn,$stepid) . "' and variantid= '" . mysqli_escape_string($conn,$variantid) . "' group by timest");
 																																										$rows2 = mysqli_fetch_assoc($qry6);
 												 $final_average=$rows2['avg_rating'];
 $total1 = count($result1);
 $average1 = round($total1 * 100/$total);

 $where = array(
 	'personaid' => $personaid,
 							 'stepid' =>$stepid,
 							 'rating' => 1,
 							 'variantid' => $variantid
 						);

 $data = array('average ' => $final_average,
 							'count' => $total1,
 							'totalcount' => $total
 						);
 $this->db->where($where);
 $this->db->update('perform ', $data);
 echo 'total1'.$total1;
 echo 'average1:'.$average1;

  $query2 = $this->db->select('*')
 												 ->from('perform')
 												 ->where('personaid',$personaid)
 												 ->where('stepid',$stepid)
 												 ->where('variantid',$variantid)
 												 ->where('rating',2)
 												 ->get()
 												 ->result();
  $result2 = count($query2);
  $average2 = round($result2 * 100/$total);
  $where = array(
 	 'personaid' => $personaid,
 								'stepid' =>$stepid,
 								'rating' => 2,
 							 'variantid' => $variantid
 						 );

  $data = array('average ' => $final_average,
  'count' =>$result2,
  'totalcount' =>$total);
  $this->db->where($where);
  $this->db->update('perform ', $data);
  echo 'result2'.$result2;
  echo 'average2:'.$average2;

  $query3 = $this->db->select('*')
 													->from('perform')
 													->where('personaid',$personaid)
 													->where('stepid',$stepid)
 													->where('variantid',$variantid)
 												->where('rating',3)
 													->get()
 													->result();
  $result3 = count($query3);
  $average3 = round($result3 * 100/$total);
  $where = array(
 	 'personaid' => $personaid,
 								'stepid' =>$stepid,
 								'rating' => 3,
 								'variantid' => $variantid
 						 );

  $data = array('average ' => $final_average,
  'count' =>$result3,
  'totalcount' =>$total);
  $this->db->where($where);
  $this->db->update('perform ', $data);
  echo 'result3'.$result3;
  echo 'average3:'.$average3;

  $query4 = $this->db->select('*')
 													->from('perform')
 													->where('personaid',$personaid)
 													->where('stepid',$stepid)
 													->where('variantid',$variantid)
 												->where('rating',4)
 													->get()
 													->result();
  $result4 = count($query4);
  $average4 = round($result4 * 100/$total);
  $where = array(
 	 'personaid' => $personaid,
 								'stepid' =>$stepid,
 								'rating' => 4,
 							 'variantid' => $variantid
 						 );

  $data = array('average ' => $final_average,
  'count' =>$result4,
  'totalcount' =>$total);
  $this->db->where($where);
  $this->db->update('perform ', $data);
  echo 'result4'.$result4;
  echo 'average4:'.$average4;

  $query5 = $this->db->select('*')
 													->from('perform')
 													->where('personaid',$personaid)
 													->where('stepid',$stepid)
 													->where('variantid',$variantid)
 												->where('rating',5)
 													->get()
 													->result();
  $result5 = count($query5);
 echo 'result5'.$result5;
  $average5 = round($result5 * 100/$total);
  $where = array(
 	 'personaid' => $personaid,
 								'stepid' =>$stepid,
 								'rating' => 5,
 							 'variantid' => $variantid
 						 );

  $data = array('average ' => $final_average,
  'count' =>$result5,
  'totalcount' =>$total);
  $this->db->where($where);
  $this->db->update('perform ', $data);
  echo 'average5:'.$average5;
}
	else{
		$query = "INSERT INTO perform (adminid,timest,personaid,personaname,taskid,taskname,methodid,methodname,variantid,variantname,stepid,stepname,stepimage,rating,reasons,sessionid) VALUES ('$adminid', '$timestamp', '$personaid','$personaname', '$taskid','$taskname', '$methodid','$stepname', '$variantid','$variantname', '$stepid', '$stepname', '$stepimage', '$rating', '$reason', '$sessionid')";
	 $this->db->query($query);

	 $result = $this->db->select('*')
	 												 ->from('perform')
	 												 ->where('personaid',$personaid)
	 												 ->where('stepid',$stepid)
	 												 ->where('variantid',$variantid)
	 												 ->get()
	 												 ->result();
	 $total = count($result);

	 echo 'total:'.$total;

	  $result1 = $this->db->select('*')
	 												 ->from('perform')
	 												 ->where('personaid',$personaid)
	 												 ->where('stepid',$stepid)
	 												 ->where('variantid',$variantid)
	 												 ->where('rating',1)
	 												 ->get()
	 												 ->result();


	 																													$qry6 = mysqli_query($conn,"SELECT AVG(rating) as avg_rating FROM perform WHERE personaid= '" . mysqli_escape_string($conn,$personaid) . "' and stepid= '" . mysqli_escape_string($conn,$stepid) . "' and variantid= '" . mysqli_escape_string($conn,$variantid) . "' group by timest");
	 																																										$rows2 = mysqli_fetch_assoc($qry6);
	 												 $final_average=$rows2['avg_rating'];
	 $total1 = count($result1);
	 $average1 = round($total1 * 100/$total);

	 $where = array(
	 	'personaid' => $personaid,
	 							 'stepid' =>$stepid,
	 							 'rating' => 1,
	 							 'variantid' => $variantid
	 						);

	 $data = array('average ' => $final_average,
	 							'count' => $total1,
	 							'totalcount' => $total
	 						);
	 $this->db->where($where);
	 $this->db->update('perform ', $data);
	 echo 'total1'.$total1;
	 echo 'average1:'.$average1;

	  $query2 = $this->db->select('*')
	 												 ->from('perform')
	 												 ->where('personaid',$personaid)
	 												 ->where('stepid',$stepid)
	 												 ->where('variantid',$variantid)
	 												 ->where('rating',2)
	 												 ->get()
	 												 ->result();
	  $result2 = count($query2);
	  $average2 = round($result2 * 100/$total);
	  $where = array(
	 	 'personaid' => $personaid,
	 								'stepid' =>$stepid,
	 								'rating' => 2,
	 							 'variantid' => $variantid
	 						 );

	  $data = array('average ' => $final_average,
	  'count' =>$result2,
	  'totalcount' =>$total);
	  $this->db->where($where);
	  $this->db->update('perform ', $data);
	  echo 'result2'.$result2;
	  echo 'average2:'.$average2;

	  $query3 = $this->db->select('*')
	 													->from('perform')
	 													->where('personaid',$personaid)
	 													->where('stepid',$stepid)
	 													->where('variantid',$variantid)
	 												->where('rating',3)
	 													->get()
	 													->result();
	  $result3 = count($query3);
	  $average3 = round($result3 * 100/$total);
	  $where = array(
	 	 'personaid' => $personaid,
	 								'stepid' =>$stepid,
	 								'rating' => 3,
	 								'variantid' => $variantid
	 						 );

	  $data = array('average ' => $final_average,
	  'count' =>$result3,
	  'totalcount' =>$total);
	  $this->db->where($where);
	  $this->db->update('perform ', $data);
	  echo 'result3'.$result3;
	  echo 'average3:'.$average3;

	  $query4 = $this->db->select('*')
	 													->from('perform')
	 													->where('personaid',$personaid)
	 													->where('stepid',$stepid)
	 													->where('variantid',$variantid)
	 												->where('rating',4)
	 													->get()
	 													->result();
	  $result4 = count($query4);
	  $average4 = round($result4 * 100/$total);
	  $where = array(
	 	 'personaid' => $personaid,
	 								'stepid' =>$stepid,
	 								'rating' => 4,
	 							 'variantid' => $variantid
	 						 );

	  $data = array('average ' => $final_average,
	  'count' =>$result4,
	  'totalcount' =>$total);
	  $this->db->where($where);
	  $this->db->update('perform ', $data);
	  echo 'result4'.$result4;
	  echo 'average4:'.$average4;

	  $query5 = $this->db->select('*')
	 													->from('perform')
	 													->where('personaid',$personaid)
	 													->where('stepid',$stepid)
	 													->where('variantid',$variantid)
	 												->where('rating',5)
	 													->get()
	 													->result();
	  $result5 = count($query5);
	 echo 'result5'.$result5;
	  $average5 = round($result5 * 100/$total);
	  $where = array(
	 	 'personaid' => $personaid,
	 								'stepid' =>$stepid,
	 								'rating' => 5,
	 							 'variantid' => $variantid
	 						 );

	  $data = array('average ' => $final_average,
	  'count' =>$result5,
	  'totalcount' =>$total);
	  $this->db->where($where);
	  $this->db->update('perform ', $data);
	  echo 'average5:'.$average5;
	}

}
}




	public function getresultlist($adminid)
	{

		$conn= mysqli_connect("localhost","root","","cognitivewalkthrough");

		$qry6 = mysqli_query($conn,"select DISTINCT perform.* from perform where exists(select task.* from task where task.taskid=perform.taskid and task.adminid='" . mysqli_escape_string($conn,$adminid) . "') GROUP by perform.timest");
	 return $qry6;


	        //  ->select('*')
	        //  ->from('perform')
					//  ->group_by('timest')
	        //  ->get()
	        //  ->result();
	}

public function getadmindata($adminid){
	return $this->db->select('*')
				->from('admin_table')
				->where('adminid',$adminid)
				->get()
				->result();
}

public function deleteresult($timestamp){
	$qry = "DELETE FROM perform
 			 WHERE timest=$timestamp";
			 $this->db->query($qry);
}

public function getTasklist1()
	{
		 return $this->db
					 ->select('taskid,taskname')
					 ->from('task')
					 ->get()
					 ->result();
	}


	public function performdatafirststep($adminid,$sessionid,$timestamp){
		 $conn= mysqli_connect("localhost","root","","cognitivewalkthrough");
		 $personaid = $_POST['personaid'];
	 	echo 'persona:'.$personaid;
	 	$personaname = $_POST['personaname'];
	 	echo 'personaname:'.$personaname;
	 	$taskid = $_POST['taskid'];
	 	echo 'taskid:'.$taskid;
	 	$taskname = $_POST['taskname'];
	 	echo 'taskname:'.$taskname;
	 	$methodid = $_POST['method'];
	 	echo 'methodid:'.$methodid;
	 	//$methodname = $_POST['methodname'];
	 	$qry10 = mysqli_query($conn,"SELECT * FROM method WHERE methodid= '" . mysqli_escape_string($conn,$methodid) . "' ");
	 														$rows10 = mysqli_fetch_assoc($qry10);
	 	$methodname = $rows10['methodname'];
	 	echo 'methodname:'.$methodname;
	 	$variantid = $_POST['variants'];
	 	echo 'variantid:'.$variantid;
	 	$variantname = $_POST['variantname'];
	 	echo 'variantname:'.$variantname;
	 	$stepid = $_POST['method'];
	 	echo 'stepid:'.$stepid;
	 //	$stepname = $_POST['methodname'];
	 //	echo 'nextstepname:'.$stepname;
	 	$stepimage = $_POST['nextstepimage'];
	 	echo 'nextstepimage:'.$stepimage;
	 	$rating = $_POST['rating'];
	 	echo 'rating:'.$rating;
	 	$reason = $_POST['reason'];
	 	echo 'reason:' .$reason;
	 $action=$_POST['home'];
	 echo $action;
		if (!empty($_POST['questionid']) ) {



	    $questions_array = $_POST['questionid'];
			  $questionname_array = $_POST['questionname'];
	    $newquestion_array = $_POST['newquestion'];
			$question1_text_array = $_POST['question1_text'];
	    $radioquestions_array = $_POST['answer'];

	    for ($i = 0; $i < count($questions_array); $i++) {

	        $question = mysqli_real_escape_string($conn,$questions_array[$i]);
					echo 'question:'.$question;
					$questionname = mysqli_real_escape_string($conn,$questionname_array[$i]);
					echo 'question:'.$questionname;
	        $newquestion = mysqli_real_escape_string($conn,$newquestion_array[$i]);
					echo 'newquestion:'.$newquestion;
					  $question1_text = mysqli_real_escape_string($conn,$question1_text_array[$i]);
						echo 'question1_text:'.$question1_text;
						  $radioquestions = mysqli_real_escape_string($conn,$radioquestions_array[$i]);
	echo 'radioquestions:'.$radioquestions;



	  $query = "INSERT INTO perform (adminid,timest,personaid,personaname,taskid,taskname,methodname,variantid,variantname,stepid,stepname,stepimage,question,questionname,answer,description,added_question,rating,reasons,sessionid) VALUES ('$adminid', '$timestamp', '$personaid','$personaname', '$taskid','$taskname', '$action', '$variantid','$variantname', '$methodid', '$methodname','$stepimage', '$question','$questionname','$radioquestions', '$question1_text', '$newquestion', '$rating', '$reason', '$sessionid')";
		 $this->db->query($query);
	}

	 $result = $this->db->select('*')
													 ->from('perform')
													 ->where('personaid',$personaid)
													 ->where('stepid',$stepid)
													 ->where('variantid',$variantid)
													 ->where('question',$question)
													 ->get()
													 ->result();
	 $total = count($result);

	 echo 'total:'.$total;

		$result1 = $this->db->select('*')
														 ->from('perform')
														 ->where('personaid',$personaid)
														 ->where('stepid',$stepid)
													 ->where('variantid',$variantid)
													 ->where('question',$question)
													 ->where('rating',1)
													 ->group_by('timest')
														 ->get()
														 ->result();




																$qry6 = mysqli_query($conn,"SELECT AVG(rating) as avg_rating FROM perform WHERE personaid= '" . mysqli_escape_string($conn,$personaid) . "' and stepid= '" . mysqli_escape_string($conn,$stepid) . "' and variantid= '" . mysqli_escape_string($conn,$variantid) . "' group by timest");
																													$rows2 = mysqli_fetch_assoc($qry6);
	$final_average=$rows2['avg_rating'];


	 $total1 = count($result1);
	 $average1 = round($total1 * 100/$total);

	 $where = array(
		 'personaid' => $personaid,
									'stepid' =>$stepid,
									'rating' => 1,
									'variantid' => $variantid,
									 'question' => $question
							 );

	 $data = array('average ' => $final_average,
	 'count' => $total1,
	 'totalcount' => $total);
	 $this->db->where($where);
	 $this->db->update('perform ', $data);
	// $update1 = "update perform set average=$average1 where stepid=$stepid, rating=1 and variantid=$variantid)";
	//  $this->db->query($update1);
	 echo 'total1'.$total1;
	 echo 'average1:'.$average1;

		$query2 = $this->db->select('*')
														 ->from('perform')
														 ->where('personaid',$personaid)
														 ->where('stepid',$stepid)
													 ->where('variantid',$variantid)
													 ->where('question',$question)
													 ->where('rating',2)
													 ->group_by('timest')
														 ->get()
														 ->result();
		$result2 = count($query2);
		$average2 = round($result2 * 100/$total);
		$where = array(
			'personaid' => $personaid,
									 'stepid' =>$stepid,
									 'rating' => 2,
									 'variantid' => $variantid,
									 'question' => $question
								);

		$data = array('average ' => $final_average,
		'count' => $result2,
		'totalcount' => $total);
		$this->db->where($where);
		$this->db->update('perform ', $data);
		echo 'result2'.$result2;
		echo 'average2:'.$average2;

		$query3 = $this->db->select('*')
														->from('perform')
														->where('personaid',$personaid)
														->where('stepid',$stepid)
														->where('variantid',$variantid)
														->where('question',$question)
													->where('rating',3)
													->group_by('timest')
														->get()
														->result();
		$result3 = count($query3);
		$average3 = round($result3 * 100/$total);
		$where = array(
			'personaid' => $personaid,
									 'stepid' =>$stepid,
									 'rating' => 3,
									'variantid' => $variantid,
									 'question' => $question
								);

		$data = array('average ' => $final_average,
		'count' => $result3,
		'totalcount' => $total);
		$this->db->where($where);
		$this->db->update('perform ', $data);
		echo 'result3'.$result3;
		echo 'average3:'.$average3;

		$query4 = $this->db->select('*')
														->from('perform')
														->where('personaid',$personaid)
														->where('stepid',$stepid)
														->where('variantid',$variantid)
														->where('question',$question)
													->where('rating',4)
													->group_by('timest')
														->get()
														->result();
		$result4 = count($query4);
		$average4 = round($result4 * 100/$total);
		$where = array(
			'personaid' => $personaid,
									 'stepid' =>$stepid,
									 'rating' => 4,
									 'variantid' => $variantid,
										'question' => $question
								);

		$data = array('average ' => $final_average,
		'count' => $result4,
		'totalcount' => $total);
		$this->db->where($where);
		$this->db->update('perform ', $data);
		echo 'result4'.$result4;
		echo 'average4:'.$average4;

		$query5 = $this->db->select('*')
														->from('perform')
														->where('personaid',$personaid)
														->where('stepid',$stepid)
														->where('variantid',$variantid)
														->where('question',$question)
													->where('rating',5)
													->group_by('timest')
														->get()
														->result();
		$result5 = count($query5);
	 echo 'result5'.$result5;
		$average5 = round($result5 * 100/$total);
		$where = array(
			'personaid' => $personaid,
									 'stepid' =>$stepid,
									 'rating' => 5,
									'variantid' => $variantid,
									 'question' => $question
								);

		$data = array('average ' => $final_average,
		'count' => $result5,
		'totalcount' => $total);
		$this->db->where($where);
		$this->db->update('perform ', $data);
		echo 'average5:'.$average5;


	}
	else{
		echo "none of the above";
		$query = "INSERT INTO perform (adminid,timest,personaid,personaname,taskid,taskname,methodname,variantid,variantname,stepname,stepimage,noneoftheabove,rating,reasons,sessionid) VALUES ('$adminid', '$timestamp', '$personaid','$personaname', '$taskid','$taskname','$action', '$variantid','$variantname', '$methodid', '$stepimage','None of the above', '$rating', '$reason', '$sessionid')";
		 $this->db->query($query);
			 $result = $this->db->select('*')
															 ->from('perform')
															 ->where('personaid',$personaid)
															 ->where('stepid',$stepid)
															 ->where('variantid',$variantid)
															 ->get()
															 ->result();
			 $total = count($result);

			 echo 'total:'.$total;

				$result1 = $this->db->select('*')
																 ->from('perform')
																 ->where('personaid',$personaid)
																 ->where('stepid',$stepid)
															 ->where('variantid',$variantid)
															 ->where('rating',1)
															 ->group_by('timest')
																 ->get()
																 ->result();



	$qry6 = mysqli_query($conn,"SELECT AVG(rating) as avg_rating FROM perform WHERE personaid= '" . mysqli_escape_string($conn,$personaid) . "' and stepid= '" . mysqli_escape_string($conn,$stepid) . "' and variantid= '" . mysqli_escape_string($conn,$variantid) . "' group by timest");
																															$rows2 = mysqli_fetch_assoc($qry6);
	$final_average=$rows2['avg_rating'];


			 $total1 = count($result1);
			 $average1 = round($total1 * 100/$total);

			 $where = array(
				 'personaid' => $personaid,
											'stepid' =>$stepid,
											'rating' => 1,
											'variantid' => $variantid,
									 );

			 $data = array('average ' => $final_average,
			 'count' => $total1,
			 'totalcount' => $total);
			 $this->db->where($where);
			 $this->db->update('perform ', $data);
			// $update1 = "update perform set average=$average1 where stepid=$stepid, rating=1 and variantid=$variantid)";
			//  $this->db->query($update1);
			 echo 'total1'.$total1;
			 echo 'average1:'.$average1;

				$query2 = $this->db->select('*')
																 ->from('perform')
																 ->where('personaid',$personaid)
																 ->where('stepid',$stepid)
															 ->where('variantid',$variantid)
															 ->where('rating',2)
															 ->group_by('timest')
																 ->get()
																 ->result();
				$result2 = count($query2);
				$average2 = round($result2 * 100/$total);
				$where = array(
					'personaid' => $personaid,
											 'stepid' =>$stepid,
											 'rating' => 2,
											 'variantid' => $variantid,
										);

				$data = array('average ' => $final_average,
				'count' => $result2,
				'totalcount' => $total);
				$this->db->where($where);
				$this->db->update('perform ', $data);
				echo 'result2'.$result2;
				echo 'average2:'.$average2;

				$query3 = $this->db->select('*')
																->from('perform')
																->where('personaid',$personaid)
																->where('stepid',$stepid)
																->where('variantid',$variantid)
															->where('rating',3)
															->group_by('timest')
																->get()
																->result();
				$result3 = count($query3);
				$average3 = round($result3 * 100/$total);
				$where = array(
					'personaid' => $personaid,
											 'stepid' =>$stepid,
											 'rating' => 3,
											'variantid' => $variantid,
										);

				$data = array('average ' => $final_average,
				'count' => $result3,
				'totalcount' => $total);
				$this->db->where($where);
				$this->db->update('perform ', $data);
				echo 'result3'.$result3;
				echo 'average3:'.$average3;

				$query4 = $this->db->select('*')
																->from('perform')
																->where('personaid',$personaid)
																->where('stepid',$stepid)
																->where('variantid',$variantid)
															->where('rating',4)
															->group_by('timest')
																->get()
																->result();
				$result4 = count($query4);
				$average4 = round($result4 * 100/$total);
				$where = array(
					'personaid' => $personaid,
											 'stepid' =>$stepid,
											 'rating' => 4,
											 'variantid' => $variantid,
										);

				$data = array('average ' => $final_average,
				'count' => $result4,
				'totalcount' => $total);
				$this->db->where($where);
				$this->db->update('perform ', $data);
				echo 'result4'.$result4;
				echo 'average4:'.$average4;

				$query5 = $this->db->select('*')
																->from('perform')
																->where('personaid',$personaid)
																->where('stepid',$stepid)
																->where('variantid',$variantid)
															->where('rating',5)
															->group_by('timest')
																->get()
																->result();
				$result5 = count($query5);
			 echo 'result5'.$result5;
				$average5 = round($result5 * 100/$total);
				$where = array(
					'personaid' => $personaid,
											 'stepid' =>$stepid,
											 'rating' => 5,
											'variantid' => $variantid,
										);

				$data = array('average ' => $final_average,
				'count' => $result5,
				'totalcount' => $total);
				$this->db->where($where);
				$this->db->update('perform ', $data);
				echo 'average5:'.$average5;



}}
	public function performdatafirststepfromnone($adminid,$sessionid,$timestamp){
		 $conn= mysqli_connect("localhost","root","","cognitivewalkthrough");


			$personaid = $_POST['personaid'];
			echo 'persona:'.$personaid;
			$personaname = $_POST['personaname'];
			echo 'personaname:'.$personaname;
			$taskid = $_POST['taskid'];
			echo 'taskid:'.$taskid;
			$taskname = $_POST['taskname'];
			echo 'taskname:'.$taskname;
			$methodid = $_POST['method'];
			echo 'methodid:'.$methodid;
			//$methodname = $_POST['methodname'];
			$qry10 = mysqli_query($conn,"SELECT * FROM method WHERE methodid= '" . mysqli_escape_string($conn,$methodid) . "' ");
																$rows10 = mysqli_fetch_assoc($qry10);
			$methodname = $rows10['methodname'];

			echo 'methodname:'.$methodname;
			$variantid = $_POST['variants'];
			echo 'variantid:'.$variantid;
			$variantname = $_POST['variantname'];
			echo 'variantname:'.$variantname;
			$stepid = $_POST['method'];
			echo 'stepid:'.$stepid;
		//	$stepname = $_POST['methodname'];
		//	echo 'nextstepname:'.$stepname;
			$stepimage = $_POST['nextstepimage'];
			echo 'nextstepimage:'.$stepimage;
			$rating = $_POST['rating'];
			echo 'rating:'.$rating;
			$reason = $_POST['reason'];
			echo 'reason:' .$reason;
$action=$_POST['home'];
echo 'home:'.$action;
//$desc = $_POST['desc'];
if($methodid!='None of the above'){

		$query = "INSERT INTO perform (adminid,timest,personaid,personaname,taskid,taskname,methodname,variantid,variantname,stepid,stepname,stepimage,rating,reasons,sessionid) VALUES ('$adminid', '$timestamp', '$personaid','$personaname', '$taskid','$taskname', '$action', '$variantid','$variantname', '$methodid', '$methodname', '$stepimage', '$rating', '$reason', '$sessionid')";
		 $this->db->query($query);

			 $result = $this->db->select('*')
															 ->from('perform')
															 ->where('personaid',$personaid)
															 ->where('stepid',$stepid)
															 ->where('variantid',$variantid)
															 ->get()
															 ->result();
			 $total = count($result);

			 echo 'total:'.$total;

				$result1 = $this->db->select('*')
																 ->from('perform')
																 ->where('personaid',$personaid)
																 ->where('stepid',$stepid)
															 ->where('variantid',$variantid)
															 ->where('rating',1)
															 ->group_by('timest')
																 ->get()
																 ->result();




																		$qry6 = mysqli_query($conn,"SELECT AVG(rating) as avg_rating FROM perform WHERE personaid= '" . mysqli_escape_string($conn,$personaid) . "' and stepid= '" . mysqli_escape_string($conn,$stepid) . "' and variantid= '" . mysqli_escape_string($conn,$variantid) . "' group by timest");
																															$rows2 = mysqli_fetch_assoc($qry6);
	$final_average=$rows2['avg_rating'];


			 $total1 = count($result1);
			 $average1 = round($total1 * 100/$total);

			 $where = array(
				 'personaid' => $personaid,
											'stepid' =>$stepid,
											'rating' => 1,
											'variantid' => $variantid,
									 );

			 $data = array('average ' => $final_average,
			 'count' => $total1,
			 'totalcount' => $total);
			 $this->db->where($where);
			 $this->db->update('perform ', $data);
			// $update1 = "update perform set average=$average1 where stepid=$stepid, rating=1 and variantid=$variantid)";
			//  $this->db->query($update1);
			 echo 'total1'.$total1;
			 echo 'average1:'.$average1;

				$query2 = $this->db->select('*')
																 ->from('perform')
																 ->where('personaid',$personaid)
																 ->where('stepid',$stepid)
															 ->where('variantid',$variantid)
															 ->where('rating',2)
															 ->group_by('timest')
																 ->get()
																 ->result();
				$result2 = count($query2);
				$average2 = round($result2 * 100/$total);
				$where = array(
					'personaid' => $personaid,
											 'stepid' =>$stepid,
											 'rating' => 2,
											 'variantid' => $variantid,
										);

				$data = array('average ' => $final_average,
				'count' => $result2,
				'totalcount' => $total);
				$this->db->where($where);
				$this->db->update('perform ', $data);
				echo 'result2'.$result2;
				echo 'average2:'.$average2;

				$query3 = $this->db->select('*')
																->from('perform')
																->where('personaid',$personaid)
																->where('stepid',$stepid)
																->where('variantid',$variantid)
															->where('rating',3)
															->group_by('timest')
																->get()
																->result();
				$result3 = count($query3);
				$average3 = round($result3 * 100/$total);
				$where = array(
					'personaid' => $personaid,
											 'stepid' =>$stepid,
											 'rating' => 3,
											'variantid' => $variantid,
										);

				$data = array('average ' => $final_average,
				'count' => $result3,
				'totalcount' => $total);
				$this->db->where($where);
				$this->db->update('perform ', $data);
				echo 'result3'.$result3;
				echo 'average3:'.$average3;

				$query4 = $this->db->select('*')
																->from('perform')
																->where('personaid',$personaid)
																->where('stepid',$stepid)
																->where('variantid',$variantid)
															->where('rating',4)
															->group_by('timest')
																->get()
																->result();
				$result4 = count($query4);
				$average4 = round($result4 * 100/$total);
				$where = array(
					'personaid' => $personaid,
											 'stepid' =>$stepid,
											 'rating' => 4,
											 'variantid' => $variantid,
										);

				$data = array('average ' => $final_average,
				'count' => $result4,
				'totalcount' => $total);
				$this->db->where($where);
				$this->db->update('perform ', $data);
				echo 'result4'.$result4;
				echo 'average4:'.$average4;

				$query5 = $this->db->select('*')
																->from('perform')
																->where('personaid',$personaid)
																->where('stepid',$stepid)
																->where('variantid',$variantid)
															->where('rating',5)
															->group_by('timest')
																->get()
																->result();
				$result5 = count($query5);
			 echo 'result5'.$result5;
				$average5 = round($result5 * 100/$total);
				$where = array(
					'personaid' => $personaid,
											 'stepid' =>$stepid,
											 'rating' => 5,
											'variantid' => $variantid,
										);

				$data = array('average ' => $final_average,
				'count' => $result5,
				'totalcount' => $total);
				$this->db->where($where);
				$this->db->update('perform ', $data);
				echo 'average5:'.$average5;


	}else{
		$query = "INSERT INTO perform (adminid,timest,personaid,personaname,taskid,taskname,methodname,variantid,variantname,stepname,stepimage,noneoftheabove,rating,reasons,sessionid) VALUES ('$adminid', '$timestamp', '$personaid','$personaname', '$taskid','$taskname','$action', '$variantid','$variantname', 'None of the above', '$stepimage','None of the above', '$rating', '$reason', '$sessionid')";
		 $this->db->query($query);

			 $result = $this->db->select('*')
															 ->from('perform')
															 ->where('personaid',$personaid)
															 ->where('stepid',$stepid)
															 ->where('variantid',$variantid)
															 ->get()
															 ->result();
			 $total = count($result);

			 echo 'total:'.$total;

				$result1 = $this->db->select('*')
																 ->from('perform')
																 ->where('personaid',$personaid)
																 ->where('stepid',$stepid)
															 ->where('variantid',$variantid)
															 ->where('rating',1)
															 ->group_by('timest')
																 ->get()
																 ->result();




																		$qry6 = mysqli_query($conn,"SELECT AVG(rating) as avg_rating FROM perform WHERE personaid= '" . mysqli_escape_string($conn,$personaid) . "' and stepid= '" . mysqli_escape_string($conn,$stepid) . "' and variantid= '" . mysqli_escape_string($conn,$variantid) . "' group by timest");
																															$rows2 = mysqli_fetch_assoc($qry6);
	$final_average=$rows2['avg_rating'];


			 $total1 = count($result1);
			 $average1 = round($total1 * 100/$total);

			 $where = array(
				 'personaid' => $personaid,
											'stepid' =>$stepid,
											'rating' => 1,
											'variantid' => $variantid,
									 );

			 $data = array('average ' => $final_average,
			 'count' => $total1,
			 'totalcount' => $total);
			 $this->db->where($where);
			 $this->db->update('perform ', $data);
			// $update1 = "update perform set average=$average1 where stepid=$stepid, rating=1 and variantid=$variantid)";
			//  $this->db->query($update1);
			 echo 'total1'.$total1;
			 echo 'average1:'.$average1;

				$query2 = $this->db->select('*')
																 ->from('perform')
																 ->where('personaid',$personaid)
																 ->where('stepid',$stepid)
															 ->where('variantid',$variantid)
															 ->where('rating',2)
															 ->group_by('timest')
																 ->get()
																 ->result();
				$result2 = count($query2);
				$average2 = round($result2 * 100/$total);
				$where = array(
					'personaid' => $personaid,
											 'stepid' =>$stepid,
											 'rating' => 2,
											 'variantid' => $variantid,
										);

				$data = array('average ' => $final_average,
				'count' => $result2,
				'totalcount' => $total);
				$this->db->where($where);
				$this->db->update('perform ', $data);
				echo 'result2'.$result2;
				echo 'average2:'.$average2;

				$query3 = $this->db->select('*')
																->from('perform')
																->where('personaid',$personaid)
																->where('stepid',$stepid)
																->where('variantid',$variantid)
															->where('rating',3)
															->group_by('timest')
																->get()
																->result();
				$result3 = count($query3);
				$average3 = round($result3 * 100/$total);
				$where = array(
					'personaid' => $personaid,
											 'stepid' =>$stepid,
											 'rating' => 3,
											'variantid' => $variantid,
										);

				$data = array('average ' => $final_average,
				'count' => $result3,
				'totalcount' => $total);
				$this->db->where($where);
				$this->db->update('perform ', $data);
				echo 'result3'.$result3;
				echo 'average3:'.$average3;

				$query4 = $this->db->select('*')
																->from('perform')
																->where('personaid',$personaid)
																->where('stepid',$stepid)
																->where('variantid',$variantid)
															->where('rating',4)
															->group_by('timest')
																->get()
																->result();
				$result4 = count($query4);
				$average4 = round($result4 * 100/$total);
				$where = array(
					'personaid' => $personaid,
											 'stepid' =>$stepid,
											 'rating' => 4,
											 'variantid' => $variantid,
										);

				$data = array('average ' => $final_average,
				'count' => $result4,
				'totalcount' => $total);
				$this->db->where($where);
				$this->db->update('perform ', $data);
				echo 'result4'.$result4;
				echo 'average4:'.$average4;

				$query5 = $this->db->select('*')
																->from('perform')
																->where('personaid',$personaid)
																->where('stepid',$stepid)
																->where('variantid',$variantid)
															->where('rating',5)
															->group_by('timest')
																->get()
																->result();
				$result5 = count($query5);
			 echo 'result5'.$result5;
				$average5 = round($result5 * 100/$total);
				$where = array(
					'personaid' => $personaid,
											 'stepid' =>$stepid,
											 'rating' => 5,
											'variantid' => $variantid,
										);

				$data = array('average ' => $final_average,
				'count' => $result5,
				'totalcount' => $total);
				$this->db->where($where);
				$this->db->update('perform ', $data);
				echo 'average5:'.$average5;


	}
}
}

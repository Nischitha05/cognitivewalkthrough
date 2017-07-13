<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class variant_model extends CI_Model {


	public function createvariant($variantdata){
		$conn= mysqli_connect("localhost","root","","cognitivewalkthrough");
		$this->db->insert('variantname', $variantdata);
		$inserted_variant_id = $this->db->insert_id();

		if ($_POST['question'] ) {
			$inserted_variant_id = $this->db->insert_id();

		 	foreach ( $_POST['question']as $key=>$value ) {
		     $sql_website = sprintf("INSERT INTO questions (questionname) VALUES ('%s')",
						    	   mysqli_real_escape_string($conn,$value) );
				 $this->db->query($sql_website);
				 $inserted_question_id = $this->db->insert_id();
				 $qry = "insert into variant_question(variantid,questionid) values($inserted_variant_id,$inserted_question_id)";
  		 	 $this->db->query($qry);
}
}
    	else {

		//No additional fields added by user

	}
	 	$this->db->select('variantid,variantname');
   	$this->db->from('variantname');

   	$this->db->where('variantid',$inserted_variant_id);
   	$records = $this->db->get('');
 		return $records->result();
}

	function getvariant($taskid,$personaid)
	{

			$this->db->select('task.*,persona.*');
   		$this->db->from('task');
   		$this->db->join('task_persona', 'task_persona.taskid = task.taskid');
			$this->db->join('persona', 'task_persona.personaid = persona.personaid');
   		$this->db->where('task.taskid',$taskid);
			$this->db->where('persona.personaid',$personaid);
   		$records = $this->db->get('');
 			return $records->result();
	}

	public function retrieveresults($adminid,$timestamp,$personaid,$taskid,$methodid,$variantid)
	{

		$result1=$this->db->select('perform.*')
		->from('perform')
		->where('adminid',$adminid)
		->where('personaid',$personaid)
		->where('taskid',$taskid)
		->where('timest',$timestamp)
		->where('methodid',$methodid)
		->where('variantid',$variantid)
		->get()
		->result();

		return $result1;
	}

public function deletevariant($variantid){

		$qry = "DELETE FROM variant_question where variantid=$variantid";
		$this->db->query($qry);


		$qry1="delete
					 from variantname
					 where variantid = $variantid";
		$this->db->query($qry1);

}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona_model extends CI_Model {



	function create($adminid,$message){


		//echo $target;

		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$age = $this->input->post('age');
		$interests = $this->input->post('interests');
		$hobby = $this->input->post('hobby');
		$aim = $this->input->post('aim');
		$qualification = $this->input->post('qualification');
		$occupation = $this->input->post('occupation');
		$browsers_used = $this->input->post('browsers_used');
		$gadgets_owned = $this->input->post('gadgets_owned');
		$description = $this->input->post('description');


		$data = array(
			'personaid' => ' ',
			'firstname' => $firstname,
			'lastname' => $lastname,
			'age' => $age,
			'interests' => $interests,
			'hobby' =>$hobby,
			'aim'=> $aim,
			'qualification' => $qualification,
			'occupation' => $occupation,
			'browsers_used' => $browsers_used,
			'gadgets_owned' => $gadgets_owned,
			'description' => $description,
			'profile_picture' => $message,
			'adminid' => $adminid
		);
		$this->db->insert('persona', $data);
	}


	function view($adminid)
	{
	    $this->db->select('*');
	    $this->db->from('persona');
			 $this->db->where('adminid',$adminid);
	    $query = $this->db->get();
	    if($query->num_rows()>0){
	    return $query->result();
	    }else{
	        return $query->result();
	    }
	}

	public function getupdate($personaid){
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

	public function update($persona,$personaid,$message){
	     $persona = array(
		        'firstname'=> $this->input->post('firstname'),
		        'lastname'=> $this->input->post('lastname'),
		        'age'=> $this->input->post('age'),
		        'interests'=> $this->input->post('interests'),
		        'hobby'=> $this->input->post('hobby'),
		        'aim'=> $this->input->post('aim'),
		        'qualification'=>$this->input->post('qualification'),
		        'occupation'=>$this->input->post('occupation'),
		        'browsers_used'=>$this->input->post('browsers_used'),
		        'gadgets_owned'=>$this->input->post('gadgets_owned'),
		        'description'=>$this->input->post('description'),
						'profile_picture'=>$message
		        );
	    $this->db->where('personaid',$personaid);
	    $this->db->update('persona',$persona);

	}

	public function delete($personaid){
	    $this->db->where('personaid',$personaid);
	    $this->db->delete('persona');
}


}

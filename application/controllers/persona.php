<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Controller {

	public function index()
	{
	   }


	public function create(){
	    $this->load->helper(array('form','file','url'));
	    if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['lastname'] = $session_data['lastname'];
			$data['email'] = $session_data['email'];
			$data['username'] = $session_data['username'];

			$adminid = $session_data['adminid'];

			$this->load->library('form_validation');
	 // $this->load->library(array('form_validation','upload'));
	        $this->form_validation->set_rules('firstname','First name','trim|required');
	        $this->form_validation->set_rules('lastname','Last name','trim|required');
	        $this->form_validation->set_rules('age','Age','trim|required|numeric');
	        $this->form_validation->set_rules('interests','Interests','trim|required');
	        $this->form_validation->set_rules('hobby','Hobby','trim|required');
	        $this->form_validation->set_rules('aim','Aim','trim|required');
	        $this->form_validation->set_rules('qualification','Qualification','trim|required');
	        $this->form_validation->set_rules('occupation','Occupation','trim|required');
	        $this->form_validation->set_rules('browsers_used','Browswers used','trim|required');
	        $this->form_validation->set_rules('gadgets_owned','Gadgets owned','trim|required');
			// 		$this->form_validation->set_rules('photo','Add Photo','required');
	//	$this->form_validation->set_rules('description','Add description','trim|required');
		//$this->form_validation->set_rules('image','Add a picture','trim|required');
		    if($this->form_validation->run() == FALSE)
		    {
		        $this->load->view('createpersona_view',$data);

		    }
		    else{
					if(empty($_FILES['message']['name'])){
										echo "<script>alert('Please add a file')</script>";
							        $this->load->view('createpersona_view',$data);
										}
										else{
		            $this->load->model('persona_model');
		            if($this->input->post('save'))
		                {
											$target="./uploads/".basename($_FILES['message']['name']);
											$message=$_FILES['message']['name'];
		                    $this->persona_model->create($adminid,$message);

		                }
										if(move_uploaded_file($_FILES['message']['tmp_name'], $target)){
								 			 				$this->load->view('persona_view',$data);
								 			  }
								 			  else{
								 			  		echo "<script>alert('Please add a file')</script>";

   $this->load->view('createpersona_view',$data);
}
		}
	}
	}
}



public function edit($personaid){
      $this->load->helper(array('form','file','url'));
	        if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['lastname'] = $session_data['lastname'];
			$data['email'] = $session_data['email'];
			$data['username'] = $session_data['username'];
  //  $data['data'] = 'Edit persona';
	$adminid = $session_data['adminid'];
    $this->load->model('persona_model');
    $data['persona']=$this->persona_model->getupdate($personaid);
    $this->load->view('editpersona_view',$data);
}
}

public function update(){
    if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['lastname'] = $session_data['lastname'];
			$data['email'] = $session_data['email'];
			$data['username'] = $session_data['username'];
    $this->load->helper(array('form','url'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('firstname','First name','trim|required');
		$this->form_validation->set_rules('lastname','Last name','trim|required');
		$this->form_validation->set_rules('age','Age','trim|required|numeric');
		$this->form_validation->set_rules('interests','Interests','trim|required');
		$this->form_validation->set_rules('hobby','Hobby','trim|required');
		$this->form_validation->set_rules('aim','Aim','trim|required');
		$this->form_validation->set_rules('qualification','Qualification','trim|required');
	    $this->form_validation->set_rules('occupation','Occupation','trim|required');
		$this->form_validation->set_rules('browsers_used','Browswers used','trim|required');
		$this->form_validation->set_rules('gadgets_owned','Gadgets owned','trim|required');
		$personaid=$this->input->post('personaid');

		// $config['upload_path'] = "./uploads/".basename($_FILES['message']['name']);
		// $config['allowed_types'] = 'gif|jpg|png';
		// $config['max_size']     = '2000000';
		// $config['max_width'] = '1024';
		// $config['max_height'] = '768';
		// $this->load->library('upload');

		$target="./uploads/".basename($_FILES['message']['name']);

		$message=$_FILES['message']['name'];

		if($this->form_validation->run()==false){
		     $this->edit($personaid);
		 }else{
		if(!empty($_FILES['message']['name'])) //new image uploaded
{
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
   //process your image and data
//   $sql = "UPDATE table SET name=$someName, image=$someImageName,... WHERE id = $someId";//save to DB with new image name
}
else // no image uploaded
{
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

			 );
   // save data, but no change the image column in MYSQL, so it will stay the same value
	 $this->db->where('personaid',$personaid);
	 $this->db->update('persona',$persona);
}

		if(move_uploaded_file($_FILES['message']['tmp_name'], $target)){
			$conn= mysqli_connect("localhost","root","","cognitivewalkthrough");

			mysqli_query($conn,"UPDATE persona SET profile_picture='$message'
			WHERE `personaid` = '$personaid'");
							 $this->load->view('personaonedit_view',$data);
				}
				else{
					$data['message']=$_FILES['message']['name'];
						echo "upload failed";
						$this->load->view('personaonedit_view',$data);
}
}
}
}

public function delete($personaid){
    $this->load->model('persona_model');
    $this->persona_model->delete($personaid);
    redirect('home/viewpersona');
}


}

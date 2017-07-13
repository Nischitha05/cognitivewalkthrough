<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Task</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<style>
#startimage{
  width: 0px;
  height:0px
}
</style>

  </head>
  <body>

<nav class="navbar navbar-default navbar-inverse" role="navigation">
<!-- <nav class="navbar navbar-default navbar-static-top"> -->
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <h4 class="nav navbar-nav" style="color:#FF4500;text-align: center;">Multiway Cognitive Walkthrough</h4><br>
      <a class="nav navbar-nav navbar-brand navbar-left" href="<?php echo base_url('index.php/home') ?>">Welcome <?php echo $firstname ?></a>

      <ul class="nav navbar-nav navbar-right">
                            <a class="btn btn-primary btn-sm" href="<?php echo site_url('home/logout') ?>" role="button">Logout</a>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



           <div class="container">
                <br />
                <br />
             <h3 style="color:blue">Please create Tasks</h3>
              <!-- <div class="jumbotron">
               <div class="row"> -->
        <div class="col-lg-10"></div>
        <div class="col-lg-10">
          <!-- <div class="panel panel-default">
            <div class="panel-body"> -->

            <?php

              echo form_open_multipart('task/createtask/','class="myclass"');
              ?>
                <div class="form-group">
                     <!-- <form name="add_name" id="add_name">   -->
                          <div class="table-responsive">


                            <table class="table" border="1">
                    <thead>
                  <tr>
                    <th>Select </th>
                    <th>Persona Name </th>

                    </tr>
                    </thead>
                    <tbody>
                      <?php

                     //    var_dump($personas);
                      foreach($personas as $row)
                      {
                          ?>
                          <tr class=>

                           <td><input type="checkbox" name='personaid[]' id='personaid' value='<?php echo $row->personaid; ?>' onchange="checkthisone(this);" required/></td>

                          <td><?php echo $row->firstname; ?> <?php echo $row->lastname; ?></td>
                          <!-- <td><a href="<?php //echo site_url('persona/edit/').$row->personaid; ?>">Edit</a>|<a href="<?php //echo site_url('persona/delete/').$row->personaid; ?>">Delete</a></td> -->

                      <?php      }
                      ?>
                       </tbody>
                       </table>
                                <table  id="dynamic_field">

                               <tr>
                               <td><h4>Task</h4><input type="text" name="taskname" placeholder="Enter name of the task" class="form-control task" pattern="[A-Za-z0-9., ]+" title="Please don not use special characters except . and ," required/></td>

                               </tr>
                               <tr><td> <h4>Starting Page</h4>
                                   <input type="file" accept="image/png, image/jpeg, image/gif" name="message" id="message" onchange="readURL(this);"/></td></tr>
                              <tr>  <td><img id="startimage" src="#"  required/></td></tr>

                              <tr>
                              <td><h4>Page</h4><input type="text" style="width:700px" name="action" placeholder="Enter the action" class="form-control task" pattern="[A-Za-z0-9., ]+" title="Please don not use special characters except . and ," required/></td>

                              </tr>
                              <tr><td><h4>Description</h4><textarea name="reason" id="reason" rows="3" cols="73" required></textarea></td></tr>

                                    <tr>
                                          <td><h4>Alternatives</h4><input type="text" style="width:700px;display: inline" name="fields[]" placeholder="Enter Method Name" class="form-control method_list_list" required/>  </td> <td><input type="button" name="add" id="add" class="btn btn-success btn-block" value="Add More"/></td>
                                    </tr><br><br><br>
                                  </table>
                                 </div>
<br>
<br>
                               <?php echo form_submit('save', 'Save and Next', 'class="btn btn-primary"') ?>
                <!-- <a href="<?php echo site_url('login') ?>" class="btn btn-link">Sign In</a> -->
              <?php echo form_close() ?>


                     <!-- </form>   -->

            </div>
          </div>
          <div class="col-md-2">
            <h4>Information:</h4>
            <p style='color:#2f4f4f;'>1) To create a task, first check on the personas to assign for the task. Single task can have multiple personas and hence, you can select the multiple personas here. <br/><br/>
              2)  Then enter the task details. Kindly upload the starting image for the task.<br/><br/>
              3) If there are any alternatives in the first action of the action sequence, then enter those alternatives here by clicking on 'Add More' button. If there are no alternatives, then enter the first action in the action sequence and click on 'Save and Next' button.<br/><br/>
                      </p>
          </div>
        </div>
        <div class="col-md-4"></div>
      </div>

      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  </body>
</html>
 <script>
 $(document).ready(function(){
      var i=1;
      $('#add').click(function(){
           i++;
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="fields[]" style="width:700px;display: inline" placeholder="Enter Method Name" class="form-control name_list" required/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      });
      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });


 });
 function checkthisone(input){
 $cbx_group = $("input:checkbox[name='personaid[]']");

if($cbx_group.is(":checked")){
  $cbx_group.prop('required', false);
}
}

 function readURL(input) {
   var oFile = document.getElementById("message").files[0]; // <input type="file" id="fileUpload" accept=".jpg,.png,.gif,.jpeg"/>


   if (oFile.size > 2097152) // 2 mb for bytes.
   {
       alert("File size must under 2mb!");
       return;
   }
        else
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#startimage')
                    .attr('src', e.target.result)
                    .width(600)
                    .height(400);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


 </script>

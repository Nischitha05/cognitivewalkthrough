<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Persona</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


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
             <h3 style="color:blue">Edit the created task here</h3>
              <div class="jumbotron">
               <div class="row">
        <div class="col-lg-10"></div>
        <div class="col-lg-10">
          <div class="panel panel-default">
            <div class="panel-body">
              <?php

                echo form_open_multipart('task/editcreatedtask/','class="myclass"');
                ?>

                <div class="form-group">
                     <!-- <form name="add_name" id="add_name">   -->
                          <div class="table-responsive">
                            <div id="remove">
                              <div id="list_persona">
                                <label for="Persona">Persona</label><br>
    <?php
                 foreach($personas as $row){?>
                   <input class="form-control persona" type="text" style="width:500px" name="personame" id="personaname"  value="<?php echo $row->firstname ?> <?php echo $row->lastname ?>" readonly/>


                     <input type="hidden" style="width:500px" name="personaid" id="personaid"  value="<?php echo $row->personaid ?>"/>
                     <button type="button" name="addpersona[]" id="addpersona" class="btn btn-success">+</button>
                     <button type="button" name="delpersona[]" id="delpersona" class="btn btn-danger">X</button>

        <?php         }?>
</div> </div>
                <ul id="comment"></ul>

                                <table  id="dynamic_field">


                                  <?php

foreach ($results as $row) {
    ?>
                              <tr> <td>Task<input type="text" style="width:500px" name="taskname" id="taskname" placeholder="Enter the task" class="form-control task" value="<?php echo $row->taskname ?>"/></td>
                              <input type="hidden" style="width:500px" name="taskid" id="taskid" placeholder="Enter the task" class="form-control task" value="<?php echo $row->taskid ?>"/>

                               </tr>
                               <tr><td> <h4>Starting Page</h4>
                                   <input type="file" accept="image/png, image/jpeg, image/gif" name="message" id="message" onchange="readURL(this);"/></td></tr>
                              <tr>  <td><img id="startimage" src='http://localhost/cognitivewalkthrough/uploads/<?php echo $row->Startimage; ?>'></td></tr>
  <input type="hidden" name="filename" value="<?php echo $row->Startimage;?>" class="form-control"/>

                       <?php } ?>





                               </table>


                               <?php echo form_submit('save', 'Update and Next', 'class="btn btn-primary"') ?>
                <!-- <a href="<?php echo site_url('login') ?>" class="btn btn-link">Sign In</a> -->
              <?php echo form_close() ?>


                     <!-- </form>   -->

            </div>
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
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="fields[]" placeholder="Enter Method Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      });
      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });
      $("#addpersona").click(function(){
        var taskid = $("#taskid").val();
        var personaid=$("#personaid").val();
        var formData = new FormData();

        formData.append('personaid',personaid);
        formData.append('taskid',taskid);

            $.ajax({
                type:"post",
                url:"<?= base_url() ?>index.php/task/getallpersona/",
                data:formData,
                processData: false,
    contentType: false,
             // data:"methodfields="+methodfields+"&name="+name+"&message="+message+"&action=addcomment",
                success:function(data){
  $("#comment").html(data);
              }
            });
      });
      $("#delpersona").click(function(){
        var personaid=$("#personaid").val();
        var taskid =$("#taskid").val();
        var formData = new FormData();

        formData.append('personaid',personaid);
  formData.append('taskid',taskid);
            $.ajax({
                type:"post",
                url:"<?= base_url() ?>index.php/task/deletepersona/",
                data:formData,
                processData: false,
    contentType: false,
             // data:"methodfields="+methodfields+"&name="+name+"&message="+message+"&action=addcomment",
                success:function(data){
                  $("#remove").remove();

  $("#comment").html(data);
              }
            });
      });
 });
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

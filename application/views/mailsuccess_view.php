<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Experts invite</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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


    <div class="container"  style="margin-top:20px;">

      <div class="jumbotron">


        <div class="span6 offset3">
         <?php

              echo form_open('variants/send_mail','class="myclass"');
              ?>

              <div>
             TASK:  <select class="form-control" name="taskname" id="taskname" >
   <option value="">Select</option>

               <?php foreach($groups as $each){
            echo '<option value="' . $each->taskid . '">' . $each->taskname . '</option>';

    } ?>

           </select></div>

           <div>
            PERSONA:  <select class="form-control" name="personadrop" id="personadrop">
              <option value="">Select</option>

            </select>
            </div><br>
           <div class="form-group">
             <?php
             echo form_error('email','<div class="error_msg">','</div>');
               echo form_label('Email','email');
               echo form_input('email',set_value('email'),'class="form-control" id="email" placeholder="Enter Email Address"')
             ?>
           </div>

              <div class="form-group">
               <?php
    //           echo form_error('description','<div class="error_msg">','</div>');
                 echo form_label('Add Message','message');
                 echo form_textarea('message',set_value('message'),'class="form-control" id="message" placeholder="Enter message"')
               ?>

                   <input class ="btn btn-primary btn-lg btn-block" type = "submit" value = "SEND MAIL">
               <!-- <form name="performMCW" method="post" enctype="multipart/form-data" id="upload-form"> -->


        <?php echo form_close() ?>
      </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  </body>
</html>
<script>
$(function(){
$("#taskname").change(function(){

        var departament_id = $('#taskname').val();

//
//     $.ajax({
//         url: "<?= base_url() ?>index.php/task/getmethod/",
//         data: {subject_id: $(this).val()},
//         type: "post",
//         success: function(msg){
//         $("#teacher").html(msg);
//     }
// })
    $.ajax({
    url: "<?= base_url() ?>index.php/task/getpersonareults/",
    data: {persona_id: $(this).val()},
    type: "post",
    success: function(msg){
    $("#personadrop").html(msg);
}
})
})

});
</script>

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Variants of CW</title>

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
        <h3>Please choose a variant to perform Cognitive Walkthrough or else create your own set of questions by clicking on "+"</h3>


        <div class="span6 offset3">
         <?php

              echo form_open('variants/viewvariant','class="myclass"');
              ?>

               <!-- <form name="performMCW" method="post" enctype="multipart/form-data" id="upload-form"> -->
              <div>
             TASK:  <select class="form-control" name="taskname" id="taskname" >
   <option value="">Select</option>

               <?php foreach($records as $each){
            echo '<option value="' . $each->taskid . '">' . $each->taskname . '</option>';

    } ?>

           </select></div>
<br>
<!-- <div>
 METHOD:  <select class="form-control" name="teacher" id="teacher">
    <option value="">Select</option>

  </select>
  </div><br> -->
  <div>
   PERSONA:  <select class="form-control" name="personadrop" id="personadrop">
     <option value="">Select</option>

   </select>
   </div><br>



          <!-- <a class="btn btn-primary btn-xl" href="<?php //echo site_url('variants/viewvariant/?taskid=' . $each->taskid.'') ?>" role="button">Open</a> -->
        <?php echo form_submit('save', 'Next', 'class="btn btn-lg btn-primary"')
 ?>
 <div class='form-group'>
<h4>Create Own Variant</h4>
<div class="form-group"><a class="btn btn-danger btn-lg" href="<?php echo site_url('variants/ownvariantCW') ?>" role="button"><strong style="font-size:35px">+</strong></a></div><br/>
</div> <div class='form-group'>
<h4>Variants Available</h4>
<?php foreach ($variant as $row) {
?>
<li class="form-group">

  <a href="<?php echo site_url('variants/getvariantpage/').$row->variantid; ?>"><?php echo $row->variantname ?></a>

</li>
<?php
} ?>
      </div>

        <!-- <a class="btn btn-primary btn-xl" href="<?php //echo site_url('variants/viewvariant/?taskid=' . $each->taskid.'') ?>" role="button">Open</a> -->


      <?php echo form_close() ?>


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

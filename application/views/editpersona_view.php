<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Edit Persona</title>

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



          <h3>Please edit Persona Profile</h3>

          <div class="container">

          <div class="row" style="margin-top:20px">
              <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">



              <?php

              echo form_open_multipart('persona/update','class="myclass"');?>
      <?php         foreach($persona as $row){
              ?>

              <div class="form-group">
                  <input type="hidden" name="personaid" value="<?php echo $row->personaid; ?>" class="form-control" />
                </div>

                <div class="form-group">
                  <label><b>First name</b></label>
                  <input type="text" name="firstname" value="<?php echo $row->firstname;?>" class="form-control"/>
                  <span class="text-danger"><?php echo form_error('firstname','<div class="error_msg">','</div>'); ?></span>
                </div>
               <div class="form-group">
                  <label><b>Last name</b></label>
                  <input type="text" name="lastname" value="<?php echo $row->lastname;?>" class="form-control"/>
                  <span class="text-danger"><?php echo form_error('lastname','<div class="error_msg">','</div>'); ?></span>
                </div>

                   <div class="form-group">
                  <label><b>Age</b></label>
                  <input type="text" name="age" value="<?php echo $row->age;?>" class="form-control"/>
                  <span class="text-danger"><?php echo form_error('age','<div class="error_msg">','</div>'); ?></span>
                </div>
                 <div class="form-group">
                  <label><b>Interests</b></label>
                  <input type="text" name="interests" value="<?php echo $row->interests;?>" class="form-control"/>
                  <span class="text-danger"><?php echo form_error('interests','<div class="error_msg">','</div>'); ?></span>
                </div>

                 <div class="form-group">
                  <label><b>Hobby</b></label>
                  <input type="text" name="hobby" value="<?php echo $row->hobby;?>" class="form-control"/>
                  <span class="text-danger"><?php echo form_error('hobby','<div class="error_msg">','</div>'); ?></span>
                </div>
                 <div class="form-group">
                  <label><b>Aim</b></label>
                  <input type="text" name="aim" value="<?php echo $row->aim;?>" class="form-control"/>
                  <span class="text-danger"><?php echo form_error('aim','<div class="error_msg">','</div>'); ?></span>
                </div>
                 <div class="form-group">
                  <label><b>Qualification</b></label>
                  <input type="text" name="qualification" value="<?php echo $row->qualification;?>" class="form-control"/>
                  <span class="text-danger"><?php echo form_error('qualification','<div class="error_msg">','</div>'); ?></span>
                </div>
                   <div class="form-group">
                  <label><b>Occupation</b></label>
                  <input type="text" name="occupation" value="<?php echo $row->occupation;?>" class="form-control"/>
                  <span class="text-danger"><?php echo form_error('occupation','<div class="error_msg">','</div>'); ?></span>
                </div>

                 <div class="form-group">
                  <label>Browsers used</label>
                  <input type="text" name="browsers_used" value="<?php echo $row->browsers_used;?>" class="form-control"/>
                  <span class="text-danger"><?php echo form_error('browsers_used','<div class="error_msg">','</div>'); ?></span>
                </div>
                <div class="form-group">
                  <label>Gadgets owned</label>
                  <input type="text" name="gadgets_owned" value="<?php echo $row->gadgets_owned;?>" class="form-control"/>
                  <span class="text-danger"><?php echo form_error('gadgets_owned','<div class="error_msg">','</div>'); ?></span>
                </div>

                  <div class="form-group">
                  <label>Description</label>
                  <textarea name="description" class="form-control"><?php echo $row->description;?></textarea>
                  <span class="text-danger"><?php echo form_error('description','<div class="error_msg">','</div>'); ?></span>
                </div>


                <div class="form-group">
                <label>Profile Picture<p style='color:red'>(Kindly upload the picture again)</p></label>
                <img id='startimage' style="float: left;
                                          margin: 5px;
                                          width: 200px;
                                          height: 200px; "
                                          src="http://localhost/cognitivewalkthrough/uploads/<?php echo $row->profile_picture ?>">
                                          <input type="hidden" name="filename" value="<?php echo $row->profile_picture;?>" class="form-control"/>

                <input type="file" accept="image/png, image/jpeg, image/gif" name="message" id="message" onchange="readURL(this);"/>
<p style='font-style: italic;color:grey'>The size of the file should be less than 2MB and upload files of type jpg,jpeg,png</p>
                <span class="text-danger"><?php echo form_error('profile_picture','<div class="error_msg">','</div>'); ?></span>
              </div>

                <?php echo form_submit('save', 'Save', 'class="btn btn-primary btn-block"') ?>
                <!-- <a href="<?php echo site_url('login') ?>" class="btn btn-link">Sign In</a> -->
              <?php echo form_close(); ?>

              <?php }?>


            </div></div>
          </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  </body>
</html>
<script>
function readURL(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();

           reader.onload = function (e) {
               $('#startimage')
                   .attr('src', e.target.result)
                   .width(200)
                   .height(200);
           };

           reader.readAsDataURL(input.files[0]);
       }

       var oFile = document.getElementById("message").files[0]; // <input type="file" id="fileUpload" accept=".jpg,.png,.gif,.jpeg"/>

                   if (oFile.size > 2097152) // 2 mb for bytes.
                   {
                       alert("File size must under 2mb. Please choose another picture!");
                       return;
                   }

   }
</script>

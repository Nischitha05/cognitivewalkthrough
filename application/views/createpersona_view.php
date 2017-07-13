<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Create Persona</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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

<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">


          <h3>Please create Persona Profile</h3>


              <?php

              echo form_open_multipart('persona/create','class="myclass"');
              ?>



                <div class="form-group">
                  <?php
                    echo form_error('firstname','<div class="error_msg">','</div>');
                    echo form_label('First Name','firstname');
                    echo form_input('firstname',set_value('firstname'),'class="form-control" id="firstname" placeholder="Enter Firstname"')
                  ?>

                </div>
                <div class="form-group">
                  <?php
                    echo form_error('lastname','<div class="error_msg">','</div>');
                    echo form_label('Last Name','lastname');
                    echo form_input('lastname',set_value('lastname'),'class="form-control" id="lastname" placeholder="Enter Lastname"')
                  ?>
                </div>
                  <div class="form-group">
                  <?php
                  echo form_error('age','<div class="error_msg">','</div>');
                    echo form_label('Age','age');
                    echo form_input('age',set_value('age'),'class="form-control" id="age" placeholder="Enter Age"')
                  ?>
                </div>
                <div class="form-group">
                  <?php
                  echo form_error('interests','<div class="error_msg">','</div>');
                    echo form_label('Interests','interests');
                    echo form_input('interests',set_value('interests'),'class="form-control" id="interests" placeholder="Enter the interest"')
                  ?>
                </div>
                <div class="form-group">
                  <?php
                  echo form_error('hobby','<div class="error_msg">','</div>');
                    echo form_label('Hobby','hobby');
                    echo form_input('hobby',set_value('hobby'),'class="form-control" id="hobby" placeholder="Enter hobby"')
                  ?>
                </div>
                <div class="form-group">
                  <?php
                  echo form_error('aim','<div class="error_msg">','</div>');
                    echo form_label('Aim','aim');
                    echo form_input('aim',set_value('aim'),'class="form-control" id="aim" placeholder="Enter Aim"')
                  ?>
                </div>
                <div class="form-group">
                  <?php
                  echo form_error('qualification','<div class="error_msg">','</div>');
                    echo form_label('Qualification','qualification');
                    echo form_input('qualification',set_value('qualification'),'class="form-control" id="qualification" placeholder="Enter qualification"')
                  ?>

                </div>
                 <div class="form-group">
                  <?php
                  echo form_error('occupation','<div class="error_msg">','</div>');
                    echo form_label('Occupation','occupation');
                    echo form_input('occupation',set_value('occupation'),'class="form-control" id="occupation" placeholder="occupation"')
                  ?>
                </div>
                 <div class="form-group">
                  <?php
                  echo form_error('browsers_used','<div class="error_msg">','</div>');
                    echo form_label('Browsers used','browsers_used');
                    echo form_input('browsers_used',set_value('browsers_used'),'class="form-control" id="browsers_used" placeholder="Enter the browsers used"')
                  ?>
                </div>
                 <div class="form-group">
                  <?php
                  echo form_error('gadgets_owned','<div class="error_msg">','</div>');
                    echo form_label('Gadgets owned','gadgets_owned');
                    echo form_input('gadgets_owned',set_value('gadgets_owned'),'class="form-control" id="gadgets_owned" placeholder="Enter the gadgets owned"')
                  ?>
                </div>
                 <div class="form-group">
                  <?php
       //           echo form_error('description','<div class="error_msg">','</div>');
                   echo form_label('Add Description','description');
                    echo form_textarea('description',set_value('description'),'class="form-control" id="description" placeholder="Enter description to elaborate more about the Persona"')
                  ?>
                </div>
                <div class="form-group">
<?php
//echo form_error('photo','<div class="error_msg">','</div>');
echo form_label('Add Photo','photo');
?>
                  <input type="file" accept="image/png, image/jpeg, image/gif" name="message" id="message" onchange="readURL(this);"/></td></tr>
                <img id="startimage" src="#" /><p style='font-style: italic;color:grey'>The size of the file should be less than 2MB and upload files of type jpg,jpeg,png</p>
                                <span class="text-danger"><?php echo form_error('profile_picture','<div class="error_msg">','</div>'); ?></span>
                </div><br>
                <?php echo form_submit('save', 'Save', 'class="btn btn-primary btn-block"') ?>
                <!-- <a href="<?php echo site_url('login') ?>" class="btn btn-link">Sign In</a> -->
              <?php echo form_close() ?>

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
function readURL(input) {
  var oFile = document.getElementById("message").files[0]; // <input type="file" id="fileUpload" accept=".jpg,.png,.gif,.jpeg"/>

  if (oFile.size > 2097152) // 2 mb for bytes.
  {
      alert("File size must under 2mb!");
      return;
  }
    

       else if(input.files && input.files[0]) {
           var reader = new FileReader();

           reader.onload = function (e) {
               $('#startimage')
                   .attr('src', e.target.result)
                   .width(200)
                   .height(200);
           };

           reader.readAsDataURL(input.files[0]);

     }
   }



</script>

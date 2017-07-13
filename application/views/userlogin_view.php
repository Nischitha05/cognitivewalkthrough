<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login Area</title>

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
    <div class="container"  style="margin-top:100px;">

      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <?php

          echo form_open('login/user','class="myclass"');
          ?>
          <div class="panel panel-default">
            <div class="panel-body">



            <br><br>    <b style="color:blue">  User Login/register</b>
                    <div class="form-group">
                      <?php
                      echo form_error('uname','<div class="error_msg">','</div>');
                        echo form_label('Username','uname');
                        echo form_input('uname','','class="form-control" id="uname" placeholder="Username"')
                      ?>
                    </div>
                    <div class="form-group">
                      <?php
                      echo form_error('pword','<div class="error_msg">','</div>');
                        echo form_label('Password','pword');
                        echo form_password('pword','','class="form-control" id="pword" placeholder="Password"')
                      ?>
                    </div>
                      <button type="submit" name="loginuser" id="loginuser">Login User</button>
                    <?php //echo form_submit('loginuser', 'Login', 'class="btn btn-primary"') ?>
                    <a href="<?php echo site_url('login/registeruser') ?>" class="btn btn-link">Sign Up</a>



              <?php echo form_close() ?>


        </div>
        <div class="col-md-4"></div>
      </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  </body>
</html>

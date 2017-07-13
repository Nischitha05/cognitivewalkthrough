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
        <div class="container">

        <div class="row" style="margin-top:20px">
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
              <?php

              echo form_open('login','class="myclass"');
              ?>
        		<!-- <form role="form" action="login"> -->
        			<fieldset>
                <h1 style='color:#FF4500'>Multiway Cognitive Walkthrough</h1>
        				<h3>Please Sign In</h3>
        				<hr class="colorgraph">
        				<div class="form-group">

                  <?php
                  echo form_error('username','<div class="error_msg">','</div>');
                  //  echo form_label('Username','username');
                    echo form_input('username','','class="form-control input-lg" id="username" placeholder="Username"')
                  ?>
                            <!-- <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address"> -->
        				</div>
        				<div class="form-group">
                  <?php
                  echo form_error('password','<div class="error_msg">','</div>');
                  //  echo form_label('Password','password');
                    echo form_password('password','','class="form-control input-lg" id="password" placeholder="Password"')
                  ?>
                            <!-- <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password"> -->
        				</div>

        				<hr class="colorgraph">
        				<div class="row">

                    <?php echo form_submit('login', 'Login', 'class="btn btn-md btn-success "') ?>
                                <!-- <input type="submit" class="btn btn-lg btn-success btn-block" value="Sign In"> -->

                      <a href="<?php echo site_url('login/register') ?>" class="btn btn-md btn-primary">Register</a>
        						<!-- <a href="" class="btn btn-lg btn-primary btn-block">Register</a> -->

        				</div>
        			</fieldset>
        		</form>
        	</div>
        </div>

        </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  </body>
</html>

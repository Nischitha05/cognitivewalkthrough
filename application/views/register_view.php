<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Register Area</title>

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
    if(validation_errors()){
    ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong><?php echo validation_errors(); ?></strong>
    </div>
    <?php
    }
    echo form_open('login/register','class="myclass"');
    ?>
    <fieldset>
      <h1 style='color:#FF4500'>Multiway Cognitive Walkthrough</h1>
      <h3>Please Register</h3>
      <hr class="colorgraph">

      <div class="form-group">
        <?php
      //    echo form_label('First Name','firstname');
          echo form_input('firstname',set_value('firstname'),'class="form-control input-md" id="firstname" placeholder="Firstname"')
        ?>

      </div>

      <div class="form-group">

        <?php
      //    echo form_label('Last Name','lastname');
          echo form_input('lastname',set_value('lastname'),'class="form-control input-md" id="lastname" placeholder="Lastname"')
        ?>
      </div>

      <div class="form-group">
        <?php
      //    echo form_label('Email','email');
          echo form_input('email',set_value('email'),'class="form-control input-md" id="email" placeholder="Email id"')
        ?>
      </div>
      <div class="form-group">
        <!-- <label for="username" class = "labelForm">Username:</label> -->

         <input type="text" id="username" name="username" placeholder="Username" class = "form-control input-md" onblur="check_if_exists();">
         <ul id="msg">
      </div>
      <div class="form-group">
        <?php
      //    echo form_label('Password','password');
          echo form_password('password',set_value('password'),'class="form-control input-md" id="password" placeholder="Password"')
        ?>
      </div>
      <div class=" dropdown form-group">
      <!-- <div class="dropdown form-group">
           <div class="col-xs-5"> -->
        <?php
          echo form_label('Level','level');
        ?><select name="level" class="level form-control">
            <option value="1">Admin</option>
            <option value="2">Expert</option>
          </select>

</div>
      <hr class="colorgraph">
      <div class="row">

          <?php echo form_submit('register', 'Register', 'class="btn btn-xl btn-success"') ?>


        <a href="<?php echo site_url('login') ?>" style="float: right;" class="btn btn-xl btn-primary"> Go back to Sign In</a>

      </div>
    </fieldset>
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
function check_if_exists() {

var username = $("#username").val();

$.ajax(
    {
        type:"post",
         url: "<?= base_url() ?>index.php/login/filename_exists/",
        data:{ username:username},
        success:function(response)
        {

          $("#msg").html(response);
            // if (response == true)
            // {
            //     $('#msg').html('<span style="color: green;">Please choose another Username as it already exists</span>');
            // }
            // else
            // {
            //     $('#msg').html('<span style="color:red;">Value does not exist</span>');
            // }
        }
    });
}
</script>

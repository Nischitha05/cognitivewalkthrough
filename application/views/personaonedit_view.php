<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>View Persona</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
  <?php    if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['adminid'] = $session_data['adminid'];
			$data['firstname'] = $session_data['firstname'];
			$data['lastname'] = $session_data['lastname'];
			$data['email'] = $session_data['email'];
			$data['username'] = $session_data['username'];
  }
			?>
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


    <div class="container"  >
          <h3>Edited Persona Profile</h3>
 <!-- <div class="jumbotron"> -->

      <div class="row">
        <div class="col-md-4"></div>
        <!-- <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-body"> -->
<br>
              <?php
              echo form_open('login','class="myclass"');
              ?>
              <div class="form-group">
              <?php
              echo "<b>Firstname: </b>".$_POST['firstname']."<br>"; ?>
              </div>
              <div class="form-group">
              <?php
              echo "<b>Lastname: </b>".$_POST['lastname']."<br>";
              ?>
              </div>
               <div class="form-group">
              <?php
              echo "<b>Age: </b>".$_POST['age']."<br>";
                ?>
              </div>
              <div class="form-group">
              <?php
              echo "<b>Interests: </b>".$_POST['interests']."<br>";
                ?>
              </div>
              <div class="form-group">
              <?php
              echo "<b>Hobby: </b>".$_POST['hobby']."<br>";
                ?>
              </div>
              <div class="form-group">
              <?php
              echo "<b>Aim: </b>".$_POST['aim']."<br>";
                ?>
              </div>
              <div class="form-group">
              <?php
              echo "<b>Qualification: </b>".$_POST['qualification']."<br>";
                ?>
              </div>
              <div class="form-group">
              <?php
              echo "<b>Occupation: </b>".$_POST['occupation']."<br>";
                ?>
              </div>
              <div class="form-group">
              <?php
              echo "<b>Browsers used: </b>".$_POST['browsers_used']."<br>";
                ?>
              </div>
              <div class="form-group">
              <?php
              echo "<b>Gadgets owned: </b>".$_POST['gadgets_owned']."<br>";
                ?>
              </div>
              <div class="form-group">
              <?php
              echo "<b>Description: </b>".$_POST['description']."<br>";
                ?>
              </div>
              <div class="form-group">
                <?php
                echo "<b>Profile Picture: </b>"
                  ?><br>

                <img style="float: left;
                                          margin: 5px;
                                          width: 200px;
                                          height: 200px; "
                                          src="http://localhost/cognitivewalkthrough/uploads/<?php echo $_POST['filename'] ?>">

              </div>

             <?php echo form_close();
              ?>



            <!-- </div> -->
          </div>
        </div>
        <div class="col-md-4"></div>
      <!-- </div>

      </div>
    </div> -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  </body>
</html>

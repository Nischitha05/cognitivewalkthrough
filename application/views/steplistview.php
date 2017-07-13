<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>View the list of the methods created</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">


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
          <h3 style="color:blue">List of the created actions</h3>
 <!-- <div class="jumbotron"> -->

      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-10">
          <!-- <div class="panel panel-default">
            <div class="panel-body"> -->
<!-- This page would consist of the methods that were created as links so that the user can click on this to create
create method in the next page
-->
              <?php
              echo form_open("task/gotonextstep",'class="myclass"');
              ?>


                  <div class="form-group">

<?php

foreach ($records as $row) {
    ?>

   <input type="hidden" name="taskid" value="<?php echo $row->taskid;?>" class="form-control" readonly/>
                     <h4>Alternative:</h4><input type="text" name="methodname" value="<?php echo $row->methodname;?>" class="form-control" readonly/>
                       <input type="hidden" name="methodid" value="<?php echo $row->methodid;?>" class="form-control" readonly/>
<?php break;} ?>
<h4>Action sequence</h4>
<?php foreach ($records as $row1) {?>
<input type="radio" name="stepfields" id="stepfields" value="<?php echo $row1->stepid ?>" required/><?php echo $row1->stepname; ?><br>
  <!-- <input type="hidden" name="methodid" value="<?php// echo $row->methodid;?>" class="form-control" disabled/> -->

<?php } ?>


 </div>

                <?php echo form_submit('save', 'Save', 'class="btn btn-primary"')
                ?>

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

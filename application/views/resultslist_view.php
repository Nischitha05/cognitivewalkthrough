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

      <!-- <div class="jumbotron"> -->
        <h3>View the  results of the Multiway Cognitive Walkthrough </h3>
         <?php

            //  echo form_open('task/selectedtask','class="myclass"');
              ?>

        <div class="span6 offset3">


                <table class="table" border="1">
                <thead>
              <tr>

                <th>Persona </th>
                <th>Task </th>
                <th>Variant</th>
                <th>User</th>
                <th>Action</th>

                </tr>
                </thead>
                <tbody>
                  <?php
                  foreach($groups as $row)
                  {
                      ?>
                      <tr>

                      <td><?php echo $row['personaname']; ?></td>
                      <td><?php echo $row['taskname']; ?></td>
                      <td><?php echo $row['variantname']; ?></td>
                      <?php
                      foreach($admin as $row1)
                      {
                          ?>
                      <td><?php echo $row1->firstname; ?> <?php echo $row1->lastname; ?></td>
                      <?php      }
                      ?>


                      <td><a href="<?php echo site_url('task/viewresults/').$row['timest']; ?>">View</a>|<a href="<?php echo site_url('task/deleteresult/').$row['timest']; ?>">Delete</a>|<a href="<?php echo site_url('task/evaluation/').$row['timest'].'/'.$row['variantname'].'/'.$row['taskid'].'/'.$row['personaid'].'/'.$row['variantid']; ?>">Overall Task Results Evaluation</a></td>
    <input type="hidden" name='personaid' id='personaid' value='<?php echo $row['personaid']; ?>'/>
                  <?php      }
                  ?>
                   </tbody>
                   <table>

              <?php echo form_close() ?>
      <!-- </div> -->

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  </body>
</html>

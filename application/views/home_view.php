<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Administrator Area</title>

<style>
ul{
list-style: none;}
.dropdown-menu{
  position:relative;
}
</style>
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<?php if($level == "1"){
?>
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
      <h4 class="nav navbar-nav" style="color:white;text-align: center;">Multiway Cognitive Walkthrough</h4><br>
      <a class="nav navbar-nav navbar-brand navbar-left" href="<?php echo base_url('index.php/home') ?>">Welcome <?php echo $firstname ?></a>

      <ul class="nav navbar-nav navbar-right">
                            <a class="btn btn-primary btn-sm" href="<?php echo site_url('home/logout') ?>" role="button">Logout</a>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    <div class="container"  style="margin-top:20px;">
  <div class="col-md-6">
      <!-- <div class="jumbotron"> -->
        <h3 style='color:blue'>Welcome to the Admin view</h3>
         <?php

              echo form_open('home','class="myclass"');
              ?>
<div class="form-group">
<ul class="main-menu">
              <!--  -->
  <li class='dropdown'> <button tabindex="-1" class="dropdown-toggle btn btn-lg" style="border: 2px solid #a1a1a1;
padding: 10px 40px;
background: #609f9f;
width: 500px;  color:black;
border-radius: 25px;" type="button" data-toggle="dropdown">Persona
   <span class="caret"></span></button>
   <ul class="dropdown-menu rightMenu">
     <li style=" border: 2px solid #a1a1a1;background:#4d8080;
     padding: 10px 40px;
     width: 500px;  color:black;
     border-radius: 25px;"><a href="<?php echo site_url('home/createpersona') ?>">Create Persona</a></li>
     <li style=" border: 2px solid #a1a1a1;
     padding: 10px 40px;
background:#4d8080;
     width: 500px;  color:black;
     border-radius: 25px;"><a href="<?php echo site_url('home/viewpersona') ?>">Edit Persona</a></li>
   </ul></li><br>
 <!-- </div><br> -->

<li class='dropdown'><button tabindex="-1" class="dropdown-toggle btn btn-lg" style=" border: 2px solid #a1a1a1;
padding: 10px 40px;
background: #609f9f;
width: 500px;  color:black;
border-radius: 25px;" type="button" data-toggle="dropdown">Cognitive Walkthrough
<span class="caret"></span></button>
<ul class="dropdown-menu rightMenu">
<li tabindex="-1" style=" border: 2px solid #a1a1a1;
padding: 10px 40px;background:#4d8080;
width: 500px;  color:black;
border-radius: 25px;"><a href="<?php echo site_url('task/getPersona') ?>">Create Cognitive Walkthrough</a></li>
<li tabindex="-1" style=" border: 2px solid #a1a1a1;
padding: 10px 40px;
background:#4d8080;
width: 500px;  color:black;
border-radius: 25px;"><a  href="<?php echo site_url('home/editmcwview') ?>">View and Delete Multiway Cognitive Walkthrough</a></li>
<li tabindex="-1" style=" border: 2px solid #a1a1a1;background:#4d8080;
padding: 10px 40px;
width: 500px;  color:black;
border-radius: 25px;"><a href="<?php echo site_url('home/listofCWmethodsview') ?>">Perform Cognitive Walkthrough</a></li>
</ul></li><br>
<!-- </div><br> -->
        <!-- <div class="form-group"><a style=" border: 2px solid #a1a1a1;
    padding: 10px 40px;
    background: #dddddd;
    width: 300px;
    border-radius: 25px;" href="<?php //echo site_url('home/createpersona') ?>" role="button">Create Persona</a></div><br/>
        <div class="form-group"><a style=" border: 2px solid #a1a1a1;
    padding: 10px 40px;
    background: #dddddd;
    width: 300px;
    border-radius: 25px;" href="<?php //echo site_url('home/viewpersona') ?>" role="button">Edit Persona</a></div><br/> -->
        <!-- <div class="form-group"><a style=" border: 2px solid #a1a1a1;
    padding: 10px 40px;
    background: #dddddd;
    width: 300px;
    border-radius: 25px;" href="<?php// echo site_url('task/getPersona') ?>" role="button">Create Multiway Cognitive Walkthrough</a></div><br/>
         <div class="form-group"><a style=" border: 2px solid #a1a1a1;
     padding: 10px 40px;
     background: #dddddd;
     width: 300px;
     border-radius: 25px;" href="<?php //echo site_url('home/editmcwview') ?>" role="button">View and Delete Multiway Cognitive Walkthrough</a></div><br/>
       <div class="form-group"><a style=" border: 2px solid #a1a1a1;
   padding: 10px 40px;
   background: #dddddd;
   width: 300px;
   border-radius: 25px;" href="<?php //echo site_url('home/listofCWmethodsview') ?>" role="button">Perform Multiway Cognitive Walkthrough</a></div><br/> -->
       <!-- <div class="form-group"> -->
         <li><a class="btn btn-lg" style=" border: 2px solid #a1a1a1;background: #609f9f;
  padding: 10px 40px;
 color:black;
 width: 500px;
   border-radius: 25px;" href="<?php echo site_url('home/displayresultslist') ?>" role="button">View Results</a></li>
 <!-- </div> -->
 <br/>
        <!-- <div class="form-group"> -->

          <li><a class="btn btn-lg" style=" border: 2px solid #a1a1a1;
background: #609f9f;
   color:black;
   width: 500px;
    border-radius: 25px;" href="<?php echo site_url('home/invite') ?>" role="button">Invite Experts to perform Cognitive Walkthrough</a>
</li>
  <!-- </div>-->
  <br/>
    <!-- <div class="dropdown form-group"> -->
  <li class='dropdown'>  <button class="dropdown-toggle btn btn-lg" style=" border: 2px solid #a1a1a1;
    padding: 10px 40px;
    background: #609f9f;
    width: 500px;  color:black;
    border-radius: 25px;" type="button" data-toggle="dropdown">Feedback
    <span class="caret"></span></button>
    <ul class="dropdown-menu rightMenu">
    <li style=" border: 2px solid #a1a1a1;
    padding: 10px 40px;
background:#4d8080;
    width: 500px;  color:black;
    border-radius: 25px;"><a href="<?php echo site_url('home/givefeedback') ?>">Give Application Feedback</a></li>
    <li style=" border: 2px solid #a1a1a1;
    padding: 10px 40px;
background:#4d8080;
    width: 500px;  color:black;
    border-radius: 25px;"><a href="<?php echo site_url('home/viewfeedback') ?>">View Application Feedback</a></li>
  </ul></li></ul>
  </div><br>


        <!-- <div class="form-group"><a style=" border: 2px solid #a1a1a1;
    padding: 10px 40px;
    background: #dddddd;
    width: 300px;
    border-radius: 25px;" href="<?php //echo site_url('home/givefeedback') ?>" role="button">Give Application Feedback</a></div><br/>
        <div class="form-group"><a style=" border: 2px solid #a1a1a1;
    padding: 10px 40px;
    background: #dddddd;
    width: 300px;
    border-radius: 25px;" href="<?php //echo site_url('home/viewfeedback') ?>" role="button">View Application Feedback</a></div><br/> -->

       <?php echo form_close() ?>
      </div>
<div class="col-md-4">
  <h4>Information:</h4>
  <p style='color:#2f4f4f;'>1) To proceed with using the application, first click on <span style="color: #0000a0;font-family:cursive;">'Persona'</span>  to get a dropdown to create a profile. <br/><br/>
    2) After creating the persona profile, Click on <span style="color: #0000a0;font-family:cursive;">'Cognitive Walkthrough'</span> and proceed to create the Cognitive Walkthrough(can be multiway or classic).<br/><br/>
    3) You can either perform the Cognitive Walkthrough for the created task or <span style="color: #0000a0;font-family:cursive;">'Invite'</span> experts to use your application to perform.<br/><br/>
    4) Kindly give a <span style="color: #0000a0;font-family:cursive;">'Feedback'</span> about the application to help in improving the usability of the interface.

  </p>
</div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

    <?php }else{ ?>
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
              <h3 style='color:blue'>Welcome to the Expert's view</h3>
               <?php

                    echo form_open('home','class="myclass"');
                    ?>
                 <div class="form-group"><a class="btn btn-info btn-lg btn-block" href="<?php echo site_url('home/listofCWmethodsview1') ?>" role="button">Perform Multiway Cognitive Walkthrough</a></div><br/>
                 <div class="form-group"><a class="btn btn-warning btn-lg btn-block" href="<?php echo site_url('home/givefeedback') ?>" role="button">Give Application Feedback</a></div><br/>
                 <?php echo form_close() ?>
            <!-- </div> -->

          <!-- </div> -->

          <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
          <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
          <!-- Include all compiled plugins (below), or include individual files as needed -->
          <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
          <?php } ?>
  </body>
</html>
<script>
  $('li.dropdown').hover(function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
  }, function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
  });
</script>

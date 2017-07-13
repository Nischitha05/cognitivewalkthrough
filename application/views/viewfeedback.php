<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>View the list questions</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
<style>
/*Now the CSS*/
* {margin: 0; padding: 0;}

.tree ul {
	padding-top: 20px; position: relative;

	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

.tree li {
	float: left; text-align: center;
	list-style-type: none;
	position: relative;
	padding: 20px 5px 0 5px;

	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before, .tree li::after{
	content: '';
	position: absolute; top: 0; right: 50%;
	border-top: 1px solid #ccc;
	width: 50%; height: 20px;
}
.tree li::after{
	right: auto; left: 50%;
	border-left: 1px solid #ccc;
}

/*We need to remove left-right connectors from elements without
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
	display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child{ padding-top: 0;}

/*Remove left connector from first child and
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
	border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before{
	border-right: 1px solid #ccc;
	border-radius: 0 5px 0 0;
	-webkit-border-radius: 0 5px 0 0;
	-moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
	border-radius: 5px 0 0 0;
	-webkit-border-radius: 5px 0 0 0;
	-moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul::before{
	content: '';
	position: absolute; top: 0; left: 50%;
	border-left: 1px solid #ccc;
	width: 0; height: 20px;
}

.tree li a{
	border: 1px solid #ccc;
	padding: 5px 10px;
	text-decoration: none;
	color: #666;
	font-family: arial, verdana, tahoma;
	font-size: 11px;
	display: inline-block;

	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;

	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li a:hover, .tree li a:hover+ul li a {
	background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}
/*Connector styles on hover*/
.tree li a:hover+ul li::after,
.tree li a:hover+ul li::before,
.tree li a:hover+ul::before,
.tree li a:hover+ul ul::before{
	border-color:  #94a0b4;
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

    <div class="container"  >



          <h3 style="color:blue">Questionnaire</h3>

      <div class="row">
        <div class="col-md-4"></div>

<?php echo form_open('home/savefeedback','class="myclass"') ?>

<input type="text" name="question1" class='form-control' value= "How do you find the user interface of Multiway Cognitive Walkthrough application?" id="question1" style="font-weight:bold;width:100%;background-color:#F0FFFF"  readonly/>
<textarea name="question1_text" class='form-control' id="description1" rows="3" cols="73" required></textarea><br>
<hr class="colorgraph">
<input type="text" name="question2" class='form-control' value="Was there any trouble finding individual functions, if yes then what were they?" id="question2" style="font-weight:bold;width:100%;background-color:#F0FFFF"  readonly/>
<textarea name="question2_text" class='form-control' id="description2" rows="3" cols="73" required></textarea><br>
<hr class="colorgraph">
<input type="text" name="question3" class='form-control' value="Have all the functions worked as expected? If not, what behavior was expected?" id="question3" style="font-weight:bold;width:100%;background-color:#F0FFFF"  readonly/>
<textarea name="question3_text" class='form-control' id="description3" rows="3" cols="73" required></textarea><br>
<hr class="colorgraph">
<input type="text" name="question4" class='form-control' value="What functionality has been missing?" id="question4" style="font-weight:bold;width:100%;background-color:#F0FFFF"  readonly/>
<textarea name="question4_text" class='form-control' id="description4" rows="3" cols="73" required></textarea><br>
<hr class="colorgraph">
<input type="text" name="question5" class='form-control' value="Have any problems occurred while using the application? If yes, then what were they?" id="question5" style="font-weight:bold;width:100%;background-color:#F0FFFF"  readonly/>
<textarea name="question5_text" class='form-control' id="description5" rows="3" cols="73" required></textarea><br>
<hr class="colorgraph">
<input type="text" name="question6" class='form-control' value="Any suggestions?" id="question6" style="font-weight:bold;width:100%;background-color:#F0FFFF"  readonly/>
<textarea name="question6_text" class='form-control' id="description6" rows="3" cols="73" required></textarea><br>

<input type='submit' value='Submit' class='del_button btn btn-danger btn-md' id='submitreview' />

<?php echo form_close() ?>

        </div>
        <div class="col-md-4"></div>
      </div>

      <!-- </div> -->
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  </body>
</html>

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
      <a href="<?php echo site_url('variants/getoverviewfromviewvariant/').$taskid.'/'.$personaid; ?>"><input type="button" class='btn btn-lg btn-success' value="Task Overview" /></a>

          <h3 style="color:blue">Task created</h3>
 <!-- <div class="jumbotron"> -->

      <div class="row">
        <div class="col-md-4"></div>

          <!-- <div class="panel panel-default"> -->

<!-- This page would consist of the methods that were created as links so that the user can click on this to create
create method in the next page
-->
              <?php
              echo form_open('variants/cwperformfirststep/','class="myclass"');
              ?>


<input type='hidden' value='<?php echo $timestamp ?>' name='timestamp'/>
               <!-- <div class="form-group">
                  <input type="hidden" name="personaid" value="<?php /*echo $row->taskid; */?>" class="form-control" />
                </div> -->


                <?php
                foreach ($results as $row) {
            //      echo $row->taskname;
          //         echo $row->personaid;
                 ?>
<div>
<br>
                  <h4>Persona Details:</h4><br>
<input type="hidden" name="personaid" id="personaid" value="<?php echo $row->personaid; ?>"/>
  <IMG STYLE="position:absolute; RIGHT:170px; WIDTH:200px; HEIGHT:200px" SRC="http://localhost/cognitivewalkthrough/uploads/<?php echo $row->profile_picture ?>">
                        <b>  Firstname:</b> <p> <?php echo $row->firstname; ?></p>
                          <b>    Lastname:</b><p> <?php echo $row->lastname; ?></p>
                          <b>    Age:</b> <p><?php echo $row->age; ?></p>
                          <b>  Interests:</b><p>  <?php echo $row->interests; ?></p>
                          <b>  Hobby:</b><p>    <?php echo $row->hobby; ?></p>
                          <b>  Aim:</b> <p>   <?php echo $row->aim; ?></p>
                          <b>  Qualification:</b> <p>   <?php echo $row->qualification; ?></p>
                        <b>    Occupation:</b>  <p>  <?php echo $row->occupation; ?></p>
                        <b>    Browsers used:</b><p>    <?php echo $row->browsers_used; ?></p>
                        <b>    Gadgets owned:</b> <p>   <?php echo $row->gadgets_owned; ?></p>
                        <b>      Description:</b> <p> <?php echo $row->description; ?></p>


</div><br>
<div>
   <h4>Task Name:</h4>
                        <input type="radio" name="taskid" checked="true" id="taskid" value="<?php echo $row->taskid; ?>" hidden/><p><?php echo $row->taskname; ?></p>
                        <input type="hidden" name="taskid" checked="true" id="taskid" value="<?php echo $row->taskid; ?>"/><br>
  <h4>Start Image:</h4><br>
  <img id="startimage" style="float: left;
                            margin: 5px;
                            width: 450px;
                            height: 250px; "
                            src="http://localhost/cognitivewalkthrough/uploads/<?php echo $row->Startimage ?>"><br></div><br>

</div>
                            <!-- <input type="hidden" name="methodid" checked="true" id="methodid" value="<?php// echo $row->methodid; ?>"/><br> -->
              <?php } ?>
<!--
                  <h4>Method Name:</h4>
              <?php// foreach ($records as $row1) {
                # code...?>
  <div class='radio'>
               <input type="radio" name="method" id="method" value="<?php// echo $row1->methodid; ?>" required/><p><?php// echo $row1->methodname; ?></p>
            </div>  <?php //}
              ?> -->

  <h4>Variants:</h4>
              <?php
              foreach($variants as $row)
              {?>
                   <div class="radio">

                  <input type="radio" name="variants" id="variants" value="<?php echo $row->variantid ?>" required/><p><?php echo $row->variantname ?></p>
                  <input type="hidden" name="variantname" id="variantname" value="<?php echo $row->variantname ?>"/>
</div>

             <?php }

              ?>

              <!-- <input type="radio" name="variants" id="novariant" value="novariant"/>None<br/> -->

<br><br>
</div>
                <?php echo form_submit('save', 'Next', 'class="btn btn-primary btn-lg"') ?>
              <?php echo form_close() ?>
        <!-- </div> -->
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

         $('#new_question').on('keyup', function() {
         $('.'+$(this).attr('id')).val($(this).val());
     });




</script>

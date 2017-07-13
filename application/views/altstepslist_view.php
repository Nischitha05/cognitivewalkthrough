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
          <h3 style="color:blue">View the list of the Alternatives created for the action</h3>
 <!-- <div class="jumbotron"> -->

      <div class="row">

         <div class="col-md-10">
        <!--  <div class="panel panel-default">
            <div class="panel-body"> -->
<!-- This page would consist of the methods that were created as links so that the user can click on this to create
create method in the next page
-->
              <?php
              echo form_open("task/createsubsteps",'class="myclass"');
              ?>


   <div class="form-group">
<h4>Action:</h4>
 <?php

 foreach ($getstep as $row1) {
     ?>
     <input type="hidden" name="taskid" checked="true" id="taskid" value="<?php echo $taskid; ?>"/>

 <input type="hidden" name="methodid" value="<?php echo $row1->methodid;?>" class="form-control" readonly/>
  <input type="text" name="stepname" value="<?php echo $row1->stepname;?>" class="form-control" readonly/>
 <input type="hidden" name="stepid" value="<?php echo $row1->stepid;?>" class="form-control" readonly/>

 <?php break; } ?>
</div>
  <div class="form-group">
 <h4>Action Alternatives</h4>
 <ul id='getdata'></ul>
 <div id='replacelist'>
<?php
foreach ($getstep as $row) {
    ?>


<input type="radio" name="stepfields" id="stepfields" value="<?php echo $row->altstepid ?>" required/><?php echo $row->altstepname; ?><br>
  <!-- <input type="hidden" name="methodid" value="<?php// echo $row->methodid;?>" class="form-control" disabled/> -->

<?php } ?>
 </div>
 <div id='add_alternatives'>
 <h4>Add more Alternatives</h4><input type="text" style="width:700px;display: inline" id="fields" name="fields[]" placeholder="Enter Method Name" class="form-control method_list_list"/> <input type="button" name="addmore" id="addmore" class="btn btn-success" value="Add More"/>

 </div>

                <?php echo form_submit('submit', 'Next', 'class="btn btn-primary"')
                ?>    <input type="button" value="Update" id="add" name="add" class="btn btn-success btn-xl" title="Click on this button to add more alternatives for the firstpage ">
                    <input type="button" value="Delete" id="delete" name="delete" class="btn btn-danger btn-xl" title="Click on this button to delete an alternative">
                    <input type="button" value="Edit" id="update" name="update" class="btn btn-info btn-xl" title="Click on this button to edit an alternative">

                <a href="<?php echo site_url('variants/getoverviewfrommethodlistvariant/').$row1->taskid; ?>"><input type="button" class='btn btn-warning' value="Task Overview" /></a>

<br>
                <a href="<?php echo site_url('task/steplist_view/?methodid=' . $row1->methodid.'') ?>" role="button">Add alternatives to other actions</a><br>
                <a  href="<?php echo site_url('task/methodlist_view/?taskid=' . $row1->taskid.'') ?>" role="button">Fetch other alternatives list to add action sequence to perform the task</a>

       </div>        <?php echo form_close() ?>

            </div>

            <div class="col-md-2">
              <h4>Information about the provided links:</h4>
              <p style='color:#2f4f4f;'>1) 'Add alternatives to other actions': This is to get the list of the created action sequence for the chosen alternative. Do you remember while creating the task, you created alternatives and chose one of the alternative to add the action sequence to it. We are talking about that action sequence. If there are any alternatives to add to the action in that action sequence, then you can retrieve the list and proceed further with adding the alternatives for that action. <br/><br/>
                2) 'Fetch other alternatives list to add action sequence to perform the task': Do you remember while creating the task, you created alternatives? This link is to fetch those alternatives and add action sequences.<br/><br/>
                3) If you do not wish to go to any of those lists, then you can proceed further with choosing the alternative to add action sequence<br/><br/>
                        </p>
            </div>
          </div>
        <!-- </div> -->

      <!-- </div>

      </div>
    </div> -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  </body>
  <script>
  $(document).ready(function(){
       var i=1;
       $('#addmore').click(function(){
            i++;
            $('#add_alternatives').append('<span id="row'+i+'"><td><input type="text" name="fields[]" style="width:700px;display: inline" placeholder="Enter Alternative" class="form-control name_list" required/><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>');
       });
       $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
       });
       $(document).on("click", '#add', function(e) {

           e.preventDefault();


               $.ajax({
                     type: 'POST',
                   url: "<?= base_url() ?>index.php/task/addmoremethods1/",
                      data:$(this.form).serialize(),

                    success: function (data) {

          $("#replacelist").remove();
        $("#getdata").html(data);
//$("#theform")[0].reset();
                    }
                });

            });

            $(document).on("click", '#delete', function(e) {

                e.preventDefault();


                    $.ajax({
                          type: 'POST',
                        url: "<?= base_url() ?>index.php/task/deletemethods1/",
                           data:$(this.form).serialize(),

                         success: function (data) {

               $("#replacelist").remove();
             $("#getdata").html(data);

                         }
                     });

                 });
                 $(document).on("click", '#update', function(e) {

                     e.preventDefault();

                         $.ajax({
                               type: 'POST',
                             url: "<?= base_url() ?>index.php/task/editstep1/",
                                data:$(this.form).serialize(),

                              success: function (data) {

                    $("#replacelist").remove();
                  //    $("#removeforedit").remove();
                    //    $("#add_alternatives").remove();
                  $("#getdata").html(data);

                              }
                          });

                      });

                      $(document).on("click", '#savestep', function(e) {

                          e.preventDefault();

                              $.ajax({
                                    type: 'POST',
                                  url: "<?= base_url() ?>index.php/task/savestep1/",
                                     data:$(this.form).serialize(),

                                   success: function (data) {

                         $("#replacelist").remove();
                          // $("#removeforedit").remove();
                            // $("#add_alternatives").remove();
                       $("#getdata").html(data);

                                   }
                               });

                           });

                           $(document).on("click", '#cancel', function(e) {

                               e.preventDefault();

                                   $.ajax({
                                         type: 'POST',
                                       url: "<?= base_url() ?>index.php/task/cancelstep1/",
                                          data:$(this.form).serialize(),

                                        success: function (data) {

                              $("#replacelist").remove();

                            $("#getdata").html(data);

                                        }
                                    });

                                });
  });
  </script>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Persona</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


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


           <div class="container">
                <br />
                <br />
             <h3 style="color:blue">Please add Action Alternatives</h3>
                            <!-- <div class="jumbotron"> -->
               <div class="row">
        <div class="col-lg-10"></div>
       <div class="col-lg-10">
          <!-- <div class="panel panel-default">
            <div class="panel-body"> -->
  <!-- <form method='post' id="theform"> -->
            <?php

             echo form_open_multipart('task/getaltsteplist/','class="myclass"');
              ?>
                <div class="form-group">
                     <!-- <form name="add_name" id="add_name">   -->
                <div class="table-responsive">
              <?php
              foreach ($step as $row) {
              ?>
              <p><a href="<?php echo site_url('task/gotomethodlist/?taskid=' . $row->taskid.'') ?>"><button type="button" class="btn btn-success" title="If you do not wish to create any alternatives then you can go back to create action sequence for task alternatives">Go Back</button></a></p>

              <h4>Chosen Task alternative:</h4>
              <input type="radio" name="methodid" checked="true" id="methodid" value="<?php echo $row->methodid; ?>" hidden/><p><?php echo $row->methodname; ?></p>
              <input type="hidden" name="methodid" checked="true" id="methodid" value="<?php echo $row->methodid; ?>"/>
              <input type="hidden" name="taskid" checked="true" id="taskid" value="<?php echo $row->taskid; ?>"/>

              <h4>Action:</h4>
              <input type="radio" name="stepid" checked="true" id="stepid" value="<?php echo $row->stepid; ?>" hidden/><p><?php echo $row->stepname; ?></p>
                                              <!-- <input type="hidden" name="methodid" checked="true" id="methodid" value="<?php// echo $row->methodid; ?>"/><br> -->
              <img id="getsteps" style="float: left;
                                        margin: 5px;
                                        width: 450px;
                                        height: 250px; "
                    src="http://localhost/cognitivewalkthrough/uploads/<?php echo $row->image ?>"><br></div></li><br>

              <?php break;} ?>
  <table  id="dynamic_field">
    <tr>   <td><h4>Available alternatives:</h4><?php
      foreach ($result as $row) {

      ?>

<?php echo $row->altstepname; ?></p>
      <?php }
      ?></td></tr>

              <tr>

            <td><h4>Alternatives for this action</h4><input type="text" style="width:500px" name="fields[]" placeholder="Enter Steps Alternative" class="form-control method_list_list"/>  </td>


            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
            </tr>



          </table>
     </div>
     <!-- <a class="btn btn-primary btn-xl" name='save' id='save' href="<?php //echo site_url('task/createaltstep/?stepid=' . $row->stepid.'') ?>" role="button">Save</a> -->
     <input type='button' value='Save' id='save' name='save' class='btn btn-warning btn-xl' title='Please click on this button only when you add alternatives'>


                               <?php echo form_submit('next', 'Next', 'class="btn btn-primary"') ?>

                <!-- <a href="<?php echo site_url('login') ?>" class="btn btn-link">Sign In</a> -->
              <?php echo form_close() ?>


                     <!-- </form>   -->

            </div>
            <div class="col-md-2">
              <h4>Information:</h4>
              <p style='color:#2f4f4f;'>1) Kindly note, if no action is chosen to add alternatives, then no data will be shown. If you landed on this page without choosing any action, then you can go back refresh the page once to get the created action sequence previously and then select the action to add the alternatives to this action. <br/><br/>
                2) Just like how you created the task in the first step by adding alternatives, you can add what are the alternative ways of performing this particuler action for the action.<br/><br/>
                3) Click on 'Save and Next' button.<br/><br/>
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
</html>
 <script>
 $(document).ready(function(){
      var i=1;
      $('#add').click(function(){
           i++;
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="fields[]" placeholder="Enter Step Alternative" class="form-control name_list" required/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      });
      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });

 $("body").on("click", "#save", function(e) {
//      $('form').on('submit', function (e) {

var reason = $('#reason').val();
if(reason ===''){
  alert('Please fill all the fields');
}else{
                e.preventDefault();
                   $.ajax({
                        type:"POST",
                        url:"<?= base_url() ?>index.php/task/createaltstep/",
                        data:$('form').serialize(),

                          success:function(response){

                                            alert('Saved successfully');

                     }
                    });
                  }
              });
  });
 function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#startimage')
                    .attr('src', e.target.result)
                    .width(600)
                    .height(400);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


 </script>

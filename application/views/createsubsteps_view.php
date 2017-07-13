<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Create Persona</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css" media="all" />

<!--
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->

 <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
 <script type="text/javascript" src="<?php  echo base_url('assets/js/jquery-ui.min.js') ?>"></script>
 <!-- <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="text/javascript"></script>
 <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js" type="text/javascript"></script> -->

<!-- <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src=" http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script> -->
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

     <!-- <div class="container"> -->

             <h3 style="color:blue">Please add Action sequence</h3>

                 <!-- <div class="jumbotron">
               <div class="row"> -->
        <!-- <div class="col-lg-6"></div> -->
        <div class="col-lg-7">
          <!-- <div class="panel panel-default"> -->
            <!-- <div class="panel-body"> -->

 <p>

   <?php

     echo form_open_multipart('task/addalt/','class="myclass" id="upload-form"');
     ?>
 <?php //echo form_open_multipart('task/addalt');
 ?>
  <!-- <form name="newsubsteps" action="task/addalt/" method="post" enctype="multipart/form-data" id="upload-form"> -->
   <!-- </div> -->

<div class="input-files">


<div>

  <?php
  foreach ($records as $row) {
   ?>

   <a class="btn btn-danger btn-xl" href="<?php echo site_url('task/methodlist_view/?taskid=' . $row->taskid.'') ?>" role="button">Fetch other alternatives for the task to add action sequences</a>
<br>
            <h4>Alternative for the task :</h4>
  <input type="radio" name="methodid" checked="true" id="methodid" value="<?php echo $row->methodid; ?>" hidden/><p><?php echo $row->methodname; ?></p>
  <input type="hidden" name="methodid" checked="true" id="methodid" value="<?php echo $row->methodid; ?>"/><br>
  <input type="hidden" name="taskid" checked="true" id="taskid" value="<?php echo $row->taskid; ?>"/>

    <h4>Action :</h4>
              <input type="radio" name="stepfields" checked="true" id="stepfields" value="<?php echo $row->stepid; ?>" hidden/><p><?php echo $row->stepname; ?></p><br>
              <h4>Alternative for the action :</h4>
            <input type="radio" name="altstepfields" checked="true" id="altstepfields" value="<?php echo $row->altstepid; ?>"/ hidden=""><p><?php echo $row->altstepname; ?></p><br>

              <!-- <input type="hidden" name="methodid" checked="true" id="methodid" value="<?php// echo $row->methodid; ?>"/><br> -->
<?php } ?>
 </p>


  <h4>Sub Action</h4><input type="text" name="step" class="form-control" id="step"/>
  <h4>Action Description</h4>
    <textarea name="reason" id="reason" rows="3" cols="73"></textarea><br>
  <h4>Image</h4>
  <input type="file" accept="image/png, image/jpeg, image/gif" name="message" id="message" onchange="readURL(this);"/><br>
 <input type="button" value="Add" id="submit" name="submit" class="btn btn-success btn-xl">

<!-- <a class="btn btn-primary btn-xl" href="<?php //echo site_url('task/addalt') ?>" role="button">Add</a> -->

      <a class="btn btn-primary btn-xl" href="<?php echo site_url('task/gotosteplist_view/?stepid=' . $row->stepid.'&methodid='.$row->methodid.'') ?>" role="button" title="Go back to list of action alternatives to add action sequence">Go back</a>

</div>
</div>


  <ul id="comment"></ul>

<div id="fadeout">
  <ul id="responds"  >
    <?php
    foreach($results as $row){
    ?>
    <li id="item_<?php echo $row->altsubstepid;?>">
<input type='radio' name='stepid' value='<?php echo $row->altsubstepid;?>' hidden>
      <div id="img_div">
    <div class="del_wrapper">
                    <a href="#" class="del_button" id="del-<?php echo $row->altsubstepid;?>">
                    <img style="height:14px;width:14px;" src="<?php echo base_url('uploads/delete-icon.png') ?>" alt="delete-icon" /></a>
    </div>
    <b><?php echo $row->altsubstepname ?></b> <br>
      <i><?php echo $row->subaction_description ?></i> <br>
    <img id='img1' src="http://localhost/cognitivewalkthrough/uploads/<?php echo $row->altsubstepimage ?>"></div></li><br><br><br><br><br><br><br>
    <?php
    }
    ?>
</ul>
<!-- <a class='btn btn-danger btn-xl' href='<?php //echo site_url('task/gotosubsubstep/?altsubstepid=' . $row->altsubstepid.'') ?>' role='button'>Next</a> -->
</div>
</form>
  </div>
</div>
    <div class="col-lg-5">
      <div class="jumbotron">
        <ul id="addingstep" style="overflow-y: scroll; height:800px;">
          <?php
          foreach ($records2 as $row) {
          ?>

          <li id="item_<?php echo $row->stepid;?>">
            <div id="img1_div" style="width:60%;height: 280px;
            padding:0px;">
          <div class="add_wrapper">
          <a href="#" class="add_button1" id="add_<?php echo $row->stepid;?>">
          <img style="height:14px;width:14px;float: right;" src="<?php echo base_url('assets/images/add_icon.png') ?>" alt="add-icon" /></a>
        </div>

          <b><?php echo $row->stepname ?></b> <br>
            <i><?php echo $row->action_description ?></i><br>
          <img id="getsteps" style="float: left;
                                    margin: 5px;
                                    width: 450px;
                                    height: 250px; "
                                    src="http://localhost/cognitivewalkthrough/uploads/<?php echo $row->image ?>"><br></div></li><br><<br><br><br><br><br><br>

                                    <?php }
                                    ?>

        <?php
        foreach ($steps as $row) {
        ?>

        <li id="item_<?php echo $row->altsubstepid;?>">
          <div id="img1_div" style="width:60%;height: 280px;
          padding:0px;">
        <div class="add_wrapper">
        <a href="#" class="add_button" id="add_<?php echo $row->altsubstepid;?>">
        <img style="height:14px;width:14px;float: right;" src="<?php echo base_url('assets/images/add_icon.png') ?>" alt="add-icon" /></a>
      </div>

        <b><?php echo $row->altsubstepname ?></b> <br>
          <i><?php echo $row->subaction_description ?></i> :<br>
        <img id="getsteps" style="float: left;
                                  margin: 5px;
                                  width: 450px;
                                  height: 250px; "
                                  src="http://localhost/cognitivewalkthrough/uploads/<?php echo $row->altsubstepimage ?>"><br></div></li><br><br><br><br><br>
        <?php }
        ?></ul>
    </div>
      </div>
    </div>
<!-- </div> -->
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php //echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  </body>
</html>
<script>

$(document).ready(function(){


     $("#submit").click(function(e){
       e.preventDefault();

       var name=$("#step").val();
   //   var message=$("#message").val();
       var altstepfields = $('#altstepfields').val();
             var reason = $('#reason').val();
       var formData = new FormData();

       formData.append('step',name);
     formData.append('reason',reason);
       formData.append('altstepfields',altstepfields);
       formData.append('message', $('#message')[0].files[0]);
       formData.append('action','addcomment');
       if((($('#message')[0].files[0])===undefined) || (reason==='') || (name=== '')){
         alert("please fill out all the fields and then try to add an action");
       }else{
           $.ajax({
               type:"post",
               url:"<?= base_url() ?>index.php/task/addalt/",
               data:formData,
               processData: false,
               contentType:  false,
                 success:function(response){

                   $("#step").val("");
                    $("#message").val("");
                $("#comment").html(response);

                // $("#responds").sortable({
                //
                //           update : function () {
                //           serial = $('#responds').sortable('serialize'); // Encode a set of form elements as a string for submission. (see https://api.jquery.com/serialize/ for more info)
                //           $.ajax({
                //             url: "<?= base_url() ?>index.php/task/sortsubsteps/",
                //           type: "post",
                //           data: serial,
                //           error: function(){
                //           alert("theres an error with AJAX");
                //           }
                //           });
                //           }
                //           });

                  $("#fadeout").remove();
                //
             }
        });
      }
     });

            $(function() {
                  $("#responds").sortable({
                  					update : function () {
                  					serial = $('#responds').sortable('serialize'); // Encode a set of form elements as a string for submission. (see https://api.jquery.com/serialize/ for more info)
                  					$.ajax({
                  					  url: "<?= base_url() ?>index.php/task/sortsubsteps/",
                  					type: "post",
                  					data: serial,
                  					error: function(){
                  					alert("theres an error with AJAX");
                  					}
                  					});
                  					}
                  					});
                        });
                        $("body").on("click", "#addingstep .add_button1", function(e) {
                          e.preventDefault();

                          var clickedID = this.id.split('_'); //Split ID string (Split works as PHP explode)

                          var DbNumberID = clickedID[1]; //and get number from array
                          var myData = 'recordToAdd='+ DbNumberID; //build a post data structure


                     var altstepfields = $('#altstepfields').val();
                     var methodData = 'stepToAdd='+ altstepfields;

                          jQuery.ajax({
                          type: "POST", // HTTP method POST or GET
                          url: "<?= base_url() ?>index.php/task/addstep2/?&altsubstepid="+DbNumberID+"&altstepfields="+altstepfields, //Where to make Ajax calls
                          dataType:"text", // Data type, HTML, json etc.
                          data:{myData,methodData}, //Form variables
                          success:function(data){
                            $("#comment").html(data);

                            // $("#responds").sortable({
                            //
                            //           update : function () {
                            //           serial = $('#responds').sortable('serialize'); // Encode a set of form elements as a string for submission. (see https://api.jquery.com/serialize/ for more info)
                            //           $.ajax({
                            //             url: "<?= base_url() ?>index.php/task/sortsubsteps/",
                            //           type: "post",
                            //           data: serial,
                            //           error: function(){
                            //           alert("theres an error with AJAX");
                            //           }
                            //           });
                            //           }
                            //           });

                              $("#fadeout").remove();


                          },
                          error:function (xhr, ajaxOptions, thrownError){
                           //On error, we alert user
                           alert(thrownError);
                          }
                          });
                         });



     $("body").on("click", "#responds .del_button", function(e) {
       e.preventDefault();

       var clickedID = this.id.split('-'); //Split ID string (Split works as PHP explode)
       var DbNumberID = clickedID[1]; //and get number from array
       var myData = 'recordToDelete='+ DbNumberID; //build a post data structure

      $('#item_'+DbNumberID).addClass( "sel" ); //change background of this element by adding class
    //    $('#img_div_'+DbNumberID).addClass( "sel" );
      $(this).hide(); //hide currently clicked delete button

       jQuery.ajax({
       type: "POST", // HTTP method POST or GET
       url: "<?= base_url() ?>index.php/task/deletesubstep/"+DbNumberID, //Where to make Ajax calls
       dataType:"text", // Data type, HTML, json etc.
       data:myData, //Form variables
       success:function(response){
        //on success, hide  element user wants to delete.
       $('#item_'+DbNumberID).fadeOut();
    //    $('#img_div_'+DbNumberID).fadeOut();
       },
       error:function (xhr, ajaxOptions, thrownError){
        //On error, we alert user
        alert(thrownError);
       }
       });
      });
      $("body").on("click", "#addingstep .add_button", function(e) {
        e.preventDefault();

        var clickedID = this.id.split('_'); //Split ID string (Split works as PHP explode)

        var DbNumberID = clickedID[1]; //and get number from array
        var myData = 'recordToAdd='+ DbNumberID; //build a post data structure


   var altstepfields = $('#altstepfields').val();
   var methodData = 'stepToAdd='+ altstepfields;

        jQuery.ajax({
        type: "POST", // HTTP method POST or GET
        url: "<?= base_url() ?>index.php/task/addsubstep/?&altsubstepid="+DbNumberID+"&altstepfields="+altstepfields, //Where to make Ajax calls
        dataType:"text", // Data type, HTML, json etc.
        data:{myData,methodData}, //Form variables
        success:function(data){
          $("#comment").html(data);

          // $("#responds").sortable({
          //
          //           update : function () {
          //           serial = $('#responds').sortable('serialize'); // Encode a set of form elements as a string for submission. (see https://api.jquery.com/serialize/ for more info)
          //           $.ajax({
          //             url: "<?= base_url() ?>index.php/task/sortsubsteps/",
          //           type: "post",
          //           data: serial,
          //           error: function(){
          //           alert("theres an error with AJAX");
          //           }
          //           });
          //           }
          //           });

            $("#fadeout").remove();


        },
        error:function (xhr, ajaxOptions, thrownError){
         //On error, we alert user
         alert(thrownError);
        }
        });
       });

});
function readURL(input) {
  var oFile = document.getElementById("message").files[0]; // <input type="file" id="fileUpload" accept=".jpg,.png,.gif,.jpeg"/>

  if (oFile.size > 2097152) // 2 mb for bytes.
  {
      alert("File size must under 2mb!");
      return;
  }
       else {
        alert("File size is fine");
           };



     }

</script>

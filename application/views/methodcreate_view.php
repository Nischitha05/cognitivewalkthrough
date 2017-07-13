<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Add action sequence</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css" media="all" />

<!--
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
 <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>"></script>
<!-- <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="text/javascript"></script> -->
<!-- <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js" type="text/javascript"></script> -->

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

          <div id="parent"> <h3 style="color:blue">Add action sequence for the selected alternative</h3>

                                <!-- <div class="jumbotron">
                              <div class="row"> -->
                       <!-- <div class="col-lg-6"></div> -->
                       <div class="col-lg-7">
                         <!-- <div class="panel panel-default"> -->

 <p>
   <?php

     echo form_open_multipart('task/gotonext/','class="myclass" id="upload-form"');
     ?>
   <!-- <form name="uploadFile" action="http://localhost/cognitivewalkthrough/index.php/task/gotonext" method="post" enctype="multipart/form-data" id="upload-form"> -->

<div class="input-files">
<span style='color:#66ff66;' title="1) You can zoom on any image by pressing and holding the mouse cursor on the image.
  2)Write the action and add an image for that action.
  3) If there was any mistakes while adding the action, it can be deleted by clicking on 'X' button in the added action.
  4)If an action is already available then they are shown on the right hand side of the page. You can click on the '+' button to add the action.
  5)if there are alternatives to the action that has been added, then select the action by checking on the radio button and then click on 'Next' button which is at the bottom of the page
  6)If there are no alternatives to the added action sequence then you can click on 'Go back' to add action sequence for the other alternatives of the task">Information(i)</span>

<div>
  <?php
  foreach ($results as $row) {
   ?>
            <h4>Task:</h4>
  <input type="radio" name="taskid" checked="true" id="taskid" value="<?php echo $row->taskid; ?>" hidden/><p><?php echo $row->taskname; ?></p>
  <input type="hidden" name="taskid" checked="true" id="taskid" value="<?php echo $row->taskid; ?>"/><br>

    <h4>Alternative:</h4>
              <input type="radio" name="methodfields" checked="true" id="methodfields" value="<?php echo $row->methodid; ?>" hidden/><p><?php echo $row->methodname; ?></p><br>
              <!-- <input type="hidden" name="methodid" checked="true" id="methodid" value="<?php// echo $row->methodid; ?>"/><br> -->
<?php } ?>
 </p>


  <h4>Action</h4><input type="text" name="step" class="form-control" id="step"/>
  <h4>Action Description</h4>
    <textarea name="reason" id="reason" rows="3" cols="73"></textarea><br>
  <h4>Image</h4>
  <input type="file" accept="image/png, image/jpeg, image/gif" name="message" id="message" onchange="readURL(this);"/><br>
  <input type="button" value="Add" id="submit" name="submit" class="btn btn-success btn-xl" title="Click on this button to add the action">
      <a class="btn btn-primary btn-xl" href="<?php echo site_url('task/gotomethodlist/?taskid=' . $row->taskid.'') ?>" role="button" title="You can go back to get the next alternative for the task and add the action sequence">Go back</a>

</div>
</div>


  <ul id="comment"></ul>

<div id="fadeout">
  <ul id="responds">

  <?php
  foreach($records as $row){
  ?>


<li id="item_<?php echo $row->stepid;?>">

<div id="img_div">
    <input style="font-weight: bold;" type='radio' id='sstepid' name='sstepid' value='<?php echo $row->stepid;?>' required>
  <div class="del_wrapper">
                  <a href="#" class="del_button" id="del-<?php echo $row->stepid;?>">
                  <img style="height:14px;width:14px;" src="<?php echo base_url('uploads/delete-icon.png') ?>" alt="delete-icon" /></a>
  </div>
  <b><?php echo $row->stepname ?></b> <br>
    <i><?php echo $row->action_description ?></i> <br>
  <img id='img1' src="http://localhost/cognitivewalkthrough/uploads/<?php echo $row->image ?>"></div></li><br><br><br><br><br><br>


  </ul>
  <?php
}
  ?><br><br><div>
  <input type='submit' value='Next' id='next' name='next' class='btn btn-failure btn-xl' title='Please click on this button only when actions are available'>
</div></div>
</form>
  </div>
</div>
    <div class="col-lg-5">
 <div class="jumbotron">
<ul id="addingstep" style="overflow-y: scroll; height:800px;">
  <?php
  foreach ($steps as $row) {
  ?>

  <li id="item_<?php echo $row->stepid;?>">
    <div id="img1_div" style="width:60%;height: 280px;
    padding:0px;">
  <div class="add_wrapper">
  <a href="#" class="add_button" id="add-<?php echo $row->stepid;?>">
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
                            foreach ($altsteps as $row1) {
                            ?>
                            <li id="item_<?php echo $row1->altsubstepid;?>">
                              <div id="img1_div" style="width:60%;height: 280px;
                              padding:0px;">
                            <div class="add_wrapper">
                            <a href="#" class="add_button1" id="add-<?php echo $row1->altsubstepid;?>">
                            <img style="height:14px;width:14px;float: right;" src="<?php echo base_url('assets/images/add_icon.png') ?>" alt="add-icon" /></a>
                          </div>

                            <b><?php echo $row1->altsubstepname ?></b> <br>
                              <i><?php echo $row1->subaction_description ?></i><br>
                            <img id="getsteps" id='img1' style="float: left;
                                                      margin: 5px;
                                                      width: 450px;
                                                      height: 250px; "
                                                      src="http://localhost/cognitivewalkthrough/uploads/<?php echo $row1->altsubstepimage ?>"><br></div></li><br><br><br><br><br><br><br>
  <?php }
  ?></ul>
</div>
  </div>
</div>
<!-- </div> -->
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  </body>
</html>
<script>

$(document).ready(function(){

     $("#submit").click(function(){
       var name=$("#step").val();
   //   var message=$("#message").val();
       var methodfields = $('#methodfields').val();
       var reason = $('#reason').val();
       var formData = new FormData();

       formData.append('step',name);
       formData.append('reason',reason);
       formData.append('methodfields',methodfields);
       formData.append('message', $('#message')[0].files[0]);
       formData.append('action','addcomment');
       if((($('#message')[0].files[0])===undefined) || (reason==='') || (name=== '')){
         alert("please fill out all the fields and then try to add an action");
       }else{
           $.ajax({
               type:"post",
               url:"<?= base_url() ?>index.php/task/getstep/",
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
                //             url: "<?= base_url() ?>index.php/task/sortsteps/",
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

            $("reason").val('');
         }
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
       url: "<?= base_url() ?>index.php/task/deletestep/"+DbNumberID, //Where to make Ajax calls
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

// $(function() {
//       $("#responds").sortable({
//       					update : function () {
//       					serial = $('#responds').sortable('serialize'); // Encode a set of form elements as a string for submission. (see https://api.jquery.com/serialize/ for more info)
//       					$.ajax({
//       					  url: "<?= base_url() ?>index.php/task/sortsteps/",
//       					type: "post",
//       					data: serial,
//       					error: function(){
//       					alert("theres an error with AJAX");
//       					}
//       					});
//       					}
//       					});
//             });



     $("body").on("click", "#addingstep .add_button", function(e) {
       e.preventDefault();
       var clickedID = this.id.split('-'); //Split ID string (Split works as PHP explode)
       var DbNumberID = clickedID[1]; //and get number from array
       var myData = 'recordToAdd='+ DbNumberID; //build a post data structure


var methodfields = $('#methodfields').val();
 var methodData = 'methodToAdd='+ methodfields;
       jQuery.ajax({
       type: "POST", // HTTP method POST or GET
       url: "<?= base_url() ?>index.php/task/addstep/?&stepid="+DbNumberID+"&methodfields="+methodfields, //Where to make Ajax calls
       dataType:"text", // Data type, HTML, json etc.
       data:{myData,methodData}, //Form variables
       success:function(data){
         $("#comment").html(data);


           $("#fadeout").remove();


       },
       error:function (xhr, ajaxOptions, thrownError){
        //On error, we alert user
        alert(thrownError);
       }
       });


      });
      $("body").on("click", "#addingstep .add_button1", function(e) {
        e.preventDefault();
        var clickedID = this.id.split('-'); //Split ID string (Split works as PHP explode)
        var DbNumberID = clickedID[1]; //and get number from array
        var myData = 'recordToAdd='+ DbNumberID; //build a post data structure


   var methodfields = $('#methodfields').val();
   var methodData = 'methodToAdd='+ methodfields;
        jQuery.ajax({
        type: "POST", // HTTP method POST or GET
        url: "<?= base_url() ?>index.php/task/addstep1/?&stepid="+DbNumberID+"&methodfields="+methodfields, //Where to make Ajax calls
        dataType:"text", // Data type, HTML, json etc.
        data:{myData,methodData}, //Form variables
        success:function(data){
          $("#comment").html(data);

            $("#fadeout").remove();


        },
        error:function (xhr, ajaxOptions, thrownError){
         //On error, we alert user
         alert(thrownError);
        }
        });
       });

           $(".input-files").on("click", "#addnewsub", function(e) {
             var name=$("#sstepid").val();
             console.log(name,'name');
             formData.append('sub',name);
               formData.append('action','next');
                 $.ajax({
                     type:"post",
                     url:"<?= base_url() ?>index.php/task/gotonext/",
                     data:formData,
                     processData: false,
           contentType:  false,
                       success:function(response){
                   }
                 });
   });

// var e = document.getElementById('parent');
// e.onmouseover = function() {
//   document.getElementById('popup').style.display = 'block';
// }
// e.onmouseout = function() {
//   document.getElementById('popup').style.display = 'none';
// }



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

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

.popbox {
    display: none;
    position: absolute;
    z-index: 99999;
    width: 400px;
    padding: 10px;
    background: #EEEFEB;
    color: #000000;
    border: 1px solid #4D4F53;
    margin: 0px;
    -webkit-box-shadow: 0px 0px 5px 0px rgba(164, 164, 164, 1);
    box-shadow: 0px 0px 5px 0px rgba(164, 164, 164, 1);
}
label{
    height:17px;
    color:red;
      font-size:small;
}
</style>


  </head>
  <body>
<button onclick="topFunction()" id="myBtn" title="Go to top">Top <b>&uarr;</b></button>
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

          <h3 style="color:blue">Beginning with Cognitive Walkthrough evaluation process</h3>
 <!-- <div class="jumbotron"> -->

      <div class="row">
        <div class="col-md-4"></div>

          <!-- <div class="panel panel-default"> -->

<!-- This page would consist of the methods that were created as links so that the user can click on this to create
create method in the next page
-->
<!-- <form method='post' id="theform"> -->
              <?php
              echo form_open('variants/cwperform/','class="myclass" id="myform"');
              ?>

  <input type="hidden" name="adminid" id="adminid" value="<?php echo $adminid; ?>"/><br>
<input type='hidden' id='timestamp' value='<?php echo $timestamp ?>' name='timestamp'/>
               <!-- <div class="form-group">
                  <input type="hidden" name="personaid" value="<?php /*echo $row->taskid; */?>" class="form-control" />
                </div> -->



                                <?php
                                foreach ($persona as $row4) {
                                 ?>
                <div>
                  <div id="pop1" class="popbox">
                    <IMG STYLE="position:absolute; LEFT:300px; WIDTH:70px; HEIGHT:70px" SRC="http://localhost/cognitivewalkthrough/uploads/<?php echo $row4->profile_picture ?>">

                                                          <p>  Firstname:</p>  <?php echo $row4->firstname; ?><br>
                                                            <p>    Lastname:</p> <?php echo $row4->lastname; ?><br>
                                                            <p>    Age:</p> <?php echo $row4->age; ?><br>
                                                            <p>  Interests:</p>  <?php echo $row4->interests; ?><br>
                                                            <p>  Hobby:</p>    <?php echo $row4->hobby; ?><br>
                                                            <p>  Aim:</p>    <?php echo $row4->aim; ?><br>
                                                            <p>  Qualification:</p>    <?php echo $row4->qualification; ?><br>
                                                          <p>    Occupation:</p>    <?php echo $row4->occupation; ?><br>
                                                          <p>    Browsers used:</p>    <?php echo $row4->browsers_used; ?><br>
                                                          <p>    Gadgets owned:</p>    <?php echo $row4->gadgets_owned; ?><br>
                                                          <p>      Description:</p>  <?php echo $row4->description; ?><br>
                </div>
                <br>
                                  <h4>Persona:</h4><a href="#" class="popper" data-popbox="pop1">
                                    <?php echo $row4->firstname; ?>
                                   <?php echo $row4->lastname; ?></a>
                               <input type="hidden" name="personaid" id="personaid" value="<?php echo $row4->personaid; ?>"/>
                               <input type="hidden" name="personaname" id="personaname" value="<?php echo $row4->firstname; ?>"/>

                </div><?php } ?>
<div>
  <h4>Variants:</h4>
              <?php
              foreach($variants as $row3)
              {?>
                   <div class="form-group">

                <h4>  <input type="radio" name="variants" checked="true" id="variants" value="<?php echo $row3->variantid ?>" hidden=""/><p><?php echo $row3->variantname ?></p></h4><br/>
                  <input type="hidden" name="variantname" checked="true" id="variantname" value="<?php echo $row3->variantname ?>"/><br/>

             <?php }

              ?>
</div>
<div>

  <?php
  foreach($task as $row3)
  {?>
   <h4>Task Name:</h4>
                        <input type="radio" name="taskid" checked="true" id="taskid" value="<?php echo $row3->taskid; ?>" hidden/><p><?php echo $row3->taskname; ?></p>
                        <input type="hidden" name="taskid" checked="true" id="taskid" value="<?php echo $row3->taskid; ?>"/><br>
                          <input type="hidden" name="taskname" checked="true" id="taskname" value="<?php echo $row3->taskname; ?>"/><br>
  <h4>Start Image:</h4><br>
   <div id='img_div'>
     <?php foreach ($records as $row5) {?>

                            <h3><?php echo $row5->action; ?></h3>
                            <input type="hidden" name="home" id="home" value="<?php echo $row5->action; ?>"/><br>
     <?php break;}?>
  <img id="startimage" src="http://localhost/cognitivewalkthrough/uploads/<?php echo $row3->Startimage ?>"><br></div><br>
                            <input type="hidden" name="nextstepimage" id="nextstepimage" value="<?php echo $row3->Startimage; ?>" />

</div>
                            <!-- <input type="hidden" name="methodid" checked="true" id="methodid" value="<?php// echo $row->methodid; ?>"/><br> -->
              <?php } ?>
<div style='position: relative; display: inline-block;' id="getstep">
                  <h4>Alternatives:</h4>

                  <select class='form-control' name='method' id='method' required>
                      <option value=''>Select</option>
                      <?php foreach ($records as $row1) {
                        # code..
                      echo "<option value='$row1->methodid'>$row1->methodname</option>"; }
                        ?>
                        <option value='None of the above'>None of the above</option>
                      <!-- <input type="hidden" name="methodname" id="methodname" value="<?php //echo $row1->methodname; ?>" /> -->
                                        </select>
                      <h4>Description:</h4>
                      <textarea name='desc' id='desc' rows='3' cols='73' disabled><?php echo $row1->description?></textarea><br>
              <!-- <?php //foreach ($records as $row1) {
                # code...?>
  <div class='radio'>
               <input type="radio" name="method" id="method" value="<?php //echo $row1->methodid; ?>" required/><p><?php //echo $row1->methodname; ?></p>
               <input type="hidden" name="methodname" id="methodname" value="<?php //echo $row1->methodname; ?>" />
               <input type="hidden" name="nextstepid" id="nextstepid" value="<?php //echo $row1->methodid; ?>" />
               <input type="hidden" name="nextstepname" id="nextstepname" value="<?php //echo $row1->methodname; ?>" />


            </div>  <?php //}
              ?>--></div>
              <div id='removebuttons'>
              <?php
            foreach($questions as $each){
            ?><br><br>
            <h4>Question</h4><input type="text" name="questions[]" class='form-control' id="questions" style='font-weight:bold;background-color:#F0FFFF' value="<?php echo $each->questionname; ?>" disabled/>
            <input type="hidden" name="questionid[]" id="questionsid" value="<?php echo $each->questionid; ?>"/>
            <input type="hidden" name="questionname[]" id="questionsname" value="<?php echo $each->questionname; ?>"/>

            <!-- <input type="text" class="form-control" name="questions<?php //echo 'text' . $row->questionid; ?>" style="font-weight:bold;width:100%;background-color:#F0FFFF" id="questions<?php// echo $row->questionid; ?>" value="<?php //echo $row->questionname; ?>" disabled/><br> -->
            <h4>Add question</h4>
            <input type="text" class="form-control" name="newquestion[]" id="new_questions<?php echo $each->questionid; ?>" />
            <h4>Answer:</h4>  <select class="form-control" name="answer[]" id="answer" required>
            <option value="">Select</option>
            <option value="no">no</option>
            <option value="probably no">probably no</option>
            <option value="unknown">unknown</option>
            <option value="probably yes">probably yes</option>
            <option value="yes">yes</option></select>

            <h4>Credible Story</h4><textarea name="question1_text[]" id="description" rows="3" cols="73" required></textarea><br>
            <?php
            }
            ?></div>

<ul id='getimage'>
</ul>
<div id='stepremove'>
            <div style='position: relative; display: inline-block;' id='getstep'>
              <h4> Give overall appropriate rating based on the current action and the feedback if it was a success or not</h4>
                          <span style='color:#009933;' title="Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action.Starting from the rating close to Failure(Left to right)\n
                          Rating 1:'Completely likely' for the user to go wrong at a particular action\n
                          Rating 2: 'Very likely' for the user to go wrong at a particular action\n
                          Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
                          Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
                          Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n">Information about the rating(i)</span>

                          <br>  <label class="radio-inline"></label><b>Failure</b> <input type="radio" name="rating" id="rating1" value="1" reuired/>  <input type="radio" name="rating" id="rating2" value="2" required/>
                             <input type="radio" name="rating" id="rating3" value="3" required/>  <input type="radio" name="rating" id="rating4" value="4" required/>
                            <input type="radio" name="rating" id="rating5" value="5" required/> <b>Success</b> <label class="radio-inline"></label><br><br>

                        <h3> Reasons?</h3>
                        <textarea name="reason" id="reason" rows="3" cols="73" required></textarea><br>


              <!-- <input type="radio" name="variants" id="novariant" value="novariant"/>None<br/> -->

<br><br>
  <input type='button' value='Save' class='save btn btn-primary btn-md' id='save' />

               <input type='submit' value='Next' class='del_button btn btn-danger btn-md' id='nextstep' />
                  <a href="<?php echo site_url('variants/resultsview/').$timestamp; ?>"><input type="button" class='btn btn-info btn-md' value="End evaluation" /></a>
              <?php echo form_close() ?>
        <!-- </div> --></div></div>
        <div class="col-md-4"></div>
      </div>

      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.validate.js') ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  </body>
</html>

<script>
$(document).ready(function(){

// $('form').on('submit', function (e) {
//
//           e.preventDefault();
//              $.ajax({
//                   type:"POST",
//                   url:"<?= base_url() ?>index.php/variants/cwperform/",
//                   data:$('#theform').serialize(),
//
//                     success:function(response){
//
//                                       alert('Saved successfully');
//
//                }
//               });
//         });
$(document).on('change','#method',function(){
  //  alert('Change Happened');
    var formData = new FormData();
var timestamp = $('#timestamp').val();
 var variants =$('#variants').val();
 var taskid =$('#taskid').val();
 var personaid =$('#personaid').val();
        var methodid = $(this).val();
  var home = $('#home').val();
console.log(methodid,'methodid');
//     console.log(chosen_altmethod,'chosen_altmethod');
//   formData.append('chosen_altmethod',chosen_altmethod);
formData.append('methodid',methodid);
formData.append('timestamp',timestamp);
formData.append('variants',variants);
formData.append('taskid',taskid);
formData.append('personaid',personaid);
formData.append('home',home);

    $.ajax({
         type: 'POST',
    url: "<?= base_url() ?>index.php/variants/getnextstepimage1/",
     data: formData,
    processData: false,
contentType: false,
    success: function(msg){
          $("#removebuttons").remove();
          $("#stepremove").remove();
    $("#getimage").html(msg);

}
});
});

$("#myform").validate({
rules: {
"answer[]": "required",
method : "required",
"question1_text[]" : "required",
reason: "required",
rating : "required",
},
messages: {
answer: "Please select category",
method : "Please choose an alternative",
"question1_text[]" : "Please write a credible story",
reason: "Please write your reason for the rating",
"rating" : "Please give a rating",
},
errorPlacement: function(label, element) {

       label.insertAfter(element);
   },

});
        $(document).on("click", '#save', function(e) {
 e.preventDefault();

  //  $('form.myform').validate();
 //var method=$('#method').val();
// var desc = $('#reason').val();
 //var answer =  $("input[name*='answer']").val();
//var rating =  $("input[name*='rating']").val();
//for ( var i = 0; i < fCode.length; i++ ){
  //      if ( fCode[i].value == "" ) {
    //        alert("Please answer all the questions");
      //      fCode[i].focus();
        //    return false;
        //}
    //}
  //var answer = $('#answer').val();
 //if(desc==='' || method==='' || rating ==='' || answer ===''){
// alert('Please fill out all the fields and then save. Make sure that you have chosen an alternative and performed the evaluation');
 //}else{
   if($("#myform").valid()){
                $.ajax({
                     type: 'POST',
                    url: "<?= base_url() ?>index.php/variants/performdatafirststep/",
                     data:$('form').serialize(),

                     success: function (data) {

            alert('Saved successfully');
            $("#save").prop('disabled', true);
                     }
                 });
//}
             }
             else{
               alert('Please make sure to enter all the details');
             }
           });
         $('#new_question').on('keyup', function() {
         $('.'+$(this).attr('id')).val($(this).val());
     });
     var moveLeft = 0;
     var moveDown = 0;
     $('a.popper').hover(function (e) {

         var target = '#' + ($(this).attr('data-popbox'));
         $(target).show();
         moveLeft = $(this).outerWidth();
         moveDown = ($(target).outerHeight() / 2);
     }, function () {
         var target = '#' + ($(this).attr('data-popbox'));
         if (!($("a.popper").hasClass("show"))) {
             $(target).hide();
         }
     });
     $('a.popper').mousemove(function (e) {
         var target = '#' + ($(this).attr('data-popbox'));

         leftD = e.pageX + parseInt(moveLeft);
         maxRight = leftD + $(target).outerWidth();
         windowLeft = $(window).width() - 40;
         windowRight = 0;
         maxLeft = e.pageX - (parseInt(moveLeft) + $(target).outerWidth() + 20);

         if (maxRight > windowLeft && maxLeft > windowRight) {
             leftD = maxLeft;
         }

         topD = e.pageY - parseInt(moveDown);
         maxBottom = parseInt(e.pageY + parseInt(moveDown) + 20);
         windowBottom = parseInt(parseInt($(document).scrollTop()) + parseInt($(window).height()));
         maxTop = topD;
         windowTop = parseInt($(document).scrollTop());
         if (maxBottom > windowBottom) {
             topD = windowBottom - $(target).outerHeight() - 20;
         } else if (maxTop < windowTop) {
             topD = windowTop + 20;
         }

         $(target).css('top', topD).css('left', leftD);
     });



 });

   window.onscroll = function() {scrollFunction()};

   function scrollFunction() {
       if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
           document.getElementById("myBtn").style.display = "block";
       } else {
           document.getElementById("myBtn").style.display = "none";
       }
   }

   // When the user clicks on the button, scroll to the top of the document
   function topFunction() {
       document.body.scrollTop = 0;
       document.documentElement.scrollTop = 0;
   }

</script>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View the list questions</title>

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
</style>


  </head>
  <body>
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top <b>&uarr;</b></button>
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
          <h3 style="color:blue">Perform evaluation</h3>
 <!-- <div class="jumbotron"> -->

      <div class="row">
        <div class="col-md-4"></div>


              <form method='post' id="theform">

                <input type="hidden" name="adminid" id="adminid" value="<?php echo $adminid; ?>"/><br>
                <input type='hidden' value='<?php echo $timestamp ?>' name='timestamp' id='timestamp'/>

                <?php
                foreach ($persona as $row) {

                 ?>
<div>
  <div id="pop1" class="popbox">
                                          <b>  Firstname:</b>  <?php echo $row->firstname; ?><br>
                                            <b>    Lastname:</b> <?php echo $row->lastname; ?><br>
                                            <b>    Age:</b> <?php echo $row->age; ?><br>
                                            <b>  Interests:</b>  <?php echo $row->interests; ?><br>
                                            <b>  Hobby:</b>    <?php echo $row->hobby; ?><br>
                                            <b>  Aim:</b>    <?php echo $row->aim; ?><br>
                                            <b>  Qualification:</b>    <?php echo $row->qualification; ?><br>
                                          <b>    Occupation:</b>    <?php echo $row->occupation; ?><br>
                                          <b>    Browsers used:</b>    <?php echo $row->browsers_used; ?><br>
                                          <b>    Gadgets owned:</b>    <?php echo $row->gadgets_owned; ?><br>
                                          <b>      Description:</b>  <?php echo $row->description; ?><br>
</div>
<br>
                  <h3>Persona:</h3><a href="#" class="popper" data-popbox="pop1">
                    <?php echo $row->firstname; ?>
                   <?php echo $row->lastname; ?></a>
               <input type="hidden" name="personaid" id="personaid" value="<?php echo $row->personaid; ?>"/>
               <input type="hidden" name="personaname" id="personaname" value="<?php echo $row->firstname; ?>"/>


</div><?php } ?>

<div>
  <h3>Task Name:</h3>
   <?php foreach($task as $row){ ?>
    <input type="radio" name="taskid" checked="true" id="taskid" value="<?php echo $row->taskid; ?>"/><?php echo $row->taskname; ?>
    <input type="hidden" name="taskname" checked="true" id="taskname" value="<?php echo $row->taskname; ?>"/>

<?php }  ?>
</div>

              <div>
                  <h3>Alternative:</h3>
              <?php foreach ($records as $row1) {
                # code...?>


               <input type="radio" name="method" checked="true" id="method" value="<?php echo $row1->methodid; ?>"/><?php echo $row1->methodname; ?><br>
               <input type="hidden" name="methodname" checked="true" id="methodname" value="<?php echo $row1->methodname; ?>"/>

              <?php }
              ?></div>

              <h3>Variants:</h3>

                                       <?php
                          foreach($variants as $row)
                          {?>
                               <div class="form-group">

                              <input type="radio" name="variants" checked="true" id="variants" value="<?php echo $row->variantid ?>"/><?php echo $row->variantname ?><br/>
                              <input type="hidden" name="variantname" checked="true" id="variantname" value="<?php echo $row->variantname ?>"/><br/>


                         <?php }

                          ?>
<ul id="replacelist">
</ul>
<div style='position:absolute;padding: 5px;' id="steplist">
  <div>
<?php
foreach ($substeps1 as $row) {
             ?>
             <div id="stepslists_<?php echo $row->stepid;?>" value='<?php echo $row->stepid;?>' class='quest'>

               <div id='img_div'>
                 <h2 id="stepslist_<?php echo $row->stepid;?>" class="step"><?php echo $row->stepname;?></h2>
<br>

      <img src='http://localhost/cognitivewalkthrough/uploads/<?php echo $row->image; ?>'>
</div>

   </div>
  <?php

  }
  ?>


</div>

<?php
//}
?>
<br><br>
<br>
<br>
<br>
<div style='position: relative; display: inline-block;' id="getstep">
  <h4>Description:</h4>
  <textarea name='desc' id='desc' rows='3' cols='73' disabled><?php echo $row->action_description?></textarea><br>

  <input type='hidden' name='alternativelistid' id='alternativelistid' value='<?php echo $row->stepid; ?>' />
  <h3>View Alternatives:</h3><input type='button' value='View alternatives' style='padding: 0px;' class='alternatives btn btn-success btn-lg form-control' id='alternativelist' />
  <ul id="alternatedrop">
  </ul>
<input type='hidden' name='nextstepid' id='nextsteplistid' value='<?php echo $row->stepid; ?>' />
<input type='hidden' name='nextstepname' id='nextsteplistname' value='<?php echo $row->stepname; ?>' />
<input type='hidden' name='nextstepimage' id='nextsteplistimage' value='<?php echo $row->image; ?>' />
</div>
<div id='removenextaction'>
<h3>Feedback upon performing the current action</h3><input type='button' value='Next Action' style='padding: 0px;' class='nextsteplist btn btn-success btn-lg form-control' id='nextsteplist' />
<ul id="stepdrop">
</ul>
</div>

<ul id='getimage'>
</ul><div id='removeaction'>
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

<h4> Reasons?</h4>
  <textarea name="reason" id="reason" rows="3" cols="73" required></textarea><br>
</div><br><br><br>
 <div style='position: relative; display: inline-block;' id='getstep'>

              <input type='submit' value='Save' class='save btn btn-primary' id='save' />

                   <input type='button' value='Next' class='del_button btn btn-danger' id='nextstep' />
                   <a href="<?php echo site_url('variants/resultsview/').$timestamp; ?>"><input type="button" class='btn btn-info btn-md' value="End evaluation" /></a>
</div>
                 </div>

        <div class="col-md-4"></div>
      </div>
</div>
      </div>
   </div>
  </form>
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  </body>
</html>
<script>
$(document).ready(function(){

$('form').on('submit', function (e) {

          e.preventDefault();
             $.ajax({
                  type:"POST",
                  url:"<?= base_url() ?>index.php/task/performfornone",
                  data:$('#theform').serialize(),

                    success:function(response){

                alert('Data saved successfully');
                $("#save").prop('disabled', true);
//$("#save").prop('disabled', true);
               }
              });
        });
$(document).on("click", '#nextstep', function(e) {

      e.preventDefault();
      var timestamp = $('#timestamp').val();
      console.log(timestamp,'timestamp');
  var taskid = $('#taskid').val();
  console.log(taskid,'taskid');
     var methodid = $('#method').val(); //and get number from array
   var stepname = $('#stepsid').val(); //and get number from array
   console.log(stepname,"stepname");
   var chosen_altmethod = $('#chosen_altmethod').val();
   var altmethod = $('#altmethodname').val();
   var stepsname = $('#stepsname').val();
   console.log(stepsname,"stepsname");
   console.log(altmethod,"altmethod");
    var variantid = $('#variants').val();
    var timestamp = $('#timestamp').val();
  var formData = new FormData();
  formData.append('timestamp',timestamp);
  formData.append('taskid',taskid);
  formData.append('methodid',methodid);
  formData.append('stepname',stepname);
  formData.append('stepsname',stepsname);
  formData.append('altmethod',altmethod);
  formData.append('variantid',variantid);
  formData.append('chosen_altmethod',chosen_altmethod);
  formData.append('timestamp',timestamp);
   formData.append('action','nextstep');

  console.log(stepname, "stepname");
  console.log(methodid, "methodid");
  console.log(altmethod, "altmethod");
  console.log(variantid, "variantid");
  console.log(chosen_altmethod,"chosen_altmethod");

  if((stepname===undefined) && (altmethod===undefined) && (stepsname=== undefined)){
    alert("please check the feedback page upon clicking on the button Feedback page or end the evaluation of action sequence by clicking on End Evaluation");
  }else{
          $.ajax({
               type: 'POST',
              url: "<?= base_url() ?>index.php/variants/fetchstep/",
               data: formData,
               processData: false,
        contentType: false,
               success: function (data) {

     $("#steplist").remove();

   $("#replacelist").html(data);
     $('html, body').animate({ scrollTop: 0 }, 0);
               }
           });
  }
       });


       $(document).on('change','#altmethodname',function(){
//alert('Change Happened');


           var formData = new FormData();

               var stepid = $(this).val();
               var timestamp = $('#timestamp').val();
               var nextstepname = $('#nextsteplistname').val();
               console.log(timestamp,'timestamp');
               console.log(nextstepname,'nextstepname');
       var chosen_altmethod = $('#method').val();
       console.log(stepid,'stepid');
       console.log(chosen_altmethod,'chosen_altmethod');
        formData.append('nextstepname',nextstepname);
       formData.append('chosen_altmethod',chosen_altmethod);
        formData.append('timestamp',timestamp);
       formData.append('stepid',stepid);
           $.ajax({
                type: 'POST',
           url: "<?= base_url() ?>index.php/variants/getaltstepimage/",
            data: formData,
           processData: false,
       contentType: false,
           success: function(msg){
             $("#removenextaction").remove();
             $("#removeaction").remove();
       $("#getimage").html(msg);
       }
       });
       });
$(document).on("click", '#nextsteplist', function(e) {
       e.preventDefault();
       //alert('success');
      var methodid = $('#method').val(); //and get number from array
var chosen_altmethod = $('#chosen_altmethod').val();
      var DbnumberID2 = $('#nextsteplistid').val(); //and get number from array
       console.log(DbnumberID2, "DbnumberID2");
          var DbnumberID = parseInt(DbnumberID2);
           console.log(DbnumberID, "DbnumberID");
      var  stepid= DbnumberID+1;
      var variantid = $('#variants').val();
    var formData = new FormData();
    formData.append('methodid',methodid);
    formData.append('stepid',stepid);
formData.append('chosen_altmethod',chosen_altmethod);
     formData.append('action','nextsteplist');
       console.log(DbnumberID2, "DbnumberID2");
    console.log(stepid, "stepid");
    console.log(methodid, "methodid");
console.log(chosen_altmethod,"chosen_altmethod");

            $.ajax({
                type: 'POST',
               url: "<?= base_url() ?>index.php/variants/fetchnextstep/",
                data: formData,
                processData: false,
        contentType: false,
                success: function (data) {
                  $("#stepdrop").html(data);
      $("#nextsteplist").remove();
                }
            });

        });

$(document).on("click", '#alternativelist', function(e) {

          e.preventDefault();
      //    alert('success');
         var methodid = $('#chosen_altmethod').val(); //and get number from array

       var stepid = $('#alternativelistid').val(); //and get number from array
         var variantid = $('#variants').val();
       var formData = new FormData();
       formData.append('methodid',methodid);
       formData.append('stepid',stepid);

        formData.append('action','getalternatives');
       console.log(stepid, "stepid");
       console.log(methodid, "methodid");


              $.ajax({
                   type: 'POST',
                  url: "<?= base_url() ?>index.php/variants/fetchalternatives/?&stepid="+stepid+"&methodid="+methodid,
                  data:$("#theform").serialize(),

                   success: function (data) {
                     $("#alternatedrop").html(data);
         $("#alternativelist").remove();

                   }
               });

           });

           $(document).on('change','#noneoftheabove',function(){
        //alert('Change Happened');
        var formData = new FormData();

            var stepid = $(this).val();
            var timestamp = $('#timestamp').val();
            console.log(timestamp,'timestamp');
    var chosen_altmethod = $('#method').val();
    console.log(stepid,'stepid');
    console.log(chosen_altmethod,'chosen_altmethod');
    formData.append('chosen_altmethod',chosen_altmethod);
     formData.append('timestamp',timestamp);
     var nextstepname = $('#nextsteplistname').val();
      var variantid = $('#variants').val();
      formData.append('variantid',variantid);
    formData.append('stepid',stepid);
    formData.append('nextstepname',nextstepname);
           if( $(this).is(":checked")) {
               $.ajax({
                    type: 'POST',
                    url: "<?= base_url() ?>index.php/variants/removenextaction/?&timestamp="+timestamp+"&nextstepname="+nextstepname+"&stepid="+stepid,
                  data:$("#theform").serialize(),
               success: function(msg){

                $("#stepremove").remove();
                  $("#removenextaction").remove();
                    $("#removestep").remove();
               $("#getimage").html(msg);

           }
           });
           }else{
           $.ajax({
                type: 'POST',
           url: "<?= base_url() ?>index.php/variants/getnextaction/",
            data: formData,
           processData: false,
       contentType: false,
           success: function(msg){
                 $("#removenextaction").remove();
                 $("#removeaction").remove();
           $("#getimage").html(msg);

       }
       });
         }
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

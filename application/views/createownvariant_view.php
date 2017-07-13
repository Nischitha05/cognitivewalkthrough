<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CW variant</title>


    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>



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
             <h3 style="color:blue">Please create your own variant</h3>
              <!-- <div class="jumbotron">
               <div class="row"> -->
        <div class="col-lg-10"></div>
        <!-- <div class="col-lg-10">
          <div class="panel panel-default">
            <div class="panel-body"> -->

              <?php
               echo form_open('variants/createvariant','class="myclass"');
              ?>
<div id="dynamic_field">
 <p>
            <label for="variantname"><h4>Variant Name:</h4></label>
            <input name="variantname" style="width: 500px;" id="variantName" value="" type="text" required/>
        </p>

  <div class="input-files">
    <fieldset>
        <legend><h4>Questions</h4></legend>

        <p>
            <label for="step">Q</label>
            <input name="question[]" value="" type="text" style="width: 600px;"/>
        </p>



        <p><a href="#" id="add_more" class='btn btn-success addsection'>Add next question</a></p>

    </fieldset>
  </div>
</div>
<?php echo form_submit('save', 'Save', 'class="btn btn-primary"') ?>


 <?php echo form_close() ?>


                     <!-- </form>   -->

            </div>
          </div>
        </div>
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

 $(document).ready(function(){
	var id = 1;
	$("#add_more").click(function(){
		var showId = ++id;

			$(".input-files").append('<div id="div'+showId+'"><fieldset><p><label for="step">Q</label><input name="question[]" value="" type="text" style="width: 600px;"/></p><p><a href="#" id="'+showId+'" class="btn btn-danger btn_remove">Remove question</a></p></fieldset></div>');

	});
	  $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#div'+button_id+'').remove();
      });

});
 //define template
/*var template = $('#sections .section:first').clone();

//define counter
var sectionsCount = 1;

//add new section
$('body').on('click', '.addsection', function() {

    //increment
    sectionsCount++;

    //loop through each input
    var section = template.clone().find(':input').each(function(){

        //set id to store the updated section number
        var newId = this.id + sectionsCount;

        //update for label
        $(this).prev().attr('for', newId);

        //update id
        this.id = newId;

    }).end()

    //inject new section
    .appendTo('#sections');
    return false;
});

//remove section
$('#sections').on('click', '.remove', function() {
    //fade out section
    $(this).parent().fadeOut(300, function(){
        //remove parent element (main section)
        $(this).parent().parent().empty();
        return false;
    });
    return false;
});

function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(300)
                        .height(300);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }*/
 </script>

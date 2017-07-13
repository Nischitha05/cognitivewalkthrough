<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Results obtained</title>

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



.skills {
  text-align: right;
  padding-right: 20px;
  line-height: 10px;
  width: 20px;
  color: white;
}

.a1 {background-color: #72FE95;}
.a2 {background-color: #9999FF;}
.a3 {background-color: #FF8A8A;}
.a4 {background-color: #808080;}
.a5 {background-color: #FFF06A;}
</style>


  </head>

  <?php if($variantname!="None") {?>
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


<?php
$conn= mysqli_connect("localhost","root","","cognitivewalkthrough");

$result = mysqli_query($conn,"select * from perform where timest=$timestamp LIMIT 1");

$result1 = mysqli_query($conn,"select * from perform where timest=$timestamp");

$result2 = mysqli_query($conn,"select adminid,timest,personaid,personaname,taskid,taskname,methodid,methodname,variantid,variantname,GROUP_CONCAT(stepid),stepname,stepimage,question,questionname,answer,description,added_question,rating,reasons,average,sessionid from perform where timest=$timestamp group by stepid");


                //echo $timestamp;
                       ?>


    <div class="container"  >
          <h3 style="color:blue">Overall result of the performed cognitive walkthrough as per tasks and variants</h3>


      <div class="row">
        <div class="col-md-4">

              <form method='post' id="theform">
<div>


   <?php foreach ($result as $results) {
     # code...
  //  }($row= mysqli_fetch_array($result)){ ?>
     <h4>Persona:</h4>  <input type="hidden" name="taskid" checked="true" id="taskid" value="<?php echo $results['personaid']; ?>"/><p><?php echo $results['personaname']; ?></p>

  <h4>Task Name:</h4>  <input type="hidden" name="taskid" checked="true" id="taskid" value="<?php echo $results['taskid']; ?>"/><p><?php echo $results['taskname']; ?></p>
     <input type="hidden" name="taskname" checked="true" id="taskname" value="<?php echo $results['taskname']; ?>"/>
  <h4>Variants:</h4><br>  <input type="hidden" name="variants" checked="true" id="variants" value="<?php echo $results['variantid'] ?>"/><p><?php echo $results['variantname'] ?></p>
<?php }  ?>
</div>


</div>
<div class="col-md-4 span6 offset3">
  <span style='color:#009933;' title="Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action.Starting from the rating close to Failure(Left to right)\n
  Rating 1:'Completely likely' for the user to go wrong at a particular action\n
  Rating 2: 'Very likely' for the user to go wrong at a particular action\n
  Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
  Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
  Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n">How likely is it for the user to go wrong at a particular action?</span>
<p>Rating 1 <span class='skills a3'></span>Completely likely</p>
<p>Rating 2 <span class='skills a4'></span>Very likely</p>
<p>Rating 3 <span class='skills a5'></span>Moderately likely</p>
<p>Rating 4 <span class='skills a2'></span>Slightly likely</p>
<p>Rating 5 <span class='skills a1'></span>Not at all likely</p>
</div>
        <table class="table" border="1">
        <thead>
      <tr>

        <th>Question</th>
        <th>Answer</th>
        <th>Credible Story</th>
        <th>Page</th>
                <th>Action </th>
        <th>Rating </th>
        <th>Reason</th>
        <!-- <th>Average</th> -->
        <th>No. of times this action was rated</th>


        </tr>
        </thead>
        <tbody>
          <?php
          foreach($result1 as $row)
          {
              ?>
              <tr>
                <?php if($row['rating'] == '1'){?>
                    <tr class='a3'>

              <td><?php echo $row['questionname']; ?></td>
              <td><?php echo $row['answer']; ?></td>
              <td><?php echo $row['description']; ?></td>
              <?php if($row['average']>0){ ?>
                <td><?php echo $row['methodname']; ?></td>
<td><?php echo $row['stepname']; ?></td>
                <td><?php echo $row['rating']; ?></td>
                <td><?php echo $row['reasons']; ?></td>
              <!-- <td><?php //echo $row['average']; ?></td -->
                <?php } if($row['count']>0){?>
              <td ><?php echo $row['count']; ?> out of <?php echo $row['totalcount'];?></td><?php }?></tr>
            <?php }else if($row['rating'] == '2'){?>
                  <tr class='a4'>

                                <td><?php echo $row['questionname']; ?></td>
                                <td><?php echo $row['answer']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <?php if($row['average']>0){ ?>
                                  <td><?php echo $row['methodname']; ?></td>
                                <td><?php echo $row['stepname']; ?></td>
                                  <td><?php echo $row['rating']; ?></td>
                                  <td><?php echo $row['reasons']; ?></td>
                                <!-- <td><?php //echo $row['average']; ?></td> -->
                                <?php } if($row['count']>0){?>
                                <td ><?php echo $row['count']; ?> out of <?php echo $row['totalcount'];?></td><?php }?></tr>
                              <?php }else if($row['rating'] == '3'){?>
                                    <tr class='a5'>

                                                  <td><?php echo $row['questionname']; ?></td>
                                                  <td><?php echo $row['answer']; ?></td>
                                                  <td><?php echo $row['description']; ?></td>
                                                  <?php if($row['average']>0){ ?>
                                                    <td><?php echo $row['methodname']; ?></td>
                                                  <td><?php echo $row['stepname']; ?></td>
                                                    <td><?php echo $row['rating']; ?></td>
                                                    <td><?php echo $row['reasons']; ?></td>
                                                  <!-- <td><?php //echo $row['average']; ?></td> -->
                                                  <?php } if($row['count']>0){?>
                                                  <td ><?php echo $row['count']; ?> out of <?php echo $row['totalcount'];?></td><?php }?></tr>
                                                <?php }else if($row['rating'] == '4'){?>
                                                      <tr class='a2'>

                                                                    <td><?php echo $row['questionname']; ?></td>
                                                                    <td><?php echo $row['answer']; ?></td>
                                                                    <td><?php echo $row['description']; ?></td>
                                                                    <?php if($row['average']>0){ ?>
                                                                      <td><?php echo $row['methodname']; ?></td>
                                                                    <td><?php echo $row['stepname']; ?></td>
                                                                      <td><?php echo $row['rating']; ?></td>
                                                                      <td><?php echo $row['reasons']; ?></td>
                                                                    <!-- <td><?php //echo $row['average']; ?></td> -->
                                                                    <?php } if($row['count']>0){?>
                                                                    <td ><?php echo $row['count']; ?> out of <?php echo $row['totalcount'];?></td><?php }?></tr>
                                                                  <?php }else if($row['rating'] == '5'){?>
                                                                        <tr class='a1'>

                                                                                      <td><?php echo $row['questionname']; ?></td>
                                                                                      <td><?php echo $row['answer']; ?></td>
                                                                                      <td><?php echo $row['description']; ?></td>
                                                                                      <?php if($row['average']>0){ ?>
                                                                                        <td><?php echo $row['methodname']; ?></td>
                                                                                      <td><?php echo $row['stepname']; ?></td>
                                                                                        <td><?php echo $row['rating']; ?></td>
                                                                                        <td><?php echo $row['reasons']; ?></td>
                                                                                      <!-- <td><?php //echo $row['average']; ?></td> -->
                                                                                      <?php } if($row['count']>0){?>
                                                                                      <td ><?php echo $row['count']; ?> out of <?php echo $row['totalcount'];?></td><?php }?></tr>
                                                                                    <?php }?>

          <?php      }
          ?>
           </tbody>
           <table>

      <?php echo form_close() ?>
<!-- </div> -->

</div>


</div>


                                       </div>
        <div class="col-md-4"></div>


      </div>
    </div>
  </form>
      <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

</body><?php }else{?>

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


<?php
$conn= mysqli_connect("localhost","root","","cognitivewalkthrough");

$result = mysqli_query($conn,"select * from perform where timest=$timestamp LIMIT 1");

$result1 = mysqli_query($conn,"select * from perform where timest=$timestamp");

$result2 = mysqli_query($conn,"select adminid,timest,personaid,personaname,taskid,taskname,methodid,methodname,variantid,variantname,GROUP_CONCAT(stepid),stepname,stepimage,question,questionname,answer,description,added_question,rating,reasons,average,sessionid from perform where timest=$timestamp group by stepid");
                //echo $timestamp;
                       ?>


    <div class="container"  >
          <h3 style="color:blue">Overall result of the performed cognitive walkthrough as per tasks and variants</h3>


      <div class="row">
        <div class="col-md-4">

              <form method='post' id="theform">
<div>

   <?php foreach ($result as $results) {
     # code...
  //  }($row= mysqli_fetch_array($result)){ ?>
     <h4>Persona:</h4>  <input type="hidden" name="taskid" checked="true" id="taskid" value="<?php echo $results['personaid']; ?>"/><p><?php echo $results['personaname']; ?></p>

  <h4>Task Name:</h4>  <input type="hidden" name="taskid" checked="true" id="taskid" value="<?php echo $results['taskid']; ?>"/><p><?php echo $results['taskname']; ?></p>
     <input type="hidden" name="taskname" checked="true" id="taskname" value="<?php echo $results['taskname']; ?>"/>
  <h4>Variants:</h4> <input type="hidden" name="variants" checked="true" id="variants" value="<?php echo $results['variantid'] ?>"/><p><?php echo $results['variantname'] ?></p>
<?php }  ?>
</div>

</div>
<div class="col-md-4 span6 offset3">
  <span style='color:#009933;' title="Rating has been given on a scale of 1 to 5 to analyze the success or a failure story for a particular action.Starting from the rating close to Failure(Left to right)\n
  Rating 1:'Completely likely' for the user to go wrong at a particular action\n
  Rating 2: 'Very likely' for the user to go wrong at a particular action\n
  Rating 3: 'Moderately likely' for the user to go wrong at a particular action\n
  Rating 4: 'Slightly likely' for the user to go wrong at a particular action\n
  Rating 5: 'Not at all likely'  for the user to go wrong at a particular action\n">How likely is it for the user to go wrong at a particular action?</span>
  <p>Rating 1 <span class='skills a3'></span>Completely likely</p>
  <p>Rating 2 <span class='skills a4'></span>Very likely</p>
  <p>Rating 3 <span class='skills a5'></span>Moderately likely</p>
  <p>Rating 4 <span class='skills a2'></span>Slightly likely</p>
  <p>Rating 5 <span class='skills a1'></span>Not at all likely</p>
</div>
        <table class="table" border="1">
        <thead>
      <tr>
<th>Page</th>
        <th>Action </th>
        <th>Rating </th>
        <th>Reasons</th>
        <!-- <th>Average</th> -->
  <th>No. of times this action was rated</th>

        </tr>
        </thead>
        <tbody>
          <?php
          foreach($result1 as $row)
          {
              ?>

<?php if($row['rating'] == '1'){?>
    <tr class='a3'>
        <td><?php echo $row['methodname']; ?></td>
              <td><?php echo $row['stepname']; ?></td>
            <td><?php echo $row['rating']; ?></td>
                <td><?php echo $row['reasons']; ?></td>

                  <!-- <td><?php //echo $row['average']; ?></td> -->
                  <td ><?php echo $row['count']; ?> out of <?php echo $row['totalcount'];?></td></tr>
          <?php   } else if($row['rating'] == '2')  {?>
            <tr class='a4'>
                <td><?php echo $row['methodname']; ?></td>
                      <td><?php echo $row['stepname']; ?></td>
                    <td><?php echo $row['rating']; ?></td>
                        <td><?php echo $row['reasons']; ?></td>

                          <!-- <td><?php //echo $row['average']; ?></td> -->
                          <td ><?php echo $row['count']; ?> out of <?php echo $row['totalcount'];?></td></tr>
          <?php }else if($row['rating'] == '3'){?>
            <tr class='a5'>
                <td><?php echo $row['methodname']; ?></td>
                      <td><?php echo $row['stepname']; ?></td>
                    <td><?php echo $row['rating']; ?></td>
                        <td><?php echo $row['reasons']; ?></td>

                          <!-- <td><?php //echo $row['average']; ?></td> -->
                          <td ><?php echo $row['count']; ?> out of <?php echo $row['totalcount'];?></td></tr>
<?php } else if($row['rating'] == '4'){?>
  <tr class='a2'>
      <td><?php echo $row['methodname']; ?></td>
            <td><?php echo $row['stepname']; ?></td>
          <td><?php echo $row['rating']; ?></td>
              <td><?php echo $row['reasons']; ?></td>

                <!-- <td><?php //echo $row['average']; ?></td> -->
                <td ><?php echo $row['count']; ?> out of <?php echo $row['totalcount'];?></td></tr>
<?php } else if($row['rating'] == '5'){?>
  <tr class='a1'>
      <td><?php echo $row['methodname']; ?></td>
            <td><?php echo $row['stepname']; ?></td>
          <td><?php echo $row['rating']; ?></td>
              <td><?php echo $row['reasons']; ?></td>

                <!-- <td><?php //echo $row['average']; ?></td> -->
                <td ><?php echo $row['count']; ?> out of <?php echo $row['totalcount'];?></td></tr>
<?php } ?>
    <?php     }
          ?>
           </tbody>
           <table>

      <?php echo form_close() ?>
<!-- </div> -->

</div>


</div>


                                       </div>
        <div class="col-md-4"></div>


      </div>
    </div>
  </form>
      <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

</body>

<?php }  ?>
</html>

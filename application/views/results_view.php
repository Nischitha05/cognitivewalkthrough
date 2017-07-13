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


<?php
$conn= mysqli_connect("localhost","root","","cognitivewalkthrough");

$result = mysqli_query($conn,"select * from perform where timest=$timestamp LIMIT 1");

$result1 = mysqli_query($conn,"select * from perform where timest=$timestamp");

$result2 = mysqli_query($conn,"select adminid,timest,personaid,personaname,taskid,taskname,methodid,methodname,variantid,variantname,GROUP_CONCAT(stepid),stepname,stepimage,question,questionname,answer,description,added_question,rating,reasons,average,sessionid from perform where timest=$timestamp group by stepid");
                //echo $timestamp;
                       ?>


    <div class="container"  >
          <h3 style="color:blue">Results obtained</h3>
          <?php foreach ($result as $row) {
            # code...
          ?>
          <a href="<?php echo site_url('variants/gotomethodview/').$timestamp.'/'.$row['taskid'].'/'.$row['personaid'].'/'.$row['variantid']; ?>"><input type="button" class='btn btn-lg btn-danger' value="Get other alternatives" /></a>
          <a href="<?php echo site_url('variants/getoverview/').$row['taskid'].'/'.$timestamp; ?>"><input type="button" class='btn btn-lg btn-success' value="Task Overview" /></a>
          <a href="<?php echo base_url('index.php/home') ?>"><input type="button" class='btn btn-lg btn-warning' value="Finish" /></a>

       <?php }?>

      <div class="row">
        <div class="col-md-4"></div>

              <form method='post' id="theform">


<div>

   <?php foreach ($result as $results) {
     # code...
  //  }($row= mysqli_fetch_array($result)){ ?>
     <h4>Persona:</h4>  <input type="hidden" name="taskid" checked="true" id="taskid" value="<?php echo $results['personaid']; ?>"/><p><?php echo $results['personaname']; ?></p>

  <h4>Task Name:</h4>  <input type="hidden" name="taskid" checked="true" id="taskid" value="<?php echo $results['taskid']; ?>"/><p><?php echo $results['taskname']; ?></p>
     <input type="hidden" name="taskname" checked="true" id="taskname" value="<?php echo $results['taskname']; ?>"/>
  <h4>Method Name:</h4>   <input type="hidden" name="method" checked="true" id="method" value="<?php echo $results['methodid']; ?>"/><p><?php echo $results['methodname']; ?></p>
  <h4>Variants:</h4><br>  <input type="hidden" name="variants" checked="true" id="variants" value="<?php echo $results['variantid'] ?>"/><p><?php echo $results['variantname'] ?></p>

<?php }  ?>
</div>

                    <div id="steplist">



                       <?php //foreach ($result as $results) {
                    foreach ($result1 as $row1) {

                                 ?>
<div id='steps'>
   <h4>Alternative:<?php echo $row1['methodname'];?></h4>
                                   <div id='img_div'>
                                     <h4 class="step">Action:<?php echo $row1['stepname'];?></h4>
                    <br>

                          <img src='http://localhost/cognitivewalkthrough/uploads/<?php echo $row1['stepimage']; ?>'>
                    </div>
                    <?php
                  //}
                    //break;
                //  }
                    ?>
                            <br><br>
                          <input type="text" name="questions[]" class='form-control' id="questions" style='font-weight:bold;width:100%;background-color:#F0FFFF' value="<?php echo $row1['questionname']; ?>" disabled/>
                    <input type="hidden" name="questionid[]" id="questionsid" value="<?php echo $row1['question']; ?>"/>
                    <input type="hidden" name="questionname[]" id="questionsname" value="<?php echo $row1['questionname']; ?>"/>

                        <!-- <input type="text" class="form-control" name="questions<?php //echo 'text' . $row->questionid; ?>" style="font-weight:bold;width:100%;background-color:#F0FFFF" id="questions<?php// echo $row->questionid; ?>" value="<?php //echo $row->questionname; ?>" disabled/><br> -->
                        <h4>Added question:</h4>
                      <p>  <?php echo $row1['added_question']; ?></p>
                        <h4>Answer:</h4><p><?php echo $row1['answer'] ?></p>


                        <h4>Credible story:</h4><p><?php echo $row1['description']; ?></p>
                      <h4>Rating:</h4>
                      <p> <?php echo $row1['rating']; ?></p>
                      <h4>Reasons:</h4>
                        <p> <?php echo $row1['reasons']; ?></p>
                    <!--    <h4>Average:</h4><p><?php //echo $row1['average']; ?> that is <?php //echo $row1['count']; ?> out of <?php //echo $row1['totalcount']; ?> gave the rating as <?php //echo $row1['rating']; ?> for this step</p> -->
</div>

<hr class="colorgraph">
                      <?php
//}
                    //  }
                    //  break;
                    }
                      ?>
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
  <script>
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
</html>

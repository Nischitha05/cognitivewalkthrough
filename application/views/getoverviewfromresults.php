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
/*Now the CSS*/
* {margin: 0; padding: 0;}

.tree ul {
	padding-top: 20px; position: relative;

	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

.tree li {
	float: left; text-align: center;
	list-style-type: none;
	position: relative;
	padding: 20px 5px 0 5px;

	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before, .tree li::after{
	content: '';
	position: absolute; top: 0; right: 50%;
	border-top: 1px solid #ccc;
	width: 50%; height: 20px;
}
.tree li::after{
	right: auto; left: 50%;
	border-left: 1px solid #ccc;
}

/*We need to remove left-right connectors from elements without
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
	display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child{ padding-top: 0;}

/*Remove left connector from first child and
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
	border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before{
	border-right: 1px solid #ccc;
	border-radius: 0 5px 0 0;
	-webkit-border-radius: 0 5px 0 0;
	-moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
	border-radius: 5px 0 0 0;
	-webkit-border-radius: 5px 0 0 0;
	-moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul::before{
	content: '';
	position: absolute; top: 0; left: 50%;
	border-left: 1px solid #ccc;
	width: 0; height: 20px;
}

.tree li a{
	border: 1px solid #ccc;
	/*padding: 5px 10px;*/
	text-decoration: none;
	color: #666;
	/*font-family: arial, verdana, tahoma;*/
	font-size:10px;
	display: inline-block;
width:60px;
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;

	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li a:hover, .tree li a:hover+ul li a {
	background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}
/*Connector styles on hover*/
.tree li a:hover+ul li::after,
.tree li a:hover+ul li::before,
.tree li a:hover+ul::before,
.tree li a:hover+ul ul::before{
	border-color:  #94a0b4;
}

</style>


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

          <h3 style="color:blue">Overview of the task</h3>
 <!-- <div class="jumbotron"> -->

      <div class="row">
        <div class="col-md-4"></div>
        <div class="tree">
        	<ul>
            <?php
            foreach ($task as $row) {
            $taskid = $row->taskid;
             ?>
             <li>
            <ahref="#"><?php echo $row->taskname?></a>
            <ul>
              <?php  foreach($method as $sub){

              $methodid = $sub->methodid;
                ?>
              <li>
                <a style="color:#FF4500" href="#"><?php echo $sub->methodname?></a>
                <ul>
                  <?php
                   $steps1= $this->db->select('*')
                                     ->from('steps')
                                     ->join('steps_altsteps','steps.stepid=steps_altsteps.stepid')
                                     ->join('method_step','method_step.stepid=steps.stepid')
                                     ->where('method_step.methodid',$methodid)
                                     ->where('steps_altsteps.stepid > 1')
                                     ->get()
                                     ->result();
                                     $conn= mysqli_connect("localhost","root","","cognitivewalkthrough");

                                //     $result = mysqli_query($conn,"select * from steps join steps_altsteps on steps.stepid=steps_altsteps.stepid join method_step on method_step.stepid=steps.stepid where method_step.methodid=$methodid and steps_altsteps.stepid>1");
                  $result =$this->db->select('steps.stepid,steps.stepname,steps.image,task.taskid,task.taskname,method_step.methodid')
                          ->from('task')
                          ->join('task_method','task_method.taskid = task.taskid')
                          ->join('method_step','task_method.methodid = method_step.methodid')
                          ->join('steps','method_step.stepid = steps.stepid')
                          ->order_by('method_step.sort', 'asc')
                          ->where('task.taskid',$taskid)
                          ->where('task_method.methodid',$methodid)
                          ->get()
                          ->result(); ?>

              <?php  //while($sub1= mysqli_fetch_assoc($result)){
        foreach($result as $sub1){
              //foreach($steps1 as $sub1){
           $stepid = $sub1->stepid;
                ?>
                  <li>
                    <a href="#"><?php echo $sub1->stepname ?></a>
                    <ul>
                      <?php
                      $altstepsrecords = $this->db->select ('task.taskid,task.taskname,task.Startimage,steps.stepid,steps.stepname,steps.image,altsteps.altstepid,altsteps.altstepname,method.methodid,method.methodname')
                                                  ->from('altsteps')
                                                  ->join('steps_altsteps','altsteps.altstepid = steps_altsteps.altstepid')
                                                  ->join('steps','steps.stepid = steps_altsteps.stepid')
                                                  ->join('method_step','method_step.stepid = steps.stepid')
                                                  ->join('method','method.methodid=method_step.methodid')
                                                  ->join('task_method','task_method.methodid=method.methodid')
                                                  ->join('task','task.taskid=task_method.taskid')
                                                  ->where('steps_altsteps.stepid',$stepid)
                                                  ->get('')
                                                  ->result();?>
                                                  <?php  foreach($altstepsrecords as $sub2){
                                               $altstepid = $sub2->altstepid;
                                                    ?>
                      <li>
                        <a style="color:blue" href="#"><?php echo $sub2->altstepname?></a>

                       <ul>
                          <?php
                         $altsubsteps = $this->db->select ('altsteps.altstepid,altsteps.altstepname,altsubsteps.altsubstepid,altsubsteps.altsubstepname,altsubsteps.altsubstepimage')
                                          ->from('altsteps')
                                          ->join('altsteps_altsubsteps','altsteps.altstepid = altsteps_altsubsteps.altstepid')
                                          ->join('altsubsteps','altsubsteps.altsubstepid = altsteps_altsubsteps.altsubstepid')
                                          ->where('altsteps_altsubsteps.altstepid',$altstepid)
                                          ->get('')
                                          ->result();?>
                                                      <?php  foreach($altsubsteps as $sub3){
                                                   $stepid = $sub3->altsubstepid;
                                                       ?>
                          <li>
        <a href='#'><?php echo $sub3->altsubstepname?></a>

                          </li><?php
                            }
                            ?>
                        </ul>
                      </li>  <?php
                        }
                        ?>
                    </ul>
                    <?php
                    //  break;
                //  }
                    ?>
                  </li>
                  <?php

                }
                  ?>
                </ul>


              </li>
              <?php
            }
              ?>


        </ul>
          </li>
        <?php
        }
        ?>
        </ul>


        </div><br>
<div class='tree col-md-12'>
<h4>Flow of task completed</h4>



      <?php

      $conn= mysqli_connect("localhost","root","","cognitivewalkthrough");
$perform = mysqli_query($conn,"SELECT adminid,timest,personaid,personaname,taskid,taskname,methodid,methodname,variantid,variantname,stepid,GROUP_CONCAT(DISTINCT stepname),stepimage,question,questionname,answer,description,added_question,rating,reasons,average,sessionid FROM perform WHERE timest=$timestamp GROUP by methodid");
/*$perform = $this->db->select('adminid,timest,personaid,personaname,taskid,taskname, GROUP_CONCAT(methodid),methodname,variantid,variantname,stepid,stepname,stepimage,question,questionname,answer,description,added_question,rating,reasons,average,sessionid')
                    ->from('perform')
                    ->where('timest',$timestamp)
                    ->group_by('methodid')
                    ->get()
                    ->result();
*/
              while ($perform1=mysqli_fetch_assoc($perform)) {
                ?>  <ul>  <li>
<a style="color:red" href="#"><?php echo $perform1['methodname']?></a>

                <?php
                # code...
              //  print_r($perform1);
                $value = $perform1['GROUP_CONCAT(DISTINCT stepname)'];
$values = explode(",", $value); //assuming you group_concat used commas e.g. John,James,Jim

foreach ($values as $row) {
  # code...
?><ul><li>
<a href="#"><?php echo $row?></a>
<?php
        //        print_r($perform1);
}                  }

      ?></li>
    </ul>
    </li>
  </ul>
</div>

              <?php echo form_close() ?>
        </div>
        <div class="col-md-4"></div>
      </div>

      <!-- </div> -->
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  </body>
</html>

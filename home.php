<?php
include 'includes\common.php';
// Redirects the user to index page if he/she is not logged in.
if (!isset($_SESSION['email'])) {
    header('location:index.php');
}
if(isset($_SESSION['email']))
{
$id=$_SESSION['id'];
// select query to fetch title,num_people,initial_budget,date_from,date_to,id from new_plan table.
$select_query= "select title,num_people,initial_budget,date_from,date_to,id from new_plan where user_id='$id' "; 
$query_result=mysqli_query($con,$select_query);
$num=mysqli_num_rows($query_result);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>   
    <title>Home</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- ajax font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css\style.css" type="text/css"> 

    <!-- internal CSS starts -->
    <style>
    .jumbotron{
     background-color:rgba(255,0,0,0.6);
     color:#ffffff;
     font-size:30px;
    }
    .btn:hover{
     background-color:#0000ff;
     color:#ffffff;
    }
    .centered{
       position:absolute;
       top:50%;
       left:50%;
       transform:translate(-50%,-50%);
       color:#ffffff;
       font-size:35px;
    }
    img{
       filter:brightness(80%);
       padding:5px;
       border-radius:10px !important; 
    }
    body{
       background:  url("image/bg1.jpg");
       background-size:cover;
       background-attachment:fixed;
    }
    </style>
    <!-- internal CSS ends -->

</head>
<body style="margin:75px 0px 75px 0px; ">
<!-- including Header file -->
<?php
include 'includes\header.php';
?>
<!--end-->


<div class="container">
    <?php 
    if ($num>0) {     // if $num>0 then person must have plan. then he/she will see Your plans message alongwith his/her plans.
    ?> 

    <div class="jumbotron">
        <center>Your Plans</center>
    </div><br>
    <div class="row"><br>
        <?php
        foreach($query_result as $row) { 
        ?>
        <div class="col-xs-6 col-md-4 ">
            <!--plan panels start-->
            <div class="panel panel-default">
                <div class="panel-heading " style=" background-color:#FF5733; color:#ffffff;">
                    <div class="row"> 
                        <div class="col-xs-9 text-center" style="font-size:20px; padding-left:100px;"> 
                            <?php echo ucwords($row['title']);?>
                        </div>
                        <div class="col-xs-3">
                            <span class="glyphicon glyphicon-user" style="float:right; font-size:20px; "><span style="font-size:20px; padding-left:8px;"><?php echo $row['num_people'];?></span></span>
                        </div>
                    </div> 
                </div> 
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-8">
                            <strong>Budget</strong>
                        </div>
                        <div class="col-xs-4" style="text-align:right;">
                            <?php echo "₹"." ". $row['initial_budget'];?>
                        </div>
                    </div><br>               
                    <div class="row">
                        <div class="col-xs-5">
                            <strong>Date</strong>
                        </div>
                        <div class="col-xs-7" style="text-align:right;">
                            <?php echo date("dS M", strtotime($row['date_from']))." - ".date("dS M Y", strtotime($row['date_to']));?>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <a href="viewplan_script.php?plan_id=<?php echo $row['id']?>" style="text-decoration:none;"><button type="submit" class="btn btn-block btn-default">View Plan</button></a>
                    </div>                  
                </div>
            </div>
            <!--plan panels end-->
        </div>
        <?php  } ?>
    </div>
                        <!-- fixed plus button to add new plan -->
                        <a href="create_new_plan.php" style="position:fixed; bottom:10%; right:20px; padding: 5px 3px; font-size:50px; color:#0000ff; ">
                        <span class="glyphicon glyphicon-plus-sign" ></span></a>
    <?php } 
    else {      // Otherwise he/she will get message You don't have any active plans.   
    ?>
   
    <div class="jumbotron">
        <center>You don't have any active plans.
            <br><a href="create_new_plan.php" style="color:#FF5733; text-decoration:none; "><button type="button" class="btn btn-lg" ><span class="glyphicon glyphicon-plus-sign "></span> Create a New Plan</button></a>
        </center>
    </div><br>

    <div><h2><strong style="color:#ff0000;">Most Visited Places in India</strong></h2></div><br>
 
    <div class="row">
   
        <div class="col-xs-6 col-md-3">     
        <a href="#myModal1" data-toggle="modal" data-target="#myModal1"><img src="image\delhi.jpg" class="img-responsive img-rounded" alt="cameras"><div class="centered" >Delhi</div></a>
        </div>
        <div class="col-xs-6 col-md-3">
        <a href="#myModal2" data-toggle="modal" data-target="#myModal2"><img src="image\varanasi2.jpg" class="img-responsive  img-rounded " alt="cameras"><div class="centered" >Varanasi</div></a>
        </div>
        <div class="col-xs-6 col-md-3">
        <a href="#myModal3" data-toggle="modal" data-target="#myModal3"><img src="image\lucknow.jpg" class="img-responsive img-rounded" alt="cameras"><div class="centered"  >Lucknow</div></a>
        </div>
        <div class="col-xs-6 col-md-3">
        <a href="#myModal4" data-toggle="modal" data-target="#myModal4"><img src="image\goa.jpg" class="img-responsive img-rounded" alt="cameras"><div class="centered" >Goa</div></a>
        </div>

    </div><br>
    <div class="row">
        <div class="col-xs-6 col-md-3">
        <a href="#myModal5" data-toggle="modal" data-target="#myModal5"><img src="image\ladakh.jpg" class="img-responsive img-rounded" alt="cameras"><div class="centered" >Ladakh</div></a>
        </div>
        <div class="col-xs-6 col-md-3">
        <a href="#myModal6" data-toggle="modal" data-target="#myModal6"><img src="image\gangtok.jpg" class="img-responsive img-rounded" alt="cameras"><div class="centered" >Gangtok</div></a>
        </div>
        <div class="col-xs-6 col-md-3">
        <a href="#myModal7" data-toggle="modal" data-target="#myModal7"><img src="image\cherrapunji.jpg" class="img-responsive img-rounded" alt="cameras"><div class="centered" >Cherrapunji</div></a>
        </div>
        <div class="col-xs-6 col-md-3">
        <a href="#myModal8" data-toggle="modal" data-target="#myModal8"><img src="image\banglore.jpg" class="img-responsive img-rounded" alt="cameras"><div class="centered" >Bangalore</div></a>
        </div>
    </div><br>
    
    <div><h2><strong style="color:#ff0000;">Internationals</strong></h2></div><br>
 
    <div class="row">
       
        <div class="col-xs-6 col-md-3">
        <a href="#myModal9" data-toggle="modal" data-target="#myModal9"><img src="image\paris.jpeg" class="img-responsive img-rounded" alt="cameras"><div class="centered" >Paris</div></a>
        </div>
        <div class="col-xs-6 col-md-3">
        <a href="#myModal10" data-toggle="modal" data-target="#myModal10"><img src="image\new york.jpg" class="img-responsive img-rounded" alt="cameras"><div class="centered" style="text-align:center;" >NewYork</div></a>
        </div>
        <div class="col-xs-6 col-md-3">
        <a href="#myModal11" data-toggle="modal" data-target="#myModal11"><img src="image\london.jpg" class="img-responsive img-rounded" alt="cameras"><div class="centered" >London</div></a>
        </div>
        <div class="col-xs-6 col-md-3">
        <a href="#myModal12" data-toggle="modal" data-target="#myModal12"><img src="image\peru.jpg" class="img-responsive img-rounded" alt="cameras"><div class="centered" >Peru</div></a>
        </div>
    </div><br>
    <div class="row">   
        <div class="col-xs-6 col-md-3">
        <a href="#myModal13" data-toggle="modal" data-target="#myModal13"><img src="image\new zealand.jpg" class="img-responsive img-rounded" alt="cameras"><div class="centered" style="text-align:center; ">NewZealand</div></a>
        </div>
        <div class="col-xs-6 col-md-3">
        <a href="#myModal14" data-toggle="modal" data-target="#myModal14"><img src="image\rome.jpg" class="img-responsive img-rounded" alt="cameras"><div class="centered" >Rome</div></a>
        </div>
        <div class="col-xs-6 col-md-3">
        <a href="#myModal15" data-toggle="modal" data-target="#myModal15"><img src="image\hawaii.jpg" class="img-responsive img-rounded" alt="cameras"><div class="centered" >Hawaii</div></a>
        </div>
        <div class="col-xs-6 col-md-3">
        <a href="#myModal16" data-toggle="modal" data-target="#myModal16"><img src="image\canada.jpg" class="img-responsive img-rounded" alt="cameras"><div class="centered" >Canada</div></a>
        </div>
    </div>
    <?php } ?>
</div>

<!--including Footer-->  
<?php
include 'includes\footer.php';
?>
<!--Footer end-->

</body>
</html>

<!--including modals-->
<?php
include "includes\modal.php";
?>
<!--end-->
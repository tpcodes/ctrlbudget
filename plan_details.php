<?php
include 'includes\common.php';
// Redirects the user to index page if he/she is not logged in.
if (!isset($_SESSION['email'])) {
    header('location:index.php');
}
// Redirects the user to home page if session of initial_budget is not created.
if (!isset($_SESSION['initial_budget'])) {
    header('location:home.php');
}
if(isset($_SESSION['email'])){
$initial_budget= $_SESSION['initial_budget'];
$num_people= $_SESSION['num_people'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Plan Details</title>
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
    .btn-default{
        border-color:#FF5733;
    }
    .btn-default:hover {
        color:#ffffff;
        background-color: #FF5733;
    }
    body{
       background:  url("image/bg.jpg");
       background-size:cover;
       background-attachment:fixed;
   }
    </style>
     <!-- internal CSS ends -->
</head>

<body>
<!-- including Header file -->
<?php
include 'includes\header.php';
?>
<!--end-->
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <!--plan details panel starts-->
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="POST" action="plan_detail_script.php">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Title (Ex. Trip to Goa)" required="true">
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-6">
                                    <label>From</label>
                                    <input type="date" name="from" class="form-control" placeholder="dd/mm/yyyy" min="<?php echo date('Y-m-d');?>" max="2022-05-21" required="true">
                                </div>
                                <div class="form-group  col-xs-6">
                                    <label>To</label>
                                    <input type="date" name="to" class="form-control" placeholder="dd/mm/yyyy" min="<?php echo date('Y-m-d');?>" max="2022-05-21" required="true">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-8">
                                    <label>Initial Budget</label>
                                    <input type="text" name="initial budget" class="form-control" value="<?php echo $initial_budget ?>" required="true" disabled>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label>No. of People</label>
                                    <input type="text" name="num_people" class="form-control" value="<?php echo $num_people ?>" required="true" disabled>
                                </div>
                            </div>
                            <?php
                            $i=1;
                            while($i<=$num_people) { 
                            ?>
                                <div class="form-group">
                                    <label>Person <?php echo $i ?></label>
                                    <input type="text" name="person[]" class="form-control" placeholder="<?php echo "Person $i name "?> " required="true">
                                </div> 
                            <?php $i++; } ?>   
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-default">Submit</button>
                                </div>
                    </form>
                </div>
            </div>
            <!--plan details panel ends-->
        </div>
    </div>
</div>

<!--including Footer-->  
<?php
include 'includes\footer.php';
?>
<!--Footer end-->

</body>
</html>
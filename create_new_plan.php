<?php
include 'includes\common.php';
// Redirects the user to index page if he/she is not logged in.
if (!isset($_SESSION['email'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add New Plan</title>
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
         color: #ffffff;
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
                <!--add new plan panel starts-->
                <div class="panel panel-default">
                    <div class="panel-heading text-center" style="background-color:#FF5733; color:#ffffff;">
                        <h4>Create New Plan</h4>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="create_new_plan_script.php">
                            <div class="form-group">
                                <label>Initial Budget</label>
                                <input type="tel" name="initial_budget" class="form-control" placeholder="Initial Budget (Ex. 4000)" pattern="[5-9]\d+|\d{3,}" oninvalid="setCustomValidity('Value must be greater than or equal to 50')" onchange="try{setCustomValidity('')}catch(e){}" required="true">
                            </div>
                            <div class="form-group">
                                <label>How many people you want to add in your group?</label>
                                <input type="text" name="num_people" class="form-control" placeholder="No. of People" pattern="^[1-9]+$|\d{2,}" oninvalid="setCustomValidity('Value must be greater than or equal to 1')" onchange="try{setCustomValidity('')}catch(e){}" required="true">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-default">Next</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--add new plan panel ends-->
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
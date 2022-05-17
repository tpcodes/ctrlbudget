<?php
require 'includes\common.php';
// Redirects the user to home page if he/she is logged in.
if (isset($_SESSION['email'])) {
    header('location:home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
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
   .input-group-addon{
    background-color:#3BB9FF; color:#ffffff;
   }
   body{
       background:  url("image/bg3.jpg");
       background-size:cover;
       background-attachment:fixed;
   }
   </style>
   <!-- internal CSS ends -->
</head>

<body >
    <!-- including Header file -->
<?php
include 'includes\header.php';
?>
    <!--end-->

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-4 col-xs-offset-4">
                <!--login panel starts-->
                <div class="panel panel-primary">
                    <div class="panel-heading text-center" style="background-color:#ff0000;">
                        <h3>Login</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="login_submit.php">
                            <div class="form-group">
                                <label>Email:</label>
                                <div class="input-group" >
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-envelope"></span>
                                    </div>
                                    <input type="email" name="email" class="form-control" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <div class="input-group" >
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-lock"></span>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required="true" pattern=".{6,}">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        Don't have an account?<a href="signup.php"><span> Click here to Sign Up</span></a>
                    </div>
                    <!--login panel ends-->
                </div>
            </div>
        </div>   
    </div>
   
<!--Footer-->  
<?php
include 'includes\footer.php';
?>
<!--Footer end-->

</body>
</html>
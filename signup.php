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
    <title>Sign Up</title>
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

<body>
<!-- including Header file -->
<?php
include 'includes\header.php';
?>
<!--end-->
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4">
                    <!--signup panel starts-->
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center" style="background-color:#ff0000;">
                            <label style="font-size: 25px;">SIGN UP</label>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="signup_script.php">
                                <div class="form-group">
                                    <label>Name:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </div>
                                            <input type="text" class="form-control" placeholder="Full Name" name="name" required="true" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$">       
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Email:</label>
                                    <div class="input-group" >
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-envelope"></span>
                                        </div>
                                            <input type="email" class="form-control" placeholder="Enter Valid Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required="true">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Password:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-lock"></span>
                                        </div>
                                            <input type="password" class="form-control" placeholder="Password(Min. 6 characters)" name="password" pattern=".{6,}" required="true">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Phone Number:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-earphone"></span>
                                        </div>
                                            <input type="tel" class="form-control" placeholder="Enter Valid Phone Number" maxlength="10" size="10" name="contact" required="true">
                                    </div>
                                </div>
                                            <button type="submit" class="btn btn-default btn-block " value="Submit">Submit</button>
                            </form>
                        </div>
                    </div>
                    <!--signup panel ends-->
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
<?php
require 'includes\common.php';

// Redirects the user to index page if he/she is not logged in.
if (!isset($_SESSION['email'])) {
    header('location:index.php'); }

?>

<!DOCTYPE html>
<html >
<head>
    <title>Change Password</title>
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
                <!--change password panel starts-->
                <div class="panel panel-default">
                    <div class="panel-heading text-center" style="background-color:#ff0000; color:#ffffff;">
                        <label style="font-size: 25px;">Change Password</label>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="Settings_script.php">
                            <div class="form-group">
                                <label>Old Password</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-lock"></span>
                                    </div>
                                        <input type="password" class="form-control" placeholder="Old Password" name="old_password" pattern=".{6,}" required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </div>
                                        <input type="password" class="form-control" placeholder="New Password (Min. 6 characters)" name="new_password" pattern=".{6,}" required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Confirm New Password</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </div>
                                        <input type="password" class="form-control" placeholder="Re-type New Password" name="re_type_new_password" pattern=".{6,}" required="true">
                                </div>
                            </div>
                                <button type="submit" class="btn btn-block btn-default" value="Submit">Change</button>

                        </form>
                    </div>
                </div>
                 <!--change password panel ends-->
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
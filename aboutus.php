<?php
include 'includes\common.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>About us</title>
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
         h3,h2{
             color:#ff0000;
         }
         p{
             font-size:15px;
             
         }
         .row p{
             margin:50px;
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
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <img src="image\ex.png" height="300px" width="400px" >
            </div>
            <div class="col-xs-12 col-md-4">
                <p style="color:#ff0000;font-size:25px;font-weight:bold;">Policy check <span class="fa fa-file-text-o " style="padding-left:150px; font-size:45px; color:#0000ff;"></span></p>   
                <p>We will check the expense claimed by a user & will approve based on the city he/she has traveled to their designation, time of the day & much more organisation defined factors.</p>
            </div>
            <div class="col-xs-12 col-md-4">
                <p style="color:#ff0000;font-size:25px;font-weight:bold;">Proof Submission <span class="fa fa-address-card-o" style="padding-left:90px; font-size:45px; color:#0000ff;"></span></p>
                <p>User can upload a receipt or expense proof in any file format along with the claim application for authenticating an expense claim.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <p style="color:#ff0000;font-size:25px;font-weight:bold;">Paid by self/company <span class="fa fa-handshake-o" style="padding-left:10px; font-size:45px; color:#0000ff;"></span></p>
                <p>User can file an expense which might be incurred by him or paid through company funds on a business trip.</p>
            </div>
            <div class="col-xs-12 col-md-4">
                <p style="color:#ff0000;font-size:25px;font-weight:bold;">Eligibility <span class="fa fa-user-circle" style="padding-left:190px; font-size:45px; color:#0000ff;"></span></p>
                <p>We let you explicitly define user expense limit which will notify him/her to spend accordingly.</p>
            </div>
            <div class="col-xs-12 col-md-4">
                <p style="color:#ff0000;font-size:25px;font-weight:bold;">Bulk expense submission <span class="fa fa-files-o" style="padding-left:10px; font-size:45px; color:#0000ff;"></span></p>
                <p>User can file all the expense in bulk from our system which can also be bulk approved by the company's HR or manager which eventually makes the process fast and practical. </p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <h3><b>Who We Are?</b></h3>
                <p style="text-align:justify;">We are a group of young technocrats who came up with an idea of solving budget and time issues which we usually face in our daily lives. We are here to provide a budget controller according to you aspects.</p>
                <p  style="text-align:justify;">Budget controls is the biggest financial issue in the present world. One should look after their budget control to get rid off their financial crisis.</p>
            </div>
            <div class="col-xs-12 col-md-6">
                <h3><b>Why Choose Us?</b></h3>
                <p style="text-align:justify;">We provide with a predominant way to control and manage your budget estimations with ease of accessing for multiple users.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4 ">
                <h3><b>Contact Us</b></h3>
                <h5><b>Email:</b> ctrlbudget@gmail.com</h5>
                <h5><b>Mobile:</b> +91-9988774455</h5>
                <h5>
                    <b>Follow on:</b>
                    <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
                    <a href="https://www.linkedin.com"><i class="fa fa-linkedin"></i></a>
                </h5>
            </div>
            <div class="col-xs-8 " >
                <img src="image\cs.png" height="250px" width="700px" >
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
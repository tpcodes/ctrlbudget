<?php
include 'includes\common.php';
// Redirects the user to home page if he/she is logged in.
if (isset($_SESSION['email'])) {
  header('location:home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Index</title>
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

    
<!-- Internal CSS starts -->
  <style>
    
  .jumbotron{
        width:100%;
        position: relative;
        padding: 6%;
        margin-top: 12%;
        margin-bottom: 18%;
        background-color: rgba(70, 130, 191, 0.5);
        font-size:35px;
      }
  .btn{
        background-color:rgba(128,0,128,0.8);
      }
  .btn:hover{
        background-color:#ff0000;
      }
  .carousel-indicators li {
        border:1px solid #ff0000;
      }
  .carousel-indicators .active {
        background-color:#ff0000;
      }

  </style>

<!-- Internal CSS ends -->

</head>

<body style="margin-top: 50px; ">
<?php
include 'includes\header.php';
?>
<div id="carousel-example-generic" class="carousel slide" data-interval="3000" data-ride="carousel">
<!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active" ></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
    <li data-target="#carousel-example-generic" data-slide-to="5"></li>
    <li data-target="#carousel-example-generic" data-slide-to="6"></li>
    <li data-target="#carousel-example-generic" data-slide-to="7"></li>
    <li data-target="#carousel-example-generic" data-slide-to="8"></li>
    <li data-target="#carousel-example-generic" data-slide-to="9"></li>
  </ol>
  <!-- Wrapper for slides -->
  
  <div class="carousel-inner" role="listbox">

    <div class="item active">
      <img src="image/1.jpg" alt="..." style="width:100%;" >
        <div class="carousel-caption">
          <div class="jumbotron" >
            We Help You Control Your Budget !<br>
            <a href="login.php"><button class="btn btn-primary btn-lg">Plan a Journey, Build and Track Expenses</button></a>
          </div>
        </div>
    </div>

    <div class="item">
      <img src="image/2.jpg" alt="..." style="width:100%;">
        <div class="carousel-caption">
        <div class="jumbotron" >
          The Taj is pinkish in the morning, milky white in the evening and golden when the moon shines !<br>
          <a href="login.php"><button class="btn btn-primary btn-lg">Plan a Journey, Build and Track Expenses</button></a>
        </div>
      </div>
    </div>
    
    <div class="item">
      <img src="image/3.jpg" alt="..." style="width:100%;">
        <div class="carousel-caption">
          <div class="jumbotron" >
            There are 20,000 lightbulbs used on the Eiffel Tower to make it sparkle every night !<br>
            <a href="login.php"><button class="btn btn-primary btn-lg">Plan a Journey, Build and Track Expenses</button></a>
          </div>
        </div>
    </div>
    
    <div class="item">
      <img src="image/4.jpg" alt="..." style="width:100%;">
        <div class="carousel-caption">
          <div class="jumbotron" >
            INDIA GATE: Flame of the immortal soldier !<br>
            <a href="login.php"><button class="btn btn-primary btn-lg">Plan a Journey, Build and Track Expenses</button></a>
          </div>
        </div>
    </div>

    <div class="item">
      <img src="image/5.jpg" alt="..." style="width:100%;">
        <div class="carousel-caption">
          <div class="jumbotron" >
            The Pyramid of Khufu at Giza is the largest Egyptian pyramid !<br>
            <a href="login.php"><button class="btn btn-primary btn-lg">Plan a Journey, Build and Track Expenses</button></a>
          </div>
        </div>
    </div>

    <div class="item">
      <img src="image/6.jpg" alt="..." style="width:100%;">
        <div class="carousel-caption">
          <div class="jumbotron" >
            Manali is a town of unexplored mysteries !<br>
            <a href="login.php"><button class="btn btn-primary btn-lg">Plan a Journey, Build and Track Expenses</button></a>
          </div>
        </div>
    </div>

    <div class="item">
      <img src="image/7.jpg" alt="..." style="width:100%;">
        <div class="carousel-caption">
          <div class="jumbotron" >
            Goa is a place for thrill seekers !<br>
            <a href="login.php"><button class="btn btn-primary btn-lg">Plan a Journey, Build and Track Expenses</button></a>
          </div>
        </div>
    </div>
 
    <div class="item">
      <img src="image/8.jpg" alt="..." style="width:100%;">
        <div class="carousel-caption">
          <div class="jumbotron" >
            Sunsets are proof that endings can often be beautiful too !<br>
            <a href="login.php"><button class="btn btn-primary btn-lg">Plan a Journey, Build and Track Expenses</button></a>
          </div>
        </div>
    </div>

    <div class="item">
      <img src="image/9.jpg" alt="..." style="width:100%;">
        <div class="carousel-caption">
          <div class="jumbotron" >
            Leaning Tower took two centuries to build it !<br>
            <a href="login.php"><button class="btn btn-primary btn-lg">Plan a Journey, Build and Track Expenses</button></a>
          </div>
        </div>
    </div>

    <div class="item">
      <img src="image/10.jpg" alt="..." style="width:100%;">
        <div class="carousel-caption">
          <div class="jumbotron" >
            VARANASI: The spritual capital of India !<br>
            <a href="login.php"><button class="btn btn-primary btn-lg">Plan a Journey, Build and Track Expenses</button></a>
          </div>
        </div>
    </div>

  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style="color:#ffffff;"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="color:#ffffff;"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

   
<!--including Footer-->  
<?php
include 'includes\footer.php';
?>
<!--Footer end-->

</body>
</html>
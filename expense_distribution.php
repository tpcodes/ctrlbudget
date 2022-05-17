<?php
include 'includes\common.php';
// Redirects the user to index page if he/she is not logged in.
if (!isset($_SESSION['email'])) {
    header('location:index.php');
}

$plan_id=$_SESSION['plan_id'];
// select query to fetch initial_budget, title, num_people from new_plan table.
$query1="select initial_budget, title, num_people from new_plan where id='$plan_id'";
$query1_result=mysqli_query($con,$query1);
$row1=mysqli_fetch_array($query1_result);

$title=$row1['title'];
$num_people=$row1['num_people'];

// select query to fetch sum of amount spent as total from add_new_expense table.
$query2= "select SUM(amount_spent) as total from add_new_expense inner join person_details on add_new_expense.person_id=person_details.pr_id where plan_id='$plan_id'";
$query2_result=mysqli_query($con,$query2);
$row2=mysqli_fetch_array($query2_result);

$total= $row2['total'];
$remaining_amount=$row1['initial_budget']-$total;
$individual_share=$total/$num_people;
$indiv_share=sprintf('%0.2f',round($individual_share,2));

// select query to fetch name from person_details table.
$query3= "select name from person_details where plan_id='$plan_id'";
$query3_result=mysqli_query($con,$query3);
// select query to fetch person_id from person_details table.
$query4= "select pr_id from person_details where plan_id='$plan_id'";
$query4_result=mysqli_query($con,$query4);
// select query to fetch person_id from person_details table.
$query5= "select pr_id from person_details where plan_id='$plan_id'";
$query5_result=mysqli_query($con,$query5);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Expense Distribution</title>
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
        background:  url("image/bg2.jpg");
        background-size:cover;
        background-attachment:fixed;
        }
        </style>
        <!-- internal CSS ends -->
</head>
<body style="margin: 100px 0px 75px 0px;  ">
<!-- including Header file -->
<?php
include 'includes\header.php';
?>
<!--end-->

<div class="container">
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <!--expense_distribution panel starts-->
            <div class="panel panel-default">
                <div class="panel-heading text-center"  style="background-color:#FF5733; color:#ffffff;">
                    <div class="row"> 
                        <div class="col-xs-9 text-center" style="font-size:20px; padding-left:100px;"> 
                            <?php echo ucwords($title);?>
                        </div>
                        <div class="col-xs-3">
                            <span class="glyphicon glyphicon-user" style="float:right; font-size:20px; "><span style="font-size:20px; padding-left:8px;"><?php echo $num_people;?></span></span>
                        </div>
                    </div> 
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-8">
                            <strong>Initial Budget</strong>
                        </div>
                        <div class="col-xs-4" style="text-align:right;">
                            <b><?php echo "₹"." ". $row1['initial_budget'];?></b>
                        </div>
                    </div>             
                    <div class="row">
                        <?php foreach($query3_result as $row3) { ?>
                            <div class="col-xs-7"><br>
                            <strong><?php echo ucwords($row3['name']);?></strong>
                            </div>
                            <?php $row4=mysqli_fetch_array($query4_result); ?>
                                <div class="col-xs-5" style="text-align:right;"><br>
                                    <?php $person_id=$row4['pr_id'];
                                        // query to fetch total amount spent by a perticular person. 
                                        $query= "SELECT sum(amount_spent) as sum FROM add_new_expense WHERE person_id='$person_id'";
                                        $query_result=mysqli_query($con,$query);
                                        $rows=mysqli_fetch_array($query_result);?>
                                        <?php if($rows['sum']!=0)    { 
                                            echo '₹'.' '.$rows['sum']; 
                                        }
                                        else  
                                            { 
                                                echo '₹'.' '."0";
                                            } 
                                    ?>
                                </div>
                        <?php } ?>
                    </div>
                    <div class="row"><br>
                        <div class="col-xs-5">
                            <strong>Total Amount Spent</strong>
                        </div>
                        <div class="col-xs-7" style="text-align:right;">
                            <!-- conditions for total_amount_spent -->
                            <?php if($total==0){?>
                                <span ><b> <?php   echo '₹'.' '."0"?></b></span> 
                            <?php }?>
                            <?php if($total>0){?>
                                <span ><b><?php echo "₹"." ".$total;?></b></span> 
                            <?php }?>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-xs-5">
                            <strong>Remaining Amount</strong>
                        </div>
                        <div class="col-xs-7" style="text-align:right;">
                            <!-- conditions for remaining_amount -->
                            <?php if($remaining_amount==0){?>
                                <span><b><?php   echo '₹'.' '.$remaining_amount; ?></b></span> 
                            <?php }?>
                            <?php if($remaining_amount<0){?>
                                <span style="color:#ff0000;"> <b> <?php   echo 'Overspent by '.'₹'.' '.abs($remaining_amount); ?></b> </span>
                            <?php }?>
                            <?php if($remaining_amount>0){?>
                                <span style="color:#008000;"> <b> <?php   echo '₹'.' '.$remaining_amount; ?></b></span>
                            <?php }?>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-xs-5">
                            <strong>Individual shares</strong>
                        </div>
                        <div class="col-xs-7" style="text-align:right;">
                            <?php  echo "₹"." ".$indiv_share;?>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($query3_result as $row3) { ?>
                            <div class="col-xs-7"><br>
                                <strong><?php echo ucwords($row3['name']);?></strong>
                            </div>
                                <?php $row5=mysqli_fetch_array($query5_result); ?>
                            <div class="col-xs-5" style="text-align:right;"><br>
                                <?php $person_id=$row5['pr_id'];
                                      // query to fetch total amount spent by a perticular person. 
                                      $query= "SELECT sum(amount_spent) as sum FROM add_new_expense WHERE person_id='$person_id'";
                                      $query_result=mysqli_query($con,$query);
                                      $rows=mysqli_fetch_array($query_result);
                                      $sum=$rows['sum'];
                                      $a= $sum-$indiv_share; 
                                      $b=sprintf('%0.2f',round($a,2));?>
                                      <!-- conditions for $money_spent_by_person-$individual_share or $b -->
                                    <?php if($b==0 && $total==0){?>
                                        <span ><?php   echo '₹'.' '."0"?></span> 
                                    <?php }?>
                                    <?php if($b==0 && $total>0){?>
                                        <span ><b><?php   echo 'All Settled up'?></span></b>
                                    <?php }?>
                                    <?php if($b<0){?>
                                        <span style="color:#ff0000;">  <b><?php   echo 'Owes'.' '.'₹'.' '.abs($b); ?></b> </span>
                                    <?php }?>
                                    <?php if($b>0){?>
                                        <span style="color:#008000;"> <b> <?php   echo 'Gets Back'.' '.'₹'.' '.$b; ?> </b></span>
                                    <?php }?>                                 
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group"><br>
                             <center ><a  href="viewplan.php"><button type="submit" class="btn btn-default" ><span class=" glyphicon glyphicon-arrow-left"></span> Go back</button></a></center>
                    </div>
                </div>
            </div>
            <!--expense_distribution panel ends-->
        </div>
    </div>
</div>

<!--Including Footer-->  
<?php
include 'includes\footer.php';
?>
<!--Footer end-->

</body>
</html>

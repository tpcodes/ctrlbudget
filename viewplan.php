<?php
include 'includes\common.php';
// Redirects the user to index page if he/she is not logged in.
if (!isset($_SESSION['email'])) {
    header('location:index.php');
}

$plan_id=$_SESSION['plan_id'];
$id=$_SESSION['id'];
//select query to fetch expense_title,amount_spent,per_name,date,image_path by inner joining add_new_expense and person_details tables along with some conditions.
$query1= "select expense_title,amount_spent,per_name,date,image_path from add_new_expense  inner join person_details on add_new_expense.person_id=person_details.pr_id where plan_id='$plan_id'";
$query1_result=mysqli_query($con,$query1);
$num1=mysqli_num_rows($query1_result);
//select query to fetch sum of amount_spent by inner joining add_new_expense and person_details tables along with some conditions.
$query2= "select SUM(amount_spent) as total from add_new_expense  inner join person_details on add_new_expense.person_id=person_details.pr_id where plan_id='$plan_id'";
$query2_result=mysqli_query($con,$query2);
$row2=mysqli_fetch_array($query2_result);
$total= $row2['total'];
//select query to fetch title,num_people,initial_budget,date_from,date_to from new_plan table along with some conditions.
$query3= "select title,num_people,initial_budget,date_from,date_to from new_plan where user_id='$id' and id='$plan_id'";
$query3_result=mysqli_query($con,$query3);
$row=mysqli_fetch_array($query3_result);
//select query to fetch name, pr_id from person_details table along with some conditions.
$query4= "select name, pr_id from person_details where plan_id='$plan_id'";
$query4_result=mysqli_query($con,$query4);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Plan</title>
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

<body style="margin: 75px 0px 75px 0px; ">
<!-- including Header file -->
<?php
include 'includes\header.php';
?>
<!--end-->

<div class="container">
    <div class="row">
        <?php foreach($query3_result as $row)  { 
        ?>
        <div class="col-xs-12 col-md-6">
            <!--view plan panel starts-->
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
                        <div class="col-xs-8">
                            <strong>Remaining Amount</strong>
                        </div>
                        <div class="col-xs-4" style="text-align:right;">
                            <?php  $i_b=$row['initial_budget']-$total;?>
                                <?php if($i_b==0){?>
                                    <span ><b><?php   echo '₹'.' '.$i_b; ?></b></span> 
                                <?php }?>
                                <?php if($i_b<0){?>
                                    <span style="color:#ff0000;"><b>  <?php   echo 'Overspent by '.'₹'.' '.abs($i_b); ?> </b></span>
                                <?php }?>
                                <?php if($i_b>0){?>
                                    <span style="color:#008000;"> <b> <?php   echo '₹'.' '.$i_b; ?></b> </span>
                                <?php }?>
                        </div>
                    </div><br>  
                    <div class="row">
                        <div class="col-xs-5">
                            <strong>Date</strong>
                        </div>
                        <div class="col-xs-7" style="text-align:right;">
                            <?php echo date("dS M", strtotime($row['date_from']))." - ".date("dS M Y", strtotime($row['date_to']));;?>
                        </div>
                    </div><br>
                </div>
            </div>  <?php }?>
            <!--view plan panel end-->
        </div>
                <!--expense distribution button-->
            <div class="col-xs-4 col-xs-offset-4 col-md-3 col-md-offset-2 " style="padding-top:75px;">
                <a href="expense_distribution.php?ed=<?php echo $plan_id?>"><button type="submit" class="btn btn-default btn-lg" ></span> Expense Distribution</button></a>
            </div> 
    </div>
</div><br>

<div class="container">
    <?php if ($num1>0) { ?>
    <div class="row">
        <?php
        while($r=mysqli_fetch_array($query1_result)) { ?>
        <div class="col-xs-6 col-md-3">
            <!--Expenses panel start-->
            <div class="panel panel-default">
                <div class="panel-heading " style=" background-color:#FF5733; color:#ffffff;">
                    <div class="row"> 
                        <div class="col-xs-9 text-center" style="font-size:20px; padding-left:100px;"> 
                            <?php echo ucwords($r['expense_title']);?>
                        </div>
                    </div> 
                </div> 
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-4">
                            <strong>Amount</strong>
                        </div>
                        <div class="col-xs-8" style="text-align:right;">
                            <?php echo "₹"." ". $r['amount_spent'];?>
                        </div>
                    </div><br>               
                    <div class="row">
                        <div class="col-xs-4">
                            <strong>Paid by</strong>
                        </div>
                        <div class="col-xs-8" style="text-align:right;">
                            <?php echo $r['per_name'];;?>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-xs-5">
                            <strong>Paid on</strong>
                        </div>
                        <div class="col-xs-7" style="text-align:right;">
                            <?php echo date("dS M Y", strtotime($r['date']));?>
                        </div>
                    </div><br>
                    <div class="form-group text-center">
                        <?php 
                        if($r['image_path']!=NULL){
                        ?>
                        <a href="<?php echo $r['image_path']?>">Show Bill</a>
                        <?php  }
                        else {
                        ?>
                        <a href="">You Don't have Bill</a>
                        <?php } ?>
                    </div>                  
                </div>
            </div>
            <!--Expenses panel ends-->
        </div> 
        <?php  } ?>
        <?php  } ?>
            <div class="col-xs-12 col-md-4" style="float:right">
                <!--Add new Expense panel start-->
                <div class="panel panel-default">
                    <div class="panel-heading text-center"  style="background-color:#FF5733; color:#ffffff;">
                        <h4>Add New Expense</h4>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="add_new_expense_script.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="expensename" class="form-control" placeholder="Expense Name" required="true"> 
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="date" class="form-control" placeholder="dd/mm/yyyy" min="<?php echo $row['date_from'];?>" max="<?php echo $row['date_to'];?>" required="true">
                            </div>
                            <div class="form-group">
                                <label>Amount Spent</label>
                                <input type="text" name="amount" class="form-control" placeholder="Amount Spent" pattern="^[1-9]+$|\d{2,}"oninvalid="setCustomValidity('Value must be greater than or equal to 1')" onchange="try{setCustomValidity('')}catch(e){}" required="true" >
                            </div>
                            <div class="form-group">
                                <select name="person" class="form-control" value="Amount Spent" >
                                    <?php  while($rows=mysqli_fetch_array($query4_result)){ ?>
                                    <option><?php echo ucwords($rows['name']); ?></option>
                                    <?php } ?>
                               </select>
                            </div>
                            <div class="form-group">
                                <label>Upload Bill</label>
                                <input type="file" name="uploadedimage" class="form-control inp" >
                            </div> 
                            <div class="form-group">
                                <a href="add_new_expense_script.php?per_id= <?php echo $rows['pr_id']?>" style="text-decoration:none;"><input type="submit" name="submit" value="Add" class="btn btn-block btn-default "></a>
                            </div>
                        </form>
                    </div>
                </div>
                <!--Add new Expense panel ends-->   
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
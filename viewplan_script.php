<?php
include 'includes\common.php';
// we get plan_id from home page through get method.
$plan_id=$_GET['plan_id'];
// creting session variable of plan_id.
$_SESSION['plan_id']=$plan_id;
// redirecting to viewplan page.
header('location:viewplan.php');
?>

       
<?php
include 'includes\common.php';

// Getting the values from the add new plan page using $_POST[] and cleaning the data submitted by the user.
$initial_budget = mysqli_real_escape_string($con,$_POST['initial_budget']);
$num_people = mysqli_real_escape_string($con,$_POST['num_people']);

// creating session variables of initial_budget and num_people.
$_SESSION['initial_budget']=$initial_budget;
$_SESSION['num_people']= $num_people;
// end.

header('location:plan_details.php');  // redirecting to plan_details page.

?>
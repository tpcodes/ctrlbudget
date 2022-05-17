<?php
include 'includes\common.php';
// storing values of session vaeiables into variables.
$id=$_SESSION['id'];
$initial_budget=$_SESSION['initial_budget'];
$num_people=$_SESSION['num_people'];
// Getting the values from the plan details page using $_POST[] and cleaning the data submitted by the user.
$title = mysqli_real_escape_string($con,$_POST['title']);
$from = mysqli_real_escape_string($con,$_POST['from']);
$to = mysqli_real_escape_string($con,$_POST['to']);
$person=$_POST['person'];

if($to>=$from)  // checking condition whether the end date is greater than or equal to starting date.
{
// insert query to insert data into new plan table in database.
$select_query= "insert into new_plan(user_id, initial_budget, num_people, title, date_from, date_to)  values ('$id', '$initial_budget', '$num_people', '$title', '$from', '$to')";
$user_result=mysqli_query($con,$select_query);
$plan_id=mysqli_insert_id($con);
foreach($person as $v){
    // insert query to insert plan_id and name of person in person_details table.
    $query= "insert into person_details (plan_id, name) values('$plan_id','$v')" or die();
    $query_result=mysqli_query($con,$query);  
}
// $_SESSION['title']=$title;
echo("<script>alert('Your New Budget Plan Added Successfully')</script>");
echo("<script>location.href='home.php'</script>"); 
}
else{
    echo("<script>alert('End Date should not be less than Starting Date!')</script>");
    echo("<script>location.href='plan_details.php'</script>");   
}
?>
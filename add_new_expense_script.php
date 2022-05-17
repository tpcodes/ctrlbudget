<?php
include 'includes\common.php';
$id=$_SESSION['id'];
$plan_id=$_SESSION['plan_id'];

// Getting the values from the viewplan page using $_POST[] and cleaning the data submitted by the user.
$expense_title= mysqli_real_escape_string($con,$_POST['expensename']);
$date = mysqli_real_escape_string($con,$_POST['date']);
$amount_spent = mysqli_real_escape_string($con,$_POST['amount']);
$person_name = mysqli_real_escape_string($con,$_POST['person']);

// select query to fetch person_id from person_details table.
$query="select pr_id from person_details where name='$person_name' and plan_id='$plan_id'";
$query_result=mysqli_query($con,$query);
$row=mysqli_fetch_array($query_result);

$person_id= $row['pr_id'];

//function to check extension of image uploaded as a bill.
function GetImageExtension($imagetype)
{
  if(empty($imagetype)) return false;
  switch($imagetype)
  {
    case 'image/bmp':  return '.bmp';
    case 'image/gif':  return '.gif';
    case 'image/jpeg': return '.jpg';
    case 'image/png':  return '.png';
    default:           return false;
  }
}

if (!empty($_FILES["uploadedimage"]["name"])) {

  $file_name   = $_FILES["uploadedimage"]["name"];
  $temp_name   = $_FILES["uploadedimage"]["tmp_name"];
  $imgtype     = $_FILES["uploadedimage"]["type"];
  $ext         = GetImageExtension($imgtype);
  $imagename   = date("d-m-Y")."-".time().$ext;
  $target_path = "imageuploaded/".$imagename;

  if (move_uploaded_file($temp_name,$target_path)) {

    // insert query to insert person_id,expense_title,date,amount_spent,per_name, image_path into add_new_expense table when BILL IS UPLOADED .
    $select_query= "insert into add_new_expense (person_id,expense_title,date,amount_spent,per_name, image_path) values('$person_id','$expense_title','$date','$amount_spent','$person_name', '$target_path') ";
    $query_result=mysqli_query($con,$select_query); 

    // redirecting to viewplan page.
    header('location:viewplan.php');
  } 
  else {
    exit("Error While uploading image on the server");
  } 
}
else {

    // insert query to insert person_id,expense_title,date,amount_spent,per_name, image_path into add_new_expense table when BILL IS NOT UPLOADED .
    $select_query= "insert into add_new_expense (person_id,expense_title,date,amount_spent,per_name) values('$person_id','$expense_title','$date','$amount_spent','$person_name') ";
    $query_result=mysqli_query($con,$select_query);

    // redirecting to viewplan page. 
    header('location:viewplan.php'); 
} 

?>

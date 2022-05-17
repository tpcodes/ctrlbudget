<?php
include 'includes\common.php';
$email = mysqli_real_escape_string($con,$_POST['email']);
$password = mysqli_real_escape_string($con,$_POST['password']);
// encryption of password.
$password=md5($password);
//Select_ Query checks if the email and password are present in the database.
$select_query= " select id,email from users where email='$email' and password='$password'";
$user_result=mysqli_query($con,$select_query);
$no_of_users=mysqli_num_rows($user_result);
// If the email and password are not present in the database, the mysqli_num_rows returns 0, it is assigned to $no_of_users.
if($no_of_users == 0){
  echo("<script>alert('Email or Password is incorrect!')</script>");
  echo("<script>location.href='login.php'</script>");
}
else{
    $row=mysqli_fetch_array($user_result) ;  
    $_SESSION['email']=$email;
    $_SESSION['id']= $row[0];
    header('location:home.php'); 
}
?>
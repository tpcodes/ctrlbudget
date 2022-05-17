<?php
include 'includes\common.php';

// This page updates the user password
$new_password = mysqli_real_escape_string($con,$_POST['new_password']);
$re_type_new_password = mysqli_real_escape_string($con,$_POST['re_type_new_password']);
$password = mysqli_real_escape_string($con,$_POST['old_password']);

// form validation pattern.
$regex_password = "/(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/";
// end.

$new=md5($new_password);
$password=md5($password);
// select query to check whether entered password and user's password is same or not. 
$query="select password from users where password='$password'";
$query_result=mysqli_query($con,$query);
$row=mysqli_fetch_array($query_result);
$n = $row[0];
  if($n==$password)
  {
    if(!preg_match($regex_password, $new_password))                             // validating user entered new password.   
    {
      echo("<script>alert('Password must contain UpperCase, LowerCase, Number/SpecialChar and min 6 Characters!')</script>");
      echo("<script>location.href='settings.php'</script>"); 
    }  
    else if($new_password != $re_type_new_password)             
    {
      echo("<script>alert('New Password and Confirm New Password are different!')</script>");
      echo("<script>location.href='settings.php'</script>");  
    } 
    else if($new_password == $re_type_new_password) 
    {          
      $s_query="update users set password='$new' where  password='$password'";    // update query to update user's password.
      $s_query_result=mysqli_query($con,$s_query);
      echo("<script>alert('Password Updated Successfully!')</script>");
      echo("<script>location.href='index.php'</script>");
      session_destroy();
    }
  }
  else{
    echo("<script>alert('Incorrect old password!')</script>");
    echo("<script>location.href='settings.php'</script>");
  }
?>

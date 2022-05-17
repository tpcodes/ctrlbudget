 <?php
require 'includes\common.php';
// Getting the values from the signup page using $_POST[] and cleaning the data submitted by the user.

$email = mysqli_real_escape_string($con,$_POST['email']);
$password1 = mysqli_real_escape_string($con,$_POST['password']);
$name = mysqli_real_escape_string($con,$_POST['name']);
$contact = $_POST['contact']; 

// form validation patterns.
$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
$regex_password = "/(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/";
$regex_num = "/^[789][0-9]{9}$/"; 
// end.

$password=md5($password1);                                             // encrypting user entered password.

$query="select email from users where email='$email'" or die(mysqli_error($con));
$query_result=mysqli_query($con,$query);
$n=mysqli_num_rows($query_result);

if($n>0){
   echo("<script>alert('Email address is already registered!')</script>");
   echo("<script>location.href='signup.php'</script>");   
 } else if (!preg_match($regex_email, $email)) {                      // validating user entered e-mail.               
   echo("<script>alert('Not a valid Email Id')</script>");
   echo("<script>location.href='signup.php'</script>");                    
 } else if (!preg_match($regex_num, $contact)) {                      // validating user entered contact no.  
   echo("<script>alert('Not a valid phone number')</script>");
   echo("<script>location.href='signup.php'</script>");
 } else if (!preg_match($regex_password, $password1)) {                // validating user entered password.       
   echo("<script>alert('Password must contain UpperCase, LowerCase, Number/SpecialChar and min 6 Characters')</script>");
   echo("<script>location.href='signup.php'</script>");
 }
else{
  // insert query to enter info. of user in users table.
   $user_registration_query = "insert into users(email,name,contact,password) values ('$email', '$name', '$contact', '$password')"; 
   $user_registration_submit = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
   $_SESSION['id']=mysqli_insert_id($con); 
   $_SESSION['email']=$email;
   echo("<script>alert('User successfully registered!')</script>");
   echo("<script>location.href='home.php'</script>"); }
?>








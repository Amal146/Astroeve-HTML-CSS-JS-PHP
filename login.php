<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, ($_POST['password']));

   $select_members = mysqli_query($conn, "SELECT * FROM `account` WHERE Email_adresse = '$email' AND Password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_members) > 0){

      $row = mysqli_fetch_assoc($select_members);

         $_SESSION['member_email'] = $row['Email_adresse'];
         $_SESSION['member_id'] = $row['Member_id'];
         header('location:home.php');
         $message[] = 'successful connection!';


   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body >

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
   
<div class="form-container" style=" background-image : url('/projet/bklogin.jpg'); background-repeat: no-repeat ;background-size: cover; ">

   <form action="" method="post">
      <h3>login now</h3>
      <img src="logo.png" alt="" style="width:150px;height:60px;">
      <input type="email" name="email" placeholder="enter your email" required class="box">
      <input type="password" name="password" placeholder="enter your password" required class="box">
      <input type="submit" name="submit" value="login now" class="btn">
      <p>don't have an account? <a href="register.php">register now</a></p>
   </form>

</div>

</body>
</html>
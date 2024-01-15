<?php

include 'config.php';

session_start();

$member_id = $_SESSION['member_id'];

if(!isset($member_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_favorit'])){

   $book_id = $_POST['book_id'];

   $check_favorit = mysqli_query($conn, "SELECT * FROM `personal_library` WHERE book_id = '$book_id' AND Member_id = '$member_id'");

   if(mysqli_num_rows($check_favorit) > 0){
      $message[] = 'already added to favorit!';
   }else{
      mysqli_query($conn, "INSERT INTO `personal_library`(member_id,book_id) VALUES('$member_id', '$book_id'");
      $message[] = 'book added to favorit!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Event</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading" style="background-image : url('/projet/event.jpg'); background-repeat: no-repeat ;background-size:cover ;opacity:0.7 ;">
   <h3 style="color:white">Events Schedule</h3>
   <p> <a href="home.php">home</a> / events </p>
</div>

<section class="placed-events">

   <h1 class="title">nearest events</h1>

   <div class="box-container">

      <?php
         $event_query = mysqli_query($conn, "SELECT * FROM `events`") or die('query failed');
         if(mysqli_num_rows($event_query) > 0){
            while($fetch_events = mysqli_fetch_assoc($event_query)){
      ?>
      <div class="box">
         <p><?php echo $fetch_events['event_name']; ?></p>
         <h2> <h1>date : </h1><span><?php echo $fetch_events['event_date']; ?></span> </h2>
         <h2> <h1>description : </h1><span><?php echo $fetch_events['event_description']; ?></span> </h2>
         </div>
      <?php
       }
      }else{
         echo '<p class="empty">no events placed yet!</p>';
      }
      ?>
   </div>

</section>



<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="script.js"></script>

</body>
</html>
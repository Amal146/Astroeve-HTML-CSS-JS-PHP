<?php

include 'config.php';

session_start();

$member_id = $_SESSION['member_id'];

/*if(!isset($user_id)){
   header('location:login.php');
}*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading" style="background-image : url('/projet/bkab.png'); background-repeat: no-repeat ;background-size:cover ;opacity:1 ;">
   <h3>about us</h3>
   <p> <a href="home.php">home</a> / about </p>
</div>

<section class="about">

   <div class="flex">

      <div class="image">
          <video height='700px' width='500px' autoplay muted loop>
            <source src="Satellite Docking in a Space Shuttle.mp4" type="video/mp4">
            Your browser does not support the video tag.
         </video>
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>Astroeve is a scientific website where you are able to dive into the world of Astronomy by knowing the latest news ,downloadnig the best astronomy related books for free and following the nearest events .Our mission is to make it easy for every one to improve theire knowledge about the astronomy universe via relable resources. </p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>

<section class="resource">

   <h1 class="title">greate resources</h1>

   <div class="box-container">

      <div class="box">
         <img src="/projet/spacecom.png" alt="" object-fit="cover">
         <a href="https://www.space.com/"><h3>Space.com</h3></a>
      </div>

      <div class="box">
         <img src="/projet/nasacom.jpeg" alt="" object-fit="cover">
         <a href="https://www.nasa.gov/"><h3>Nasa.gov</h3></a>
      </div>

      <div class="box">
         <img src="/projet/astrocom.jpeg" alt="" object-fit="cover">
         <a href="https://www.astronomy.com/"><h3>astronomy.com</h3></a>
      </div>

   </div>

</section>







<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
<?php

include 'config.php';

session_start();

$member_id = $_SESSION['member_id'];

if(!isset($member_id)){
   header('location:login.php');
}

/*if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="section">

<h1>Get the latest space exploration, innovation and astronomy news.</h1>
<a href="about.php" class="white-btn">discover more</a>

<div class="video-container">
    <div class="color-overlay"></div>
    <video autoplay loop muted>
        <source src="video.mp4" type="video/mp4">
    </video>
</div>

</section>


<section class="news" >
<h1 class="title">latest news</h1>
<div class="box-container" >
<?php
      $news_query = mysqli_query($conn, "SELECT * FROM `news` LIMIT 3") or die('query failed');
      if(mysqli_num_rows($news_query) > 0){
         while($fetch_news = mysqli_fetch_assoc($news_query)){
   ?>
   <div class="box">
   <img class="image" src="/projet/news/<?php echo $fetch_news['Title']; ?>.jpeg" alt="" >
      <h3><?php echo $fetch_news['Title']; ?></h3>
      <p><?php echo $fetch_news['year']; ?>/<?php echo $fetch_news['collection']; ?>/<?php echo $fetch_news['Topic']; ?></p>
      </div>
   <?php
    }
   }else{
      echo '<p class="empty">no news added yet!</p>';
   }
   ?>
   <a href="news.php" class="option-btn" class="load-btn" style="margin-top: 2rem; text-align:center"><h1>load more</h1></a>
</div>
</section>

<section class="about">

   <div class="flex">
         <div>
          <video height='400px' width='500px' autoplay loop muted>
            <source src="Satellite Docking in a Space Shuttle.mp4" type="video/mp4">
            Your browser does not support the video tag.
          </video>
         </div>
      <div class="content">
         <h3>about us</h3>
         <p>Astroeve is a scientific website where you are able to dive into the world of Astronomy by knowing the latest news ,downloadnig the best astronomy related books for free and following the nearest events .</p>
         <a href="about.php" class="btn">read more</a>
      </div>

   </div>

</section>

<section class="home-contact" style="">

   <div class="content">
      <h3>have any questions?</h3>
      <p>If you have any questions our staff will always be happy to help.Feel free to contact us and we will be sure to get back to you as soon as possible </p>
      <a href="contact.php" class="white-btn">contact us</a>
   </div>

</section>





<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
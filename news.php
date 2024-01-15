<?php

include 'config.php';

session_start();

$member_id = $_SESSION['member_id'];

if(!isset($member_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>News</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading"style="background-image : url('/projet/news/news.jpg'); background-repeat: no-repeat ;background-size:cover ;opacity:1 ;">
   <h3 style="color:white">News</h3>
   <p> <a href="home.php">home</a> / news </p>
</div>

<section class="news" >

   <h1 class="title">latest news</h1>

   <div class="box-container" >

   <?php
         $news_query = mysqli_query($conn, "SELECT * FROM `news`") or die('query failed');
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
   </div>

</section>




<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
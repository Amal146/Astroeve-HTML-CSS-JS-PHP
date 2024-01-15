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
   <title>Our Library</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading" style="background-image : url('/projet/astro books/library.jpg'); background-repeat: no-repeat ;background-size:cover ;opacity:0.7 ;">
   <h3 style="color:white">our library</h3>
   <p> <a href="home.php">home</a> / library </p>
</div>

<section class="books" >

   <h1 class="title">latest books</h1>

   <div class="box-container" >

      <?php  
         $select_books = mysqli_query($conn, "SELECT * FROM `library`") or die('query failed');
         if(mysqli_num_rows($select_books) > 0){
            while($fetch_books = mysqli_fetch_assoc($select_books)){
      ?>
     <form action="" method="post" class="box" >
      <div class="name"><?php echo $fetch_books['name']; ?></div><br>
      <img class="image" src="/projet/astro books/<?php echo $fetch_books['book_id']; ?>.jpg" alt="" ><br>
      <div class="source"><?php echo $fetch_books['source']; ?></div>
      <input type="hidden" name="book_id" value="<?php echo $fetch_books['book_id']; ?>">
      <div>
      <input type="submit" value="add to favorit" name="add_to_favorit" class="btn">
      <a href="<?php echo $fetch_books['pdf_doc_link']; ?>"><input type="button" value="Download" name="Download" class="btn"></a>
      </div>
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">no books added yet!</p>';
      }
      ?>
   </div>

</section>




<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
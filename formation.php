<?php

include '../front/connexion.php';





if(isset($_POST['add_formation'])){

   $nom = mysqli_real_escape_string($con, $_POST['nom']);
   $date = $_POST['date'];
   

   $select_formation_nom = mysqli_query($con, "SELECT nom  FROM formation WHERE nom = '$nom'") or die('query failed');

   if(mysqli_num_rows($select_formation_nom) > 0){
      $message[] = 'formation name already added';
   }else{
      $add_formation_query = mysqli_query($con, "INSERT INTO formation ( nom , date) VALUES('$nom', '$date')") or die('query failed');

      
   }
}

if(isset($_GET['delete'])){
   $delete_idF = $_GET['delete'];
  
  
   mysqli_query($con, "DELETE FROM formation WHERE idF = '$delete_idF'") or die('query failed');
   header('location:formation.php');
}

if(isset($_POST['update_formation'])){

   $update_idF = $_POST['update_idF'];
   $update_nom = $_POST['update_nom'];
   $update_date = $_POST['update_date'];

   mysqli_query($con, "UPDATE `formation` SET nom = '$update_nom', date = '$update_date' WHERE idF = '$update_idF'") or die('query failed');



   
   header('location:formation.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> formation </title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="dab.css">

</head>
<body>
   
<?php include 'back.php'; ?>

<!-- product CRUD section starts  -->

<section class="add-formation">

   <h1 class="title">` LES FORMATIONS `</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <h3>add formation</h3>
      <input type="text" name="nom" class="box" placeholder="enter formation name" required>
      <input type="date"  name="date" class="box" placeholder="" required>
      
      <input type="submit" value="add formation" name="add_formation" class="btn">
   </form>

</section>

<!-- product CRUD section ends -->

<!-- show products  -->

<section class="show-formation">

   <div class="box-container">

      <?php
         $select_formation = mysqli_query($con, "SELECT * FROM formation") or die('query failed');
         if(mysqli_num_rows($select_formation) > 0){
            while($fetch_formation = mysqli_fetch_assoc($select_formation)){
      ?>
      <div class="box">
         
         <div class="nom"><?php echo $fetch_formation['nom']; ?></div>
         <div class="date">$<?php echo $fetch_formation['date']; ?>/-</div>
         <a href="formation.php?update=<?php echo $fetch_formation['idF']; ?>" class="option-btn">update</a>
         <a href="formation.php?delete=<?php echo $fetch_formation['idF']; ?>" class="delete-btn" onclick="return confirm('delete this formation?');">delete</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no formation added yet!</p>';
      }
      ?>
   </div>

</section>

<section class="edit-formation-form">

   <?php
      if(isset($_GET['update'])){
         $update_idF = $_GET['update'];
         $update_query = mysqli_query($con, "SELECT * FROM formation WHERE idF = '$update_idF'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_idF" value="<?php echo $fetch_update['idF']; ?>">
     
   
      <input type="text" name="update_nom" value="<?php echo $fetch_update['nom']; ?>" class="box" required placeholder="enter formation name">
      <input type="date" name="update_date" value="<?php echo $fetch_update['date']; ?>"  class="box" required placeholder="">
      
      <input type="submit" value="update" name="update_formation" class="btn">
     
   </form>
   <?php
         }
      }
      }else{
         echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
   ?>

</section>







<!-- custom admin js file link  -->
<script src="script.js"></script>

</body>
</html>


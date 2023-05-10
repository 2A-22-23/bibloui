<?php

include '../front/connexion.php';


function get_formations_by_event_id($event_id){
   global $con;
   $query = "SELECT formation.* FROM formation JOIN evenement ON formation.event_id = event.id WHERE event.id = '$event_id'";
   $result = mysqli_query($con, $query) or die('query failed');
   return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


if(isset($_POST['add_event'])){

   $nom = mysqli_real_escape_string($con, $_POST['nom']);
   $date = $_POST['date'];
   $image = $_FILES['image']['name'];
   
  

   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;
 

   $select_event_nom = mysqli_query($con, "SELECT nom  FROM évènement WHERE nom = '$nom'") or die('query failed');

   if(mysqli_num_rows($select_event_nom) > 0){
      $message[] = 'event name already added';
   }else{
      $add_event_query = mysqli_query($con, "INSERT INTO évènement ( nom , date, image) VALUES('$nom', '$date', '$image')") or die('query failed');

      if($add_event_query){
         if($image_size > 2000000){
            $message[] = 'image size is too large';
         }else{
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'event added successfully!';
         }
      }else{
         $message[] = 'event could not be added!';
      }
   }
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_image_query = mysqli_query($con, "SELECT image FROM évènement WHERE id = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
   unlink('uploaded_img/'.$fetch_delete_image['image']);
   mysqli_query($con, "DELETE FROM évènement WHERE id = '$delete_id'") or die('query failed');
   header('location:evenement.php');
}

if(isset($_POST['update_event'])){

   $update_id = $_POST['update_id'];
   $update_nom = $_POST['update_nom'];
   $update_date = $_POST['update_date'];
  

   mysqli_query($con, "UPDATE `évènement` SET nom = '$update_nom', date = '$update_date' WHERE id = '$update_id'") or die('query failed');

   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_folder = 'uploaded_img/'.$update_image;
   $update_old_image = $_POST['update_old_image'];



   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image file size is too large';
      }else{
         mysqli_query($con, "UPDATE évènement SET image = '$update_image' WHERE id = '$update_id'") or die('query failed');
         move_uploaded_file($update_image_tmp_name, $update_folder);
         unlink('uploaded_img/'.$update_old_image);
      }
   }

   header('location:evenement.php');

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>évènement</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="page.css">
  
   
</head>
<body>
   
<?php include 'back.php';
?>

<!-- product CRUD section starts  -->

<section class="add-event">

   <h1 class="title">` LES EVENEMENTS `</h1>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3>add event</h3>
      <input type="text" name="nom" class="box" placeholder="enter event name" required>
      <input type="date"  name="date" class="box" placeholder="" required>
      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
      
      <input type="submit" value="add event" name="add_event" class="btn">
      
      
   </form>
   <br><br>
      
      <a href="calendar.html"><button>voir le calendrier</button></a>

</section>

<!-- product CRUD section ends -->

<!-- show products  -->

<section class="show-event">

   <div class="box-container">

      <?php
         $select_event = mysqli_query($con, "SELECT * FROM évènement") or die('query failed');
         if(mysqli_num_rows($select_event) > 0){
            while($fetch_event = mysqli_fetch_assoc($select_event)){
      ?>
      <div class="box">
         <img src="uploaded_img/<?php echo $fetch_event['image']; ?>" alt="">
         <div class="nom"><?php echo $fetch_event['nom']; ?></div>
         <div class="date">$<?php echo $fetch_event['date']; ?>/-</div>
         <script src="calen.js"></script>
         <a href="evenement.php?update=<?php echo $fetch_event['id']; ?>" class="option-btn">update</a>
         <a href="evenement.php?delete=<?php echo $fetch_event['id']; ?>" class="delete-btn" onclick="return confirm('delete this event?');">delete</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no events added yet!</p>';
      }
      ?>
   </div>

</section>

<section class="edit-event-form">

   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $update_query = mysqli_query($con, "SELECT * FROM évènement WHERE id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_id" value="<?php echo $fetch_update['id']; ?>">
      <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
      <img src="uploaded_img/<?php echo $fetch_update['image']; ?>" alt="">
      <input type="text" name="update_nom" value="<?php echo $fetch_update['nom']; ?>" class="box" required placeholder="enter event name">
      <input type="date" name="update_date" value="<?php echo $fetch_update['date']; ?>"  class="box" required placeholder="">
      <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
      
      <input type="submit" value="update" name="update_event" class="btn">
      <input type="reset" value="cancel" id="close-update" class="option-btn">
   
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
<script src="script.js">
  
</script>

</body>
</html>




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
   
<?php 
      include 'search.php';?>

<!-- product CRUD section starts  -->


<!-- show products  -->

<section class="show-event">
<a href="form.php" class="button">Accéder à la page formation</a> <!-- Ajout du bouton -->

   <div class="box-container">

      <?php 
     
      include 'connexion.php';
      
         $select_event = mysqli_query($con, "SELECT nom, date, image FROM évènement") or die('query failed');
         if(mysqli_num_rows($select_event) > 0){
            while($fetch_event = mysqli_fetch_assoc($select_event)){
      ?>
      <h1 class="title">latest events</h1>
      <div class="box">
         <img src="uploaded_img/<?php echo $fetch_event['image']; ?>" alt="">
         <div class="nom"><?php echo $fetch_event['nom']; ?></div>
         <div class="date"><?php echo $fetch_event['date']; ?></div>
      

         
      </div>
      <?php
         }
      }
      ?>

   </div>

</section>



</body>
</html>

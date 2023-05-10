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
      <link rel="stylesheet" href="ress.css">
   </head>
   <body>

      <?php  include 'search.php';?>

      <!-- show events section starts  -->
      <section class="show-event">
         <a href="form.php" class="button">Accéder à la page formation</a>
         <a href="rating.php" class="button"> rating events  </a> 
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
               <form action="submit_reservation.php" method="post">
                  <label for="nom">Nom :</label>
                  <input type="text" id="nom" name="nom" required>
                  <label for="email">Email :</label>
                  <input type="email" id="email" name="email" required>
                  <input type="hidden" id="event" name="event" value="<?php echo $fetch_event['nom']; ?>">
                  <button type="submit">Réserver</button>
               </form>
            </div>
            <?php
                  }
               }
            ?>
         </div>
      </section>

   </body>
</html>

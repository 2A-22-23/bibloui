<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> formation</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="fr.css">
   
</head>
<body>
<a href="home.php" class="button">Accéder à la page home</a>
  


<!-- product CRUD section starts  -->




<section class="show-formation">

   <div class="box-container">

      <?php 
     
      include 'connexion.php';
      
      $select_formation = mysqli_query($con, "SELECT nom, date FROM formation") or die('query failed');
      if(mysqli_num_rows($select_formation) > 0){
          while($fetch_formation = mysqli_fetch_assoc($select_formation)){
             
      ?>
      
      
      <div class="box">
      <a href="rating.php" class="button"> rating Formation  </a> 
      <h1 class="title"> Formation</h1>
         <div class="nom"><?php echo $fetch_formation['nom']; ?></div>
         <div class="date"><?php echo $fetch_formation['date']; ?></div>
         
      </div>
      
      <?php
         }
      }
      ?>

   </div>

</section>


</body>
</html>
<style>
    /* Insérez ici la définition de la classe "button" */
    .button {
      display: inline-block;
      padding: 8px 16px;
      font-size: 16px;
      font-weight: bold;
      text-align: center;
      text-decoration: none;
      background-color: #9a9a9a;
      color: white;
      border-radius: 4px;
      border: none;
    }

    .button:hover {
      background-color: #3e8e41;
      cursor: pointer;
    }
  </style>
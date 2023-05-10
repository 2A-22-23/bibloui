<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="style.css" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>Page des categories des LIVRES</title>
    </head>
    <body>

    <h1>La liste  par categorie DISPONIBLE</h1> <hr>
<table border="1" width="90%">
    <tr>
        <th>TITRE</th>
        <th>CATEGORIE</th>
        <th>ID</th>
        <th></th>

    </tr>

    <?php

 include '../front/connexion.php';

$requete="SELECT * FROM `categorieliv` ";
$query=mysqli_query($con,$requete);
while($rows=mysqli_fetch_assoc($query)){
    $id_c=$rows['id_c'];
   echo "<tr>";
   echo "<td>".$rows['titre']."</td>";
   echo "<td>".$rows['categorie']."</td>";
   echo "<td>".$rows['id']."</td>";
   echo"<td><a href='suppcat.php?id_c=".$id_c."'>supprimer</a></td>";
   echo"<td><a href='livrecat.php?id_c=".$id_c."'>modifier</a></td>";
   echo "</tr>";
 

}

if (isset($_GET['id_c'])){
    $titre=$_POST['titre'];
    $categorie=$_POST['categorie'];
    $id=$_POST['id'];
    $id_c=$_POST['id_c'];
   $sql="UPDATE `categorieliv` SET `titre`='$titre', `categorie`='$id', `categorie`='$id' WHERE `id_c`='$id_c'";

   $q=mysqli_query($con,$sql);
   if (isset($q)){
    echo "<h1>MODIFICATION AVEC SUCCESS</h1>";

}else{
  

$titre=$_POST['titre'];
$categorie=$_POST['categorie'];
$id=$_POST['id'];

$requete = "INSERT INTO `categorieliv`(`titre`, `categorie`,`id`) VALUES ('$titre','$categorie','$id')";

$query=mysqli_query($con,$requete);
if(isset($query)){
    echo "<h1>INSERTION AVEC SUCCESS</h1>";
}else{
    echo "<h1>ERREUR D INSERTION</h1>";   

}
}
}
?>
</table>


</body>
 </html>
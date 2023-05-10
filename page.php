<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="style.css" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>Page des LIVRES</title>
    </head>
    <body>

    <h1>LES LIVRES DISPONIBLE</h1> <hr>
<table border="1" width="90%">
    <tr>
        <th>TITRE</th>
        <th>AUTEUR</th>
    </tr>

    <?php

 include '../front/connexion.php';

$requete="SELECT * FROM `livre` ";
$query=mysqli_query($con,$requete);
while($rows=mysqli_fetch_assoc($query)){
    $id=$rows['id'];
   echo "<tr>";
   echo "<td>".$rows['titre']."</td>";
   echo "<td>".$rows['auteur']."</td>";
   echo"<td><a href='supp.php?id=".$id."'>supprimer</a></td>";
   echo"<td><a href='livre.php?id=".$id."'>modifier</a></td>";
   echo "</tr>";
 

}

if (isset($_GET['id'])){
    $titre=$_POST['titre'];
    $auteur=$_POST['auteur'];
    $id=$_POST['id'];
   $sql="UPDATE `livre` SET `titre`='$titre', `auteur`='$auteur' WHERE `id`='$id'";

   $q=mysqli_query($con,$sql);
   if (isset($q)){
    echo "<h1>MODIFICATION AVEC SUCCESS</h1>";

}else{
  

$titre=$_POST['titre'];
$auteur=$_POST['auteur'];

$requete = "INSERT INTO `livre`(`titre`, `auteur`) VALUES ('$titre','$auteur')";

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
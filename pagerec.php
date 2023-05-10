<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="style.css" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>Page des reclamations</title>
    </head>
    <body>

    <h1>La liste Des RECLAMATIONS</h1> <hr>
<table border="1" width="90%">
    <tr>
        <th>nom</th>
        <th>mail</th>
        <th>numero</th>
        <th>text</th>
        <th></th>

    </tr>

    <?php

 include '../front/connexion.php';

$requete="SELECT * FROM `reclamation` ";
$query=mysqli_query($con,$requete);
while($rows=mysqli_fetch_assoc($query)){
    $id_rec=$rows['id_rec'];
   echo "<tr>";
   echo "<td>".$rows['nom']."</td>";
   echo "<td>".$rows['mail']."</td>";
   echo "<td>".$rows['numero']."</td>";
   echo "<td>".$rows['texte']."</td>";
   echo"<td><a href='supprec.php?id_rec=".$id_rec."'>supprimer</a></td>";
   echo"<td><a href='reclamation.php?id_rec=".$id_rec."'>modifier</a></td>";
   echo "</tr>";
}

if (isset($_GET['id_rec'])){
    $id=$_GET['id_rec'];
    $nom=$_POST['nom'];
    $mail=$_POST['mail'];
    $numero=$_POST['numero'];
    $texte=$_POST['texte'];

   $sql="UPDATE `reclamation` SET `nom`='$nom', `mail`='$mail', `numero`='$numero', `texte`='$texte' WHERE `id_rec`='$id'";

   $q=mysqli_query($con,$sql);
   if (isset($q)){
    echo "<h1>MODIFICATION AVEC SUCCESS</h1>";

}else{
  
$nom=$_POST['nom'];
$mail=$_POST['mail'];
$numero=$_POST['numero'];
$texte=$_POST['texte']; 
$requete = "INSERT INTO `reclamation`(`nom`, `mail`,`numero`,`texte`) VALUES ('$nom','$mail','$numero','$texte')";

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
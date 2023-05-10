<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="style.css" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>Page des REPONSES </title>
    </head>
    <body>

    <h1>LES REPONSES ENVOYEES</h1> <hr>
<table border="1" width="90%">
    <tr>
        <th>NOMR</th>
        <th>MAILR</th>
        <th>REPONSE</th>
    </tr>

    <?php

 include '../front/connexion.php';

$requete="SELECT * FROM `reponse` ";
$query=mysqli_query($con,$requete);
while($rows=mysqli_fetch_assoc($query)){
    $id_rep=$rows['id_rep'];
   echo "<tr>";
   echo "<td>".$rows['nomR']."</td>";
   echo "<td>".$rows['mailR']."</td>";
   echo "<td>".$rows['REP']."</td>";
   echo"<td><a href='supprep.php?id_rep=".$id_rep."'>supprimer</a></td>";
   echo"<td><a href='reponse.php?id_rep=".$id_rep."'>modifier</a></td>";
   echo "</tr>";
 

}

if (isset($_GET['id_rep'])){
    $nomR=$_POST['nomR'];
    $mailR=$_POST['mailR'];
    $REP=$_POST['REP'];
    $id_rep=$_POST['id_rep'];
   $sql="UPDATE `reponse` SET `nomR`='$nomR', `mailR`='$mailR, `REP`='$REP' WHERE `id_rep`='$id_rep'";

   $q=mysqli_query($con,$sql);
   if (isset($q)){
    echo "<h1>MODIFICATION AVEC SUCCESS</h1>";

}else{
  

$nomR=$_POST['nomR'];
$mailR=$_POST['mailR'];
$REP=$_POST['REP'];

$requete = "INSERT INTO `reponse`(`nomR`, `mailR`, `REP`) VALUES ('$nomR','$mailR','$REP')";

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




 
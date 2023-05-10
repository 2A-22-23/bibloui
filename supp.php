<?php 

include '../front/connexion.php';
$id=$_GET['id'];
$sql=" DELETE FROM `livre` WHERE id='$id' ";

$query=mysqli_query($con,$sql);
if(isset($query)){
    echo "<h1>SUPRESSION AVEC SUCCESS</h1>";
}else{
    echo "<h1>ERREUR De SUPRESSION</h1>";   
}
?>
<?php 

include '../front/connexion.php';
$id_c=$_GET['id_c'];
$sql=" DELETE FROM `categorieliv` WHERE id_c='$id_c' ";

$query=mysqli_query($con,$sql);
if(isset($query)){
    echo "<h1>SUPRESSION AVEC SUCCESS</h1>";
}else{
    echo "<h1>ERREUR De SUPRESSION</h1>";   
}
?>
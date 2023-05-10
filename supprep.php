<?php 

include '../front/connexion.php';
$id_rep=$_GET['id_rep'];
$sql=" DELETE FROM `reponse` WHERE id_rep ='$id_rep' ";

$query=mysqli_query($con,$sql);
if(isset($query)){
    echo "<h1>SUPRESSION AVEC SUCCESS</h1>";
    ?>
    <script>
        window.location="pagerep.php";
        </script>
    <?php
}else{
    echo "<h1>ERREUR De SUPRESSION</h1>";   
}
?>



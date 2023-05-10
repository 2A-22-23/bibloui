<?php 

include '../front/connexion.php';
$id_rec=$_GET['id_rec'];
$sql=" DELETE FROM `reclamation` WHERE id_rec='$id_rec' ";

$query=mysqli_query($con,$sql);
if(isset($query)){
    echo "<h1>SUPRESSION AVEC SUCCESS</h1>";
    ?>
    <script>
        window.location="pagerec.php";
        </script>
    <?php
}else{
    echo "<h1>ERREUR De SUPRESSION</h1>";   
}
?>
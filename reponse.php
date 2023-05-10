<?php 
include '../front/connexion.php';




if(isset($_POST['nomR']) && isset($_POST['mailR']) && isset($_POST['REP']) && isset($_POST['id_rep'])) {
    $nomR = $_POST['nomR'];
    $mailR = $_POST['mailR'];
    $REP = $_POST['REP'];
    $id_rep = $_POST['id_rep'];

    // Vérifier si le formulaire est en mode mise à jour ou ajout
    if(isset($_GET['id_rep'])) {
        // Mode mise à jour
        $id_rep = $_GET['id_rep'];
        $sql = "UPDATE `reponse` SET `nomR`='$nomR', `mailR`='$mailR', `REP`='$REP' WHERE `id_rep`='$id_rep'";
    } else {
        // Mode ajout
        $sql = "INSERT INTO `reponse`(`nomR`, `mailR`,`REP`,`id_rep`) VALUES ('$nomR', '$mailR','$REP','$id_rep')";

		$q = mysqli_query($con, $sql);
		if($q) {
			echo "<h1>INSERTION AVEC SUCCESS</h1>";
		} else {
			echo "<h1>ERREUR LORS DE L'AJOUT : " . mysqli_error($con) . "</h1>";
		}
    }



	
 
}

// Afficher le formulaire
if(isset($_GET['id_rep'])) {
    $id_rep = $_GET['id_rep'];
    $sql = "SELECT * FROM `reponse` WHERE `id_rep`='$id_rep'";
    $q = mysqli_query($con, $sql);
    $rows = mysqli_fetch_assoc($q);
    $nomR= $rows['nomR'];
    $mailR = $rows['mailR'];
    $REP = $rows['REP'];
    $id_rep = $rows['id_rep'];
}

?>
<form method="post" action="pagerep.php<?php 
if(isset($_GET['id_rep'])) {
    echo "?id=" . $_GET['id_rep'] . "&amp;action=update";
}
?>">
    <br><br>
    <input type="hidden" name="id_rep" value="<?php echo isset($_GET['id_rep']) ? $_GET['id_rep'] : ''; ?>">
    <input type="text" name="nomR" placeholder="Entrer le nom " value="<?php echo isset($nomR) ? $nomR : ''; ?>"> <br><br>
    <input type="text" name="mailR" placeholder="Entrer le mail" value="<?php echo isset($mailR) ? $mailR : ''; ?>"> <br><br>
    <input type="text" name="REP" placeholder="Entrer la reponse" value="<?php echo isset($REP) ? $REP : ''; ?>"> <br><br>
    <input type="text" name="id" placeholder="Entrer l'id" value="<?php echo isset($id) ? $id : ''; ?>"> <br><br>
    <button type="submit">
        <?php
        if(isset($_GET['id_rep'])) {
            echo "modifier";
        } else {
            echo "envoyer";
        }
        ?>  
    </button>
</form>
<?php 
include '../front/connexion.php';




if(isset($_POST['titre']) && isset($_POST['auteur'])) {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];

    // Vérifier si le formulaire est en mode mise à jour ou ajout
    if(isset($_GET['id'])) {
        // Mode mise à jour
        $id = $_GET['id'];
        $sql = "UPDATE `livre` SET `titre`='$titre', `auteur`='$auteur' WHERE `id`='$id'";
    } else {
        // Mode ajout
        $sql = "INSERT INTO `livre`(`titre`, `auteur`) VALUES ('$titre', '$auteur')";

		$q = mysqli_query($con, $sql);
		if($q) {
			echo "<h1>INSERTION AVEC SUCCESS</h1>";
		} else {
			echo "<h1>ERREUR LORS DE L'AJOUT : " . mysqli_error($con) . "</h1>";
		}
    }



	
 
}

// Afficher le formulaire
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `livre` WHERE `id`='$id'";
    $q = mysqli_query($con, $sql);
    $rows = mysqli_fetch_assoc($q);
    $titre = $rows['titre'];
    $auteur = $rows['auteur'];
}

?>
<form method="post" action="page.php<?php 
if(isset($_GET['id'])) {
    echo "?id=" . $_GET['id'] . "&amp;action=update";
}
?>">
    <br><br>
    <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
    <input type="text" name="titre" placeholder="Entrer le titre du livre" value="<?php echo isset($titre) ? $titre : ''; ?>"> <br><br>
    <input type="text" name="auteur" placeholder="Entrer l'auteur du livre" value="<?php echo isset($auteur) ? $auteur : ''; ?>"> <br><br>
    <button type="submit">
        <?php
        if(isset($_GET['id'])) {
            echo "modifier";
        } else {
            echo "envoyer";
        }
        ?>  
    </button>
</form>

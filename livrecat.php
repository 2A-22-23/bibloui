<?php 
include '../front/connexion.php';




if(isset($_POST['titre']) && isset($_POST['categorie']) && isset($_POST['id'])) {
    $titre = $_POST['titre'];
    $categorie = $_POST['categorie'];
    $id = $_POST['id'];

    // Vérifier si le formulaire est en mode mise à jour ou ajout
    if(isset($_GET['id_c'])) {
        // Mode mise à jour
        $id_c = $_GET['id_c'];
        $sql = "UPDATE `categorieliv` SET `titre`='$titre', `auteur`='$categorie' WHERE `id_c`='$id_c'";
    } else {
        // Mode ajout
        $sql = "INSERT INTO `categorieliv`(`titre`, `categorie`,`id`) VALUES ('$titre', '$categorie','$id')";

		$q = mysqli_query($con, $sql);
		if($q) {
			echo "<h1>INSERTION AVEC SUCCESS</h1>";
		} else {
			echo "<h1>ERREUR LORS DE L'AJOUT : " . mysqli_error($con) . "</h1>";
		}
    }



	
 
}

// Afficher le formulaire
if(isset($_GET['id_c'])) {
    $id_c = $_GET['id_c'];
    $sql = "SELECT * FROM `categorieliv` WHERE `id_c`='$id_c'";
    $q = mysqli_query($con, $sql);
    $rows = mysqli_fetch_assoc($q);
    $titre = $rows['titre'];
    $categorie = $rows['categorie'];
    $id = $rows['id'];
}

?>
<form method="post" action="pagecat.php<?php 
if(isset($_GET['id_c'])) {
    echo "?id=" . $_GET['id_c'] . "&amp;action=update";
}
?>">
    <br><br>
    <input type="hidden" name="id_c" value="<?php echo isset($_GET['id_c']) ? $_GET['id_c'] : ''; ?>">
    <input type="text" name="titre" placeholder="Entrer le titre du livre" value="<?php echo isset($titre) ? $titre : ''; ?>"> <br><br>
    <input type="text" name="categorie" placeholder="Entrer la categorie livre" value="<?php echo isset($categorie) ? $categorie : ''; ?>"> <br><br>
    <input type="text" name="id" placeholder="Entrer l'id" value="<?php echo isset($id) ? $id : ''; ?>"> <br><br>
    <button type="submit">
        <?php
        if(isset($_GET['id_c'])) {
            echo "modifier";
        } else {
            echo "envoyer";
        }
        ?>  
    </button>
</form>
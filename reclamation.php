<?php 
include '../front/connexion.php';

if(isset ($_POST['submit']) && isset($_POST['nom']) && isset($_POST['mail'])&& isset($_POST['numero']) && isset($_POST['texte'])) {
    $nom = $_POST['nom'];
    $mail = $_POST['mail'];
    $numero = $_POST['numero'];
    $texte = $_POST['texte'];

    // Vérifier si le formulaire est en mode mise à jour ou ajout
    if(isset($_GET['submit'])) {
        // Mode mise à jour
        $id_rec = $_GET['id_rec'];
        $sql = "UPDATE reclamation SET nom='$nom', mail='$mail', numero='$numero', texte='$texte' WHERE id_rec='$id_rec'";
    } else {
        // Mode ajout
       // $sql = "INSERT INTO `reclamtion`(`nom`, `mail`, `numero`, `texte`) VALUES ('$nom', '$mail', '$numero', '$texte')";

		$q = mysqli_query($con, $sql);
		if($q) {
			echo "<h1>INSERTION AVEC SUCCESS</h1>";
		} else {
			echo "<h1>ERREUR LORS DE L'AJOUT : " . mysqli_error($con) . "</h1>";
		}
    
    }
 
}

// Afficher le formulaire
if(isset($_GET['id_rec'])) {
    $id_rec = $_GET['id_rec'];
    $sql = "SELECT * FROM `reclamation` WHERE `id_rec`='$id_rec'";
    $q = mysqli_query($con, $sql);
    $rows = mysqli_fetch_assoc($q);
    $nom = $rows['nom'];
    $mail= $rows['mail'];
    $numero= $rows['numero'];
    $texte= $rows['texte'];

}

?>
<form method="post" action="pagerec.php<?php 
if(isset($_GET['id_rec'])) {
    echo "?id_rec=" . $_GET['id_rec'] . "&amp;action=update";
}
?>">
    <br><br>
   
    <input type="text" name="nom" placeholder="Entrer le nom" value="<?php echo isset($nom) ? $nom : ''; ?>"> <br><br>
    <input type="text" name="mail" placeholder="Entrer le mail" value="<?php echo isset($mail) ? $mail : ''; ?>"> <br><br>
    <input type="text" name="numero" placeholder="Entrer le numero" value="<?php echo isset($numero) ? $numero : ''; ?>"> <br><br>
    <input type="text" name="texte" placeholder="Entrer votre reclamation" value="<?php echo isset($texte) ? $texte : ''; ?>"> <br><br>
    <input type="submit" name="submit" value="submit" >
    <button type="submit">
        <?php
        if(isset($_POST['submit'])) {
            echo "modifier";
        } else {
            echo "envoyer";
        }
        ?>  
    </button>
</form>

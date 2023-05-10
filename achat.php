<?php
session_start();
include '../front/connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['quantite'])) {
  $id = $_POST['id'];
  $quantite = $_POST['quantite'];

  // récupérer les détails de l'article
  $requete = "SELECT * FROM `livre` WHERE `id`='$id'";
  $query = mysqli_query($con, $requete);
  $titre = mysqli_fetch_assoc($query);

  // calculer le prix total
  $prixTotal = $titre['prix'] * $quantite;

  // enregistrer la vente dans la base de données
  $requete = "INSERT INTO `achat`(`idA`, `quantite`, `prixtotal`) VALUES ( '$id' ,'$quantite','$prixTotal')";
  $query = mysqli_query($con, $requete);

  if ($query) {
    $_SESSION['message'] = "Achat effectué avec succès";
  } else {
    $_SESSION['message'] = "Erreur lors de l'achat";
  }
}

header("Location: achat.php");
exit();
?>

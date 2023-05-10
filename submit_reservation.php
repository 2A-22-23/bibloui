<?php
// récupérer les données du formulaire
$nomr = $_POST['nom'];
$email = $_POST['email'];
$event = $_POST['event'];

// se connecter à la base de données
include 'connexion.php';

// préparer et exécuter la requête SQL pour insérer une nouvelle réservation
$insert_reservation = mysqli_prepare($con, "INSERT INTO reservation (nomr, email, event, date_reservation) VALUES (?, ?, ?, NOW())");
mysqli_stmt_bind_param($insert_reservation, 'sss', $nomr, $email, $event);
mysqli_stmt_execute($insert_reservation);

// rediriger l'utilisateur vers la page de confirmation
header('Location: confirmation.php');
exit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de réservation</title>
</head>
<body>
    <h1>Confirmation de réservation</h1>
    <?php
        if(isset($_GET['status']) && $_GET['status'] == 'success'){
            echo '<p>Votre réservation a été effectuée avec succès.</p>';
        } else {
            echo '<p>Une erreur est survenue lors de la réservation.</p>';
        }
    ?>
    <a href="home.php">Retour à la page d'accueil</a>
</body>
</html>

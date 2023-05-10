<?php
    include '../front/connexion.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $titre = $_POST['titre'];
        $auteur = $_POST['auteur'];

        // Vérifier si les champs sont vides
        if (empty($titre) || empty($auteur)) {
            echo "Veuillez remplir tous les champs.";
        } else {
            // Vérifier la longueur des champs
            if (strlen($titre) > 255 || strlen($auteur) > 255) {
                echo "Les champs ne doivent pas dépasser 255 caractères.";
            } else {
                // Éviter les attaques XSS
                $titre = htmlspecialchars($titre);
                $auteur = htmlspecialchars($auteur);

                $sql = "INSERT INTO livre (titre, auteur) VALUES ('$titre', '$auteur')";

                if (mysqli_query($con, $sql)) {
                    echo "Livre ajouté avec succès.";
                } else {
                    echo "Erreur : " . $sql . "<br>" . mysqli_error($con);
                }
            }
        }
    }
?>

<form method="post" action="">
    <label for="titre">Titre :</label><br>
    <input type="text" name="titre" id="titre"><br>

    <label for="auteur">Auteur :</label><br>
    <input type="text" name="auteur" id="auteur"><br>

    <input type="submit" value="Ajouter">
</form>

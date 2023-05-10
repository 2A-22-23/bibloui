<?php
    include '../front/connexion.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $titre = $_POST['titre'];
        $categorie = $_POST['categorie'];
        $id= $_POST['id'];

        // Vérifier si les champs sont vides
        if (empty($titre) || empty($categorie)|| empty($id)) {
            echo "Veuillez remplir tous les champs.";
        } else {
            // Vérifier la longueur des champs
            if (strlen($titre) > 255 || strlen($categorie) > 255|| strlen($id) > 255) {
                echo "Les champs ne doivent pas dépasser 255 caractères.";
            } else {
                // Éviter les attaques XSS
                $titre = htmlspecialchars($titre);
                $categorie = htmlspecialchars($categorie);
                $id = htmlspecialchars($id);

                $sql = "INSERT INTO categorieliv (titre, categorie,id) VALUES ('$titre', '$categorie','$id')";

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

    <label for="categorie">categorie :</label><br>
    <input type="text" name="categorie" id="categorie"><br>

    <label for="id">id :</label><br>
    <input type="text" name="id" id="id"><br>

    <input type="submit" value="Ajouter">
</form>

<?php
    include '../front/connexion.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nomR = $_POST['nomR'];
        $mailR = $_POST['mailR'];
        $REP = $_POST['REP'];
        $id_rep= $_POST['id_rep'];

        // Vérifier si les champs sont vides
        if (empty($nomR) || empty($mailR)|| empty($REP)|| empty($id_rep)) {
            echo "Veuillez remplir tous les champs.";
        } else {
            // Vérifier la longueur des champs
            if (strlen($nomR) > 255 || strlen($mailR) > 255|| strlen($REP) > 255|| strlen($id_rep) > 255) {
                echo "Les champs ne doivent pas dépasser 255 caractères.";
            } else {
                // Éviter les attaques XSS
                $nomR = htmlspecialchars($nomR);
                $mailR = htmlspecialchars($mailR);
                $REP = htmlspecialchars($REP);
                $id_rep = htmlspecialchars($id_rep);

                $sql = "INSERT INTO reponse (nomR, mailR,REP,id_rep) VALUES ('$nomR', '$mailR','$REP','$id_rep')";

                if (mysqli_query($con, $sql)) {
                    echo "Reponse ajouté avec succès.";
                } else {
                    echo "Erreur : " . $sql . "<br>" . mysqli_error($con);
                }
            }
        }
    }
?>

<form method="post" action="">
    <label for="nomR">NOM :</label><br>
    <input type="text" name="nomR" id="nomR"><br>

    <label for="mailR">MAIL:</label><br>
    <input type="text" name="mailR" id="mailR"><br>

    <label for="REP">REPONSE:</label><br>
    <input type="text" name="REP" id="REP"><br>

    <label for="id_rep">id_rep :</label><br>
    <input type="text" name="id_rep" id="id_rep"><br>

    <input type="submit" value="Ajouter">
</form>

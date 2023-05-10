<?php
include '../front/connexion.php';

// récupérer les livres disponibles
$requete_reclamation = "SELECT * FROM reclamation";
$query_reclamation = mysqli_query($con, $requete_reclamation);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page des Reclamations </title>
    <style>
        body {
            background-color: #fff;
            color: #333;
            font-family: Arial, sans-serif;
            font-size: 16px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        h1, h2 {
            margin-top: 0;
        }
        ul {
            display: none;
        }
    </style>
    <script>
        function afficherLesReclamationsRecues() {
            var tableauReclamation = document.querySelector('table');
            var listeReclamation = document.querySelector('ul');

            tableauReclamation.style.display = 'none';
            listeReclamation.style.display = 'block';
        }
    </script>
</head>
<body>
    <div class="container">
        <nav>
            <img src="logo.png" class="logo" alt="" />
        </nav>
        <h1>RECLAMATION</h1>
        <hr>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Mail</th>
                    <th>Numero</th>
                    <th>Texte</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row_reclamation = mysqli_fetch_assoc($query_reclamation)): ?>
                <tr>
                    <td><?= $row_reclamation['nom'] ?></td>
                    <td><?= $row_reclamation['mail'] ?></td>
                    <td><?= $row_reclamation['numero'] ?></td>
                    <td><?= $row_reclamation['texte'] ?></td>

                    <td>
                        <form method="post">
                            <input type="hidden" name="id_rec" value="<?= $row_reclamation['id_rec'] ?>">
>
                        </form>
                    </td>
                </tr>
                
                <?php endwhile; ?>
            </tbody>
        </table>
    
        <?php
    include '../front/connexion.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nom = $_POST['nom'];
        $mail = $_POST['mail'];
        $numero = $_POST['numero'];
        $texte = $_POST['texte'];

        // Vérifier si les champs sont vides
        if (empty($nom) || empty($mail)||empty($numero) || empty($texte)) {
            echo "Veuillez remplir tous les champs.";
        } else {
            // Vérifier la longueur des champs
            if (strlen($nom) > 255 || strlen($mail) > 255||strlen($numero) > 255 || strlen($texte) > 255) {
                echo "Les champs ne doivent pas dépasser 255 caractères.";
            } else {
                // Éviter les attaques XSS
                $nom = htmlspecialchars($nom);
                $mail = htmlspecialchars($mail);
                $numero = htmlspecialchars($numero);
                $texte = htmlspecialchars($texte);

                $sql = "INSERT INTO reclamation (nom, mail, numero,texte) VALUES ('$nom', '$mail','$numero', '$texte')";

                if (mysqli_query($con, $sql)) {
                    echo "Reclamation ajouté avec succès.";
                } else {
                    echo "Erreur : " . $sql . "<br>" . mysqli_error($con);
                }
            }
        }
    }
?>

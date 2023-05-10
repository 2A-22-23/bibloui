<?php
include '../front/connexion.php';

// si le bouton "Acheter" a été cliqué
if(isset($_POST['acheter'])) {
    // récupérer l'id du livre à acheter
    $id_livre = $_POST['id_livre'];

    // mettre à jour le nombre de ventes dans la table livre
    $requete_update = "UPDATE livre SET ventes = ventes + 1 WHERE id = $id_livre";
    mysqli_query($con, $requete_update);
}

// récupérer les livres disponibles
$requete_livres = "SELECT * FROM livre";
$query_livres = mysqli_query($con, $requete_livres);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page des livres</title>
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
        function afficherLivresVendus() {
            var tableauLivres = document.querySelector('table');
            var listeLivres = document.querySelector('ul');

            tableauLivres.style.display = 'none';
            listeLivres.style.display = 'block';
        }
    </script>
</head>
<body>
    <div class="container">
        <nav>
            <img src="logo.png" class="logo" alt="" />
        </nav>
        <h1>Les livres disponibles</h1>
        <hr>
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row_livres = mysqli_fetch_assoc($query_livres)): ?>
                <tr>
                    <td><?= $row_livres['titre'] ?></td>
                    <td><?= $row_livres['auteur'] ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="id_livre" value="<?= $row_livres['id'] ?>">
                            <button type="submit" name="acheter">Acheter</button>
                        </form>
                    </td>
                </tr>
                
                <?php endwhile; ?>
            </tbody>
        </table>
        <h2>Les livres les plus vendus :</h2>
        <ul>
            <?php
                $requete_top_ventes = "SELECT * FROM livre ORDER BY ventes DESC LIMIT 3";
                $query_top_ventes = mysqli_query($con, $requete_top_ventes);
                while($row_top_ventes = mysqli_fetch_assoc($query_top_ventes)): ?>
            
                <li><?= $row_top_ventes['titre'] ?></li>
                <?php endwhile; ?>
        </ul>
        <button onclick="afficherLivresVendus()">Afficher les livres les plus vendus</button>
        <?php
// Vérifier si le bouton "Générer la facture" a été cliqué
if(isset($_POST['generer_facture'])) {
    
    // Initialiser le contenu de la facture
    $contenu_facture = "FACTURE\n\n";
    
    // Ajouter les informations de base de la facture
    $contenu_facture .= "Numéro de facture : 001\n\n";
    
    // Ajouter les informations du client
    $contenu_facture .= "Nom du client : John Doe\n";
    $contenu_facture .= "Adresse : 123 rue du Paradis\n";
    $contenu_facture .= "Code postal : 75001\n\n";
    
    // Ajouter les informations de la commande
    $contenu_facture .= "Désignation\tPrix unitaire\tQuantité\tTotal\n";
    $contenu_facture .= "----------------------------------------------------\n";
    $contenu_facture .= "Produit A\t10.00\t\t2\t\t20.00\n";
    $contenu_facture .= "Produit B\t5.00\t\t1\t\t5.00\n\n";
    
    // Ajouter le total de la facture
    $contenu_facture .= "Total : 25.00\n";
    
    // Définir le nom du fichier et le chemin où le fichier sera enregistré
    $nom_fichier = "facture.txt";
    $chemin_fichier = "c:/xampp/htdocs/crud/front/" . $nom_fichier;
    
    // Écrire le contenu de la facture dans le fichier
    file_put_contents($chemin_fichier, $contenu_facture);
    
    // Télécharger le fichier
    header("Content-Type: application/octet-stream");
    header("Content-Transfer-Encoding: Binary");
    header("Content-disposition: attachment; filename=\"" . basename($chemin_fichier) . "\"");
    readfile($chemin_fichier);
    exit;
}
?>

<!-- Afficher le formulaire contenant le bouton pour générer la facture -->
<form method="post">
    <input type="submit" name="generer_facture" value="Générer la facture">
</form>
<?php
// Requête initiale pour afficher tous les livres
$sql = "SELECT * FROM livre";
$query_livres = mysqli_query($con, $sql);

// Traitement du formulaire de recherche
if(isset($_POST['rechercher']) && !empty($_POST['recherche'])) {
    $recherche = mysqli_real_escape_string($con, $_POST['recherche']);
    $sql = "SELECT * FROM livre WHERE titre LIKE '%$recherche%' OR auteur LIKE '%$recherche%'";
    $query_livres = mysqli_query($con, $sql);
}
?>

<!-- Formulaire de recherche -->
<form method="post">
    <input type="text" name="recherche" placeholder="Rechercher un livre...">
    <button type="submit" name="rechercher">Rechercher</button>
</form>

<!-- Tableau affichant les résultats de la recherche ou tous les livres -->
<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row_livres = mysqli_fetch_assoc($query_livres)): ?>
            <tr>
                <td><?= $row_livres['titre'] ?></td>
                <td><?= $row_livres['auteur'] ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id_livre" value="<?= $row_livres['id'] ?>">
                        <button type="submit" name="acheter">Acheter</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

    </div>
</body>
</html>


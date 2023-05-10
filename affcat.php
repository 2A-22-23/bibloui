<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="style.css" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>Page des categorie </title>
    </head>
    <body>
    <div class="container">
			<nav>
				<img src="logo.png"  class="logo" alt="" />
			
				
			</nav>
        <h1>LES LIVRES DISPONIBLE  PAR categorie</h1> <hr>
        <table border="1" width="90%">
            <tr>
                <th>titre</th>
                <th>categorie</th>
                <th>id</th>
            </tr>

        <?php
        include '../front/connexion.php';
        $requete="SELECT * from categorieliv ";
        $query=mysqli_query($con,$requete);
        while($rows=mysqli_fetch_assoc($query)){
            $id=$rows['id'];
           echo "<tr>";
           echo "<td>".$rows['titre']."</td>";
           echo "<td>".$rows['categorie']."</td>";
           echo "<td>".$rows['id']."</td>";
           

        }
        ?>
        </table>
    </body>
</html>
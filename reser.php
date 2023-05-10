<?php 
include '../front/connexion.php';
include '../front/reservation.php';

// Sélectionner toutes les réservations de la table de la base de données
$select_reservation = mysqli_query($con, "SELECT * FROM reservation") or die('query failed');

// Afficher les réservations dans un tableau HTML
if(mysqli_num_rows($select_reservation) > 0){
   echo "<table>";
   echo "<tr><th>IDr</th><th>Nomr</th><th>Email</th><th>Event</th><th>Date_reservation</th></tr>";
   while($fetch_reservation = mysqli_fetch_assoc($select_reservation)){
      echo "<tr>";
      echo "<td>" . $fetch_reservation['idr'] . "</td>";
      echo "<td>" . $fetch_reservation['nomr'] . "</td>";
      echo "<td>" . $fetch_reservation['email'] . "</td>";
      echo "<td>" . $fetch_reservation['event'] . "</td>";
      echo "<td>" . $fetch_reservation['date_reservation'] . "</td>";
      echo "</tr>";
   }
   echo "</table>";
} else {
   echo "Il n'y a pas de réservations.";
}
?>


<style>
table {
   border-collapse: collapse;
   width: 100%;
}

th, td {
   text-align: left;
   padding: 8px;
}

th {
   background-color: #dddddd;
}

tr:nth-child(even) {
   background-color: #f2f2f2;
}

tr:hover {
   background-color: #e6f7ff;
}
</style>
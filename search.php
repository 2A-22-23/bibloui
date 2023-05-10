<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Animated Search Bar</title>

	
</head>
<body>
	<div class="container">
    <div class="searchbox">
	<form method="get" action="">
		<input type="text" name="search" placeholder="">
		
		<label for="search" class="searchbox__icon">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56.966 56.966">
        <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17s-17-7.626-17-17S14.61,6,23.984,6z" />
      </svg>
    </label>
	</form>
</div>
	</div>
   

</body>
</html>

<?php
  include 'connexion.php';


  if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($con, $_GET['search']);
    $query = "SELECT nom, date FROM formation WHERE nom LIKE '%{$search}%' ORDER BY date";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="box">';
        echo '<div class="nom">' . $row['nom'] . '</div>';
        echo '<div class="date">' . $row['date'] . '</div>';
        echo '</div>';
      }
    } else {
      echo '<p>Aucune formation trouvée.</p>';
    }
  }
?>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  body {
    background-color: #a67550;
  }
  
  .container {
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  .container .searchbox {
    position: relative;
    display: block;
    width: 100%;
    max-width: 53px;
    transition: 0.4s linear;
    overflow: hidden;
  }
  
  .container .searchbox input[type="text"] {
    display: block;
    appearance: none;
    width: 100%;
    border: none;
    outline: none;
    border-radius: 50px;
    background-color: #24233A;
    padding: 15px;
    color: #fff;
    font-size: 20px;
    cursor: pointer;
    transition: 0.4s linear;
  }
  
  .container .searchbox input[type="text"]::placeholder {
    color: #fff;
  }
  
  .container .searchbox .searchbox__icon {
    position: absolute;
    right: calc(53px / 2);
    top: 50%;
    transform: translate(50%, -50%);
    width: 20px;
    height: 20px;
    pointer-events: none;
  }
  
  .container .searchbox .searchbox__icon path {
    fill: #00F494;
    transition: 0.4s linear;
  }
  
  .container .searchbox:focus-within {
    max-width: 300px;
  }
  
  .container .searchbox:focus-within input[type="text"] {
    background-color: #FFF;
    padding-right: 50px;
    box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.4);
    color: #24233A;
  }
  
  .container .searchbox:focus-within input[type="text"]::placeholder {
    color: #24233A;
  }
  
  .container .searchbox:focus-within .searchbox__icon path {
    fill: #24233A;
  }
</style>	

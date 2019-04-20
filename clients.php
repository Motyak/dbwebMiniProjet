<?php
include("classes.php");
include("connexion.php");
$req=$pdo->query("select id,nom,prenom from utilisateurs order by nom asc");
$req->setFetchMode(PDO::FETCH_CLASS,'Utilisateur');
$tab=$req->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<title>CLIENTS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
    .w3-bar,h1,button {font-family: "Montserrat", sans-serif}

    table {
        border-collapse: collapse;
        width: 100%;
        }	

    th, td {
        /* text-align: left; */
        padding: 8px;
        text-align:center;
        }

    tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<body>
<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card w3-left-align w3-large">
    <a href="index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Accueil</a>
    <a href="tickets.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Mes tickets</a>
    <a href="clients.php" class="w3-bar-item w3-button w3-padding-large w3-white">Clients</a>
    <a href="produits.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Produits</a>
  </div>
</div>

<!-- Header -->
<!-- <header class="w3-container w3-red w3-center" style="padding:128px 16px"> -->
<header class="w3-container w3-red w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">Mon site perso</h1>
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
  <table id="clients">
		<thead>
			<tr>
				<th>ID</th>
				<th>NOM</th>
				<th>PRENOM</th>
			</tr>
		</thead>
		<?php 
		foreach($tab as $user)
		{
			//colonne1 : id
			echo "<tr>\n\t\t\t<td>",$user->getId(),
			//colonne2 : nom
			"</td>\n\t\t\t<td>",$user->getNom(),
			//colonne3 : prenom
			"</td>\n\t\t\t<td>",$user->getPrenom(),
			//colonne4 : bouton 'show tickets'
			"</td>\n\t\t\t<td>\n\t\t\t\t<form method='get' action='tickets.php'>",
			"\n\t\t\t\t\t<input type='hidden' name='id' value='",$user->getId(),"'>",
			"\n\t\t\t\t\t<button type='submit'>Show tickets</button>\n\t\t\t\t</form>",
			"\n\t\t\t</td>\n\t\t</tr>\n\t\t";
		}
		?>
	</table>
  </div>
</div>
</body>
</html>
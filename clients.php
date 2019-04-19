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
<style>
	table {
  	border-collapse: collapse;
  	width: 100%;
	}	

	th, td {
  	text-align: left;
  	padding: 8px;
  	text-align:center;
	}

	tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<body>
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
</body>
</html>

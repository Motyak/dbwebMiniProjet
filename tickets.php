<?php
include("classes.php");
include("connexion.php");
$req=$pdo->query("select tickets.id,date
    from tickets join utilisateurs on tickets.utilisateur_id=utilisateurs.id 
	where utilisateurs.id=" . $_GET['id'] . " order by date desc");
$req->setFetchMode(PDO::FETCH_CLASS,'Ticket');
$tab=$req->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<title>TICKETS</title>
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
	<table id="tickets">
		<thead>
			<tr>
				<th>ID</th>
				<th>DATE</th>
			</tr>
		</thead>
		<?php 
		foreach($tab as $ticket)
		{
			//colonne1 : id
			echo "<tr>\n\t\t\t<td>",$ticket->getId(),
			//colonne2 : date
			"</td>\n\t\t\t<td>",$ticket->getDate(),
			//colonne3 : bouton 'show tickets'
			"</td>\n\t\t\t<td>\n\t\t\t\t<form method='get' action='produits.php'>",
			"\n\t\t\t\t\t<input type='hidden' name='id' value='",$ticket->getId(),"'>",
			"\n\t\t\t\t\t<button type='submit'>Show products</button>\n\t\t\t\t</form>",
			"\n\t\t\t</td>\n\t\t</tr>\n\t\t";
		}
		?>
	</table>
</body>
</html>
<?php
include("connexion.php");
$req=$pdo->prepare("select tickets.id,tickets.date 
    from tickets inner join utilisateurs on tickets.utilisateur_id=utilisateurs.id 
    where utilisateurs.id=" . $_GET['id'] . " order by date desc");
$req->execute();
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
                <th></th>
			</tr>
		</thead>
	</table>
</body>
<script>
var table=document.getElementById("tickets");
var tab=<?php echo json_encode($tab);?>;

for(var i=0;i<tab.length;++i)
{
	var row=table.insertRow(i+1);
	var cell1 = row.insertCell(0);
	var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
	cell1.innerHTML = tab[i][0];
	cell2.innerHTML = tab[i][1];
    cell3.innerHTML = "<form method='get' action='produits.php'>\
	<input type='hidden' name='id' value='" + tab[i][0].toString() + "'>\
	<button type='submit'>Show products</button>\
	</form>";
}
</script>
</html>
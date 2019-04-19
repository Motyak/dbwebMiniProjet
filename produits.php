<?php
include("connexion.php");
$req=$pdo->prepare("select produits.id,produits.nom,categories.nom as categorie,produits.prix
    from ticket_entry inner join produits on ticket_entry.produit_id=produits.id 
    inner join categories on produits.categorie_id=categories.id 
    where ticket_entry.ticket_id=" . $_GET['id'] . " group by categories.nom,produits.prix,produits.nom,produits.id");
$req->execute();
$tab=$req->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<title>PRODUITS</title>
<meta charset="UTF-8">
<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
<script type="text/javascript">

$(document).ready(function(){

    var i=0;

    var colPrix=$('#number').val()
    $('td:nth-child(4),th:nth-child(4)').hide();

    $("#btnDetails").click(function(){ 
        $('td:nth-child(4),th:nth-child(4)').toggle();
        if(i%2==0)
            $("#btnDetails").text("Masquer détails");
        else
            $("#btnDetails").text("Afficher détails");
        i++;
    });

});
</script>
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
    <button type="button" id="btnDetails" style="float: right;">Afficher détails</button>
	<table id="produits">
		<thead>
			<tr>
				<th>ID</th>
				<th>NOM</th>
                <th>CATEGORIE</th>
                <th>PRIX</th>
			</tr>
		</thead>
	</table>
</body>
<script>
var table=document.getElementById("produits");
var tab=<?php echo json_encode($tab);?>;

for(var i=0;i<tab.length;++i)
{
	var row=table.insertRow(i+1);
	var cell1 = row.insertCell(0);
	var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
	cell1.innerHTML = tab[i][0];
	cell2.innerHTML = tab[i][1];
    cell3.innerHTML = tab[i][2];
    cell4.innerHTML = tab[i][3];
}
</script>
</html>
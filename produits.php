<?php
include("classes.php");
include("connexion.php");
$req=$pdo->query("select produits.id,produits.nom,categories.nom as categorie,produits.prix
    from ticket_entry join produits on ticket_entry.produit_id=produits.id 
	join categories on produits.categorie_id=categories.id 
	where ticket_entry.ticket_id=" . $_GET['id'] . " group by categories.nom,produits.prix,produits.nom,produits.id");
$req->setFetchMode(PDO::FETCH_CLASS,'Produit');
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
		<?php 
		foreach($tab as $produit)
		{
			//colonne1 : id
			echo "<tr>\n\t\t\t<td>",$produit->getId(),
			//colonne2 : nom
			"</td>\n\t\t\t<td>",$produit->getNom(),
			//colonne3 : categorie
			"</td>\n\t\t\t<td>",$produit->getCategorie(),
			//colonne4 : prix
			"</td>\n\t\t\t<td>",$produit->getPrix(),"\n\t\t\t</td>\n\t\t</tr>\n\t\t";
		}
		?>
	</table>
</body>
</html>
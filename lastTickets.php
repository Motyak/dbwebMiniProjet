<?php
include("classes.php");
include("connexion.php");
if($_GET['type']=="produit")
    $req=$pdo->query("select tickets.id,date,utilisateur_id from tickets 
        join ticket_entry on ticket_entry.ticket_id=tickets.id 
        join produits on produits.id=ticket_entry.produit_id 
        where produits.id=" . $_GET['id'] ." order by date desc limit 3");
else if($_GET['type']=="categorie")
    $req=$pdo->query("select tickets.id,date,utilisateur_id from tickets 
        join ticket_entry on ticket_entry.ticket_id=tickets.id 
        join produits on produits.id=ticket_entry.produit_id
        join categories on categories.id=categorie_id
        where categories.nom='" . $_GET['id'] ."' order by date desc limit 3");

$req->setFetchMode(PDO::FETCH_CLASS,'Ticket');
$tab=$req->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<title>TICKETS</title>
<meta charset="UTF-8">
<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
<script type="text/javascript">

$(document).ready(function(){

    var i=0;

    var colPrix=$('#number').val()
    $('td:nth-child(3),th:nth-child(3)').hide();

    $("#btnDetails").click(function(){ 
        $('td:nth-child(3),th:nth-child(3)').toggle();
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
  	/* text-align:center; */
	}

	tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<body>
	<button type="button" id="btnDetails" style="float: right;">Afficher détails</button>
	<table id="tickets">
		<thead>
			<tr>
				<th>ID</th>
				<th>DATE</th>
				<th>PRODUITS</th>
			</tr>
		</thead>
		<?php 
		foreach($tab as $ticket)
		{
			//colonne1 : id
			echo "<tr>\n\t\t\t<td>",$ticket->getId(),
			//colonne2 : date
			"</td>\n\t\t\t<td>",$ticket->getDate(),
			//colonne3 : produits
			"</td>\n\t\t\t<td>";
			$req=$pdo->query("select produits.id,produits.nom,categories.nom as categorie,produits.prix
    			from ticket_entry join produits on ticket_entry.produit_id=produits.id 
				join categories on produits.categorie_id=categories.id 
				where ticket_entry.ticket_id=" . $ticket->getId() . " group by categories.nom,produits.prix,produits.nom,produits.id");
			$req->setFetchMode(PDO::FETCH_CLASS,'Produit');
			$produits=$req->fetchAll();
			echo "\n\t\t\t\t<ul>";
			$total=0;
			foreach($produits as $produit)
			{
				$quantite=TicketEntry::getQuant($ticket->getId(),$produit->getId());
				$prix=$quantite*$produit->getPrix();
				echo "\n\t\t\t\t<li>",
				//quantite
				$quantite,"x ",
				//nom
				$produit->getNom()," à ",
				//prix unitaire
				$produit->getPrix(),"€	",
				//prix
				number_format($prix, 2, '.', ''),"€",
				"</li>";

				$total+=$prix;
			}
			echo "\n\t\t\t\t</ul>",
			//total
			"\n\t\t\t\tTotal : ",number_format($total,2,'.',''),"€",
			"\n\t\t\t</td>\n\t\t</tr>\n\t\t";
		}
		?>
	</table>
</body>
</html>
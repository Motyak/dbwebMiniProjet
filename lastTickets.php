<?php
include("classes.php");
include("connexion.php");
if(isset($_GET['type']) && isset($_GET['id']) && isset($_COOKIE['auth']) && $_COOKIE['is_admin']==true)
{
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
}
else
{
	header('Location: index.php');
	die;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<title>TICKETS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

$("tr").not(':first').hover(
function () {
	if(i%2==0)
	{
		$(this).css("background","rgba(192,192,192,0.45)");
		$(this).css("font-size","35px");
	}
}, 
function () {
	$(this).css("background","");
	$(this).css("font-size","16px");
}
);
});
</script>
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
    <?php echo '<a href="tickets.php?id=' . $_COOKIE['id'] . '" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Mes tickets</a>';?>
    <a href="clients.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Clients</a>
    <a href="produits.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Produits</a>
		<a href="index.php?logout" class="w3-bar-item w3-button w3-padding-large w3-red w3-right">Log out</a>
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
  </div>
</div>
</body>
</html>
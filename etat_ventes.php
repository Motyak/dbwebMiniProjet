<!--
URL du site : https://pedago.univ-avignon.fr/~uapv1903668/
Etat de développement : Tout fonctionne, explication fonctionnement=>page d'accueil (index)
	Pour se loger : on utilise le Nom de l'utilisateur comme identifiant et son ID comme mdp
-->

<?php
include("classes.php");
include("connexion.php");

if(isset($_COOKIE['auth']) && $_COOKIE['is_admin']==true)
{
    $req=$pdo->query("select nom_produit,prix_total,S.nom_categorie,prix_total_categorie
		from (select produits.nom as nom_produit,sum(quantite*prix) as prix_total,categories.nom as nom_categorie
		from ticket_entry 
		join produits on ticket_entry.produit_id=produits.id
		join categories on produits.categorie_id=categories.id
		group by nom_categorie,nom_produit
		order by nom_categorie,nom_produit) as S
		join (select categories.nom as nom_categorie,sum(quantite*prix) as prix_total_categorie
		from ticket_entry
		join produits on ticket_entry.produit_id=produits.id
		join categories on produits.categorie_id=categories.id
		group by categories.nom) as T
		on S.nom_categorie=T.nom_categorie;");
    $req->setFetchMode(PDO::FETCH_CLASS,'Vente');
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
<title>ETAT_VENTES</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	
	//améliore la lisibilité
	$("tr").not(':first').hover(
		function () {
			$(this).css("background","rgba(192,192,192,0.45)");
			$(this).css("font-size","30px");
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
    <a href="etat_ventes.php" class="w3-bar-item w3-button w3-padding-large w3-white">Etat des ventes</a>
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
	<table id="ventes">
		<thead>
			<tr>
				<th>PRODUIT</th>
				<th>TOTAL VENTE</th>
				<th>CATEGORIE</th>
                <th>TOTAL VENTE CATEGORIE</th>
			</tr>
		</thead>
		<?php 
		foreach($tab as $vente)
		{
			//colonne1 : produit
			echo "<tr>\n\t\t\t<td>",$vente->getNomProduit(),
			//colonne2 : vente total
			"</td>\n\t\t\t<td>",$vente->getPrixTotal(),"€",
			//colonne3 : categorie
            "</td>\n\t\t\t<td>",$vente->getNomCategorie(),
            //colonne4 : vente total categorie
            "</td>\n\t\t\t<td>",$vente->getPrixTotalCategorie(),"€";
		}
		?>
	</table>
  </div>
</div>
</body>
</html>

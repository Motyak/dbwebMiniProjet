<?php
include("classes.php");
include("connexion.php");

if(isset($_COOKIE['auth']) && $_COOKIE['is_admin']==true)
{
    if(isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['categorie']) 
        && isset($_POST['prix']))
    {
        //ajout d'un produit
        $req=$pdo->prepare("select count(id) from produits where id=" . $_POST['id']);
        $req->execute();
        $idExistant=$req->fetch()[0];
        if($idExistant==0)
        {
            //creation
            //insert into produits values(id,nom,prix,categorie_id)
            try{
                $pdo->beginTransaction();
                $pdo->query("insert into produits values(" . $_POST['id'] . ",'" . 
                    $_POST['nom'] . "'," . $_POST['prix'] . "," . $_POST['categorie'] . ")");
                $pdo->commit();
            }
            catch(Exception $e){
                $pdo->rollback();
                echo "Erreur: " . $e->getMessage() . "N° : " . $e->getCode();
                exit();
            }
        }
        else
        {
            //modification
            //update produits set nom=nom,prix=prix,categorie_id=categorie where id=id
            try{
                $pdo->beginTransaction();
                $pdo->query("update produits set nom='" . $_POST['nom'] . 
                    "',prix=" . $_POST['prix'] . ",categorie_id=" . $_POST['categorie'] . 
                    " where id=" . $_POST['id']);
                $pdo->commit();
            }
            catch(Exception $e){
                $pdo->rollback();
                echo "Erreur: " . $e->getMessage() . "N° : " . $e->getCode();
                exit();
            }
        }
    }

    $req=$pdo->query("select produits.id,produits.nom,produits.prix,
        categories.nom as categorie from produits 
        join categories on produits.categorie_id=categories.id 
        group by categorie,produits.id order by categorie asc,nom asc");
    $req->setFetchMode(PDO::FETCH_CLASS,'Produit');
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
<title>PRODUITS</title>
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

    button[name=lien]{
     background:none!important;
     color:inherit;
     border:none; 
     padding:0!important;
     font: inherit;
     /*border is optional*/
     border-bottom:1px solid #444; 
     cursor: pointer;
    }

    /* The Modal (background) */
    .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 40%; /* Could be more or less, depending on screen size */
    }

    /* The Close Button */
    .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    }

    .close:hover,
    .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
    } 

    .divider{
    /* width:15px; */
    width:10%;
    height:auto;
    display:inline-block;
    }
</style>
</head>
<body>
<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card w3-left-align w3-large">
    <a href="index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Accueil</a>
    <?php echo '<a href="tickets.php?id=' . $_COOKIE['id'] . '" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Mes tickets</a>';?>
    <a href="clients.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Clients</a>
    <a href="produits.php" class="w3-bar-item w3-button w3-padding-large w3-white">Produits</a>
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
  <div id="mdlAjouter" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <form method="post">
        <div class="container">
            <label for="lblId"><b>ID :</b></label>
            <input type="number" min="0" max="9999" placeholder="Ex: 7" name="id" required>
            <div class="divider"></div>
            <label for="lblNom"><b>Nom :</b></label>
            <input type="text" maxlength="16" placeholder="Ex: Tournevis" name="nom" required><br><br>

            <label for="lblCategorie"><b>Categorie :</b></label>
            <select name="categorie" required>
            <option disabled selected value> -- choisissez -- </option>
            <?php
            $req=$pdo->query("select id,nom from categories order by nom asc");
            $req->setFetchMode(PDO::FETCH_CLASS,'Categorie');
            $categories=$req->fetchAll();
            foreach($categories as $categorie)
                echo "<option value='",$categorie->getId(),"'>",$categorie->getNom(),"</option>\n\t\t\t";
            ?>
            </select>
            <div class="divider"></div>
            <label for="lblPrix"><b>Prix :</b></label>
            <input type="number" name="prix" min="0.00" max="10000.00" step="0.01" placeholder="Ex: 4,99" required>€<br><br>

            <div style="text-align: center;"><button type="submit">Confirmer</button></div>
        </div>
        </form> 
        </div>
    </div> 

    <button type="button" id="btnAjouter" autofocus>Ajouter</button>
	<table id="produits">
		<thead>
			<tr>
				<th>ID</th>
				<th>NOM</th>
				<th>PRIX</th>
                <th>CATEGORIE</th>
			</tr>
		</thead>
		<?php 
		foreach($tab as $produit)
		{
			//colonne1 : id
			echo "<tr>\n\t\t\t<td>",$produit->getId(),
			//colonne2 : bouton *nom*
			"</td>\n\t\t\t<td>\n\t\t\t\t<form method='get' action='lastTickets.php'>",
            "\n\t\t\t\t\t<input type='hidden' name='type' value='produit'>",
            "\n\t\t\t\t\t<input type='hidden' name='id' value='",$produit->getId(),"'>",
			"\n\t\t\t\t\t<button type='submit' name='lien'>",$produit->getNom(),"</button>\n\t\t\t\t</form>",
			"\n\t\t\t</td>",
			//colonne3 : prix
            "</td>\n\t\t\t<td>",$produit->getPrix(),"€",
            //colonne4 : categorie
            // "</td>\n\t\t\t<td>",$produit->getCategorie(),
            "</td>\n\t\t\t<td>\n\t\t\t\t<form method='get' action='lastTickets.php'>",
            "\n\t\t\t\t\t<input type='hidden' name='type' value='categorie'>",
            "\n\t\t\t\t\t<input type='hidden' name='id' value='",$produit->getCategorie(),"'>",
			"\n\t\t\t\t\t<button type='submit' name='lien'>",$produit->getCategorie(),"</button>\n\t\t\t\t</form>",
			"\n\t\t\t</td>",
            "</td>\n\t\t</tr>\n\t\t";
		}
		?>
	</table>
  </div>
</div>
</body>
<script>
var modal = document.getElementById('mdlAjouter');
var btn = document.getElementById('btnAjouter');
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</html>
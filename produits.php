<?php
include("classes.php");
include("connexion.php");
$req=$pdo->query("select produits.id,produits.nom,produits.prix,
    categories.nom as categorie from produits 
    join categories on produits.categorie_id=categories.id 
    group by categorie,produits.id order by categorie asc,nom asc");
$req->setFetchMode(PDO::FETCH_CLASS,'Produit');
$tab=$req->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<title>PRODUITS</title>
<meta charset="UTF-8">
<style>
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
    width: 50%; /* Could be more or less, depending on screen size */
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
    width:15px;
    height:auto;
    display:inline-block;
    }

</style>
</head>
<body>
    <div id="mdlAjouter" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <form action="login.php">
        <div class="container">
            <label for="lblId"><b>ID :</b></label>
            <input type="text" placeholder="Ex : 7" name="id" required>
            <div class="divider"></div>
            <label for="lblNom"><b>Nom :</b></label>
            <input type="text" placeholder="Ex : Tournevis" name="nom" required><br><br>

            <label for="lblCategorie"><b>Categorie :</b></label>
            <select name="categorie" required>
            <option disabled selected value> -- choisissez -- </option>
            <?php
            $req=$pdo->query("select nom from categories order by nom asc");
            $req->setFetchMode(PDO::FETCH_CLASS,'Categorie');
            $categories=$req->fetchAll();
            foreach($categories as $categorie)
            {
                echo "<option value='",$categorie->getNom(),"'>",$categorie->getNom(),"</option>\n\t\t\t";
            }
            ?>
            </select>
            <div class="divider"></div>
            <label for="lblPrix"><b>Prix :</b></label>
            <input type="number" min="0.00" max="10000.00" step="0.01" placeholder="Ex : 10.00" required>€<br><br>

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
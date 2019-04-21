<?php
include("classes.php");
include("connexion.php");
if(isset($_COOKIE['auth']) && $_COOKIE['is_admin']==true)
{
	$req=$pdo->query("select id,nom,prenom from utilisateurs order by nom asc");
	$req->setFetchMode(PDO::FETCH_CLASS,'Utilisateur');
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
<title>CLIENTS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    // Setup - add a text input to each footer cell
    // $('#clients thead tr').clone(true).appendTo( '#clients thead' );
		$('#clients thead tr:nth-child(1),#clients thead tr:nth-child(2),#clients thead tr:nth-child(3)').clone(true).appendTo( '#clients thead' );
    // $('#clients thead tr:eq(1) th').each( function (i) {
		$('#clients thead tr:eq(1) th:nth-child(1),#clients thead tr:eq(1) th:nth-child(2),#clients thead tr:eq(1) th:nth-child(3)').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $('#clients').DataTable( {
        orderCellsTop: true,
        fixedHeader: true
    } );
} );
</script>
<style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
    .w3-bar,h1,button {font-family: "Montserrat", sans-serif}

    table {
        border-collapse: collapse;
        width: 100%;
        }	

    th, td {
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
    <a href="clients.php" class="w3-bar-item w3-button w3-padding-large w3-white">Clients</a>
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
  <table id="clients">
		<thead>
			<tr>
				<th>ID</th>
				<th>NOM</th>
				<th>PRENOM</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
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
	</tbody>
	</table>
  </div>
</div>
</body>
</html>
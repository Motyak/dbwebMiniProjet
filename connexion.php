<?php
try{
	//$pdo=new PDO("pgsql:host=pedago01c.univ-avignon.fr;dbname=etd","uapv1903668","tGvNi8");
	$pdo=new PDO("pgsql:host=localhost;dbname=motyak","motyak","paninijambonfromage");
}
catch(PDOException $e){
	echo $e->getMessage();
}
?>

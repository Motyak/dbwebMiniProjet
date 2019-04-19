<?php

class Categorie
{
	private $id;
	private $nom;
	
	public function __toString()
	{
		return '(' . $this->id . ';' . $this->nom . ')';
	}
	
	// public function importFromPersi($id)
	// {
	// 	//select nom from categories where id=id
	// 	include("connexion.php");
	// 	$req=$pdo->query("select nom from categories where id=" . $id);
	// 	$req->setFetchMode(PDO::FETCH_CLASS,'Categorie');
	// 	$tmp=$req->fetch();
	// 	$this->nom=$tmp->getNom();
	// }
	
	public function getId(){return $this->id;}
	public function setId($id){$this->id=$id;}
	public function getNom(){return $this->nom;}
	public function setNom($nom){$this->nom=$nom;}
}

class Utilisateur
{
	private $id;
	private $nom;	//str
	private $prenom;	//str
	
	public function __toString()
	{
		return '(' . $this->id . ';' . $this->nom . ';' . $this->prenom . ')';
	}
	
	// public function importFromPersi($id)
	// {
	// 	//select nom,prenom from utilisateurs where id=id
	// 	include("connexion.php");
	// 	$req=$pdo->query("select nom,prenom from utilisateurs where id=" . $id);
	// 	$req->setFetchMode(PDO::FETCH_CLASS,'Utilisateur');
	// 	$tmp=$req->fetch();
	// 	//var_dump($tmp);
	// 	$this->nom=$tmp->getNom();
	// 	$this->prenom=$tmp->getPrenom();
	// }
	
	public function getId(){return $this->id;}
	public function setId($id){$this->id=$id;}
	public function getPrenom(){return $this->prenom;}
	public function getNom(){return $this->nom;}
	public function setPrenom($prenom){$this->prenom=$prenom;}
	public function setNom($nom){$this->nom=$nom;}
}

class Produit
{
	private $id;
	private $nom;	//str
	private $prix;	//double
	private $categorie;	//id_categorie
	
	public function __toString()
	{
		return '(' . $this->id . ';' . $this->nom . ';' . $this->prix . ';' . $this->categorie . ')';
	}
	
	// public function importFromPersi($id)
	// {
	// 	//select nom,prix,categorie_id as categorie from produits where id=id
	// 	include("connexion.php");
	// 	$req=$pdo->query("select nom,prix,categorie_id as categorie from produits where id=" . $id);
	// 	$req->setFetchMode(PDO::FETCH_CLASS,'Produit');
	// 	$tmp=$req->fetch();
	// 	$this->nom=$tmp->getNom();
	// 	$this->prix=$tmp->getPrix();
		
	// 	$tmp2=new Categorie();
	// 	$tmp2->importFromPersi($tmp->getCategorie());
	// 	$this->categorie=$tmp2->getNom();
	// }
	
	public function getId(){return $this->id;}
	public function setId($id){$this->id=$id;}
	public function getNom(){return $this->nom;}
	public function getPrix(){return $this->prix;}
	public function getCategorie(){return $this->categorie;}
	public function setNom($nom){$this->nom=$nom;}
	public function setPrix($prix){$this->prix=$prix;}
	public function setCategorie($categorie){$this->categorie=$categorie;}
}

class TicketEntry
{
	private $id;
	private $ticket;	//ticket_id
	private $produit;	//produit_id
	private $quantite;

	public function __toString()
	{
		return '(' . $this->id . ';' . $this->ticket . ';' . $this->produit . ';' . $this->quantite . ')';
	}
}

class Ticket
{
	private $id;
	private $date;	//str
	private $utilisateur;	//id_utilisateur
	// private $produits;	//Ensemble de TicketEntry
	
	public function __toString()
	{
		// return $this->date+' '+$this->utilisateur+' '+$this->produits;
		return '(' . $this->id . ';' . $this->date . ';' . $this->utilisateur . ')';
	}
	
	// public function importFromPersi($id)
	// {
	// 	//
	// }
	
	public function getId(){return $this->id;}
	public function setId($id){$this->id=$id;}
	public function getDate(){return $this->date;}
	public function getUtilisateur(){return $this->utilisateur;}
	public function getProduits(){return $this->produits;}
	public function setDate($date){$this->date=$date;}
	public function setUtilisateur($utilisateur){$this->utilisateur=$utilisateur;}
	public function setProduits($produits){$this->produits=$produits;}
}

// $c=new Categorie();
// $c->importFromPersi(3);
// print("$c<br>");

// $u=new Utilisateur();
// $u->importFromPersi(1500);
// print("$u<br>");

// $p=new Produit();
// $p->importFromPersi(8);
// print("$p<br>");

//$t=new Ticket();
//$t->importFromPersi(3985);
//print("$t<br>");



?>

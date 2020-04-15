<?php  include_once '../controller/fonction.php';

class addSujet
{
	private $name;
	private $sujet;
	private $categorie;
	private $bdd;
 public	function __construct($name,$sujet,$categorie)
	{
	   $this->name= htmlspecialchars($name);
	   $this->sujet= htmlspecialchars($sujet);
	   $this->categorie= htmlspecialchars($categorie);
	   $this->bdd= bdd();
	}
	//une fonction teste si les information sont valides
	public function verif()
	{
		if(strlen($this->name) >3 AND strlen($this->name) < 70 ) //si le nom du sujet est valide
		{
           if(strlen($this->sujet) > 0 ) // si l'utilisateur a saisie le sujet
           {
           	return 'OK';
           }
           else
           { //si on a pas un sujet
             $erreur = 'veiller entrer le contenue du sujet';
             return $erreur;
           }
		}
		else
		{        //si le nom du sujet est mauvais
			$erreur='Le nom du sujet doit contenir entre 3 et 20 caractaire';
			return $erreur;
		}
	}
	//un fonction qui insert les données dans la base
	public function insert() 
	{
		$requete = $this->bdd->prepare('INSERT INTO sujet(name,categorie) VALUES (:name,:categorie)');
		$requete->execute(array('name' => $this->name,'categorie' => $this->categorie));
		$requete2 = $this->bdd->prepare('INSERT INTO postSujet(propri,contenu,dates,sujet) VALUES (:propri,:contenu, NOW(),:sujet)');
		$requete2->execute(array(
			'propri' => $_SESSION['id'],
		    'contenu'=> $this->sujet,
		    'sujet'=> $this->name));
		return 1;
	}
}


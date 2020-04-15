<?php  include_once 'controller/fonction.php';

class addPost
{
	private $name;
	private $sujet;
	private $bdd;
 public	function __construct($name,$sujet)
	{
	   $this->name= htmlspecialchars($name);
	   $this->sujet= htmlspecialchars($sujet);
	   $this->bdd= bdd();
	}
	//une fonction qui teste les informations si ils sont valide
	public function verif()
	{
		if(strlen($this->sujet) > 0 ) // si on a bien un sujet
		{
		return 'OK';
		}
		else
		{ //si on a pas un sujet
			$erreur = 'veiller entrer le contenue du sujet';
			return $erreur;
		}
		
	}
	// une fonction qui permet d'inserer les éléments dans la base
	public function insert() 
	{
		$requete = $this->bdd->prepare('INSERT INTO postSujet(propri,contenu,dates,sujet) VALUES (:propri,:contenu, NOW(),:sujet)');
		$requete->execute(array(
			'propri' => $_SESSION['id'],
		    'contenu'=> $this->sujet,
		    'sujet'=> $this->name));
		return 1;
	}
}


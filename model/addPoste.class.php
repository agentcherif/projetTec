<?php  include_once '../controller/fonction.php';

class addSujet
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
		if(strlen($this->name) >5 AND strlen($this->name) <20 ) //si nom du sujet est bon
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
		else
		{        //si nom du sujet eat mauvais
			$erreur='Le nom du sujet doit contenir entre 5 et 20 caractaire';
			return $erreur;
		}
	}
	// une fonction qui permet d'inserer les éléments dans la base
	public function insert($string) 
	{
		
		$requete = $bdd->prepare('INSERT INTO sujet(name) VALUES (:name)');
		$requete->execute(array('name' => $this->name));
		$requete2 = $bdd->prepare('INSERT INTO postSujet(propri,contenu,dates) VALUES (:propri,:contenu,NOW())');
		$requete2->execute(array('propri' => $_SESSION['id'],'contenu' => $this->sujet));
		return 1;
	}
}


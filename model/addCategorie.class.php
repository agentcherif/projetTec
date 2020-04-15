<?php include_once '../controller/fonction.php';
class addcategorie{
    private $name;
    private $bdd;
    public function __construct($name){
        $this->name = htmlspecialchars($name);
        $this->bdd = bdd();
    }
    //une fonction qui teste les informations si ils sont valide
    public function verif(){
        if(strlen($this->name) >3 AND strlen($this->name) <70 ) //si le nom du categorie est valide
		{
           if(strlen($this->name) > 0 ) // si on a bien un categorie
           {
           	return 'OK';
           }
           else
           { //si on a pas un categorie
             $erreur = 'veiller entrer le nom du categorie';
             return $erreur;
           }
		}
		else
		{        //si nom du sujet n'est pas valide
			$erreur='Le nom  doit contenir entre 5 et 20';
			return $erreur;
		}

    }
    // une fonction qui permet d'inserer les éléments dans la base
    public function insert(){
        $requete = $this->bdd->prepare('INSERT INTO categories(name) VALUES (:name)');
        $requete->execute(array('name' => $this->name));
        return 1;
    }
}
?>
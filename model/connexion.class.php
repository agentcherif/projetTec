<?php  
include_once '../controller/fonction.php';
class connexion
{
   private $pseudo;
   private $mdp;
   private $password_hash;
   private $bdd;
	public function __construct($pseudo,$mdp)
	   {
         $this->pseudo = $pseudo;
         $this->mdp = $mdp;
         $this->password_hash = password_hash($this->mdp, PASSWORD_DEFAULT);
         $this->bdd = bdd();
      }
   //une fonction qui permet verifier les informations de l'user
   public function verif()
      {
      $requete= $this->bdd->prepare('SELECT * FROM membres WHERE pseudo = :pseudo');
      $requete->execute(array('pseudo' => $this->pseudo));
      $reponse = $requete->fetch();
      if($reponse)
         {
         	if(password_verify($this->mdp,$reponse['mdp'])) //si mdp est egual a ce qui est dans la base
            {
               return 'OK';
            }
            else
            {
              $erreur1='Mauvais mot de passe';
              return $erreur1;
            }
         }
         else
         {
            $erreur1='Pseudo non trouver dans la base';
            return $erreur1;
         }
       }
   // une fonction qui permet de charger les informations en session
   public function session()
      {
      try 
         {
            $requete =  $this->bdd->prepare('SELECT * FROM membres WHERE pseudo = :pseudo');
            $requete->execute(array('pseudo' => $this->pseudo)); // on lui fournit un tableau
            $requete = $requete->fetch(); //on affiche le resultat
            $_SESSION['id'] = $requete['id'];
            $_SESSION['pseudo'] = $this->pseudo;
            $_SESSION['photo'] = $requete['photo'];
            $_SESSION['status'] = $requete['status'];
            $_SESSION['Campus'] = $requete['Campus'];
            $_SESSION['Departement'] = $requete['Departement'];
            $_SESSION['numero'] = $requete['numero'];
            $_SESSION['valide'] = $requete['valide'];
            return true;
         } catch (Exception $e) 
            {
               echo ("Erreur " . $e->getMessage()) ;
            }
         return false;
      } 
}
?>
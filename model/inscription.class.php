<?php  
  include_once '../controller/fonction.php';
  class inscription
   {
   	private $pseudo;
    private $email;
    private $mdp;
    private $mdp2;
    private $photo;
    private $Campus;
    private $Departement;
    private $status;
    private $numero;
    private $mdp_hash; //cripter le mdp
    private $bdd;
   	public function __construct($pseudo,$email,$mdp,$mdp2,$photo,$Campus,$Departement,$numero)
   	{
		$pseudo = htmlspecialchars($pseudo); //nous securisez des scriptes du web
		$email = htmlspecialchars($email); //pareil aussi pour l'email
         $this->pseudo=$pseudo;
         $this->email=$email;
         $this->mdp=$mdp;
		     $this->mdp2=$mdp2;
         $this->photo=$photo;
         $this->Campus=$Campus;
         $this->Departement=$Departement;
         $this->numero=$numero;
         $this->mdp_hash = password_hash($this->mdp, PASSWORD_DEFAULT); // cryptographie du mot de passe
         $this->bdd= bdd(); 
     }
     // une fonction qui permet de verifier les informations saisie par l'utilisateur
    public function verification(){
      if(strlen($this->pseudo) < 5 AND strlen($this->pseudo) > 20)
        return "Pseudo invalide";

         $syntaxe='#[a-z0-9\-\.]+@[a-z]+\.[a-z]+#';
        if(preg_match($syntaxe, $this->email)==0 or existMail( $this->email, $this->bdd))
          return "Adresse email invalide ou existant!";
        if(strlen($this->mdp) < 7 or strlen($this->mdp) > 20)
        {
            return "Mot de passe invalide";
        }
        else
        {
          if($this->mdp != $this->mdp2)
          {
              return "Mot de passes différents";
          }
        }
        if(!isset($this->photo) ) 
        {
          $erreur="Votre avatar est obligatoir";
          return $erreur;
          }
          if(!isset($this->Campus) ) 
          {
          $erreur="Veillez Renseigner Votre Campus";
          return $erreur;
          }
          if(!isset($this->Departement) ) 
          {
            $erreur="Veillez Renseigner Votre Departement";
            return $erreur;
          }
      return "ok";
    }
    //une fonction qui permet d'enregister les informations dans la base
    public function enregistrement(){
      try {
       $requete = $this->bdd->prepare('INSERT INTO membres(pseudo, email, mdp, Campus, Departement,numero) VALUES(:pseudo, :email,:mdp_hash,:Campus,:Departement,:numero)');
       $requete->execute(array(
        'pseudo' => $this->pseudo,
        'email' => $this->email,
        'mdp_hash' => $this->mdp_hash,
        'Campus' => $this->Campus,
        'Departement' => $this->Departement,
        'numero' => $this->numero
         ));
        
        $photo_Tmp=$this->photo['tmp_name'];
        $idUser=$this->bdd->lastInsertId();
        $nomPhoto=$idUser . ".jpg";
        $path=__DIR__ . DIRECTORY_SEPARATOR ."../controller/avatars" . DIRECTORY_SEPARATOR .$nomPhoto;
        move_uploaded_file($photo_Tmp,$path);
        $requete = $this->bdd->prepare('UPDATE membres set photo=:photo where id=:id ');
        $requete->execute(array(
        'photo' => $nomPhoto,
        'id' => $idUser
         ));
        return true;     
      } catch (Exception $e) {
        echo ("Erreur " . $e->getMessage()) ;
      }
      return false;
    }
    // une fonction qui permet de charger les informations en session
    public function session(){ // pour garder les informations en session
      try {
        $requete =  $this->bdd->prepare('SELECT * FROM membres WHERE pseudo = :pseudo');
        $requete->execute(array(
        'pseudo' => $this->pseudo
        )); // on lui fournit un tableau
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
      } catch (Exception $e) {
         echo ("Erreur " . $e->getMessage()) ;
      }
      return false;
     } 
  }
 



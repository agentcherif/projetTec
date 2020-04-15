<?php 
session_start();
include_once 'fonction.php';
include_once '../model/inscription.class.php';
include_once '../model/connexion.class.php';
$bdd= bdd();
  // inscription
  if(isset($_POST['pseudo']) AND isset($_POST['email']) AND isset($_POST['mdp']) AND isset($_POST['mdp2']) AND isset($_FILES['photo']) AND isset($_POST['Campus']) AND isset($_POST['Departement']) )
    {
      $numero = rand();
      $inscription = new inscription($_POST['pseudo'],$_POST['email'],$_POST['mdp'],$_POST['mdp2'],$_FILES['photo'],$_POST['Campus'],$_POST['Departement'],$numero);
      $verification = $inscription->verification();
      if($verification == "ok")
        { //si tout est bon      
          if ($inscription->enregistrement())
            { 
              if ($inscription->session()) 
                { //si tout est mis en session
                     header('Location: ../index.php');
                 }
            }else
              {//error lors de l'enregistrement
                echo 'une erreur ses produit';
              }       
        }else{
          $erreur= $verification;
        }
    }
define('PAGE', 'inscription');
?>

<?php //connection
if(isset($_POST['pseudos']) AND isset($_POST['mdps']))
  {
    $connexion= new connexion($_POST['pseudos'],$_POST['mdps']);
    $verif = $connexion->verif();
    if($verif == "OK")
      {
        if($connexion->session())
          {
            header('Location: ../index.php');
          } 
      }else
        {
          $erreur1=$verif;
        }
  }
  include_once '../view/view.inscription.php';
?>



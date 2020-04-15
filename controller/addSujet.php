  <?php  session_start();
    include_once 'fonction.php';
    include_once '../model/addSujet.class.php';
    $bdd= bdd();
    define('PAGE', 'connexion');
    if(!isset($_SESSION['id'])){
      header('Location: ../index.php');
    }else{
   if(isset($_POST['name']) AND isset($_POST['sujet']))
   {
   	$addSujet=new addSujet($_POST['name'],$_POST['sujet'],$_POST['categorie']);
   	$verif= $addSujet->verif();
   	if($verif== 'OK')
   	{
      if($addSujet->insert());
      {
       	header('Location: ../index.php?sujet='.$_POST['name']);
      }
   	}
   	else
   	{
   		$erreur=$verif;
   	}
   }
  }
   include_once '../view/view.sujet.php';
   ?>

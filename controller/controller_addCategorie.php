<?php  session_start();
    include_once 'fonction.php';
    include_once '../model/addCategorie.class.php';
    define('PAGE', 'connexion'); 
    $bdd= bdd(); // appel de la fonction bdd pour la connection à la base
    if(!isset($_SESSION['id'])){
        header('Location: ../index.php');
      }else{
   if(isset($_POST['name']))
   {
   	$addcategorie =new addcategorie($_POST['name']);
   	$verif= $addcategorie->verif();
   	if($verif== 'OK')
   	{
       if($addcategorie->insert());
       {
       	header('Location: ../index.php');
       }
   	}
   	else
   	{
   		$erreur=$verif;
   	}

   }
}
  include_once '../view/view.categorie.php';
?>

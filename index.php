<?php session_start();
  include_once 'model/addPost.php';
  include_once 'controller/fonction.php';
  include_once 'model/model_index.php';
  $bdd = bdd();
  define('PAGE', 'home');
  if (!isset($_SESSION['id']))
    {
      header('Location: controller/controller_inscription.php');
    }
    
    else if($_SESSION['valide'] == 0){
      header('Location: controller/mailvalidation.php');
    }else
    {
        if(isset($_POST['name']) AND isset($_POST['sujet']))
        {
          $addPost=new addPost($_POST['name'],$_POST['sujet']);
          $verif= $addPost->verif();
          if($verif== 'OK')
          {
            if($addPost->insert());
            {  }
          }
          else
          {
            $erreur=$verif;
          }
        }
      if(isset($_GET['delet']))
      {
        deleteMsg();
      }
      if(isset($_GET['deleteCat']))
      {
        deleteCat();
      }
    if(isset($_GET['categorie'])) //si on est dans une categorie
    {
      $requete = getSujet();
    }else if(isset($_GET['sujet'])) //si on est dans le sujet
    {
      if (!empty($_POST)) {
        header("Location: index.php?sujet=".$_GET['sujet']);
        exit;
      }
      $_GET['sujet']=htmlspecialchars($_GET['sujet']);
      $requete = getAllMessage();

      $requete3 = getInfoUser();
    }else{
      $requete = getCategorie();
    }
    include_once 'view/view.home.php'; 
?>
  <?php 
}
?>

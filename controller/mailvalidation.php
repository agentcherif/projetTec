<?php 
  session_start();
  include_once 'fonction.php';
  include_once '../model/connexion.class.php';
  include_once '../model/inscription.class.php';
  include_once '../model/model.php';
  $bdd = bdd();
  $requete = updateValid();
if (!isset($_SESSION['id']))
{   
  header('Location: ../index.php');
}else
  include_once '../view/view.mailvalidation.php';

?>
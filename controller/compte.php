<?php session_start();
  include_once 'fonction.php';
  require_once '../model/model.php';
  define("PAGE", 'Compte'); 
  $info = infoUser();

if (!isset($_SESSION['id']))
{   
  header('Location: ../index.php');
}else
  include_once '../view/view.compte.php';
?>          
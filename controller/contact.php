<?php session_start();
  include_once 'fonction.php';
  define("PAGE", 'Contacts'); 
  $bdd = bdd();
if (!isset($_SESSION['id']))
{   
  header('Location: ../index.php');
}else
  include_once '../view/view.contact.php';

?>
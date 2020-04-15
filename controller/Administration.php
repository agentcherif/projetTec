<?php session_start();
  require_once 'fonction.php';
  require_once '../model/model.php';
  
  $bdd = bdd();
  
  define('PAGE', 'Administration');
  if(!isset($_SESSION['id'])){
    header('Location: ../index.php');
  }else{
    if(isset($_GET['del']) && !empty($_GET['del']))
  {
    deleteUser();
    //suppression proprement dite
    unlink(__DIR__ . "/avatars/" . $_GET['photo']);
  }

  /*   listes users */
  $re = listUsers();
  /**nombre users **/
  $totalmembes = numberUsers();
  /**messages */
  $totalmessage = numberMessage();
  /** user by messages */
  $tab = msgByUser();
  $membres = $tab[0];
  $i = $tab[1];
  $count = $tab[2]; 

  include_once '../view/view.admin.php';
  }
?>

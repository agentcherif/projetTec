<?php
require_once '../controller/fonction.php';
// listUsers est une fonction quin renvoit la liste des utilisateurs
function listUsers(){
try 
  {
    $bdd = bdd();
    $query = "SELECT * FROM membres WHERE status = 'user' ORDER BY id ASC";
    $re = $bdd->prepare($query);
    $re->execute();
  } catch(PDOException $ex) {
    die;
  }
return $re;
}
// numberUsers est une fonction qui renvoit le nommbre l'utilisateur dans la base
function numberUsers(){
try
  {
    $bdd = bdd();
    $totalmembes= $bdd->query('SELECT COUNT(*) FROM membres')->fetchColumn()-1;
  } catch(PDOException $ex) {
    die;
  }
  return $totalmembes;
}
// numberMessage est une fonction qui renvoit le nombre de message du site
function  numberMessage(){
    try
    {   
        $bdd = bdd();
        $totalmessage= $bdd->query('SELECT COUNT(*) FROM postSujet')->fetchColumn();
    }catch(PDOException $ex) {
        die;
    }
    return $totalmessage;
}
// msgByUser est une fonction qui renvoit un triplet :
// -le nombre de message de chaque utilisateur
// -l'info de chaque utilisateur
// - et un iterateur
function msgByUser() {
try
  {
    $bdd = bdd();
    $query = "SELECT * FROM membres WHERE status = 'user' ORDER BY id ASC";
    $membres = $bdd->query($query)->fetchAll();
    $i=0;
    $count=count($membres);
  }catch(PDOException $ex) {
    die;
  }
    return array($membres,$i,$count);
}
// updateValid est une fonction qui met a jour la variable valide dans la base c'est a dire 
//  permet d'activer le compte de l'utilisateur 
function updateValid() {
  $bdd = bdd();
  $requete = $bdd->prepare('UPDATE membres SET membres.valide= 1 WHERE membres.id = '.$_SESSION['id'] );
  return $requete ;
}
// deleteUser est une fonction qui supprime l'utilisateur le les message qu'il a poster dans le site
function deleteUser(){
  $bdd = bdd();
  $bdd->prepare("DELETE from postSujet where propri=?")->execute(array($_GET['del']));
  $bdd->prepare("DELETE from membres where id=?")->execute(array($_GET['del']));
}
// infoUser est une fonction qui charge les informations d'un utilisqteur dans la base 
function infoUser(){
  $bdd = bdd();
  $requete =  $bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');
  $requete->execute(array($_SESSION['pseudo']));
  $info = $requete->fetch();
  return $info;
}
  
?>
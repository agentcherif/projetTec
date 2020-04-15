<? 
require_once 'controller/fonction.php';
// getSujet est une fonction qui renvoit qui renvoit les sujets de chaque categorie
function getSujet() {
    $bdd = bdd();
    $requete= $bdd->prepare('SELECT * FROM sujet WHERE categorie= :categorie');
    $requete->execute(array('categorie'=> $_GET['categorie']));
    return $requete;
}
// getAllMessage est une fonction qui renvoit les messages de chaque sujet
function getAllMessage(){
    $bdd = bdd();
    $requete = $bdd->prepare('SELECT * FROM postSujet WHERE  sujet = :sujet ORDER BY id DESC LIMIT 15');
    $requete->execute(array('sujet'=> $_GET['sujet']));
    return $requete;
}
//getInfoUser est une fonction qui renvoit les information de l'utilisateur
function getInfoUser(){
    $bdd = bdd();
    $requete3=$bdd->prepare('SELECT * FROM membres  WHERE id = :id ' );
    return $requete3;
}
// getCategorie est une fonction qui renvoit toute les categorie 
function getCategorie(){
    $bdd = bdd();
    $requete = $bdd->query('SELECT * FROM categories');
    return $requete;
}
// deleteCat est une fonction qui supprime une categorie
function deleteCat(){
    $bdd = bdd();
    $bdd->prepare("DELETE FROM categories WHERE id=?")->execute(array($_GET['deleteCat']));
    return;
}
// deleteMsg est une fonction qui supprime un message dans une conversation
function deleteMsg(){
    $bdd = bdd();
    $bdd->prepare("DELETE FROM postSujet WHERE id=?")->execute(array($_GET['delet']));
    return;
}
?>
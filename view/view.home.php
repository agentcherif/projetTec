<?php ?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Cherif Diallo">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>iChat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="container head">
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top rounded">
      <img id="icon" src="images/logo5.png"  >
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <?php if (PAGE): ?>
            <li class="nav-item  <?=("active") ?>">
            <a class="nav-link" href="index.php">Acceuil <span class="sr-only">(current)</span></a>
          <?php endif ?>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="controller/contact.php">Contact</a>
          </li>
          <?php if($_SESSION['status'] === 'admin'): ?>
            <li>
              <a class="nav-link" href="controller/Administration.php">Administration</a>  
            </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="controller/compte.php">Compte</a>
          </li>
        </ul>
      </div>
      </nav>
    </div>
   <div class="container">
    <div class="row">
      <div class="col-md-3 text-center">
        <div class="jumbotron">
        <img id="texte" src="<?='controller/avatars/' . $_SESSION['photo'];?>" width="100" height="100"><br />
        <?='<div id="texte">'.$_SESSION['pseudo'].' <br /><br /> <a id="deconect"  href="controller/deconnexion.php">Deconnexion</a></div>'?>
      </div>
    </div>
    <div class="col-md-9">
      <div class="jumbotron">
        <h2 class="text-center" id="tex">CATEGORIES</h2>
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-end">
            <li class="page-item"><a class="page-link" href="index.php">Acceuil</a></li>
          </ul>
        </nav>
        <?php 
        if(isset($_GET['categorie'])) //si on est dans une categorie
        {
          $_GET['categorie']=htmlspecialchars($_GET['categorie']);
          ?>
          <div class="categories">
            <div class="noncategorie">
              <?='<div id="texte">'.$_GET['categorie'].'</div>'?>
            </div>
          </div><br/>
          <a id="sujets" class="btn btn-outline-info" href="controller/addSujet.php?categorie=<?= $_GET['categorie']?>">Sujet +</a><br /><br />
          <?php 
            while ($reponse=$requete->fetch()) {
              ?>
              <br/><br/>
              <div class="categories">
              <div class="divcategorie">
                <a  href="index.php?sujet=<?=$reponse['name']?> " >
                <h2><?='<div id="texte">'.$reponse['name'].'</div>'?></h2></a> 
              </div>
              </div>
              <?php
            }
            ?>
            <?php 
        }
        else if(isset($_GET['sujet'])) //si on est dans une categorie
        { 
          ?>
          <div class="categories">
            <marquee><h1> <?='<div style="text-transform: uppercase;">'.$_GET['sujet'].'</div>'?> </h1></marquee>
          </div>
          <?php
            while ($reponse=$requete->fetch()) {
              ?>
              <br />
                <?php
                  //on affice les message de user
                 $requete3->execute(array('id' => $reponse['propri']));
                 $membres=$requete3->fetch(); ?>
                  <?=  '<img src="' . 'controller/avatars/' . $membres['photo'] .'" id="avatar" width="50" height="50">';
                  ?> 
                  <div id="messages" class="form-control"> 
                  <?= htmlspecialchars_decode($reponse['contenu'])?>
                  <?= '<div id="form"> ' .$membres['pseudo'].'<br /></div>'?>
                  <?= '<div id="form"> ' .$reponse['dates'].'<br /></div>';
                ?>
                <?php if($_SESSION['status'] === 'admin'): ?>
                <a href="?delet=<?=$reponse['id']?>" class="btn-sm btn-outline-danger" id="delete">Delete</a> 
                <?php endif; ?>
              </div>
              <?php
            }
            ?>
            <br />
            <form method="POST" action="index.php?sujet=<?=$_GET['sujet']?>">
            <textarea class="form-control" name="sujet" id="sujet"></textarea><br/>
            <input type="hidden" name="name" value="<?=$_GET['sujet']?>" >
            <input class="btn btn-outline-info" type="submit" name="submit" id="envoi" value="Envoyer">
            <br /> <br />
            <?php
              if(isset($erreur)){
              ?> <div class="btn btn-danger col-md-6"> 
                <?=($erreur)?>
              </div><br />
              <?php
              }
            ?> 
            </form>
            <?php 
        }
        else   //si on est sur la page normal
        {
          while ($reponse = $requete->fetch())
          {
            ?><br /> 
            <div class="categories " id="card">
            <div class="divcategorie">
                <a  href="index.php?categorie=<?=$reponse['name']?>" ><?='<div>'.$reponse['name'].'</div>'?> </a>
            </div>
            </div>
            <?php if($_SESSION['status'] === 'admin'): ?>
              <a href="?deleteCat=<?=$reponse['id']?>" class="btn-sm btn-outline-danger" id="delete">Delete</a> 
            <?php endif; ?>
            <br />
            <?php  
           }
           ?> 
           <a id="sujets" class="btn btn-outline-info" href="../forum/controller/controller_addCategorie.php?categorie=<?=$reponse['name']?>">Categorie +</a><br /><br />
            <?php
        } 
        ?>
        <br /> 
      </div> 
      </div>
      </div>
      <?php  include('view/view.footer.php');  ?>
      <script src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.1/tinymce.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script>tinymce.init({ selector:'textarea' });</script> 
    </body>
    </html>
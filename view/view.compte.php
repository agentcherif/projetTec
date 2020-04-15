<?php  
?> 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="IChat">
    <meta name="author" content="Cherif Diallo">
    <title>Compte</title>
    <link rel="icon" type="image/jpg" href="../images/logo5.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
 <div class="container head">
   <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-fixed-top rounded">
      <img id="icon" src="../images/logo5.png"  >
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">Acceuil <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
            <?php if (PAGE): ?>
           <li class="nav-item  <?=("active") ?>">
            <a class="nav-link" href="compte.php">Compte</a>
          <?php endif ?>
          </li>
        </ul>
        <li class="nameuser">
        	<?='<a href="../controller/deconnexion.php">Deconnexion</a>'?>
        </li>
      </div>
    </nav>
    <div class="jumbotron">
    <div class="container">
      <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 text-center">
          <h1 id="users">Profil</h1>
          <h1><strong>Bienvenue</strong></h1>
          <h6><strong>iChat C'est gratuit</strong></h6>
          <?=("<td><img src='../controller/avatars/".$info['photo']."' id='photos'  ></td>")?>
          <?= '<div id="infos"> ' .$info['pseudo']."<br />"?> 
          <?=$info['email']."<br />"?> 
          <?=$info['Campus']."<br />"?> 
          <?=$info['Departement']."<br /></div>"?> 
      </div></br>
    <div class="col-md-3"></div>
  </div>
  </div>
  </div>
  <?php  include('../view/view.footer.php');  ?> 
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

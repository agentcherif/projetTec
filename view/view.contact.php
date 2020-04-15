<?php
 ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta name="description" content="IChat">
      <meta name="author" content="Cherif Diallo">
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Contact</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="../style.css">
  </head>
  <body>
  <div class="container head">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-fixed-top rounded">
        <img id="icon" src="../images/logo5.png">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="../index.php">Acceuil <span class="sr-only">(current)</span></a>
            </li>
              <?php if (PAGE): ?>
            <li class="nav-item  <?=("active") ?>">
              <a class="nav-link" href="contact.php">Contact</a>
            <?php endif ?>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="compte.php">Compte</a>
              </li>
          </ul>
          <li class="nameuser">
        	<?='<a href="../controller/deconnexion.php">Deconnexion</a>'?>
        </li>
        </div>
      </nav>
      <div class="jumbotron">
        <h1 class="text-center " id="contact">Me Contacter</h1>
      <div class="row "  >
          <div class="col-md-4"></div>
          <div class="col-md-4 mb-5 ">
            <label for="destionataire">A</label>
            <input name="email" type="email" class="form-control" disabled id="destionataire">
            <label for="Object">Object</label>
            <input name="email" type="text" class="form-control" placeholder="Votre Object&hellip;" id="Object">
            <label for="Subject">Subject</label>
            <textarea class="form-control" id="Subject" cols="30" placeholder="Votre Subjet&hellip;" rows="3"></textarea><br> 
            <button type="button" class="btn btn-outline-info" value="Envoyer">Envoyer</button>
          </div>
          <div class="col-md-4"></div>
      </div>
    </div>
    </div>
    <?php  include('view.footer.php');  ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/modernizr.custom.79639.js"></script> 
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript">
      var destionataire = document.getElementById('destionataire');
      destionataire.value = 'mcherifdiallo96@gmail.com';
    </script>
  </body>
</html>
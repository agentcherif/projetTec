<?php ?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="IChat">
    <meta name="author" content="Cherif Diallo">
    <title>Categorie</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style.css">
  </head>
  <body class="text-center">
    <div class="container head">
 <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-fixed-top rounded">
 <img id="icon" src="../images/logo5.png" >
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
              <a class="nav-link" href="../index.php">Acceuil <span class="sr-only">(current)</span></a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="../controller/compte.php">Compte</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../controller/contact.php">Contact</a>
          </li>
        </ul>
        <li class="nameuser">
        	<?php 
           echo '<a href="../controller/deconnexion.php">Deconnexion</a>';
         ?>
        </li>
      </div>
    </nav>
  </div>
    <h1>Ajouter une Categorie</h1>
    <br />
     <form method="POST" action="../controller/controller_addCategorie.php" >
     	  <div class="row">
     	  	<div class="col-md-4"></div>
     	  	<div class="col-md-4">
     	  		<input name="name" type="text" class="form-control " id="name" placeholder="Nom de la categorie..." required><br>
                <input type="hidden" name="categorie" value="<?=$_GET['categorie'];?>">
     	  	    	<div class="form-actions" id="val">
                  <input class="btn btn-info " type="submit" value="Ajouter la categorie">
                </div><br />
                <?php 
                if(isset($erreur))
                {  ?> <div class="col-md-12"> <div class="btn btn-outline-danger col-md-12"> 
                <?=$erreur;
                } 
                ?>
     	  	</div>
     	  	<div class="col-md-4"></div>
     	  </div>
     </form>
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
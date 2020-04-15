<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Cherif Diallo">
    <title>Confirmation</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="bg-light" id="img" >
    <div class="container heade">
     <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top rounded" id="top">
      <img id="icon" src="../images/logo5.png">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsEx">
          <ul class="navbar-nav mr-auto">
                <div class="row"></div>
          </ul>
        </div>
     </nav>
   </div>
   <div class="container">
       <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 text-center">
            <h1 > Felicitation <?=$_SESSION['pseudo']?></h1>
            <p> Votre compte à été activé avec success, pour plus de sécurité, vous serais rediriger vers la page de connection.</p>
            <?php $requete->execute(); ?>
            <a href="../view/view.inscription.php" class="btn btn-outline-info" id="ici">ici </a>
        </div>
        <div class="col-md-2"></div>
       </div>
   </div>
   
  
  </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>


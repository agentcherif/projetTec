<?php ?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Cherif Diallo">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
  </head>
  <body class="bg-light" id="body" >
    <div class="container" id="head">
     <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top rounded">
      <img id="icon" src="../images/logo5.png"  >
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="navbar-nav mr-auto">
              <div class="row"></div>
          </ul>
        </div>
     </nav>
   </div>
    <div class="container ">
     <div class="row">
       <div class="col-md-6 ">
         <h5>Avec <strong>iChat</strong>, discuter et restez en contact avec votre entourage.</h5>
           <h1 id="con"><strong>Connexion</strong></h1><br>
          <form method="POST" action="../controller/controller_inscription.php" id="form1">
            <div class="col-md-6">
              <input name="pseudos" type="text" class="form-control " id="pseudos" placeholder="Pseudo..." required><br>
            </div>
            <div class="col-md-6">
                <input name="mdps" type="password" class="form-control" id="mdps" placeholder="mot de passe..." required><br>
            </div> 
            <div class="form-actions" id="B_connexion">
              <input class="btn btn-primary " type="submit" value="Connexion">
           </div> <br>
           <?php
               if(isset($erreur1)){
                ?> <div class="col-md-11"> <div class="btn btn-danger col-md-6"> 
                <?=($erreur1)?>
                </div></div><br />
                <?php
               }
            ?>   
          </form>
        </div>
       <div class="col-md-6">
        <h1><strong>Inscription</strong></h1>
        <h6><strong>iChat C'est gratuit</strong></h6>
      <form method="POST" action="../controller/controller_inscription.php" enctype="multipart/form-data" id="form2">
        <div class="col-md-8 order-md-1">
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="Pseudo">Pseudo</label>
                <input name="pseudo" type="text" class="form-control" id="Pseudo" placeholder="Pseudo...." value="" required>
              </div>
              <div class="col-md-12 mb-3">
                <label for="Email">Email</label>
                <input name="email" type="email" class="form-control" id="Email" placeholder="Email...." value="" required>
              </div>
            </div>

             <div class="row">
                   <div class="col-md-12 md-3">
                  <label for="password">Password</label>
                  <input name="mdp" type="password" class="form-control" id="password" placeholder="Password...." required>
                </div>
             </div>
              <div class="row">
                <div class="col-md-12 mb-3">
                  <label for="password">Confirmation</label>
                  <input name="mdp2" type="password" class="form-control" id="password" placeholder="Confirmation..." required="">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 mb-3">
                  <label for="photo">Votre Avatar</label>
                  <input name="photo" type="file" class="form-control" id="photo" required>
                </div>
              </div>
              <div class="row">
                <div class=" col-md-12 mb-3">
                  <label for="inputCampus">Campus</label>
                  <select id="inputCamppus" class="form-control" name="Campus" required>
                    <option value="">Selectionner votre Campus...</option>
                    <optgroup label="Campus">
                    <option value="Campus Talence">Campus Talence</option>
                    <option value="Campus Montaigne-Montesquieu">Campus Montaigne-Montesquieu</option>
                    <option value="Campus Bastide">Campus Bastide</option>
                    <option value="Campus Victoire">Campus Victoire</option>
                    <option value="Campus de Carreire">Campus de Carreire</option>
                    <option value="Le Campus d'Agen">Le Campus d'Agen</option>
                    <option value="Le Campus Périgord">Le Campus Périgord</option>
                    <option value="Campus Villenave d'Ornon">Campus Villenave d'Ornon</option>
                    </optgroup>
                  </select>
                </div>
               </div>
               <div class="row">
                <div class=" col-md-12 mb-3">
                  <label for="inputDepartement">Departement</label>
                  <select  id="inputDepartement" class="form-control" name="Departement" required>
                    <option value="">Selectionner votre Departement..</option>
                    <optgroup label="Departement">
                    <option value="Informatique">Informatique</option>
                    <option value="Biologie">Biologie</option>
                    <option value="Chimie">Chimie</option>
                    <option value="Genie-Civil">Genie-Civil</option>
                    <option value="Miage">Miage</option>
                    <option value="Math Info">Math Info</option>
                    <option value="Economie Finance">Economie Finance</option>
                    <option value="Science Comtable">Science Comtable</option>
                    <option value="Droit">Droit</option>
                    <option value="Journalisme">Journalisme</option>
                    <option value="Anglais">Anglais</option>
                    <option value="Sociologie">Sociologie</option>
                    </optgroup>
                  </select>
                </div>
               </div>
            <div class="form-actions">
              <input class="btn btn-success " type="submit" value="Creer un compte" name="valider">
            </div><br />            
            <?php
               if(isset($erreur)){
               ?>  <div class="btn btn-danger col-md-12"> 
               <?=($erreur)?>
                </div><br />
                <?php
               }
            ?>             
        </div>  
     </form><br />
       </div>
     </div>
      </div>
      <?php  include('view.footer.php');  ?>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
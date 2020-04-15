<?  ?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="IChat">
    <meta name="author" content="Cherif Diallo">
    <title>Administration</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
      <div class="container head">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-fixed-top rounded">
                <img id="icon" src="../images/logo5.png">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-right" id="navbarsExampleDefault">
                    <ul class="navbar-nav mr-auto" id="text-droite">
                        <a class="nav-link" href="../index.php">Acceuil<span class="sr-only">(current)</span></a>
                        <?php if (PAGE): ?>
                        <li class="nav-item  <?=("active") ?>">
                            <a class="nav-link" href="Administration.php">Administration</a>
                            <?php endif ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="compte.php">Compte</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container">
	        <div class="jumbotron" style="margin-top: -20px;">
            <div class="row">
                <div class="col-md-6">
                    <h3 id="users" class="text-center">La liste des utilisateurs</h3>
                    <table class="table table-dark table-responsive">
                        <thead>
                            <th>Pseudo</th>
                            <th>E-mail</th>
                            <th>Avatar</th>
                            <th>Status</th>
                            <th>activer</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            <?php 
                                /*   liste users */
                                while($data = $re->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <?=("<tr><td>".$data['pseudo']."</td>")?>
                                    <?=("<td>".$data['email']."</td>")?>
                                    <?=("<td><img src='avatars/".$data['photo']."' width=40 height=40 id='avatars' ></td>")?>
                                    <?=("<td>".$data['status']."</td>");
                                    if($data['valide']== 1) echo ("<td>".'oui'."</td>");
                                    else echo ("<td>".'non'."</td>");
                                    ?><?=('<td><a href="?del='.$data['id'].'& photo='.$data['photo'].'" class="btn btn-outline-danger">Delete</td></tr>');
                                }
                            ?> 
                        </tbody>
                    </table>  
                    <br /> <br /> <br /><br />
                    <h3 id="users" class="text-center">Le nombre d'utilisateurs</h3>
                    <table class="table table-dark table-responsive">
                        <thead>
                        <th>information</th>
                        <th>Nombre d'utilisateurs</th>
                        </thead>
                        <?=("<tr><td>Le nombres d'utilisateurs du forum est </td>")?>
                        <?=("<td>".$totalmembes."</td></tr>")?>
                        
                    </table>
                </div>
                <div class="col-md-6">
                    <h3 id="users" class="text-center">Le nombre de messages du forum</h3>
                    <table class="table table-dark table-responsive">
                        <thead>
                            <th>information</th>
                            <th>Nombre de messages</th>
                        </thead>
                        <?=("<tr><td>Le nombres de messages du forum est </td>")?>
                        <?=("<td>".$totalmessage."</td></tr>")?>
                    </table> 
                    <br /> <br /> <br /><br />
                    <h3 id="users" class="text-center">Le nombre d'utilisateurs par messages</h3>
                    <table class="table table-dark table-responsive">
                        <thead>
                            <th>pseudo</th>
                            <th>Avatar</th>
                            <th>Nombre de message</th>
                        </thead>
                        <?php 
                            /** user by messages */
                            while($i<$count) 
                            { ?>
                                <?=("<tr><td>". $membres[$i]['pseudo']."</td>")?>
                                <?=("<td><img src='avatars/".$membres[$i]['photo']."' width=40 height=40 ></td>");
                                $ps = "SELECT COUNT(*) as 'value' FROM postSujet WHERE propri=".$membres[$i++]['id'];
                                $rep = $bdd->query($ps)->fetchAll();
                                if(count($rep)>0)
                                {
                                    ?><?=("<td>". $rep[0]['value'] ."</td></tr>");
                                }
                            }
                        ?>
                    </table>   
                </div>
            </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
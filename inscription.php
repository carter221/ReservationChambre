<!DOCTYPE>
<html>
<head>
    <title></title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/dist/css/bootstrap.css">
    <link href="vendor/bootstrap-material-design/dist/css/ripples.min.css" rel="stylesheet">
    <link href="vendor/bootstrap-material-design/dist/css/material-wfont.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/accueil.css">
    <link rel="stylesheet" type="text/css" href="assets/inscription.css">
</head>
<body >
<div class="container" style="background-image: image('images/01.jpg');">
    <div class="row top">
        <div class="col-xs-12">
            <img src="images/logo.png" height="90">
            <a class="btn btn-primary pull-right" href="images/01.jpg" role="button">Sign up</a>
            <a class="btn btn-primary pull-right" href="images/01.jpg" role="button">Login</a>
        </div>
    </div>
      <div class="row" style="padding-bottom:23px; padding-top:15px;">
        <div class="col-md-12">
           <ul class="nav nav-tabs">
              <li ><a href="index.php" class="text-center">Home</a></li>
             <li role="presentation" ><a href="images/01.jpg" class="text-center">Service traiteur</a></li>
             <li role="presentation" ><a href="images/01.jpg" class="text-center">Décoration</a></li>
            </ul>
        </div>
    </div>
    <?php

    try
    {
        $db= new PDO('mysql:host=localhost;dbname=reservation', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    echo $response['nom_salle'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        extract($_POST);
        $req=$db->prepare('SELECT nom_client,prenom_client FROM client WHERE nom_client=:nom AND prenom_client=:prenom');
        $req->execute(array(':nom'=>$_POST['nom_cli'],':prenom'=>$_POST['prn_cli']));
        $ans=$db->prepare('SELECT pseudo_client,adresse_client,nom_client,prenom_client FROM client WHERE pseudo_client=:pseudo');
        $ans->execute(array('pseudo'=>$_POST['psd_cli']));
        $found=$req->rowCount();
        $anse=$ans->rowCount();
        if ($found)
        {
            echo'<div class="alert alert-danger text-center" role="alert">Nom et prénom deja utilisé.</div>';
        }
        else{
            if($anse)
                {
                    echo'<div class="alert alert-danger text-center" role="alert">Pseudonyme déjà utilisé.</div>';
                }
                else
                    {
                    if (!preg_match("/^[a-zA-Z-]*$/", $_POST['nom_cli']) || !preg_match("/^[a-zA-Z-]*$/", $_POST['prn_cli']))
                    {
                        echo'<div class="alert alert-danger text-center" role="alert">Seul les lettres sont autorisés pour les noms et prénoms.</div>';
                    }
                    else
                        {
                            if(strlen($_POST['mdp_cli'])<6)
                                {
                                    echo'<div class="alert alert-danger text-center" role="alert">Mot de passe trop court!! Au moins 6 caractères.</div>';
                                }

                            else
                            {
                                if ($_POST['mdp_cli']!=$_POST['con_mdp_cli'])
                                    {
                                        echo'<div class="alert alert-danger text-center" role="alert">Mot de passe pas conforme</div>';
                                    }
                                
                                else
                                    {
                                        if(strlen($_POST['tel_cli'])<8)
                                        {
                                            echo'<div class="alert alert-danger text-center" role="alert">Numéro de téléphone incorrecte</div>';
                                        }
                                        else
                                        {
                                            $ins=$db->prepare('INSERT INTO client (nom_client,prenom_client,tel_client,age_client,adresse_client,pseudo_client,password_client) VALUES(:nom,:prenom,:tel,:age,:adresse,:pseudo,:password)');

                                            $ins->execute(array('age'=>$_POST['age_cli'],'nom'=>$_POST['nom_cli'],'prenom'=>$_POST['prn_cli'],'tel'=>$_POST['tel_cli'],'adresse'=>$_POST['adr_cli'],'pseudo'=>$_POST['psd_cli'],'password'=>sha1($_POST['mdp_cli'])));
                                            
    
                                           // header('Location:redirection.php');
                                        }
                                    }
                            }
                        }
                }
            }

        }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" class="well">
       <marquee> <p >Veuillez remplir le formulaire ci-dessous</p></marquee>
        <div class="row ">
            <div class="col-md-6">
            <div class="form-group">
                <label>Nom</label>
                <input type="text" class="form-control" name="nom_cli" required placeholder="Votre nom" style="width: 300px !important;">
            </div>
            <div class="form-group">
                <label>Prénoms</label>
                <input class="form-control" type="text" name="prn_cli" required placeholder="Votre Prénom" style="width: 300px !important;">
            </div>
            <div class="form-group">
                <label>Adresse email</label>
                <input type="email" name="adr_cli" class="form-control" required placeholder="Votre Adresse" style="width: 300px !important;">
            </div>
            <div class="form-group">
                <label>Téléphone</label>
                <input type="number" name="tel_cli" class="form-control" required placeholder="Votre Téléphone" min="1" style="width: 300px !important;">
            </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Age</label>
                    <input type="number" name="age_cli"  class="form-control" required placeholder="Votre Age" min="1" max="200" style="width: 300px !important;">
                </div>
                <div class="form-group">
                    <label>Pseudo</label>
                    <input type="text" name="psd_cli" class="form-control" required placeholder="Votre Pseudo" style="width: 300px !important;">
                </div>
                <div class="form-group">
                    <label class="text-center">Mot de passe</label>
                    <input type="password" name="mdp_cli" class="form-control" required placeholder="Votre Mot de passe" style="width: 300px !important;" >
                </div>
                <div class="form-group">
                    <label>Confirmation de mot de passe</label>
                    <input type="password" name="con_mdp_cli" class="form-control" required placeholder="Confirmation de mot de passe" style="width: 300px !important;" >
                </div>
            </div>
        <div class="form-group">
            <input type="submit" value="Inscription"  class="btn btn-primary form-control valider" style="width: 200px !important;" >
            <p><a href="connexion.php">Avez-vous un compte?</a></p>
        </div>
        </div>
    </form>
    <div class="row footer well">
        <div class="col-xs-4 footer-logo">
            <img src="images/logo.png" height="90">
        </div>
        <div class="col-xs-4">
            <h2>Nos Services</h2>
            <ul class="footer-services">
                <li>
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <a href="#">Liste1</a>
                </li>
            </ul>
            <ul class="footer-services">
                <li>
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <a href="#">Liste1</a>
                </li>
            </ul>
            <ul class="footer-services">
                <li>
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><a href="#">Liste1</a>
                </li>
            </ul>
            <ul class="footer-services">
                <li>
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <a href="#">Liste1</a>
                </li>
            </ul>
        </div>
        <div class="col-xs-4">
            <h2>Nous Contactez</h2>
            <address>
                <strong>Twitter, Inc.</strong><br>
                1355 Market Street, Suite 900<br>
                San Francisco, CA 94103<br>
                <abbr title="Phone">P:</abbr> (123) 456-7890
            </address>

            <address>
                <strong>Full Name</strong><br>
                <a href="mailto:#">first.last@example.com</a>
            </address>
        </div>
    </div>
</div>
<script src="vendor/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="vendor/bootstrap/dist/js/bootstrap.js" type="text/javascript"></script>

<script src="vendor/bootstrap-material-design/dist/js/ripples.min.js"></script>
<script src="vendor/bootstrap-material-design/dist/js/material.min.js"></script>

<script>
    $('.carousel').carousel({
        interval: 5000
    })
</script>
</body>

</html>
<!DOCTYPE>
<html>
<head>
    <title></title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/dist/css/bootstrap.css">
    <link href="vendor/bootstrap-material-design/dist/css/ripples.min.css" rel="stylesheet">
    <link href="vendor/bootstrap-material-design/dist/css/material-wfont.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/accueil.css">
    <link rel="stylesheet" type="text/css" href="assets/connexion.css">
</head>
<body class="top" >
    <div class="container">
                <?php

                    try
                    {
                        $db= new PDO('mysql:host=localhost;dbname=reservation', 'root', '');
                    }
                    catch(Exception $e)
                    {
                        die('Erreur : '.$e->getMessage());
                    }
                    if ($_SERVER['REQUEST_METHOD'] == 'POST')
                    {
                        extract($_POST);
                        if(strlen($_POST['mdp'])<6)
                        {
                            echo'<div class="alert alert-danger text-center com" role="alert">Mot de pase trop court! Au moins 6 caractères</div>';
                        }
                        elseif($_POST['mdp']=!$_POST['con_mdp'])
                        {
                            echo'<div class="alert alert-danger text-center com" role="alert">Mot de passe pas conforme. Veuillez réessayez</div>';
                        }
                        else
                        {
                             extract($_POST);
                            $re=$db->prepare('UPDATE client SET password_client=:mpd_new WHERE adresse_client=:adr');
                            $re->execute(array('mdp_new'=>sha1($_POST['mdp']),'adr'=>$_POST['mail']));
                            header('Location:connexion.php');
                        }
                        

                    }
                ?>
                <div class="row">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" class="connect">
                    
                    <div class="form-group">
                        <label>Adresse email</label>
                        <input type="email" name="mail" class="form-control" required placeholder="Votre Adresse email" />
                    </div> 
                    
                    <div class="form-group">
                        <label>Nouveau mot de passe</label>
                        <input type="password" name="mdp" class="form-control" required placeholder="Votre Adresse email" />
                    </div> 
                    <div class="form-group">
                        <label> Confirmation de mot de passe</label>
                        <input type="password" name="con_mdp" class="form-control" required placeholder="Votre Mot de passe"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Valider" class="form-control btn btn-primary"/>   
                    </div>

                </form>
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
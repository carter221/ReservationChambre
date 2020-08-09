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
                    $req=$db->prepare('SELECT adresse_client,password_client FROM client WHERE adresse_client=:adr AND password_client=:mdp');
                    $req->execute(array(':adr'=>$_POST['mail'],':mdp'=>sha1($_POST['mdp'])));
                    $found=$req->rowCount();
                    if($found)
                    {
                        header('Location:redirection.php');
                    }
                    else
                    {
                         echo'<div class="alert alert-danger text-center com" role="alert">Adresse email ou mot de passe incorrect!!!</div>';
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
                        <label>Mot de passe</label>
                        <input type="password" name="mdp" class="form-control" required placeholder="Votre Mot de passe"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Connexion" class="form-control btn btn-primary"/>   
                    </div>

                </form>
                </div>
        <p class="text-center" style="margin-top:75px;"><a href="mdp_forget.php" style="color:black; text-decoration:none;">Mot de passe oublié?</a></p>
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
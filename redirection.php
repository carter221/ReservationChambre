<!DOCTYPE>
<html>
<head>
    <title></title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/dist/css/bootstrap.css">
     <link href="vendor/bootstrap-material-design/dist/css/ripples.min.css" rel="stylesheet">
        <link href="vendor/bootstrap-material-design/dist/css/material-wfont.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/accueil.css">
</head>
<body>
<div class="container">
    <div class="row top">
        <div class="col-xs-12">
            <img src="images/logo.png" height="90">
            <a class="btn btn-primary pull-right" href="inscription.php" role="button">Sign up</a>
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
    <div class="alert alert-success text-center" role="alert">Votre réservation a été bien faite. Merci et a la prochaine.</div>
    <div class="row recherche well" style="margin-left: 0px; margin-right: 0px;">
        <h1 class="text-center">Retrouver les meilleures salles pour n'importe quel evenement</h1>
        <form class="form-inline text-center" action="recherche.php" method="post">
            <div class="form-group">
                <select name="typ_salle" style="width: 174px !important; height: 30px !important;" required>
                    <option>Types de salles</option>
                    <option value="Reunion">Reunion</option>
                    <option value="Conference">Conférence</option>
                    <option value="Reception">Réception</option>
                </select>
            </div>
            <div class="form-group">
                <input type="number" min="1" max="2000" class="form-control" name="reche_place" placeholder="Nombre de places">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="reche_debut" placeholder="Date de début" required>
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="reche_fin" placeholder="Date de début" required>
            </div>
            <button type="submit" class="btn btn-primary">Trouver une salle</button>
        </form>
    </div>
    <div class="row" style="padding-bottom: 30px;">
        <div class="col-xs-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner carouImg" role="listbox">
                    <div class="item active">
                        <img src="images/chambres/chambre6.jpg">
                        <div class="carousel-caption">
                            <h3>Chambre LOUIS III</h3>
                            <p>Chambre personnalisée à l'écossaire</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/chambres/chambre1.jpg">
                        <div class="carousel-caption">
                            <h3>Chambre PADRE</h3>
                            <p>Chambre à personnalisation simple</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/chambres/chambre7.jpg" class="img-responsive">
                        <div class="carousel-caption">
                            <h3>Chambre PADRE</h3>
                            <p>Chambre à personnalisation simple</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/chambres/chambre8.jpg" class="img-responsive">
                        <div class="carousel-caption">
                            <h3>Chambre COMMANDO</h3>
                            <p>Chambre personnalisée avec le luxe du bois</p>
                        </div>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php
    try
    {
        $db= new PDO('mysql:host=localhost;dbname=reservation', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    ?>

    <div class="row">
        <div class="col-xs-3">
            <div class="thumbnail">
                <?php
                $ins=$db->query('SELECT nom_salle,capacite_salle,prix_salle,photo_salle,lien_salle,type_salle FROM salle WHERE type_salle="Reception"');

                $reponse=$ins->fetch();
                ?>
                <img src="<?php echo "images/reception/".$reponse['photo_salle'];?>"/>
                <div class="caption">
                    <?php
                    echo '<span>Salle de </span>'.$reponse['type_salle'].'<br>'.$reponse['nom_salle'].'<br>'.$reponse['capacite_salle'].'<br>'.''
                    ?>
                    <p><a href="<?php echo $reponse['lien_salle'];?>" class="btn btn-primary" role="button">Voir</a></p>
                </div>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="thumbnail">
                <?php
                $ins=$db->query('SELECT nom_salle,capacite_salle,prix_salle,photo_salle,lien_salle,type_salle FROM salle WHERE type_salle="Conference"');

                $reponse=$ins->fetch();
                ?>
                <img src="<?php echo "images/réunion/".$reponse['photo_salle'];?>"/>
                <div class="caption">
                    <?php
                    echo '<span>Salle de </span>'.$reponse['type_salle'].'<br>'.$reponse['nom_salle'].'<br>'.$reponse['capacite_salle'].'<br>'.''
                    ?>

                    <p><a href="<?php echo $reponse['lien_salle'];?>" class="btn btn-primary" role="button">Voir</a></p>
                </div>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="thumbnail">
                <?php
                $ins=$db->query('SELECT nom_salle,capacite_salle,prix_salle,photo_salle,lien_salle,type_salle FROM salle WHERE type_salle="Reunion"');

                $reponse=$ins->fetch();
                ?>
                <img src="<?php echo "images/réunion/".$reponse['photo_salle'];?>"/>
                <div class="caption">
                    <?php
                    echo '<span>Salle de </span>'.$reponse['type_salle'].'<br>'.$reponse['nom_salle'].'<br>'.$reponse['capacite_salle'].' <span>Places</span><br>'
                    ?>

                    <p><a href="<?php echo $reponse['lien_salle'];?>" class="btn btn-primary" role="button">Voir</a></p>
                </div>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="thumbnail">
                <?php
                $ins=$db->query('SELECT nom_salle,capacite_salle,prix_salle,photo_salle,lien_salle,type_salle FROM salle WHERE type_salle="Conference"');

                $reponse=$ins->fetch();
                ?>
                <img src="<?php echo "images/réunion/".$reponse['photo_salle'];?>"/>
                <div class="caption">
                    <?php
                    echo'<span>Salle de </span>'.$reponse['type_salle'].'<br>'.$reponse['nom_salle'].'<br>'.$reponse['capacite_salle'].'<br>'.''
                    ?>

                    <p><a href="<?php echo $reponse['lien_salle'];?>" class="btn btn-primary" role="button">Voir</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row footer well">
        <div class="col-xs-4 footer-logo">
            <img src="images/logo.png" height="90">
        </div>
        <div class="col-xs-4">
            <h2>Nos Services</h2>
            <ul class="footer-services">
                <li>
                    <a href="#">Liste1</a>
                </li>
            </ul>
            <ul class="footer-services">
                <li>
                    <a href="#">Liste1</a>
                </li>
            </ul>
            <ul class="footer-services">
                <li>
                    <a href="#">Liste1</a>
                </li>
            </ul>
            <ul class="footer-services">
                <li>
                    <a href="#">Liste1</a>
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
    $('.carousel').carousel(,function{
        data-interval="5000"
    })
</script>
</body>

</html>

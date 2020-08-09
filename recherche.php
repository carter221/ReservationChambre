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
                   <div class="row">
                        <ol class="breadcrumb" style="margin-left: 14px; margin-right: 14px">
                          <li><a href="index.php">Home</a></li>
                          <li class="active">Recherche de salles</li>
                        </ol>    
                    </div>
                    <div class="row">
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
                            $type=$_POST['typ_salle'];
                            if ($_POST['reche_fin'] < $_POST['reche_debut'] || $_POST['reche_fin'] < $_POST['reche_debut'] )
                            {
                                echo'<div class="alert alert-danger text-center" role="alert">Intervalle de réservation incorrecte!!!</div>';
                            }
                            else
                            {
                            if ($type=='Reunion')
                            {
                                $data=$db->prepare('SELECT nom_salle,capacite_salle,prix_salle,photo_salle,lien_salle,sonorisation,ventille,climatisation FROM salle INNER JOIN reservation ON salle.nom_salle = reservation.nom_sall WHERE capacite_salle=:place AND :dat > date_fin_even AND type_salle=:ty_sal ');
                                $data->execute(array(':place'=>$_POST['reche_place'], ':dat'=>$_POST['reche_debut'],'ty_sal'=>$type));
                                $count=$data->rowCount();
                                if($count)
                                {
                                    while ($response=$data->fetch())
                                    {
                                        ?>
                                        <div class="row" style="margin-bottom:10px; margin-left:0px;">
                                         <div class="col-xs-3"> <img src="<?php echo "images/réunion/".$response['photo_salle'];?>" class="img-responsive" height="100" width="200"/></div>
                                               <div class="col-xs-3">
                                                   <?php echo $response['nom_salle'].'<br>'.$response['capacite_salle'].' Places'.'<br>'.$response['prix_salle'].' FCFA /jour'.'<br>';?>
                                                    <?php
                                                        if ($response['sonorisation']==1);
                                                        {
                                                            echo 'Sonorisé';
                                                        }
                                                           if ($response['ventille']==1);
                                                           {
                                                               echo 'Ventillé';
                                                           }
                                                               if ($response['climatisation']==1);
                                                               {
                                                                   echo 'Climatisé';
                                                               }
                                                   ?>
                                               </div>
                                              <div class="col-xs-3">  <a href="<?php echo $response['lien_salle'];?>" class="btn btn-primary" role="button">Voir</a>
                                               <a href="inscription.php" class="btn btn-danger" role="button" >Réserver</a></div>
                                               </div>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo'<div class="alert alert-danger" role="alert">Désolée aucune salle n\'est actuellement disponible dans l\'intervalle demandée.</div>';
                                }
                            }
                            elseif ($type=='Reception')
                            {
                                    $data = $db->prepare('SELECT nom_salle,capacite_salle,prix_salle,photo_salle,lien_salle,sonorisation,ventille,climatisation FROM salle INNER JOIN reservation ON salle.nom_salle = reservation.nom_sall WHERE capacite_salle=:place AND :dat > date_fin_even AND type_salle=:ty_sal ');
                                    $data->execute(array(':place' => $_POST['reche_place'], ':dat' => $_POST['reche_debut'], 'ty_sal' => $type));
                                    $count = $data->rowCount();
                                    if ($count)
                                    {
                                        while ($response = $data->fetch())
                                        {
                                            ?>
                                            <div class="row" style="margin-bottom:10px; margin-left:0px;">
                                            <div class="col-xs-3"><img
                                                        src="<?php echo "images/reception/" . $response['photo_salle']; ?>"
                                                        class="img-responsive" height="100" width="200"/></div>
                                            <div class="col-xs-3">
                                                <?php echo $response['nom_salle'].'<br>'.$response['capacite_salle'].' Places'.'<br>'.$response['prix_salle'].' FCFA /jour'.'<br>';?>
                                                <?php
                                                if ($response['sonorisation'] = '1') ;
                                                {
                                                    echo 'Sonorisé';
                                                }
                                                if ($response['ventille'] = '1') ;
                                                {
                                                    echo 'Ventillé';
                                                }
                                                if ($response['climatisation'] = '1') ;
                                                {
                                                    echo 'Climatisé';
                                                }
                                                ?>
                                            </div>
                                            <div class="col-xs-3">
                                                <a href="<?php echo $response['lien_salle']; ?>" class="btn btn-primary" role="button">Voir</a>
                                                <?php $var=$response['nom_salle']?>
                                                <a href="inscription.php?sal=<?php $var ?>" class="btn btn-danger" role="button" >Réserver</a></div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    else
                                        {
                                        echo '<div class="alert alert-danger" role="alert">Désolée aucune salle n\'est actuellement disponible dans l\'intervalle demandée.</div>';
                                    }
                                }
                            elseif ($type=='Conference')
                            {
                                $data = $db->prepare('SELECT nom_salle,capacite_salle,prix_salle,photo_salle,lien_salle,sonorisation,ventille,climatisation FROM salle INNER JOIN reservation ON salle.nom_salle = reservation.nom_sall WHERE capacite_salle=:place AND :dat > date_fin_even AND type_salle=:ty_sal ');
                                $data->execute(array(':place' => $_POST['reche_place'], ':dat' => $_POST['reche_debut'], 'ty_sal' => $type));
                                $count = $data->rowCount();
                                if ($count) {
                                    while ($response = $data->fetch()) {
                                        ?>
                                        <div class="row" style="margin-bottom:10px; margin-left:0px;">
                                        <div class="col-xs-3"><img
                                                    src="<?php echo "images/réunion/" . $response['photo_salle']; ?>"
                                                    class="img-responsive" height="100" width="200"/></div>
                                        <div class="col-xs-3">
                                            <?php echo $response['nom_salle'].'<br>'.$response['capacite_salle'].' Places'.'<br>'.$response['prix_salle'].' FCFA /jour'.'<br>';?>
                                            <?php
                                            if ($response['sonorisation'] == '1') ;
                                            {
                                                echo 'Sonorisé';
                                            }
                                            if ($response['ventille'] == '1') ;
                                            {
                                                echo 'Ventillé';
                                            }
                                            if ($response['climatisation'] == '1') ;
                                            {
                                                echo 'Climatisé';
                                            }
                                            ?>
                                        </div>
                                        <div class="col-xs-3"><a href="<?php echo $response['lien_salle']; ?>"
                                                                 class="btn btn-primary" role="button">Voir</a>
                                            <a href="inscription.php" class="btn btn-danger" role="button">Réserver</a></div>
                                        </div>
                                        <?php
                                    }
                                } 
                                else 
                                {
                                    echo '<div class="alert alert-danger" role="alert">Désolée aucune salle n\'est actuellement disponible dans l\'intervalle demandée.</div>';
                                }
                            }
                            else
                            {
                                echo '<div class="alert alert-danger text-center" role="alert">Type de salle non valide. Veuillez rééssayez!!</div>';
                            }
                            }
                            ?>
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
            <div class="modal fade" id="fourImage">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" class="well">
                                <marquee> <p >Veuillez remplir le formulaire ci-dessous</p></marquee>
                                <div class="row ">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nom</label>
                                            <input type="text" class="form-control" name="nom_cli" required placeholder="Votre nom" style="width: 200px !important;">
                                        </div>
                                        <div class="form-group">
                                            <label>Prénoms</label>
                                            <input class="form-control" type="text" name="prn_cli" required placeholder="Votre Prénom" style="width: 200px !important;">
                                        </div>
                                        <div class="form-group">
                                            <label>Adresse</label>
                                            <input type="text" name="adr_cli" class="form-control" required placeholder="Votre Adresse" style="width: 200px !important;">
                                        </div>
                                        <div class="form-group">
                                            <label>Téléphone</label>
                                            <input type="number" name="tel_cli" class="form-control" required placeholder="Votre Téléphone" min="0" style="width: 200px !important;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input type="number" name="age_cli"  class="form-control" required placeholder="Votre Age" min="0" style="width: 200px !important;">
                                        </div>
                                        <div class="form-group">
                                            <label>Pseudo</label>
                                            <input type="text" name="psd_cli" class="form-control" required placeholder="Votre Pseudo" style="width: 200px !important;">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-center">Mot de passe</label>
                                            <input type="password" name="mdp_cli" class="form-control" required placeholder="Votre Mot de passe" style="width: 200px !important;" >
                                        </div>
                                        <div class="form-group">
                                            <label>Confirmation de mot de passe</label>
                                            <input type="password" name="con_mdp_cli" class="form-control" required placeholder="Confirmation de mot de passe" style="width: 200px !important;" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Inscription"  class="btn btn-primary " >
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer"> <a href="<?php echo $response['lien'];?>" class="btn btn-primary" role="button">Voir</a></>
                            <button type="button" class="btn btn-danger">Supprimer</button>
                            <button type="button" class="btn btn-info">Partager</button>
                            <button type="button" class="btn btn-primary">Vendre</button>
                        </div>
                    </div>
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
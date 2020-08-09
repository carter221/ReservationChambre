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
              <li class="active">Salles de Réception</li>
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

            $req=$db->query('SELECT nom_salle,capacite_salle,prix_salle,photo_salle,lien_salle FROM salle WHERE type_salle = "Reception"');

            while ($ans=$req->fetch())
            {
                ?>  

                <div class="row" style="margin-bottom:10px; margin-left:0px;">                        
                <div class="col-xs-3"> 
                    <img src="<?php echo "images/reception/".$ans['photo_salle'];?>" class="img-responsive" height="100" width="200"/>
                </div>
                                               <div class="col-xs-3">
                                               <?php echo $ans['nom_salle'].'<br>'.$ans['capacite_salle'].'<br>'.$ans['prix_salle'].'<br>';?>
                                               </div>
                                              <div class="col-xs-3">  <a href="<?php echo $ans['lien_salle'];?>" class="btn btn-primary" role="button">Voir</a>
                                              
                                    <a href="inscription.php" class="btn btn-danger" role="button" >Réserver</a></div></div>
                
              <?php
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
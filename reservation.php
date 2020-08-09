<!DOCTYPE>
<html>
	<head>
		<title></title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/dist/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="accueil.css">
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
            <div class="row">
                <div class="col-xs-12">

                     <nav class="navbar navbar-default .navbar-static-top menu">
                      <div class="container .navbar-static-top">
                        <ul class="nav nav-pills">
                          <li role="presentation"><a href="index.php" role="button" class="btn btn-danger">Home</a></li>
                           <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle btn btn-danger" data-toggle="dropdown" href="#" role="button">
                              Services
                            </a>
                            <ul class="dropdown-menu">
                                <li role="presentation" ><a href="reservation.php" class="text-center">Réservation de salles de fètes</a></li>
                                <li role="presentation" ><a href="images/01.jpg" class="text-center">Service traiteur</a></li>
                                <li role="presentation" ><a href="images/01.jpg" class="text-center">Déoration</a></li>
                            </ul>
                           </li>
                          <li role="presentation"><a href="#"class="btn-danger" role="button">Messages</a></li>
                        </ul>
                      </div>
                    </nav>
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
											$ins=$db->query('SELECT * FROM salle WHERE id_salle');

												$reponse=$ins->fetch();
												?>
												<img src="<?php echo "images/".$reponse['photo_salle'];?>"/>
												<div class="caption">
														<?php
													echo $reponse['nom_salle'].'<br>'.$reponse['adresse_salle'].'<br>'.''
														?>

														<a href="<?php echo $reponse['lien_salle'];?>" class="btn btn-primary" role="button">Voir</a>
												</div>
										</div>
								</div>
								<div class="col-xs-3">
										<div class="thumbnail">
												<?php
											$ins=$db->query('SELECT * FROM salle WHERE id_salle=2');

												$reponse=$ins->fetch();
												?>
												<img src="<?php echo "images/".$reponse['photo_salle'];?>"/>
												<div class="caption">
														<?php
													echo $reponse['nom_salle'].'<br>'.$reponse['adresse_salle'].'<br>'.''
														?>

														<a href="<?php echo $reponse['lien_salle'];?>" class="btn btn-primary" role="button">Voir</a>
												</div>
										</div>
								</div>
								<div class="col-xs-3">
										<div class="thumbnail">
												<?php
											$ins=$db->query('SELECT * FROM salle WHERE id_salle=3');

												$reponse=$ins->fetch();
												?>
												<img src="<?php echo "images/".$reponse['photo_salle'];?>"/>
												<div class="caption">
														<?php
													echo $reponse['nom_salle'].'<br>'.$reponse['adresse_salle'].'<br>'.''
														?>

														<a href="<?php echo $reponse['lien_salle'];?>" class="btn btn-primary" role="button">Voir</a>
												</div>
										</div>
								</div>
								<div class="col-xs-3">
										<div class="thumbnail">
												<?php
											$ins=$db->query('SELECT * FROM salle WHERE id_salle=4');

												$reponse=$ins->fetch();
												?>
												<img src="<?php echo "images/".$reponse['photo_salle'];?>"/>
												<div class="caption">
														<?php
													echo $reponse['nom_salle'].'<br>'.$reponse['adresse_salle'].'<br>'.''
														?>

														<a href="<?php echo $reponse['lien_salle'];?>" class="btn btn-primary" role="button">Voir</a>
												</div>
										</div>
								</div>
						</div>
          
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
              <p class="reser_form">Faites vos demandes de reservation.</p>
              <div class="form-group">
                <label for="exampleInputEmail1">Votre Nom et prénoms (obligatoire)</label>
                <input type="text" class="form-control" name="nom" placeholder="Nom" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Votre Email (obligatoire)</label>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Votre Tel (obligatoire)</label>
                <input type="number" class="form-control" name="tel" placeholder="Tel" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nature de l'évènement</label>
                <input type="text" class="form-control" name="even">
              </div>
                <label>Votre Message</label>
                <textarea class="form-control form-area" rows="3" placeholder="Message" name="msg"></textarea>
                <div class="checkbox">
                <label>
                  <input type="checkbox" required> Confirmer votre demande
                </label>
              </div>
              <button type="submit" class="btn btn-success form-btn" value="Envoyer" name="valid">Submit</button>
            </form>

         <div class="row footer">
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
            $('.carousel').carousel({
              interval: 5000
            })
        </script>
	</body>

</html>

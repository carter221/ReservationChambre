<?php

    try
       {
       $db= new PDO('mysql:host=localhost;dbname=reservation', 'root', '');
       $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);         }
       catch(Exception $e)
       {
        die('Erreur : '.$e->getMessage());
       }
             if ($_SERVER['REQUEST_METHOD'] == 'POST')
             {
                 extract($_POST);

                $ins=$db->prepare('INSERT INTO client (id_client,nom_client,prenom_client,age_client) VALUES(:id,:nom,:email,:tel)');

                $ins->execute(array('id'=>$_POST['id1'],'nom'=>$_POST['num'],'email'=>$_POST['nom'],'tel'=>$_POST['adr']));

                echo'<div class="alert alert-success" role="alert">Votre demande a été bien transmise.</div>';

         }
?>

 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
              <p>Faites vos demandes de reservation.</p>
                 <div class="form-group">
                     <label for="exampleInputEmail1">Numero de salle</label>
                     <input type="number" class="form-control" name="id1" placeholder="Nom" required>
                 </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Numero de salle</label>
                <input type="text" class="form-control" name="num" placeholder="Nom" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nom de salle</label>
                <input type="text" class="form-control" name="nom" placeholder="Email" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Adresse salle</label>
                <input type="number" class="form-control" name="adr" placeholder="Tel" required>
              </div>

              <button type="submit" class="btn btn-success form-btn" value="Envoyer" name="valid">Submit</button>
            </form>

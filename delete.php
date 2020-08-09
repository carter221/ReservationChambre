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
      
      $data=$db->prepare('DELETE FROM salle WHERE type_salle=:ty');

      $data->execute(array('ty'=>$_GET['typ']));

      echo "SALLE DE FETE SUPPRIMER";
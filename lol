 $count=$data->rowCount();
                                    if($count)
                                    {
                                            while ($response=$data->fetch())
                                            {
                                                echo $response['nom'].'<br>'.$response['adresse'].'<br>'.$response['caracsal'].'<br>';
                                            }

                                    }
                                    else
                                    {
                                        echo'<div class="alert alert-danger" role="alert">Aucun résultats pour votre recherche.</div>';
                                    }





$count=$data->rowCount();
                                       if($count)
                                        {
                                            while ($response=$data->fetch())
                                            {
                                                echo $response['nom'].'<br>'.$response['adresse'].'<br>'.$response['caracsal'].'<br>';
                                            }

                                       }
                                        else
                                        {
                                            echo'<div class="alert alert-danger" role="alert">Aucun résultats pour votre recherche.</div>';
                                        }








$count=$data->rowCount();
                                            if($count)
                                            {
                                                while ($response=$data->fetch())
                                                {
                                                    echo $response['nom'].'<br>'.$response['adresse'].'<br>'.$response['caracsal'].'<br>';
                                                }

                                            }
                                            else
                                            {
                                                echo'<div class="alert alert-danger" role="alert">Aucun résultats pour votre recherche.</div>';
                                            }










 $count=$data->rowCount();
                                                if($count)
                                                {
                                                    while ($response=$data->fetch())
                                                    {
                                                        echo $response['nom'].'<br>'.$response['adresse'].'<br>'.$response['caracsal'].'<br>';
                                                    }

                                               }
                                                else {
                                                    echo '<div class="alert alert-danger" role="alert">Aucun résultats pour votre recherche.</div>';
                                                }











                                                else
                                                                                {
                                                                                    if (isset($_POST['sea_prix']) AND isset($_POST['sea_places']))
                                                                                    {
                                                                                        $data=$db->prepare('SELECT nom,adresse,caracsal,photo FROM salfete WHERE prix=:prixsal AND nbreplace=:place');
                                                                                        $data->execute(array(':prixsal'=>$_POST['sea_prix'],':place'=>$_POST['sea_places']));
                                                                                        while ($response=$data->fetch())
                                                                                        {
                                                                                            echo $response['nom'].'<br>'.$response['adresse'].'<br>'.$response['caracsal'].'<br>';
                                                                                        }

                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        if (isset($_POST['sea_prix']) AND isset($_POST['sea_dim']))
                                                                                        {
                                                                                            $data=$db->prepare('SELECT nom,adresse,caracsal,photo FROM salfete WHERE prix=:prixsal AND dimension=:dim');
                                                                                            $data->execute(array(':prixsal'=>$_POST['sea_prix'],':dim'=>$_POST['sea_dim']));
                                                                                            while ($response=$data->fetch())
                                                                                            {
                                                                                                echo $response['nom'].'<br>'.$response['adresse'].'<br>'.$response['caracsal'].'<br>';
                                                                                            }

                                                                                        }
                                                                                        else
                                                                                        {
                                                                                            if (isset($_POST['sea_prix']))
                                                                                            {
                                                                                                $data=$db->prepare('SELECT nom,adresse,caracsal FROM salfete WHERE prix=:prixsal');
                                                                                                $data->execute(array(':prixsal'=>$_POST['sea_prix']));
                                                                                                while ($response=$data->fetch())
                                                                                                {
                                                                                                    echo $response['nom'].'<br>'.$response['adresse'].'<br>'.$response['caracsal'].'<br>';
                                                                                                }


                                                                                            }

                                                                                        }
                                                                                    }
                                                                                }












  $ins=$db->prepare('INSERT INTO client (nom_client,prenom_client,age_client,tel_client,adresse_client,pseudi_client,password_client) VALUES(:nom_cli,:prn_cli,:age_cli,:tel_cli,:adr_cli,:psd_cli,:mdp_cli)');

              $ins->execute(array('nom_cli'=>$_POST['nom_cli'],'prn_cli'=>$_POST['prn_cli'],'age_cli'=>$_POST['age_cli'],'tel_cli'=>$_POST['tel_cli'],'adr_cli'=>$_POST['adr_cli'],'psd_cli'=>$_POST['psd_cli'],'mdp_cli'=>['mdp_cli']));
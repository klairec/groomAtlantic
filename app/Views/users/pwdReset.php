<?php $this->layout('layoutTestNico', ['title' => 'Inscription/Groom']) ?>

<?php $this->start('header') ?>
            <div class="container">



                <div class="table">

                    <div class="header-text">

                        <div class="row">

                                <h2 class="light white">Mot de passe oublié</h2>
                                    
                            
                                    <form method="post">
                                        
                                      <div class="form-group">
                                        <label for="email">Veuillez rentrer voter adresse de messagerie</label>
                                        <input type="email" class="form-control" id="email" placeholder="Votre email" name="email">
                                      </div>
                                      <button type="submit" class="btn btn-link">Envoyer le lien de réinitialisation</button>
                                        
                                    </form>
                                    <?php 
                                        if(!empty($errors)){

                                            echo'<p>'.implode('<br>', $errors).'</p>';

                                        }

                                        if($formValid == true){
                                            
                                            $mail = new PHPMailer();

                                            $mail->isSMTP();
                                            $mail->Host = 'smtp.gmail.com';
                                            $mail->SMTPAuth   = true;

                                            $mail->Username   = 'groomatlantic@gmail.com';
                                            $mail->Password   = 'manouche123';

                                            $mail->SMTPSecure = 'ssl';
                                            $mail->Port = 465;

                                            $mail->SetFrom('reset.password@email.fr', 'GroomAtlantic');
                                            $mail->addAddress($email);
                                            $mail->isHTML(true);

                                            $mail->Subject = 'Sujet';
                                            $mail->Body = '<a href="http://localhost/groomatlantic/public/users/traitement_reset.php?idUser=' . $userInfo['id'] . '&token=' . $token . '">Changer le mot de passe</a>';

                                            echo'<p>Un message de réinitialisation a été envoyé à l\'adresse indiquée</p>';
                                            
                                            if(!$mail->Send()){
                                                echo 'Erreur d\'envoi';
                                                echo 'Erreur : ' . $mail->ErrorInfo;
                                            }
                                            else{
                                                
                                                echo '<p style="color: green; text-align: center; font-size:20px;">Veuillez consulter votre boite email pour modifier votre mot de passe.</p>';
                                                
                                            }
                                            
                                            
                                        }


                                    ?>
                        </div>
                    </div>
                </div>
            </div>
<?php $this->stop('header') ?>

<?php $this->start('main_content') ?>


<?php $this->stop('main_content') ?>
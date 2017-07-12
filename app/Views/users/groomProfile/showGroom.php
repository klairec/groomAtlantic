<?php $this->layout('layoutTestNico', ['title' => 'Mon profil']) ?>

<?php $this->start('css') ?>
<style>
    header {
        display: none;
    }

    body{
        background: #89b5f7;
    }
</style>
<?php $this->stop('css') ?>

<?php $this->start('main_content') ?>
<div class="table">
    <div class="header-text">
        <div id="DivFormG" class="row">
            <div class="col-md-12 text-center">
                <section class="profile">
                    <h3 class="strong white text-center">MON PROFIL</h3>
                    <figure id="profile_picture">
                        <img src="<?= $this->assetUrl('img/profilePict/'), $showInfos['photo'] ?>" class="img-circle">
                    </figure>
                    <p class="light white text-center">Bonjour,&nbsp;<?=$showInfos['firstname']; ?>&nbsp;<?=$showInfos['lastname']; ?></p>
                    <p class="light white text-center">Email : <?=$showInfos['email']; ?></p>
                    <p class="light white text-center">Téléphone : <?=$showInfos['phone']; ?></p>
                    <p class="light white text-center">Adresse : <?=$showInfos['address']; ?></p>
                    <p class="light white text-center">Code postal : <?=$showInfos['postcode']; ?></p>
                    <p class="light white text-center">Ville : <?=$showInfos['cityUser']; ?></p>
                    <p class="light white text-center">Date d'inscription : <?=$showInfos['date_creation']; ?></p>
                    <a href="<?= $this->url('change_profile');?>" class="btn btn-blue">Modifier mon profil</a>
                    <br>
                    <br>
                    <a href="<?= $this->url('delete_profile');?>" class="btn btn-blue"
                       onClick="if(confirm('Souhaitez-vous supprimer votre compte ?')){return true;}else{return false;}">
                        Me désinscrire</a><br>
                </section><!-- AFFICHAGE DES DONNEES UTILISATEUR -->

                <!-- AFFICHAGE DES SERVICES/PRIX -->
                <hr>
                <section class="skills">
                    <h3 class="light white text-center">MES SERVICES</h3>
                    <?php if(!empty($services)):?>
                    <?php 
                    /*
                    echo '<pre>';
                    print_r($prices);
                    echo '</pre>';
                    */
                    ?> 
                    <div class="form-group">
                        <h4 class="light white text-center">Ma description</h4>
                        <textarea rows="10" cols="50" id="comment">
                            <?php foreach ($prices as $price): ?>
                            <?= nl2br($price['description']); ?>
                            <?php endforeach; ?>
                        </textarea>
                        <section class="tableau1">                 
                    </div>
                        <div class="row">
                            <center>
                                <table width=60%>
                                    <tbody>
                                        <tr align="center">
                                            <td><strong>Compétences</strong></td>
                                            <?php foreach ($services as $service): ?>
                                            <td><?= $service['skills']; ?></td>
                                            <?php endforeach; ?>
                                        </tr>
                                        <tr align="center">
                                            <td><strong>Prix</strong></td>
                                            <?php $pricesTab = explode(',', $prices[0]['price']); ?>
                                            <?php foreach ($pricesTab as $price): ?>
                                            <td><?= $price ?>€</td>
                                            <?php endforeach; ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </center>
                            <br>
                        </div>
                        </section>
                    <?php if(!empty($prices[0]['id_groom'])): ?>  
                    <a href="<?= $this->url('services_change', ['id' => $test['id']]) ?>" class="modifServ btn btn-blue" value="change">Modifier mes services</a>
                    <?php endif; ?>
                    <br>
                    <?php else: ?>
                    <div class="alert alert-danger">
                        Aucune service renseigné.
                    </div>
                    <?php endif; ?><!-- AFFICHAGE DES SERVICES/PRIX -->

                    <!-- AJOUT DE SERVICES / FENETRE MODALE -->
                    <?php if(empty($prices[0]['id_groom'])): ?>
                        <a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Ajouter des services</a>
                    <?php endif; ?>
                    
                    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content modal-popup">
                                <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
                                <h3 class="white">Ajouter des services</h3>
                                <form method="POST" action="<?= $this->url('users_showgroom') ?>">
                                    <div class="form-group">
                                        <label for="description">Ajouter une description</label>
                                        <textarea name="description" maxlength="300"></textarea>
                                    </div>
                                    <?php
                                    if(!empty($errorsText)){
                                    echo '<p style="color:red";>'.implode('<br>', $errorsText);
                                    }
                                    ?>
                                    <table>
                                        <tr>
                                            <label for="checkIn">
                                                <td>Check-in</td>
                                                <td><input type="checkbox" name="id_skill[]" value="1"></td>
                                                <td><input type="text" name="price[]" value=""></td>
                                            </label>
                                        </tr>
                                        <br>
                                        <tr>
                                            <label for="checkOut">
                                                <td>Check-out</td>
                                                <td><input type="checkbox" name="id_skill[]" value="2"></td>
                                                <td><input type="text" name="price[]"></td>
                                            </label>
                                        </tr>
                                        <br>
                                        <tr>
                                            <label for="cleaning">
                                                <td>Ménage</td>
                                                <td><input type="checkbox" name="id_skill[]" value="3"></td>
                                                <td><input type="text" name="price[]" placeholder="prix au m2"></td>
                                            </label>
                                            <br>
                                        </tr>
                                        <tr>
                                            <label for="gardenMaintenance">
                                                <td>Entretien espaces verts</td>
                                                <td><input type="checkbox" name="id_skill[]" value="4"></td>
                                                <td><input type="text" name="price[]" placeholder="prix au m2"></td>
                                            </label>
                                            <br>
                                        </tr>
                                        <tr>
                                            <label for="spMaintenance">
                                                <td>Entretien piscine</td>
                                                <td><input type="checkbox" name="id_skill[]" value="5"></td>
                                                <td><input type="text" name="price[]" placeholder="prix au m2"></td>
                                            </label>
                                            <br>
                                        </tr>
                                        <tr>
                                            <label for="fixing">`
                                                <td>Petit bricolage / Réparations</td>
                                                <td><input type="checkbox" name="id_skill[]" value="6"></td>
                                                <td><input type="text" name="price[]"></td>
                                            </label>
                                            <br>
                                        </tr>
                                    </table>
                                    <button type="submit" class="btn btn-submit">Ajouter</button>
                                </form>
                            </div>
                        </div>
                    </div><!-- FIN D'AJOUT DE SERVICES / FENETRE MODALE -->
                    <hr>
                    <!-- AFFICHAGE DES NOTIFICATIONS -->

                    <h3 class="light white text-center">NOTIFICATIONS</h3>

                    <!-- CONTACT ENGAGE -->

                    <?php if(!empty($contacts)):?>

                    <?php foreach ($contacts as $contact): ?>

                    <div>
                        <p><?= 'Vous avez été contacté par '.$contact['firstname'] .' '. $contact['lastname'].', pour la location suivante :'; ?></p>
                        <?php foreach ($propositions as $proposition): ?>
                        <p><?= $proposition['id'] . $proposition['id_type'].', '.$proposition['city'].'<br>'.'Souhaitez-vous lui communiquer vos coordonnées ?'; ?></p>
                        <?php endforeach; ?>
                        <form method="POST" action="">
                            <label>
                                <input type="checkbox" id="cbox1" value="checkbox1">Oui
                            </label>
                            <label>
                                <input type="checkbox" id="cbox2" value="checkbox2">Non
                            </label>
                        </form>
                    </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <div class="alert alert-danger">
                        <p>Pas de contact pour le moment</p>
                    </div>
                    <?php endif; ?>

                    <!-- CONFIRMATION DE CONTACT -->

                    <?php if(!empty($contacts)):?>

                    <?php foreach ($contacts as $contact): ?>
                    <div>
                        <p><?= $contact['firstname'] .' '. $contact['lastname'].' a confirmé avoir travailler avec vous, le confirmez-vous également ?'; ?></p>
                        <form method="POST" action="">
                            <label>
                                <input type="checkbox" id="cbox3" value="checkbox1">Oui
                            </label>   
                            <label>
                                <input type="checkbox" id="cbox4" value="checkbox2">Non
                            </label>
                        </form>
                    </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <div class="alert alert-danger">
                        <p>Pas de confirmation pour le moment</p>
                    </div>
                    <?php endif; ?>

                    <!-- NOUVEAU COMMENTAIRE DISPONIBLE -->

                    <?php if(!empty($comments)):?>

                    <?php foreach ($comments as $comment): ?>
                    <div>
                        <?php foreach ($commentsA as $commentA): ?>
                        <p><?= $commentA['firstname'].' a donné son avis sur votre prestation, vous pouvez le visualiser dans <a href=""><strong>Avis obtenus</strong></a>'; ?></p>
                        <?php endforeach; ?>
                    </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <div class="alert alert-danger">
                        <p>Pas de dernier commentaire pour le moment.</p>
                    </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<!-- AFFICHAGE AVIS OBTENUS -->

<div class="container">
    <div class="table">
        <div class="row">
            <div class="col-md-12 text-center">
                <section class="comments">
                    <?php if(!empty($comments)):?>

                    <?php foreach ($comments as $comment): ?>

                    <article>
                        <?php foreach ($commentsA as $commentA): ?>
                        <h3><?=$commentA['firstname']; ?></h3>
                        <?php endforeach; ?>
                        <div class="content">
                            <?=nl2br($comment['content']); ?>
                        </div>
                        <p><?=$comment['date']; ?></p>
                    </article>
                    <?php endforeach; ?>

                    <?php else: ?>
                    <div class="alert alert-danger">
                        <p>Pas de commentaire pour le moment.</p>
                    </div>
                    <?php endif; ?>

                </section>
            </div>
        </div>
    </div>
</div>

<?php $this->stop('main_content') ?>
<?php $this->start('js') ?>
<script>

</script>
<?php $this->stop('js') ?>
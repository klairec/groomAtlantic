<?php $this->layout('layoutTestNico', ['title' => 'Mon profil']) ?>

<?php $this->start('header') ?>

    <div class="container">
        <div class="table">
            <div class="header-text">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>Bonjour, <?= $w_user['firstname'] ?></p>
                        <section>
                            <h3>Mon profil</h3>
                            
                            <figure>
                                <img src="<?= $w_user['photo'] ?>">
                            </figure>
                            
                            <p>Nom : <?= $w_user['lastname'] ?></p>
                            <p>Prénom : <?= $w_user['firstname'] ?></p>
                            <p>Email : <?= $w_user['email'] ?></p>
                            <p>Téléphone : <?= $w_user['phone'] ?></p>
                            <p>Adresse : <?= $w_user['address'] ?></p>
                            <p>Code postal : <?= $w_user['postcode'] ?></p>
                            <p>Ville : <?= $w_user['cityUser'] ?></p>
                            <p>Date d'inscription : <?= $w_user['date_creation'] ?></p>
                            <a href="<?= $this->url('modif_groom'); ?>">Modifier mon profil</a><br>
                            <a href="">Désinscription</a><br>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->stop('header') ?>

    <?php $this->start('main_content') ?>

    <!-- AFFICHAGE INFOS LOCATIONS -->
<section class="rentals">
    <h3><?=(count($locations) <= 1) ? 'MA LOCATION' : 'MES LOCATIONS'; ?></h3>

    <!-- AFFICHAGE DES COMPETENCES -->
    <?php if(!empty($locations)):?>

        <?php foreach ($locations as $location): ?>

            <?php $locs = explode('|', $location['outdoor_fittings']); ?>

            <article>
                <h3><?=$location['title']; ?></h3>
                <p><span><?=$location['rooms']; ?>&nbsp;pièces</span>&nbsp;<span><?=$location['area']; ?>&nbsp;m²</span>&nbsp;
                    <?php foreach ($locs as $loc): ?>
                        <span><?= $loc; ?></span>
                    <?php endforeach; ?>
                </p>
                <p><span><?=$location['street']; ?></span>&nbsp;<span><?=$location['city']; ?></span>&nbsp;
                </p>
                <a href="<?= $this->url('rentals_change', ['id' => $location['id']]) ?>" class="btn btn-blue" value="change">Modifier</a>

                <a href="<?= $this->url('rentals_delete', ['id' => $location['id']]) ?>" class="btn btn-blue" value="delete" 
                    onClick="if(confirm('Confirmez vous la suppression de cette location ?')){return true;}else{return false;}">Supprimer</a>
                </article>
                <br>

            <?php endforeach; ?>

        <?php else: ?>
            <div class="alert alert-danger">
                Aucune location renseignée.
            </div>
        <?php endif; ?><!-- AFFICHAGE DES LOCATIONS -->


        <!-- AJOUT D'UNE LOCATION / FENETRE MODALE -->
        <a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Ajouter une location</a>

        <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modal-popup">
                    <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
                    <h3 class="white">Ajouter une location</h3>

                    <div><!-- affichage msg d'erreurs --></div>

                    <form method="POST" action="<?= $this->url('users_showowner') ?>">

                        <label for="title">Titre</label>
                        <input type="text" name="title" id="title">

                        <label for="type">Type de location</label>
                        <select name="type">
                            <option value="" selected disabled>--Sélectionnez--</option>
                            <option value="flat">Appartement</option>
                            <option value="house">Maison</option>
                            <option value="loft">Loft</option>
                            <option value="mobilhome">Mobilhome</option>
                        </select>

                        <label for="area">Surface</label>
                        <input type="text" name="area" id="area" placeholder="..m²">

                        <label for="rooms">Nombre de pièces</label>
                        <input type="text" name="rooms" id="rooms">

                        <label for="outdoor_fittings">Equipements extérieurs</label>
                        <label for="jardin">
                        <input type="checkbox" name="outdoor_fittings[]" value="jardin">
                        Jardin</label>
                        <label for="terrasse">
                        <input type="checkbox" name="outdoor_fittings[]" value="terrasse">
                        Terrasse</label>
                        <label for="balcon">
                        <input type="checkbox" name="outdoor_fittings[]" value="balcon">
                         Balcon</label>
                        <label for="piscine">
                        <input type="checkbox" name="outdoor_fittings[]" value="piscine">
                         Piscine</label>
                        <label for="jacuzzi">
                        <input type="checkbox" name="outdoor_fittings[]" value="jacuzzi">
                        Jacuzzi</label>

                                            <h3>Adresse</h3>
                                            <label for="street">Voie</label>
                                            <input type="text" name="street" id="street" placeholder="">

                                            <label for="postcode">Code postal</label>
                                            <input type="text" name="postcode" id="postcode" placeholder="">

                                            <label for="city">Ville</label>
                                            <input type="text" name="city" id="city" placeholder="">

                                            <button type="submit" class="btn btn-submit">Ajouter une location</button>

                                        </form>
                                    </div>
                                </div>
                            </div><!-- FIN AJOUT D'UNE LOCATION / FENETRE MODALE -->

    <div class="container">
        <div class="table">
            <div class="row">
                <div class="col-md-12 text-center">
                    <section class="notifications">
                        <h3>Notifications</h3>
                            
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
                            
                    </section>
                </div>
            </div>
        </div>
    </div>

<!-- DIFFERENTS AVIS OBTENUS -->

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
                        <hr>

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
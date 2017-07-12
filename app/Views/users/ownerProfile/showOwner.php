<?php $this->layout('layoutTestNico', ['title' => 'Espace Propriétaire']) ?>

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

<!-- AFFICHAGE DES DONNEES UTILISATEUR -->

<div class="table">
<div class="header-text">
    <div id="DivFormG" class="row">
        <div class="col-md-12 text-center">
            <section class="profile">
                <h3 class="strong white text-center">MON PROFIL</h3>
                <figure>
                    <img src="<?= $this->assetUrl('img/profilePict/'), $showInfos['photo'] ?>" alt="photo_de_profil">
                </figure>
                <p class="strong white text-center">Bonjour,&nbsp;<?=$showInfos['firstname']; ?>&nbsp;<?=$showInfos['lastname']; ?></p>
                <p class="strong white text-center">Email : <?=$showInfos['email']; ?></p>
                <p class="light white text-center">Téléphone : <?=$showInfos['phone']; ?></p>
                <p class="light white text-center">Adresse : <?=$showInfos['address']; ?></p>
                <p class="light white text-center">Code postal : <?=$showInfos['postcode']; ?></p>
                <p class="light white text-center">Ville : <?=$showInfos['cityUser']; ?></p>
                <p class="light white text-center">Date d'inscription : <?=$showInfos['date_creation']; ?></p>
                <a href="<?= $this->url('change_profileO');?>" class="btn btn-blue">Modifier mon profil</a>
                <br>
                <br>
                <a href="<?= $this->url('delete_profileO');?>" class="btn btn-blue"
                    onClick="if(confirm('Souhaitez-vous supprimer votre compte ?')){return true;}else{return false;}">
                    Me désinscrire</a><br>
            </section>

<!-- AFFICHAGE DES DONNEES UTILISATEUR -->
            
            <hr>

<!-- AFFICHAGE INFOS LOCATIONS -->

            <section class="rentals">
 
                <h3 class="light white text-center"><?=(count($locations) <= 1) ? 'MA LOCATION' : 'MES LOCATIONS'; ?></h3>

                <!-- AFFICHAGE DES LOCATIONS -->

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
                            <a href="<?= $this->url('rentals_delete', ['id' => $location['id']]) ?>" class="btn btn-blue" value="delete" onClick="if(confirm('Confirmez vous la suppression de cette location ?')){return true;}else{return false;}">Supprimer</a>
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
                    <div class="modal fade text-left" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content modal-popup">
                                <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
                                <h3 class="white">Ajouter une location</h3>
                                <div><!-- affichage msg d'erreurs --></div>
                                <form method="POST" action="<?= $this->url('users_showowner') ?>">
                                    <div class="form-group text-center">
                                        <label for="title">Titre</label>
                                        <input type="text" name="title" id="title" placeholder="Le nom de votre maison...">
                                    </div>
                                    <div class="form-group text-center">
                                        <label for="type">Type de location</label>
                                        <select name="type">
                                            <option value="" selected disabled>--Sélectionnez--</option>
                                            <option value="flat">Appartement</option>
                                            <option value="house">Maison</option>
                                            <option value="loft">Loft</option>
                                            <option value="mobilhome">Mobilhome</option>
                                        </select>
                                    </div>
                                    <div class="form-group text-center">
                                        <label for="area">Surface</label>
                                        <input type="text" maxlength="4" name="area" id="area" placeholder="..m²">
                                    </div>
                                    <div class="form-group text-center">
                                        <label for="rooms">Nombre de pièces</label>
                                        <input type="text" name="rooms" maxlength="3" id="rooms">
                                    </div>
                                    <div class="form-group text-center">
                                        <label for="outdoor_fittings">Equipements extérieurs</label>
                                        <label for="jardin">
                                        <input type="checkbox" name="outdoor_fittings[]" value="jardin">Jardin</label>
                                        <label for="terrasse">
                                        <input type="checkbox" name="outdoor_fittings[]" value="terrasse">Terrasse</label>
                                        <label for="balcon">
                                        <input type="checkbox" name="outdoor_fittings[]" value="balcon">Balcon</label>
                                        <label for="piscine">
                                        <input type="checkbox" name="outdoor_fittings[]" value="piscine">Piscine</label>
                                        <label for="jacuzzi">
                                        <input type="checkbox" name="outdoor_fittings[]" value="jacuzzi">Jacuzzi</label>
                                    </div>
                                    <h3 class="white">Adresse</h3>
                                    <div class="form-group text-center">
                                    <label for="street">Voie</label>
                                    <input type="text" name="street" id="street" placeholder="">
                                     </div>
                                     <div class="form-group text-center">
                                    <label for="postcode">Code postal</label>
                                    <input type="text" name="postcode" maxlength="5" id="postcode" placeholder="">
                                     </div>
                                     <div class="form-group text-center">
                                    <label for="city">Ville</label>
                                    <input type="text" name="city" id="city" placeholder="">
                                    </div>
                                    <button id="subscribe" type="submit" class="btn btn-submit">Ajouter une location</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section><!-- FIN AJOUT D'UNE LOCATION / FENETRE MODALE -->
                <hr>
                <!-- AFFICHAGE REDIRECTION VERS LA PAGE DE RECHERCHE -->

                <section class="groom_research">
                    <h3 class="light white text-center">ACCUEIL</h3>
                    <a href="<?= $this->url('default_home'); ?>" class="btn btn-blue">Rechercher un groom</a>
                </section>
            </div>
        </div>
    </div>
</div>

<!-- AFFICHAGE REDIRECTION VERS LA PAGE DE RECHERCHE -->
<hr>
<!-- AFFICHAGE NOTIFICATIONS -->

<section class="notifications">
    <h3 class="light white text-center">NOTIFICATIONS</h3>

    <!-- AFFICHAGE DES COORDONNES RECUES -->

    <div></div>

    <!-- AFFICHAGE CONFIRMATION  -->

    <div></div>

    <!-- AFFICHAGE NOTATION -->

    <div></div>
</section>
<!-- AFFICHAGE NOTIFICATIONS -->

<!-- AFFICHAGE AVIS LAISSES -->

<section class="marks_history">
    <div class="table">
        <div class="header-text">
            <div id="DivFormG" class="row">
                <div class="text-center">
                    <hr>
                    <h3 class="light white text-center">MES AVIS LAISSES</h3>
                    <?php if(!empty($comments)):?>
                        <?php foreach ($comments as $comment): ?>
                            <article>
                                <?php foreach ($commentsAd as $commentAd): ?>
                                    <h3><?=$commentAd['firstname']; ?></h3>
                                <?php endforeach; ?>
                                <div class="content">
                                    <?=nl2br($comment['content']); ?>
                                </div>
                                <p><?=$comment['date']; ?></p>
                            </article>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-danger">
                            <p>Aucun avis laissé.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section><!-- AFFICHAGE AVIS LAISSES -->

<?php $this->stop('main_content') ?>

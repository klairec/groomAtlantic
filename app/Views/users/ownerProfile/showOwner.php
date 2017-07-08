<?php $this->layout('layoutTestNico', ['title' => 'Espace Propriétaire']) ?>

<?php $this->start('main_content') ?>


<!-- AFFICHAGE DES DONNEES UTILISATEUR -->
<section class="profile">
    <h3>MON PROFIL</h3>


    <figure>
        <img src="/assets/img/profilePict/<?=$showInfos['photo']; ?>" alt="photo_de_profil">
    </figure>
    <p>Bonjour,&nbsp;<?=$showInfos['firstname']; ?>&nbsp;<?=$showInfos['lastname']; ?></p>
    <p>Email : <?=$showInfos['email']; ?></p>
    <p>Téléphone : <?=$showInfos['phone']; ?></p>
    <p>Adresse : <?=$showInfos['address']; ?></p>
    <p>Code postal : <?=$showInfos['postcode']; ?></p>
    <p>Ville : <?=$showInfos['city']; ?></p>
    <p>Date d'inscription : <?=$showInfos['date_creation']; ?></p>

    <a href="<?= $this->url('change_profileO');?>" class="btn btn-blue">Modifier mon profil</a><br>

    <a href="<?= $this->url('delete_profileO');?>" class="btn btn-blue"
    onClick="if(confirm('Souhaitez-vous supprimer votre compte ?')){return true;}else{return false;}">
    Me désinscrire</a><br>

</section><!-- AFFICHAGE DES DONNEES UTILISATEUR -->



<!-- AFFICHAGE INFOS LOCATIONS -->
<section class="rentals">
    <h3><?=(count($locations) <= 1) ? 'MA LOCATION' : 'MES LOCATIONS'; ?></h3>

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


                            <!-- AFFICHAGE REDIRECTION VERS LA PAGE DE RECHERCHE -->
                            <section class="groom_research">
                                <h3>ACCUEIL</h3>
                                <a href="<?= $this->url('default_home'); ?>" class="btn btn-blue">Rechercher un groom</a>
                            </section><!-- AFFICHAGE REDIRECTION VERS LA PAGE DE RECHERCHE -->


                            <!-- AFFICHAGE NOTIFICATIONS -->
                            <section class="notifications">
                                <h3>NOTIFICATIONS</h3>

                                <!-- AFFICHAGE DES COORDONNES RECUES -->
                                <div></div>
                                <!-- AFFICHAGE CONFIRMATION  -->
                                <div></div>
                                <!-- AFFICHAGE NOTATION -->
                                <div></div>

                            </section><!-- AFFICHAGE NOTIFICATIONS -->


                            <!-- AFFICHAGE AVIS LAISSES -->
                            <section class="marks_history">
                                <h3>MES AVIS LAISSES</h3>
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
                                        <hr>

                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="alert alert-danger">
                                        <p>Aucun avis laissé.</p>
                                    </div>
                                <?php endif; ?>
                            </section><!-- AFFICHAGE AVIS LAISSES -->

                            <?php $this->stop('main_content') ?>




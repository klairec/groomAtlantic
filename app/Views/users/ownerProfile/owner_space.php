<?php $this->layout('layoutTestNico', ['title' => 'Espace Propriétaire']) ?>

<?php $this->start('main_content') ?>

<p>Bonjour, <?= $w_user['firstname'] ?></p>
<!-- AFFICHAGE DES DONNEES UTILISATEURS CONNECTE -->
<section class="profile">
    <h3>MON PROFIL</h3>
        <figure>
            <img src="<?= $w_user['photo'] ?>">
        </figure>
        <p>Nom : <?= $w_user['lastname'] ?></p>
        <p>Prénom : <?= $w_user['firstname'] ?></p>
        <p>Email : <?= $w_user['email'] ?></p>
        <p>Téléphone : <?= $w_user['phone'] ?></p>
        <p>Adresse : <?= $w_user['address'] ?></p>
        <p>Code postal : <?= $w_user['postcode'] ?></p>
        <p>Ville : <?= $w_user['city'] ?></p>
        <p>Date d'inscription : <?= $w_user['date_creation'] ?></p>
            <a href="">Modifier mon profil</a><br>
            <a href="">Modifier mon mot de passe</a><br>
            <a href="">Désinscription</a><br>
</section><!-- AFFICHAGE DES DONNEES UTILISATEURS CONNECTE -->

<!-- AFFICHAGE INFOS LOCATIONS -->
<section class="rentals">
    <h3><?=(count($locations) <= 1) ? 'MA LOCATION' : 'MES LOCATIONS'; ?></h3>

    <!-- AFFICHAGE DES LOCATIONS -->
    <?php if(!empty($locations)):?>
        <?php foreach ($locations as $location): ?>
            <article>
                    <h3><i class="fa fa-home" aria-hidden="true">&nbsp;<?=$location['title']; ?></i></h3>
                    <h3>&nbsp;<?=$location['title']; ?></h3>
                    <p><span><?=$location['rooms']; ?>&nbsp;pièces</span>&nbsp;<span><?=$location['area']; ?>&nbsp;m²</span>&nbsp;<span><?=$location['outdoor_fittings']; ?></span>
                    </p>
                    <p><span><?=$location['street']; ?></span>&nbsp;<span><?=$location['city']; ?></span>&nbsp;
                    </p>
                        <a href="#" data-toggle="modal" data-target="#modal2" class="btn btn-blue" value="<?=$location['id']; ?>">Modifier</a>

                        <button name="choixAction" value="delete"onClick="if(confirm('Confirmez vous la suppression de cette location ?')){return true;}else{return false;}">Supprimer</button>
            </article>
            <hr>

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
                
                    <form method="POST" action="<?= $this->url('rentals_add') ?>">

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

    <!-- MODIFICATION D'UNE LOCATION / FENETRE MODALE -->
    <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-popup">
                <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
                <h3 class="white">Modifier</h3>

                <div><!-- affichage msg d'erreurs --></div>
                
                    <form method="POST" action="<?= $this->url('rentals_change') ?>">

                        <label for="newTitle">Titre</label>
                        <input type="text" name="newTitle" id="newTitle" value="<?=$location['title']; ?>">

                        <label for="newType">Type de location</label>
                        <select name="newType">
                            <option value="" selected disabled>--Sélectionnez--</option>
                            <option value="flat">Appartement</option>
                            <option value="house">Maison</option>
                            <option value="loft">Loft</option>
                            <option value="mobilhome">Mobilhome</option>
                        </select>

                        <label for="newArea">Surface</label>
                        <input type="text" name="newArea" id="newArea" placeholder="..m²">

                        <label for="newRooms">Nombre de pièces</label>
                        <input type="text" name="newRooms" id="newRooms">

                        <label for="newOutdoor_fittings">Equipements extérieurs</label>
                        <label for="newJardin">
                            <input type="checkbox" name="newOutdoor_fittings[]" value="jardin">
                        Jardin</label>
                        <label for="newTerrasse">
                            <input type="checkbox" name="newOutdoor_fittings[]" value="terrasse">
                        Terrasse</label>
                        <label for="newBalcon">
                            <input type="checkbox" name="newOutdoor_fittings[]" value="balcon">
                        Balcon</label>
                        <label for="newPiscine">
                            <input type="checkbox" name="newOutdoor_fittings[]" value="piscine">
                        Piscine</label>
                        <label for="newJacuzzi">
                            <input type="checkbox" name="newOutdoor_fittings[]" value="jacuzzi">
                        Jacuzzi</label>

                        <h3>Adresse</h3>
                        <label for="newStreet">Voie</label>
                        <input type="text" name="newStreet" id="newStreet" placeholder="">

                        <label for="newPostcode">Code postal</label>
                        <input type="text" name="newPostcode" id="newPostcode" placeholder="">

                        <label for="newCity">Ville</label>
                        <input type="text" name="newCity" id="newCity" placeholder="">

                        <button type="submit" class="btn btn-submit">Modifier</button>
                    </form>
            </div>
        </div>
    </div><!-- FIN MODIFICATION D'UNE LOCATION / FENETRE MODALE -->
</section><!-- AFFICHAGE INFOS LOCATIONS -->


<!-- AFFICHAGE REDIRECTION VERS LA PAGE DE RECHERCHE -->
<section class="groom_research">
    <h3>ACCUEIL</h3>
    <button href="<?= $this->url('default_home'); ?>">Rechercher un groom</button>
</section><!-- AFFICHAGE REDIRECTION VERS LA PAGE DE RECHERCHE -->


<!-- AFFICHAGE NOTIFICATIONS -->
<section class="notifications">

</section><!-- AFFICHAGE NOTIFICATIONS -->


<!-- AFFICHAGE REPERTOIRE GROOM CONTACTES -->
<section class="my_grooms_book">

</section><!-- AFFICHAGE REPERTOIRE GROOM CONTACTES -->


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
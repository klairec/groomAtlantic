<<<<<<< HEAD

<?php $this->layout('layoutTestNico', ['title' => 'Mon profil']) ?>


=======
<?php $this->layout('layoutTestNico', ['title' => 'Mon profil']) ?>

>>>>>>> 125f36623226d630abecc17793c7969dc0b61777
<?php $this->start('main_content') ?>

<p>Bonjour, <?= $w_user['firstname'] ?></p>

<section class="myProfile">
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
    <p>Ville : <?= $w_user['city'] ?></p>
    <p>Date d'inscription : <?= $w_user['date_creation'] ?></p>
    
    <a href="">Modifier mon profil</a>
    <a href="">Modifier mon mot de passe</a>
    <a href="">Désinscription</a>
</section>

<section class="servicesInfos">
    <h3>Services proposés</h3>

    <a href="">Liste des services</a>
    <a href="">Modifier les services</a>
    <a href="">Ajouter des services</a>
    <a href="">Supprimer des services</a>
    <a href="">Villes d'action</a>
    <a href="">Disponibilités</a>
</section>

<section class="notifications">
    <h3>Notifications</h3>
    <?php
    
    ?>
    <div>
        <p><?= 'Vous avez été contacté par '.$users['firstname'] .' '. $users['lastname'].', pour la location suivante :'; ?></p>
        <p><?= $rentals['id_type'].', '.$rentals['city'].'<br>'.'Souhaitez-vous lui communiquer vos coordonnées ?'; ?></p>
        <form method="POST" action="">
            <input type="checkbox" id="cbox1" value="checkbox1">Oui
            <input type="checkbox" id="cbox2" value="checkbox2">Non
        </form>
    </div>
    <?php
   
    ?>
    <div>
        <p><?= $users['firstname'] .' '. $users['lastname'].' a confirmé avoir travailler avec vous, le confirmez-vous également ?'; ?></p>
        <form method="POST" action="">
            <input type="checkbox" id="cbox3" value="checkbox1">Oui
            <input type="checkbox" id="cbox4" value="checkbox2">Non
        </form>
    </div>
    <?php
    
    ?>
    <div>
        <p><?= $users['firstname'] .' '. $users['lastname'].' a donné son avis sur votre prestation, vous pouvez le visualiser dans <a href=""><strong>Avis obtenus</strong></a>'; ?></p>
    </div>
    <?php
    
    ?>
    <div>
        <p><?= $users['firstname'] .' '. $users['lastname'].' a donné son avis sur votre prestation, vous pouvez le visualiser dans <a href=""><strong>Avis obtenus</strong></a>'; ?></p>
    </div>
    <?php 
    
    ?>
</section>

<section class="comments">
    <h3>Avis reçus</h3>
    <div>
        <p><?= 'Avis de '.$users['firstname'] .' '. $users['lastname'].' : '.$comments['content']; ?></p>
    </div>
</section>

<?php $this->stop('main_content') ?>
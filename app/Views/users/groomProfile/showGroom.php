
<?php $this->layout('layoutTestNico', ['title' => 'Mon profil']) ?>

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
    
    
    <!-- CONTACT ENGAGE -->
    <?php if(!empty($contacts)):?>

    <?php foreach ($contacts as $contact): ?>
    <div>
        <p><?= 'Vous avez été contacté par '.$users['firstname'] .' '. $users['lastname'].', pour la location suivante :'; ?></p>
        <p><?= $rentals['id_type'].', '.$rentals['city'].'<br>'.'Souhaitez-vous lui communiquer vos coordonnées ?'; ?></p>
        <form method="POST" action="">
            <input type="checkbox" id="cbox1" value="checkbox1">Oui
            <input type="checkbox" id="cbox2" value="checkbox2">Non
        </form>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
    <div class="alert alert-danger">
        Pas de contact pour le moment
    </div>
    <?php endif; ?>
    
    
    <!-- CONFIRMATION DE CONTACT -->
    <?php if(!empty($confirmation)):?>

    <?php foreach ($confirmation as $confirmation): ?>
    <div>
        <p><?= $users['firstname'] .' '. $users['lastname'].' a confirmé avoir travailler avec vous, le confirmez-vous également ?'; ?></p>
        <form method="POST" action="">
            <input type="checkbox" id="cbox3" value="checkbox1">Oui
            <input type="checkbox" id="cbox4" value="checkbox2">Non
        </form>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
    <div class="alert alert-danger">
        Pas de confirmation pour le moment
    </div>
    <?php endif; ?>
    
    
    <!-- NOUVEAU COMMENTAIRE DISPONIBLE -->
    <?php if(!empty($comments)):?>

    <?php foreach ($comments as $comment): ?>
    <div>
        <p><?= $users['firstname'] .' '. $users['lastname'].' a donné son avis sur votre prestation, vous pouvez le visualiser dans <a href=""><strong>Avis obtenus</strong></a>'; ?></p>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
    <div class="alert alert-danger">
        Pas de dernier commentaire pour le moment.
    </div>
    <?php endif; ?>
    
</section>


<!-- DIFFERENTS AVIS OBTENUS -->
<section class="comments">
    <?php if(!empty($comments)):?>

    <?php foreach ($comments as $comment): ?>

    <article>
        <h3><?=$comment['id_owner']; ?></h3>
        <div class="content">
            <?=nl2br($comment['content']); ?>
        </div>
    </article>
    <hr>

    <?php endforeach; ?>
    <?php else: ?>
    <div class="alert alert-danger">
        Pas de commentaire pour le moment.
    </div>
    <?php endif; ?>
</section>

<?php $this->stop('main_content') ?>
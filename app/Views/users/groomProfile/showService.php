<?php $this->layout('layoutTestNico', ['title' => 'Mon profil']) ?>
<?php session_start(); ?>

<?php $this->start('main_content') ?>

<p>Bonjour, <?= $users['firstname'] ?></p>

<section class="servicesInfos">
    <h3>Services proposés</h3>

    <a href="">Liste des services</a>
    <a href="">Modifier les services</a>
    <a href="">Ajouter des services</a>
    <a href="">Supprimer des services</a>
    <a href="">Villes d'action</a>
    <a href="">Disponibilités</a>
</section>


<?php foreach($groomservice as $gskills): ?>
    <ul>
        <li><?=$gskills['id']; ?></li>
        <li><?=$gskills['skills']; ?></li>
    </ul>
    <?php endforeach; ?>
    
   <?php $this->stop('main_content') ?>
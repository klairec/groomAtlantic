<?php $this->layout('layout', ['title' => 'Mon profil']) ?>
<?php session_start(); ?>

<?php $this->start('main_content') ?>

<p>Bonjour, <?= $users['firstname'] ?></p>


<?php

    if(isset($_SESSION['email'], ['id'])){

        if(isset($error)){
            echo '<p style="color:red;">'.$error.'</p>';
        }
        else {                    
?>
<div>
    <h3>Mon profil</h3>

    <p>Nom : <?= $users['lastname'] ?></p>
    <p>Prénom : <?= $users['firstname'] ?></p>
    <p>Email : <?= $users['email'] ?></p>
    <p>Téléphone : <?= $users['phone'] ?></p>
    <p>Adresse : <?= $users['address'] ?></p>
    <p>Code postal : <?= $users['postcode'] ?></p>
    <p>Ville : <?= $users['city'] ?></p>
    <p>Date d'inscription : <?= $users['date_creation'] ?></p>
    
    <a href="">Modifier mon profil</a>
    <a href="">Modifier mon mot de passe</a>
    <a href="">Désincription</a>
</div>
<?php
             }
    }
?>



<div>
    <h3>Services proposés</h3>

    <a href="">Liste des services</a>
    <a href="">Modifier les services</a>
    <a href="">Ajouter des services</a>
    <a href="">Supprimer des services</a>
    <a href="">Villes d'action</a>
    <a href="">Disponibilités</a>
</div>


<div>
    <h3>Notifications</h3>
    <?php
    if{
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
    }


    if{
    ?>
    <div>
        <p><?= $users['firstname'] .' '. $users['lastname'].' a confirmé avoir travailler avec vous, le confirmez-vous également ?'; ?></p>
        <form method="POST" action="">
            <input type="checkbox" id="cbox3" value="checkbox1">Oui
            <input type="checkbox" id="cbox4" value="checkbox2">Non
        </form>
    </div>
    <?php
    }

    if{
    ?>
    <div>
        <p><?= $users['firstname'] .' '. $users['lastname'].' a donné son avis sur votre prestation, vous pouvez le visualiser dans <a href=""><strong>Avis obtenus</strong></a>'; ?></p>
    </div>
    <?php
    }

    if{
    ?>
    <div>
        <p><?= $users['firstname'] .' '. $users['lastname'].' a donné son avis sur votre prestation, vous pouvez le visualiser dans <a href=""><strong>Avis obtenus</strong></a>'; ?></p>
    </div>
    <?php 
    }
    ?>
</div>

<<div>
    <h3>Avis reçus</h3>
    <div>
        <p><?= 'Avis de '.$users['firstname'] .' '. $users['lastname'].' : '.$comments['content']; ?></p>
    </div>
</div>


<?php $this->stop('main_content') ?>
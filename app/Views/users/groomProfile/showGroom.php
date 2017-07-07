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
                            <p>Ville : <?= $w_user['city'] ?></p>
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

    <div class="container">
        <div class="table">
            <div class="row">
                <div class="col-md-12 text-center">
                    <section class="servicesInfos">
                        <h3>Services proposés</h3>
                        <a href="">Liste des services</a><br>
                        <a href="">Modifier les services</a><br>
                        <a href="">Ajouter des services</a><br>
                        <a href="">Supprimer des services</a><br>
                        <a href="">Villes d'action</a><br>
                        <a href="">Disponibilités</a><br>
                    </section>
                </div>
            </div>
        </div>
    </div>
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
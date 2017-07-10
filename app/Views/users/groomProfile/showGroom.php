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

<div class="container">
    <div class="table">
        <div class="header-text">
            <div id="DivFormG" class="row">
                <div class="col-md-12 text-center">
                    <p class="light white text-center">Bonjour, <?= $w_user['firstname'] ?></p>
                    <section>
                        <h3 class="light white text-center">Mon profil</h3>
                        <figure>
                            <img src="<?= $w_user['photo'] ?>">
                        </figure>
                        <p class="light white text-center">Nom : <?= $w_user['lastname'] ?></p>
                        <p class="light white text-center">Prénom : <?= $w_user['firstname'] ?></p>
                        <p class="light white text-center">Email : <?= $w_user['email'] ?></p>
                        <p class="light white text-center">Téléphone : <?= $w_user['phone'] ?></p>
                        <p class="light white text-center">Adresse : <?= $w_user['address'] ?></p>
                        <p class="light white text-center">Code postal : <?= $w_user['postcode'] ?></p>
                        <p class="light white text-center">Ville : <?= $w_user['cityUser'] ?></p>
                        <p class="light white text-center">Date d'inscription : <?= $w_user['date_creation'] ?></p>
                        <a href="<?= $this->url('modif_groom'); ?>" class="btn btn-blue">Modifier mon profil</a><br>
                        <br>
    <a href="<?= $this->url('delete_profileO');?>" class="btn btn-blue"
    onClick="if(confirm('Souhaitez-vous supprimer votre compte ?')){return true;}else{return false;}">
    Me désinscrire</a><br>
            </div>
                        </div>
                    </div>
                </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- AFFICHAGE INFOS SERVICES -->
<section class="skills">
<div class="table">
                    <div class="header-text">
                        <div id="DivFormG" class="row">
                            <div class="col-md-12 text-center">
    <h3 class="light white text-center">MES SERVICES</h3>
    
    <!-- AFFICHAGE DES SERVICES/PRIX -->
    <?php if(!empty($compets)):?>
        <table>
            <tbody>
               <tr>
                <td><strong>Compétences</strong></td>
                <?php foreach ($compets as $compet): ?>
                    <td><?php $compet = explode(',', $compet['id_skills']); ?></td>
                <?php endforeach; ?>
                </tr>
                <tr>
                    <td><strong>Prix</strong></td>
                    <?php foreach ($compets as $compet): ?>
                        <td><?php $compet = explode(',', $prix['price']); ?>
                        <a href="<?= $this->url('services_change', ['id' => $compet['id']]) ?>" class="btn btn-blue" value="change">Modifier</a>
                        </td>
                    <?php endforeach; ?>
                </tr>    
            </tbody>
        </table>
        <strong>Code postaux</strong>
            <?php foreach ($compets as $compet): ?>
                    <span><?php $compet = explode(',', $prix['work_area']); ?>
                    </span>
            <?php endforeach; ?>
    <br>

    <?php else: ?>
        <div class="alert alert-danger">
            Aucune service renseigné.
        </div>
    <?php endif; ?><!-- AFFICHAGE DES SERVICES/PRIX -->

<!-- AJOUT D'UNE LOCATION / FENETRE MODALE -->
<a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Ajouter des services</a>

<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <h3 class="white">Ajouter des services</h3>
            <form method="POST" action="<?= $this->url('users_showgroom') ?>">
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
                    <td><input type="text" name="price[]"></td>
                </label>
                <br>
                </tr>
                <tr>
                <label for="gardenMaintenance">
                    <td>Entretien espaces verts</td>
                    <td><input type="checkbox" name="id_skill[]" value="4"></td>
                    <td><input type="text" name="price[]"></td>
                </label>
                <br>
                </tr>
                <tr>
                <label for="spMaintenance">
                    <td>Entretien piscine</td>
                    <td><input type="checkbox" name="id_skill[]" value="5"></td>
                    <td><input type="text" name="price[]"></td>
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
</div><!-- FIN AJOUT D'UNE LOCATION / FENETRE MODALE -->

<!-- AFFICHAGE DES NOTIFICATIONS -->
<div class="table">
                    <div class="header-text">
                        <div id="DivFormG" class="row">
                            <div class="col-md-12 text-center">
                
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

            </div>
        </div>
          </div>
            </div>
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
<?php $this->layout('layoutTestNico', ['title' => 'Modifier Profil']) ?>

<?php $this->start('main_content') ?>

<p>Bonjour, <?= $w_user['firstname'] ?></p>

<div class="container">
    <div class="table">
        <div class="row">
            <div class="col-md-12 text-center">
                <section class="profile">
                    <h3>MODIFICATION DE MON PROFIL</h3>

                    <h3 class="">Modifier</h3>

                    <form method="POST" action="<?= $this->url('modif_groom') ?>">

                        <figure>
                            <img src="<?= $user['photo'] ?>">
                        </figure>

                        <label for="newLastname">Nom</label>
                        <input type="text" name="newLastname" id="newLastname" value="<?=$w_user['lastname']; ?>">

                        <label for="newFirstname">Prénom</label>
                        <input type="text" name="newFirstname" id="newFirstname" value="<?=$w_user['firstname']; ?>">

                        <label for="newEmail">Email</label>
                        <input type="text" name="newEmail" id="newEmail" placeholder="" value="<?=$w_user['email']; ?>">

                        <label for="newPhone">Téléphone</label>
                        <input type="text" name="newPhone" id="newPhone" value="<?=$w_user['phone']; ?>">

                        <h3>Adresse</h3>
                        <label for="newAddress">Voie</label>
                        <input type="text" name="newAddress" id="newAddress" placeholder="" value="<?=$w_user['address']; ?>">

                        <label for="newPostcode">Code postal</label>
                        <input type="text" name="newPostcode" id="newPostcode" placeholder="" value="<?=$w_user['postcode']; ?>">

                        <label for="newCity">Ville</label>
                        <input type="text" name="newCity" id="newCity" placeholder="" value="<?=$w_user['cityUser']; ?>">

                        <button type="submit" class="btn btn-submit">Modifier</button>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>

<?php $this->stop('main_content') ?>
<?php $this->layout('layoutTestNico', ['title' => 'Modifier mon profil']) ?>

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

						<?php if(count($errors) > 0): ?>
							<p style="color:red;"><?=implode('<br>', $errors); ?></p>
						<?php endif; ?>

						<form method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label for="photo">Ajouter une photo de profil</label>
								<input type="file" name="photo" >
							</div>
							<div class="form-group">
								<label for="firstname">Prénom</label>
								<input name="firstname" type="text" class="form-control" value="<?=$w_user['firstname']; ?>">
							</div>
							<div class="form-group">
								<label for="lastname">Nom</label>
								<input name="lastname" type="text" class="form-control" value="<?=$w_user['lastname']; ?>">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input name="email" type="text" class="form-control" value="<?=$w_user['email']; ?>">
							</div>
							<div class="form-group">
								<label for="phone">Téléphone</label>
								<input name="phone" type="text" class="form-control" value="<?=$w_user['phone']; ?>">
							</div>
							<div class="form-group">
								<label for="address">Adresse</label>
								<input name="address" type="text" class="form-control" value="<?=$w_user['address']; ?>">
							</div>
							<div class="form-group">
								<label for="postcode">Code postal</label>
								<input name="postcode" type="text" class="form-control" value="<?=$w_user['postcode']; ?>">
							</div>
							<div class="form-group">
								<label for="cityUser">Ville</label>
								<input name="cityUser" type="text" class="form-control" value="<?=$w_user['cityUser']; ?>">
							</div>
							<button type="submit" class="btn btn-default">Modifier</button>
						</form>

					<a href="<?= $this->url('users_showowner')?>" class="btn btn-default">Retour</a>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php $this->stop('main_content') ?>
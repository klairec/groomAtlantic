<?php $this->layout('layoutTestNico', ['title' => 'Modifier mon profil']) ?>

<?php $this->start('main_content') ?>
<form method="POST">
	
	<div class="form-group">
		<label for="firstname">Prénom</label>
		<input name="firstname" type="text" class="form-control" value="">
	</div>
	<div class="form-group">
		<label for="lastname">Nom</label>
		<input name="lastname" type="text" class="form-control" value="">
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<input name="email" type="text" class="form-control" value="">
	</div>
	<div class="form-group">
		<label for="phone">Téléphone</label>
		<input name="phone" type="text" class="form-control" value="">
	</div>
	<div class="form-group">
		<label for="address">Adresse</label>
		<input name="address" type="text" class="form-control" value="">
	</div>
	<div class="form-group">
		<label for="postcode">Code postal</label>
		<input name="postcode" type="text" class="form-control" value="">
	</div>
	<div class="form-group">
		<label for="city">Ville</label>
		<input name="city" type="text" class="form-control" value="">
	</div>

	<button type="submit" class="btn btn-default">Modifier</button>

</form>
<?php $this->stop('main_content') ?>
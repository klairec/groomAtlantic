<?php $this->layout('layout', ['title' => 'Ajouter une location']) ?>

<?php $this->start('main_content') ?>

	<form method="POST" action="<?= $this->url('rentals_add') ?>">

		<label for="name">Titre</label>
		<input type="text" name="name" id="name">

		<label for="type">Type de location</label>
		<select name="type">
			<option value="" selected disabled>--Sélectionnez--</option>
			<option value="flat">Appartement</option>
			<option value="house">Maison</option>
			<option value="loft">Loft</option>
			<option value="mobilhome">Mobilhome</option>
		</select>

		<h3>Adresse</h3>
		<label for="street">Voie</label>
		<input type="text" name="street" id="street" placeholder="">

		<label for="postcode">Code postal</label>
		<input type="text" name="postcode" id="postcode" placeholder="">

		<label for="city">Ville</label>
		<input type="text" name="city" id="city" placeholder="">

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

		<button type="submit">Ajouter à mes locations</button>

	</form>

<?php $this->stop('main_content') ?>
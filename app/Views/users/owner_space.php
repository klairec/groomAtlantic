<?php $this->layout('layout', ['title' => 'Espace Propriétaire']) ?>

<?php $this->start('main_content') ?>

	<section class="my_profile">
	<?php // return infos profil du connecté show_profile ?>
		<h1>MON PROFIL</h1>
		<h2><?php // Prénom NOM ?></h2>
		<figure>
			<img src="<?php // Photo du profil  ?>">
		</figure>
		<address><?php // Adresse ?></address>
		<a href="<?= $this->url('change_profile'); ?>">Modifier mon profil</a>
		<a href="<?= $this->url('change_password'); ?>">Modifier mon mot de passe</a>
		<a href="<?= $this->url('delete_profile'); ?>">Supprimer mon compte</a>
	</section>


	<section class="rentals">
		<?php // return infos location du connecté rentals_show?>
		<h1>MA/MES LOCATIONS</h1>
		<figure>
			<img src="<!-- Image par défaut -->">
			<figcaption><?php // Infos location (NOM) ?></figcaption>
		</figure>
		<address><?php // Adresse location ?></address>
		<a href="<?= $this->url('rentals_add'); ?>">Ajouter une location</a>
		<a href="<?= $this->url('rentals_change'); ?>">Modifier ma/mes locations</a>
		<a href="<?= $this->url('rentals_delete'); ?>">Supprimer une location</a>
	</section>

	<section class="groom_research">
		<a href="<?= $this->url(''); ?>">Rechercher un groom</a>
	</section>

	<section class="notifications">
		
	</section>

	<section class="my_grooms_book">
		
	</section>

	<section class="marks_history">
		
	</section>

<?php $this->stop('main_content') ?>
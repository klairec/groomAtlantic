<?php $this->layout('layout', [
	'title' => 'Page d\'accueil de Groom Atlantic ',
	'description' => '',
]); ?>

<?php $this->start('main_content') ?>
	<h2>Groom Atlantic</h2>
	<a href="users/connect">Se connecter</a>
	<a href="users/add_role">Pas encore inscrit ?</a>
<?php $this->stop('main_content') ?>

<?php $this->start('css') ?>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<?php $this->stop('css') ?>

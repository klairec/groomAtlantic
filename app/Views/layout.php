<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<meta name="description" content="<?=$this->e($description);?>">
	<!-- link CSS/Bootstrap... -->
	<!-- link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>"-->
	<?=$this->section('css'); ?>
</head>
<body>
	<main>
	<div class="container">
		<header>
			<h1>W :: <?= $this->e($title) ?></h1>
			<?php if(isset($description) && !empty($description)): ?>
			<h3>W :: <?= $this->e($description) ?></h3>
			<?php endif; ?>


		</header>

		<section>

			<?= $this->section('main_content') ?>
		</section>

		<footer>
			<?=$this->section('footer'); ?>
		</footer>
	</div>
	</main>
	<!-- SCRIPTS jQuery... -->
	<?=$this->section('');?>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $this->e($title) ?></title>
    <meta name="description" content="Cardio is a free one page template made exclusively for Codrops by Luka Cvetinovic" />
	<meta name="keywords" content="html template, css, free, one page, gym, fitness, web design" />
	<meta name="author" content="Luka Cvetinovic for Codrops" />
     <link rel="apple-touch-icon" sizes="57x57" href="<?= $this->assetUrl('img/favicons/apple-touch-icon-57x57.png') ?>">
      <link rel="apple-touch-icon" sizes="60x60" href="<?= $this->assetUrl('img/favicons/apple-touch-icon-60x60.png') ?>">
     <link rel="icon" sizes="32x32" type="image/png" href="<?= $this->assetUrl('img/favicons/favicon-32x32.png') ?>">
    <link rel="icon" sizes="16x16" type="image/png" href="<?= $this->assetUrl('img/favicons/favicon-16x16.png') ?>">
     <link rel="manifest" href="<?= $this->assetUrl('img/favicons/manifest.json') ?>">
     <link rel="shortcut icon" href="<?= $this->assetUrl('img/favicons/favicon.ico') ?>">
    <meta name="msapplication-TileColor" content="#00a8ff">
	<meta name="msapplication-config" content="<?= $this->assetUrl('img/favicons/browserconfig.xml') ?>">
	<meta name="theme-color" content="#ffffff">
    
    
    <link rel="stylesheet" href="<?= $this->assetUrl('css/normalize.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/owl.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/animate.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('fonts/font-awesome-4.1.0/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('fonts/eleganticons/et-icons.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/cardio.css') ?>">
    
</head>
    
<body>
    <div class="preloader">
		<img src="<?= $this->assetUrl('img/loader.gif') ?>" alt="Preloader image">
	</div>
   
	<nav class="navbar">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<a class="navbar-brand" href="<?= $this->url('default_home') ?>">.
					<img src="<?= $this->assetUrl('img/logoDef.png') ?>" data-active-url="<?= $this->assetUrl('img/logoDef.png') ?>" alt="">
				</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right main-nav">
					<li><a href="#intro">Qui Sommes Nous?</a></li>
					<li><a href="#services">Devenir Concierge</a></li>
					<li><a href="#team">Infos Pratiques</a></li>
					<!--<li><a href="#pricing">Pricing</a></li>-->
					<li><a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Se Connecter</a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
        
		<!-- /.container-fluid -->
        
	</nav>
   <section>
    </section>
    
      
         <section>
        <?=$this->section('errors'); ?>
        </section>
        
      
        <header id="intro">
           
            <?=$this->section('header'); ?>
		
        </header>
   
	<section>
          
			<?= $this->section('main_content') ?>
    </section>


			<footer>
		<div class="container">
			<div class="row">

				<div class="col-sm-4 text-center-mobile">
					<h3 class="white">GROOM ATLANTIC</h3>
					<p class="white">Groom Atlantic est la première plateforme de mise en relation entre propriétaires et concierges disponibles pour vous aider à gérer vos locations courte durée partout en Charente Maritime</p>
				</div>

				<div class="col-sm-4 text-center-mobile">
					<h5><a href="#intro">QUI SOMMES NOUS</a></h5>
					<h5><a href="#team">INFOS PRATIQUES</a></h5>
					<h5 class="white">NOTRE CHARTE </h5>
					<h5 class="white">MENTIONS LEGALES </h5>
					
				</div>
						
				<div class="col-sm-4 text-center-mobile">
				<h5 class="white">NOUS SUIVRE</h5>
					<ul>
						<li><a href="http://www.facebook.com/pages/Codrops/159107397912"><i class="fa fa-facebook"></i></a></li>
						<li><a href="http://www.twitter.com/codrops"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://plus.google.com/101095823814290637419"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		</div>
                
	</footer>

    <script src="<?= $this->assetUrl('js/jquery-1.11.1.min.js') ?>"></script>
     <script src="<?= $this->assetUrl('js/owl.carousel.min.js') ?>"></script>
     <script src="<?= $this->assetUrl('js/bootstrap.min.js') ?>"></script>
     <script src="<?= $this->assetUrl('js/wow.min.js') ?>"></script>
     <script src="<?= $this->assetUrl('js/typewriter.js') ?>"></script>
     <script src="<?= $this->assetUrl('js/jquery.onepagenav.js') ?>"></script>
     <script src="<?= $this->assetUrl('js/main.js') ?>"></script>

  
</body>
</html>
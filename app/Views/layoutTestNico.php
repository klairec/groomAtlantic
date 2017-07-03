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
				<a class="navbar-brand" href="#"><img src="<?= $this->assetUrl('img/logo.png') ?>" data-active-url="<?= $this->assetUrl('img/logo-active.png') ?>" alt=""></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right main-nav">
					<li><a href="#intro">Intro</a></li>
					<li><a href="#services">Services</a></li>
					<li><a href="#team">Team</a></li>
					<li><a href="#pricing">Pricing</a></li>
					<li><a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Connexion</a></li>
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
				<div class="col-sm-6 text-center-mobile">
					<h3 class="white">Reserve a Free Trial Class!</h3>
					<h5 class="light regular light-white">Shape your body and improve your health.</h5>
					<a href="#" class="btn btn-blue ripple trial-button">Start Free Trial</a>
				</div>
				<div class="col-sm-6 text-center-mobile">
					<h3 class="white">Opening Hours <span class="open-blink"></span></h3>
					<div class="row opening-hours">
						<div class="col-sm-6 text-center-mobile">
							<h5 class="light-white light">Mon - Fri</h5>
							<h3 class="regular white">9:00 - 22:00</h3>
						</div>
						<div class="col-sm-6 text-center-mobile">
							<h5 class="light-white light">Sat - Sun</h5>
							<h3 class="regular white">10:00 - 18:00</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row bottom-footer text-center-mobile">
				<div class="col-sm-8">
					<p>&copy; 2015 All Rights Reserved. Powered by <a href="http://www.phir.co/">PHIr</a> exclusively for <a href="http://tympanus.net/codrops/">Codrops</a></p>
				</div>
				<div class="col-sm-4 text-right text-center-mobile">
					<ul class="social-footer">
						<li><a href="http://www.facebook.com/pages/Codrops/159107397912"><i class="fa fa-facebook"></i></a></li>
						<li><a href="http://www.twitter.com/codrops"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://plus.google.com/101095823814290637419"><i class="fa fa-google-plus"></i></a></li>
					</ul>
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
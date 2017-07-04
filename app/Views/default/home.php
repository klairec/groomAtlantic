<?php $this->layout('layoutTestNico', [
	'title' => 'Page d\'accueil de Groom Atlantic ', 'title2' => 'Groom Atlantic', 'title3' => 'Ami manouche bienvenue',
]); ?>

<?php $this->start('header') ?>

            <div class="container">
                  <?php echo $deco; ?>
                <div class="table">

                    <div class="header-text">
                                  <?php 
    
                if(!empty($errors)){// AFFICHE MESSAGES ERREURS/ SUCCES

			         echo'<div  id="error" class="alert alert-danger alert-dismissable fade in ">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.implode('<br>', $errors).'</div>';

                }

                
                if($formValid == true){
                		
			         echo'<div  margin-bottom:50%" class="alert alert-success alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Bonjour '.$mail.' Vous êtes connecté, votre session : '.$w_user['firstname'].'</div>';

                }
                
                if($deco == true){

			     echo'<p>Vous êtes déconnecté</p>';		

                }

	       ?>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h1 class="white typed">Bienvenue</h1>
                                <span class="typed-cursor">|</span>
                            </div>
                        </div>
                        <div class="row">
							<div class="col-md-12 text-center">
							<h2>Je recherche un concierge.</h2>
								<form class="navbar-form navbar-center" role="search">
  									<div class="form-group">
    									<input type="text" class="form-control" placeholder="Search" size=25>
  									</div>
 									<button type="submit" class="btn btn-default">Submit</button>
								</form>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text center">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2828.982724041397!2d-0.5848211840206283!3d44.842285179098624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd5527e77e69473b%3A0x3d8cf4889f76db18!2s66+Rue+Abb%C3%A9+de+l&#39;%C3%89p%C3%A9e%2C+33000+Bordeaux!5e0!3m2!1sfr!2sfr!4v1499088159853" width="600" height="450" frameborder="50" style="border:5" allowfullscreen></iframe>
							</div>
						</div>
                    </div>
                </div>
            </div>
    
<?php $this->stop('header') ?>

<?php $this->start('main_content') ?>
    
    <section>
    <div class="cut cut-top"></div>
		<div class="container">
			<div class="row intro-tables">
				<div class="col-md-3">
					<div class="intro-table intro-table-first">
						<h5 class="white heading">Today's Schedule</h5>
					</div>
				</div>
				<div class="col-md-3">
					<div class="intro-table intro-table-hover">
						<h5 class="white heading hide-hover">Premium Membership</h5>
						<div class="bottom">
							<h4 class="white heading small-heading no-margin regular">Register Today</h4>
							<h4 class="white heading small-pt">20% Discount</h4>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="intro-table intro-table-third">
						<h5 class="white heading">Happy Clients</h5>
						<div class="owl-testimonials bottom">
							<div class="item">
								<h4 class="white heading content">Incredible transformation and I feel so healthy!</h4>
								<h5 class="white heading light author">Christina Goldman</h5>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="intro-table intro-table-four">
						<h5 class="white heading">Happy Clients</h5>
						<div class="owl-testimonials bottom">
							<div class="item">
								<h4 class="white heading content">Incredible transformation and I feel so healthy!</h4>
								<h5 class="white heading light author">Christina Goldman</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="services" class="section section-padded">
		<div class="container">
			<div class="row text-center title">
				<h2>Découvrez nos Grooms Atlantic</h2>
			</div>
			<div class="row services">
				<div class="col-md-3">
					<div class="service">
						<div class="icon-holder">
							<img src="img/icons/heart-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">Cardio Training</h4>
						<p class="description">A elementum ligula lacus ac quam ultrices a scelerisque praesent vel suspendisse scelerisque a aenean hac montes.</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="service">
						<div class="icon-holder">
							<img src="img/icons/guru-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">Yoga Pilates</h4>
						<p class="description">A elementum ligula lacus ac quam ultrices a scelerisque praesent vel suspendisse scelerisque a aenean hac montes.</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="service">
						<div class="icon-holder">
							<img src="img/icons/weight-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">Power Training</h4>
						<p class="description">A elementum ligula lacus ac quam ultrices a scelerisque praesent vel suspendisse scelerisque a aenean hac montes.</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="service">
						<div class="icon-holder">
							<img src="img/icons/heart-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">Cardio Training</h4>
						<p class="description">A elementum ligula lacus ac quam ultrices a scelerisque praesent vel suspendisse scelerisque a aenean hac montes.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="cut cut-bottom"></div>
	</section>
	<!--
	<section id="team" class="section gray-bg">
		<div class="container">
			<div class="row title text-center">
				<h2 class="margin-top">Team</h2>
				<h4 class="light muted">We're a dream team!</h4>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="team text-center">
						<div class="cover" style="background:url('img/team/team-cover1.jpg'); background-size:cover;">
							<div class="overlay text-center">
								<h3 class="white">$69.00</h3>
								<h5 class="light light-white">1 - 5 sessions / month</h5>
							</div>
						</div>
						<img src="img/team/team3.jpg" alt="Team Image" class="avatar">
						<div class="title">
							<h4>Ben Adamson</h4>
							<h5 class="muted regular">Fitness Instructor</h5>
						</div>
						<button data-toggle="modal" data-target="#modal1" class="btn btn-blue-fill">Sign Up Now</button>
					</div>
				</div>
				<div class="col-md-4">
					<div class="team text-center">
						<div class="cover" style="background:url('img/team/team-cover2.jpg'); background-size:cover;">
							<div class="overlay text-center">
								<h3 class="white">$69.00</h3>
								<h5 class="light light-white">1 - 5 sessions / month</h5>
							</div>
						</div>
						<img src="img/team/team1.jpg" alt="Team Image" class="avatar">
						<div class="title">
							<h4>Eva Williams</h4>
							<h5 class="muted regular">Personal Trainer</h5>
						</div>
						<a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue-fill ripple">Sign Up Now</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="team text-center">
						<div class="cover" style="background:url('img/team/team-cover3.jpg'); background-size:cover;">
							<div class="overlay text-center">
								<h3 class="white">$69.00</h3>
								<h5 class="light light-white">1 - 5 sessions / month</h5>
							</div>
						</div>
						<img src="img/team/team2.jpg" alt="Team Image" class="avatar">
						<div class="title">
							<h4>John Phillips</h4>
							<h5 class="muted regular">Personal Trainer</h5>
						</div>
						<a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue-fill ripple">Sign Up Now</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	-->
	<section id="pricing" class="section">
		<div class="container">
			<div class="row title text-center">
				<h2 class="margin-top white">Optimisation des revenus</h2>
				<h4 class="light white">Pour toutes vos locations saisonnières !!</h4>
			</div>
			<div class="row no-margin">
				<div class="col-md-7 no-padding col-md-offset-5 pricings text-center">
					<div class="pricing">
						<div class="box-main active" data-img="img/pricing1.jpg">
							<h4 class="white">Yoga Pilates</h4>
							<h4 class="white regular light">$850.00 <span class="small-font">/ year</span></h4>
							<a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-white-fill">Sign Up Now</a>
							<i class="info-icon icon_question"></i>
						</div>
						<div class="box-second active">
							<ul class="white-list text-left">
								<li>One Personal Trainer</li>
								<li>Big gym space for training</li>
								<li>Free tools &amp; props</li>
								<li>Free locker</li>
								<li>Free before / after shower</li>
							</ul>
						</div>
					</div>
					<div class="pricing">
						<div class="box-main" data-img="img/pricing2.jpg">
							<h4 class="white">Cardio Training</h4>
							<h4 class="white regular light">$100.00 <span class="small-font">/ year</span></h4>
							<a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-white-fill">Sign Up Now</a>
							<i class="info-icon icon_question"></i>
						</div>
						<div class="box-second">
							<ul class="white-list text-left">
								<li>One Personal Trainer</li>
								<li>Big gym space for training</li>
								<li>Free tools &amp; props</li>
								<li>Free locker</li>
								<li>Free before / after shower</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	

<?php $this->stop('main_content') ?>

<!--FENETRE MODALE QUI S AFFICHE QUAND ON CLIQUE SUR CONNEXION -->

<?=$this->start('footer') ?>
  

<?=$this->stop('footer') ?>

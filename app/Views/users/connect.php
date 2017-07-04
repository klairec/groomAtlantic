<?php $this->layout('layoutTestNico', [
	'title' => 'Page d\'accueil de Groom Atlantic ',
	'description' => '',
]); ?>

<?php $this->start('main_content') ?>


	<?php 
		if(!empty($errors)){

			echo'<p>'.implode('<br>', $errors).'</p>';

		}

		if($formValid == true){

			echo'<p> Bonjour '.$mail.' Vous êtes connecté, votre session : '.$Userlog.'</p>';
			print_r($Userlog);

		}

		if($deco == true){

			echo'<p>Vous êtes déconnecté</p>';
		

		}



	?>

<form method="post" style="text-align:center;">
		
				
				<input name="email" type="text" placeholder="Votre email"><br>
				<input name="password" type="text" placeholder="Votre MDP"><br>
				
			
				<button type="submit">Connexion</button>



				
			</form>

			<a href="connexion?deco=1">Déconnexion</a>


<h2>Pas encore inscrit ?</h2>

<p>Inscription en tant que :</p>
<a href="add_groom">Groom</a>

<a href= "add_owner">Propriétaire</a>


<?php $this->stop('main_content') ?>
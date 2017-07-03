<?php $this->layout('layout', ['title' => 'Inscription/Groom']) ?>

<?php $this->start('main_content') ?>



	<?php 
		if(!empty($errors)){

			echo'<p>'.implode('<br>', $errors).'</p>';

		}

		if($formValid == true){

			echo'<p> Vous êtes inscrit</p>';

		}

	?>


<form method="post" style="text-align:center;">
				<input name="firstname" type="text" placeholder="Votre prénom"><br>
				<input name="lastname" type="text" placeholder="Votre email"><br>			
				<input name="email" type="text" placeholder="Votre email"><br>			
				<input name="password" type="text" placeholder="Votre MDP"><br>
				<input name="phone" type="text" placeholder="Votre téléphone"><br>
				<input name="address" type="text" placeholder="ex : 9 cours Portal"><br>
				<input name="postcode" type="text" placeholder="Code postal"><br>
				<input name="city" type="text" placeholder="Ville"><br>





				
				<button type="submit">S'inscrire</button>



				
			</form>


<?php $this->stop('main_content') ?>
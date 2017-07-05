<?php $this->layout('layoutTestNico', ['title' => 'Inscription/Groom']) ?>

<?php $this->start('header') ?>
            <div class="container">



                <div class="table">

                    <div class="header-text">

                        <div class="row">

                                <h3 class="light white">S'inscrire en tant que groom</h3>
                                    <?php 
                                        if(!empty($errors)){

                                            echo'<p>'.implode('<br>', $errors).'</p>';

                                        }

                                        if($formValid == true){

                                            echo'<p> Vous êtes inscrit</p>';

                                        }

                                    ?>
                                <form method="post" style="text-align:center;">

                                <input  name="firstname" type="text" placeholder="Votre prénom"><br>
                                <input  name="lastname" type="text" placeholder="Votre nom"><br>			
                                <input  name="email" type="text" placeholder="Votre email"><br>			
                                <input  name="password" type="text" placeholder="Votre MDP"><br>
                                <input  name="phone" type="text" placeholder="0102030405"><br>
                                <input  name="address" type="text" placeholder="ex : 9 cours Portal"><br>
                                <input  name="postcode" type="text" placeholder="Code postal"><br>
                                <input  name="city" type="text" placeholder="Ville"><br>
				                <button type="submit">S'inscrire</button>

			                 </form>
                        </div>
                    </div>
                </div>
            </div>
<?php $this->stop('header') ?>

<?php $this->start('main_content') ?>

	<?php 
		if(!empty($errors)){

			echo'<p>'.implode('<br>', $errors).'</p>';

		}

		if($formValid == true){

			echo'<p> Vous êtes inscrit</p>';

		}

	?>

<?php $this->stop('main_content') ?>
<?php $this->layout('layoutTestNico', ['title' => 'Inscription/Propriétaire']) ?>

<?php $this->start('css') ?>
    <style>
        header {
            display: none;
        }

        body{
            background: #89b5f7;
        }
    </style>
<?php $this->stop('css') ?>

<?php $this->start('main_content') ?>
            <div class="container">
                <div class="table">
                    <div class="header-text">
                        <div id="DivFormO" class="row">
                            <h2 class="light white">S'inscrire en tant que Propriétaire</h2>
                                <?php 

                                    if(!empty($errors)){

                                        echo'<p>'.implode('<br>', $errors).'</p>';

                                    }

                                    if($formValid == true){

                                        echo'<p> Vous êtes inscrit</p>';

                                    }

                                ?>

						<form id="FormAddOwner" method="post" style="text-align:center;">
							<div class="form-group">
								<input name="firstname" type="text" placeholder="Votre prénom" class="form-control">
							</div>
							<div class="form-group">
								<input name="lastname" type="text" placeholder="Votre nom" class="form-control">
							</div>
							<div class="form-group">
								<input name="email" type="text" placeholder="Votre email" class="form-control">
							</div>
							<div class="form-group">
								<input name="password" type="password" placeholder="Votre MDP" class="form-control">
							</div>
							<div class="form-group">
								<input name="phone" type="text" placeholder="Votre téléphone" class="form-control">
							</div>
							<div class="form-group">
								<input name="address" type="text" placeholder="ex : 9 cours Portal" class="form-control">
							</div>
							<div class="form-group">
								<input name="postcode" type="text" placeholder="Code postal" class="form-control">
							</div>
							<div class="form-group">
								<input name="cityUser" type="text" placeholder="Ville" class="form-control">
							</div>
							<button type="submit" class="btn btn-default">S'inscrire</button>
						</form>
                    </div>
                </div>
            </div>
        </div>

<?php $this->stop('main_content') ?>

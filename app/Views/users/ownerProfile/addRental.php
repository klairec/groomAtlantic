<?php $this->layout('layoutTestNico', ['title' => 'Ajouter une location']) ?>

<?php $this->start('main_content') ?>

<a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Ajouter une location</a>

	<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				<h3 class="white">Ajouter une location</h3>

				<div></div>
                
					<form method="POST">

						<label for="title">Titre</label>
						<input type="text" name="title" id="title">

						<label for="type">Type de location</label>
						<select name="type">
							<option value="" selected disabled>--Sélectionnez--</option>
							<option value="flat">Appartement</option>
							<option value="house">Maison</option>
							<option value="loft">Loft</option>
							<option value="mobilhome">Mobilhome</option>
						</select>

						<h3>Adresse</h3>
						<label for="street">Voie</label>
						<input type="text" name="street" id="street" placeholder="">

						<label for="postcode">Code postal</label>
						<input type="text" name="postcode" id="postcode" placeholder="">

						<label for="city">Ville</label>
						<input type="text" name="city" id="city" placeholder="">

						<label for="area">Surface</label>
						<input type="text" name="area" id="area" placeholder="..m²">

						<label for="rooms">Nombre de pièces</label>
						<input type="text" name="rooms" id="rooms">

						<label for="outdoor_fittings">Equipements extérieurs</label>
						<label for="jardin">
							<input type="checkbox" name="outdoor_fittings[]" value="jardin">
						Jardin</label>
						<label for="terrasse">
							<input type="checkbox" name="outdoor_fittings[]" value="terrasse">
						Terrasse</label>
						<label for="balcon">
							<input type="checkbox" name="outdoor_fittings[]" value="balcon">
						Balcon</label>
						<label for="piscine">
							<input type="checkbox" name="outdoor_fittings[]" value="piscine">
						Piscine</label>
						<label for="jacuzzi">
							<input type="checkbox" name="outdoor_fittings[]" value="jacuzzi">
						Jacuzzi</label>

						<button type="submit">Ajouter à mes locations</button>

					</form>
					
                    <!-- USELESS MAIS PEUT SERVUR PLUS TARD 
                    <div class="dropdown">
						<button id="dLabel" class="form-control form-white dropdown" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Pricing Plan
						</button>
                        
						<ul class="dropdown-menu animated fadeIn" role="menu" aria-labelledby="dLabel">
							<li class="animated lightSpeedIn"><a href="#">1 month membership ($150)</a></li>
							<li class="animated lightSpeedIn"><a href="#">3 month membership ($350)</a></li>
							<li class="animated lightSpeedIn"><a href="#">1 year membership ($1000)</a></li>
							<li class="animated lightSpeedIn"><a href="#">Free trial class</a></li>
						</ul>

					</div>
                      
					<div class="checkbox-holder text-left">
						<div class="checkbox">
					5		<input type="checkbox" value="None" id="squaredOne" name="check" />
							<label for="squaredOne"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
						</div>
					</div>
                        -->
					<button type="submit" class="btn btn-submit">Ajouter une location</button>
                 
				</form>
			</div>
		</div>
	</div><!--FIN DE LA FENETRE MODALE -->
	

<?php $this->stop('main_content') ?>
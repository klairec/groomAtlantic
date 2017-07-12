<?php $this->layout('layoutTestNico', ['title' => 'Modifier une location']) ?>

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
            <div id="DivFormG" class="row">
                <div class="col-md-12 text-left">	

                    
                    <?php if(count($errors) > 0): ?>
                        <p style="color:red;"><?=implode('<br>', $errors); ?></p>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="form-group">
                            <label for="title"><h4>Titre</h4></label>
                            <input type="text" name="title" id="title" value="<?= $updtLoc['title'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="type"><h4>Type de location</h4></label>
                            <select name="type" class="form-control">
                                <option value="" selected disabled>--Sélectionnez--</option>
                                <option value="flat">Appartement</option>
                                <option value="house">Maison</option>
                                <option value="loft">Loft</option>
                                <option value="mobilhome">Mobilhome</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="area"><h4>Surface</h4></label>
                            <input type="text" name="area" id="area" placeholder="..m²" class="form-control" value="<?= $updtLoc['area'] ?> m²">
                        </div>
                        <div class="form-group">
                            <label for="rooms"><h4>Nombre de pièces</h4></label>
                            <input type="text" name="rooms" id="rooms" class="form-control" value="<?= $updtLoc['rooms'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="outdoor_fittings"><h4>Equipements extérieurs</h4></label>
                            <br><br>
                            <label for="jardin">
                                <h5>Jardin</h5>
                                <input type="checkbox" name="outdoor_fittings[]" value="jardin"                                
                                >
                            </label>
                            
                            <label for="terrasse">
                                <h5>Terrasse</h5>
                                <input type="checkbox" name="outdoor_fittings[]" value="terrasse">
                            </label>
                            
                            <label for="balcon">
                                <h5>Balcon</h5>
                                <input type="checkbox" name="outdoor_fittings[]" value="balcon">
                            </label>
                            
                            <label for="piscine">
                                <h5>Piscine</h5>
                                <input type="checkbox" name="outdoor_fittings[]" value="piscine">
                            </label>
                            
                            <label for="jacuzzi">
                                <h5>Jacuzzi</h5>
                                <input type="checkbox" name="outdoor_fittings[]" value="jacuzzi">
                            </label>
                        </div>
                        <div class="form-group">
                            <h3>Adresse</h3>
                            <label for="street"><h4>Voie</h4></label>
                            <input type="text" name="street" id="street" placeholder="" class="form-control" value="<?= $updtLoc['street'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="postcode"><h4>Code postal</h4></label>
                            <input type="text" name="postcode" id="postcode" placeholder="" class="form-control"
                            value="<?= $updtLoc['postcode'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="city"><h4>Ville</h4></label>
                            <input type="text" name="city" id="city" placeholder="" class="form-control" value="<?= $updtLoc['city'] ?>">
                        </div>
                            <button type="submit" class="btn btn-default">Modifier</button>
                            <br><br>
                    </form>
                    <a href="<?= $this->url('users_showowner')?>" class="btn btn-default">Retour</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->stop('main_content') ?>

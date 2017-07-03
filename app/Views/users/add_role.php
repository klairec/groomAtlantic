<?php $this->layout('layoutTestNico', ['title' => 'Connexion / Inscription', 'title2' => 'Groom Atlantic', 'title3' => 'je sais pas flemme']) ?>





	
<?php $this->start('header') ?>
            <div class="container">



                <div class="table">

                    <div class="header-text">

                        <div class="row">

                            <div class="col-md-12 text-center">

                                <p>Inscription en tant que :</p>

<button type="button" class="btn btn-submit" ><a href="add_groom">Groom</a></button>

                                <button type="button" class="btn btn-submit" ><a href= "add_owner">Propriétaire</a></button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php $this->stop('header') ?>

<?php $this->start('main_content') ?>

<p>Inscription en tant que :</p>

<a href="add_groom">Groom</a>

<a href= "add_owner">Propriétaire</a>


<?php $this->stop('main_content') ?>
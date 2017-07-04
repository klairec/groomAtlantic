<?php $this->layout('layoutTestNico', ['title' => 'Connexion / Inscription', 'title2' => 'Groom Atlantic', 'title3' => 'je sais pas flemme']) ?>

<?php $this->start('header') ?>

<?php $this->stop('header') ?>


<?php $this->start('main_content') ?>
	

            <div class="container">

                <div class="table">

                    <div class="header-text">

                        <div class="row">

                            <div class="col-md-12 text-center">

                                <p>Inscription en tant que :</p>
                                
                                <button type="button" class="btn btn-link"><a href="<?=  $this->url('add_groom') ?>">Groom</a></button>
                                <button type="button" class="btn btn-link"><a href="<?=  $this->url('add_owner') ?>">Owner</a></button>
                                
                                

                               

                            </div>

                        </div>

                    </div>

                </div>

            </div>


<?php $this->stop('main_content') ?>
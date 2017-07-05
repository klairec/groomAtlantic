<?php $this->layout('layoutTestNico', ['title' => 'Connexion / Inscription', 'title2' => 'Groom Atlantic']) ?>

<?php $this->start('header') ?>

            <div class="container">
                <div class="table">
                    <div class="header-text">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p>Inscription en tant que :</p>
                                <button type="button" class="btn btn-link"><a href="<?=  $this->url('users_addGroom') ?>">Groom</a></button>
                                <button type="button" class="btn btn-link"><a href="<?=  $this->url('users_addOwner') ?>">Propriétaire</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php $this->stop('header') ?>

<?php $this->start('main_content') ?>

<?php $this->stop('main_content') ?>
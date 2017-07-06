<?php $this->layout('layoutTestNico', ['title' => 'Résultats de la recherche']) ?>

<?php $this->start('header') ?>
        
            <div class="container">
                <div class="table">
                    <div class="header-text">
                        <div class="row">
                            <div class="col-md-12 text-center">
                            <h2 class="light white">Résultats de vote recherche</h2>
                                <?php 
                                    if(!empty($errors)){

                                        echo'<p>'.implode('<br>', $errors).'</p>';

                                    }
                                ?>
                                <!-- Penser à mettre une maj au début de la recherche -->

                                <h3 class="light white">Nos Grooms à : <?= $_GET['SearchTown'] ?></h3>
                            </div>
                        </div>        
                                
                        <div class="row">
                            <?php
                                if(!empty($resultSearch)){

                                        

                                        foreach ($resultSearch as $datas) {

                                        /*    echo '' .$datas['id_groom']. ' ' .$datas['id_skill']. ' ' .$datas['price']. ' ' .$datas['city']. '';*/
                                            
                                            ?>
                                                <div class="col-md-3">
                                                    <div class="team text-center">
                                                        <div class="cover" style="background:url('<?= $this->assetUrl('img/team/cover1.jpg') ?>'); background-size:cover;">
                                                            <div class="overlay text-center">
                                                                <h3 class="white"><?=$datas['id_skill'] ?></h3>
                                                                <h5 class="light light-white"><?=$datas['price'] ?></h5>
                                                            </div>
                                                        </div>
                                                        <img src="<?= $this->assetUrl('img/team/concierge120.png') ?>" alt="Team Image" class="avatar">
                                                        <div class="title">
                                                            <h4><?=$datas['id_groom'] ?></h4>
                                                            <h5 class="muted regular">Groom sur <?=$datas['city'] ?></h5>
                                                        </div>
                                                        <?php if($w_user['role'] == 'owner'){ ?> <!-- Si c'est un proprio on affiche "mon profil" qui pointe le profil proprio-->
                                                        <a href="<?= $this->url('users_showowner') ?>">Entrer en contact avec le Groom</a>
                                                        <?php }
                                                        else{ ?>
                                                        <button data-toggle="modal" data-target="#modal1" class="btn btn-blue-fill">Sign Up Now</button>
                                                        <?php } ?>
                                                        
                                                    </div>
                                                </div>
                                            <?php

                                        }

                                    }                                   

                            ?>
                        </div>
                    </div>
                </div>
            </div>


<?php $this->stop('header') ?>

<?php $this->start('main_content') ?>

<?php $this->stop('main_content') ?>
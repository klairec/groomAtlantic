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
                                <ul>
                                <?php
                                    if(!empty($resultSearch)){

                                        

                                        foreach ($resultSearch as $datas) {

                                            echo '<ul>' .$datas['id_groom']. ' ' .$datas['id_skill']. ' ' .$datas['price']. ' ' .$datas['city']. '</ul>';

                                        }

                                    }                                   

                                    ?>
                                </ul>

                                    <p></p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php $this->stop('header') ?>

<?php $this->start('main_content') ?>

<?php $this->stop('main_content') ?>
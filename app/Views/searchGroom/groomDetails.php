

<?php $this->layout('layoutTestNico', ['title' => 'Résultats de la recherche']) ?>


<?php $this->start('css') ?>
    <style>
        header {
            display: none;
        }
         


    </style>
<?php $this->stop('css') ?>

<?php $this->start('main_content') ?>
  
    <div id="DivSearch" class="container";>
        <div class="table">
            <div class="header-text">
                <div class="row">
                    <div class="col-md-12 text-center">
                   <?php print_r($GroomInfos); ?>
                    <?php 
                        foreach ($GroomInfos as $datas) { ?>
                            <h2 style="color:#f06467" class="light white">Fiche de <?= ucfirst($datas['firstname']).' '.ucfirst(substr($datas['lastname'], 0, 1)).'.' ?></h2>

                            
                            




                    <?php
                        }
                    ?>

                  
                            <?php 
                                if(!empty($errors)){

                                echo'<p>'.implode('<br>', $errors).'</p>';

                                }
                            
                            ?>
                                    

                        <h3 class="light white" style="color:#f06467"></h3>
                    </div>
                </div>        
                                    
                <div class="row">
                </div>
            </div>
        </div>
    </div>

<?php $this->stop('main_content') ?>

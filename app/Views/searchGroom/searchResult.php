

<?php $this->layout('layoutTestNico', ['title' => 'Résultats de la recherche']) ?>



<?php $this->start('main_content') ?>

            
<div id="DivSearch" class="container";>
    <div class="table">
        <div class="header-text">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 style="color:#f06467" class="light white">Résultats de vote recherche</h2>
                        <?php 
                            if(!empty($errors)){

                            echo'<p>'.implode('<br>', $errors).'</p>';

                            }
                       
                        ?>
                                

                    <h3 class="light white" style="color:#f06467">Nos Grooms près de : <?= $ville['NomVille'].'('.$fullCp.')'; ?></h3>
                </div>
            </div>        
                                
            <div class="row">

              <?php


                    if(!empty($resultSearch)){                            

                        foreach ($resultSearch as $datas) {                            
                          
           
                ?>
                            <div class="col-md-4">
                                <div class="team text-center">
                                    <div class="cover" style="background:url('<?= $this->assetUrl('img/team/cover1.jpg') ?>'); background-size:cover;">
                                        <div style="text-align: center" class="overlay text-center">
                                            <h5 class="white">Mes compétences & tarifs : </h5>
                                            <h5 class="light light-white"></h5>
                                                <?php 
                                                    //TEST //
                                                    /*
                                                    $skillJoint = new ServicesInfosModel(); 
                                                    $tabSkill = $skillJoint->findSkillsWithId($datas['id_groom']);
                                                    $pricesTab = explode(',', $datas['price']);  
                                                    */
                                                ?>
                                                <table id="TabComp">
                                                    <tr>
                                                        <?php                                                            
                                                            foreach ($datas['comp'] as $skill) {
                                                                echo ' <th>' .$skill['skills']. '</th>';
                                                            }
                                                        ?>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <?php 

                                                            foreach ($datas['prix'] as $prix) {

                                                                echo '<td>'.$prix.' €</td>';
                                                            }
                                                        ?>
                                                    </tr>                                                    
                                                   
                                                </table>
                                        </div>
                                    </div>
                                    <img src="<?= $this->assetUrl('img/team/concierge120.png') ?>" alt="Team Image" class="avatar">
                                    <div class="title">
                                        <h4><?= ucfirst($datas['firstname']).' '.ucfirst(substr($datas['lastname'], 0, 1)).'.' ?></h4>
                                        <h5 class="muted regular">Groom sur 
                                        <?php
                                            foreach ($datas['villeAction'] as $city) {
                                                 echo ucfirst(strtolower($city));
                                            } 

                                         ?></h5>
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

                    } //fin du foreach Infosgroom

                } // fin du if resulSearch                                   

                ?>
            </div>
        </div>
    </div>
</div>

<?php $this->stop('main_content') ?>



<?php $this->layout('layoutTestNico', ['title' => 'Résultats de la recherche']) ?>


<?php $this->start('css') ?>
    <style>
        header {
            display: none;
        }
        .fullstar {
            font-size: 3em; 
            color: #f06467;


        }
         


    </style>
       
        }
<?php $this->stop('css') ?>

<?php $this->start('main_content') ?>
  
    <div id="DivSearch" class="container";>
        <div class="table">
            <div class="header-text">
                <div class="row">
                    <div class="col-md-12 text-center">

                    <?php 
                        foreach ($GroomInfos as $datas) { ?>
                            <h2 style="color:#f06467" class="light white">Fiche de <?= ucfirst($datas['firstname']).' '.ucfirst(substr($datas['lastname'], 0, 1)).'.' ?></h2>
                            <h3> Groom depuis le <?= ucfirst($datas['date_creation']) ?></h3>

                            <table id="TabComp">
                                <thead>Mes compétences et tarifs : </thead>
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


                                                    <div class="title">
                                        
                                            <h5>Groom sur 
                                            <?php
                                                foreach ($datas['villeAction'] as $city) {
                                                     echo ucfirst(strtolower($city));
                                                } 

                                             ?></h5>



                                             <div>
                                                <h4>Commentaires laissés à <?= ucfirst($datas['firstname']).' '.ucfirst(substr($datas['lastname'], 0, 1)).'.' ?></h4>
                                                <?php foreach ($datas['comments'] as $com) {
                                                   echo '<p>"'.$com['content'].'" laissé le : ' .$com['date'].' </p>';
                                                } ?>
                                                 



                                             </div>

                                             <div>
                                                <h4>Note moyenne : </h4>
                                                <?php foreach ($datas['NoteMoyenne'] as $note) {

                                                    if ($note['AVG(note)'] >= 4 AND $note['AVG(note)']<5 ){

                                                        echo '<span class="fullstar">★★★★☆</span>';
                                                    } 
                                                    if ($note['AVG(note)'] >= 3 AND $note['AVG(note)']<4 ){

                                                        echo '<span class="fullstar">★★★☆☆</span>';
                                                    } 
                                                    if ($note['AVG(note)'] >= 2 AND $note['AVG(note)']<3 ){

                                                        echo '<span class="fullstar">★★☆☆☆</span>';
                                                    } 
                                                    if ($note['AVG(note)'] >= 1 AND $note['AVG(note)']<2 ){

                                                        echo '<span class="fullstar">★☆☆☆☆</span>';
                                                    } 
                                                }     
                                                ?>
                                                 



                                             </div>
                                        </div>

                            
                            




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

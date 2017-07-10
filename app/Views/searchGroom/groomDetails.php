

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
        #contact1 {
            color: #fff; 
            text-align: center; 
            display: block; 
            font-size: 1.5em;
            background:rgba(240, 100, 103, 0.8);
            margin:auto 20em;
            border-radius: 30px;
            padding: 1em 0 1em 0px;


        }
       #contact1:hover {
           background:rgba(240, 100, 103, 1);
        }

         


    </style>
       
        
<?php $this->stop('css') ?>

<?php $this->start('main_content') ?>
  
    <div id="DivSearch" class="container";>
        <div class="table">
            <div class="header-text">
                <div class="row">
                    <div class="col-md-12 text-center">

                    <?php 
                    
                    if ($contact = '1') {

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

                                                <a id="contact1" href="#" data-toggle="modal" data-target="#modal5">Contacter <?= ucfirst($datas['firstname'])?></a>
                        <?php
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
      <div class="modal fade" id="modal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-popup">
                <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
                <h3 class="white">Entrer en contact avec Claire ?</h3>
                
                

                <a  href="<?= $this->url('Search_groomDetails', ['id' => $datas['id_groom']])?>?contact= 1" class="blue">
                <button id="subscribe" class="btn btn-submit">
                    Oui
                </button>
                </a>
                
                
            </div>
        </div>
    </div>

<?php $this->stop('main_content') ?>

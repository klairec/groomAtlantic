

<?php $this->layout('layoutTestNico', ['title' => 'Résultats de la recherche']) ?>


<?php $this->start('css') ?>
    <style>
        header {
            display: none;
        }
        #retourAccueil {
            color: #fff; 
            text-align: center; 
            display: block; 
            font-size: 1.5em;
            background:rgba(240, 100, 103, 0.8);
            margin:auto 20em;
            border-radius: 30px;
            padding: 5px 0 5px 0px;


        }
           #retourAccueil:hover {
           background:rgba(240, 100, 103, 1);
        }
        #details{
            background:rgba(41, 97, 144, 0.7);      
            font-size: 1.5em; 
            border-radius: 30px;
            display: block; 
            margin: auto 4em;
            padding: 10px;
        }
        #details:hover{
            background:rgba(41, 97, 144, 1);
        }

         


    </style>
<?php $this->stop('css') ?>

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
                                    

                        <h3 class="light white" style="color:#f06467"></h3>
                    </div>
                </div>        
                                    
                <div class="row">
                </div>
            </div>
        </div>
    </div>

<?php $this->stop('main_content') ?>

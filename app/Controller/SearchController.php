<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ServicesInfosModel;
use \Model\VilleModel;
use \W\Model\UsersModel;





class SearchController extends Controller
{
    
    public function searchResult()
	{
           

		$InfosGroom = [];
		$tabSkill = [];
  

		//Code postal entier :
		$fullCp = $_GET['postCode'];
		

		if (strlen($fullCp) == 5){

			$searchVille = new VilleModel(); // on insère
        	$ville = $searchVille->findVille($fullCp);
			
		}
		else{
			$this->redirectToRoute('default_home');
			      
            $this->flash('Le couple identifiant / mot de passe est invalide', 'danger');
           
		}

		//Code Dpt utilisé pour la recherche des grooms (Afin d'élargir la recherche au département)
		$shortCp = substr($_GET['postCode'], 0, 2);	
		$search = new ServicesInfosModel(); // on insère
        $resultSearch = $search->searchByCP($shortCp);			
					
					/*	$searchTown = new ServicesInfosModel(); // on insère
				   		$resultSearch = $searchTown->search($cp,'OR', $stripTags = true); */ 


				   		//$resultSearch[0]['numeroSerie']=$num;
	 

		if (!empty($resultSearch)){
			
			// $InfosGroom[] = $resultSearch;


                for($i=0;$i<count($resultSearch);$i++){


            
                foreach ($resultSearch as $result) {
                
                $skillJoint = new ServicesInfosModel();            
                $resultSearch[$i]['comp'] = $skillJoint->findSkillsWithId($resultSearch[$i]['id_groom']);            
                $resultSearch[$i]['prix'] = $pricesTab = explode(',',$resultSearch[$i]['price']); 
                $resultSearch[$i]['villeAction'] = $searchVille->findVille($resultSearch[$i]['work_area']);                
                 

                
                
                        }



               
            }
	          
	           // $InfosGroom['comp'][] = $tabSkill;

	        
    	}
        

        $params = [
				'resultSearch' => $resultSearch,
				'fullCp'	=> $fullCp,
				'InfosGroom' => $InfosGroom,
				'tabSkill' => $tabSkill,
				'ville' => $ville,							
					
				

		];



		$this->show('searchGroom/searchResult', $params);
	}
    
    
    
    
    
    
    
    
    
    
    
    
    
}

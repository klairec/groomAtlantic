<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ServicesInfosModel;
use \W\Model\UsersModel;



class SearchController extends Controller
{
    
    public function searchResult()
	{





		//Code postal entier :
		$fullCp = $_GET['postCode'];
		//Code Dpt : 
		$cp = [ 'city' => substr($_GET['postCode'], 0, 2),

		];

		$searchTown = new ServicesInfosModel(); // on insère
        $resultSearch = $searchTown->search($cp,'OR', $stripTags = true);

        foreach ($resultSearch as $result) {

        	$skill = explode('|', $result['id_skill']);

        	foreach ($skill as $skillGroom) {
        	
        	$testSkill = $skillGroom;
        	

        }
        	$idgroom = $result['id_groom'];

        }
        /* $locs = explode('|', $location['outdoor_fittings']); */

        $params = [
				'resultSearch' => $resultSearch,
				'fullCp'	=> $_GET['postCode'],
				'testSkills' => $testSkill,
				
					
				

		];



		$this->show('searchGroom/searchResult', $params);
	}
    
    
    
    
    
    
    
    
    
    
    
    
    
}

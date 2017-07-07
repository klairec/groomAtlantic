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

        $params = [
				'resultSearch' => $resultSearch,
				'fullCp'	=> $_GET['postCode'], 		
				

		];



		$this->show('searchGroom/searchResult', $params);
	}
    
    
    
    
    
    
    
    
    
    
    
    
    
}

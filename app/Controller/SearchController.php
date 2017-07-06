<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ServicesInfosModel;
use \W\Model\UsersModel;

class SearchController extends Controller
{
    
    public function searchResult()
	{


		$search = [ 'city' => $_GET['SearchTown'],

		];

		$searchTown = new ServicesInfosModel(); // on insère
        $resultSearch = $searchTown->search($search,'OR', $stripTags = true);

        $params = [
				'resultSearch' => $resultSearch,
				'Searchtown'	=> $_GET['SearchTown'], 		
				

		];



		$this->show('searchGroom/searchResult', $params);
	}
    
    
    
    
    
    
    
    
    
    
    
    
    
}

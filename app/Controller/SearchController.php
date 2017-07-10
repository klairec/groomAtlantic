<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ServicesInfosModel;
use \Model\VilleModel;
use \W\Model\UsersModel;
use \Model\CommentsModel;


class SearchController extends Controller
{


    public function searchResult() // Les résultats de la recherche NO SHIT?!
    {


    	$InfosGroom = [];
    	$tabSkill = [];
    	$params=[];



		//Code postal entier :



    	if (isset($_GET['postCode']) && strlen($_GET['postCode']) == 5){

    		$fullCp = $_GET['postCode'];

			$searchVille = new VilleModel(); // On récupère le nom de la ville recherchée à partir du CP
			$ville = $searchVille->findVille($fullCp);

			//Code Dpt utilisé pour la recherche des grooms (Afin d'élargir la recherche au département)
			$shortCp = substr($_GET['postCode'], 0, 2);	
			$search = new ServicesInfosModel(); // on insère
			$resultSearch = $search->searchByCP($shortCp);			

			if (!empty($resultSearch)){
				/* Ici j'ajoute au tableau contenant les résultats de la recherche les infos supplémentaires croisées avec les autres tables 
				*/
				for($i=0;$i<count($resultSearch);$i++){ 

					foreach ($resultSearch as $result) {

						$skillJoint = new ServicesInfosModel();            
		            $resultSearch[$i]['comp'] = $skillJoint->findSkillsWithId($resultSearch[$i]['id_groom']); //Va chercher les compétences du groom a partir des valeurs 1,2,3..           
		            $resultSearch[$i]['prix'] = $pricesTab = explode(',',$resultSearch[$i]['price']);  //Va chercher les tarifs
		            $resultSearch[$i]['villeAction'] = $searchVille->findVille($resultSearch[$i]['work_area']); // transforme le CP en nom de commune

		        }
		    }
		}


		$params = [
		'resultSearch' => $resultSearch,
		'fullCp'	=> $fullCp,
		'InfosGroom' => $InfosGroom,
		'tabSkill' => $tabSkill,
		'ville' => $ville,
		];

	}
	else{

		$this->flash('Le code postal est trop court', 'danger');

	}

	$this->show('searchGroom/searchResult', $params);
}




public function groomDetails($id){


		$contact = false;
		$search = new ServicesInfosModel(); // on insère
		$GroomInfos = $search->groomById($id);	

		if (!empty($GroomInfos)){
				/* Ici j'ajoute au tableau contenant les résultats de la recherche les infos supplémentaires croisées avec les autres tables 
				*/
				for($i=0;$i<count($GroomInfos);$i++){ 

					foreach ($GroomInfos as $result) {


		            $noteComm = new CommentsModel();
		            $skillJoint = new ServicesInfosModel();
		            $searchVille = new VilleModel(); 


		            $GroomInfos[$i]['comments'] = $noteComm->ShowComm($GroomInfos[$i]['id_groom']);
		            $GroomInfos[$i]['NoteMoyenne'] = $noteComm->NoteMoyGroom($GroomInfos[$i]['id_groom']);

		            $GroomInfos[$i]['comp'] = $skillJoint->findSkillsWithId($GroomInfos[$i]['id_groom']); //Va chercher les compétences du groom a partir des valeurs 1,2,3..           
		            $GroomInfos[$i]['prix'] = $pricesTab = explode(',',$GroomInfos[$i]['price']);  //Va chercher les tarifs
		            $GroomInfos[$i]['villeAction'] = $searchVille->findVille($GroomInfos[$i]['work_area']); // transforme le CP en nom de commune

		        }
		    }
		}

		$params=[
		'GroomInfos' => $GroomInfos,
		'contact'	 => $contact,

		];

		$this->show('searchGroom/groomDetails', $params);

	}










}

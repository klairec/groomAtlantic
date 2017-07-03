<?php

namespace Controller;

use \W\Controller\Controller;

class RentalsController extends Controller
{

	public function addRental(){

		$me = $this->getUser(); // utilisateur connecté

		// Limite l'accès à la page à un utilisateur non connecté
		if(empty($me)){
			$this->showNotFound(); // affichera une page 404
		}

		

	}


	public function showRentals(){

		$rentalsModel = new RentalsModel();
		$rentals = $rentalsModel->findRentalsWithId();

		var_dump($rentals);


		// return

	}

	

}
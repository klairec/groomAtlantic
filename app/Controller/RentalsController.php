<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\RentalsModel;
use \Respect\Validation\Validator as v;


class RentalsController extends Controller
{

	// fonction pour ajouter des locations au profil du propriétaire
	public function addRental(){

		// on récupère les données de l'utilisateur connecté
		$me = $this->getUser();

		// on limite l'accès à la page à un utilisateur non connecté
		if(empty($me)){
			$this->showNotFound(); // affichera une page 404
		}

		// on crée les variables post et errors
		$post = [];
		$errors = [];
		// on nettoie le tableau POST
		if(!empty($_POST)){

			foreach ($_POST as $key => $value){

				if(is_array($value)){
					$post[$key] = array_map('trim', array_map('strip_tags', $value));
				}
				else {
					$post[$key] = trim(strip_tags($value));
				}
			}

			// on vérifie les champs insérés
			if(!v::notEmpty()->stringType()->length(10, 50)->validate($post['name'])){
				$errors[] = 'Le titre doit comporter entre 10 et 50 caractères';
			}

			if(!v::notEmpty()->stringType()->length(10, 150)->validate($post['street'])){
				$errors[] = 'La voie doit comporter entre 10 et 150 caractères';
			}

			if(!v::notEmpty()->intVal()->length(5)->validate($post['postcode'])){
				$errors[] = 'Le code postal doit contenir 5 chiffres';
			}

			if(!v::notEmpty()->stringType()->length(3, 30)->validate($post['city'])){
				$errors[] = 'La ville doit comporter entre 3 et 30 caractères';
			}

			if(!v::notEmpty()->intVal()->length(1, 4)->validate($post['area'])){
				$errors[] = 'Le surface doit contenir entre 1 et 4 chiffres';
			}

			if(!v::notEmpty()->intVal()->length(1, 15)->validate($post['rooms'])){
				$errors[] = 'Le nombre de pièces doit être compris entre 1 et 15 pièces';
			}

			// si pas d'erreurs
			if(count($errors) === 0){
				$data = [
					'name' 			=> ucfirst($post['name']),
					'type'				=> $post['type'],
					'street'   			=> strtoupper($post['street']),
					'postcode'    		=> $post['postcode'],
					'city'    			=> strtoupper($post['city']),
					'area'    			=> $post['area'],
					'rooms'    			=> $post['rooms'],
					'outdoor_fittings'  => $post['outdoor_fittings'],
					'id_owner'			=> $me['id'],
				];

				// on insère les données tappées par l'utilisateur dans la BDD
				$addRental = new RentalsModel();
				$insert = $addRental->insert($data);
				if(!empty($insert)){
					// Ajoute un message "flash" (stocké en session temporairement)
					// Note : il faut toutefois ajouter l'affichage de ce message au layout
					$this->flash('Votre location a été ajoutée', 'success');

					$this->redirectToRoute('rentals_show'); // Redirige vers la route donnée
				}
			}

			else {
				$errorsText = implode('<br>', $errors);
				$this->flash($errorsText, 'danger');

			}
		}

		$this->show('users/ownerProfile/addRental');

	}
}


	


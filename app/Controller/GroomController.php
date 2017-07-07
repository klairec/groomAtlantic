<?php

namespace Controller;

use \W\Controller\Controller;
use W\Model\UsersModel;
use \Respect\Validation\Validator as v;

class GroomController extends \W\Controller\Controller
{
   
   /**
    * Modifier profil groom
    */
    
    public function modifGroom()
    {
        // on récupère les données de l'utilisateur connecté
		$me = $this->getUser();
        $me_id = $this->getUser()['id'];

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
			if(!v::notEmpty()->stringType()->length(2, 50)->validate($post['newLastname'])){
				$errors[] = 'Le nom doit comporter entre 2 et 50 caractères';
			}

			if(!v::notEmpty()->stringType()->length(2, 50)->validate($post['newFirstname'])){
				$errors[] = 'Le prénom doit comporter entre 2 et 50 caractères';
            }   
            
            if(!v::notEmpty()->email()->validate($post['newEmail'])){
				$errors[] = 'L\'email est invalide';
			}

			if(!v::notEmpty()->intVal()->length(10)->validate($post['newPhone'])){
				$errors[] = 'Le numéro de téléphone doit comporter 10 chiffres';
			}
            
            if(!v::notEmpty()->validate($post['newAddress'])){
				$errors[] = 'l\'adresse n\'est pas valide';
			}

			if(!v::notEmpty()->intVal()->length(5)->validate($post['newPostcode'])){
				$errors[] = 'Le code postal doit contenir 5 chiffres';
			}

			if(!v::notEmpty()->stringType()->length(3, 30)->validate($post['newCity'])){
				$errors[] = 'La ville doit comporter entre 3 et 30 caractères';
			}

			
			// si pas d'erreurs
			if(count($errors) === 0){
				$data = [
					'lastname' 		    => $post['newLastname'],
					'firstname' 		=> $post['newFirstname'],
                    'email'             => $post['newEmail'],
					'phone'    			=> $post['newPhone'],
					'address'   		=> $post['newAddress'],
					'postcode'    		=> $post['newPostcode'],
					'city'    			=> $post['newCity']
				];

				// on insère les données renseignées par l'utilisateur dans la BDD
				$usersModel = new UsersModel();
				$modifGroom = $usersModel->update($data, $me_id);
				if(!empty($modifGroom)){
					// Ajoute un message "flash" (stocké en session temporairement)
					// Note : il faut toutefois ajouter l'affichage de ce message au layout
					$this->flash('Votre profil a été modifié', 'success');

					return $modifGroom;
				}
                else{
                    echo 'marche pas putain de bordel de merde !';
                }
			}

			else {
				$errorsText = implode('<br>', $errors);
				$this->flash($errorsText, 'danger');

			}
		}
	}
}


<?php

namespace Controller;

use \W\Controller\Controller;
use \Respect\Validation\Validator as v;

class RentalsController extends Controller
{

	public function addRental(){

		$me = $this->getUser(); // utilisateur connecté

		// Limite l'accès à la page à un utilisateur non connecté
		if(empty($me)){
			$this->showNotFound(); // affichera une page 404
		}

		if(!empty($_POST)){
			$post = array_map('trim', array_map('strip_tags', $_POST));

			if(!v::notEmpty()->length(10, 50)->validate($post['title'])){
				$errors[] = 'Le titre doit comporter entre 10 et 50 caractères';
			}

			if(!v::notEmpty()->length(10, 150)->validate($post['street'])){
				$errors[] = 'La voie doit comporter entre 10 et 150 caractères';
			}

			if(!v::notEmpty()->length(10, 150)->validate($post['street'])){
				$errors[] = 'La voie doit comporter entre 10 et 150 caractères';
			}
		}

		if(count($errors) === 0){
				$data = [
					'title' 	=> ucfirst($post['title']),
					'content'	=> $post['content'],
					'date_add'  => date('Y-m-d H:i:s'),
					'id_user'	=> $me['id'], // récupère l'id stocké en session
				];

				$blogModel = new BlogModel();
				$insert = $blogModel->insert($data);
				if(!empty($insert)){
					// Ajoute un message "flash" (stocké en session temporairement)
					// Note : il faut toutefois ajouter l'affichage de ce message au layout
					$this->flash('Votre article a été ajouté', 'success');

					$this->redirectToRoute('blog_list'); // Redirige vers la route donnée
				}
			}
		}

	public function showRentals(){

		$rentalsModel = new RentalsModel();
		$rentals = $rentalsModel->findRentalsWithId();

		var_dump($rentals);

		// return

	}
}

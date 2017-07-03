<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;


class UsersController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home(){
		$this->show('default/home');
	}

	public function addUser(){

		$this->show('users/add_user');


	}

	

	public function addGroom(){


		// $this->show('users/add', $params);


		$post = [];
		$errors = [];
		$formValid = false;
		


		if(!empty($_POST)){
				// Permet de nettoyer les données
				foreach($_POST as $key => $value){
					$post[$key] = trim(strip_tags($value));
				}
		
				if(strlen($post['firstname']) < 2){
					$errors[] = 'Le prénom doit comporter au moins 2 caractères';
				}

				if(strlen($post['lastname']) < 2){
					$errors[] = 'Le nom doit comporter au moins 2 caractères';
				}

						

		  	if(count($errors) === 0){
		  			$authModel = new \W\Security\AuthentificationModel;

					$data = [
						'firstname' => $post['firstname'], 
						'lastname' => $post['lastname'],
						'email'	 => $post['email'],
						'role' => 'groom',						
						'password' => $authModel->hashPassword($post['password']),
						'address' => $post['address'],
						'postcode' => $post['postcode'],
						'city' => $post['city'],
						'date_creation' => date('d.m.y'),

					];

			$articlesModel = new ArticlesModel();

			$insert = $articlesModel->insert($data);
			//retourne false si une erreur survient ou les nouvelles donnes inseres sous forme de array

				if(!empty($insert)){
					$formValid = true;

				}

	
			}
	
		}
				$params = [
					'formValid' => $formValid,
					'errors' => $errors,
				];
				$this->show('users/add_groom', $params);
	}


	public function addOwner(){


		// $this->show('users/add', $params);


		$post = [];
		$errors = [];
		$formValid = false;
		$rolesAvailable = ['admin', 'user', 'editor'];


		if(!empty($_POST)){
				// Permet de nettoyer les données
				foreach($_POST as $key => $value){
					$post[$key] = trim(strip_tags($value));
				}
		
				if(strlen($post['firstname']) < 2){
					$errors[] = 'Le prénom doit comporter au moins 2 caractères';
				}

				if(strlen($post['lastname']) < 2){
					$errors[] = 'Le nom doit comporter au moins 2 caractères';
				}

				
			

		  	if(count($errors) === 0){
		  			$authModel = new \W\Security\AuthentificationModel;

					$data = [
						'firstname' => $post['firstname'], 
						'lastname' => $post['lastname'],
						'email'	 => $post['email'],
						'role' => 'owner',						
						'password' => $authModel->hashPassword($post['password']),
						'address' => $post['address'],
						'postcode' => $post['postcode'],
						'city' => $post['city'],
						'date_creation' => date('d.m.y'),




					];

			$usersModel = new UsersModel();

			$insert = $usersModel->insert($data);
			//retourne false si une erreur survient ou les nouvelles donnes inseres sous forme de array

				if(!empty($insert)){
					$formValid = true;

				}

	
			}
	
		}
				$params = [
					'formValid' => $formValid,
					'errors' => $errors,
				];
				$this->show('users/add_owner', $params);
	}

	public function list(){

			$usersModel = new UsersModel();

			$ListUser = $usersModel->findAll();

		

			$params = [
				'ListUser' => $ListUser,
				

			];


			$this->show('users/list', $params);



	}

	public function connexion(){

			$post = [];
			$errors = [];
			$formValid = false;
			$deco = false;
			$Userlog = [];
		



			if(!empty($_POST)){
				// Permet de nettoyer les données
				foreach($_POST as $key => $value){
					$post[$key] = trim(strip_tags($value));
				}
		
				if(strlen($post['email']) < 2){
					$errors[] = 'Le mail doit comporter au moins 2 caractères';
				}

				if(strlen($post['password']) < 2){
					$errors[] = 'Le mdp doit comporter au moins 2 caractères';
				}


					if(count($errors) === 0){

		  			$authModel = new \W\Security\AuthentificationModel;
		  			$connectMatch = $authModel->isValidLoginInfo($post['email'], $post['password']);

		  			



			

		
				  				
						if($connectMatch != 0){
							$formValid = true;		
							
						
		  						$authModel->logUserIn($connectMatch);
		  						$Userlog = $authModel->getLoggedUser();

		  						



						}
						

	
					}

			

			}
			if (isset($_GET['deco'])){
				if ($_GET['deco']="1"){

		  			$authModel = new \W\Security\AuthentificationModel;
					$authModel->logUserOut();
					$deco=true;
					
				}
			}

			$params = [
					'formValid' => $formValid,
					'errors' => $errors,
					'mail' => isset($post['email']),
					'Userlog' => $Userlog,
					'deco' => $deco,


				];
			$this->show('users/connexion', $params);
			
	}



	public function AjoutArticle(){

		// $this->show('users/add', $params);


		$post = [];
		$errors = [];
		/*$formValid = false;*/

		


		if(!empty($_POST)){
				// Permet de nettoyer les données
				foreach($_POST as $key => $value){
					$post[$key] = trim(strip_tags($value));
				}
		
				if(strlen($post['title']) < 2){
					$errors[] = 'Le titre doit comporter au moins 2 caractères';
				}

				if(strlen($post['content']) < 15){
					$errors[] = 'Le nom doit comporter au moins 15 caractères';
				}

			

		  	if(count($errors) === 0){
		  			$authModel = new \W\Security\AuthentificationModel;
		  			$Userlog = $authModel->getLoggedUser();

					$data = [
						'title' => $post['title'], 
						'content' => $post['content'],
						'date'	 => date('d.m.y'),
						'user.id' => $Userlog,

					];

			$ArticlesModel = new ArticlesModel();

			$insert = $ArticlesModel->insert($data);
			//retourne false si une erreur survient ou les nouvelles donnes inseres sous forme de array

				/*if(!empty($insert)){
					$formValid = true;

				}*/

	
			}
	
		}
				$params = [
					/*'formValid' => $formValid,*/
					'errors' => $errors,
				];
				
				$this->show('users/AjoutArticle', $params);
	}



}
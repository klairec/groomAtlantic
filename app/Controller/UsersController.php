<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;
use \Model\ResetPasswordModel;
use \Controller\CommentsController;
use \Controller\Contact_requestsController;
use \Controller\RentalsController;
use Intervention\Image\ImageManagerStatic as Image;

class UsersController extends Controller
{

    /**
     * Page d'accueil
     */
    public function home(){
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

                    $usersModel = new UsersModel();
                    $infoUser = $usersModel->find($connectMatch);                 

                    $authModel->logUserIn($infoUser);

                    if(!empty($authModel->getLoggedUser())){
                        // Ici la session est complétée avec les infos du membre (hors mdp)
                        $formValid = true;
                        if($formValid = true){
                            $this->redirectToRoute($post['current_url']);
                        }
                    }

                }
            }   
            else {
                $this->flash('Le couple identifiant / mot de passe est invalide', 'danger');
            }

        }
        if (isset($_GET['deco'])){
            if ($_GET['deco'] == "1"){

                $authModel = new \W\Security\AuthentificationModel;
                $authModel->logUserOut();
                $deco = true;
                /*$this->redirectToRoute('default_home');*/
            }
        }
        $params = [
            'formValid' => $formValid,
            'errors' => $errors,
            'mail' => isset($post['email']),            
            'deco' => $deco,
        ];
        $this->show('default/home', $params);
    }

    /**
     * Connexion
     */
    public function login(){

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

                    $usersModel = new UsersModel();
                    $infoUser = $usersModel->find($connectMatch);                 

                    $authModel->logUserIn($infoUser);

                    if(!empty($authModel->getLoggedUser())){
                        // Ici la session est complétée avec les infos du membre (hors mdp)
                        $this->flash('Vous êtes desormais connecté', 'success');
                        $this->redirectToRoute('default_home');
                    } 
                }
                else {
                    $this->flash('Le couple identifiant / mot de passe est invalide', 'danger');
                }
            }
        }
        if (isset($_GET['deco'])){
            if ($_GET['deco'] == "1"){
                $authModel = new \W\Security\AuthentificationModel;
                $authModel->logUserOut();
                $deco=true;
            }
        }

        $params = [
            'formValid' => $formValid,
            'errors'    => $errors,
            'mail'      => isset($post['email']),
            'deco'      => $deco,
        ];
        $this->show('users/login', $params);

    }


    /**
     * Ajout d'un concierge
     */
    public function addGroom(){
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
                    'email'  => $post['email'],
                    'role' => 'groom',                      
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
                    $this->flash('Vous êtes desormais inscrit', 'success');
                    $this->redirectToRoute('default_home');
                }
            }
        }
        $params = [
            'formValid' => $formValid,
            'errors' => $errors,
        ];
        $this->show('users/addGroom', $params);
    }

    /**
     * Ajouter propriétaire
     */
    public function addOwner(){

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
                    'email'  => $post['email'],
                    'role' => 'owner',
                    'password' => $authModel->hashPassword($post['password']),
                    'address' => $post['address'],
                    'postcode' => $post['postcode'],
                    'city' => $post['city'],
                    'date_creation' => date('Y.m.d'),
                    'phone' => $post['phone'],
                ];

                $usersModel = new UsersModel();

                $insert = $usersModel->insert($data);
                //retourne false si une erreur survient ou les nouvelles données inseres sous forme de array

                if(!empty($insert)){
                    $formValid = true;

                    $this->flash('Vous êtes desormais inscrit', 'success');
                    $this->redirectToRoute('default_home');
                }
            }
        }
        $params = [
            'formValid' => $formValid,
            'errors'    => $errors,
        ];
        $this->show('users/addOwner', $params);
    }


    /**
     * Voir profil groom
     */
    public function showGroom()
    {
        $this->allowTo(['groom']); // limite par défaut à l'utilisateur ayant pour role "groom"

        $user_connect = $this->getUser(); // Récupère l'utilisateur connecté, correspond à $w_user dans la vue        
        
        $commentsController = new CommentsController();
        $comments = $commentsController->commentList();
        
        $commentsAut = new CommentsController();
        $commentsA = $commentsAut->commentsAuthor();
        
        $contactReq = new Contact_requestsController();
        $contacts = $contactReq->ContactAuthor();
        
        $rentalsPpt = new RentalsController();
        $propositions = $rentalsPpt->showRentals($user_connect['id']);
    
        /*$image = Image::make('public/images.jpg')->resize(100, 100); */
        
        $params = [
           /* 'image' => $image, */
            'comments'  => $comments,
            'commentsA' => $commentsA,
            'contacts' => $contacts,
            'propositions' => $propositions
            ];

        $this->show('users/groomProfile/showGroom', $params);
    }
    
    /**
    * Modifier profil groom
    */
    
    public function modifGroom()
    {
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

			if(!v::notEmpty()->intVal()->length(5)->validate($post['newPostcode'])){
				$errors[] = 'Le code postal doit contenir 5 chiffres';
			}

			if(!v::notEmpty()->stringType()->length(3, 30)->validate($post['newCity'])){
				$errors[] = 'La ville doit comporter entre 3 et 30 caractères';
			}

			
			// si pas d'erreurs
			if(count($errors) === 0){
				$data = [
					'lastname' 		    => ucfirst($post['newLastname']),
					'firstname' 		=> ucfirst($post['newFirstname']),
					'phone'    			=> $post['newPhone'],
					'street'   			=> strtoupper($post['newStreet']),
					'postcode'    		=> $post['newPostcode'],
					'city'    			=> strtoupper($post['newCity']),
					'id'			    => $me['id'],
				];

				// on insère les données tappées par l'utilisateur dans la BDD
				$usersModel = new Model();
				$modifGroom = $usersModel->update($data);
				if(!empty($modifGroom)){
					// Ajoute un message "flash" (stocké en session temporairement)
					// Note : il faut toutefois ajouter l'affichage de ce message au layout
					$this->flash('Votre profil a été modifié', 'success');

					$this->show('users/groomProfile/modifGroom', $data);
				}
			}

			else {
				$errorsText = implode('<br>', $errors);
				$this->flash($errorsText, 'danger');

			}
		}
	}
        

    /**
     * Voir profil proprietaire
     */
    public function showOwner()
    {
        // limite par défaut à l'utilisateur ayant pour role "owner"
        if(!$this->allowTo(['owner'])){
            $this->redirectToRoute('default_home');
        }

        $user_connect = $this->getUser(); // Récupère l'utilisateur connecté, correspond à $w_user dans la vue

        $ajouterLoc = new RentalsController();
        $addRental = $ajouterLoc->addRental(); 

        $voirLoc = new RentalsController();
        $locations = $voirLoc->showRentals($user_connect['id']);

        $commentsController = new CommentsController();
        $comments = $commentsController->commentListOwner();
        
        $commentsAddr = new CommentsController();
        $commentsAd = $commentsAddr->commentsAddressee(); 

    

        $params = [
            
            'addRental' => $addRental,
            'locations' => $locations,
            'comments'  => $comments,
            'commentsAd' => $commentsAd,
        ];  

        $this->show('users/ownerProfile/owner_space', $params);
    }


    /**
     * Ajoute role
     */
    public function pickRole(){

        $this->show('users/pickRole');

    }

    /**
     * Reset mot de passe
     */
    public function pwdReset(){


        $post = [];
        $errors = [];
        $formValid = false;


        if(!empty($_POST)){
            // Permet de nettoyer les données
            foreach($_POST as $key => $value){
                $post[$key] = trim(strip_tags($value));
            }

            if(strlen($post['email']) < 2){
                $errors[] = 'Le mail doit comporter au moins 2 caractères';
            }


            if(count($errors) === 0){

                $usersModel = new UsersModel();                
                $emailExist = $usersModel->emailExists($post['email']);

                if($emailExist = true){ // Si l'email existe 

                    $token = md5(uniqid(rand(), true));// on génère un token

                    $usersModel = new UsersModel();  
                    $userInfo = $usersModel->getUserByUsernameOrEmail($post['email']);        // on va chercher l'id qui correspond au mail

                    $data = [

                        'token' => $token,
                        'id_user' => $userInfo['id'],

                    ];

                    $resetPwdModel = new ResetPasswordModel(); // on insère
                    $insert = $resetPwdModel->insert($data);

                    if(!empty($insert)){// si l'insertion s'est bien passé on envoie le mail


                        $mail = new \PHPMailer();

                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth   = true;

                        $mail->Username   = getApp()->getConfig('smtp_email_ident');
                        $mail->Password   = getApp()->getConfig('smtp_email_pass');

                        $mail->SMTPSecure = 'ssl';
                        $mail->Port = 465;

                        $mail->SetFrom('reset.password@email.fr', 'GroomAtlantic');
                        $mail->addAddress($post['email']);
                        $mail->isHTML(true);


                        $mail->Subject = 'Sujet';
                        $mail->Body = '<a href="'. $this->redirectToRoute('users_traitementReset') . '?idUser=' . $userInfo['id'] . '&token=' . $token . '">Changer le mot de passe</a>';


                        if(!$mail->Send()){
                            $this->flash('Une erreer est survenue lors de l\'envoi de l\'email', 'danger');
                            //echo 'Erreur : ' . $mail->ErrorInfo; // uniquement pour les dev, l'utilisateur s'en cague :-)
                        }
                        else {
                            $formValid = true;
                        }                      
                    }

                }
            }   
            else {
                $this->flash('Email inconnu', 'danger');
            }
        }

        $params = [
            'formValid' => $formValid,
            'errors'    => $errors,
        ];

        $this->show('users/pwdReset', $params);

    }


    /**
     * Traitement reset password
     */
    public function traitementReset()
    {
        
        $post = [];
        $errors = [];
        $formValid = false;
        $showForm = false;
     
        if(isset($_GET['idUser']) AND isset($_GET['token']) AND !empty($_GET['idUser']) AND !empty($_GET['token']) AND ctype_digit($_GET['idUser'])){

            $resetPwdModel = new ResetPasswordModel();
            $matchToken = $resetPwdModel->findToken($_GET['idUser'], $_GET['token']);

            if(count($matchToken) == 1){ // si le token correspond on affiche le formulaire

                $showForm = true;

                if(!empty($_POST)){
                    // Permet de nettoyer les données
                    foreach($_POST as $key => $value){
                        $post[$key] = trim(strip_tags($value));
                    }
                    //Verifs form
                    if(strlen($post['password']) < 5){
                        $errors[] = 'Le mot de passe doit comporter au moins 5 caractères';
                    }
                    if($post['password'] != $post['password2']){
                        $errors[] = 'Le mot de passe et sa confirmation ne correspondent pas';
                    }

                    //si pas d'erreurs on insère
                    if(count($errors) === 0){ 
                        $authModel = new \W\Security\AuthentificationModel;

                        $data = [
                            'password' => $authModel->hashPassword($post['password']), 
                        ];

                        $usersModel = new UsersModel();
                        $update = $usersModel->update($data, (int) $_GET['idUser']);

                        if(!empty($update)){
                            $resetPwdModel = new ResetPasswordModel();
                            $DelToken = $resetPwdModel->deleteToken($_GET['idUser'], $_GET['token']);
                            
                            $formValid = true;
                        }
                }                            
                }
            }
        }

        $params = [
            'showForm' => $showForm,
            'formValid' => $formValid,
            'errors' => $errors,
        ];

        $this->show('users/traitementReset', $params);
    }


    /**
     * Infos ? :-)
     */
    public function infos() {

        $this->show('users/infos');
    }

   

}   
<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;


class UsersController extends Controller
{

   
/**************PAGE D'ACCCUEIL PAR DEFAUT*************************/
    
    
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
                    }

                    
                }

                else {
                    $this->flash('Le couple identifiant / mot de passe est invalide', 'danger');
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
            'deco' => $deco,
        ];
        $this->show('default/home', $params);
    }
    

/******************CONNEXION*********************/
    
    
    public function connect(){

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
            'deco' => $deco,
        ];
        $this->show('users/connect', $params);

    }
 

/******************AJOUTER CONCIERGE*********************/
    
    
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
        $this->show('users/add_groom', $params);
    }

 

/******************AJOUTER PROPRIETAIRE*********************/
        
    
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
                    'email'	 => $post['email'],
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
                //retourne false si une erreur survient ou les nouvelles donnes inseres sous forme de array

                if(!empty($insert)){
                    $formValid = true;

                    $this->flash('Vous êtes desormais inscrit', 'success');
                    $this->redirectToRoute('add_groom');


                }
            }

        }
        $params = [
            'formValid' => $formValid,
            'errors' => $errors,
        ];
        $this->show('users/add_owner', $params);
    }

     
/******************AJOUTER ROLE*********************/
    

    public function add_role(){

        $this->show('users/add_role');

    }





}
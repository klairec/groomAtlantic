<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;
use \Model\Reset_passwordModel;




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
            if ($_GET['deco']="1"){

                $authModel = new \W\Security\AuthentificationModel;
                $authModel->logUserOut();
                $deco==true;
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

/******************CONNEXION*********************/
    
    
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
        $this->show('users/login', $params);

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
            'errors' => $errors,
        ];
        $this->show('users/addOwner', $params);
    }

    
/******************VOIR PROFIL GROOM********************/
    
    public function showGroom()
    {
        $this->allowTo(['groom']); // limite par défaut à l'utilisateur ayant pour role "groom"

        $user_connect = $this->getUser(); // Récupère l'utilisateur connecté, correspond à $w_user dans la vue        

        $this->show('users/groomProfile/showGroom');
    }
    
    
    
     
/******************VOIR PROFIL PROPRIETAIRE********************/
    
    public function showOwner()
    {
        $this->allowTo(['owner']); // limite par défaut à l'utilisateur ayant pour role "owner"

        $user_connect = $this->getUser(); // Récupère l'utilisateur connecté, correspond à $w_user dans la vue        

        $this->show('users/ownerProfile/owner_space');
    }
    
     
/******************AJOUTER ROLE*********************/
    

    public function pickRole(){

        $this->show('users/pickRole');

    }
    
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
                    
                    $reset_passwordModel = new Reset_passwordModel(); // on insère
                    $insert = $reset_passwordModel->insert($data);
                    
                    
                   
                    
                     if(!empty($insert)){// si l'insertion s'est bien passé on envoie le mail
                        

                        $mail = new \PHPMailer();

                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth   = true;

                        $mail->Username   = 'groomatlantic@gmail.com';
                        $mail->Password   = 'manouche123';

                        $mail->SMTPSecure = 'ssl';
                        $mail->Port = 465;

                        $mail->SetFrom('reset.password@email.fr', 'GroomAtlantic');
                        $mail->addAddress($post['email']);
                        $mail->isHTML(true);

                        
                        //Ask for HTML-friendly debug output
                        $mail->Debugoutput = 'html';


                        $mail->Subject = 'Sujet';
                        $mail->Body = '<a href="http://localhost/Back/testgithub/groomatlantic/public/users/traitementReset?idUser=' . $userInfo['id'] . '&token=' . $token . '">Changer le mot de passe</a>';

                                  
                        if(!$mail->Send()){

                           
                            echo 'Erreur : ' . $mail->ErrorInfo;
                        }
                        else{
                                                
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
            'errors' => $errors,
            
            
             
             
        ];
        
        $this->show('users/pwdReset', $params);
         
    }


    public function traitementReset(){

        $showForm = false;
        //si les variables existent, ne sont pas vides et que l'id est composé uniquement de chiffres
        //on va chercher s'il y a une correspondance dans la bdd

        if(isset($_GET['idUser']) AND isset($_GET['token']) AND !empty($_GET['idUser']) AND !empty($_GET['token']) AND ctype_digit($_GET['idUser'])){

            $reset_passwordModel = new Reset_passwordModel();
            $matchToken = $reset_passwordModel->findToken($_GET['idUser'], $_GET['token']);


            if(count($matchToken) == 1){ // si le token correspond on affiche le formulaire

                $showForm = true;

                $post = [];
                $errors = [];
                $formValid = false;
        
        
                if(!empty($_POST)){
                    // Permet de nettoyer les données
                    foreach($_POST as $key => $value){
                        $post[$key] = trim(strip_tags($value));
                    }
                            //Verifs form
                    if(strlen($post['password']) < 5){
                        $errors[] = 'Le mail doit comporter au moins 5 caractères';
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

                        $update = $usersModel->update($data, $_GET['idUser'], $stripTags = true);

                        if(!empty($update)){

                            $formValid = true;
                        }
                    }


                      

                    //on compare vaec la table reset


        }

        $params = [
            'showForm' => $showForm,
            'formValid' => $formValid,
            
        ];


        $this->show('users/traitementReset', $params);
    }

    }
}

}   
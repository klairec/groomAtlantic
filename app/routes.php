<?php
	
$w_routes = array(
	['GET|POST', '/', 'Users#home', 'default_home'],



	['GET|POST', '/users/connect', 'Users#connect', 'connect_user'],
	['GET|POST', '/users/add', 'Users#add', 'users_add'],
	['GET|POST', '/login', 'Users#login', 'users_login'],
	['GET|POST', '/logout', 'Users#logout', 'users_logout'],


	['GET|POST', '/users/add_user', 'Users#addUser', 'add_user'],
	['GET|POST', '/users/add_groom', 'Users#addGroom', 'add_groom'],
	['GET|POST', '/users/add_owner', 'Users#addOwner', 'add_owner'],
	['GET|POST', '/users/add_role', 'Users#addRole', 'add_role'],




	/*Laisser Vide ci-dessus */



	['GET', '/users/groomProfile/showGroom', 'Users#showGroom', 'users_showgroom'],
	['GET|POST', '/users/groomProfile/changeProfile', 'Users#changeProfile', 'change_profile'],
	['GET|POST', '/users/groomProfile/deleteProfile', 'Users#deleteProfile', 'delete_profile'],
	['GET|POST', '/users/groomProfile/changePassword', 'Users#changePassword', 'change_password'],

	['GET', '/users/ownerProfile/showRentals', 'Rentals#showRentals', 'rentals_show'],
	['GET|POST', '/users/ownerProfile/addRental', 'Rentals#addRental', 'rentals_add'],
	['GET|POST', '/users/ownerProfile/changeRental', 'Rentals#changeRental', 'rentals_change'],
	['GET|POST', '/users/ownerProfile/deleteRental', 'Rentals#deleteRental', 'rentals_delete'],
    
    ['GET|POST', '/users/ownerProfile/owner_space', 'Users#showOwner', 'users_showowner'],


    ['GET|POST', '/users/Profile/addService', 'Groom#addService', 'groom_addservice'],
    ['GET|POST', '/users/Profile/showService', 'Groom_services#showService', 'groom_services_showService'],
);



<?php
	
$w_routes = array(
	['GET|POST', '/', 'Users#home', 'default_home'],



	['GET|POST', '/users/connect', 'Users#connect', 'connect_user'],
	['GET|POST', '/users/add', 'Users#add', 'users_add'],
	['GET|POST', '/login', 'Users#login', 'users_login'],
	['GET|POST', '/logout', 'Users#logout', 'users_logout'],


    
	['GET|POST', '/users/addGroom', 'Users#addGroom', 'users_addGroom'],
	['GET|POST', '/users/addOwner', 'Users#addOwner', 'users_addOwner'],
	['GET|POST', '/users/pickRole', 'Users#pickRole', 'users_pickRole'],
    ['GET|POST', '/users/pwdReset', 'Users#pwdReset', 'users_pwdReset'],
    ['GET|POST', '/users/traitementReset', 'Users#traitementReset', 'users_traitementReset'],
    ['GET|POST', '/users/infos', 'Users#infos', 'users_infos'], 
    ['GET|POST', '/searchGroom/searchResult', 'Search#searchResult', 'search_result'], 
    




	/*Laisser Vide ci-dessus */

	// ROUTES USERS
	['GET|POST', '/users/groomProfile/modifGroom', 'Users#modifProfilegroom', 'modif_groom'],


	// ROUTES PROFIL CONCIERGE
	['GET', '/users/groomProfile/showGroom', 'Users#showGroom', 'users_showgroom'],
    
	['GET|POST', '/users/groomProfile/changeProfile', 'Users#changeProfile', 'change_profile'],
	['GET|POST', '/users/groomProfile/deleteProfile', 'Users#deleteProfile', 'delete_profile'],
	['GET|POST', '/users/groomProfile/changePassword', 'Users#changePassword', 'change_password'],


	// ROUTES PROFIL PROPRIETAIRE
	['GET|POST', '/users/ownerProfile/ownerSpace', 'Users#showOwner', 'users_showowner'],
	['GET|POST', '/users/ownerProfile/rentalsChange/[:id]/', 'Rentals#changeRental', 'rentals_change'],
	['GET|POST', '/users/ownerProfile/deleteRental/[:id]/', 'Rentals#deleteRental', 'rentals_delete'],
    
    


    ['GET|POST', '/users/Profile/addService', 'Groom#addService', 'groom_addservice'],
    ['GET|POST', '/users/Profile/showService', 'Groom_services#showService', 'groom_services_showService'],


	['GET|POST', '/infos/infosPratiques', 'Infos#infosPratiques', 'infos_infospratiques'],
	['GET|POST', '/infos/charteDeQualite', 'Infos#CharteQualite', 'infos_chartequalite'],
);



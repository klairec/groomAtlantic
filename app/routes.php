<?php
	
$w_routes = array(
	['GET', '/', 'Default#home', 'default_home'],

	['GET|POST', '/users/add', 'Users#add', 'users_add'],
	['GET|POST', '/login', 'Users#login', 'users_login'],
	['GET', '/logout', 'Users#logout', 'users_logout'],

	['GET', 'users/Profile/showProfile', 'Users#showProfile', 'show_profile'],
	['GET|POST', 'users/Profile/changeProfile', 'Users#changeProfile', 'change_profile'],
	['GET|POST', 'users/Profile/deleteProfile', 'Users#deleteProfile', 'delete_profile'],
	['GET|POST', 'users/Profile/changePassword', 'Users#changePassword', 'change_password'],

	['GET', 'users/ownerProfile/showRentals', 'Rentals#showRentals', 'rentals_show'],
	['GET|POST', 'users/ownerProfile/addRental', 'Rentals#addRental', 'rentals_add'],
	['GET|POST', 'users/ownerProfile/changeRental', 'Rentals#changeRental', 'rentals_change'],
	['GET|POST', 'users/ownerProfile/deleteRental', 'Rentals#deleteRental', 'rentals_delete'],


    ['GET|POST', 'users/Profile/addService', 'Groom#addService', 'groom_addservice'],

);

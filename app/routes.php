<?php
	
$w_routes = array(
	['GET', '/', 'Default#home', 'default_home'],

	['GET|POST', '/users/add', 'Users#add', 'users_add'],
	['GET|POST', '/login', 'Users#login', 'users_login'],
	['GET', '/logout', 'Users#logout', 'users_logout'],

	['GET', '/ownerProfil/showRentals', 'Rentals#show', 'rentals_show'],
	['GET|POST', '/ownerProfil/addRental', 'Rentals#add', 'rentals_add'],
	['GET|POST', '/ownerProfil/changeRental', 'Rentals#change', 'rentals_change'],
	['GET|POST', '/ownerProfil/deleteRental', 'Rentals#delete', 'rentals_delete'],

    ['GET|POST', '/groomProfil/showProfileGroom', 'Groom#ShowProfile', 'groom_showprofile'],
	['GET|POST', '/groomProfil/changeProfileGroom', 'Groom#ChangeProfile', 'groom_changeprofile'],
	['GET|POST', '/groomProfil/deleteProfileGroom', 'Groom#DeleteProfile', 'groom_deleteprofile'],
    ['GET|POST', '/groomProfil/addServiceGroom', 'Groom#AddService', 'groom_addservice'],

);

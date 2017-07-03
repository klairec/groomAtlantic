<?php
	
$w_routes = array(
	['GET', '/', 'Default#home', 'default_home'],

	['GET|POST', '/users/add_user', 'Users#addUser', 'add_user'],
	['GET|POST', '/users/add_groom', 'Users#addGroom', 'add_groom'],
	['GET|POST', '/users/add_owner', 'Users#addOwner', 'add_owner'],







	['GET|POST', '/login', 'Users#login', 'users_login'],
	['GET', '/logout', 'Users#logout', 'users_logout'],

	['GET|POST', '/blog/add', 'Blog#add', 'blog_add'],
	['GET|POST', '/blog/list', 'Blog#listAll', 'blog_list'],


	['GET', '/chat/', 'Tchat#tchatRead', 'chat_view'], // Visualiation des messages + formulaire
	['GET|POST', '/chat/ajax/add', 'Tchat#tchatAjaxAdd', 'chat_add'], // Ajout d'un message via Ajax
	['GET|POST', '/chat/ajax/list', 'Tchat#tchatAjaxList', 'chat_list'], // Récupération des messages via Ajax
);

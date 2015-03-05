<?php
	/*header('Location: http://www.google.com');*/
	set_include_path('controllers;models;configs;views;'.get_include_path());
	spl_autoload_register(function($className){
		include($className.'.class.php');
	});



	include('configs/routes.php');

	$routeParts=explode('/',$routes['default']);

	$a  = isset($_REQUEST['a'])?$_REQUEST['a']:$routeParts[0];

	$e  = isset($_REQUEST['e'])?$_REQUEST['e']:$routeParts[1];

	$route=$a.'/'.$e;

	if(!in_array($route,$routes)){
		die('Vous essyaez de joindre une ressource qui n existe pas');
	}
	

	/*include('controllers/'.$e.'.php');*/
	$controllerName = 'C_'.ucfirst($e);
	$controller = new $controllerName;
	$data = call_user_func([$controller,$a]);	
	include('views/layout.php');
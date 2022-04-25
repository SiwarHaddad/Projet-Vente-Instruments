<?php 
	// var_dump($_GET);
	// die();
	//controller
    if(isset($_GET['controller']))
		$Controller = $_GET['controller'].'Controller';
	else 
		$Controller = 'CategorieController';

    //action    
	if(isset($_GET['action']))
		$Action = $_GET['action'];
	else
		$Action = 'All';

	require_once 'Controller/'.$Controller.'.php';
	$Controller::$Action();
?>
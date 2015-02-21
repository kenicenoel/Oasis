<?php
	include_once ("includes/authenticate.php");
	
	session_start();
	if(!isset($_SESSION['userId']))
	{
		header("Location:index.php");
	}

	else
	{
		$loggedInUser=$_SESSION['userId'];
	}

	echo '<Doctype html>';
	echo '<html>';
	echo	'<head>';
	echo		'<title>OASIS Apartment Finder</title>';
	echo 		'<link rel = "stylesheet" href = "css/management.css" type ="text/css">';
	echo 		'<link href="http://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css">';
	echo 		'<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300" rel="stylesheet" type="text/css">';



	echo	'</head>';
	echo 		'<a id ="menu" title="Click to toggle menu" href="#">Show Menu</a>';
	echo 		'<a class ="toggle"href="#" title="Logged in user">Logged in as '. $loggedInUser .'</a>';
	echo '<nav id ="navigation">';


	echo 		'<a class ="link" href ="#" title = "Change things like your name, theme color and contact info">Update my profile</a>';
	echo 		'<a class ="link" href ="#" title = "Listings you like are managed here">Favourites</a>';
	echo 		'<a class ="link" href ="system.php" title = "Look for more listings">New search</a>';
	echo 		'<a class ="link" href ="logout.php" title = "Exit OASIS">Sign out</a>';



	echo '</nav>';



?>

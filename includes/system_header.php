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

	echo '<Doctype html>
	 <html>
		<head>
			<title>OASIS Apartment Finder</title>
	 		<link rel = "stylesheet" href = "css/management.css" type ="text/css">
	 		<link href="http://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css">
	 		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300" rel="stylesheet" type="text/css">



		</head>
		<span id="sticky">
			<a id ="menu" title="Click to toggle menu" href="#">&#9776; Menu</a>
			<a class ="toggle"href="#" title="Logged in user">Logged in as '. $loggedInUser .'</a>
		</span>

			<body>
			<nav id ="navigation">


			<img src="images/sprites/id-card.png"/><a class ="link" href ="#" title = "Change things like your name, theme color and contact info">Account</a>
			<img src="images/sprites/favourite.png"/><a class ="link" href ="#" title = "Listings you like are managed here">Favourites</a>
			<img src="images/sprites/search-find.png"/><a class ="link" href ="system.php" title = "Look for more listings">New search</a>
			<img src="images/sprites/cancel.png"/><a class ="link" href ="logout.php" title = "Exit OASIS">Sign out</a>



	 </nav>';



?>

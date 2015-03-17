<?php
	require_once ("includes/authenticate.php");
	require_once ("includes/common.php");

	session_start();

	if(!isset($_SESSION['userId']))
	{
		header("Location:index.php");
	}

	else
	{
		if($_SESSION['fullName'] == "")
		{
			$loggedInUser = $_SESSION['userId'];
		}
		else
		{
			$loggedInUser=$_SESSION['fullName'];
		}

	}

?>
	<Doctype html>
	 <html>
		<head>
			<title>OASIS - Accomodation Finder</title>
	 		<link rel = "stylesheet" href = "css/management.css" type ="text/css">

			<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
	 		<link href="http://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css">
	 		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300" rel="stylesheet" type="text/css">

			<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />


<link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />



		</head>
		<span id="sticky">
			<img id ="menu" src="images/sprites/menu.png" /><p class = "menu">Menu</p>
			<p class ="toggle">Logged in as <?php echo $loggedInUser ?> </p>
		</span>

			<body>
			<nav id ="navigation">

				<p id="start"><img src="images/sprites/house-08.png"/>SAS OASIS</p>
			<img src="images/sprites/id-card.png"/><a class ="link" href ="#" title = "Change things like your name, theme color and contact info">Account</a>
			<img src="images/sprites/favourite.png"/><a class ="link" href ="#" title = "Listings you like are managed here">Favourites</a>
			<img src="images/sprites/search-find.png"/><a class ="link" href ="system.php" title = "Look for more listings">New search</a>
			<img src="images/sprites/cancel.png"/><a class ="link" href ="logout.php" title = "Exit OASIS">Sign out</a>



	 </nav>

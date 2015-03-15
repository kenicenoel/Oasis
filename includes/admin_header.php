<?php
	require_once ("includes/authenticate.php");
	require_once ("includes/common.php");
?>



	<Doctype html>
				<html>
					<head>
						<title>Oasis: Dashboard</title>
						<link rel = "stylesheet" href = "css/management_child.css" type ="text/css">
						<link type="text/css" rel="stylesheet" href="css/overlaypopup.css" />
						<link href="http://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css">
						<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300" rel="stylesheet" type="text/css">
						
					</head>

					<body>
						<nav id ="navigation">
							<p id="start"><img src="images/sprites/house-08.png"/>SAS OASIS</p>
							<img src="images/sprites/overview.png"/><a class ="link" href ="?module=overview" title = "View an overview of the system">Overview</a>
							<img src="images/sprites/search-find.png"/><a class ="link" href ="?module=lookup" title = "Search for any user data">Lookup</a>
							<img src="images/sprites/user-05.png"/><a class ="link" href ="?module=user" title = "Manage users of the system">Users</a>
							<img src="images/sprites/home-loan.png"/><a class ="link" href ="?module=listings" title = "Manage or add listings in oasis">Listings</a>
							<img src="images/sprites/man-03.png"/><a class ="link" href ="?module=landlords" title = "Manage or add a new landlord">Landlords</a>
							<img src="images/sprites/cancel.png"/><a class ="link" href ="logout.php" title = "Exit OASIS">Leave</a>

						</nav>

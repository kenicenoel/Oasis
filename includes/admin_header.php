<?php
	include_once ("includes/authenticate.php");
	include_once ("includes/common.php") ?>

	<Doctype html>
				<html>
					<head>
						<title>Admin Center - OASIS</title>
						<link rel = "stylesheet" href = "css/management_child.css" type ="text/css">
						<link type="text/css" rel="stylesheet" href="css/overlaypopup.css" />

						<link href="http://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css">
						<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300" rel="stylesheet" type="text/css">
					</head>

					<body>
						<nav id ="navigation">
							<p id="start">Quick Links</p>
							<img src="images/sprites/overview.png"/><a class ="link" href ="?module=overview" title = "View an overview of the system">Overview</a>
							<img src="images/sprites/user-05.png"/><a class ="link" href ="?module=user" title = "Manage users of the system">Users</a>
							<img src="images/sprites/home-loan.png"/><a class ="link" href ="?module=listings" title = "Manage or add listings in oasis">Listings</a>
							<img src="images/sprites/man-03.png"/><a class ="link" href ="?module=landlords" title = "Manage or add a new landlord">Landlords</a>
							<img src="images/sprites/cancel.png"/><a class ="link" href ="logout.php" title = "Exit OASIS">Leave</a>

						</nav>

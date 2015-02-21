<?php
	include_once ("includes/authenticate.php");

	echo '<Doctype html>
				<html>
					<head>
						<title>Admin Center - OASIS</title>
						<link rel = "stylesheet" href = "css/management_child.css" type ="text/css">
						<link rel = "stylesheet" href = "../css/management_child.css" type ="text/css">
						<link href="http://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css">
						<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300" rel="stylesheet" type="text/css">



					</head>
					<a id ="menu" title="Click to toggle menu" href="#">&#9776; Menu</a>
					<a class ="toggle"href="#" title="Logged in user">Administrative Mode</a>
					<nav id ="navigation">

						<img src="images/sprites/user-modify.png"/><a class ="link" href ="#" title = "Manage users of the system">Users</a>
						<img src="images/sprites/home-loan.png"/><a class ="link" href ="#" title = "Manage or add listings in oasis">Listings</a>
						<img src="images/sprites/business-man.png"/><a class ="link" href ="system.php" title = "Manage or add a new landlord">Landlords</a>
						<img src="images/sprites/logout.png"/><a class ="link" href ="logout.php" title = "Exit OASIS">Leave</a>

				</nav>';



?>

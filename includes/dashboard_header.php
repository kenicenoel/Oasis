<?php
	require_once ("../includes/authenticate.php");
	require_once ("../includes/common.php");
?>



	<!Doctype html>
				<html>
					<head>
						<title>OASIS: Dashboard</title>
						<link rel = "stylesheet" href = "../css/admin_styles.css" type ="text/css">
						<link type="text/css" rel="stylesheet" href="../css/overlaypopup.css" />
						<link href="http://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css">
						<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300" rel="stylesheet" type="text/css">
						<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">



					</head>

					<body>
						<nav id ="navigation">
							<p id="start"><img src="../images/sprites/house-08.png"/>SAS OASIS</p>
							<a class ="link" href ="?module=overview" title = "View an overview of the system"><i class="fa fa-bar-chart fa-fw"></i> Overview</a>
							<a class ="link" href ="?module=lookup" title = "Search for any user data"><i class="fa fa-search fa-fw"></i> Lookup</a>
							<a class ="link" href ="?module=user" title = "Manage users of the system"><i class="fa fa-user fa-fw"></i> Users</a>
							<a class ="link" href ="?module=listings" title = "Manage or add listings in oasis"><i class="fa fa-building fa-fw"></i> Listings</a>
							<a class ="link" href ="?module=landlords" title = "Manage or add a new landlord"><i class="fa fa-male fa-fw"></i> Landlords</a>
							<a class ="link" href ="logout.php" title = "Exit OASIS"><i class="fa fa-sign-out fa-fw"></i> Exit</a>

						</nav>

<?php
	require_once ("../includes/authenticate.php");
	require_once ("../includes/common.php");

	session_start();

	if(!isset($_SESSION['studentNumber']))
	{
		header("Location:../index.php");
	}

	else
	{

			$loggedInUser=$_SESSION['fullName'];


	}

?>
	<Doctype html>
	 <html>
		<head>
			<title>OASIS - Accomodation Finder</title>
	 		<link rel = "stylesheet" href = "../css/management.css" type ="text/css">
			<link rel="stylesheet" href="../fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
	 		<link href="http://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css">
	 		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300" rel="stylesheet" type="text/css">
			<link href="../css/iconFont.min.css" rel="stylesheet">

			<!-- Optionally add helpers - button, thumbnail and/or media -->
			<link rel="stylesheet" href="../fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />
			<link rel="stylesheet" href="../fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />

			<!-- DataTables CSS -->
			<link rel="stylesheet" type="text/css" href="../datatables/media/css/jquery.dataTables.css">



		</head>
			<body>
			<nav id ="navigation">
				<p id="start"><img src="../images/sprites/house-08.png"/>SAS OASIS</p>
				<a class ="link" href ="#" title = "Change things like your name, theme color and contact info"><i class="icon-address-book on-left"></i> Profile</a>
				<!-- <a class ="link" href ="#" title = "Listings you like are managed here"><i class="icon-heart on-left"></i> Favourites</a> -->
				<a class ="link" href ="oasis.php" title = "Look for more listings"><i class="icon-search on-left"></i> New search</a>
				<a class ="link" href ="../logout.php" title = "Exit OASIS"><i class="icon-exit on-left"></i> Sign out</a>
				<p class ="toggle">Logged in as <?php echo $loggedInUser ?> </p>



	 </nav>

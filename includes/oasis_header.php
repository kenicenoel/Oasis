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

			$_SESSION['fullName'];
			$studentNumber=$_SESSION['studentNumber'];


	}

?>
	<Doctype html>
	 <html>
		<head>
			<title>OASIS - Accomodation Finder</title>
	 		<link rel = "stylesheet" href = "../css/oasis_styles.css" type ="text/css">
			<link rel = "stylesheet" href = "../css/navigation_styles.css" type ="text/css">
			<link rel="stylesheet" href="../fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
	 		<link href="http://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css">
	 		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300" rel="stylesheet" type="text/css">
			<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">


			<!-- Optionally add helpers - button, thumbnail and/or media -->
			<link rel="stylesheet" href="../fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />
			<link rel="stylesheet" href="../fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />

			<meta name = "viewport" content ="width=device-width, initial-scale=1">



		</head>
			<body>
			<!-- <nav id ="navigation"> -->
				<!-- <p id="start"><img src="../images/sprites/house-08.png"/>SAS OASIS</p> -->
				<!-- <a class ="link" href ="../system/profile_edit.php" title = "Change things like your name, theme color and contact info"><i class="fa fa-photo fa-fw"></i> Profile</a> -->
				<!-- <a class ="link" href ="#" title = "Listings you like are managed here"><i class="icon-heart on-left"></i> Favourites</a> -->
				<!-- <a class ="link" href ="oasis.php" title = "Look for more listings"><i class="fa fa-search fa-fw"></i> Find a listing</a> -->
				<!-- <a class ="link" href ="../logout.php" title = "Exit OASIS"><i class="fa fa-sign-out fa-fw"></i> Sign out</a> -->


	 <!-- </nav> -->


	<nav id="menu-wrap">

		<!-- EACH <ul> TAG BEGINS A NEW MENU LEVEL -->
		<ul id = "menu">
			<li><p id="name"><img src="../images\sprites\house.png" alt="house" />OASIS</p></li>
			<!-- <li><a href="#"><span class="fa fa-home fa-fw"></span> Home</a></li> -->
			<li><a href="oasis.php"><span class="fa fa-search fa-fw"></span> Find a listing</a></li>
			<li><a href="#"><span class="fa fa-gear fa-fw"></span> Settings</a>
					<ul>
						<li><a href="profile_edit.php"><span class="fa fa-male fa-fw"></span> Update Profile</a>
						</li>  <!-- End Account Submenu -->
						<li><a href="#"><span class="fa fa-magic fa-fw"></span>Accent color</a></li>
					</ul>

			</li> <!-- End Settings Submenu -->
			<li><a href="../logout.php"><span class="fa fa-sign-out fa-fw"></span>Logout</a></li>
			<li><p id="loggedInUser"><span class="fa fa-user fa-fw"></span><?php echo $_SESSION['fullName'] . "&nbsp;" ; ?></p></li>

		</ul>
		<!-- END NAVIGATION -->
	</nav>

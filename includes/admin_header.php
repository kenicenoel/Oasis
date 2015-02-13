<?php
	

	echo '<Doctype html>';
	echo '<html>';
	echo	'<head>';	
	echo		'<title>Admin Center - OASIS</title>';
	echo 		'<link rel = "stylesheet" href = "css/management_child.css" type ="text/css">';
	echo 		'<link rel = "stylesheet" href = "../css/management_child.css" type ="text/css">';
	echo 		'<link href="http://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css">';
	echo 		'<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300" rel="stylesheet" type="text/css">';

	

	echo	'</head>';
	echo 		'<a id ="menu" title="Click to toggle menu" href="#">Show Menu</a>';
	echo 		'<a class ="toggle"href="#" title="Logged in user">Administrative Mode</a>';
	echo '<nav id ="navigation">';
	
	
	echo 		'<a class ="link" href ="#" title = "Add, delete or change user info">User management</a>';
	echo 		'<a class ="link" href ="#" title = "Listings you like are managed here">Listing management</a>';
	echo 		'<a class ="link" href ="system.php" title = "Look for more listings">Landlord management</a>';
	echo 		'<a class ="link" href ="logout.php" title = "Exit OASIS">Sign out</a>';
	
	
	
	echo '</nav>';



?>

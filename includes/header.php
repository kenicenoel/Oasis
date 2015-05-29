<?php
		require_once("includes/authenticate.php");
		session_start();

		if(isset($_SESSION['studentNumber']))
		{
			header("Location:system/oasis.php");
		}


		 ?>
	<Doctype html>
		<html>
			<head>
				<title>Welcome to OASIS</title>
				<link rel = "stylesheet" href = "css/main.css" type ="text/css">
		 		<link rel = "stylesheet" href = "font-awesome/css/font-awesome.min.css" type ="text/css">
		 		<link href="http://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css">
		 		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300" rel="stylesheet" type="text/css">
			</head>

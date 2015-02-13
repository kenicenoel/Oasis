<?php
	include_once('config.php');

	//set the username and password from form values
	$userId = $_POST['userId'];
	$password = $_POST['password'];


	// BUild the query
	$sql = "SELECT userID FROM users WHERE userId = ? AND password=?";
	
	//prepare the sql statement
	$stmt = $connection->prepare($sql);

	// bind variables to the paramenters ? present in sql
	$stmt->bind_param('is', $userId, $password);

	//execute the prepared statement
	$stmt->execute();

	//bind the results ($id corresponds to the items we are selecting)
	$stmt->bind_result($id);

	if($stmt->fetch()) 
	{
		/* set the cache limiter to 'private' */

		session_cache_limiter('private');
		$cache_limiter = session_cache_limiter();

		/* set the cache expire to 15 minutes */
		session_cache_expire(15);
		$cache_expire = session_cache_expire();
		// create a new session
		session_start();

		$_SESSION['userId'] = $userId;
		header("Location:../system.php"); 

		
	}
	

	else
	{
		echo '
		    <script language="javascript" type="text/javascript">
				window.location.href="../index.php?error=1";
			</script>'
			;
	}
	$connection->close();





?>
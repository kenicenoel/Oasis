<?php

		function connect()
		{
			//Connection to the MySQL Server
	    define('DB_SERVER', 'localhost'); // Mysql hostname, usually localhost
	    define('DB_USERNAME', 'root');    // Mysql username
	    define('DB_PASSWORD', 'afrique'); // Mysql password
	    define('DB_DATABASE', 'oasisdb'); // Mysql database name

	    // create new mysqli object
	    $connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	    if ($connection->connect_error)
	    {
	      die("Connection failed: " . $connection->connect_error);
	    }

	    return $connection;
		}

		function countTotal($tableName)
		{
			$connection = connect();
			$table = $tableName;

			// Build the query
      $sql = "SELECT userId FROM ".$table;

      //prepare the sql statement
      $stmt = $connection->prepare($sql);

      //execute the prepared statement
      $stmt->execute();

			/* store result */
	    $stmt->store_result();

			return $stmt->num_rows;

			/* Close statement */
			$stmt ->close();

			$connection->close();


		}

		function getLastAddedUser()
		{
			$connection = connect();
			// Build the query
      $sql = "SELECT firstName, lastName FROM users ORDER BY modified DESC LIMIT 1";

      // prepare the sql statement
      $stmt = $connection->prepare($sql);

      // execute the prepared statement
      $stmt->execute();

			/* store result */
	    $stmt->store_result();

			/* Bind the results to variables */
			$stmt->bind_result($fname, $lname);

			/* Fetch the results and operate on them */
			if($stmt->fetch())
			{
				$name = $fname. " " . $lname;
				return $name;

				/* Close statement */
				$stmt ->close();
			}

		}

	function overview()
	{
		$userTotal = call_user_func('countTotal', 'users');
		$lastUser = call_user_func('getLastAddedUser');

			echo '
			<!-- The overview of the system -->
			<div id="content">
				<header class ="modulename"> System Overview </header>
				<hr>

						<section id="tile">
						<p class="summary">
								There are a total of '. $userTotal .' users in Oasis.
						</p>
						</section>

						<section id="tile">
						<p class="summary">
								The last user modified was '. $lastUser .'.
						</p>
						</section>


			</div>

			';


	}

	function user()
	{
		echo '
		<!-- The user div containing tiles -->
		<div id="content">
			<header class ="modulename"> User options </header>
			<hr>
			<section id="tile" class="show-popup" href="#" data-showpopup="1">
				<p class = "summary">
					Add new user
				</p>

			</section>

			<section id="tile" class="show-popup" href="#" data-showpopup="2">
				<p class="summary">
					Modify user details
				</p>

			</section>
		</div> ';
	}


	function listings()
	{
		echo '
		<!-- The listings div containing tiles -->
		<div id="listings" class="tile-container">
			<header class="modules"> Listings </header>

			<section id="tile" class="show-popup" href="#" data-showpopup="3">
				<p class="show-popup" href="#" data-showpopup="1">Add new Listing</a></p>

			</section>

			<section id="tile" class="show-popup" href="#" data-showpopup="4">
				<p>Modify listing</p>

			</section>

		</div>';


	}





?>

<?php

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




		function countTotal($tableName)
		{
			global $connection;
			$table = $tableName;

			// Build the query
      $sql = "SELECT * FROM ".$table;

      //prepare the sql statement
      $stmt = $connection->prepare($sql);

      //execute the prepared statement
      $stmt->execute();

			/* store result */
	    $stmt->store_result();

			$total = $stmt->num_rows;

			if($total == 0) { return 0;}

			else
			{
				return $total;}


			/* Close statement */
			$stmt->close();

			$connection->close();


		}

		function getLastAddedUser()
		{
			global $connection;
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

		function getLastAddedLandlord()
		{
			global $connection;
			// Build the query
      $sql = "SELECT firstName, lastName FROM landlord";


      // prepare the sql statement
      $stmt = $connection->prepare($sql);

      // execute the prepared statement
      $stmt->execute();

			$last = $stmt->insert_id;

			$sql = "SELECT firstName, lastName FROM landlord WHERE ".$last."=landlordNumber";

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
			$listingTotal = call_user_func('countTotal', 'listing');
			$landlordTotal = call_user_func('countTotal', 'landlord');
			$lastUser = call_user_func('getLastAddedUser');
			$lastLandlord = call_user_func('getLastAddedLandlord');

				echo '
				<!-- The overview of the system -->
				<div id="content">
					<header class ="modulename"> System Overview </header>
					<hr>
					<header class ="modules"> By the numbers </header>
							<section id="tile-group1">
							<p class="summary">
									There are a total of '. $userTotal .' users in Oasis.
							</p>
							</section>

							<section id="tile-group1">
							<p class="summary">
									There are a total of '. $listingTotal .' listings in Oasis.
							</p>
							</section>

							<section id="tile-group1">
							<p class="summary">
									There are a total of '. $landlordTotal .' landords in Oasis.
							</p>
							</section>

							<header class ="modules"> Last updated </header>
							<section id="tile-group2">
							<p class="summary">
									The last user modified was '. $lastUser .'.
							</p>
							</section>

							<section id="tile-group2">
							<p class="summary">
									The last added landlord is '. $lastLandlord .'.
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

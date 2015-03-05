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



		/* The countTotal, getLastAddedUser, getLastAddedLandlord functions
			are all system overview functions that do the job their name implies
		*/

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


		/* The overview, user, listings and landlord functions are what generates
			the content for each individual module e.g User Module or listing module.
		*/

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
				<header class ="modulename"> User Management </header>
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

				<section id="tile" class="show-popup" href="#" data-showpopup="3">
					<p class="summary">Remove a user</p>

				</section>
			</div> ';
		}

		function listings()
		{
			echo '
			<!-- The listings div containing tiles -->
			<div id="content">
				<header class="modulename"> Listing Management </header>
				<hr>
				<section id="tile" class="show-popup" href="#" data-showpopup="4">
					<p class="summary">
						Add new Listing
					</p>

				</section>

				<section id="tile" class="show-popup" href="#" data-showpopup="5">
					<p class="summary">
						Modify listing details
					</p>

				</section>

				<section id="tile" class="show-popup" href="#" data-showpopup="6">
					<p class="summary">
						Remove a listing
					</p>

				</section>

			</div>';


		}

		function landlords()
		{
			echo '
			<!-- The landlord div containing tiles -->
			<div id="content">
				<header class="modulename"> Landlord Management </header>
				<hr>
				<section id="tile" class="show-popup" href="#" data-showpopup="7">
					<p class="summary">Add new Landlord</a></p>

				</section>

				<section id="tile" class="show-popup" href="#" data-showpopup="8">
					<p class="summary">Modify landlord details</p>

				</section>

				<section id="tile" class="show-popup" href="#" data-showpopup="9">
					<p class="summary">Remove a landlord</p>

				</section>

			</div>';


		}


		/* The functions here are called to do the tasks that the overlay functions
		 	(located later in this php file) need to do
		*/

		function addUser($data)
		{

			global $connection;
			if(isset($data['userId']) && isset($data['password']))
			{


				//set the username and password from form values
				$userId = $data['userId'];
				$password = $data['password'];

				// Build the query
				$sql = "SELECT userID FROM users WHERE userId = ?";

				//prepare the sql statement
				$stmt = $connection->prepare($sql);

				// bind variables to the paramenters ? present in sql
				$stmt->bind_param('i', $userId);

				//execute the prepared statement
				$stmt->execute();

				//bind the results ($id corresponds to the items we are selecting)
				$stmt->bind_result($id);

				if($stmt->fetch())
				{

					echo '<script type="text/javascript">
									window.location.href="?addUser=false";
								</script>';

					$stmt->close();
					$connection->close();


				}

				else
				{


					$sql = "INSERT INTO users(userId, password, firstName, lastName, email, phoneNumber, address)
								VALUES(?,?,?,?,?,?,?)";

								//prepare the sql statement
								$stmt = $connection->prepare($sql);

								// bind variables to the paramenters ? present in sql
								$stmt->bind_param('issssss', $userId, $password, $firstName, $lastName, $email, $phoneNumber, $address);

								//set the variables from form values
								$userId = $data['userId'];
								$password = $data['password'];
								$firstName = $data['firstName'];
								$lastName = $data['lastName'];
								$email = $data['email'];
								$phoneNumber = $data['phoneNumber'];
								$address = $data['address'];

								//execute the prepared statement
								$stmt->execute();

								echo '<script type="text/javascript">
												var p = document.getElementById("errorMessage");
												var msg = "Great! Added new user '.$data["firstName"].'";
												p.innerHTML=msg;
											</script>';

								$stmt->close();
								$connection->close();

				}

			}

			else
			{
				echo '
				<script type="text/javascript">
					var p = document.getElementById("errorMessage");
					var msg = "Sorry, could not add user";
					p.innerHTML=msg;
				</script> ';
			}
		}















		/* The following functions are responsible for
			generating the content of the overlay popups that are shown
			when clicking the tiles on the dashboard for each module */

		function addUserOverlay()
		{
			echo '
			<div class="overlay-content popup1">
			  <section id ="content2 class=left">
			    <header>Add a new user to OASIS  </header>
					<p id="errorMessage"></p>
			    <form method = "post" action = "'.call_user_func("addUser", $_POST).'">

			          <label for="userId">Student ID#</label>
			          <input type = "text" id = "userId" name="userId" required autofocus/> <br>

			          <label for="userPass">Password</label>
			          <input type = "text" id = "userPass" name="password" required /> <br>

			          <label for="firstName">First Name</label>
			          <input type = "text" id = "firstName" name="firstName" /> <br>

			          <label for="lastName">Last Name</label>
			          <input type = "text" id = "lastName" name="lastName" /> <br>

			          <label for="email">Email address</label>
			          <input type = "text" id = "email" name="email" /> <br>

			          <label for="phoneNumber">Phone Number</label>
			          <input type = "text" id = "phoneNumber" name="phoneNumber" /> <br>

			          <label for="address">Address</label>
			          <input type = "text" id = "address" name="address" /> <br>

			          <input type = "submit" value="Add" />
								<p class="footnote"> Note: The student number and password are required. </p>

			      </form>



			</div>';

		}




?>

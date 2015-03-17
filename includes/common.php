<?php

		require_once dirname(__FILE__) .'/config.php';

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

		function getLastModifiedUser()
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

		function getLastAddedUser()
		{
			global $connection;
			// Build the query
      $sql = "SELECT firstName, lastName FROM users";


      // prepare the sql statement
      $stmt = $connection->prepare($sql);

      // execute the prepared statement
      $stmt->execute();

			$last = $stmt->insert_id;

			$sql = "SELECT firstName, lastName FROM users WHERE ".$last."=uid";

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
			$lastModifiedUser = call_user_func('getLastModifiedUser');
			$lastAddedUser = call_user_func('getLastAddedUser');
			$lastLandlord = call_user_func('getLastAddedLandlord');

				echo '
				<!-- The overview of the system -->
				<div id="content">
					<header class ="modulename"> System Overview </header>

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
									The last user modified was '. $lastModifiedUser .'.
							</p>
							</section>

							<section id="tile-group2">
							<p class="summary">
									The last added user is '. $lastAddedUser .'.
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

				<section id="tile" class="show-popup" href="#" data-showpopup="1">
					<p class = "summary">
						Add new

					</p>
					<img src ="images/sprites/add.png" />

				</section>

				<section id="tile" class="show-popup" href="#" data-showpopup="2">
					<p class="summary">
						Modify
					</p>
					<img src ="images/sprites/edit.png" />

				</section>

				<section id="tile" class="show-popup" href="#" data-showpopup="3">
					<p class="summary">
						Remove

					</p>
					<img src ="images/sprites/delete.png" />

				</section>
			</div> ';
		}

		function listings()
		{
			echo '
			<!-- The listings div containing tiles -->
			<div id="content">
				<header class="modulename"> Listing Management </header>

				<section id="tile" class="show-popup" href="#" data-showpopup="4">
					<p class="summary">
						Add new
					</p>
					<img src ="images/sprites/add.png" />

				</section>

				<section id="tile" class="show-popup" href="#" data-showpopup="5">
					<p class="summary">
						Modify
					</p>
					<img src ="images/sprites/edit.png" />

				</section>

				<section id="tile" class="show-popup" href="#" data-showpopup="6">
					<p class="summary">
						Remove
					</p>
					<img src ="images/sprites/delete.png" />

				</section>

			</div>';


		}

		function lookup()
		{
			echo '
			<!-- The lookup div -->
			<div id="content">
				<header class="modulename"> Information Lookup </header>

				<header class = "modules">What do you want to look for?</header>


				<br>
				<br>
				<input id="query" type = "text" name="query" placeholder = "Your search query goes here" /><input id="lookupButton" type="submit" value="Lookup">

				<div id = "data">

				</div>



			</div>';
		}

		function landlords()
		{
			echo '
			<!-- The landlord div containing tiles -->
			<div id="content">
				<header class="modulename"> Landlord Management </header>

				<section id="tile" class="show-popup" href="#" data-showpopup="7">
					<p class="summary">
						Add new
					</p>
					<img src ="images/sprites/add.png" />

				</section>

				<section id="tile" class="show-popup" href="#" data-showpopup="8">
					<p class="summary">
						Modify
					</p>
					<img src ="images/sprites/edit.png" />

				</section>

				<section id="tile" class="show-popup" href="#" data-showpopup="9">
					<p class="summary">
						Remove
					</p>
					<img src ="images/sprites/delete.png" />

				</section>

			</div>';


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

			    <form id="user" class="add" method = "post" action = "includes/tasks/adduser.php">
								<p id="errorMessage"></p>
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

			          <input id="submit" type = "submit" value="Add" />
			      </form>



			</div>';

		}


		function addListingOverlay()
		{

			global $connection;
			// Build the query



			/* Fetch the results and operate on them */


			echo '
			<div class="overlay-content popup4">
			  <section id ="content2 class=left">
			    <header>Add a new listing to OASIS </header>

			    <form id="listing" enctype="multipart/form-data" method = "post" action = "includes/tasks/addlisting.php">
								<p id="errorMessage"></p>
			          <label for="landlord">Landlord</label>

								<select form="listing" name="landlordNumber" required>
									<option disabled selected>Landlords</option>';
								$sql = "SELECT landlordNumber, firstName, lastName FROM landlord ORDER BY firstName ASC";

								// prepare the sql statement
								$stmt = $connection->prepare($sql);

								// execute the prepared statement
								$stmt->execute();

								/* store result */
								$stmt->store_result();

								/* Bind the results to variables */
								$stmt->bind_result($landlordNumber, $firstName, $lastName );
								while ($stmt->fetch())
									{

											echo '<option value="'.$landlordNumber.'">'.$firstName." ". $lastName .'</option>';
									}

									/* Close statement */
								$stmt ->close();
								echo '</select><br>
								<textarea rows="10" cols="70" form="listing" id = "description" name="description" required placeholder = "Enter details for this listing here e.g Included ammenities, appliancies etc ">
								</textarea> <br>

								<label for="type">Type</label>
								<select form="listing" name="type" required> <br>
									<option disabled selected>Type</option>
									<option value = "Room">Room</option>
									<option value = "Apartment">Apartment</option>
									<option value = "House">House</option>
									<option value = "Studio">Studio</option>
									<option value = "Shared Room">Shared Room</option>
									<option value = "Dorm">Dorm</option>

								</select><br>

			          <label for="address">Address</label>
			          <input type = "text" id = "address" name="address" /><br>

			          <label for="price">Price</label>
			          <input type = "text" id = "price" name="price" /> <br>

			          <label for="images">Images (up to 10)</label>
			          <input type = "file" id = "images" name="images[]" accept=".jpg" multiple> <br>
								<input id="upload" type = "submit" value="Add" />

			      </form>



			</div>';

		}



?>

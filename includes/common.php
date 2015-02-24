<?php include_once("includes/authenticate.php");
	function setUpPagination($min, $max)
	{
			$conn       = dbConnect();
	    $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 25;
	    $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
	    $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
	    $query      = "SELECT landlord.lastName AS lanlord, listing.type, listing.address, lisiting.price WHERE landlord.landlordNumber = listing.landlordNumber AND price >=".$min." AND price<=".$max;

	    $Paginator  = new Paginator( $conn, $query );

	    $results    = $Paginator->getData( $page, $limit );

	}

		function countTotal($tableName)
		{
			$table = $tableName;
			$mysqli = dbConnect();
			$mysqli->real_query("SELECT userId FROM ".$table);

			if ($mysqli->field_count)
			{
					/* this was a select/show or describe query */
					$result = $mysqli->store_result();

					/* process resultset */
					$row = $result->fetch_row();

					/* free resultset */
					$result->close();
			}

			/* close connection */
			$mysqli->close();

			// Return the count
			return $row;

		}

	function overview()
	{
		$table1="users";
		$table2="listings";
		$table3="landlords";
		$userTotal = countTotal($table1);
		$listingsTotal = countTotal($table2);
		$landlordTotal = countTotal($table3);
			echo '
			<!-- The overview of the system -->
			<div id="content">
				<section>
					<header class="modules"> System overview </header>
						<p class="summary">
							<img class ="icon" src="images/sprites/Message-Information.png">
								Number of users in Oasis:
						</p>
				</section>

				<section>
					<header class="modules"> By the numbers </header>
						<p class="summary">
							<img class ="icon" src="images/sprites/users-02.png">
								Number of users in Oasis:'. $userTotal .'
						</p>
				</section>

			</div>

			';


	}

	function user()
	{
		echo '
		<!-- The user div containing tiles -->
		<div id="users" class="tile-container">
			<header class="modules"> User </header>
			<section id="tile" class="show-popup" href="#" data-showpopup="1">
				<p>Add new user</p>

			</section>

			<section id="tile" class="show-popup" href="#" data-showpopup="2">
				<p>Modify user</p>

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

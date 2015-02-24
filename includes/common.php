<?php

	function overview()
	{

			echo '
			<!-- The overview of the system -->
			<div id="content">
				<header class="modules"> System overview </header>
					<img class ="icon" src="images/sprites/Message-Information.png" />

				<header class="modules"> By the numbers </header>
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

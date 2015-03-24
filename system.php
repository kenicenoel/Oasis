<?php require_once "includes/system_header.php" ?>

	<div id = "container">

	<section id ="content">

		<header class = "highlight">

		</header>
	</section>

	<section id ="content2">
		<header>Set a price range and narrow down by location. We'll handle the rest. </header>

			<form id="filter" method = "post" action = "results.php">
				<label>Price: </label>
				<input id="min" type = "text" name = "min" placeholder = "minimum e.g. 500" required autofocus/>
				<input id="max" type = "text" name = "max" placeholder = "maximum e.g. 2500" required /><br><br>
				<label>Location: </label>
				<select form="filter" name="location" required>
					<option disabled selected>Filter by location</option>

						<option value="All">All</option>
						<option value="Curepe">Curepe</option>
						<option value="Mt Hope">Mt Hope</option>
						<option value="St Augustine">Saint Augustine</option>
						<option value="St John's Road">Saint John's Road</option>
						<option value="St Joseph">Saint Joseph</option>
						<option value="Port of Spain">Port of Spain</option>
						<option value="Tunapuna">Tunapuna</option>

				</select><br>
				<input id="get_results" type = "submit" value="Filter" />
			</form>

			<div id="table-results">


			</div>

	</section>


</div>



<script type= "text/javascript" src="includes/js/jquery.js"></script>
<script type="text/javascript" src="fancybox/source/jquery.fancybox.js"></script>
<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js"></script>
<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>
<script type= "text/javascript" src="includes/js/main.js"></script>

</body>
<?php include_once "includes/footer.php" ?>

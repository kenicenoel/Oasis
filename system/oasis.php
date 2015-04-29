<?php require_once "../includes/oasis_header.php" ?>

	<div id = "container">



	<section id ="content2">
		<header><span class="fa fa-map-marker fa-fw"></span> Accomodation locator</header>

			<form id="filter" method = "post" action = "results.php">
				<p class="subheading"><span class="fa fa-globe fa-fw"></span>Location &amp; Price</p>
				<label for = "min">Minimum: </label>
				<input class="group" id="min" type = "text" name = "min" placeholder = "e.g. 500" required autofocus/>
				<label for = "max">Maximum: </label>
				<input  class="group" id="max" type = "text" name = "max" placeholder = "e.g. 2500" required />
				<label>Location: </label>
				<select  class="group" form="filter" name="location">
					<option disabled selected>All</option>

						<option value="Curepe">Curepe</option>
						<option value="Mt Hope">Mt Hope</option>
						<option value="St Augustine">Saint Augustine</option>
						<option value="St John's Road">Saint John's Road</option>
						<option value="St Joseph">Saint Joseph</option>
						<option value="Port of Spain">Port of Spain</option>
						<option value="Tunapuna">Tunapuna</option>

				</select><br><br>
				<p class="subheading"><span class="fa fa-building fa-fw"></span>Listing Details</p>
				<button id="get_results">Find<span class="fa fa-search fa-fw"></span></button>
			</form>

			<div id="table-results">


			</div>

	</section>


</div>



<script type= "text/javascript" src="../includes/js/jquery.js"></script>
<script type="text/javascript" src="../fancybox/source/jquery.fancybox.js"></script>
<script type="text/javascript" src="../fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
<script type="text/javascript" src="../fancybox/source/helpers/jquery.fancybox-media.js"></script>
<script type="text/javascript" src="../fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>
<script type= "text/javascript" src="../includes/js/main.js"></script>

</body>
<?php include_once "../includes/footer.php" ?>

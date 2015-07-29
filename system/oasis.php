<?php require_once "../includes/oasis_header.php" ?>

	<div id = "container">


	<section id ="content2">
		
			<form id="filter" class="card" method = "post" action = "results.php">
				<header class="subheading"><span class="fa fa-search fa-fw"></span> Find a listing</header>
				<p>Customize your search with filters and then click find to filter listings.</p>
				<p class="subheading"><span class="fa fa-globe fa-fw"></span>Location &amp; Price</p>
				
				<label for = "min">Minimum </label>
					<input class="group" id="min" type = "text" name = "min" placeholder = "e.g. 500" required autofocus/><br>
					
				<label for = "max">Maximum </label>
					<input  class="group" id="max" type = "text" name = "max" placeholder = "e.g. 2500" required /><br>
					
				<label for ="location">Location </label>
					<select  class="group" form="filter" name="location">
						<option selected disabled>Doesn't matter</option>
	
							<option value="Curepe">Curepe</option>
							<option value="Mt Hope">Mt Hope</option>
							<option value="St Augustine">Saint Augustine</option>
							<option value="St John's Road">Saint John's Road</option>
							<option value="St Joseph">Saint Joseph</option>
							<option value="Port of Spain">Port of Spain</option>
							<option value="Tunapuna">Tunapuna</option>
	
					</select><br><br>
				<p class="subheading"><span class="fa fa-building fa-fw"></span>Listing Details</p>
				<label for = "num-occupants">Occupants</label>
					<select  class="group" form="filter" name="num-occupants">
						<option disabled selected>Doesn't matter</option>
	
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6+">6+</option>
					</select><br>
						
					<label for = "furnished">Furnished?</label>
					<select class="group" form="filter" name="furnished">
						<option disabled selected>Doesn't matter</option>
	
							<option value="full">Fully furnished</option>
							<option value="semi">Semi-furnished</option>
							<option value="no">Unfurnished</option>
							
					</select><br>
					
					<label for="type">Type</label>
		            <select form="filter" name="type"> <br>
		              <option disabled selected>Doesn't matter</option>
		              <option value = "Room">Room</option>
		              <option value = "Apartment">Apartment</option>
		              <option value = "House">House</option>
		              <option value = "Studio">Studio</option>
		              <option value = "Shared Room">Shared Room</option>
		              <option value = "Dorm">Dorm</option>
		
		            </select><br>
				
				<button id="get_results">Find<span class="fa fa-search fa-fw"></span></button>
			</form>

			<div id="table-results">


			</div>

	</section>


</div>




<script type="text/javascript" src="../fancybox/source/jquery.fancybox.js"></script>
<script type="text/javascript" src="../fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
<script type="text/javascript" src="../fancybox/source/helpers/jquery.fancybox-media.js"></script>
<script type="text/javascript" src="../fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>
</body>
<?php include_once "../includes/oasis_footer.php" ?>

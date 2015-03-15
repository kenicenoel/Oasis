<?php require_once "includes/system_header.php" ?>

	<div id = "container" class="clearfix">

	<section id ="content">

		<header class = "highlight">

		</header>
	</section>

	<section id ="content2">
		<header>Feel free to personalize your search and we'll handle the rest. </header>

			<form method = "post" action = "results.php">
				<input id="min" type = "text" name = "min" placeholder = "minimum e.g. 500" required autofocus/>
				<input id="max" type = "text" name = "max" placeholder = "maximum e.g. 2500" required />
				<input id="get_results" type = "submit" value="Search" />

			</form>

			<div id="table-results">
					<table id="results">
							<thead>
								<tr>
									<th>Type</th>
									<th>Address</th>
									<th>Description</th>
									<th>Price</th>
									<th>Landlord</th>
									<th>Images</th>
								</tr>
							</thead>
							<tbody class="info">

							</tbody>
						</table>

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

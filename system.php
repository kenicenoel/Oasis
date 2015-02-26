<?php require_once "includes/system_header.php" ?>

	<div id = "container">

	<section id ="content">

		<header class = "highlight">

		</header>
	</section>

	<section id ="content2">
		<header>Feel free to personalize your search and we'll handle the rest. </header>

		<p class ="text">


			<form method = "post" action = "results.php">
				<input type = "text" name = "min" placeholder = "minimum e.g. 500" required autofocus/>
				<input type = "text" name = "max" placeholder = "maximum e.g. 2500" required />
				<input type = "submit" value="Search" />

			</form>
		</p>


	</section>
</div>


	<script src="includes/js/jquery.js"></script>
	<script src="includes/js/main.js"></script>
</body>
<?php include_once "includes/footer.php" ?>

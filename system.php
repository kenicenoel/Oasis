<?php include "includes/system_header.php" ?>
	
	<div id = "container">

	<section id ="content">

		<header class = "highlight">

		</header>
	</section>

	<section id ="content2">
		<header>Set your minimum and maximum price and we'll handle the rest.  </header>

		<p class ="text">


			<form method = "post" action = "results.php">
				<input type = "text" placeholder = "minimum e.g. 500" required autofocus/>
				<input type = "text" placeholder = "maximum e.g. 2500" required />
				<input type = "submit" value="Search" />

			</form>
		</p>


	</section>
</div>


	<script src="includes/js/jquery.js"></script>
	<script src="includes/js/main.js"></script>
</body>
<?php include "includes/footer.php" ?>

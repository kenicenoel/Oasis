<?php
			require_once ("includes/admin_header.php");



			// checks if the url has the module switch
			if(isset ($_GET['module']))
			{
				$setmodule = $_GET['module']; // sets the module switch using the url
			}

			else { $setmodule= "overview"; } // if no module switch is found, default to overview



?>


	<div id = "container">

			<section id ="content2">
					<header>Dashboard</header>
					<?php call_user_func($setmodule) ?> <!-- calls the appropriate function  based on the set module-->
			</section>

</div>

<!-- CODE FOR THE POPUP PAGES GO HERE -->

<div class="overlay-bg">
</div>
<?php addUserOverlay() ?>



	<script src="includes/js/jquery.js"></script>
	<script src="includes/js/main.js"></script>
	<script src="includes/js/custom.js"></script>

</body>
<?php include_once "includes/footer.php" ?>

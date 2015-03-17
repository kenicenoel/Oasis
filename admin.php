<?php
			require_once ("includes/admin_header.php");



			// checks if the url has the module switch
			if(isset ($_GET['module']))
			{
				if($_GET['module'] != 'listings' && $_GET['module'] != 'user' && $_GET['module'] != 'landlords' && $_GET['module'] != 'lookup')
				{
					$setmodule= "overview";  // Default to overview
				}
				else
				{
					$setmodule = $_GET['module']; // sets the module switch using the url
				}

			}

			else if(!isset ($_GET['module']))
			{
				$setmodule= "overview";  // Default to overview
			}





?>


	<div id = "container">

			<section id ="content2">
					<header>Control Center</header>
					<?php call_user_func($setmodule) ?> <!-- calls the appropriate function  based on the set module-->
					<?php include_once "includes/footer.php" ?>
			</section>

</div>

<!-- CODE FOR THE POPUP PAGES GO HERE -->

<div class="overlay-bg">
</div>
<?php call_user_func('addUserOverlay') ?>
<?php call_user_func('addListingOverlay') ?>





	<script src="includes/js/jquery.js"></script>
	<script type="text/javascript" src="fancybox/source/jquery.fancybox.js"></script>
	<script src="includes/js/main.js"></script>
	<script src="includes/js/custom.js"></script>

</body>

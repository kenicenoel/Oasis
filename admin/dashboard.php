<?php
			require_once ("../includes/dashboard_header.php");



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


	<div class = "container">

			<section id ="content2">
					<header><i class="fa fa-toggle-on fa-fw"></i>	Admin Dashboard</header>
					<div id="data">
						<?php call_user_func($setmodule) ?> <!-- calls the appropriate function  based on the set module-->
					</div>

			</section>

</div>


<script src="../includes/js/jquery.js"></script>
<script src="../fancybox/source/jquery.fancybox.js"></script>
<script src="../includes/js/main.js"></script>
<script src="../includes/js/custom.js"></script>



<?php include_once "../includes/footer.php" ?>
</body>

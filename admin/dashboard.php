<?php
			require_once ("../includes/dashboard_header.php");



			// checks if the url has the module switch
			if(isset ($_GET['module']))
			{
				$moduleNameSpanOpen = "<span class='highlight'>";
				$moduleNameSpanClose = "</span>";
				if($_GET['module'] != 'listings' && $_GET['module'] != 'user' && $_GET['module'] != 'landlords' && $_GET['module'] != 'lookup')
				{
					$setmodule= "overview";  // Default to overview
					$moduleName = $moduleNameSpanOpen."System Overview".$moduleNameSpanClose;
				}
				else
				{
					$setmodule = $_GET['module']; // sets the module switch using the url

					$area = $_GET['module'];
					if($area == "lookup")
					{
						$moduleName = $moduleNameSpanOpen."Information Lookup".$moduleNameSpanClose;
					}

					else
					{
						$moduleName = $moduleNameSpanOpen.ucwords($area)." Management".$moduleNameSpanClose;
					}
				}

			}

			else if(!isset ($_GET['module']))
			{
				$setmodule= "overview";  // Default to overview
				$moduleName = "System Overview";
			}


?>


	<div class = "container">

			<section id ="content2">
					<header><span class="fa fa-area-chart fa-fw"></span> Oasis Dashboard > <?php echo $moduleName ?></header>
					<div id="data">
						<?php call_user_func($setmodule) ?> <!-- calls the appropriate function  based on the set module-->
					</div>

			</section>

			<!-- <?php include_once "../includes/footer.php" ?> -->
	</div>


<script src="../includes/js/jquery.js"></script>
<script src="../fancybox/source/jquery.fancybox.js"></script>
<script src="../includes/js/main.js"></script>
<script src="../includes/js/custom.js"></script>




</body>

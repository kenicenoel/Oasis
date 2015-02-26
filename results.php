<?php
		require_once ("includes/system_header.php");
			//require_once ("includes/classes/paginator.class.php");

		if(isset($_POST['min']) && isset($_POST['max']))
		{
			$minPrice=$_POST['min'];
			$maxPrice=$_POST['max'];

		}

?>
<div id = "container">

	<section id ="content">

		<header class = "highlight">

		</header>
	</section>

	<section id ="content2">

		<header>Sweet! Here are some listings that are between $<?php echo $minPrice ?>TTD and $<?php echo $maxPrice ?>TTD </header>
		<table class="table table-striped table-condensed table-bordered table-rounded">
                        <thead>
                          <tr>
                                <th>Type</th>
                                <th>Address</th>
                                <th>Landlord</th>
																<th>Price</th>
                        	</tr>
                        </thead>
                        <tbody>

												</tbody>
                </table>

	</section>
</div>



<?php include_once "includes/footer.php" ?>

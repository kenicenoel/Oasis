<?php require ("includes/system_header.php");
			require ("includes/classes/paginator.class.php");
			require ("includes/common.php");
		if(isset($_POST['min']) && isset($_POST['max']))
		{
			$minPrice=$_POST['min'];
			$maxPrice=$_POST['max'];

		}

		$conn       = dbConnect();
		$limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 25;
		$page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
		$links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
		$query      = "SELECT landlord.lastName AS landlord, listing.type, listing.address, lisiting.price FROM landlord, listing WHERE landlord.landlordNumber = listing.landlordNumber";

		$Paginator  = new Paginator( $conn, $query);

		$results    = $Paginator->getData( $limit, $page );

?>
<div id = "container">

	<section id ="content">

		<header class = "highlight">

		</header>
	</section>

	<section id ="content2">

		<header>Found the following lisitngs for between $<?php echo $minPrice ?>TTD and $<?php echo $maxPrice ?>TTD </header>
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
													<?php for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
											        <tr>
											                <td><?php echo $results->data[$i]['type']; ?></td>
											                <td><?php echo $results->data[$i]['address']; ?></td>
											                <td><?php echo $results->data[$i]['landlord']; ?></td>
											                <td><?php echo $results->data[$i]['price']; ?></td>
											        </tr>
														<?php endfor; ?>




												</tbody>
                </table>
								<?php echo $Paginator->createLinks( $links, 'pagination pagination-sm' ); ?>



	</section>
</div>



<?php include "includes/footer.php" ?>

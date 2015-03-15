<?php
		require_once ("includes/config.php");


		if(isset($_POST['min']) && isset($_POST['max']))
		{
			$minPrice=$_POST['min'];
			$maxPrice=$_POST['max'];

			$sql = "SELECT listing.type, listing.address, listing.description, listing.price, landlord.firstName, landlord.lastName,
			 				image1, image2, image3 FROM listing, landlord WHERE listing.price >= ? AND listing.price <= ? AND landlord.landlordNumber = listing.landlordNumber";

		  // prepare the sql statement
		  $stmt = $connection->prepare($sql);

		  // bind variables to the paramenters ? present in sql
		  $stmt->bind_param('ii',$minPrice, $maxPrice);

		  // execute the prepared statement
		  $stmt->execute();

		  /* store result */
		  $stmt->store_result();

		  /* Bind the results to variables */
		  $stmt->bind_result($type, $address, $desc, $price, $fname, $lname, $image1, $image2, $image3);
			$i = 0;


			while($stmt->fetch())
			{
				$i++;
				echo'
				<tr>
					<td>'.$type.'</td>
					<td>'.$address.'</td>
					<td>'.$desc.'</td>
					<td>$'.$price.'</td>
					<td>'.$fname ." ".$lname.'</td>
					<td><a class="fancybox" rel="'.$i.'" href="includes/tasks/'.$image1.'""><img src="includes/tasks/'.$image1.'" alt="" /></a></td>
					<td><a data-view="hide" class="fancybox" rel="'.$i.'" href="includes/tasks/'.$image2.'""><img src="includes/tasks/'.$image2.'" alt="" /></a></td>
					<td><a data-view="hide" class="fancybox" rel="'.$i.'" href="includes/tasks/'.$image3.'""><img src="includes/tasks/'.$image3.'" alt="" /></a></td>
				</tr>



				';
			}

		}

?>

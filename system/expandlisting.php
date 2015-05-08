<?php

		require_once ('../includes/oasis_header.php');


		if(isset($_GET['l'])  )
		{

			$listingNumber = $_GET['l'];
			// Get the total rows from the database matching criteria
			$sql = "SELECT listing.type, listing.address, listing.location, listing.description, listing.price, landlord.firstName, landlord.lastName,
			 				image1, image2, image3, image4, image5 FROM listing, landlord WHERE listingNumber = ? AND landlord.landlordNumber = listing.landlordNumber";
			
		  // prepare the sql statement
		  $stmt = $connection->prepare($sql);
			
			$stmt = $connection->prepare($sql);
			$stmt->bind_param('i', $listingNumber);
			$stmt->execute();
			$stmt->bind_result($type, $address, $location, $desc, $price, $fname, $lname, $image1, $image2, $image3, $image4, $image5);
			/* store result */
		  	$stmt->fetch();
			
			
		}

		 // end if isset


?>

<div id = "container">
		
		
		<section id ="content2">
			<header> <span class="fa fa-folder-open-o fa-fw"></span>Listing details</header>
		
				<div id="result-container">
				<?php 
					echo '<header class="subheading"><span class="fa fa-file-text fa-fw"></span> Description</header>';
					echo '<p>'.$type.' </p>';
					echo '<p>'.$price.' </p>';
					echo '<p>'.$location.' </p>';
					echo '<p>'.$desc.' </p>';
					
				 ?>
							
				</div>
		
		</section>
		<section id = "listing-images">
			<div id="image-container">
			<?php
				echo '<header class="subheading"><span class="fa fa-photo fa-fw"></span> Images</header>';
				echo '<p><a class="fancybox" rel="image" href="../includes/tasks/'.$image1.'"><img src="../includes/tasks/'.$image1.'" alt="" /></a></p>';
				echo '<p><a class="fancybox" rel="image" href="../includes/tasks/'.$image2.'"><img src="../includes/tasks/'.$image2.'" alt="" /></a></p>';
				echo '<p><a class="fancybox" rel="image" href="../includes/tasks/'.$image3.'"><img src="../includes/tasks/'.$image3.'" alt="" /></a></p>';
				echo '<p><a class="fancybox" rel="image" href="../includes/tasks/'.$image4.'"><img src="../includes/tasks/'.$image4.'" alt="" /></a></p>';
				echo '<p><a class="fancybox" rel="image" href="../includes/tasks/'.$image5.'"><img src="../includes/tasks/'.$image5.'" alt="" /></a></p>';
				echo '<p><a class="fancybox" rel="image" href="../includes/tasks/'.$image6.'"><img src="../includes/tasks/'.$image6.'" alt="" /></a></p>';
				echo '<p><a class="fancybox" rel="image" href="../includes/tasks/'.$image7.'"><img src="../includes/tasks/'.$image7.'" alt="" /></a></p>';
				echo '<p><a class="fancybox" rel="image" href="../includes/tasks/'.$image8.'"><img src="../includes/tasks/'.$image8.'" alt="" /></a></p>';
				echo '<p><a class="fancybox" rel="image" href="../includes/tasks/'.$image9.'"><img src="../includes/tasks/'.$image9.'" alt="" /></a></p>';
				echo '<p><a class="fancybox" rel="image" href="../includes/tasks/'.$image10.'"><img src="../includes/tasks/'.$image10.'" alt="" /></a></p>';
			?>
			</div>
		</section>
		
		
		</div>
		
		
		
		<script type= "text/javascript" src="../includes/js/jquery.js"></script>
		<script type="text/javascript" src="../fancybox/source/jquery.fancybox.js"></script>
		<script type="text/javascript" src="../fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
		<script type="text/javascript" src="../fancybox/source/helpers/jquery.fancybox-media.js"></script>
		<script type="text/javascript" src="../fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>
		<script type= "text/javascript" src="../includes/js/main.js"></script>
		
		<!-- DataTables -->
		<script type="text/javascript" charset="utf8" src="../datatables/media/js/jquery.dataTables.js"></script>


</body>
<?php include_once "../includes/footer.php" ?>

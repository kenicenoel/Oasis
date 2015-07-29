<?php

		require_once ('../includes/oasis_header.php');


		if(isset($_GET['l'])  )
		{

			$listingNumber = $_GET['l'];
			
			// Get the details for the listing
			$sql = "SELECT listing.type, listing.address, listing.location, listing.description, listing.price, listing.image1, landlord.firstName, landlord.lastName
			 		FROM listing, landlord 
					WHERE listingNumber = ? AND landlord.landlordNumber = listing.landlordNumber";
			
		 
		  	$stmt = $connection->prepare($sql);
			$stmt->bind_param('i', $listingNumber);
			$stmt->execute();
			$stmt->bind_result($type, $address, $location, $desc, $price, $image1, $fname, $lname);
			$stmt->fetch();
			$stmt->close();
			
			
			// Get the images for the listing
			$imageCollection = array();
			for($i = 1; $i <= 10; $i++)
			{
				$sql = "SELECT listing.image{$i} FROM listing WHERE listingNumber = ?";
			
		  
			  	$stmt = $connection->prepare($sql);
				$stmt->bind_param('i', $listingNumber);
				$stmt->execute();
				$stmt->bind_result($image);
				if($image)
				{
					$imageCollection[] = $image;
				}
				
				/* store result */
			  	$stmt->fetch();
				$stmt->close();
			}
			
			
						
				
				
				
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
					echo '<p>'.$fname. " ".$lname.' </p>';
					echo '<p>'.$desc.' </p>';
					
				 ?>
				 
							
				</div>
				
				<div id = "listing-images">
					<div id="image-container">
						<header class="subheading"><span class="fa fa-photo fa-fw"></span> Images</header>
						<?php
							
							// This for loop goes through the image collection array and creates thumbnails of them surrounded by a paragraph tag using fancybox
								for($i = 0; $i < count($imageCollection); $i++)
								{
									echo '<p><a class="fancybox" rel="image" href="../includes/tasks/'.$imageCollection[$i].'"><img src="../includes/tasks/'.$imageCollection[$i].'" alt="" /></a></p>';
								}
								
			
						?>
					</div>
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
<?php include_once "../includes/oasis_footer.php" ?>

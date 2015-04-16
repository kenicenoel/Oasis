<?php

		require_once ('../includes/oasis_header.php');


		if(isset($_POST['min']) && isset($_POST['max'])  )
		{

			$minPrice=$_POST['min'];
			$maxPrice=$_POST['max'];

			$_SESSION['min'] = $minPrice;
			$_SESSION['max'] = $maxPrice;
			if(isset($_POST['location']))
			{
				$location='%'.$_POST['location'];
				$_SESSION['location'] = $location;
			}
			else
			{

				$location="%";
				$_SESSION['location'] = $location;
			}



		}

			else
			{
				$minPrice=$_SESSION['min'];
				$maxPrice=$_SESSION['max'];
				$location=$_SESSION['location'];


			}




			// Get the total rows from the database matching criteria
			$sql = "SELECT * FROM listing, landlord WHERE listing.price >= ? AND listing.price <= ? AND
		landlord.landlordNumber = listing.landlordNumber AND location LIKE ?";

		$stmt = $connection->prepare($sql);
		$stmt->bind_param('iis', $minPrice, $maxPrice, $location);
		$stmt->execute();
		$stmt->store_result();

		$total = $stmt->num_rows;

		// The number of results per page
		$pageRows=5;

		//Page number of the last page
		$lastPage = ceil($total/$pageRows);

		// Makes sure last cannot be less than one
		if($lastPage < 1)
		{
			$lastPage = 1;
		}

		// Establish the $pagenum variable
		$pagenum = 1;

		//Get the pagenum from the URL vars if it is present. If not it is  =1
		if(isset($_GET['pn']))
		{
			$pagenum = preg_replace('#[^0-9]#','', $_GET['pn']);

		}

		// This makes sure the page number is not below 1 or greater than first page
		if($pagenum < 1)
		{
			$pagenum = 1;
		}
		else if($pagenum > $lastPage)
		{
			$pagenum = $lastPage;
		}

		// This sets the range of rows to query for the chosen $pagenum
		$limit = 'LIMIT ' .($pagenum - 1) * $pageRows . ',' . $pageRows;

		// Grab one row of data
			$sql = "SELECT listing.type, listing.address, listing.location, listing.description, listing.price, landlord.firstName, landlord.lastName,
			 				image1, image2, image3 FROM listing, landlord WHERE listing.price >= ? AND listing.price <= ? AND
							landlord.landlordNumber = listing.landlordNumber AND location LIKE ? ORDER BY listing.price ASC $limit";

		  // prepare the sql statement
		  $stmt = $connection->prepare($sql);

		  // bind variables to the paramenters ? present in sql
		  $stmt->bind_param('iis',$minPrice, $maxPrice, $location);

		  // execute the prepared statement
		  $stmt->execute();

		  /* store result */
		  $stmt->store_result();

		  /* Bind the results to variables */
		  $stmt->bind_result($type, $address, $location, $desc, $price, $fname, $lname, $image1, $image2, $image3);
			$i = 0;

			$textline = "Found $total listings matching your filters (Min: $$minPrice | Max:$$maxPrice | Location: $location). You are on page $pagenum of $lastPage.";

			// Establish the paginationCtrls variable
			$navigation = '';

			// If there is more than one page of results
			if($lastPage != 1)
			{
				/* First, check if you are on page 1. If so, then
				a link to previous page and first page is not needed.
				If not on the first page, generate links to those
				*/
				if($pagenum >1)
				{
					$previous = $pagenum -1;
					$navigation.='<a class="paginate" href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a>';
					//Clickable numbered links go here and appear on the left
					for($i = $pagenum -4; $i < $pagenum; $i++)
					{
						if($i > 0)
						{
							$navigation.='<a class="paginate" href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a>';
						}
					}

				} // end if pagenum >1

				// Render the target page number, but without a link
				$navigation.=''.$pagenum.' &nbsp;';

				//Clickable numbered links go here and appear on the left
				for($i = $pagenum + 1; $i <= $lastPage; $i++)
				{
					$navigation.='<a class="paginate" href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a>';
					if($i >= $pagenum+4)
					{
						break;
					}
				}
				// Checks if we are on the last page and generate next
				if($pagenum !=$lastPage)
				{
					$next = $pagenum+1;
					$navigation.='<a class="paginate" href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a>';
				}
			} // end if lastpage !=1

			$td = "";
			while($stmt->fetch())
			{
			  $i++;
				$full_address = $address.", ".$location;
				$desc_snippet = substr($desc, 0, 20);
			  $td.= '
			  <tr>
			    <td>'.$type.'</td>
			    <td>'.$full_address.'</td>
					 <td>'.$desc_snippet.'...</td>
			    <td>$'.$price.'</td>
			    <td>'.$fname ." ".$lname.'</td>
			    <td><a class="fancybox" rel="'.$i.'" href="includes/tasks/'.$image1.'""><img src="includes/tasks/'.$image1.'" alt="" /></a></td>
			    <td><a data-view="hide" class="fancybox" rel="'.$i.'" href="includes/tasks/'.$image2.'""><img src="includes/tasks/'.$image2.'" alt="" /></a></td>
			    <td><a data-view="hide" class="fancybox" rel="'.$i.'" href="includes/tasks/'.$image3.'""><img src="includes/tasks/'.$image3.'" alt="" /></a></td>
			  </tr>

			  ';
			}



		 // end if isset


?>

<div id = "container">

<section id ="content">

	<header class = "highlight">

	</header>
</section>

<section id ="content2">
	<header> </header>

		<div id="table-results">

						<table id="results">
								<thead>
									<tr>
										<th>Type</th>
										<th>Address</th>
										<th>Description</th>
										<th>Price</th>
										<th>Landlord</th>
										<th>Images</th>
									</tr>
								</thead>

								<tbody id="info">
									<?php echo $td ?>

								</tbody>


						</table>

					<div id="pagination-holder"> <?php echo $textline."<br><br>".$navigation ?> </div>

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

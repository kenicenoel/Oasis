<?php
include_once("../../../includes/config.php");

if(isset($_POST['query']))
{
  $query = $_POST['query']."%";
  $type = $_POST['type'];

  if($type == "user")
  {
    $sql = "SELECT studentNumber, firstName, lastName, email, phoneNumber, address FROM users WHERE firstName LIKE ? or lastName LIKE ? or email LIKE ?";

    // prepare the sql statement
    $stmt = $connection->prepare($sql);

    // bind variables to the paramenters ? present in sql
    $stmt->bind_param('sss', $query, $query, $query);

    // execute the prepared statement
    $stmt->execute();

    /* store result */
    $stmt->store_result();

    /* Bind the results to variables */
    $stmt->bind_result($id, $fname, $lname, $email, $phone, $address);

    while($stmt->fetch())
    {
        echo '
        <div class="card">
          <p>Student ID: '.$id.'</p>
          <p>First Name:'.$fname.'</p>
          <p>Last Name:'.$lname.'</p>
          <p>Email:'.$email.'</p>
          <p>Phone #:'.$phone.'</p>
          <p>Address:'.$address.'</p>
        </div>

        ';

    }
  }

    else if($type == "landlord")
    {
      $sql = "SELECT firstName, lastName, email, phoneNumber, address FROM landlord WHERE firstName LIKE ? or lastName LIKE ? or email LIKE ?";

      // prepare the sql statement
      $stmt = $connection->prepare($sql);

      // bind variables to the paramenters ? present in sql
      $stmt->bind_param('sss', $query, $query, $query);

      // execute the prepared statement
      $stmt->execute();

      /* store result */
      $stmt->store_result();

      /* Bind the results to variables */
      $stmt->bind_result($fname, $lname, $email, $phone, $address);

      while($stmt->fetch())
      {
          echo '
          <div class="card">
            <p>First Name:'.$fname.'</p>
            <p>Last Name:'.$lname.'</p>
            <p>Email:'.$email.'</p>
            <p>Phone #:'.$phone.'</p>
            <p>Address:'.$address.'</p>
          </div>

          ';

      } // end while
    } // end elseif


    else if($type == "listing")
    {
      $sql = "SELECT listing.type, listing.address, listing.location, listing.description, listing.price, landlord.firstName, landlord.lastName,
			 				image1 FROM listing, landlord WHERE (landlord.firstName LIKE ? or landlord.lastName LIKE ?) AND
							landlord.landlordNumber = listing.landlordNumber";

		  // prepare the sql statement
		  $stmt = $connection->prepare($sql);

		  // bind variables to the paramenters ? present in sql
		  $stmt->bind_param('ss',$query, $query);

		  // execute the prepared statement
		  $stmt->execute();

		  /* store result */
		  $stmt->store_result();

		  /* Bind the results to variables */
		  $stmt->bind_result($type, $address, $location, $desc, $price, $fname, $lname, $image1);



      while($stmt->fetch())
      {
        $full_address = $address.", ".$location; // merge the address and the location into a single string
        $desc_snippet = substr($desc, 0, 30); // a 30 character substring of the description
          echo '
          <div class="card">
  				    <header class="subheading"><span class="fa fa-building-o"> </span> '.$type.'</header>
  					  <p><img src="../includes/tasks/'.$image1.'"alt="listingImage" /></p>
  				    <p><span class="fa fa-map-marker"> </span> '.$full_address.'</p>
  				    <p><span class="fa fa-dollar"> </span> '.$price.'</p>
  				    <p><span class="fa fa-male"> </span> '.$fname ." ".$lname.'</p>
  					  <p>'.$desc_snippet.'...</p>

  			  </div>

          ';

      } // end while
    } // end elseif






} // end if isset
else
{
  echo '<p>Something went wrong. Please try again.</p>';
}








?>

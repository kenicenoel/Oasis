<?php
include_once("../../../includes/config.php");

if(isset($_POST['query']))
{
  $query = $_POST['query']."%";
  $sql = "SELECT userId, firstName, lastName, email, phoneNumber, address FROM users WHERE firstName LIKE ? or lastName LIKE ?";

  // prepare the sql statement
  $stmt = $connection->prepare($sql);

  // bind variables to the paramenters ? present in sql
  $stmt->bind_param('ss',$query, $query);

  // execute the prepared statement
  $stmt->execute();

  /* store result */
  $stmt->store_result();

  /* Bind the results to variables */
  $stmt->bind_result($id, $fname, $lname, $email, $phone, $address);

  while($stmt->fetch())
  {
      echo '
      <p>Student ID:'.$id.'</p>
      <p>First Name:'.$fname.'</p>
      <p>Last Name:'.$lname.'</p>
      <p>Email:'.$email.'</p>
      <p>Phone #:'.$phone.'</p>
      <p>Address:'.$address.'</p>
      <p>---------------------------</p>
      ';

  }

}
else
{
  echo '<p>Something went wrong. Please try again.</p>';
}








?>

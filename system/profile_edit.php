<?php require_once "../includes/oasis_header.php";
if
(
		isset($_POST['firstName']) || isset($_POST['lastName']) || isset($_POST['email']) || isset($_POST['address'])
		|| isset($_POST['phoneNumber']) || isset($_POST['password'])
)
{

	foreach ($_POST as $key => $val)
	{


			if(!empty($val))
			{
				$value = $val;
				$sql = "UPDATE users SET {$key} = ?  WHERE studentNumber = ?";

					//prepare the sql statement
					$stmt = $connection->prepare($sql);

					// bind variables to the paramenters ? present in sql
					$stmt->bind_param('si', $val, $sid);

					//set the variables from form values
					$row = $key;
					$sid = $studentNumber; // $studentNumber value is stored in the $_SESSION['studentNumber'] variable


					//execute the prepared statement
					$stmt->execute();
			}



		}
			echo 'Successfully updated your profile';

			// Update the session name with the latest inserted one

			// Build the query
      $sql = "SELECT firstName, lastName FROM users WHERE uid = ?";

      // prepare the sql statement
      $stmt = $connection->prepare($sql);

			// bind variables to the paramenters ? present in sql
			$stmt->bind_param('i', $studentNumber);

      // execute the prepared statement
      $stmt->execute();

			/* store result */
	    $stmt->store_result();

			/* Bind the results to variables */
			$stmt->bind_result($fname, $lname);

			/* Fetch the results and operate on them */
			if($stmt->fetch())
			{
				$name = $fname. " " . $lname;
				$_SESSION['fullName'] = $name;

				/* Close statement */
				$stmt ->close();

				$stmt->close();
				$connection->close();
			}



}



else
{
	echo '
	<div id = "container">

	<section id ="content">

		<header class = "highlight">

		</header>
	</section>

	<section id ="content2">
		<header> <i class="fa fa-pencil-square-o fa-fw"></i> Update user profile</header>

			<form id="profile" method = "post" action = "profile_edit.php">
				<p id="errorMessage"></p>
				<label for="firstName">First name: </label>
				<input id="fname" type = "text" name = "firstName" placeholder = "Kagome" autofocus/><br>

				<label for="lastName">Last name: </label>
				<input id="lname" type = "text" name = "lastName" placeholder = "Pegasus" /><br>

				<label for="password">Password: </label>
				<input id="password" type = "password" name = "password" placeholder = "password" /><br>

				<label for="email">Email address: </label>
				<input id="email" type = "email" name = "email" placeholder = "kagp@outlook.com" /><br>

				<label for="phoneNumber">Phone number</label>
				<input type = "text" id = "phoneNumber" name="phoneNumber" placeholder="17121234567" /> <br>

				<label for="address">Address</label>
				<input type = "text" id = "address" name="address" placeholder="Curepe" /> <br>

				<button id="save_profile" type = "submit"><i class="fa fa-floppy-o fa-fw"></i> Update</button>
			</form>


	</section>


</div>

	';
}

?>

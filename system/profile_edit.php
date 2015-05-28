<?php require_once "../includes/oasis_header.php";
if
(
		isset($_POST['firstName']) || isset($_POST['lastName']) || isset($_POST['email']) || isset($_POST['address'])
		|| isset($_POST['phoneNumber']) || isset($_POST['password'])
)
{
	// Check each set key and index from the form and update appropriate field in table
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
			

	



}

?>


	<div id = "container">

	<section id ="content">

		<header class = "highlight">

		</header>
	</section>

	<section id ="content2">
		<header> <span class="fa fa-pencil-square-o fa-fw"></span> Update user profile</header>

			<form id="profile" method = "post" action = "profile_edit.php">
				<p id="errorMessage"></p>
				<label for="firstName">First name </label>
				<input id="fname" type = "text" name = "firstName" placeholder = "Kagome" autofocus/><br>

				<label for="lastName">Last name </label>
				<input id="lname" type = "text" name = "lastName" placeholder = "Pegasus" /><br>

				<label for="password">Password </label>
				<input id="password" type = "password" name = "password" placeholder = "password" /><br>

				<label for="email">Email address </label>
				<input id="email" type = "email" name = "email" placeholder = "kagp@outlook.com" /><br>

				<label for="phoneNumber">Phone number</label>
				<input type = "text" id = "phoneNumber" name="phoneNumber" placeholder="17121234567" /> <br>

				<label for="address">Address</label>
				<input type = "text" id = "address" name="address" placeholder="Curepe" /> <br>

				<button id="save_profile" type = "submit">Update</button>
			</form>


	</section>


</div>



</body>


<?php include_once "../includes/footer.php" ?>


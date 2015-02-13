<?php
	



	function generateAddUserForm()
	{

		

		//Connection to the MySQL Server
		define('DB_SERVER', 'localhost'); // Mysql hostname, usually localhost
		define('DB_USERNAME', 'root'); // Mysql username
		define('DB_PASSWORD', ''); // Mysql password
		define('DB_DATABASE', 'oasisdb'); // Mysql database name

		// create new mysqli object 
		$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		if ($connection->connect_error) 
		{
		    die("Connection failed: " . $connection->connect_error);
		}

		//set the variables from form values
				$userId = $_POST['userId'];
				$password = $_POST['password'];
				$firstName = $_POST['firstName'];
				$lastName = $_POST['lastName'];
				$email = $_POST['email'];
				$phoneNumber = $_POST['phoneNumber'];
				$address = $_POST['address'];

		if (isset($_GET['create']))
			{
						


				// BUild the query
				$sql = "SELECT userID FROM users WHERE userId = ?";

				
				//prepare the sql statement
				$stmt = $connection->prepare($sql);
				

				// bind variables to the paramenters ? present in sql
				$stmt->bind_param('i', $userId);
				

				//execute the prepared statement
				$stmt->execute();

				//bind the results ($id corresponds to the items we are selecting)
				$stmt->bind_result($id);

				if($userId == $id)
				{
					echo "User already exists";
				}		
				

			
			}


			else
				{
					$sql = "INSERT into users (userId, password, firstName, lastName, email, phoneNumber, address)".
								"VALUES(?,?,?,?,?,?,?)";
					$stmt = $connection->prepare($sql);
					$stmt->bind_param('issssss',$userId, $password, $firstName, $lastName, $email, $phoneNumber, $address);
					//execute the prepared statement
					$stmt->execute();
					echo "Inserted";

				}
				$connection->close();
		echo '
		<form method = "post" action = "?create=1">
					<p id = "errorMessage"><?php echo $meaning; ?></p>
					
					<label for="userId">Student ID#</label>
					<input type = "text" id = "userId" name="userId" required autofocus/> <br>
					
					<label for="userPass">Password</label>
					<input type = "text" id = "userPass" name="password" required /> <br>
					
					<label for="firstName">First Name</label>
					<input type = "text" id = "firstName" name="firstName" /> <br>

					<label for="lastName">Last Name</label>
					<input type = "text" id = "lastName" name="lastName" /> <br>

					<label for="email">Email address</label>
					<input type = "text" id = "email" name="email" /> <br>

					<label for="phoneNumber">Phone Number</label>
					<input type = "text" id = "phoneNumber" name="phoneNumber" /> <br>

					<label for="address">Address</label>
					<input type = "text" id = "address" name="address" /> <br>

					<input type = "submit" value="Create" />

			</form>
			';

			
	}
/*
	function returnToAdmin()
	{
		echo '
		    <script language="javascript" type="text/javascript">
				window.location.href="admin.php";
			</script>'
			;
	} */


?>
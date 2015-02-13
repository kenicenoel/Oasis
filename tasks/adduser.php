<?php include "../includes/admin_header.php"; 
	include "../includes/config.php"; ?>
<body>
	
	<div id = "container">

	<section id ="content">
		
		<header class = "highlight"> 
			
		</header>
	</section>

	<section id ="content2">
		<header>Grant a new user access to OASIS  </header>
		<?php 

				echo '
		<form method = "post" action = "?add=1">
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

				if (isset($GET['add'])) 
				{
					//set the variables from form values
					$userId = $_POST['userId'];
					$password = $_POST['password'];
					$firstName = $_POST['firstName'];
					$lastName = $_POST['lastName'];
					$email = $_POST['email'];
					$phoneNumber = $_POST['phoneNumber'];
					$address = $_POST['address'];echo $userId . $password;


					echo $userId . $password;
				}
				
				
				
				
				

			
			

/*
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

*/
				

		?>

	</section>
</div>


	<script src="includes/js/jquery.js"></script>
	<script src="includes/js/main.js"></script>
</body>
<?php include "../includes/footer.php" ?>

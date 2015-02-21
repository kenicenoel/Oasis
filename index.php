<?php include_once "includes/header.php";
 			include_once "includes/authenticate.php";

?>

<?php
if (isset($_GET['flagLogin']))
	{
		$message = $_GET['flagLogin'];
		$meaning = "): You have entered incorrect login info";

	}

else
{
	$meaning = " ";
}

?>
<body>
	<div id = "container">

	<section id ="content">

		<header class = "highlight">

		</header>
	</section>

	<section id ="content2">
		<header>Ready to get started? </header>

		<p class ="text">
			<img class = "icon" src = "images/User.svg" alt="student" />
				Simply enter your student number and your date of birth. Need an account? See Student Advisory.

					<form method = "post" action = <?php loginUser() ?>>
						<p id = "errorMessage"><?php echo $meaning; ?></p>
						<label for="studentID">Student#</label>
						<input type = "text" id = "studentID" name="userId" required autofocus/> <br><br>
						<label for="userPass">Password</label>
						<input type = "password" id = "userPassword" name="password" required /> <br>
						<input type = "submit" value="LOGIN" />

				</form>


		</p>


	</section>
	</div>

</body>



<?php include "includes/footer.php" ?>

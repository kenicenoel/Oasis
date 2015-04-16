<?php include_once ("includes/header.php") ?>

<body>
	<div id = "container">

	<section id ="content">

		<header class = "highlight">

		</header>
	</section>

	<section id ="content2">
		<header>Welcome to OASIS by Student Advisory Services</header>

		<p class ="text">
			<img class = "icon" src = "images/user-login.png" alt="student" />
				Simply enter your student number and your date of birth. Need an account? See Student Advisory.

					<form id="form" action= "includes/authenticate.php" method ="post" class ="ajax">
						<p id = "msg"></p>
						<label for="studentID">Student#</label>
						<input type = "text" id = "studentNumber" name="studentNumber" required autofocus/> <br><br>
						<label for="password">Password</label>
						<input type = "password" id = "password" name="password" required /> <br>
						<input id ="submit" type = "submit" value="LOGIN" />

				</form>


		</p>


	</section>
	</div>

</body>


<script src="includes/js/jquery.js"></script>
<script src="includes/js/main.js"></script>
<?php include_once("includes/footer.php") ?>

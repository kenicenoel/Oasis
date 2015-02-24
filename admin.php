<?php
			include "includes/admin_header.php";

			// checks if the url has the module switch
			if(isset ($_GET['module']))
			{
				$setmodule = $_GET['module']; // sets the module switch from url in a variable
			}

			else { $setmodule= "overview"; }

?>


	<div id = "container">

	<section id ="content2">
		<header>Dashboard</header>

		<?php call_user_func($setmodule) // calls the appropriate function?>


	</section>
</div>

<!-- CODE FOR THE POPUP PAGES GO HERE -->

<div class="overlay-bg">
</div>

<div class="overlay-content popup1">
  <section id ="content2">
    <header>Add a new user to OASIS  </header>

    <form method = "post" action = "admin.php">

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



</div>



	<script src="includes/js/jquery.js"></script>
	<script src="includes/js/main.js"></script>
	<script src="includes/js/custom.js"></script>
</body>
<?php include "includes/footer.php" ?>

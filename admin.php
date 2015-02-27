<?php
			require_once ("includes/admin_header.php");



			// checks if the url has the module switch
			if(isset ($_GET['module']))
			{
				$setmodule = $_GET['module']; // sets the module switch using the url
			}

			else { $setmodule= "overview"; } // if no module switch is found, default to overview



?>


	<div id = "container">

			<section id ="content2">
					<header>Dashboard</header>
					<?php call_user_func($setmodule) ?> <!-- calls the appropriate function  based on the set module-->
			</section>

</div>

<!-- CODE FOR THE POPUP PAGES GO HERE -->

<div class="overlay-bg">
</div>

<div class="overlay-content popup1">
  <section id ="content2 class=left">
    <header>Add a new user to OASIS  </header>

    <form method = "post" action = "<?php addUser() ?>">

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

          <input type = "submit" value="Add" />
					<p class="footnote"> Note: The student number and password are required. </p>

      </form>



</div>



	<script src="includes/js/jquery.js"></script>
	<script src="includes/js/main.js"></script>
	<script src="includes/js/custom.js"></script>

</body>
<?php include_once "includes/footer.php" ?>

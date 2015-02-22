<?php include "includes/admin_header.php";  ?>


	<div id = "container">

	<section id ="content">

		<header class = "highlight">

		</header>
	</section>

	<section id ="content2">
			<header>Quick actions</header>

			<!-- The user div containing tiles -->
			<div id="users" class="tile-container">
				<header class="modules"> User </header>
				<section id="tile" class="show-popup" href="#" data-showpopup="1">
					<p>Add new user</p>

				</section>

				<section id="tile" class="show-popup" href="#" data-showpopup="2">
					<p>Modify user</p>

				</section>
			</div>

			<!-- The listings div containing tiles -->
			<div id="listings" class="tile-container">
				<header class="modules"> Listings </header>

				<section id="tile" class="show-popup" href="#" data-showpopup="3">
					<p class="show-popup" href="#" data-showpopup="1">Add new Listing</a></p>

				</section>

				<section id="tile" class="show-popup" href="#" data-showpopup="4">
					<p>Modify listing</p>

				</section>
			</div>

			<!-- The landlords div containing tiles -->
			<div id="landlords" class="tile-container">
				<header class="modules"> Landlords </header>
				<section id="tile" class="show-popup" href="#" data-showpopup="5">
					<p>Add new landlord</p>

				</section>

				<section id="tile" class="show-popup" href="#" data-showpopup="6">
					<p>Modify details</p>

				</section>
			</div>



	</section>
</div>

<!-- CODE FOR THE POPUP PAGES GO HERE -->

<div class="overlay-bg">
</div>

<div class="overlay-content popup1">
  <section id ="content2">
    <header>Add a new user to OASIS  </header>

    <form method = "post" action = "?add=1">

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

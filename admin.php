<?php include "includes/admin_header.php";  ?>
<body>
	
	<div id = "container">

	<section id ="content">
		
		<header class = "highlight"> 
			
		</header>
	</section>

	<section id ="content2">
		<header>Welcome to the administrative center  </header>
		<header>Select a task to get started.  </header>
		<p class ="text">
		
				<input type = "button" value="Add new listing" />
				<input type = "button" value="Add new user" onclick="location.href='tasks/adduser.php'" />
				<input type = "button" value="Add new Landlord" />


		</p>
		

	</section>
</div>


	<script src="includes/js/jquery.js"></script>
	<script src="includes/js/main.js"></script>
</body>
<?php include "includes/footer.php" ?>

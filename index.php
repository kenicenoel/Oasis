<?php include_once ("includes/header.php") ?>

<body>
	<div id = "container">

		<div id ="left-sidebar">
	
			<header class = "highlight">
	
			</header>
		</div>
	
		<div id ="right-sidebar">
			<header>Welcome to OASIS by Student Advisory Services</header>
	
					
					<p class="text">To login, enter your student email and your password. For help, visit Student Advisory Services.</p>
	
					<form id="form" action= "includes/authenticate.php" method ="post" class ="ajax">
							<p id = "msg"></p>
							<span class="fa fa-envelope-o fa-fw"> </span><label for="emailAddress"> Email address</label>
							<input type = "text" id = "emailAddress" name="emailAddress" required autofocus/> <br><br>
							
							<span class="fa fa-keyboard-o fa-fw"> </span><label for="password"> Password</label>
							<input type = "password" id = "password" name="password" required /> <br>
							
							<input id ="submit" type = "submit" value="LOGIN" />
	
					</form>
	
	
				<?php include_once("includes/footer.php") ?>
		</div>
		
	</div>
	

</body>


<script src="includes/js/jquery.js"></script>
<script src="includes/js/main.js"></script>


<?php include_once("includes/header.php"); ?>

			<div id = "container">
		
				<div id ="left-sidebar">
			
<!--					<header class = "highlight"></header>-->
						<img src = 'images/oasisblue.svg' alt = "lt banner" />
				</div>
			
				<div id ="right-sidebar">
					<header>Welcome to OASIS by Student Advisory Services</header>
			
							
							<p class="text">To login, enter your student email and your password. For help, visit Student Advisory Services.</p>
			
							<form id="form" action= "" method ="post" class ="ajax">
									<p id = "msg"></p>
									<span class="fa fa-envelope-o fa-fw"> </span><label for="emailAddress"> Email address</label>
									<input type = "email" id = "email" name="email" required autofocus placeholder = "van.doe@my.uwi.edu" /> <br><br>
									
									<span class="fa fa-keyboard-o fa-fw"> </span><label for="password"> Password</label>
									<input type = "password" id = "password" name="password" required placeholder="@25MneuTy7d3" /> <br>
									
									<input id ="login-button" type = "submit" value="LOGIN" />
			
							</form>
							
							
			
						
				</div>
				
				
			</div>
			<footer id = "footer">
		
							<p class=footnote>
								&copy2015 Student Advisory Services. SAS cannot be held liable for the content on this website.
							</p>
			</footer>
			

	</body>
	<script type= "text/javascript" src="includes/js/jquery.js"></script>
	<script type= "text/javascript" src="includes/js/login.js"></script>
	
</html>

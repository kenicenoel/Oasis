<script type= "text/javascript" src="../includes/js/jquery.js"></script>
<script type= "text/javascript" src="../includes/js/main.js"></script>
<script type="text/javascript" src="../fancybox/source/jquery.fancybox.js"></script>
<script type="text/javascript" src="../fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
<script type="text/javascript" src="../fancybox/source/helpers/jquery.fancybox-media.js"></script>
<script type="text/javascript" src="../fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>

<!--Script to change the color of the nav bar-->
<script type="text/javascript">
	var accent = <?php echo json_encode($accent); ?>;
	$("#menu").css("background-color", accent);
	$("#menu ul").css("background-color", accent);
	$("header").css("color", accent);
	$(".subheading").css("color", accent);
	console.log(accent);
</script> 
<?php
	echo
	'<footer id = "footer">

		<p class=footnote>
			&copy2015 Student Advisory Services. SAS cannot be held liable for the content on this website.
		</p>
	</footer>
	</html>';

?>

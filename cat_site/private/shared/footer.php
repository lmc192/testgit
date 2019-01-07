<!-- FOOTER PAGE - THIS WILL BE LOADED IN EVERY PAGE ON THE SITE FOR CONSISTANCY -->
<footer>
	<!-- footer -->
	<!-- copyright with current year -->
	&copy; <?php echo date('Y'); ?> Laura Cain
</footer>
</body>
</html>
<!-- disconnects from database at the 'bottom' of each page -->
<?php
db_disconnect($db);
?>

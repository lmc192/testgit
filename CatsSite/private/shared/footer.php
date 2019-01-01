<!-- FOOTER PAGE - THIS WILL BE LOADED IN EVERY PAGE ON THE SITE FOR CONSISTANCY -->

		<!-- rickroll link -->
		<a href="<?php echo url_for('/rickroll.html') ?>">Don't Click Me!</a>

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

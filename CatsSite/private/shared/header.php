<!-- Set page title if not defined in page -->
<?php
  if(!isset($page_title)) { $page_title = 'Cat Site'; }
 ?>

<!DOCTYPE html>
<!--Define the website language-->
<html lang="en">
<html>
	<head>
		<!-- meta data for encoding and mobile -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- need to look up what media all is -->
		<link rel="stylesheet" media="all" href="stylesheets/styles.css" />

		<!-- temp styling remove -->
	<style>
		/* table / th - table header / td - table data */
		html, table, th, td {
		border: 1px solid black;
		}
	</style>

    <!-- get page title from page -->
		<title>CatSite - <?php echo $page_title; ?></title>
	</head>

	<body>
		<header>
			<!-- Header -->
			<!-- <h1><img src="images/header_image.jpg" alt="ginger">CATS</h1> -->
		</header>
		<!--<h1><img src="images/header_image.jpg" alt="ginger">CATS</h1>-->
		<p>Welcome to Cats Site!  Where you can add your cat to our database</p>
		<a href="testcss.html">CSS Test Page</a>

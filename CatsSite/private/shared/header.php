<!-- HEADER PAGE - THIS WILL BE LOADED IN EVERY PAGE ON THE SITE FOR CONSISTANCY -->

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
  <!-- link to stylesheet -->
  <link rel="stylesheet" media="all" href="<?php echo url_for('stylesheets/styles.css'); ?>">

  <!-- get page title from page -->
  <title>CatSite - <?php echo htmlspecialchars($page_title); ?></title>
</head>

<body>
  <header>
    <!-- Header -->
    <!-- <h1><img src="images/header_image.jpg" alt="ginger">CATS</h1> -->
  </header>
  <!--<h1><img src="images/header_image.jpg" alt="ginger">CATS</h1>-->
  <p>Welcome to Cats Site!  Where you can add your cat to our database</p>
  <a href="<?php echo url_for('stylesheets/testcss.html'); ?>">CSS Test Page</a>

  <!-- consider having a navigation menu here? -->
  <navigation>
    <ul>
      <li><a href="<?php echo url_for('/index.php'); ?>">Main Page</a></li>
    </ul>
  </navigation>

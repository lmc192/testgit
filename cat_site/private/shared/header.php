<!-- HEADER PAGE - THIS WILL BE LOADED IN EVERY PAGE ON THE SITE FOR CONSISTANCY -->

<!-- Set page title if not defined in page -->
<?php if(!isset($page_title)) { $page_title = 'Cat Site'; } ?>

<!DOCTYPE html>
<!--Define the website language-->
<html lang="en">
<html>
<head>
  <!-- meta data for encoding and mobile -->
  <meta charset="UTF-8">
  <!-- favicon https://www.youtube.com/watch?v=kEf1xSwX5D8-->
  <link rel="shortcut icon" type="image/png" href="<?php echo url_for('images/favicon.png'); ?>">
  <!-- link to stylesheet -->
  <link rel="stylesheet" href="<?php echo url_for('stylesheets/styles.css'); ?>">

   <!-- get page title from page -->
  <title>CatSite - <?php echo htmlspecialchars($page_title); ?></title>

<!-- HEADER CONTENT -->
</head>
<body>
  <header>
    <div class="content-wrap">
    <!-- Header -->
<img src="<?php echo url_for('images/header/cat_jump_2_light.png'); ?>" alt="Jump1">
<h1>CAT SITE</h1>
<img src="<?php echo url_for('images/header/cat_jump_light_right.png'); ?>" alt="Jump2">
  </div>
  </header>

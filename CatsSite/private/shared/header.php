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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- need to look up what media all is -->
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
    <h1>CAT SITE</h1>
  </div>
  </header>

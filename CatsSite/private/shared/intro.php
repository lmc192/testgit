<!-- <h1><img src="images/header_image.jpg" alt="ginger"></h1> -->

<!-- get count of cats to display on homepage -->
<?php $cat_count = cat_count() ?>

<div class="intro">
  <div class="content-wrap">
  <h2>Welcome to Cat Site!</h2>
  <h2>Where you can add your cat to our database</h2>
  <p>Cat Count: <?php echo $cat_count; ?></p>
</div>
</div>

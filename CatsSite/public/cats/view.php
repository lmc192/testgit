<!-- VIEW PAGE (consider renaming?) THIS DISPLAYS DETAILS OF THE CAT IN THE DATABASE -->

<!-- load all functions - Need full file path here as path definitions are contained within start.php -->
<?php require_once('../../private/start.php'); ?>

<!-- gets value and assign to local variable -->
<!-- default value is currently set to 1 -->
<?php  $id = $_GET['id'] ?? '1'; // PHP > v7.0

//get array and assign to variable to use in the page and display details
$cat = find_cat_by_id($id);
?>

<!-- Set Page Title -->
<?php $page_title = 'Cat Page'; ?>

<!-- get header -->
<?php include(SHARED_PATH . '/header.php'); ?>

<!-- PAGE INTRO SECTION -->
<div class="intro">
  <div class="content-wrap">
    <h2>VIEW CAT PAGE</h2>
    <h2>Here you can view the cats in the database!</h2>
    <p><?php echo "Cat ID: "; echo htmlspecialchars($id); ?></p>
  </div>
</div>

<!-- MAIN CONTENT SECTION -->
<div class="main-section">
  <div class="content-wrap">
    <p>Cat Name: <?php echo htmlspecialchars($cat['cat_name']); ?></p>
    <p>Position: <?php echo htmlspecialchars($cat['position']); ?></p>
    <p>Visible: <?php echo $cat['visible'] == '1' ? 'true' : 'false'; ?></p>

    <!-- show image for cat -->
    <img class="cat-img" src="<?php echo url_for('/images/' . $cat['file_path']); ?>  " ><br><br>

    <!-- Back Link -->
    <div class="back-link">
      <a href="<?php echo url_for('/index.php');?>">&laquo; Back to List</a>
    </div>
  </div>
</div>

<!-- get footer -->
<?php include(SHARED_PATH . '/footer.php'); ?>

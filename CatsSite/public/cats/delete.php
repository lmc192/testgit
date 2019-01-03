<!-- load all functions - Need full file path here as path definitions are contained within start.php -->
<?php require_once('../../private/start.php');

//check for an ID
if(!isset($_GET['id'])) {
  redirect_to(url_for('index.php'));
}
$id = $_GET['id'];

//if not a post request, display a form.  Then form will submit back to this page and delete data
if(is_post_request()) {

  $result = delete_cat($id);
  redirect_to(url_for('index.php'));

} else {
  // find the cat by the id
  $cat = find_cat_by_id($id);
}
?>

<!-- Set Page Title -->
<?php $page_title = 'Delete Cat'; ?>

<!-- get header -->
<?php include(SHARED_PATH . '/header.php'); ?>


<!-- PAGE INTRO SECTION -->
<div class="intro">
  <h1>Delete Cat</h1>
</div>

<!-- MAIN CONTENT SECTION -->
<div class="main-section">
  <div class="content-wrap">

    <?php

    //if cat has default.jpg - cannot delete and redisplay

    if($cat['file_path'] !== 'default.jpg') {
      echo 'CANNOT DELETE IT COS REASONS';
    } else {
    }

    ?>
    <p>are you sure?</p>
    <?php echo htmlspecialchars($cat['cat_name']); ?>

    <!-- Form creates a post request to return back to this page which prompts the delete to the DB -->
    <form id="delete" action="<?php echo url_for('cats/delete.php?id=' . htmlspecialchars(urlencode($cat['id']))); ?>" method="post">
      <input type="submit" name="commit" value="Delete Cat" />
    </form>

    <!-- <script>
    function myFunction() {
      document.getElementById("delete").submit();
    }
    </script> -->

    <!-- Go back to main list link - redundant cos I have main page link? -->
    <a href="<?php echo url_for('/index.php');?>">&laquo; Back to List</a>

  </div>
</div>

<!-- get footer -->
<?php include(SHARED_PATH . '/footer.php'); ?>

<!-- single page for sumbission here - not for new and create consider doing this later? -->

<!-- load all functions - Need full file path here as path definitions are contained within start.php -->
<?php require_once('../../private/start.php');

// if ID is not set then redirect back to index page
if (!isset($_GET['id'])) {
  redirect_to(url_for('/index.php'));
}
// declare ID variable, GET from previous POST (sent in from index.php)
$id = $_GET['id'];

// Handles new cat values sent in on form from new.php

//Check POST request is made here.
if(is_post_request()) {
  //Read values that have been submitted to this page by the form, put then in array
  $cat = [];
  $cat['id'] = $id;

  //define default values
  $cat['cat_name'] = $_POST['cat_name'] ?? '';
  $cat['position'] = $_POST['position'] ?? '';
  $cat['visible'] = $_POST['visible'] ?? '';

  //validations are contained within the update_cat() function so they are performed here also (before data is sent to DB)
  $result = update_cat($cat);
  if($result === true) {
      redirect_to(url_for('cats/show.php?id=' . $id));
  } else {
    $errors = $result;
    var_dump($errors);
  }


  // if not POST request, just show the form again
} else {
  //get array and assign to variable to use in the page and display details
  $cat = find_cat_by_id($id);

  $cat_count = cat_count();

}


?>

<!-- Set Page Title -->
<?php $page_title = 'Edit Cat'; ?>

<!-- get header -->
<?php include(SHARED_PATH . '/header.php'); ?>

<!-- Go back to main list link - redundant cos I have main page link? -->
<a href="<?php echo url_for('/index.php');?>">&laquo; Back to List</a>

<h1>Edit Cat</h1>
<h1>Cat Count: <?php echo $cat_count; ?></h1>

<!-- **EDIT CAT FORM** -->
<form action="<?php echo url_for('cats/edit.php?id=' . htmlspecialchars(urlencode($id)));?>" method="post">

  <!-- CAT NAME -->
  <dl>
    <dt>Cat Name</dt>
    <!-- displays the cat name which has been submitted on the form -->
    <dd><input type="text" name="cat_name" value="<?php echo htmlspecialchars($cat['cat_name']); ?>"></dd>
  </dl>

  <!-- POSITION -->
  <dl>
    <dt>Position</dt>
    <dd>
      <select name="position">
        <!-- create a loop to display each 'available' position in list (using a count of cats in the table) -->
        <?php
        for($i=1; $i <= $cat_count; $i++) {
          echo "<option value=\"{$i}\"";
          if($cat["position"] == $i) {
            echo " selected";
          }
          echo ">{$i}</option>";
        }
        ?>
      </select>
    </dd>
  </dl>

  <!-- VISIBLE -->
  <dl>
    <dt>Visible</dt>
    <dd>
      <input type="hidden" name="visible" value="0">
      <input type="checkbox" name="visible" value="1" <?php if ($cat['visible'] == "1") {echo " checked"; } ?>>
    </dd>
  </dl>
  <dl>
    <dt></dt>
    <dd>
      <input type="submit" value="Edit Cat">
    </dd>
  </dl>
</form>

<!-- get footer -->
<?php include(SHARED_PATH . '/footer.php'); ?>

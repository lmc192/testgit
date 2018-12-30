<!-- single page for sumbission here - not for new and create consider doing this later? -->

<!-- load all functions - Need full file path here as path definitions are contained within start.php -->
<?php require_once('../../private/start.php');

// if ID is not set then redirect back to index page
if (!isset($_GET['id'])) {
  redirect_to(url_for('/index.php'));
}
// declare variables
$id = $_GET['id'];
$cat_name = '';
$position = '';
$visible = '';

$test = $_GET['test'] ?? '';

// testing error functions
if($test == '404') {
  error_404();
} elseif($test == '500') {
  error_500();
}
// testredirect
elseif($test == 'redirect') {
  header("Location: ". url_for('index.php'));
  exit();
}


// Handles new cat values sent in from new.php

//Check post request is made here.
if(is_post_request()) {
  //Accesses Post Super Globals and asks for values sent in, then assigns these values to local variables.
  //Read values that have been submitted to this page by a form
  $cat_name = $_POST['cat_name'] ?? '';
  $position = $_POST['position'] ?? '';
  $visible = $_POST['visible'] ?? '';

  //Displays values sent in
  echo "Form parameters<br>";
  echo "Cat name: " . $cat_name . "<br>";
  echo "Position: " . $position . "<br>";
  echo "Visible: " . $visible . "<br>";
// if not post request, just show the form again
} else {

}
?>

<!-- Set Page Title -->
<?php $page_title = 'Edit Cat'; ?>

<!-- get header -->
<?php include(SHARED_PATH . '/header.php'); ?>

<!-- Go back to main list link - redundant cos I have main page link? -->
<a href="<?php echo url_for('/index.php');?>">&laquo; Back to List</a>

<h1>Edit Cat</h1>

<!-- Edit Cat Form -->
<form action="<?php echo url_for('cats/edit.php?id=' . htmlspecialchars(urlencode($id)));?>" method="post">
  <dl>
    <dt>Cat Name</dt>
    <!-- displays the cat name which has been submitted on the form -->
    <dd><input type="text" name="cat_name" value="<?php echo htmlspecialchars($cat_name); ?>"></dd>
  </dl>
  <dl>
    <dt>Position</dt>
    <dd>
      <select name="position">
        <option value="1"<?php if ($position == "1") {echo " selected"; } ?>>1</option>
      </select>
    </dd>
  </dl>
  <dl>
    <dt>Visible</dt>
    <dd>
      <input type="hidden" name="visible" value="0">
      <input type="checkbox" name="visible" value="1" <?php if ($visible == "1") {echo " checked"; } ?>>
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

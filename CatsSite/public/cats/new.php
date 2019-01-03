<!-- load all functions - Need full file path here as path definitions are contained within start.php -->
<?php require_once('../../private/start.php');

//Check post request is made here.
if(is_post_request()) {
  //Accesses Post Super Globals and asks for values sent in, then assigns these values to local variable array $cat
  //Read values that have been submitted to this page by a form
  $cat = [];
  $cat['cat_name'] = $_POST['cat_name'] ?? '';
  $cat['position'] = $_POST['position'] ?? '';
  $cat['visible'] = $_POST['visible'] ?? '';

  //check for true value then redirect with new value.
  $result = insert_cat($cat);
  if($result === true) {
    //http://php.net/manual/en/mysqli.insert-id.php - Returns the auto generated id used in the latest query
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('cats/view.php?id=' . $new_id));
  } else {
    $errors = $result;
  }
  // if not post request, redirect back to form
} else {
  //display the blank form
}

//Get local variables
$cat_count = cat_count() + 1;

$cat = [];
$cat["position"] = $cat_count;

?>

<!-- PAGE CONTENT -->
<!-- Set Page Title -->
<?php $page_title = 'New Cat'; ?>

<!-- get header -->
<?php include(SHARED_PATH . '/header.php'); ?>

<!-- PAGE INTRO SECTION -->
<div class="intro">
  <div class="content-wrap">
  <h2>CREATE CAT PAGE</h2>
    <h2>Here you can create new cats in the database!</h2>
    <p>Cat Count: <?php echo $cat_count; ?></p>
  </div>
</div>

<!-- MAIN CONTENT SECTION -->
<div class="main-section">
  <div class="content-wrap">
    <?php echo display_validation_errors($errors); ?>

    <!-- Submit New Cat Form -->
    <!-- sends form data to create.php -->
    <form action="<?php echo url_for('/cats/new.php'); ?>" method="post">
      <dl>
        <dt>Cat Name</dt>
        <dd><input type="text" name="cat_name" value=""></dd>
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

      <dt>Visible</dt>
      <dd>
        <input type="hidden" name="visible" value="0">
        <input type="checkbox" name="visible" value="1">
      </dd>
    </dl>
    <dl>
      <dt></dt>
      <dd>
        <input type="submit" value="Create Cat">
      </dd>
    </dl>
  </form>

  <!-- show image for cat -->
  <img class="cat-img" src= "<?php echo url_for('/images/default.jpg');?>" ><br><br>

  <!-- Go back to main list link - redundant cos I have main page link? -->
  <a href="<?php echo url_for('/index.php');?>">&laquo; Back to List</a>
</div>
</div>
<!-- get footer -->
<?php include(SHARED_PATH . '/footer.php'); ?>

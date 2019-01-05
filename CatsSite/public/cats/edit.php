<!-- single page for sumbission here - not for new and create consider doing this later? -->

<!-- load all functions - Need full file path here as path definitions are contained within start.php -->
<?php require_once('../../private/start.php');

// if ID is not set then redirect back to index page
if (!isset($_GET['id'])) {
  redirect_to(url_for('/index.php'));
}

// declare ID variable, GET from previous POST (sent in from index.php)
$id = $_GET['id'];
// $b_id = $_GET['breed_id'];
// Handles new cat values sent in on form from new.php

//Check POST request is made here.
if(is_post_request()) {
  //Read values that have been submitted to this page by the form, put then in array
  $cat = [];
  $cat['id'] = $id;
  // $breed = [];
  // $breed['id'] = $b_id;

  //define default values for page
  $cat['cat_name'] = $_POST['cat_name'] ?? '';
  $cat['position'] = $_POST['position'] ?? '';
  $cat['visible'] = $_POST['visible'] ?? '';
  $cat['breed_id'] = $_POST['breed_id'] ?? '';

// var_dump($_POST);

  // validations are contained within the update_cat() function so they are performed here also (before data is sent to DB)
  $result = update_cat($cat);
  if($result === true) {
    redirect_to(url_for('cats/view.php?id=' . $id));
  } else {
    $errors = $result;
  }
  // if not POST request, just show the form again
} else {
  //get array and assign to variable
  $cat = find_cat_by_id($id);
}

$cat_count = cat_count();

?>

<!-- Set Page Title -->
<?php $page_title = 'Edit Cat'; ?>

<!-- get header -->
<?php include(SHARED_PATH . '/header.php'); ?>

<!-- PAGE INTRO SECTION -->
<div class="intro">
  <div class="content-wrap">
    <h2>EDIT CAT PAGE</h2>
    <h2>Here you can edit the cats in the database!</h2>
    <p><?php echo "Cat ID: "; echo htmlspecialchars($id); ?></p>
  </div>
</div>

<?php echo display_validation_errors($errors); ?>


<!-- MAIN CONTENT SECTION -->
<div class="main-section">
  <div class="content-wrap">

    <!-- EDIT CAT FORM -->
    <form id="edit_cat" action="<?php echo url_for('cats/edit.php?id=' . htmlspecialchars(urlencode($id)));?>" method="post">

      <!-- CAT NAME -->
      <div>
        <label for="cat_name">Cat Name</label>
        <!-- displays the cat name which has been submitted on the form -->
        <input type="text" name="cat_name" value="<?php echo htmlspecialchars($cat['cat_name']); ?>"><br>
      </div>

      <!-- POSITION -->
      <div>
        <label for ="position">Position</label>
        <select name="position">
          <!-- create a loop to display each position in list (using a count of cats in the table) -->
          <?php
          for($i=1; $i <= $cat_count; $i++) {
            echo "<option value=\"{$i}\"";
            if($cat["position"] == $i) {
              echo " selected";
            }
            echo ">{$i}</option>";
          }
          ?>
        </select><br>
      </div>

      <!-- VISIBLE -->
      <div>
        <label for="visible">Visible</label>
        <input type="hidden" name="visible" value="0">
        <input type="checkbox" name="visible" value="1" <?php if ($cat['visible'] == "1") {echo " checked"; } ?>><br>
      </div>

      <!-- BREED -->
      <div>
        <label for ="breed">Breed</label>
        <select name="breed_id">
            <!-- create a loop to display each breed in list -->
            <?php
              $breeds_set = find_all_breeds();
              while($breed = mysqli_fetch_assoc($breeds_set)) {
                echo "<option value=\"" . htmlspecialchars($breed['id']) . "\"";
                if($cat["breed_id"] == $breed['id']) {
                  echo " selected";
                }
                echo ">" . htmlspecialchars($breed['breed_name']) . "</option>";
              }
               mysqli_free_result($breed_set);
            ?>
        </select><br>
      </div>

      <!--SUBMIT BUTTON-->
      <div>
        <input type="submit" value="Edit Cat">
      </div>
    </form>



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

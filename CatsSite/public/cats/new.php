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
  $cat['breed_id'] = $_POST['breed_id'] ?? '';

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
    <h2 id="test">CREATE CAT PAGE</h2>
    <h2>Here you can create new cats in the database!</h2>
    <p>Cat Count: <?php echo $cat_count; ?></p>
  </div>
</div>

<!-- MAIN CONTENT SECTION -->
<div class="main-section">
  <div class="content-wrap">
    <?php echo display_validation_errors($errors); ?>

    <!-- NEW CAT FORM -->
    <!-- sends form data to create.php -->

    <div>
      <form id="create_cat_form" name="create_cat_form" action="<?php echo url_for('/cats/new.php'); ?>" method="post">
        <p id="formerror">TEST</p>
        <!-- CAT NAME -->
        <div>

          <label for="cat_name">Cat Name: </label>
          <input type="text" id="cat_name" name="cat_name" value=""><br>
        </div>

        <!-- POSITION -->
        <div>
          <label for="position">Position:</label>
          <select id="position" name="position">
            <!-- create a loop to display each 'available' position in list (using a count of cats in the table) -->
            <?php
            for($i=1; $i <= $cat_count; $i++) {
              echo "<option value=\"{$i}\"";
              if($cat["position"] == $i) {
                echo " selected";
              }
              echo ">{$i}</option>";
            } ?>
          </select><br>
        </div>

        <!-- VISIBLE -->
        <div>
          <label for="visible">Visible</label>
          <input type="hidden" id="visible" name="visible" value="0">
          <input type="checkbox" id="visible" name="visible" value="1"><br>
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
                  echo ">" . htmlspecialchars($breed['breed_name']) . "</option>";
                }
                 mysqli_free_result($breed_set);
              ?>
          </select><br>
        </div>

        <!--SUBMIT BUTTON-->
        <div>
          <input id="createbutton" name="createbutton" type="submit" value="Create Cat">
        </div>
      </form>
    </div>
    <!-- show image for cat -->
    <img class="cat-img" src= "<?php echo url_for('/images/default.jpg');?>" ><br><br>

    <!-- Back Link -->
    <div class="back-link">
      <a href="<?php echo url_for('/index.php');?>">&laquo; Back to List</a>
    </div>
  </div>
</div>


<!-- TESTING JAVASCRIPT -->

<!-- link to javascript -->
<script src="<?php echo url_for('../public/scripts/scripts.js'); ?>"></script>


<!-- get footer -->
<?php include(SHARED_PATH . '/footer.php'); ?>

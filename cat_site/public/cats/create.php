<!-- load all functions - Need full file path here as path definitions are contained within start.php -->
<?php require_once('../../private/start.php');

//Check post request is made here.
if(is_post_request()) {
  //Accesses Post Super Globals and asks for values sent in, then assigns these values to local variable array $cat
  //Read values that have been submitted to this page by a form
  $cat = [];
  $cat['cat_name'] = $_POST['cat_name'] ?? '';
  $cat['ranking'] = $_POST['ranking'] ?? '';
  $cat['visible'] = $_POST['visible'] ?? '';
  $cat['breed_id'] = $_POST['breed_id'] ?? '';
  $cat['gender_id'] = $_POST['gender_id'] ?? '';
  $cat['age'] = $_POST['age'] ?? '';

  // check for true value then redirect with new value.
  $result = insert_cat($cat);
  if($result === true) {
    // Returns the auto generated id used in the latest query
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('cats/view.php?id=' . $new_id));
    // if not post request, redirect back to form
  }
} else {
  //display the blank form
}

//Get local variables
$cat_count = cat_count() + 1;

//array for displaying the list of numbers in the ranking select part of the form
$cat = [];
$cat["ranking"] = $cat_count;

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
    <p>Cat Count will be: <?php echo $cat_count; ?></p>
  </div>
</div>

<!-- MAIN CONTENT SECTION -->
<div class="main-section">
  <div class="content-wrap">

    <!-- NEW CAT FORM -->
    <!-- sends form data to create.php -->
    <div>
      <form id="create_cat_form" name="create_cat_form" action="<?php echo url_for('/cats/create.php'); ?>" method="post">
        <p class="validate" id="formerrorname"></p>
        <p class="validate" id="formerrorage"></p>

        <!-- CAT NAME -->
        <div>
          <label for="cat_name">Cat Name: </label>
          <input type="text" id="cat_name" name="cat_name" value=""><br>
        </div>

        <!-- AGE -->
        <div>
          <label for="age">Age: </label>
          <input type="text" id="age" name="age" value=""><br>
        </div>

        <!-- RANKING -->
        <div>
          <label for="ranking">Ranking: </label>
          <select id="ranking" name="ranking">
            <!-- create a loop to display a list of numbers using a count of cats in the table -->
            <?php
            for($i=1; $i <= $cat_count; $i++) {
              echo "<option value=\"{$i}\"";
              if($cat["ranking"] == $i) {
                echo " selected";
              }
              echo ">{$i}</option>";
            } ?>
          </select><br>
        </div>

        <!-- GENDER -->
        <div>
          <label for ="gender">Gender: </label>
          <select name="gender_id">
            <!-- create a loop to display each gender in list -->
            <?php
            $gender_set = find_all_genders();
            while($gender = mysqli_fetch_assoc($gender_set)) {
              echo "<option value=\"" . htmlspecialchars($gender['gender_id']) . "\"";
              echo ">" . htmlspecialchars($gender['gender_name']) . "</option>";
            }
            mysqli_free_result($gender_set);
            ?>
          </select><br>
        </div>

        <!-- BREED -->
        <div>
          <label for ="breed">Breed: </label>
          <select name="breed_id">
            <!-- create a loop to display each breed in list -->
            <?php
            $breeds_set = find_all_breeds();
            while($breed = mysqli_fetch_assoc($breeds_set)) {
              echo "<option value=\"" . htmlspecialchars($breed['breed_id']) . "\"";
              echo ">" . htmlspecialchars($breed['breed_name']) . "</option>";
            }
            mysqli_free_result($breed_set);
            ?>
          </select><br>
        </div>

        <!--SUBMIT BUTTON-->
        <div>
          <input class="create_cat_button" id="createbutton" name="createbutton" type="submit" value="Create Cat">
        </div>
      </form>
    </div>

    <!-- Back Link -->
    <div class="back-link">
      <a href="<?php echo url_for('/index.php');?>">&laquo; Back to List</a>
    </div>

    <!-- show image for cat -->
    <img class="cat-img" src= "<?php echo url_for('/images/uploads/default.jpg');?>" ><br><br>

  </div>
</div>

<!-- link to javascript -->
<script src="<?php echo url_for('../public/scripts/createform.js'); ?>"></script>

<!-- get footer -->
<?php include(SHARED_PATH . '/footer.php'); ?>

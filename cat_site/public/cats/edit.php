<!-- load all functions - Need full file path here as path definitions are contained within start.php -->
<?php require_once('../../private/start.php');

// if ID is not set then redirect back to index page
if (!isset($_GET['id'])) {
  redirect_to(url_for('/index.php'));
}

// declare ID variable, GET from previous POST (sent in from index.php)
$id = $_GET['id'];
// $b_id = $_GET['breed_id'];
// Handles new cat values sent in on form from create.php

//Check POST request is made here.
if(is_post_request()) {
  //Read values that have been submitted to this page by the form, put then in array
  $cat = [];
  $cat['id'] = $id;

  //define default values for page
  $cat['cat_name'] = $_POST['cat_name'] ?? '';
  $cat['ranking'] = $_POST['ranking'] ?? '';
  $cat['visible'] = $_POST['visible'] ?? '';
  $cat['breed_id'] = $_POST['breed_id'] ?? '';
  $cat['gender_id'] = $_POST['gender_id'] ?? '';
  $cat['age'] = $_POST['age'] ?? '';

  // validations are contained within the update_cat() function so they are performed here also (before data is sent to DB)
  $result = update_cat($cat);
  if($result === true) {
    redirect_to(url_for('cats/view.php?id=' . $id));
    // if not POST request, just show the form again
  }
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

<!-- MAIN CONTENT SECTION -->
<div class="main-section">
  <div class="content-wrap">

    <!-- EDIT CAT FORM -->
    <!-- sends form data to edit.php -->
    <div>
      <form id="edit_cat_form"  name="edit_cat_form" action="<?php echo url_for('cats/edit.php?id=' . htmlspecialchars(urlencode($id)));?>" method="post">
        <p class="validate" id="formerrorname"></p>
        <p class="validate" id="formerrorage"></p>

        <!-- CAT NAME -->
        <div>
          <label for="cat_name">Cat Name: </label>
          <!-- displays the cat name which has been submitted on the form -->
          <input type="text" id="cat_name" name="cat_name" value="<?php echo htmlspecialchars($cat['cat_name']); ?>"><br>
        </div>

        <!-- AGE -->
        <div>
          <label for="age">Age: </label>
          <!-- displays the cat age which has been submitted on the form -->
          <input type="text" id="age" name="age" value="<?php echo htmlspecialchars($cat['age']); ?>"><br>
        </div>

        <!-- RANKING -->
        <div>
          <label for ="ranking">Ranking: </label>
          <select id="ranking" name="ranking">
            <!-- create a loop to display a list of numbers using a count of cats in the table -->
            <?php
            for($i=1; $i <= $cat_count; $i++) {
              echo "<option value=\"{$i}\"";
              if($cat["ranking"] == $i) {
                echo " selected";
              }
              echo ">{$i}</option>";
            }
            ?>
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
              if($cat["gender_id"] == $gender['gender_id']) {
                echo " selected";
              }
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
              if($cat["breed_id"] == $breed['breed_id']) {
                echo " selected";
              }
              echo ">" . htmlspecialchars($breed['breed_name']) . "</option>";
            }
            mysqli_free_result($breeds_set);
            ?>
          </select><br>
        </div>

        <!--SUBMIT BUTTON-->
        <div>
          <input class="create_cat_button" type="submit" value="Edit Cat">
        </div>
      </form>
    </div>

    <!-- Back Link -->
    <div class="back-link">
      <a href="<?php echo url_for('/index.php');?>">&laquo; Back to List</a>
    </div>

    <!-- show image for cat -->
    <img class="cat-img" src="<?php echo url_for('/images/uploads/' . $cat['file_path']); ?>  " ><br><br>

  </div>
</div>

<!-- TESTING JAVASCRIPT -->
<!-- link to javascript -->
<script src="<?php echo url_for('../public/scripts/editform.js'); ?>"></script>

<!-- get footer -->
<?php include(SHARED_PATH . '/footer.php'); ?>

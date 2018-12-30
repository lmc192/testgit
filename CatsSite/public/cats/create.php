<!-- load all functions - Need full file path here as path definitions are contained within start.php -->
<?php require_once('../../private/start.php');

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
// if not post request, redirect back to form
} else {
  redirect_to(url_for('/cats/new.php'));
}
?>

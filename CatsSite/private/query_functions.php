<?php

// Fundtion to run query to get all data from cat table
function find_all_cats() {
  //get global db variable to access it
  global $db;
  //SQL Select Query
  $sql = "SELECT * FROM cats ";
  $sql .= "ORDER BY position ASC";
  //Get data
  $result = mysqli_query($db, $sql);
  return $result;
}

 ?>

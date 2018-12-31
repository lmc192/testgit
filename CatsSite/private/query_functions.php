<?php

// Fundtion to run query to get all data from cat table
function find_all_cats() {
  //get global db variable to access it
  global $db;
  //SQL Select Query
  $sql = "SELECT * FROM cats ORDER BY position ASC";
  //Get data
  $result = mysqli_query($db, $sql);
  // Test if query sucessful
  confirm_result_set($result);
  return $result;
}

//Function to look up cat by the PK
function find_cat_by_id($id) {
  //get global db variable to access it
  global $db;
  $sql = "SELECT * FROM cats WHERE id= '" . $id . " ' "; // SELECT * FROM cats WHERE id = '$id';
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $cat = mysqli_fetch_assoc($result);
  // free memory
  mysqli_free_result($result);
  //return an assoc array
  return $cat;
}

// COPIED FROM HIS ONE FOR REFERENCE
// function find_subject_by_id($id) {
//   global $db;
//
//   $sql = "SELECT * FROM subjects ";
//   $sql .= "WHERE id='" . $id . "'";
//   $result = mysqli_query($db, $sql);
//   confirm_result_set($result);
//   $subject = mysqli_fetch_assoc($result);
//   mysqli_free_result($result);
//   return $subject; // returns an assoc. array
// }

function insert_cat($cat_name, $position, $visible) {
  //get global db variable to access it
  global $db;
  //SQL INSERT query.  Divided up so values can be used later.  include single quote around variables for security
  $sql = "INSERT INTO cats (cat_name, position, visible)";
  $sql .= "VALUES (";
  $sql .= " ' " . $cat_name . " ', ";
  $sql .= " ' " . $position . " ', ";
  $sql .= " ' " . $visible . " ' ";
  $sql .= ")";

  //SQL INSERT returns true / false
  $result = mysqli_query($db, $sql);

  if($result) {
    //INSERT sucessfull
    return true;
  } else {
    //INSERT fails
    echo mysql_error($db);
    db_disconnect($db);
    exit;
  }
}
?>

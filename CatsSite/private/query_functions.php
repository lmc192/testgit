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

// Function to insert new cat into DB
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

// Function to update exiting cat record
function update_cat($cat) {
  //get global db variable to access it
  global $db;
  //SQL INSERT query.
  $sql = "UPDATE cats SET ";
  $sql .= "cat_name= ' " . $cat['cat_name'] . " ', ";
  $sql .= "position= ' " . $cat['position'] . " ', ";
  $sql .= "visible= ' " . $cat['visible'] . " ' ";
  $sql .= "WHERE id= ' " . $cat['id'] . " ' ";
  $sql .= "LIMIT 1";

  //SQL UPDATE returns true / false
  $result = mysqli_query($db, $sql);

  if($result) {
    //UPDATE sucessful - go to show page and display updated data
    return true;
  } else {
    //UPDATE failes
    echo mysql_error($db);
    db_disconnect($db);
    exit;
  }

}

// Function to count number of cats in the table
function cat_count() {
  global $db;
  $cat_set = find_all_cats();
  $result = mysqli_num_rows($cat_set);
  mysqli_free_result($cat_set);
  return $result;
}

function delete_cat($id) {
  global $db;
  //delete
  $sql = "DELETE FROM cats ";
  $sql .= "WHERE id= ' " . $id . " ' ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);

  //For DELETE query, result is true / false
  if($result) {
    return true;
  } else {
    //UPDATE failes
    echo mysql_error($db);
    db_disconnect($db);
    exit;
  }
}

?>

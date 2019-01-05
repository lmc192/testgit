<?php

// Function to count number of cats in the table
function breed_count() {
  global $db;
  $breed_set = find_all_breeds();
  $result = mysqli_num_rows($breed_set);
  mysqli_free_result($breed_set);
  return $result;
}

// Function to run query to get all data from breed table
function find_all_breeds() {
  //get global db variable to access it
  global $db;
  //SQL Select Query
  $sql = "SELECT * FROM breeds";
  //Get data
  // $result = mysqli_query($db, $sql); //REMOVED TO MAKE CONNECTION OBJECT ORIENTATED
  $result = $db->query($sql);
  // Test if query sucessful
  confirm_result_set($result);
  return $result;
}

//Function to look up breed by the PK
function find_breed_by_id($id) {
  //get global db variable to access it
  global $db;
  $sql = $sql = "SELECT * FROM breeds ";
  //http://php.net/manual/en/mysqli.real-escape-string.php - Escapes special characters in a string for use in an SQL statement, taking into account the current charset of the connection
  //Helps prevent SQLi
  $sql .= "WHERE id= ' " . mysqli_real_escape_string($db, $id) . " ' "; // SELECT * FROM breed WHERE id = '$id';
  //echo $sql;
  // $result = mysqli_query($db, $sql); //REMOVED TO MAKE CONNECTION OBJECT ORIENTATED
  $result = $db->query($sql);
  confirm_result_set($result);
  $cat = mysqli_fetch_assoc($result);
  // free memory
  mysqli_free_result($result);
  //return an assoc array
  return $breed;
}

// Function to run query to get all data from cat table
function find_all_cats() {
  //get global db variable to access it
  global $db;
  //SQL Select Query
  $sql = "SELECT * FROM breeds b INNER JOIN cats c ON b.id = c.breed_id";
  //Get data
  // $result = mysqli_query($db, $sql); //REMOVED TO MAKE CONNECTION OBJECT ORIENTATED
  $result = $db->query($sql);
  // Test if query sucessful
  confirm_result_set($result);
  return $result;
}

//Function to look up cat by the PK
function find_cat_by_id($id) {
  //get global db variable to access it
  global $db;
  $sql = "SELECT * FROM cats c INNER JOIN breeds b ON c.breed_id = b.id ";
  //http://php.net/manual/en/mysqli.real-escape-string.php - Escapes special characters in a string for use in an SQL statement, taking into account the current charset of the connection
  //Helps prevent SQLi
  $sql .= "WHERE c.id= ' " . mysqli_real_escape_string($db, $id) . " ' "; // SELECT * FROM cats WHERE id = '$id';
  //echo $sql;
  // $result = mysqli_query($db, $sql); //REMOVED TO MAKE CONNECTION OBJECT ORIENTATED
  $result = $db->query($sql);
  confirm_result_set($result);
  $cat = mysqli_fetch_assoc($result);
  // free memory
  mysqli_free_result($result);
  //return an assoc array
  return $cat;
}

function validate_cat($cat) {

  //create new array for $errors
  $errors = [];

  //$cat_name - not blank and min 2 char max 255 char
  if(is_blank($cat['cat_name'])) {
    //add item to the array
    $errors[] = "Name cannot be blank. All kitties need a name";
  } elseif(!has_length($cat['cat_name'], ['min' => 2, 'max' => 255])) {
    $errors[] = "Name must be between 2 and 255 characters length";
  }

  //$position - only integers between 0 - 999
  //type cast position as integer - work with this for validation
  $position_int = (int) $cat['position'];
  if($position_int <= 0) {
    $errors[] = "Position must be greater than 0";
  }
  if($position_int > 999) {
    $errors[] = "Position must be less than 999. Too many cats man";
  }

  //$visible - must be string and must return true or false
  $visible_string = (string) $cat['visible'];
  if(!has_inclusion_of($visible_string, ["0", "1"])) {
    $errors[] = "Visible must be true or false";
  }
  return $errors;
}

// Function to insert new cat into DB
function insert_cat($cat) {
  //get global db variable to access it
  global $db;

  //validate data - gets any errors in a new variable array
  $validation_errors = validate_cat($cat);

  //http://php.net/manual/en/function.empty.php - checks if variable is empty
  if(!empty($validation_errors)) {
    //if there are errors (data in the array) then return those errors and do not execute SQL code
    return $validation_errors;
  }

  // else go ahead and update
  //SQL INSERT query.  Divided up so values can be used later.  include single quote around variables for security
  $sql = "INSERT INTO cats (cat_name, position, visible, breed_id)";
  $sql .= "VALUES (";
  $sql .= " '" . mysqli_real_escape_string($db, $cat['cat_name']) . "', ";
  $sql .= " '" . mysqli_real_escape_string($db, $cat['position']) . "', ";
  $sql .= " '" . mysqli_real_escape_string($db, $cat['visible']) . "', ";
  $sql .= " '" . mysqli_real_escape_string($db, $cat['breed_id']) . "' ";
  $sql .= ")";

  //SQL INSERT returns true / false
  // $result = mysqli_query($db, $sql); //REMOVED TO MAKE CONNECTION OBJECT ORIENTATED
  $result = $db->query($sql);

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

  //validate data - gets any errors in a new variable array
  // $validation_errors = validate_cat($cat);
  //
  // //http://php.net/manual/en/function.empty.php - checks if variable is empty
  // if(!empty($validation_errors)) {
  //   //if there are errors (data in the array) then return those errors and do not execute SQL code
  //   return $validation_errors;
  // }

  // else go ahead and UPDATE
  //SQL UPDATE query.
  $sql = "UPDATE cats SET ";
  $sql .= "cat_name= '" . mysqli_real_escape_string($db, $cat['cat_name']) . "', ";
  $sql .= "position= '" . mysqli_real_escape_string($db, $cat['position']) . "', ";
  $sql .= "visible= '" . mysqli_real_escape_string($db, $cat['visible']) . "', ";
  $sql .= "breed_id= '" . mysqli_real_escape_string($db, $cat['breed_id']) . "' ";
  $sql .= "WHERE id= '" . mysqli_real_escape_string($db, $cat['id']) . "' ";
  $sql .= "LIMIT 1";

  //SQL UPDATE returns true / false
  // $result = mysqli_query($db, $sql); //REMOVED TO MAKE CONNECTION OBJECT ORIENTATED
  $result = $db->query($sql);

  if($result) {
    //UPDATE sucessful - go to view page and display updated data
    return true;
  } else {
    //UPDATE fails
    echo mysqli_error($db);
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

?>

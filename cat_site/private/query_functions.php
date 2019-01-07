<?php

  // Changed syntax slightly to:  $result = mysqli_query($db, $sql); //REMOVED TO MAKE CONNECTION OBJECT ORIENTATED

// Function to run query to get all data from gender
function find_all_genders() {
  //get global db variable to access it
  global $db;
  //SQL Select Query
  $sql = "SELECT * FROM genders";
  //Get data
  // $result = $db->query($sql);
  $result = mysqli_query($db, $sql);
  // Test if query sucessful
  confirm_result_set($result);
  return $result;
}

// Function to run query to get all data from breed table
function find_all_breeds() {
  //get global db variable to access it
  global $db;
  //SQL Select Query
  $sql = "SELECT * FROM breeds";
  //Get data
  $result = $db->query($sql);
  // Test if query sucessful
  confirm_result_set($result);
  return $result;
}

// Function to run query to get all data from cat table
function find_all_cats() {
  //get global db variable to access it
  global $db;
  //SQL Select Query
  $sql = "SELECT * FROM breeds b
  INNER JOIN cats c ON b.breed_id = c.breed_id
  INNER JOIN genders d on c.gender_id = d.gender_id
  ORDER BY c.ranking asc ";
  //Get data
  $result = $db->query($sql);
  // Test if query sucessful
  confirm_result_set($result);
  return $result;
}

//Function to look up cat by the PK
function find_cat_by_id($id) {
  //get global db variable to access it
  global $db;
  $sql = "SELECT * FROM cats c
  INNER JOIN breeds b ON c.breed_id = b.breed_id
  INNER JOIN genders d on c.gender_id = d.gender_id ";
  //http://php.net/manual/en/mysqli.real-escape-string.php - Escapes special characters in a string for use in an SQL statement, taking into account the current charset of the connection
  //Helps prevent SQLi
  $sql .= "WHERE c.id= ' " . mysqli_real_escape_string($db, $id) . " ' "; // SELECT * FROM cats WHERE id = '$id';
  //echo $sql;
  $result = $db->query($sql);
  confirm_result_set($result);
  $cat = mysqli_fetch_assoc($result);
  // free memory
  mysqli_free_result($result);
  //return an assoc array
  return $cat;
}

// Function to insert new cat into DB
function insert_cat($cat) {
  //get global db variable to access it
  global $db;

  //SQL INSERT query.  Divided up so values can be used later.  include single quote around variables for security
  $sql = "INSERT INTO cats (cat_name, age, ranking, breed_id, gender_id) ";
  $sql .= "VALUES (";
  $sql .= " '" . mysqli_real_escape_string($db, $cat['cat_name']) . "', ";
  $sql .= " '" . mysqli_real_escape_string($db, $cat['age']) . "', ";
  $sql .= " '" . mysqli_real_escape_string($db, $cat['ranking']) . "', ";
  $sql .= " '" . mysqli_real_escape_string($db, $cat['breed_id']) . "', ";
  $sql .= " '" . mysqli_real_escape_string($db, $cat['gender_id']) . "' ";
  $sql .= ")";

  //SQL INSERT returns true / false
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

  //SQL UPDATE query.
  $sql = "UPDATE cats SET ";
  $sql .= "cat_name= '" . mysqli_real_escape_string($db, $cat['cat_name']) . "', ";
  $sql .= "age= '" . mysqli_real_escape_string($db, $cat['age']) . "', ";
  $sql .= "ranking= '" . mysqli_real_escape_string($db, $cat['ranking']) . "', ";
  $sql .= "breed_id= '" . mysqli_real_escape_string($db, $cat['breed_id']) . "', ";
  $sql .= "gender_id= '" . mysqli_real_escape_string($db, $cat['gender_id']) . "' ";
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

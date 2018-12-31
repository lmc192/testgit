<?php
require_once('db_credentials.php');

//Creates new connection to database
function db_connect() {
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  //checks connections sucessfull
  confirm_db_connect();
  return $connection;
}
// Close connection
function db_disconnect($connection) {
  if(isset($connection)) {
    mysqli_close($connection);
  }
}
// Test if connection sucessful
function confirm_db_connect() {
  if(mysqli_connect_errno()) {
    $msg = "Database connection failed: ";
    $msg .= mysqli_connect_error();
    $msg .= " (" . mysqli_connect_errno() . ")";
    exit($msg);
  }
}
// Test if query sucessfull
function confirm_result_set($result_set) {
  if (!$result_set) {
    exit("Database query failed.");
  }
}
?>

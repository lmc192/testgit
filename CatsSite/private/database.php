<?php
require_once('db_credentials.php');

//Creates new connection to database
function db_connect() {
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  return $connection;
}
// Close connection
function db_disconnect($connection) {
  if(isset($connection)) {
    mysqli_close($connection);
  }
}
?>

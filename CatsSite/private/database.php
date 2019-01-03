<?php
require_once('db_credentials.php');


// Create connection
$db = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Test if query sucessful
function confirm_result_set($result_set) {
  if (!$result_set) {
    exit("Database query failed.");
  }
}

// Close connection
function db_disconnect($connection) {
  if(isset($connection)) {
    mysqli_close($connection);
  }
}
?>

<?php
// REMOVED ALL OF THE BELOW CODE TO MAKE OBJECT ORIENTATED
// Creates new connection to database
// function db_connect() {
//   $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
//   //checks connections sucessfull
//   confirm_db_connect();
//   return $connection;
// }
//
// // Test if connection sucessful
// function confirm_db_connect() {
//   if(mysqli_connect_errno()) {
//     $msg = "Database connection failed: ";
//     $msg .= mysqli_connect_error();
//     $msg .= " (" . mysqli_connect_errno() . ")";
//     exit($msg);
//   }
// }
?>

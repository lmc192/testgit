<?php
require_once 'cat_site.config.php';

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
function db_disconnect($db) {
  if(isset($db)) {
    mysqli_close($db);
  }
}
?>

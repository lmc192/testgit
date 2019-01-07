<?php
// works out if a path is absolute or relative and fixes the path
function url_for($script_path) {
  // add the leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}

//Redirect function - returns location header to server to instantly redirect the page
function redirect_to($location) {
  header("Location: " . $location);
}

//Checks if a POST or GET request was made.  Used for forms to check data is sent or requsested.
function is_post_request() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}
function is_get_request() {
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}
?>

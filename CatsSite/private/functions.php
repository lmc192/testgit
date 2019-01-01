<!-- function library -->
<?php

// works out if a path is absolute or relative and fixes the path
function url_for($script_path) {
  // add the leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}

// test
function writeMsg() {
    echo "Hello world!";
  }

// test
function doSomething() {
  echo "Yo What's Up I'm totally testing PHP";
}

// error handling functions - TESTING FOR NOW
function error_404(){
  header($_SERVER["SERVER_PROTOCOL"] . " 404 Oh Noes! No Kitties Here!");
  echo "BOO BAD TIMES";
  // send and quit
  exit();
}

function error_500() {
  header($_SERVER["SERVER_PROTOCOL"] . " 500 Oh Noes! Kitty ate the server!");
  // send and quit
  exit();
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

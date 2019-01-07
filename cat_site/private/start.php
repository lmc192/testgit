<!-- Initialises all required functions,
global variables, constants and database connections
used throughout the site -->
<?php
//turn on output buffering first
ob_start();

// Assign file paths to PHP constants
// __FILE__ returns the current path to this file
// dirname() returns the path to the parent directory

//creates a constant called 'PRIVATE_PATH' which points to parent directory here
//cat_site/private
define("PRIVATE_PATH", dirname(__FILE__));

//uses the constant PRIVATE_PATH to create a new constant for the shared folder contained within the private directory
//use SHARED_PATH for referring to pages contained within the private/shared directry (header / footer / table / intro)
define("SHARED_PATH", PRIVATE_PATH . '/shared');

// Assign the root URL to a PHP constant
// * Do not need to include the domain
// * Use same document root as webserver
// * Can set a hardcoded value:
// define("WWW_ROOT", '/~user/cat_site/public');
// define("WWW_ROOT", '');
// * Can dynamically find everything in URL up to "/public"
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

// load functions file
require_once 'functions.php';

//load database connection functions file
require_once 'database.php';

//Load SQL query functions file
require_once 'query_functions.php';

?>

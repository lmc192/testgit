<!-- load all functions - Need full file path here as path definitions are contained within start.php -->
<?php require_once('../private/start.php');

$test = $_GET['test'] ?? '';

if($test == '404') {
  error_404();
} elseif($test == '500') {
  error_500();
} else {
  echo 'No Error Whhaa?';
}
?>

<!-- load all functions - Need full file path here as path definitions are contained within start.php -->
<?php require_once('../private/start.php'); ?>

<!-- Set Page Title -->
<?php $page_title = 'Main Page'; ?>

<!-- get header -->
<?php include(SHARED_PATH . '/header.php'); ?>

<?php echo "this is a test page"; ?>

<!-- testing error pages -->
<? php
$test = $_GET['test'] ?? '';

if($test == '404') {
  error_404();
} elseif($test == '500') {
  error_500();
}
// testredirect
elseif($test == 'redirect') {
  header("Location: ". url_for('index.php'));
  exit();
}
?>


<!-- get footer -->
<?php include(SHARED_PATH . '/footer.php'); ?>

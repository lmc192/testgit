<!-- SHOW PAGE (consider renaming?) THIS SHOWS DETAILS OF THE CAT IN THE DATABASE -->

<!-- load all functions - Need full file path here as path definitions are contained within start.php -->
<?php require_once('../../private/start.php'); ?>

<!-- gets value and assign to local variable -->
<!-- default value is currently set to 1 -->
<?php  $id = $_GET['id'] ?? '1'; // PHP > v7.0 ?>
<?php // $id = isset($_GET['id']) ? $_GET['id'] : '1'; ?>

<!-- Set Page Title -->
<?php $page_title = 'Cat Page'; ?>

<!-- get header -->
<?php include(SHARED_PATH . '/header.php'); ?>

<h1><?php echo "this is the show page"; ?></h1>

<!-- Go back to main list link - redundant cos I have main page link? -->
<a href="<?php echo url_for('/index.php');?>">&laquo; Back to List</a>

<!-- use htmlspecialchars to prevent XSS. DO THIS ANYTIME DYNAMIC DATA IS USED! -->
<h2><?php echo "Here is the Cat ID: "; echo htmlspecialchars($id); ?></h2>

<!-- use urlencode() to handle special characters in parameters -->
<a href="show.php?name=<?php echo urlencode('John Doe'); ?>">Link</a><br />
<a href="show.php?company=<?php echo urlencode('Widgets&More'); ?>">Link</a><br />
<a href="show.php?query=<?php echo urlencode('!#*?'); ?>">Link</a><br />


<!-- get footer -->
<?php include(SHARED_PATH . '/footer.php'); ?>

<!-- load all functions - Need full file path here as path definitions are contained within start.php -->
<?php require_once('../../private/start.php');

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

<!-- Set Page Title -->
<?php $page_title = 'New Cat'; ?>

<!-- get header -->
<?php include(SHARED_PATH . '/header.php'); ?>

<!-- Go back to main list link - redundant cos I have main page link? -->
<a href="<?php echo url_for('/index.php');?>">&laquo; Back to List</a>

<h1>Create Cat</h1>

<!-- Submit New Cat Form -->
<!-- sends form data to create.php -->
<form action="<?php echo url_for('/cats/create.php'); ?>" method="post">
  <dl>
    <dt>Cat Name</dt>
    <dd><input type="text" name="cat_name" value=""></dd>
  </dl>
  <dl>
    <dt>Position</dt>
    <dd>
      <select name="position">
        <option value="1">1</option>
      </select>
    </dd>
  </dl>
  <dl>
    <dt>Visible</dt>
    <dd>
      <input type="hidden" name="visible" value="0">
      <input type="checkbox" name="visible" value="1">
    </dd>
  </dl>
  <dl>
    <dt></dt>
    <dd>
      <input type="submit" value="Create Cat">
    </dd>
  </dl>
</form>

<!-- get footer -->
<?php include(SHARED_PATH . '/footer.php'); ?>

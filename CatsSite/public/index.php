<!-- load all functions - Need full file path here as path definitions are contained within start.php -->
<?php require_once('../private/start.php'); ?>

<!-- Set Page Title -->
<?php $page_title = 'Main Page'; ?>

<!-- get header -->
<?php include(SHARED_PATH . '/header.php'); ?>

<!-- TEST FUNCTIONS.PHP  -->
<?php //writeMsg(); doSomething(); ?>
<!-- <a href="test.php">Test Page</a> -->


<!-- test PHP array -->
<?php
$cat_table = [
	['id' => '1', 'position' => '1', 'visible' => '1', 'cat_name' => 'Bob'],
	['id' => '2', 'position' => '2', 'visible' => '1', 'cat_name' => 'Fluffy'],
	['id' => '3', 'position' => '3', 'visible' => '1', 'cat_name' => 'Gigi'],
	['id' => '4', 'position' => '4', 'visible' => '1', 'cat_name' => 'Lucy'],
];
?>

<!-- TABLE -->
<table style ="width:70%">
	<tr>
		<th>ID</th>
		<th>Position</th>
		<th>Visible</th>
		<th>Cat Name</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>

	<!-- loop through array to display the data in test PHP array -->
	<!-- use htmlspecialchars to prevent XSS. DO THIS ANYTIME DYNAMIC DATA IS USED! -->
	<!-- use urlencode() to handle special characters in parameters -->
	<?php foreach($cat_table as $cat_table) { ?>
		<tr>
			<td><?php echo htmlspecialchars($cat_table['id']); ?></td>
			<td><?php echo htmlspecialchars($cat_table['position']); ?></td>
			<!-- no need for htmlspecialchars here as checking for 1 and conrtolling the response here with php -->
			<td><?php echo $cat_table['visible'] == 1 ? 'true' : 'false'; ?></td>
			<td><?php echo htmlspecialchars($cat_table['cat_name']); ?></td>
			<!-- takes you to the show page for the relevant record, passes ID onto the show page -->
			<!-- use htmlspecialchars to prevent XSS. DO THIS ANYTIME DYNAMIC DATA IS USED! -->
			<!-- use urlencode() to handle special characters in parameters -->
			<td><a class="action" href="<?php echo url_for('cats/show.php?id=' . htmlspecialchars(urlencode($cat_table['id']))); ?>">View</a></td>
			<td><a class="action" href="">Edit</a></td>
			<td><a class="action" href="">Delete</a></td>
		</tr>
	<?php } ?>
</table><br>

<!-- Form -->
<!--PHP CODE TO GO IN HERE TO SEND DATA TO DATABASE-->
<!-- <form>
<fieldset>
<legend>Add your own cat here!</legend><br>
Name:<br>
<input type="text" name="name"><br><br>
Age:<br>
<input type="text" name="age"><br><br>
Breed:<br>
<input type="text" name="breed"><br><br>
Gender:<br>
<input type="text" name="gender"><br><br>
<input type="submit" value="Submit"><br>
</fieldset>
</form> -->


<!-- get footer -->
<?php include(SHARED_PATH . '/footer.php'); ?>

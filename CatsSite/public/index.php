<!-- **HOME PAGE**
Introduction
Header
Content need to assign classes and div up page for CSS
Data table
Footer -->

<!-- load all functions and database connection variable - Need full file path here as path definitions are contained within start.php -->
<?php require_once('../private/start.php'); ?>

<!-- Set Page Title -->
<?php $page_title = 'Main Page'; ?>

<!-- get header -->
<?php include(SHARED_PATH . '/header.php'); ?>

<!-- test PHP array -->
<?php

//Get data for all cats table
$cat_set = find_all_cats();

?>

<!-- TABLE -->
<table>
	<tr>
		<th>ID</th>
		<th>Position</th>
		<th>Visible</th>
		<th>Cat Name</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>

	<!-- while loop through cat table to display the datay -->
	<!-- use htmlspecialchars to prevent XSS. DO THIS ANYTIME DYNAMIC DATA IS USED! -->
	<!-- use urlencode() to handle special characters in parameters -->
	<?php while($cat_table = mysqli_fetch_assoc($cat_set)) { ?>
		<tr>
			<td><?php echo htmlspecialchars($cat_table['id']); ?></td>
			<td><?php echo htmlspecialchars($cat_table['position']); ?></td>
			<!-- no need for htmlspecialchars here as checking for 1 and conrtolling the response here with php -->
			<td><?php echo $cat_table['visible'] == 1 ? 'true' : 'false'; ?></td>
			<td><?php echo htmlspecialchars($cat_table['cat_name']); ?></td>

			<!-- VIEW -->
			<!-- takes you to the show page for the relevant record, passes ID onto the show page -->
			<!-- use htmlspecialchars to prevent XSS. DO THIS ANYTIME DYNAMIC DATA IS USED! -->
			<!-- use urlencode() to handle special characters in parameters -->
			<td><a class="action" href="<?php echo url_for('cats/show.php?id=' . htmlspecialchars(urlencode($cat_table['id']))); ?>">View</a></td>

			<!-- EDIT -->
			<!-- takes you to the edit page for the relevant record, passes ID onto the show page -->
			<td><a class="action" href="<?php echo url_for('cats/edit.php?id=' . htmlspecialchars(urlencode($cat_table['id']))); ?>">Edit</a></td>
			<td><a class="action" href="">Delete</a></td>

		</tr>
	<?php } ?>
</table><br>

<!-- free memory -->
<?php
mysqli_free_result($cat_set);
?>

<a href="<?php echo url_for('cats/new.php'); ?>">Create New Cat Page...</a><br>

<!-- Submit New Cat Form, Moved to new.php? -->
<!-- <form action="" method="post">
<fieldset>
<legend>Add your own cat here!</legend><br>
Name:<br>
<input type="text" name="name" value=""><br><br>
Age:<br>
<input type="text" name="age" value=""><br><br>
Breed:<br>
<input type="text" name="breed" value=""><br><br>
Gender:<br>
<input type="text" name="gender" value=""><br><br>
<input type="submit" value="Submit"><br>
</fieldset>
</form> -->


<!-- get footer -->
<?php include(SHARED_PATH . '/footer.php'); ?>

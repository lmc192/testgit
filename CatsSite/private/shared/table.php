<!-- load all functions and database connection variable - Need full file path here as path definitions are contained within start.php -->
<?php require_once('../private/start.php'); ?>

<!-- Get data for all cats table -->
<?php $cat_set = find_all_cats(); ?>

<!-- MAIN SECTION INCLUDES TABLE AND OTHER INFORMATION -->

<!-- TABLE -->
<div class="main-section">
	<div class="content-wrap">
		<table class="table-style">
			<thead>
				<tr>
					<th>ID</th>
					<th>Position</th>
					<th>Visible</th>
					<th>Cat Name</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
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
					<!-- takes you to the view page for the relevant record, passes ID onto the view page -->
					<!-- use htmlspecialchars to prevent XSS. DO THIS ANYTIME DYNAMIC DATA IS USED! -->
					<!-- use urlencode() to handle special characters in parameters -->
					<td><a class="action" href="<?php echo url_for('cats/view.php?id=' . htmlspecialchars(urlencode($cat_table['id']))); ?>">View</a></td>

					<!-- EDIT -->
					<!-- takes you to the edit page for the relevant record, passes ID onto the view page -->
					<td><a class="action" href="<?php echo url_for('cats/edit.php?id=' . htmlspecialchars(urlencode($cat_table['id']))); ?>">Edit</a></td>

					<!-- DELETE -->
					<td><a class="action" href="<?php echo url_for('cats/delete.php?id=' . htmlspecialchars(urlencode($cat_table['id']))); ?>">Delete</a></td>
				</tr><?php } ?>
			</table><br>

			<!-- free memory -->
			<?php
			mysqli_free_result($cat_set);
			?>

			<!-- CREATE NEW CAT BUTTON -->
			<a href="<?php echo url_for('cats/new.php'); ?>">Create New Cat...</a><br>
		</div>
	</div>

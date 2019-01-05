<!-- use htmlspecialchars to prevent XSS. DO THIS ANYTIME DYNAMIC DATA IS USED! -->
<!-- use urlencode() to handle special characters in parameters -->
<!-- use htmlspecialchars to prevent XSS. DO THIS ANYTIME DYNAMIC DATA IS USED! -->
<!-- use urlencode() to handle special characters in parameters -->
<!-- load all functions and database connection variable - Need full file path here as path definitions are contained within start.php -->
<?php require_once('../private/start.php'); ?>

<!-- Get data for all cats table -->
<?php $cats = find_all_cats(); ?>

<!-- MAIN SECTION INCLUDES TABLE AND OTHER INFORMATION -->

<div class="main-section">
	<div class="content-wrap">
		<!-- CREATE NEW CAT BUTTON -->
		<form action="<?php echo url_for('cats/new.php'); ?>" type="submit" value="Create New Cat">
			<input type="submit" value="Create New Cat">
		</form><br>
		<!-- TABLE -->
		<table class="table-style">
			<!-- TABLE HEADERS HERE -->
			<thead>
				<tr>
					<th>ID</th>
					<th>Position</th>
					<th>Visible</th>
					<th>Cat Name</th>
					<th>File Path</th>
					<th>Breed</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>
			</thead>

			<!-- while loop through cat table to display the data -->
			<?php while($cat_array = mysqli_fetch_assoc($cats)) { ?>
				<tr>
					<td><?php echo htmlspecialchars($cat_array['id']); ?></td>
					<td><?php echo htmlspecialchars($cat_array['position']); ?></td>
					<!-- no need for htmlspecialchars here as checking for 1 and conrtolling the response here with php -->
					<td><?php echo $cat_array['visible'] == 1 ? 'true' : 'false'; ?></td>
					<td><?php echo htmlspecialchars($cat_array['cat_name']); ?></td>
					<td><?php echo htmlspecialchars($cat_array['file_path']); ?></td>
					<td><?php echo htmlspecialchars($cat_array['breed_name']); ?></td>

					<!-- VIEW COLUMN -->
					<!-- takes you to the view page for the relevant record, passes ID onto the view page -->
					<td><a class="action" href="<?php echo url_for('cats/view.php?id=' . htmlspecialchars(urlencode($cat_array['id']))); ?>">View</a></td>

					<!-- EDIT COLUMN -->
					<!-- takes you to the edit page for the relevant record, passes ID onto the view page -->
					<td><a class="action" href="<?php echo url_for('cats/edit.php?id=' . htmlspecialchars(urlencode($cat_array['id']))); ?>">Edit</a></td>
				</tr><?php } ?>
			</table><br>

			<!-- free memory -->
			<?php
			mysqli_free_result($cats);
			?>
		</div>
	</div>

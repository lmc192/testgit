<!-- load all functions - Need full file path here as path definitions are contained within start.php -->
<?php require_once('../private/start.php'); ?>

<!-- Set Title -->
<?php $page_title = 'Main Page'; ?>

<!-- get header -->
<?php include(SHARED_PATH . '/header.php'); ?>

<!-- Testing PHP -->
<?php writeMsg();
doSomething();
?>

<!-- data table -->
<table style ="width:70%">
	<tr>
		<th>Name</th>
		<th>Age</th>
		<th>Breed</th>
	</tr>
</table><br>

<!-- Form -->
<!--PHP CODE TO GO IN HERE TO SEND DATA TO DATABASE-->
<form>
	<fieldset>
		<legend>Add your own cat here!</legend><br>
		Name:<br>
		<input type="text" name="name"><br><br>
		Age:<br>
		<input type="text" name="age"><br><br>
		Breed:<br>
		<input type="text" name="breed"><br><br>
		<input type="submit" value="Submit"><br>
	</fieldset>
</form>

<!-- get footer -->
<?php include(SHARED_PATH . '/footer.php'); ?>

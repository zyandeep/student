<?php 
	require 'dbcon.php';

	$id = $_GET['id'];
	$sql = "SELECT * FROM student_info WHERE id=$id";
	
	$result = mysqli_query($link, $sql)
				or die(mysqli_error($link));

	$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Records | Update Record</title>
</head>
<body>
	<h1>Update Record</h1>
	<hr>
	<br>
	<form method="POST" action="update_script.php">
		<p>
			<label>First Name:</label>
			<input type="text" name="fname" value="<?php echo $row['fname'];?>">
		</p>
		<p>
			<label>Last Name:</label>
			<input type="text" name="lname" value="<?php echo $row['lname'];?>">
		</p>
		<p>
			<label>Email:</label>
			<input type="email" name="email" value="<?php echo $row['email'];?>">
		</p>
		<p>
			<label>Gender: </label>
			<?php if ($row['gender'] === "m"): ?>
				Male <input type="radio" name="gender" value="m" checked="checked">
				Female <input type="radio" name="gender" value="f">
				Other <input type="radio" name="gender" value="o">
			
			<?php elseif ($row['gender'] === "f"): ?>
				Male <input type="radio" name="gender" value="m">
				Female <input type="radio" name="gender" value="f" checked="checked">
				Other <input type="radio" name="gender" value="o">

			<?php else: ?>
				Male <input type="radio" name="gender" value="m">
				Female <input type="radio" name="gender" value="f">
				Other <input type="radio" name="gender" value="o" checked="checked">

			<?php endif; ?>

		</p>

		<p>
			<label>Semester: </label>
			<select name="semester">
				<?php if ($row['semester'] === "1st"):  ?>
					<option value="1st" selected="selected">1st Semester</option>
					<option value="2nd">2nd Semester</option>
					<option value="3rd">3rd Semester</option>
					<option value="4th">4th Semester</option>
					<option value="5th">5th Semester</option>
					<option value="6th">6th Semester</option>

				<?php elseif($row['semester'] === "2nd"): ?>
					<option value="1st">1st Semester</option>
					<option value="2nd" selected="selected">2nd Semester</option>
					<option value="3rd">3rd Semester</option>
					<option value="4th">4th Semester</option>
					<option value="5th">5th Semester</option>
					<option value="6th">6th Semester</option>

				<?php elseif($row['semester'] === "3rd"): ?>
					<option value="1st">1st Semester</option>
					<option value="2nd">2nd Semester</option>
					<option value="3rd" selected="selected">3rd Semester</option>
					<option value="4th">4th Semester</option>
					<option value="5th">5th Semester</option>
					<option value="6th">6th Semester</option>

				<?php elseif($row['semester'] === "4th"): ?>
					<option value="1st">1st Semester</option>
					<option value="2nd">2nd Semester</option>
					<option value="3rd">3rd Semester</option>
					<option value="4th" selected="selected">4th Semester</option>
					<option value="5th">5th Semester</option>
					<option value="6th">6th Semester</option>
				
				<?php elseif($row['semester'] === "5th"): ?>
					<option value="1st">1st Semester</option>
					<option value="2nd">2nd Semester</option>
					<option value="3rd">3rd Semester</option>
					<option value="4th">4th Semester</option>
					<option value="5th" selected="selected">5th Semester</option>
					<option value="6th">6th Semester</option>

				<?php else: ?>
					<option value="1st">1st Semester</option>
					<option value="2nd">2nd Semester</option>
					<option value="3rd">3rd Semester</option>
					<option value="4th">4th Semester</option>
					<option value="5th">5th Semester</option>
					<option value="6th" selected="selected">6th Semester</option>

				<?php endif; ?>

			</select>
		</p>
		<p>
			<label>Address</label>
			<textarea name="address"><?php echo $row['address']; ?></textarea>
		</p>

		<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
		
		<p>
			<input type="submit" name="submit" value="Update">
		</p>
	</form>
	<br>
	<hr>
	<a href="index.html">Back to HOME</a>


</body>
</html>
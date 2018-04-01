<!DOCTYPE html>
<html>
<head>
	<title>Student Records | Add Record</title>
</head>
<body>
	<h2>Add Record</h2>
	<hr>
	<br>

	<form method="POST" action="insert_script.php">
		<p>
			<label>First Name:</label>
			<input type="text" name="fname" placeholder="First Name" required="required" value="<?php echo (isset($fname)) ? $fname : ''; ?>">
			<strong>
				<?php 
					if (isset($fname_error)) {
						echo $fname_error;
					}
				?>	
			</strong>
		</p>
		<p>
			<label>Last Name:</label>
			<input type="text" name="lname" placeholder="Last Name" required="required" value="<?php echo (isset($lname)) ? $lname : ''; ?>">
			<strong>
				<?php 
					if (isset($lname_error)) {
						echo $lname_error;
					}
				 ?>
			</strong>
		</p>
		<p>
			<label>Email:</label>
			<input type="email" name="email" placeholder="Email" required="required" value="<?php echo (isset($email)) ? $email : ''; ?>">
			<strong>
				<?php 
					if (isset($email_error)) {
						echo $email_error;
					}
				 ?>
			</strong>

		</p>
		<p>
			<label>Gender: </label>
			Male <input type="radio" name="gender" value="m" checked="checked">
			Female <input type="radio" name="gender" value="f">
			Other <input type="radio" name="gender" value="o">
		</p>
		<p>
			<label>Semester: </label>
			<select name="semester">
				<option value="1st" selected="selected">1st Semester</option>
				<option value="2nd">2nd Semester</option>
				<option value="3rd">3rd Semester</option>
				<option value="4th">4th Semester</option>
				<option value="5th">5th Semester</option>
				<option value="6th">6th Semester</option>	
			</select>
		</p>
		<p>
			<label>Address</label>
			<textarea name="address" placeholder="Address" required="required"><?php echo (isset($address)) ? $address : ''; ?></textarea>
			<strong>
				<?php 
					if (isset($address_error)) {
						echo $address_error;
					}
				 ?>
			</strong>


		</p>
		
		<p>
			<input type="submit" name="submit" value="Submit">
		</p>
	</form>

	<br>
	<hr>
	<a href="index.html">Back to HOME</a>
</body>
</html>
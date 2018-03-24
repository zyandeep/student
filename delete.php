<?php 
	require_once 'dbcon.php';

	$id = $_REQUEST['id'];

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {

		// Fetch the record and ask for confirmation
		$sql = "SELECT * FROM student_info WHERE id=$id";
		$result = mysqli_query($link, $sql);

		if ($result === false) {
			exit("Couldn't fetch record" . mysqli_error($link));
		}

		$row = mysqli_fetch_assoc($result);
	}
	elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
	 	//Delete the record
	 	$ans = $_POST['ans'];

	 	if ($ans == 'y') {
	 		$sql = "DELETE FROM student_info WHERE id=$id";

	 		mysqli_query($link, $sql) 
	 			or die('Could not delete the record. ' . mysqli_error($link));
	 	}

	 	header("Location: list.php");
	 }
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Student Records | Delete Record</title>
 </head>
 <body>
 	<h1>Delete Record</h1>
 	<hr>
 	<br>

 	<p>
 		<strong>Name: </strong>
 		<?php echo $row['fname'] . ' ' . $row['lname']; ?>	
 	</p>
 	<p>
 		<strong>Email: </strong>
 		<?php echo $row['email']; ?>	
 	</p>
 	<p>
 		<strong>Gender: </strong>
 		<?php
 			$gender = $row['gender'];

 			if ($gender === "m") {
 				echo "Male";
 			}
 			elseif ($gender === "f") {
 				echo "Female";
 			}
 			else {
 				echo "Other";
 			} 
 		?>	
 	</p>
 	<p>
 		<strong>Semester: </strong>
 		<?php echo $row['semester']; ?>	
 	</p>
 	<p>
 		<strong>Address: </strong>
 		<?php echo $row['address']; ?>	
 	</p>
 	<br>
 	<br>

 	<h2>Do you really want to delete this record? </h2>
 	
 	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 		Yes: <input type="radio" name="ans" value="y"><br>
 		No: <input type="radio" name="ans" value="n" checked="checked"><br>

 		<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
 		<button type="submit">OK</button>
 	</form>

 	<br>
 	<hr>
 	<a href="index.html">Back to HOME</a>
 </body>
 </html>
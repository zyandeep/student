<?php 

require 'dbcon.php';

function redirect_user($value) {
	mysqli_close($link);

	if ($value) {
		header("Location: list.php");
	}
	else {
		header("Location: index.html?insert=false");
	}
}


if (isset($_POST['submit'])) {
	
	// Validation required
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$semester = $_POST['semester'];
	$address = $_POST['address'];

	$sql = "INSERT INTO student_info(fname, lname, email, gender, semester, address) VALUES('$fname', '$lname', '$email', '$gender', '$semester', '$address')";

	if(mysqli_query($link, $sql)) {
		redirect_user(true);
	}
	else {
		redirect_user(false);
	}
}
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
	
	// These are all non-empty values
	$fname = $_POST['fname'];	
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$semester = $_POST['semester'];
	$address = $_POST['address'];

	// Error messages
	$fname_error = $lname_error = $email_error = '';


	$pattern="/^[a-zA-Z]+$/";

	if (preg_match($pattern, $fname) !== 1) {
		$fname_error = "Only alphabates allowed!";
	}
	if (preg_match($pattern, $lname) !== 1) {
		$lname_error = "Only alphabates allowed!";
	}

	if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		$email_error = "Invalid email!";
	}


	if (!empty($fname_error) || !empty($lname_error) || !empty($email_error)) {
		include 'insert.php';
		exit();
	}



	$sql = "INSERT INTO student_info(fname, lname, email, gender, semester, address) VALUES('$fname', '$lname', '$email', '$gender', '$semester', '$address')";

	if(mysqli_query($link, $sql)) {
		redirect_user(true);
	}
	else {
		redirect_user(false);
	}
}
<?php 

require 'dbcon.php';

if (isset($_POST['submit'])) {
	
	// Validation required
	$id = $_POST['id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$semester = $_POST['semester'];
	$address = $_POST['address'];

	$sql = "UPDATE student_info SET fname='$fname', lname='$lname', email='$email', gender='$gender', semester='$semester', address='$address' WHERE id=$id";

	mysqli_query($link, $sql);
	mysqli_close($link);
	header("Location: list.php");
}
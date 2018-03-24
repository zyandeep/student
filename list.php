<?php 
	require 'dbcon.php';

	$sql = "SELECT * FROM student_info";
	$result = mysqli_query($link, $sql);

	if ($result === false) {
		exit("Couldn't fetch record" . mysqli_error($link));
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Student Records | View All Records</title>
 </head>
 <body>

 	<h2>View All the Records</h2>
 	<hr>
 	<br> 	
 	<table cellspacing="5" cellpadding="10">
 		<thead>
 			<tr>
 				<th>#</th>
 				<th>Name</th>
 				<th>Email</th>
 				<th>Gender</th>
 				<th>Semester</th>
 				<th>Address</th>
 				<th colspan="2">Action</th>
 			</tr>
 		</thead>
 		<tbody>
 		<?php while ($row = mysqli_fetch_assoc($result)): ?>
 			
 			<tr>
 				<td><?php echo $row['id']; ?></td>
 				<td><?php echo $row['fname'] . ' ' . $row['lname']; ?></td>
 				<td><?php echo $row['email']; ?></td>
 				<td><?php echo $row['gender']; ?></td>
 				<td><?php echo $row['semester']; ?></td>
 				<td><?php echo $row['address']; ?></td>
 				<td><a href="update.php?id=<?php echo $row['id'];?>">Update</a></td>
 				<td><a href="delete.php?id=<?php echo $row['id'];?>">Delete</a></td>
 			</tr>

 		<?php endwhile ?>

 		</tbody>
 	</table>

 	<br>
 	<hr>
 	<a href="index.html">Back to HOME</a>

 </body>
 </html>
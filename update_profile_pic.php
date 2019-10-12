<?php

	include 'conn.php';
	$id=$_POST['id'];
	$student_profile_pic=$_POST['student_profile_pic'];
	$update="UPDATE `students` SET `student_profile_pic`='$student_profile_pic' WHERE `id`='$id' ";
	$update_query=mysqli_query($con,$update);
	if ($update_query) {
		echo "success";
	}else{
		echo "error";
	}
?>
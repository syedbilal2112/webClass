<?php
include 'conn.php';

$id = $_POST['id'];
$stu_name = $_POST['stu_name'];
$stu_email = $_POST['stu_email'];
$stu_address = $_POST['stu_address'];
$stu_dob = $_POST['stu_dob'];
$stu_phno = $_POST['stu_phno'];


$query = "UPDATE `students` SET `stu_name` = '$stu_name', `stu_email` = '$stu_email', `stu_address` = '$stu_address', `stu_dob` = '$stu_dob', `stu_phno` = '$stu_phno' WHERE `id` = $id";

$result = mysqli_query($con,$query);

if($result){
	echo "successfully Updated";
	// header("location:form.html");
}
else{
	echo "Failed to Update";
}

?>
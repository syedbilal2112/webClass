<?php
include 'conn.php';

$stu_name = $_POST['stu_name'];
$stu_email = $_POST['stu_email'];
$stu_address = $_POST['stu_address'];
$stu_dob = $_POST['stu_dob'];
$stu_phno = $_POST['stu_phno'];


$query = "INSERT INTO `students` (`stu_name`,`stu_email`,`stu_address`,`stu_dob`,`stu_phno`) VALUES ('$stu_name','$stu_email','$stu_address','$stu_dob','$stu_phno')";

$result = mysqli_query($con,$query);

if($result){
	echo "successfully inserted";
	// header("location:form.html");
}
else{
	echo "Failed to insert";
}

?>
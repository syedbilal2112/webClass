<?php

include 'conn.php';

$id = $_GET['id'];

$query = "DELETE FROM `students` WHERE `id` = $id";
$result=mysqli_query($con,$query);
if($result){
	echo "successfully Deleted";
	// header("location:form.html");
}
else{
	echo "Failed to Delete";
}
?>
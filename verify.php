<?php

	include 'conn.php';
	$email = $_POST['email'];
	$password = $_POST['password'];
	$query="SELECT password FROM `users` WHERE `email`='$email'";

	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_row($result);
   $user_given_password=$row[0];
   	if(password_verify($password, $user_given_password)){
         echo "successfully logged in";
   	}
      else{
         echo "failed to login";
      }
?>
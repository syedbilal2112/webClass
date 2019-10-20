<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
	.container{
		width: 60%;
		height: 400px;
		margin:auto;
		box-shadow: 0px 0px 5px 5px #eee;
		border:2px solid gray;
		border-radius: 5px
	}
</style>
</head>
<body>
	<div class="container">
		<form action="mailer/index.php" method="get">
			<input type="text" name="name" placeholder="Enter your name" class="form-control">
			<input type="email" name="email" placeholder="Enter your email" class="form-control">
			<input type="number" name="phone_no" placeholder="Enter your phone_no" class="form-control">
			<textarea name="comment" placeholder="Enter your comment" class="form-control"></textarea>
			<input type="submit" name="submit" value="Register" class="btn btn-info">
		</form>
	</div>
</body>
</html>
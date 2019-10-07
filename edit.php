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
		border-radius: 5px;
		padding: 15px
	}
</style>
</head>
<body>
	<?php
	include 'conn.php';
		$id = $_GET['id'];
		$query = "SELECT * FROM `students` WHERE `id` = $id";
		$result=mysqli_query($con,$query);
		$row=mysqli_fetch_row($result);
		// $id =  $row[0];
		$stu_name =  $row[1];
		$stu_email =  $row[2];
		$stu_address =  $row[3];
		$stu_dob =  $row[4];
		$stu_phno =  $row[5];
	?>
	<div class="container">
		<form>
			<input type="hidden" name="id" id="id" value="<?php echo $id?>">

			<input type="text" name="stu_name" placeholder="Enter Student name" class="form-control" id="stu_name" value="<?php echo $stu_name?>">

			<input type="email" name="stu_email" placeholder="Enter your student email" class="form-control" id="stu_email" value="<?php echo $stu_email?>">

			<textarea name="stu_address" placeholder="Enter your stu_address" class="form-control" id="stu_address"> <?php echo $stu_address?></textarea>

			<input type="date" name="stu_dob" placeholder="Enter your stu dob" class="form-control" id="stu_dob" value="<?php echo $stu_dob?>">

			<input type="text" name="stu_phno" placeholder="Enter your student phno" class="form-control" id="stu_phno" value="<?php echo $stu_phno?>">

			<input type="button" name="submit" id="btn" value="Update" class="btn btn-info">
			
		</form>
	</div>
<table class="table" id="table">
	<tr>
		<th>Sl.No</th>
		<th>Student Name</th>
		<th>Student Email</th>
		<th>Student Address</th>
		<th>Student DOB</th>
		<th>Student Phone Number</th>
	</tr>
	<tr>
		<td>lkjhgf</td>
		<td>lkjhgf</td>
		<td>lkjhgf</td>
		<td>lkjhgf</td>
		<td>lkjhgf</td>

	</tr>
</table>
<div id="Div1">
	
</div>

<script type="text/javascript">
	$(function(){
			$('#btn').click(function(){
				var id = $('#id').val();
				var stu_name = $('#stu_name').val();
				var stu_email = $('#stu_email').val();
				var stu_address = $('#stu_address').val();
				var stu_dob = $('#stu_dob').val();
				var stu_phno = $('#stu_phno').val();

				$.ajax({
					url:"stuUpdate.php",
					type:'post',
					data:{
						id:id,
						stu_name:stu_name,
						stu_email:stu_email,
						stu_address:stu_address,
						stu_dob:stu_dob,
						stu_phno:stu_phno

					},
					success:function(res){
						console.log(res)
						display()
					},
					error:function(res){
						console.log(res)
					}
				})
			})
		})
	function dele(id){
		$.ajax({
			url:'delete.php',
			type:'get',
			data:{
				id:id
			},
			success:function(res){
				alert(res);
				display();
			},
			error:function(res){

			}
		})
	}
	function display(){
		$.ajax({
			url:'view.php',
			type:'get',
			data:{

			},
			success:function(res){
				console.log(res)
				var obj = JSON.parse(res);
				console.log(obj)
				var table_content = ''
				$('#table').find( 'tr:not(:first)' ).remove();
                        $.each(obj,function(index,value){
                            table_content+="<tr>";
                            table_content+="<td>"+value.id+"</td>";
                            table_content+="<td>"+value.stu_name+"</td>";
                            table_content+="<td>"+value.stu_email+"</td>";
                            table_content+="<td>"+value.stu_address+"</td>";
                            table_content+="<td>"+value.stu_dob+"</td>";
                            table_content+="<td>"+value.stu_phno+"</td>";
  table_content+="<td><a class='btn btn-primary' href='edit.php?id="+value.id+"'>Edit</a><button class='btn btn-danger' onclick='dele("+value.id+")'>Delete</button></td>";
                            table_content+="</tr>";
                        });
                        $("#table").append(table_content);
 				// $.each(obj,function(index, value){
 				// 	table_content+="<div style='border: 2px solid gray;padding: 20px;box-shadow: 0px 0px 5px 5px #fff;margin:10px'><h2>Name: "+value.stu_name+"</h2><p>Address: "+value.stu_address+"</p><p>DPB: "+value.stu_dob+"</p><p>Phone Number: "+value.stu_phno+"</p></div>"
 				// })
 				// $("#Div1").append(table_content);
 			
			},
			error:function(res){

			}
		})
	}
	display()
</script>
</body>
</html>
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
		height: 650px;
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
		$stu_profile_pic = $row[1];
		$stu_name =  $row[2];
		$stu_email =  $row[3];
		$stu_address =  $row[4];
		$stu_dob =  $row[5];
		$stu_phno =  $row[6];
	?>
	<div class="container">
		<form>
			<input type="hidden" name="id" id="id" value="<?php echo $id?>">
	<br>
			<input type="text" name="stu_name" placeholder="Enter Student name" class="form-control" id="stu_name" value="<?php echo $stu_name?>">
			<br>
			<input type="email" name="stu_email" placeholder="Enter your student email" class="form-control" id="stu_email" value="<?php echo $stu_email?>">
			<br>
			<textarea name="stu_address" placeholder="Enter your stu_address" class="form-control" id="stu_address"> <?php echo $stu_address?></textarea>
			<br>
			<input type="date" name="stu_dob" placeholder="Enter your stu dob" class="form-control" id="stu_dob" value="<?php echo $stu_dob?>">
			<br>
			<input type="text" name="stu_phno" placeholder="Enter your student phno" class="form-control" id="stu_phno" value="<?php echo $stu_phno?>">
			<br>

			<img src="<?php echo $stu_profile_pic;?>" id="profile_pic" style="border-radius: 50%;border:2px solid gray" height="150px" width="150px">
			<input type="file" name="files[]" id="file" accept="*" required>
			<input type="button" name="update" value="Update Profile Pic" id="upload_profile_pic" class="btn">
			<br>

			<input type="button" name="submit" id="btn" value="Update" class="btn btn-info">
			
		</form>
	</div>
<table class="table" id="table">
	<tr>
		<th>Sl.No</th>
		<th>Student Profile Pic</th>
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
			    $('#file').on('change', function () {
                    var file_data = $('#file').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file', file_data);
                    $.ajax({
                        url: 'upload.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                        
                            alert(response)
                            document.getElementById("profile_pic").src=response;
                            x=response;

                           
                        },
                        error: function (response) {
                          
                           alert(response);
                        }
                    });
                });
		    $('#upload_profile_pic').on('click', function () {
				var id=$("#id").val();
                var profile=x;
                   
                $.ajax({
                    url:"update_profile_pic.php",
                    type:"post",
                    data:{
                        "id":id,
                        "student_profile_pic":profile
                    },
                    success:function(data){
                      alert(data);
                     // window.reload(); 
                     display()  
                      },
                      error:function(){
                        alert(';hi');
                      }
                }); 
      		});





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
                            table_content+="<td><img src="+value.student_profile_pic+" style='width:150px;height:150px;border:2px solid gray;border-radius:50%'></td>";
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
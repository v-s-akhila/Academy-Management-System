<?php
	session_start();
	require('db_connectivity.php');
?>
<!DOCTYPE html>
<html>
	<head>	
    <title>Orisys Academy project</title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
  <style>

  </style>
</head>
<?php
	$logid=$_SESSION['id'];
   $id=$_GET['id'];
   $sql="select * from plcementnotificatiob_tb   where noti_id=$id ";
   $sql2="select * from student_details join login_page on login_page.login_id=student_details.login_id where student_details.login_id=$logid";
	$result1=mysqli_query($mysql,$sql);
	$row=mysqli_fetch_assoc($result1);
	$result2=mysqli_query($mysql,$sql2);
	$row2=mysqli_fetch_assoc($result2);
   if(isset($_POST['apply']))
   {
	 $name=$_POST['name'];
	 $compname=$_POST['company_name'];
	 $comppost=$_POST['company_post'];
	 $email=$_POST['email'];
    $filename = $_FILES["resume"]["name"];
    $tempname = $_FILES["resume"]["tmp_name"];    
        $folder = "upload/".$filename;
	$sql1="insert into applied_students(stud_name,comp_name,comp_post,email,resume_file,noti_id) values
		('$name','$compname','$comppost','$email','$filename',$id)";
	if(mysqli_query($mysql,$sql1))
	{
		//header("Location:view_placement_notification.php");
		 if (move_uploaded_file($tempname, $folder))  {
            header("Location:view_placement_notification.php");
        }else{
            echo "Failed to upload image";
      }
		
	}
	
	  
    
   }
	
?>
<body class="bi">
    <div class="row">
	<form  class="reg" method="post" action="" enctype="multipart/form-data">
		<h1>Apply For Job</h1>
		<table>
		<tr>
		<th>Name : </th>
        <td><input type="text" name="name" value="<?php echo $row2['stud_fname']." ".$row2['stud_mname']
		." ".$row2['stud_lname'];?>" readonly>
		</td>
		</tr>
		<tr>
	    <th>Name of the Company:</th>
        <td><input type="text" name="company_name" placeholder="comp_name" value="<?php echo $row['company_name']; ?>" readonly></td>
		</tr>
		<tr>
	    <th>Name of the Post:</th>
        <td><input type="text" name="company_post" placeholder="comp_post" value="<?php echo $row['company_post']; ?>" readonly></td>
		</tr>
		<tr>
		<th>Email:</th>
	    <td><input type="email" name="email" placeholder="Enter Mail" value="<?php echo $row2['email']; ?>" readonly>
		</tr>
		<tr>
		<th>Resume Upload:</th>
		<td><input type="file" name="resume"></td>
		</tr>
		<tr>
		<td colspan="2"><input class="btn_reg" type="submit"  name="apply" value="Apply"></td>
		</tr>
	</table>
	</form>		
	</div>
</body>
</html>
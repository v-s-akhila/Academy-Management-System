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
<link rel="stylesheet" href="css/upload_note.css">
<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
	<style>
	.reg{
		border:1px solid;
		background-color:rgba(0,0,0,0.5);
		width:500px;
		height:auto;
		padding:10px;
	}
	.btn_reg{
		width:100px;
	}
	</style>
	</head>
	<body class="bi">
			<a class="add_new" href="faculty_home.php">Back</a>

	  <?php
	  $id=$_SESSION['id'];
	   $sql="select * from login_page join faculty_details on login_page.login_id=faculty_details.login_id
			where faculty_details.login_id=$id";
			$result=mysqli_query($mysql,$sql);
			$row=mysqli_fetch_assoc($result);
		
	 if(isset($_POST['upload']))
	 {
		 $name=$_POST['name'];
		 $subject=$_POST['sub_name'];
		 $email=$_POST['email'];
		  $filename = $_FILES["notes"]["name"];
          $tempname = $_FILES["notes"]["tmp_name"];    
        $folder = "upload/".$filename;
		$sql1="insert into notes_tb(name,subject,email,notes,upload_date,login_id)
		       values('$name','$subject','$email','$filename',curdate(),$id)";
		echo $sql1;
		if(mysqli_query($mysql,$sql1))
		{
			
			 if (move_uploaded_file($tempname, $folder))  {
            header("Location:faculty_home.php");
        }else{
            echo "Failed to upload image";
      }
		}
		else
		  echo "error.$sql1".mysqli_error($mysql);
	 }
	  ?>
	  <form  class="reg" method="post" action="" enctype="multipart/form-data">
		<h1>Upload Notes</h1>
		<table>
		<tr>
		<th>Name : </th>
        <td><input type="text" name="name" value="<?php echo $row['fac_fname']." ".$row['fac_mname']
		." ".$row['fac_lname'];?>" readonly>
		</td>
		</tr>
		<tr>
	    <th>Name of the Subject:</th>
        <td><input type="text" name="sub_name" placeholder="comp_name" value="<?php echo $row['subject']; ?>" readonly></td>
		</tr>
		<tr>
	    <th>Email:</th>
        <td><input type="text" name="email" placeholder="comp_name" value="<?php echo $row['email']; ?>" readonly></td>
		</tr>
		<tr>
		<th>Note Upload:</th>
		<td><input type="file" name="notes"></td>
		</tr>
		<tr>
		<td colspan="2"><input class="btn_reg" type="submit"  name="upload" value="Upload"></td>
		</tr>
	</table>
	</form>	
	</body>
</html>
<?php
session_start();
require ('db_connectivity.php');
if(isset($_POST['email']))
{
	$email=$_POST['email'];
	$pass=$_POST["newPassword"];
if(count($_POST)>0) 
{
$result = mysqli_query($mysql,"SELECT *from login_page WHERE email='" . $email . "'");

if($_POST["newPassword"] == $_POST["confirmPassword"] )
{
	foreach($result as $val)
	{
		if($val['email']==$email)
		{
			$sql="UPDATE login_page set password='$pass' WHERE email= '$email'";
			$sql1=mysqli_query($mysql,$sql);
			/*echo "<script>alert(window.location('login_page.php'))</script>";*/
			if($sql1){
			echo "<script language='javascript'>
	         window.location='login_page.php';
			 alert('Password Changed Successfully');
			 </script>";
			}
			/*$message = "Password Changed Sucessfully";*/
		}
			
		}
}		
else
		
{
	echo "<script>alert('Passowrd or email is not correct!')</script>";

}
}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Password Change</title>
		<style>
			body
			{
				background-image:url("img/forgot_psw.jpg");
				background-size:cover;
			}
			form
			{
				background-color:rgba(0,0,0,0.5);
				width:50%;
				height:auto;
				margin-left:30%;
				margin-top:10%;
				color:white;
				padding:20px;
			}
		</style>

	</head>
<body>
	<div><?php if(isset($message)) { echo $message; } ?></div>
		<form method="post" action="" align="center">
		<h2 align="center">CHANGE PASSWORD</h2>
		Email-Id:<br>
		<input type="email" name="email"><span id="email1" class="required"></span>
		<br>
		New Password:<br>
		<input type="password" name="newPassword"><span id="newPassword" class="required"></span>
		<br>
		Confirm Password:<br>
		<input type="password" name="confirmPassword"><span id="confirmPassword" class="required"></span>
		<br><br>
		<input type="submit" name="change" value="Change Pssword">
		</form>
	<br>
	<br>
</body>
</html>
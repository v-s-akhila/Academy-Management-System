<?php
session_start();
include("db_connectivity.php");
$username=$_POST['username'];
$password=$_POST['pass'];
$sql="select * from login_page where email='$username' and password='$password'";
$result=mysqli_query($mysql,$sql);
$row=mysqli_fetch_assoc($result);
$id=$row['login_id'];
$_SESSION['id']=$id;
    if(($username===$row['email'])&&($password===$row['password'])&& $row['user_type']=='0')
    {
		header("Location:admin_home.php");
    }
	else if(($username===$row['email'])&&($password===$row['password'])&& $row['user_type']=='1')
	{
		header("Location:faculty_home.php");
	}
	else if(($username===$row['email'])&&($password===$row['password'])&& $row['user_type']=='2')
	{
		header("Location:stud_home.php");
	}
	else
	 {
		 echo "<script language='javascript'>
	         window.location='login_page.php';
			 alert('Invalid Username and Password');
			 </script>";
	 } 

?>
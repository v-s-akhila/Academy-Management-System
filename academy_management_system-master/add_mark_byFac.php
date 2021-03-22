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
  if(isset($_GET['id']))
  {
	  
	  $id=$_GET['id'];
	  $enroll=$_GET['sid'];
	  $sql1="select * from student_details where enrollment_id='$enroll'";
	  echo $sql1;
	  $result=mysqli_query($mysql,$sql1);
	  if($result)
	  {
		$row1=mysqli_fetch_assoc($result);
	  }
	  $sql="select * from exam_notifications where exam_id=$id";
	  $rslt=mysqli_query($mysql,$sql);
	  if($rslt)
	     $row=mysqli_fetch_assoc($rslt);
	  
  }
   
?>
<body class="bi">
<a href="faculty_home.php">Back</a>
    <div class="row">
    <form  class="reg" method="post" action="">
        <h1>ADD MARK</h1>
        <table>
        <tr>
		<input type="hidden" name="enroll_id" value="<?php echo $row1['enrollment_id'];?>" readonly>
        <th>Name:</th>
        <td><input type="text" name="name" placeholder="name" value="<?php echo $row1['stud_fname']." ".$row1['stud_mname']." ".$row1['stud_lname']; ?>" readonly>
        </td>
        </tr>
		<tr>
        <th>Exam Name:</th>
        <td><input type="text" name="examname" placeholder="examname" value="<?php echo $row['exam_name']; ?>" readonly>
       </td>
        </tr>
        <tr>
        <th>ExamType:</th>
        <td><input type="text" name="examtype" placeholder="examtype" value="<?php echo $row['exam_type']; ?>" readonly>
       </td>
        </tr>
        <tr>
        <th>Subjects:</th>
        <td><input  type="text" name="subject" placeholder="subject" value="<?php echo $row['subjects']; ?>" readonly>
        </td>
        </tr>
        <tr>
        <th>Examdate:</th>
        <td><input type="text" name="examdate" placeholder="examdate" value="<?php echo $row['exam_date_time']; ?>" reaonly>
        
        </tr>
        <tr>
        <th>Mark Obtained</th>
        <td><input type="text" name="markobtained" placeholder="markobtained" required>
        </td>
        </tr>
        <tr>
        <th> Total Mark</th>
        <td><input type="text" name="totalmark" placeholder="totalmark" value="<?php echo $row['total_mark']; ?>" readonly>
        </td>
        </tr>
        <tr> 
        <td><td><input type="submit"  name="submit" value="submit"></td></td>
    </table>
    </form> 
<?php
	if(isset($_POST['submit']))
	{
		$enroll=$_POST['enroll_id'];
		$name=$_POST['name'];
		$exam_name=$_POST['examname'];
		$examtype=$_POST['examtype'];
		$subjects=$_POST['subject'];
		$examdate=$_POST['examdate'];
		$tot_mark=$_POST['totalmark'];
		$mark_obt=$_POST['markobtained'];
		$qry1="insert into result_tb (	enroll_id,stud_name,exam_name,exam_type,exam_date,result_date,
		       subjects,tot_mark,obtained_mark) values('$enroll','$name','$exam_name','$examtype',
			   '$examdate',curdate(),'$subjects',$tot_mark,'$mark_obt')";
		echo $qry1;
		if(mysqli_query($mysql,$qry1))
		{
			header("location:faculty_home.php");
		}
		
	}
?>
    </div>
</body>
</html>
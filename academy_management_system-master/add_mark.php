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
   $NameErr=$ExamTypeErr=$subjectErr=$ExamdateErr=$MarkobtainedErr=$TotalMarkErr="";
   $Name=$ExamType=$subject=$Examdate=$Markobtained=$TotalMark="";
   if(isset($_POST['register']))
   {
    $Name=$_POST['name'];
	 $ExamType=$_POST['exam_type'];
	 $subject=$_POST['subject'];
	 $Examdate=$_POST['exam_date'];
	 $Markobtained=$_POST['mark_obtained'];
	 $TotalMark=$_POST['total_mark'];
	 if(empty($Name))
     $NameErr="name is required";
	
	if(!empty($ExamType))
    $ExamTypeErr="exam type is required";
	 
	
	
	require('db_connectivity.php');
	if(empty($NameErr)&&empty($ExamTypeErr)&&empty($subjectErr)&&empty($ExamdateErr)&&empty($MarkobtainedErr)
	   &&empty($TotalMarkErr))
	{
	$sql="insert into add_mark(name,exam_type,exam_date,subject,mark_obtained,total_mark) values('$Name','$ExamType','$subject','$Examdate','$Markobtained','$TotalMark')";
	 
	} 
	
    
   }
	
?>
<body class="bi">
    <div class="row">
	<form  class="reg" method="post" action="">
		<h1>ADD MARK-DDUGKY</h1>
		<table>
		<tr>
		<th>Name:</th>
        <td><input type="text" name="name" placeholder="name" value="<?php echo $Name; ?>">
		<span class="err"><?php echo "*".$NameErr; ?></span></td>
		</tr>
		<tr>
	    <th>ExamType:</th>
        <td><input type="text" name="examtype" placeholder="examtype" value="<?php echo $ExamType; ?>">
		<span class="err"><?php echo "*"; ?></span></td>
        </tr>
        <tr>
        <th>Subject:</th>
        <td><input  type="text" name="subject" placeholder="subject" value="<?php echo $subject; ?>">
        </td>
        </tr>
        <tr>
        <th>Examdate:</th>
        <td><input type="date" name="examdate" placeholder="examdate" value="<?php echo $Examdate; ?>">
        
        </tr>
        <tr>
        <th>Mark Obtained</th>
        <td><input type="text" name="markobtained" placeholder="markobtained" value="<?php echo $Markobtained; ?>">
        </td>
        </tr>
        <tr>
        <th> Total Mark</th>
        <td><input type="text" name="totalmark" placeholder="totalmark" value="<?php echo $TotalMark; ?>">
        </td>
        </tr>
        <tr> 
        <td><td><input type="button" value="submit"></td></td>
    </table>
	</form>		
	</div>
</body>
</html>
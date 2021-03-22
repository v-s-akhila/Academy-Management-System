<?php
$mysql=mysqli_connect("localhost","root","","php_prjct");
if($mysql===false)
{
	die("Error could not connect".mysqli_connect_error($mysql));
}

?>
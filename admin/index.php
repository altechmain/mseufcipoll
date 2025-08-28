<?php
	ob_start();
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MSEUFCI 24th Foundation Online Polling System</title>
</head>

<body>

<br>
<br>
<br>
<H1> Login Admin </H1>
<?php

	$form="
	
			<form method='post'>
			<table>
			<tr>
			<td> Username: </td> <td> <input type='text' name='txtusername' required> </td>
			</tr>
			<tr>
			<td> Password: </td> <td> <input type='password' name='txtpassword' required> </td>
			</tr>
			<tr>
			<td> <input type='submit' name='btnsubmit'> </td>
			</tr>
			<tr>
			<td> </td>
			</tr>
			</form>
			</table>
	";
	
	
	if(isset($_POST['btnsubmit']))
	{
		error_reporting(0);
	include("../connection/connection.php"); 
	$username=$_POST['txtusername']; 
	$password=$_POST['txtpassword']; 
	$password_hash=md5(md5("sdfkjk3".$password."2dfv8b"));
				
	$query=mysqli_query($conn,"SELECT * FROM tbladmin WHERE username='$username' && password='$password_hash'");
	$num_rows=mysqli_num_rows($query);
	
	if($num_rows)
	{
		
			$_SESSION['username']=$username;
			echo ("<font color='red'>Success </font><br>" . $form );				
			header("location: reg_muses.php");
			
		}
		else
		{
			echo ("<font color='red'>Error </font><br>" . $form );	
		
		}
		//
	}
	else
	{
		echo $form;
	}
	
	
	
?>


</body>
</html>
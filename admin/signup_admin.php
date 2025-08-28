<?php
	ob_start();
	session_start();
	error_reporting();
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
 <title>MSEUFCI 24th Foundation Online Polling System</title>
        
  </head>
  

  <body>
   <script src="../js/repeat_password2.js"></script>
    
<br>
<br>
<br>
<H1> Signup Admin </H1>
<?php

$form_admin="
	
			<form method='post'>
			<table>
			<tr>
			<td> Username: </td> <td> <input type='text' name='txtusername1' required> </td>
			</tr>
			<tr>
			<td> Password: </td> <td> <input type='password' name='txtpassword1' required> </td>
			</tr>
			<tr>
			<td> <input type='submit' name='btnsubmit1'> </td>
			</tr>
			<tr>
			<td> </td>
			</tr>
			</form>
			</table>
	";
	
	$form="
	
			<form method='post'>
			<table>
			<tr>
			<td> Username: </td> <td> <input type='text' name='txtusername' required> </td>
			</tr>
			<tr>
			<td> Password: </td> <td> <input type='password' name='txtpassword' id='Password' required> </td>
			</tr>
			<tr>
			<td> Repeat Password: </td> <td> <input type='password' name='txtrepassword' id='rePassword' required> </td>
			</tr>
			<tr>
			<td> <input type='submit' name='btnsubmit' onClick='validatePassword()'> </td>
			</tr>
			<tr>
			<td> </td>
			</tr>
			<tr>
			<td> <a href='index.php'>Log-in</td>
			</tr>

			</form>
			</table>
	";
	
	
	
	if(isset($_POST['btnsubmit1']))
	{
		error_reporting(0);
	include("../connection/connection.php"); 
	$username1=$_POST['txtusername1']; 
	$password1=$_POST['txtpassword1']; 
	$password_hash=md5(md5("sdfkjk3".$password1."2dfv8b"));
				
	$query1=mysqli_query($conn,"SELECT * FROM tbladmin WHERE username='$username1' && password='$password_hash'");
	$num_rows1=mysqli_num_rows($query1);
	
	if($num_rows1)
	{
		
			$_SESSION['username']=$username;
			echo ("<font color='red'>Success </font><br>" );				
			echo $form;
			
			
		}
		else
		{
			echo ("<font color='red'>Error </font><br>" );	
			echo $form_admin;
		}
		//
	}
	else
	{
		echo $form_admin;
	}




	
	
	if(isset($_POST['btnsubmit']))
	{
	error_reporting(0);
	include("../connection/connection.php"); 
	$username=$_POST['txtusername'];
	$password=$_POST['txtpassword'];
	

	$query2=mysqli_query($conn,"SELECT * FROM tbladmin WHERE username='$username'");
	$num_rows2=mysqli_num_rows($query2);
		
	if($num_rows2)
		{
			//echo "Account already exists.";	
				echo ("<font color='red'>Account already exists. </font><br>");	
		}
		else
		{
			$password=md5(md5("sdfkjk3".$password."2dfv8b"));
			$account_query=mysqli_query($conn,"INSERT INTO tbladmin(username, password) VALUES('$username', '$password')");
			
			if($account_query)
			{
				//echo "Account successfully created.";
				echo ("<font color='red'>Account successfully created. </font><br>" );	
			}
			else
			{
				//echo "Error creating your account/ please try again.";
				echo ("<font color='red'>Error creating your account/ please try again. </font><br>" );	
			}
		}
	}
	else
	{
		//echo $form_admin;
			?>
		   		<script src="../js/repeat_password2.js"></script>
           <?php
		   
	}
	
	?>
  </body>
  

  
</html>

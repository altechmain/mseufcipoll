<?php
	ob_start();
	session_start();
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
<title>MSEUFCI 24th Foundation Online Polling System</title>

  </head>

  <body>
 <?php

	error_reporting(0);
	include("../connection/connection.php"); 
	$sid=$_POST['txtsid']; 
	$email=$_POST['txtemail']; 

	$query=mysqli_query($conn,"SELECT * FROM tblaccounts WHERE sid='$sid' && email='$email'");
	$num_rows=mysqli_num_rows($query);
	
	if($num_rows)
	{
		//echo  $sid . $email;
		$pass=rand();
		$pass=md5($pass);
		$pass=substr($pass,0,15);
		$password=md5(md5("sdfkjk3".$pass."2dfv8b"));
		//echo $pass;
		$account_query=mysqli_query($conn,"UPDATE tblaccounts SET password='$password' WHERE sid='$sid'");
		if($account_query)
			{
				$query=mysqli_query($conn,"SELECT * FROM tblaccounts WHERE sid='$sid' && password='$password'");
				$num_rows=mysqli_num_rows($query);
				if($num_rows)
				{
					//echo "found it.";
					$webmaster="noreply@wwshub.com"; 
					$headers="From: Admin <$webmaster>";
					$subject="Your New Password";
					$message="Hello. Your password has been reset. Your new password is below.";
					$message.="\nPassword:$pass\n";
					$message.="\n\nAuto-generated email. Do not reply.";
					
					if(mail($email, $subject, $message, $headers))
					{
						
						?>
							<script type="text/javascript">
								alert ('Your password has been reset. An email has been sent with your new password.');
								//history.back();
								window.location = '../index.php';
								
							</script>
    			    	<?php
					}
					else
					{
						//echo "An error has occured and the password was not reset.";
						?>
							<script type="text/javascript">
								alert ('An error has occured and the password was not reset.');
								history.back();
							</script>
    			    	<?php
						
					}
					
				}
				else
				{
						?>
							<script type="text/javascript">
								alert ('Student number not found.');
								history.back();
							</script>
    			    	<?php
					
				}
			}
			else
			{
				//echo "error updating new password.";
				?>
							<script type="text/javascript">
								alert ('Error updating new password.');
								history.back();
							</script>
    			    	<?php
			}
	}
	else
	{
	//echo "error updating new password.";
				?>
							<script type="text/javascript">
								alert ('Student / Employees No. or Email address does not exists.');
								history.back();
							</script>
    			    	<?php
	}
?>
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

	$sid=$_SESSION['sid'];
	$oldpassword=$_POST['getoldPassword'];
	$newpassword=$_POST['getnewPassword'];
	$password1=md5(md5("sdfkjk3".$oldpassword."2dfv8b"));
	$query=mysqli_query($conn,"SELECT * FROM tblaccounts WHERE sid='$sid' && password='$password1'");
	$num_rows=mysqli_num_rows($query);
	if($num_rows)
	{
		$password2=md5(md5("sdfkjk3".$newpassword."2dfv8b"));
		$account_query=mysqli_query($conn,"UPDATE tblaccounts set password='$password2' WHERE sid='$sid'");
		if($account_query)
		{
			echo "<script type='text/javascript'> alert('PASSWORD SUCCESSFULLY CHANGED! You may now log-in!'); 
			window.location = '../index.php' </script>";
		}
		else
		{
			//echo "Error creating your account/ please try again.";
			?>
			<script type="text/javascript">
				alert ('Error changing your password/ please try again.');
				history.back();
			</script>

        	<?php
		}
	}
	else
	{
		//echo "You are not in the School Database.";
		?>
				<script type="text/javascript">
					alert ('Please input correct student/employee number or old password is wrong.');
					history.back();
				</script>
        	<?php
	}
?>
  

  </body>
</html>

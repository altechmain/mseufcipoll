<?php
	ob_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MSEUFCI 24th Foundation Online Polling System</title>
</head>

<body>


 <?php
	error_reporting(0);
	include("../connection/connection.php"); 
	$sid=$_POST['getSid'];
	$mn=$_POST['getMiddleName'];
	$email=$_POST['getEmail'];
	$password=$_POST['getPassword'];

	$query=mysqli_query($conn,"SELECT * FROM tblstudents WHERE sid='$sid' && middlename='$mn'");
	$num_rows=mysqli_num_rows($query);
	while($fetch=mysqli_fetch_assoc($query)){
	/*	echo $fetch['sid'] . "<br>";
		echo $fetch['lastname'] . "<br>";
		echo $fetch['firstname'] . "<br>";
		echo $fetch['middlename'] . "<br>";
	*/
		$lastname=$fetch['lastname'];
		$firstname=$fetch['firstname'];
	}
	
	if($num_rows)
	{
		$query_inner=mysqli_query($conn,"SELECT * FROM tblaccounts WHERE sid='$sid' && middlename='$mn'");
		$num_rows_inner=mysqli_num_rows($query_inner);
		if($num_rows_inner)
		{
			//echo "Account already exists.";	
			?>
				<script type="text/javascript">
					alert ('Account already exists.');
					history.back();
				</script>

        	<?php
		}
		else
		{
			$password=md5(md5("sdfkjk3".$password."2dfv8b"));
			$account_query=mysqli_query($conn,"INSERT INTO tblaccounts(sid, password, email, lastname, firstname, middlename) VALUES('$sid', '$password', '$email', '$lastname', '$firstname', '$mn')");
			if($account_query)
			{
				//echo "Account successfully created.";
				?>
				<script type="text/javascript">
					alert ('Account successfully created.');
					history.back();
				</script>
						
        	<?php
			}
			else
			{
				//echo "Error creating your account/ please try again.";
				?>
				<script type="text/javascript">
					alert ('Error creating your account/ please try again.');
					history.back();
				</script>

        	<?php
				
				
			}
		}
	}
	else
	{
		//echo "You are not in the School Database.";
		?>
				<script type="text/javascript">
					alert ('Error: Sorry but there are no information about you in the school database.');
					history.back();
				</script>

        	<?php
		
	}
	

?>
  
</body>
</html>


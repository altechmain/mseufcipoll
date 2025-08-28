<?php
	ob_start();
	session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MSEUFCI 24th Foundation Online Polling System</title>

  <link href="../css/jquery-ui.css" rel="stylesheet" type="text/css">
  <script src="../css/jquery-1.10.2.js"></script>
  <script src="../css/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
<script>
  $(function() {
    $( "#dialog-message" ).dialog({
      modal: true,
      buttons: {
        Ok: function() {
          $( this ).dialog( "close" );
		  history.back()
        }
      }
    });
  });
  </script>

</head>
<body>


 <?php
	error_reporting(0);
	include("../connection/connection.php"); 
	$sid=$_POST['txtUsername']; 
	$password=$_POST['txtPassword']; 
	$password_hash=md5(md5("sdfkjk3".$password."2dfv8b"));
				
	$query=mysqli_query($conn,"SELECT * FROM tblaccounts WHERE sid='$sid' && password='$password_hash'");
	$num_rows=mysqli_num_rows($query);
	while($fetch=mysqli_fetch_assoc($query))
		{
			$lastname=$fetch['lastname'];
			$firstname=$fetch['firstname'];
			$flag=$fetch['flag'];
		}
	if($num_rows)
	{
			if($flag==1)
			{
				echo "<script type='text/javascript'> alert('SORRY YOU HAD VOTED ALREADY!'); history.back(); </script>";
			}
			else
			{
			$_SESSION['sid']=$sid;
			$_SESSION['lname']=$lastname;
			$_SESSION['fname']=$firstname;
					
			header("location:../main/index.php");
			}
		}
		else
		{
			?>
				<script type="text/javascript">
					alert ('Wrong username or password.');
					history.back();
				</script>

        	<?php
		
		}
?>
</body>
</html>
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
		  window.open("logout.php","_self");
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
			
			$sid=$_SESSION['sid'];
			$lastname=$_SESSION['lname'];
			$firstname=$_SESSION['fname'];
			
			$elem=$_GET['e'];
			$high=$_GET['h'];
			$coll=$_GET['c'];
			
			if(!isset($_SESSION['sid']))
			{
				header("location: ../index.php");
			}	
			else
			{
date_default_timezone_set('Asia/Manila');
$d=date("Y-m-d H:i:s");
				$vote_query=mysqli_query($conn,"UPDATE tblmuses SET totalvotes=totalvotes + 1 WHERE museno='$elem' OR museno='$high' OR museno='$coll'");
				
				$vote_stud_query=mysqli_query($conn,"UPDATE tblaccounts SET elem_no='$elem', hs_no='$high', college_no='$coll', flag='1', date_voted='$d' WHERE sid='$sid'");
				
				if($vote_query)
				{
					if($vote_stud_query)
					{
				/*		echo "<div id='dialog-message' title='Voting Complete'><p>
    <span class='ui-icon ui-icon-circle-check' style='float:left; margin:0 7px 50px 0;'></span>
	Thank you for your Vote!
  </p>
</div>";*/

echo "<script type='text/javascript'> alert('Voting complete. Thank You for your Vote!'); 
window.location = 'logout.php' </script>";
						//header("location:logout.php");
					}
				}
			}
?>
</body>
</html>
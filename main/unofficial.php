<?php
	ob_start();
	session_start();
?>

<!doctype html>
<html>
<head>
<!--<meta charset="utf-8"> -->

<meta http-equiv="refresh" content="5;URL='index.php'" />

<title>MSEUFCI 24th Foundation Online Polling System</title>
</head>
<?php

if(!isset($_SESSION['sid']))
		{
			header("location: ../index.php");
		}	
		else
		{	



	echo "<H1> Unofficial Result </H1>";

    date_default_timezone_set('Asia/Manila');
    echo "<span style='color:red;font-weight:bold;'>As of: </span>". date('F j, Y g:i:a  ');

	echo "<br><br><a href='javascript:history.back()'> Back </a>";
	
	
	
	
	error_reporting(0);
	include("../connection/connection.php"); 
	$query_totalvotes=mysqli_query($conn,"SELECT museno,lastname,firstname, totalvotes FROM tblmuses WHERE museno BETWEEN 1 AND 4 ORDER BY totalvotes DESC");
		$num_rows_totalvotes=mysqli_num_rows($query_totalvotes);
		
		echo "	<br><br><b>Little Miss Enverga</b>
			<table border=1>
				<tr> 
				<td> Contestant No. </td>
				<td> Name </td>
				<td> No. of Votes </td>
				</tr>
				";
		while($fetch=mysqli_fetch_assoc($query_totalvotes))
			{
				$muse_no=$fetch['museno'];
				$lastname=$fetch['lastname'];
				$firstname=$fetch['firstname'];
				$totalvotes=$fetch['totalvotes'];
		echo "		
				<tr>
				<td> $muse_no </td>
				<td> $lastname, $firstname </td>
				<td> $totalvotes	</td>
				</tr>
			";	
			}
		echo "</table>";
				
//highschool
$query_totalvotes=mysqli_query($conn,"SELECT museno,lastname,firstname, totalvotes FROM tblmuses WHERE museno BETWEEN 5 AND 8 ORDER BY totalvotes DESC");
		$num_rows_totalvotes=mysqli_num_rows($query_totalvotes);
		
		echo "<br><br><b>Miss Young Enverga</b>
			<table border=1>
				<tr> 
				<td> Contestant No. </td>
				<td> Name </td>
				<td> No. of Votes </td>
				</tr>
				";
		while($fetch=mysqli_fetch_assoc($query_totalvotes))
			{
				$muse_no=$fetch['museno'];
				$lastname=$fetch['lastname'];
				$firstname=$fetch['firstname'];
				$totalvotes=$fetch['totalvotes'];
		echo "		
				<tr>
				<td> $muse_no </td>
				<td> $lastname, $firstname </td>
				<td> $totalvotes	</td>
				</tr>
			";	
			}
		echo "</table>";
			
	//college
	$query_totalvotes=mysqli_query($conn,"SELECT museno,lastname,firstname, totalvotes FROM tblmuses WHERE museno BETWEEN 9 AND 12 ORDER BY totalvotes DESC");
		$num_rows_totalvotes=mysqli_num_rows($query_totalvotes);
		
		echo "<br><br><b>Little Miss Enverga</b>
			<table border=1>
				<tr> 
				<td> Contestant No. </td>
				<td> Name </td>
				<td> No. of Votes </td>
				</tr>
				";
		while($fetch=mysqli_fetch_assoc($query_totalvotes))
			{
				$muse_no=$fetch['museno'];
				$lastname=$fetch['lastname'];
				$firstname=$fetch['firstname'];
				$totalvotes=$fetch['totalvotes'];
		echo "		
				<tr>
				<td> $muse_no </td>
				<td> $lastname, $firstname </td>
				<td> $totalvotes	</td>
				</tr>
			";	
			}
		echo "</table>";
			
		}
?>
<body>
</body>
</html>

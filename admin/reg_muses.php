<?php
	ob_start();
	session_start();
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
<title>MSEUFCI 24th Foundation Online Polling System</title>
<!--<link rel="stylesheet" href="pagi.css" /> -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css"/>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
    $('#myTable').DataTable();
});

</script>

  
  </head>
  <body>
  
	<H1> Admin Candidate Registration </H1>
<?php
	error_reporting(0);
$form="
	<form enctype='multipart/form-data' action='' method='post' name='changer'>
	<input name='MAX_FILE_SIZE' value='4194304' type='hidden'>
	<table>
	<tr>
	<td><input name='image' accept='image/jpeg' type='file' required> </td>
	</tr>
	<tr>
	<td> Contestant No.</td><td><input type='number' name='txtno' required></td>
	</tr>
	<tr>
	<td> Lastname</td><td><input type='text' name='txtlastname' required></td>
	</tr>
	<tr>
	<td> Firstname</td><td><input type='text' name='txtfirstname' required></td>
	</tr>
	<tr>
	<td> Color Organization</td><td><input type='text' name='txtcolor' required></td>
	</tr>

	<tr>
	<td></td><td><input value='Submit' type='submit' name='btnSubmit'> </td>
	</tr>
	
	<tr>
	<td></td><td></td>
	</tr>

	<tr>
	<td></td><td><a href='reg_muses.php?winner=win'> WINNER </a>
	</tr>


	<tr>
	<td></td><td> &nbsp;
	</tr>



<tr>
	<td></td><td>RESET table RECORDS
	</tr>


	<tr>
	<td></td><td><a href='reg_muses.php?reset=totalvotes' onClick=\"return confirm('Are you sure you want to RESET tblmuses totalvotes to 0?')\"> RESET tblmuses totalvotes to 0 </a>
	</tr>


	<tr>
	<td></td><td> &nbsp;
	</tr>


	<tr>
	<td></td><td>DELETE table RECORDS
	</tr>

	<tr>
	<td></td><td><a href='reg_muses.php?delete1=records1' onClick=\"return confirm('Are you sure you want to DELETE all records in tblmuses?')\"> DELETE all records in tblmuses </a>
	</tr>

	<tr>
	<td></td><td><a href='reg_muses.php?delete=records' onClick=\"return confirm('Are you sure you want to DELETE all records in tblaccount?')\"> DELETE all records in tblaccounts </a>
	</tr>

	<tr>
	<td></td><td> &nbsp;
	</tr>


	
	<tr>
	<td></td><td>SHOW table RECORDS
	</tr>

	<tr>
	<td></td><td><a href='reg_muses.php?table=accounts'> SHOW table tblaccounts </a>
	</tr>

	<tr>
	<td></td><td><a href='reg_muses.php?table2=students'> SHOW table tblstudents </a>
	</tr>


	


	
	</table>
	</form>
	
";


	include("../connection/connection.php"); 
	include('functions.php');
	$muse_no=$_POST['txtno'];
	$lastname=$_POST['txtlastname'];
	$firstname=$_POST['txtfirstname'];
	$color=$_POST['txtcolor'];

	$username=$_SESSION['username'];
	if(!isset($_SESSION['username']))
	{
		
		header("location: ../index.php");
	}	
	else
	{
		echo "Welcome $username <a href='reg_muses.php?abc=logout'> Log-out </a> <br><br>" ;
	
		if(isset($_POST['btnSubmit']))
		{
		
			$query_outer=mysqli_query($conn,"SELECT * FROM tblmuses WHERE museno='$muse_no'");
			$num_rows_outer=mysqli_num_rows($query_outer);
			if($num_rows_outer)
			{
					echo ("<font color='red'>Contestant number aldready exists. </font><br>" . $form );				
			}
			else
			{	
				if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) 
				{
				$tmpName = $_FILES['image']['tmp_name'];
				$fp = fopen($tmpName, 'r');
				$data = fread($fp, filesize($tmpName));
				$data = addslashes($data);
				fclose($fp);
	
				$query = "INSERT INTO tblmuses (museno,lastname,firstname, color_org, picture) VALUES ('$muse_no', '$lastname', '$firstname', '$color', '$data')";
				$results=mysqli_query($conn,$query);
	
				echo ("<font color='red'>Sucessfully Saved. </font><br>" . $form );				
				}
				else 
				{
					echo ("<font color='red'>Error Saving. </font><br>" . $form);				
				}
			}

		}

	//if not set
	else
	{
		echo $form;
		
	}
	
}
	
	if($_GET['table']=='accounts')
		{
			
			
		$query_accounts=mysqli_query($conn,"SELECT * FROM tblaccounts ORDER BY lastname");
		$num_rows_accounts=mysqli_num_rows($query_accounts);
		
		echo "	<br><br><br><b>TABLE tblaccounts</b>
			<table id='myTable' border=1>
			<thead>
				<tr> 
				<th> Student Number </th>
				<th> Email</th>
				<th> Lastname </th>
				<th> Firstname </th>
				<th> Middle Name </th>
				<th> Elementary </th>
				<th> High School </th>
				<th> College </th>
				<th> Flag </th>
				<th> Date Registered </th>
				<th> Date Voted </th>
				</tr>
				
		</thead>
				<tbody>
				";
		while($fetch=mysqli_fetch_assoc($query_accounts))
			{
				$sid=$fetch['sid'];
				$email=$fetch['email'];
				$lastname=$fetch['lastname'];
				$firstname=$fetch['firstname'];
				$middlename=$fetch['middlename'];				
				$elem=$fetch['elem_no'];				
				$hs=$fetch['hs_no'];				
				$coll=$fetch['college_no'];								
				$flag=$fetch['flag'];	
				$date_registered=$fetch['date_registered'];	
				$date_voted=$fetch['date_voted'];	
		echo "	
			
				<tr>
				<td> $sid </td>
				<td> $email </td>
				<td> $lastname </td>
				<td> $firstname </td>				
				<td> $middlename </td>
				<td> $elem </td>
				<td> $hs </td>
				<td> $coll </td>				
				<td> $flag </td>
				<td> $date_registered</td>								
				<td> $date_voted </td>								
		</tr>
			";	
			}
		echo "		</tbody></table>";
		}
		
	
	
	if($_GET['table2']=='students')
		{
			
					
		$query_students=mysqli_query($conn,"SELECT * FROM tblstudents ORDER BY lastname");
		$num_rows_students=mysqli_num_rows($query_students);
		
		echo "	<br><br><br><b>TABLE tblstudents</b>
			<table id='myTable' border=1>
			<thead>
				<tr> 
				<th> Student Number </th>
				<th> Lastname </th>
				<th> Firstname </th>
				<th> Middle Name </th>
				</tr>
			</thead>
			<tbody>	";
		while($fetch=mysqli_fetch_assoc($query_students))
			{
				$sid=$fetch['sid'];
				$lastname=$fetch['lastname'];
				$firstname=$fetch['firstname'];
				$middlename=$fetch['middlename'];				
	
		echo "		
		
				<tr>
				<td> $sid </td>
				<td> $lastname </td>
				<td> $firstname </td>				
				<td> $middlename </td>
				</tr>
			";	
			}
		echo "</tbody></table>";
		
		
	
		}
		
	
	
	
	if($_GET['abc']=='logout')
	{
		session_start();
		session_destroy();
		header("location: index.php");
	}
		
	if($_GET['reset']=='totalvotes')
		{
			$account_query12=mysqli_query($conn,"UPDATE tblmuses SET totalvotes=0 WHERE totalvotes>=0");
			if($account_query12)
			{
				echo "total votes resetted successfully.";	
			}
			else
			{
				echo "error resetting total votes.";	
			}
			
		}


	if($_GET['delete']=='records')
		{
			
			
			
			$account_query11=mysqli_query($conn,"DELETE FROM tblaccounts");
			if($account_query11)
			{
				echo "records successfuly deleted.";	
			}
			else
			{
				echo "error deleting records.";	
			}
		}

if($_GET['delete1']=='records1')
		{

			$account_query10=mysqli_query($conn,"DELETE FROM tblmuses");
			if($account_query10)
			{
				echo "records successfuly deleted.";	
			}
			else
			{
				echo "error deleting records.";	
			}
		}

	
		
	if($_GET['winner']=='win')
		{
			$query_totalvotes=mysqli_query($conn,"SELECT museno,lastname,firstname, totalvotes FROM tblmuses WHERE museno BETWEEN 1 AND 4 ORDER BY totalvotes DESC");
		$num_rows_totalvotes=mysqli_num_rows($query_totalvotes);
		
		echo "	<br><br><br><b>Little Miss Enverga</b>
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
		
		echo "	<br><br><br><b>Miss Young Enverga</b>
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
		
		echo "	<br><br><br><b>Little Miss Enverga</b>
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
</body>
</html>

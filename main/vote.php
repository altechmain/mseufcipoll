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

</head>
<body>

<?php
			error_reporting(0);
		include("../connection/connection.php"); 
		
			$sid=$_SESSION['sid'];
			$lastname=$_SESSION['lname'];
			$firstname=$_SESSION['fname'];
			
			if(!isset($_SESSION['sid']))
		{
			header("location: ../index.php");
		}	
		else
		{
			
			$radio_elem=$_POST['elem'];
			$radio_hs=$_POST['hs'];
			$radio_college=$_POST['college'];
			
			//elem
					$query_e=mysqli_query($conn,"SELECT * FROM tblmuses WHERE museno='$radio_elem'");
					$num_rows_e=mysqli_num_rows($query_e);
					while($fetch=mysqli_fetch_assoc($query_e))
						{
							$mno_e=$fetch['museno'];
							$lastname_e=$fetch['lastname'];
							$firstname_e=$fetch['firstname'];
						}
		
	
			//high school
			
				$query_h=mysqli_query($conn,"SELECT * FROM tblmuses WHERE museno='$radio_hs'");
					$num_rows_h=mysqli_num_rows($query_h);
					while($fetch=mysqli_fetch_assoc($query_h))
						{
							$mno_h=$fetch['museno'];
							$lastname_h=$fetch['lastname'];
							$firstname_h=$fetch['firstname'];
						}
						
			//college
						
				$query_c=mysqli_query($conn,"SELECT * FROM tblmuses WHERE museno='$radio_college'");
					$num_rows_c=mysqli_num_rows($query_c);
					while($fetch=mysqli_fetch_assoc($query_c))
						{
							$mno_c=$fetch['museno'];
							$lastname_c=$fetch['lastname'];
							$firstname_c=$fetch['firstname'];
						}
					$contestant_c="Miss Enverga <br>";
					$contestant_c.="Contestant No: $mno_c <br>";
					$contestant_c.="Name:  $firstname_c $lastname_c";
					
			//display the pictures
			
		echo "<table border=0>";
			echo "<tr>";
			echo "<td>";
			echo "<fieldset style=width:500px>";
   		 	echo "<legend>Account Profile</legend>";
			echo "<b>Student/ Employees Number:</b> $sid";
			echo "<br><b>Name:</b> $lastname" . ", " . "$firstname";
			echo "<br><a href='change.php'> Change Password </a></H1> </div>";
			echo "<br><a href='unofficial.php'> Unofficial Result </a></H1> </div>";			
			echo "<br><a href='logout.php'> Log-out </a> <br><br> </H1> </div>" ;
			echo "</fieldset>";
			echo "</td>";
			echo "<td>";
			
			echo "<img src='../images/24th logo.png' width='250' height='150' alt='24th Foundation Anniversary'>";
			echo "</td>";
			echo "</tr>";
			echo "</table>";
			
			include("../connection/connection.php"); 
			
		//elem
			echo "<hr>";
			$query=mysqli_query($conn,"SELECT * FROM tblmuses WHERE museno='$mno_e'");
			$num_rows=mysqli_num_rows($query);
			echo "<div align='middle'> <img src='three.png'> </img> </div>";	
//FORM
//echo "<form method='post' action='save.php'>";
			
			echo "<table  align='center' border=0>";
			echo "<tr>";
			while($fetch=mysqli_fetch_assoc($query))
			{
				$mno=$fetch['museno'];
				$img='<img src="data:image/jpeg;base64,'. base64_encode($fetch['picture']). '" width="250" height="280" id="radio$mno">';
				echo "<figure>";
  				echo "<td>";
				echo  "<label for='radio$mno'> $img  </label>";
				echo "<figcaption>" . $fetch['firstname'] . " " . $fetch['lastname'] ."</figcaption>";
				echo "</figcaption>";
				echo "</figure>";
				echo "</td>";
				
			}


	//high school
			$query_hs=mysqli_query($conn,"SELECT * FROM tblmuses WHERE museno='$mno_h'");
			$num_rows_hs=mysqli_num_rows($query_hs);
			while($fetch=mysqli_fetch_assoc($query_hs))
			{
				$mno_hs=$fetch['museno'];
				$img='<img src="data:image/jpeg;base64,'. base64_encode($fetch['picture']). '" width="250" height="280" id="radio$mno_hs">';
				echo "<figure>";
  				echo "<td>";
				echo  "<label for='radio$mno_hs'> $img  </label>";
				echo "<figcaption>" . $fetch['firstname'] . " " . $fetch['lastname'] ."</figcaption>";
				echo "</figcaption>";
				echo "</figure>";
				echo "</td>";
				
			}

	//college
			$query_college=mysqli_query($conn,"SELECT * FROM tblmuses WHERE museno='$mno_c'");
			$num_rows_collge=mysqli_num_rows($query_college);
			while($fetch=mysqli_fetch_assoc($query_college))
			{
				$mno_college=$fetch['museno'];
				$img='<img src="data:image/jpeg;base64,'. base64_encode($fetch['picture']). '" width="250" height="280" id="radio$mno_college">';
				echo "<figure>";
  				echo "<td>";
				echo  "<label for='radio$mno_college'> $img  </label>";
				echo "<figcaption>" . $fetch['firstname'] . " " . $fetch['lastname'] ."</figcaption>";
				echo "</figcaption>";
				echo "</figure>";
				echo "</td>";
				
			}


			echo "</tr>";
			echo "</table>";	
			
			
			echo "
<div align='center' > 
		<a href='index.php'> <input type='image' src='back_button.png' name='btnImage' > </a> </input> 
		<a href='save.php?e=$mno_e&h=$mno_h&c=$mno_c'> <input type='image' src='submit_button.png' name='btnImage' > </a> </input> 
 </div>
		";
		}
?>

</body>
</html>


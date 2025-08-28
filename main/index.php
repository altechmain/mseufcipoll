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
function getConfirmation(){
               var retVal = confirm("Your Vote will be counted after pressing OK buton.");
               if( retVal == true ){
                  //document.write ("saved");
				  //window.location="vote.php";
                  return true;
               }
               else{
                 //document.write ("not");
				  //window.location="index.php";
                  return false;
               }
            }
</script>
</head>

<body background bgcolor="#e9e9e9">

 
<p>
  <?php
	error_reporting(0);
		$sid=$_SESSION['sid'];
		$lastname=$_SESSION['lname'];
		$firstname=$_SESSION['fname'];
	
		if(!isset($_SESSION['sid']))
		{
			header("location: ../index.php");
		}	
		else
		{	
			echo "<table border=0>";
			echo "<tr>";
			echo "<td>";
			echo "<fieldset style=width:500px>";
   		 	echo "<legend>Account Profile</legend>";
			echo "<b>Student/ Employees Number:</b> $sid";
			echo "<br><b>Name:</b> $lastname" . ", " . "$firstname";
			echo "<br><a href='change.php'> Change Password </a></H1> </div>";
			echo "<br><a href='unofficial.php'> Unofficial Result </a></H1> </div>";
			echo "<br><a href='logout.php'> Log-out </a> <br><br> </H1> </div>";
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
			$query=mysqli_query($conn,"SELECT * FROM tblmuses WHERE museno BETWEEN 1 AND 4");
			$num_rows=mysqli_num_rows($query);
			echo "<div align='middle'> <img src='little.png'> </img> </div>";	
			
			
			//FORM
			echo "<form method='post' action='vote.php'>";
			
			echo "<table  align='center' border=0>";
			echo "<tr>";
			while($fetch=mysqli_fetch_assoc($query))
			{
				$mno=$fetch['museno'];
				$img='<img src="data:image/jpeg;base64,'. base64_encode($fetch['picture']). '" width="250" height="280" id="radio$mno">';
				echo "<figure>";
  				echo "<td>";
				echo  "<label for='radio$mno'> $img  </label>";
				echo "<figcaption>". $mno . ")" . " " . $fetch['firstname'] . " " . $fetch['lastname'] ."</figcaption>";
				echo $fetch['color_org'] . "<br>";
				echo "<figcaption> <input type='radio' name='elem' id='radio$mno' value='$mno'>";
				echo "<label for='radio$mno'> Vote </label>";
				echo "</figcaption>";
				echo "</figure>";
				echo "</td>";
				
			}

			echo "</tr>";
			echo "</table>";	


			//high school
			echo "<hr>";
			$query_hs=mysqli_query($conn,"SELECT * FROM tblmuses WHERE museno BETWEEN 5 AND 8");
			$num_rows_hs=mysqli_num_rows($query_hs);
			echo "<div align='middle'> <img src='young.png'> </img> </div>";	
			echo "<form method='post'>";
			
			echo "<table  align='center' border=0>";
			echo "<tr>";
			while($fetch=mysqli_fetch_assoc($query_hs))
			{
				$mno_hs=$fetch['museno'];
				$img='<img src="data:image/jpeg;base64,'. base64_encode($fetch['picture']). '" width="250" height="280" id="radio$mno_hs">';
				echo "<figure>";
  				echo "<td>";
				echo  "<label for='radio$mno_hs'> $img  </label>";
				echo "<figcaption>". $mno_hs . ")" . " " . $fetch['firstname'] . " " . $fetch['lastname'] ."</figcaption>";
				echo $fetch['color_org'] . "<br>";
				echo "<figcaption> <input type='radio' name='hs' id='radio$mno_hs' value='$mno_hs'>";
				echo "<label for='radio$mno_hs'> Vote </label>";
				echo "</figcaption>";
				echo "</figure>";
				echo "</td>";
				
			}
			echo "</tr>";
			echo "</table>";

//college
echo "<hr>";
			$query_college=mysqli_query($conn,"SELECT * FROM tblmuses WHERE museno BETWEEN 9 AND 12");
			$num_rows_collge=mysqli_num_rows($query_college);
			echo "<div align='middle'> <img src='enverga.png'> </img> </div>";	
			echo "<form method='post' action='JavaScript:getConfirmation()'>";
			
			echo "<table  align='center' border=0>";
			echo "<tr>";
			while($fetch=mysqli_fetch_assoc($query_college))
			{
				$mno_college=$fetch['museno'];
				$img='<img src="data:image/jpeg;base64,'. base64_encode($fetch['picture']). '" width="250" height="280" id="radio$mno_college">';
				echo "<figure>";
  				echo "<td>";
				echo  "<label for='radio$mno_college'> $img  </label>";
				echo "<figcaption>". $mno_college . ")" . " " . $fetch['firstname'] . " " . $fetch['lastname'] ."</figcaption>";
				echo $fetch['color_org'] . "<br>";
				echo "<figcaption> <input type='radio' name='college' id='radio$mno_college' value='$mno_college'>";
				echo "<label for='radio$mno_college'> Vote </label>";
				echo "</figcaption>";
				echo "</figure>";
				echo "</td>";
				
			}

			echo "<tr>";
			echo "<td>";
			echo "</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td>";
			echo "</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td>";
			echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>";
			echo "</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td>";
			echo "</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td>";
			echo "</td>";
			echo "</tr>";

			echo "<tr>";
			
					echo "</tr>";
			echo "</table>";			

echo "
<div align='center' > <input type='image' src='next_button.png' name='btnImage' ></input>  </div>
		";
			echo "</form>";	
					}
?>
</body>
</html>
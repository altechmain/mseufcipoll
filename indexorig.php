<?php
		ob_start();
		session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MSEUFCI 24th Foundation Online Polling System</title>

  <link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
  <script src="css/jquery-1.10.2.js"></script>
  <script src="css/jquery-ui.js"></script>
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

			
			echo "<table border=0>";
			echo "<tr>";
			echo "<td>";
			echo "<img src='images/24th logo.png' width='250' height='150' alt='24th Foundation Anniversary'>";
			echo "</td>";
			echo "<td align='center'>";
			echo "<img src='images/candidates.png' alt='candidates for'>";
			echo "</td>";
			echo "</tr>";
			echo "</table>";
			
			include("connection/connection.php"); 
			//elem
			echo "<hr>";
			$query=mysqli_query($conn,"SELECT * FROM tblmuses WHERE museno BETWEEN 1 AND 4");
			$num_rows=mysqli_num_rows($query);
			echo "<div align='middle'> <img src='main/little.png'> </img> </div>";	
			
			
			//FORM
			echo "<form method='post' action='login_template.php'>";
			
			echo "<table  align='center' border=0>";
			echo "<tr>";
			while($fetch=mysqli_fetch_assoc($query))
			{
				$mno=$fetch['museno'];
				$img='<img src="data:image/jpeg;base64,'. base64_encode($fetch['picture']). '" width="200" height="230" id="radio$mno">';
				echo "<figure>";
  				echo "<td>";
				echo  "<label for='radio$mno'> $img  </label>";
				echo "<figcaption>" . $fetch['firstname'] . " " . $fetch['lastname'] ."</figcaption>";
				//echo "<figcaption> <input type='radio' name='elem' id='radio$mno' value='$mno'>";
				echo $fetch['color_org'] . "<br>";
				echo $fetch['totalvotes'] . " Votes";
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
			echo "<div align='middle'> <img src='main/young.png'> </img> </div>";	
			echo "<form method='post'>";
			
			echo "<table  align='center' border=0>";
			echo "<tr>";
			while($fetch=mysqli_fetch_assoc($query_hs))
			{
				$mno_hs=$fetch['museno'];
				$img='<img src="data:image/jpeg;base64,'. base64_encode($fetch['picture']). '" width="200" height="230" id="radio$mno_hs">';
				echo "<figure>";
  				echo "<td>";
				echo  "<label for='radio$mno_hs'> $img  </label>";
				echo "<figcaption>". $fetch['firstname'] . " " . $fetch['lastname'] ."</figcaption>";
				//echo "<figcaption> <input type='radio' name='hs' id='radio$mno_hs' value='$mno_hs'>";
				echo $fetch['color_org'] . "<br>";
				echo $fetch['totalvotes'] . " Votes";
				echo "</figure>";
				echo "</td>";
				
			}
			echo "</tr>";
			echo "</table>";

//college
echo "<hr>";
			$query_college=mysqli_query($conn,"SELECT * FROM tblmuses WHERE museno BETWEEN 9 AND 12");
			$num_rows_collge=mysqli_num_rows($query_college);
			echo "<div align='middle'> <img src='main/enverga.png'> </img> </div>";	
			echo "<form method='post' action='JavaScript:getConfirmation()'>";
			
			echo "<table  align='center' border=0>";
			echo "<tr>";
			while($fetch=mysqli_fetch_assoc($query_college))
			{
				$mno_college=$fetch['museno'];
				$img='<img src="data:image/jpeg;base64,'. base64_encode($fetch['picture']). '" width="200" height="230" id="radio$mno_college">';
				echo "<figure>";
  				echo "<td>";
				echo  "<label for='radio$mno_college'> $img  </label>";
				echo "<figcaption>". $fetch['firstname'] . " " . $fetch['lastname'] ."</figcaption>";
				//echo "<figcaption> <input type='radio' name='college' id='radio$mno_college' value='$mno_college'>";
				echo $fetch['color_org'] . "<br>";
				echo $fetch['totalvotes'] . " Votes";
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
			
			echo "<hr>";
			
				
echo "<div align='middle'> <img src='images/cast.png'> </img> </div>";	
echo "
<div align='center' > <input type='image' src='images/now.png' name='btnImage' ></input>  </div>
		";
		
		echo "<hr>";
		
			echo "</form>";	


$hit_count = file_get_contents('count.txt');
    		echo "<div align='right'> Page view: [ $hit_count ] </div>";
			$hit_count++;
            file_put_contents('count.txt', $hit_count);
			

$query_voters=mysqli_query($conn,"SELECT COUNT(flag) AS voted FROM tblaccounts WHERE flag=1");
			$num_rows_voters=mysqli_num_rows($query_voters);
			$rows1 = mysqli_fetch_assoc($query_voters);

			$query_studs=mysqli_query($conn,"SELECT COUNT(sid) AS voters FROM tblstudents");
			$num_rows_studs=mysqli_num_rows($query_studs);
			$rows2 = mysqli_fetch_assoc($query_studs);
			
			$vted=$rows1['voted'];
			$vters=$rows2['voters'];
			$turnout=round(($vted/$vters)*100,2);
			
			echo "<div align='right'> Voter Turn-out : [ $turnout% ] </div>";

?>
</body>
</html>
<?php
//variable declaration
/*$dbhost="localhost";
$dbuser="root";
$dbpass="";*/

$dbhost="localhost";
$dbuser="wwshubco_admin";
$dbpass="Hybrider1";
$dberror1="MySQL connection problem";
$dberror2="Database connection problem";

//The mysqli_connect() function opens a new connection to the MySQL server.
$conn=mysqli_connect($dbhost,$dbuser,$dbpass) or die ($dberror1);

//The mysqli_select_db() function is used to change the default database for the connection.
$select_db=mysqli_select_db($conn,'wwshubco_dbPoll') or die ($dberror2);

//echo $conn;

?>

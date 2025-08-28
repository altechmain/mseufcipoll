<?php
	ob_start();
	session_start();
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
   <title>MSEUFCI 24th Foundation Online Polling System</title>
    
    <link rel="stylesheet" href="../css/reset.css">
<link rel="stylesheet prefetch" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900">
<link rel="stylesheet prefetch" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="../css/style.css">
    
  </head>

  <body>
  <?php
  
  if(!isset($_SESSION['sid']))
		{
			header("location: ../index.php");
		}	
		else
		{
  ?>
  
  
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="..js/index.js"></script>
     <script src="../js/repeat_password4.js"></script>
    
<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
<img src="../images/24th logo.png" width="500" height="300" alt="24th Foundation Anniversary">
</div>

  <div class="container">
  <div class="card"></div>
  <div class="card">
    <div class="toggle"></div>
    <h1 class="title">Change Password
    </h1>
    <form method="post" action="change_validate.php">
      <div class="input-container">
        <input type="text" id="Student_Number" required name="getSid" value="<?php echo $sid=$_SESSION['sid']; ?>" disabled/>
        <label for="Student_Number"></label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Password_old" required name="getoldPassword"/>
        <label for="Password_old">Old Password</label>
        <div class="bar"></div>
      </div>
           <div class="input-container">
        <input type="password" id="Password" required name="getnewPassword"/>
        <label for="Password">New Password</label>
        <div class="bar"></div>
      </div>

           <div class="input-container">
        <input type="password" id="rePassword" required/>
        <label for="rePassword">Repeat Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button type="submit" onClick="validatePassword()"><span>Save</span></button>
      </div>
      <div class="footer"><a href="index.php">Back</a></div>
    </form>
  </div>
  
  
  
</div>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="..js/index.js"></script>
     <script src="../js/repeat_password4.js"></script>
     
     <?php
		}
     ?>
     
     
  </body>
</html>

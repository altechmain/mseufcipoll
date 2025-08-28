<!DOCTYPE html>
<html >
  <head>

    <meta charset="UTF-8">
<meta name="description" content="Online Polling Voting Survey System">
	<meta name="keywords" content="muse,muses,candelaria,enverga,mseufci,mseuf,foundation,24th,24,anniversary,voting,votes,survey,poll,polling,online voting,online polling,online survey,online system,quezon,candelaria quezon,enverga lucena,enverga candelaria">
	<meta name="author" content="Aldwin M. Ilumin">

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->



   <title>MSEUFCI 24th Foundation Online Polling System</title>
    <link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet prefetch" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900">
<link rel="stylesheet prefetch" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="css/style.css">

    
  </head>

  <body>
<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
 <h1><img src="images/24th logo.png" width="500" height="300" alt="24th Foundation Anniversary"></h1></div>
<div class="container">
  <div class="container">
    <div class="card"></div>
    <div class="card">
      <h1 class="title">Login</h1>
      <form action="./login/index.php" method="post">
        <div class="input-container">
          <input type="text" id="Student_Number" required name="txtUsername"/>
          <label for="Student_Number">Student/ Employees No.</label>
          <div class="bar"></div>
        </div>
        <div class="input-container">
          <input type="password" id="password" required name="txtPassword"/>
          <label for="password">Password</label>
          <div class="bar"></div>
        </div>
        <div class="button-container">
          <button type="submit"><span>Go</span></button>
        </div>
        <div class="footer"><a href="register/index.html">Register</a></div>
        <div class="footer"><a href="forgot/index.html">Forgot your password?</a></div>
        <div class="footer"><a href="help/index.html">Need Help?</a></div>
      </form>
    </div>
    <div class="card alt">
      <div class="toggle"></div>
      <h1 class="title">Register
        <div class="close"></div>
      </h1>
      <form method="post" action="./register/reg_validate.php">
        <div class="input-container">
          <input type="text" id="Student_Number" required name="getSid"/>
          <label for="Student_Number">Student/ Employees No.</label>
          <div class="bar"></div>
        </div>
        <div class="input-container">
          <input type="password" id="Middle_Name" required name="getMiddleName"/>
          <label for="Middle_Name">Middle Name</label>
          <div class="bar"></div>
        </div>
        <div class="input-container">
          <input type="email" id="email" required name="getEmail">
          <label for="email">Valid Email Address</label>
          <div class="bar"></div>
        </div>
        <div class="input-container">
          <input type="password" id="Password" required name="getPassword"/>
          <label for="Password">Password</label>
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
      </form>
    </div>
  </div>
</div>
<footer align="center"> 

 <div id='ce'> Copyright <?php echo "&copy; 2016"  ?> MSEUFCI Envergans' Choice Award. by: AMI. All rights reserved.


	<?php 
    		$hit_count = file_get_contents('count.txt');
    		echo "[".$hit_count."] ";
			$hit_count++;
            file_put_contents('count.txt', $hit_count);
	?> 
</div>
<br>
<br>
   
    
</footer>



<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/index.js"></script>
     <script src="js/repeat_password.js"></script>
  </body>
</html>

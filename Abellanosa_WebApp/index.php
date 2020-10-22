<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<form id="login" action="Includes/login.inc.php" method="post">
		  <div class="imgcontainer">
		    <img src="Images/Male.png" alt="Avatar" class="avatar">
		  </div>

		  <div class="container">
		    <label for="uname"><b>Username</b></label>
		    <input type="text" placeholder="Enter Username" name="username" required>

		    <label for="psw"><b>Password</b></label>
		    <input type="password" placeholder="Enter Password" name="password" required>
		        
		    <button id="loginbutton" type="submit" name="login-submit">Login</button>
		  </div>
		  <div class="container" style="background-color:#f1f1f1">
		    <button onclick="login_guide()" type="button" class="helpbtn">HELP</button>
		    <span class="psw"><a href="create.php">Create Account</a></span>
		    <span class="psw"> | </span>
		  </div>
		</form>
	</body>
<script src="script.js"></script>
</html>

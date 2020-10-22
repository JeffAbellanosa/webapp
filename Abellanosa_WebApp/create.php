<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<form id="login" action="Includes/create.inc.php" method="post">
		  <h2>Create Account</h2>

		  <div class="container">
		    <label for="uname"><b>Username</b></label>
		    <input type="text" placeholder="Enter Username" name="username" required>

		    <label for="psw"><b>Password</b></label>
		    <input type="password" placeholder="Enter Password" name="password" required>
		        
		    <button id="loginbutton" type="submit" name="create-submit">Create</button>
		  </div>
		</form>
	</body>
</html>

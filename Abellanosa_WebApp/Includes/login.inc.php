<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="inc_style.css">
	</head>
	<body>
		<div id="inc">
			<?php
				if(isset($_POST['login-submit'])){
					include_once('../db.php');
					$con = mysqli_connect("$localhost","$dbusername","$dbpass","$dbname");

					$username = $_POST['username'];
					$password = md5($_POST['password']);

					$sql = "SELECT ID FROM login WHERE username = '$username' and password = '$password'";
					$result = mysqli_query($con, $sql);
				    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				      
				    $count = mysqli_num_rows($result);
						
				    if($count == 1) {
				    	echo "Employee verified";
				    	echo "<br><a href = \"../home.php\">Click here to continue</a>";
				    	$_SESSION['username'] = $username;
				    	$_SESSION['logged_in'] = 1;
				    }else {
				        echo "Your Login Name or Password is invalid";
				        echo "<br><a href = \"../index.php\">Click here to try again</a>";
				    }
				}
				else{
					echo "Unusual traffic deteceted.";
					echo "<br><a href = \"../index.php\">Click here to try again</a>";
				}
			?>
		</div>
	</body>
<script src="script.js"></script>
</html>	



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
				if(isset($_POST['reset-submit'])){
					include_once('../db.php');
					$con = mysqli_connect("$localhost","$dbusername","$dbpass","$dbname");

					$password = $_POST['pword'];
					$username = $_SESSION['username'];

					$sql = "SELECT * FROM login WHERE username = '$username'";
					$result = mysqli_query($con, $sql);
				    $row = mysqli_fetch_array($result);
						
				    if($row[2] == md5($password)) {
				    	echo "Password matched";
				    	$_SESSION["ID"] = $row[0];
				    	?>
					    	<form action="reset2.inc.php" method="post">
								<label for="password">New Password:</label>
								<input type="password" id="password" name="password" required>
								<button type="submit" name="reset-submit">Proceed</button>
							</form>
						<?Php
				    }else{

						echo "Invalid Password!";
						echo "<br><a href = \"../home.php\">Click here to try again</a>";
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



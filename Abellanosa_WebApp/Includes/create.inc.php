<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="inc_style.css">
	</head>
	<body>
		<div id="inc">
			<?php
				if(isset($_POST['create-submit'])){
					include_once('../db.php');
					$con = mysqli_connect("$localhost","$dbusername","$dbpass","$dbname");

					$username = $_POST['username'];
					$password = md5($_POST['password']);

					$sql = "SELECT ID FROM login WHERE username = '$username'";
					$result = mysqli_query($con, $sql);
				    $row = mysqli_fetch_array($result);
				      
				    $count = mysqli_num_rows($result);
						
				    if($count > 0) {
				    	echo "Username taken, try again!";
				    	echo "<br><a href = \"../create.php\">Click here to try again!</a>";
				    }else{

				    	$sql = "INSERT INTO login (username, password)
						VALUES ('$username', '$password')";

						if ($con->query($sql) === TRUE) {
					  		echo "Account created!";
							echo "<br><a href = \"../index.php\">Log in here!</a>";
						} else {
						 	echo "<br>Error: " . $sql . "<br>" . $con->error;
						 	echo "<br><a href = \"../create.php\">Click here to try again!</a>";
						}
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



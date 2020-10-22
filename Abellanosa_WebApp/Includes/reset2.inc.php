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

					$password = md5($_POST['password']);
					$ID = $_SESSION["ID"];

					echo "Password changed";
				    	
				    $sql = "UPDATE `login` SET `password` = '$password' 
				    	WHERE `login`.`id` = '$ID'";
				    	mysqli_query($con, $sql);

				    echo "<br><a href = \"../index.php\">Click here proceed</a>";
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



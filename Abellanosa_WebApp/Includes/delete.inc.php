<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="inc_style.css">
	</head>
	<body>
		<div id="inc">
			<?php
				include_once('../db.php');
				$con= new mysqli($localhost, $dbusername, $dbpass);

				$sql = "DROP DATABASE abellanosa_db;";
				
				if($con->query($sql) === TRUE){
					echo "Database deleted!<br>";
					echo "<br><a href = \"../index.php\">Click me to go back to login page.</a>";
				}
				else{
					echo "Something went wrong :/";
				}
				$con->close();
			?>
		</div>
	</body>
<script src="script.js"></script>
</html>	



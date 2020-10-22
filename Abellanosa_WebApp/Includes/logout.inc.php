<?php
session_start();
$_SESSION['logged_in'] = 0;
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="inc_style.css">
	</head>
	<body>
		<div style="background-color: white; width: 30%;text-align: center;margin: auto;">
			<p>Logged out</p>
			<p><br><a href = "../index.php">Click here to log-in again</p>
		</div>
	</body>
<script src="script.js"></script>
</html>

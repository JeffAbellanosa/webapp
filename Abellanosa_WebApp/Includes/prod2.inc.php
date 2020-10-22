<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="inc_style.css">
	</head>
	<body>
		<div id="inc">
			<?php
				if(isset($_POST['change-submit'])){
					include_once('../db.php');
					$con = mysqli_connect("$localhost","$dbusername","$dbpass","$dbname");

					$ID = $_POST['prod_id'];
					$Price = $_POST['prod_price'];

					$sql = "SELECT * FROM products WHERE ID = '$ID'";
					$result = mysqli_query($con, $sql);
				    $row = mysqli_fetch_array($result);
				    $count = mysqli_num_rows($result);

				    if($count == 1){
				    	echo "Found product!<br>";
				    	$sql = "UPDATE `products` SET `price` = '$Price' WHERE `products`.`id` = '$ID'";
				    	mysqli_query($con, $sql);
				    	echo "<br><a href = \"../products.php\">Click here to proceed</a>";
				    }
				    else{
				    	echo "Product ID Not found.";
				    	echo "<br><a href = \"../products.php\">Click here to try again</a>";
				    }
				}
				else if(isset($_POST['add-submit'])){

					include_once('../db.php');
					$con = mysqli_connect("$localhost","$dbusername","$dbpass","$dbname");

					$prod = $_POST['prod_name'];
					$color = $_POST['prod_color'];
					$size = $_POST['prod_size'];
					$quantity = $_POST['prod_quant'];
					$price = $_POST['prod_price'];

					$sql = 	"SELECT * FROM `products` WHERE `product` = '$prod' and `color` = '$color' and `size` = '$size'";
					$result = mysqli_query($con, $sql);
				    $row = mysqli_fetch_array($result);
				    $count = mysqli_num_rows($result);
				    
				    if($count == 1){
				    	echo "Detected a duplicate product (Product ID#: ". $row[0] .")<br>";
				    	echo "Proceeding to increment quantity with updated price...";

				    	$newQuant = $row[4] + $quantity;

				    	$sql = "UPDATE `products` SET `quantity` = '$newQuant' 
				    		WHERE `products`.`id` = '$row[0]'";
				    	mysqli_query($con, $sql);

				    	$sql = "UPDATE `products` SET `price` = '$price' 
				    			WHERE `products`.`id` = '$row[0]'";
				    	mysqli_query($con, $sql);

				    	echo "<br><a href = \"../products.php\">Click here to proceed</a>";
				    }
				    else{
				    	echo "New product added!<br>";
				    	$sql = "INSERT INTO `products` (`product`, `color`, `size`, `quantity`, `price`) 
								VALUES ('$prod', '$color', '$size', '$quantity', '$price')";
						mysqli_query($con, $sql);
						echo "<br><a href = \"../products.php\">Click here to proceed</a>";
				    }
				}
				else if(isset($_POST['rem-submit'])){
					include_once('../db.php');
					$con = mysqli_connect("$localhost","$dbusername","$dbpass","$dbname");

					$ID = $_POST['prod_id'];

					$sql = "SELECT * FROM products WHERE ID = '$ID'";
					$result = mysqli_query($con, $sql);
				    $row = mysqli_fetch_array($result);
				    $count = mysqli_num_rows($result);

				    if($count == 1){
				    	echo "Found and deleted product!<br>";
				    	$sql = "DELETE FROM `products` WHERE `products`.`id` = '$ID'";
				    	mysqli_query($con, $sql);
				    	echo "<br><a href = \"../products.php\">Click here to proceed</a>";
				    }
				    else{
				    	echo "Product ID Not found.";
				    	echo "<br><a href = \"../products.php\">Click here to try again</a>";
				    }

				}
				else{
					echo "Unusual traffic deteceted.";
					echo "<br><a href = \"../products.php\">Click here to try again</a>";
				}
			?>
		</div>
	</body>
<script src="script.js"></script>
</html>	




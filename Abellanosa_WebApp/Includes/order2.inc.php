<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="inc_style.css">
	</head>
	<body>
		<div id="inc">
			<?php
				if(isset($_POST['neword-submit'])){
					include_once('../db.php');
					$con = mysqli_connect("$localhost","$dbusername","$dbpass","$dbname");
					
					$fname = $_POST['firstname'];
					$lname = $_POST['lastname'];
					$prod_id = $_POST['prod_ID'];
					$quantity = $_POST['prod_quant'];
					$discpercent = $_POST['discpercent'];
					$discflat  =$_POST['discflat'];

					$sql = "SELECT * FROM products WHERE ID = '$prod_id'";
					$result = mysqli_query($con, $sql);
				    $row = mysqli_fetch_array($result);
				    $count = mysqli_num_rows($result);

				    if($count != 1){
				    	echo "Product does not exist!";
				    	echo "<br><a href = \"../orders.php\">Click here to try again</a>";
				    }
				    else if($row[4] < $quantity){
				    	echo "Not enough items for the order";
				    	echo "<br><a href = \"../orders.php\">Click here to try again</a>";
				    }else{
					    $newQuant = $row[4] - $quantity;

					    $sql = "UPDATE `products` SET `quantity` = '$newQuant' 
					    	WHERE `products`.`id` = '$prod_id'";
					    mysqli_query($con, $sql);

					    $fee = $row[5] * $quantity - $discflat;

					    $fee = $fee - $fee * ($discpercent / 100);

					    $sql = "INSERT INTO `orders` (`firstname`, `lastname`, `prod_id`, `quantity`, `fee`) 
								VALUES ('$fname', '$lname', '$prod_id', '$quantity', '$fee')";
						mysqli_query($con, $sql);

						echo "Order has been placed.<br>Number of available products have been decremented.";
				    	echo "<br><a href = \"../orders.php\">Click here to proceed</a>";
					}
				}
				else if(isset($_POST['cancord-submit'])){
					include_once('../db.php');
					$con = mysqli_connect("$localhost","$dbusername","$dbpass","$dbname");

					$ID = $_POST['order_id'];

					$sql = "SELECT * FROM orders WHERE ID = '$ID'";
					$result = mysqli_query($con, $sql);
				    $row_orders = mysqli_fetch_array($result);
				    $count = mysqli_num_rows($result);

				    if($count == 1){
				    	echo "Found and canceled order!<br>";
				    	$sql = "DELETE FROM `orders` WHERE `orders`.`id` = '$ID'";
				    	mysqli_query($con, $sql);

				    	$sql = "SELECT * FROM products WHERE ID = '$row_orders[3]'";
						$result = mysqli_query($con, $sql);
				    	$row_products = mysqli_fetch_array($result);
				    	$count = mysqli_num_rows($result);

				    	if($count == 1){
				    		echo "Updated quantity of product with ID: ".$row_orders[3]."<br>";
				    		$newQuant = $row_orders[4] + $row_products[4];
					    	$sql = "UPDATE `products` SET `quantity` = '$newQuant' 
						    	WHERE `products`.`id` = '$row_orders[3]'";
						    mysqli_query($con, $sql);
				    	}
				    	else{
				    		echo "Returned product is returned as an unavailable product.<br>";
				    	}

				    	echo "<br><a href = \"../orders.php\">Click here to proceed</a>";
				    }
				    else{
				    	echo "Product ID Not found.";
				    	echo "<br><a href = \"../orders.php\">Click here to try again</a>";
				    }
				}
				else if(isset($_POST['remord-submit'])){

					include_once('../db.php');
					$con = mysqli_connect("$localhost","$dbusername","$dbpass","$dbname");

					$ID = $_POST['order_id'];

					$sql = "SELECT * FROM orders WHERE ID = '$ID'";
					$result = mysqli_query($con, $sql);
				    $row_orders = mysqli_fetch_array($result);
				    $count = mysqli_num_rows($result);

				    if($count == 1){
				    	echo "Found and removed order!<br>";
				    	$sql = "DELETE FROM `orders` WHERE `orders`.`id` = '$ID'";
				    	mysqli_query($con, $sql);
				    	echo "<br><a href = \"../orders.php\">Click here to proceed</a>";
				    }
				    else{
				    	echo "Product ID Not found.";
				    	echo "<br><a href = \"../orders.php\">Click here to try again</a>";
				    }
				}
				else{
					echo "Unusual traffic deteceted.";
					echo "<br><a href = \"../orders.php\">Click here to try again</a>";
				}
			?>
		</div>
	</body>
<script src="script.js"></script>
</html>	


<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<?Php
			if ($_SESSION['logged_in'] == 1) {
				?>
				<div id="mySidenav" class="sidenav">
				  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
				  <?Php echo "<p id=\"hi\">Hello, ". $_SESSION['username'] . "!</p>"; ?>
				  <a href="home.php">Home</a>
				  <a id="active" href="#">Products</a>
				  <a href="orders.php">Orders</a>
				  <a href="reset.php">Reset Password</a>
				  <a href="Includes/logout.inc.php">Log Out</a>
				</div>

				<span id="navbutton" onclick="openNav()">Open Menu</span>
				<div id="main">
					<div id="header">
						<h1>Store Inventory Manager</h1>
					</div>
					<div id="body">
						<?php 
							include_once('db.php');
							$mysqli = new mysqli($localhost, $dbusername, $dbpass, $dbname); 
							$query = "SELECT * FROM products";


							echo '<table id="table" border="0" cellspacing="0" cellpadding="20"> 
							      <tr> 
							          <th>ID</th> 
							          <th>Product</th> 
							          <th>Color</th> 
							          <th>Size</th> 
							          <th>Quantity</th> 
							          <th>Price</th> 
							      </tr>';

							if ($result = $mysqli->query($query)) {
							    while ($row = $result->fetch_assoc()) {
							        $id = $row["id"];
							        $prod = $row["product"];
							        $color = $row["color"];
							        $size = $row["size"];
							        $quantity = $row["quantity"]; 
							        $price = $row["price"]; 

							        echo '<tr> 
							                  <td>'.$id.'</td> 
							                  <td>'.$prod.'</td> 
							                  <td>'.$color.'</td> 
							                  <td>'.$size.'</td> 
							                  <td>'.$quantity.'</td> 
							                  <td>'.$price.'</td> 
							              </tr>';
							    }
							    $result->free();
							} 
							?>
							<div id="options">
								<form action="Includes/prod.inc.php" method="post">
								  <button type="submit" name="change-submit">Change a Price</button>
								</form>
								
								<form action="Includes/prod.inc.php" method="post">
								  <button type="submit" name="add-submit">Add a Product</button>
								</form>

								<form action="Includes/prod.inc.php" method="post">
								  <button type="submit" name="rem-submit">Remove a Product</button>
								</form>
							</div>
					</div>
					
				</div>
				<?Php
			}
			else{
				echo "<div style = \"background-color: white; width: 30%;text-align: center;margin: auto;\">";
				echo "Unusual traffic deteceted.";
				echo "<br><a href = \"index.php\">Click here to try again</a>";
				echo "</div>";
			}
		?>
	</body>
<script src="script.js"></script>
</html>

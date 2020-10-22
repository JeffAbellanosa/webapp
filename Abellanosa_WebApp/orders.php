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
				  <?Php echo "<p id=\"hi\">Hello, ". $_SESSION['username'] . "!/p>"; ?>
				  <a href="home.php">Home</a>
				  <a href="products.php">Products</a>
				  <a id="active" href="#">Orders</a>
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
							$query = "SELECT * FROM orders";


							echo '<table id="table" border="0" cellspacing="0" cellpadding="20"> 
							      <tr> 
							          <th>ID</th> 
							          <th>Firstname</th> 
							          <th>Lastname</th> 
							          <th>Product ID</th> 
							          <th>Quantity</th> 
							          <th>fee</th> 
							      </tr>';

							if ($result = $mysqli->query($query)) {
							    while ($row = $result->fetch_assoc()) {
							        $id = $row["id"];
							        $fname = $row["firstname"];
							        $lname = $row["lastname"];
							        $prod_id = $row["prod_id"];
							        $quantity = $row["quantity"]; 
							        $fee = $row["fee"]; 

							        echo '<tr> 
							                  <td>'.$id.'</td> 
							                  <td>'.$fname.'</td> 
							                  <td>'.$lname.'</td> 
							                  <td>'.$prod_id.'</td> 
							                  <td>'.$quantity.'</td> 
							                  <td>'.$fee.'</td> 
							              </tr>';
							    }
							    $result->free();
							} 
							?>
							<div id="options">
								<form action="Includes/order.inc.php" method="post">
								  <button type="submit" name="neword-submit">Add a New Order</button>
								</form>
								<form action="Includes/order.inc.php" method="post">
								  <button type="submit" name="cancord-submit">Cancel an Order</button>
								</form>
								<form action="Includes/order.inc.php" method="post">
								  <button type="submit" name="remord-submit">Remove Finished Order</button>
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
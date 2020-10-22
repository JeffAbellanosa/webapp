<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="inc_style.css">
	</head>
	<body>
		<div id="inc">
			<?php
				if(isset($_POST['change-submit'])){
					?>
					<form action="prod2.inc.php" method="post">
						<table>
							<tr>
								<td><label for="prod_id">ID of the product you wish to change:</label></td>
								<td><input type="number" id="prod_id" name="prod_id"></td>
							</tr>
							<tr>
								<td><label for="prod_price">New price of the product: </label></td>
								<td><input type="number" id="prod_price" name="prod_price"></td>
							</tr>
						</table>
						<button type="submit" name="change-submit">Proceed</button>
					</form>
					<?Php
				}
				else if(isset($_POST['add-submit'])){
					?>
					<form action="prod2.inc.php" method="post">
						<table>
						<tr>
							<td><label for="prod_name">Product Name:</label></td>
							<td><input type="text" id="prod_name" name="prod_name" required></td>
						</tr>
						<tr>
							<td><label for="prod_color">Color:</label></td>
							<td><input type="text" id="prod_color" name="prod_color" required></td>
						</tr>
						<tr>
							<td><label for="prod_size">Size:</label></td>
							<td><input type="text" id="prod_size" name="prod_size" required></td>
						</tr>
						<tr>
							<td><label for="prod_quant">Quantity:</label></td>
							<td><input type="number" id="prod_quant" name="prod_quant" required></td>
						</tr>
						<tr>
							<td><label for="prod_price">Price:</label></td>
							<td><input type="number" step="0.01" id="prod_price" name="prod_price" required></td>
						</tr>
						</table>
						<br>
						<button type="submit" name="add-submit">Proceed</button>
					</form>
					<?Php
				}
				else if(isset($_POST['rem-submit'])){
					?>

					<form action="prod2.inc.php" method="post">
						<label for="prod_id">ID of the product you wish to delete:</label>
						<input type="number" id="prod_id" name="prod_id">
						<button type="submit" name="rem-submit">Proceed</button>
					</form>

					<?Php
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




<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="inc_style.css">
	</head>
	<body>
		<div id="inc">
			<?php
				if(isset($_POST['neword-submit'])){
					?>

					<form action="order2.inc.php" method="post">
						<table>
						<tr>
							<td><label for="firstname">Firstname:</label></td>
							<td><input type="text" id="firstname" name="firstname" required></td>
						</tr>
						<tr>
							<td><label for="lastname">Lastname:</label></td>
							<td><input type="text" id="lastname" name="lastname" required></td>
						</tr>
						<tr>
							<td><label for="prod_ID">Product ID:</label></td>
							<td><input type="number" id="prod_ID" name="prod_ID" required></td>
						</tr>
						<tr>
							<td><label for="prod_quant">Quantity:</label></td>
							<td><input type="number" id="prod_quant" name="prod_quant" required></td>
						</tr>
						<tr>
							<td><label for="discpercent">Discount in %:</label></td>
							<td><input type="number" id="discpercent" name="discpercent" required></td>
						</tr>
						<tr>
							<td><label for="discflat">Flat deduction discount:</label></td>
							<td><input type="number" id="discflat" name="discflat" required></td>
						</tr>
						</table>
						<br>
						<button type="submit" name="neword-submit">Proceed</button>
					</form>

					<?Php
				}
				else if(isset($_POST['cancord-submit'])){
					?>

					<form action="order2.inc.php" method="post">
						<label for="order_id">ID of the order to cancel:</label>
						<input type="number" id="order_id" name="order_id">
						<button type="submit" name="cancord-submit">Proceed</button>
					</form>

					<?Php
				}
				else if(isset($_POST['remord-submit'])){
					?>

					<form action="order2.inc.php" method="post">
						<label for="order_id">ID of the order to remove:</label>
						<input type="number" id="order_id" name="order_id">
						<button type="submit" name="cancord-submit">Proceed</button>
					</form>

					<?Php
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



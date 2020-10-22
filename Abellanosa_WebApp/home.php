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
				  <a id="active" href="#">Home</a>
				  <a href="products.php">Products</a>
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
						<H2>About This Project</H2>
						<p>
							Hi, this is just a proof of concept for inventory management of a clothing store. Listed below are the features of my web application.
						</p>


						<H2>Features</H2>
						<ul>
							<li><H4>Fully Functional Database</H4></li>
							<p>All the changes, updates, and alterations done to the database are permanent. This persist even if Apache and MySQL services are disabled (they still need to be turned on to access this).</p>
							<li><H4>Fully Functional Login System</H4></li>
							<p>There is a dedicated table for login details. Employees/users can create account and login using these details. There is also a pre-made login details made for testing purposes (<i> username: admin & password: admin</i>).</p>
							<li><h4>Change a Product's Price</h4></li>
							<p>Prices set when adding a new product can be edited. The products are accessed through their unique Product IDs.</p>
							<li><h4>Add a Product</h4></li>
							<p>If the user attempts to add a product that already exists, the web-app will automatically add the added quantity to the already existing product. The price will also be updated.</p>
							<li><h4>Remove a Product</h4></li>
							<p>Products can also be removed. If a product is no longer available, it can be removed from the system.</p>
							<li><h4>Comprehensive Order System</h4></li>
							<p>In top of the auto calculation of price, there is also two available discounts to input when an order is made (%-based and flat discount). The web-app also checks if the ordered item exists and if the quantity of items ordered are satisfiable by the inventory. Quantity of items available in the products database are also automatically decreased according to the order made.</p>
							<li><h4>Cancellable Orders</h4></li>
							<p>Orders can be cancelled, returning the ordered items to the products database. This means that whenever an order is cancelled, the user no longer need to manually transfer the items or change product statuses.</p>
							<li><h4>Remove Finished Orders</h4></li>
							<p>Finished orders can be marked as finished and remove from the table or list.</p>
						</ul>

					</div>
					<div id="footer">
						Inventory Manager Proof of Concept | All Rights Reserved &copy; 2020-2021
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

<?php
	include_once('../db.php');
	$con= new mysqli($localhost, $dbusername, $dbpass);

	$sql = "CREATE DATABASE $dbname";
	$con->query($sql);
 
	$con = mysqli_connect("$localhost","$dbusername","$dbpass","$dbname");
	$sql = "CREATE TABLE login(
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		username VARCHAR(50) NOT NULL,
		password VARCHAR(50) NOT NULL
	)";

	if ($con->query($sql) === TRUE) {
		$sql = "INSERT INTO login (username, password)
		VALUES ('admin', md5('admin'))";
		$con->query($sql);
	}

	$sql = "CREATE TABLE products(
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		product VARCHAR(20) NOT NULL,
		color VARCHAR(20) NOT NULL,
		size VARCHAR(20) NOT NULL,
		quantity INT,
		price FLOAT(20)
	)";

	if ($con->query($sql) === TRUE) {
		
		$sql = "INSERT INTO products (product, color, size, quantity, price)
		VALUES ('T-Shirt', 'blue', 'S', '102', '100.00')";

		$con->query($sql);

		$sql = "INSERT INTO products (product, color, size, quantity, price)
		VALUES ('T-Shirt', 'blue', 'M', '98', '120.50')";

		$con->query($sql);

		$sql = "INSERT INTO products (product, color, size, quantity, price)
		VALUES ('T-Shirt', 'blue', 'L', '113', '145.75')";

		$con->query($sql);

		$sql = "INSERT INTO products (product, color, size, quantity, price)
		VALUES ('Rambo-Pants', 'grey', 'M', '86', '165.50')";

		$con->query($sql);
	}

	$sql = "CREATE TABLE orders(
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		firstname VARCHAR(50) NOT NULL,
		lastname VARCHAR(50) NOT NULL,
		prod_id INT,
		quantity INT,
		fee FLOAT(20)
	)";

	if ($con->query($sql) === TRUE) {
		
		$sql = "INSERT INTO orders (firstname, lastname, prod_id, quantity, fee)
		VALUES ('John', 'Watson', '1', '2', '200.00')";

		$con->query($sql);

		$sql = "INSERT INTO orders (firstname, lastname, prod_id, quantity, fee)
		VALUES ('Sherlock', 'Holmes', '2', '3', '361.50')";

		$con->query($sql);
	}

	echo "Done!";

	$con->close();
?>
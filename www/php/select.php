<?php
	header("Access-Control-Allow-Origin: *");
	$servername = "mysql.hostinger.es";
	$username = "u261058157_admin";
	$password = "mImUVY2g";
	$dbname = "u261058157_ma";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "(SELECT * FROM denuncia ORDER BY codi DESC LIMIT 10) ORDER BY codi ASC ";
	$result = $conn->query($sql);
	$rows = array();
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
	} else {
		echo "0 results";
	}
	print json_encode($rows);
	$conn->close();
?>
<?php
	
	$server = "localhost";
	$user = "root";
	$password = "";
	$nama_database = "tugas_akhir";

	$conn = new mysqli($server, $user, $password, $nama_database);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
?>	
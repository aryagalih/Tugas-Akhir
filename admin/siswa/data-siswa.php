<?php 
	include("../config.php");

	$nis = $_GET['nis'];
	$sql = "SELECT * FROM tb_siswa WHERE nis = $nis";
	$query = $conn->query($sql);
	$data = mysqli_fetch_array($query, MYSQLI_ASSOC);

	echo json_encode($data); 
?>
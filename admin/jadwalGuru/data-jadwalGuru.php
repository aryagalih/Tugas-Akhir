<?php 
	include("../config.php");

	$id_jadwal = $_GET['id_jadwal'];
	$sql = "SELECT * FROM tb_jadwal WHERE id_jadwal = $id_jadwal";
	$query = $conn->query($sql);
	$data = mysqli_fetch_array($query, MYSQLI_ASSOC);

	echo json_encode($data); 
?>
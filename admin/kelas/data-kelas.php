<?php 
	include("../config.php");

	$id_kelas = $_GET['id_kelas'];
	$sql = "SELECT * FROM tb_kelas WHERE id_kelas = $id_kelas";
	$query = $conn->query($sql);
	$data = mysqli_fetch_array($query, MYSQLI_ASSOC);

	echo json_encode($data); 
?>
<?php 
	include("../config.php");

	$id_matpel = $_GET['id_matpel'];
	$sql = "SELECT * from tb_matpel WHERE id_matpel = $id_matpel";
	$query = $conn->query($sql);
	$data = mysqli_fetch_array($query, MYSQLI_ASSOC);

	echo json_encode($data); 
?>
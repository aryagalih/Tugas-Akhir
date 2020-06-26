<?php 
	include("../config.php");

	$nip = $_GET['nip'];
	$sql = "SELECT * from tb_guru WHERE nip = $nip";
	$query = $conn->query($sql);
	$data = mysqli_fetch_array($query, MYSQLI_ASSOC);

	echo json_encode($data); 
?>
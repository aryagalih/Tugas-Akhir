<?php
	require_once('config.php');
	
	$nis = $_GET['nis'];
	$id_nilai = $_GET['id_nilai'];

	$query = "SELECT id_nilai, nis, nilai_pengetahuan, nilai_keterampilan, nilai_sikap from tb_detail_penilaian where id_nilai = $id_nilai and nis = $nis";

	$data = mysqli_query($conn, $query);
	$result = mysqli_fetch_assoc($data);

	echo json_encode($result);

 ?>
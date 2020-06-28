<?php
	require_once('../config.php');
	$id_jadwal = $_POST['v_jadwal'];
	$nis = $_POST['masuk'];

	for($i = 0; $i<count($nis); $i++){
			try {
			$detail_jadwal = "INSERT INTO `tb_detail_jadwal` (id_jadwal, nis) VALUES ($id_jadwal, $nis[$i])";
			mysqli_query($conn, $detail_jadwal);
		} catch (Exception $e) {
			print_r($e);
		}
	}

	header("location: ../jadwal-kelas.php?system_message=sukses");


?>
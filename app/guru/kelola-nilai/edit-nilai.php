<?php 
	require_once('../config.php');	

	$id_matpel = $_POST['id_matpel'];
	$id_nilai = $_POST['id_nilai'];
	$nis = $_POST['nis'];
	$n_pengetahuan = $_POST['pengetahuan'];
	$n_keterampilan = $_POST['keterampilan'];
	$n_sikap = $_POST['sikap'];

	$sql = "UPDATE tb_detail_penilaian SET nilai_pengetahuan = $n_pengetahuan, nilai_keterampilan = $n_keterampilan, nilai_sikap = $n_sikap WHERE id_nilai = $id_nilai and nis = $nis";
	$conn->query($sql);

	echo $conn->error;
	if($conn->query($sql) == TRUE){
		header('Location: ../edit-nilai-siswa.php?id_matpel='.$id_matpel.'&bab='.$id_nilai.'&system_message=sukses');	
	}else{
		echo $conn->error;
		header('Location: ../edit-nilai-siswa.php?system_message=gagal&reason='.$conn->error);
	}
?>
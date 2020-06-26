<?php
include("../config.php");

if(isset($_POST['simpan'])){

	$id_jadwal = $_POST['id_jadwal'];
	$id_matpel = $_POST['id_matpel'];
	$nip = $_POST['nip'];
	$jam_pelajaran = $_POST['jam_pelajaran'];
	$id_kelas = $_POST['id_kelas'];
	$hari = $_POST['hari'];
	print_r($_POST);

	$sql = "UPDATE tb_jadwal SET id_matpel = '$id_matpel', nip='$nip', jam_pelajaran ='$jam_pelajaran', id_kelas = '$id_kelas', hari= '$hari' WHERE id_jadwal = $id_jadwal ";
	$conn->query($sql);

	echo $conn->error;
	if($conn->query($sql) == TRUE){
		header('Location: ../edit_jadwal_guru.php?system_message=sukses');	
	}else{
		echo $conn->error;
		// header('Location: ../edit_jadwal_guru.php?system_message=gagal&reason='.$conn->error);
	}
}
?>
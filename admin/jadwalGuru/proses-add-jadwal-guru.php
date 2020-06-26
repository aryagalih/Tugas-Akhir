<?php
include("../config.php");

if(isset($_POST['simpan'])){

	print_r($_POST);
	$mt_rand = mt_rand(1000, 9999);
	$id_jadwal = $mt_rand;
	$id_matpel = $_POST['id_matpel'];
	$nip = $_POST['nip'];
	$jam_pelajaran = $_POST['jam_pelajaran'];
	$id_kelas = $_POST['id_kelas'];
	$hari = $_POST['hari'];

	$sql = "INSERT INTO tb_jadwal (id_jadwal, id_matpel, nip, jam_pelajaran, id_kelas, hari) VALUES ($id_jadwal,$id_matpel,$nip,'$jam_pelajaran',$id_kelas,'$hari')";
	if($conn->query($sql) == TRUE){
			header('Location: ../edit_jadwal_guru.php?system_message=sukses&nip='.$nip);	
		}else{
			echo $conn->error;
			// header('Location: ../edit_jadwal_guru.php?system_message=gagal');
		}
}
?>
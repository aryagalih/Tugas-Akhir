<?php
include("../config.php");

$id_kelas = $_POST['id_kelas'];

$sql = "DELETE from tb_jadwal where id_kelas=$id_kelas";
$conn->query($sql);
echo $conn->error;
if($conn->query($sql) == TRUE){
	header('Location: ../lihat_jadwal_kelas.php?system_message=sukses&id_kelas='.$id_kelas);	
}else{
	echo $conn->error;
	// header('Location: ../edit_jadwal_guru.php?system_message=gagal&reason='.$conn->error.);
}
?>
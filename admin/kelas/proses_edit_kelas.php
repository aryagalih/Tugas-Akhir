<?php
include("../config.php");

if(isset($_POST['simpan'])){

	$id_kelas = $_POST['id_kelas'];
	$nama = $_POST['nama'];
	$status = $_POST['status'];

	$sql = "UPDATE tb_kelas SET nama = '$nama', status = '$status' WHERE id_kelas = $id_kelas ";
	$conn->query($sql);

	echo $conn->error;
	if($conn->query($sql) == TRUE){
		header('Location: ../kelas.php?system_message=sukses');	
	}else{
		echo $conn->error;
		// header('Location: ../kelas.php?system_message=gagal&reason='.$conn->error);
	}
}
?>
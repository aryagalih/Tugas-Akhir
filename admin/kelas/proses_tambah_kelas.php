<?php
include("../config.php");

if(isset($_POST['tambah_kelas'])){

	$nama = $_POST['nama'];
	$status = $_POST['status'];

	$sql = "INSERT INTO tb_kelas (nama, status) VALUES ('$nama', '$status')";
	if($conn->query($sql) == TRUE){
			header('Location: ../kelas.php?system_message=sukses');	
		}else{
			echo $conn->error;
			// header('Location: ../kelas.php?system_message=gagal');
		}
}
?>
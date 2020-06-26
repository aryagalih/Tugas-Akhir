<?php
include("../config.php");

	$id_kelas = $_POST['id_kelas'];
	$sql = "DELETE FROM tb_kelas where id_kelas=$id_kelas";
	$conn->query($sql);
	echo $conn->error;
	if($conn->query($sql) == TRUE){
	header('Location: ../kelas.php?system_message=sukses');	
	}else{
		echo $conn->error;
		header('Location: ../kelas.php?system_message=gagal&reason='.$conn->error);
	}	
?>
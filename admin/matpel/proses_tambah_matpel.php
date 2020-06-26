<?php
include("../config.php");
	
if(isset($_POST['tambah_matpel'])){
		print_r($_POST);
		$mt_rand = mt_rand(1000, 9999);
		$id_matpel = $mt_rand;
	    $nama_matpel = $_POST['nama_matpel'];

		$sql = "INSERT INTO tb_matpel (id_matpel , nama_matpel) VALUES ('$id_matpel' , '$nama_matpel')";
		$conn->query($sql);
		if($conn->query($sql) == TRUE){
			header('Location: ../matpel.php?status=sukses');	
		}else{
			// echo $conn->error;
			header('Location: ../matpel.php?status=gagal');
		}
	}
?>
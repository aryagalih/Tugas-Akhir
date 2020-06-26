<?php
	include("../config.php");

	if(isset($_POST['simpan'])){
		$id_matpel = $_POST['id_matpel'];
		$nama_matpel = $_POST['nama_matpel'];

		$sql = "UPDATE tb_matpel SET nama_matpel='$nama_matpel' WHERE id_matpel=$id_matpel ";
		$conn->query($sql);
		echo $conn->error;
		if($conn->query($sql) == TRUE){
			header('Location: ../matpel.php?system_message=sukses');	
		}else{
			echo $conn->error;
			// header('Location: ../matpel.php?system_message=gagal&reason='.$conn->error);
		}
	}
?>
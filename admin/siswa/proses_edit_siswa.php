<?php
include("../config.php");

if(isset($_POST['simpan'])){
	//upload foto
	$target_dir = $_SERVER['DOCUMENT_ROOT']. "/template-file/assets/images/fotosiswa/";
	$target_file = $target_dir . basename($_FILES["foto"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// $check = getimagesize($_FILES["foto"]["tmp_name"]);
	
	if($_FILES["foto"]["size"] > 2000000){
		header('Location: ../siswa.php?system_message=gagal&reason=gambar melebihi 2MB');
	}else{
	    $nis = $_POST['nis'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$kelas = $_POST['kelas'];
		$jk = $_POST['jk'];
		$foto = basename($_FILES["foto"]["name"]);

		if(isset($_POST['foto'])){
			//upload
			move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
			$sql = $sql = "UPDATE tb_siswa SET nama='$nama', alamat='$alamat', kelas='$kelas', jk='$jk', foto='$foto' WHERE nis=$nis ";
		}else{
			$sql = "UPDATE tb_siswa SET nama='$nama', alamat='$alamat', kelas='$kelas', jk='$jk' WHERE nis=$nis ";
		}
		$conn->query($sql);
		echo $conn->error;
		if($conn->query($sql) == TRUE){
			header('Location: ../siswa.php?system_message=sukses');	
		}else{
			// echo $conn->error;
			header('Location: ../siswa.php?system_message=gagal&reason='.$conn->error);
		}
	}
}
?>
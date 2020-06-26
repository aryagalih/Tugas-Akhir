<?php
include("../config.php");
if(isset($_POST['simpan'])){
	//upload foto
	$target_dir = $_SERVER['DOCUMENT_ROOT']. "/template-file/assets/images/fotosiswa/";
	$target_file = $target_dir . basename($_FILES["foto"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	//$check = getimagesize($_FILES["foto"]["tmp_name"]);

	if($_FILES["foto"]["size"] > 200000){
		header('Location: ../guru.php?system_message=gagal&reason=gambar melebihi 2MB');
	}else{
	    $nip = $_POST['nip'];
		$nama = $_POST['nama'];
		$jk = $_POST['jk'];
		$alamat = $_POST['alamat'];
		$no_telpon = $_POST['no_telpon'];
		$foto = basename($_FILES["foto"]["name"]);

		if(isset($_POST['foto'])){
			//upload
			move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
			$sql = $sql = "UPDATE tb_guru SET nama='$nama', jk='$jk', alamat='$alamat', no_telpon='$no_telpon', foto='$foto' WHERE nip='$nip' ";
		}else{
			$sql = "UPDATE tb_guru SET nama='$nama', jk='$jk', alamat='$alamat', no_telpon='$no_telpon' WHERE nip='$nip' ";
		}
		$conn->query($sql);
		echo $conn->error;
		if($conn->query($sql) == TRUE){
			header('Location: ../guru.php?system_message=sukses');	
		}else{
			// echo $conn->error;
			header('Location: ../guru.php?system_message=gagal&reason='.$conn->error);
		}
	}
}
?>
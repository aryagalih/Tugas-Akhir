<?php
include("../config.php");
	
	// if($conn->query($sql) == TRUE){
	// 	echo "eb";
	// }else{
	// 	$conn->error;
	// }
	
if(isset($_POST['tambah_guru'])){
	//upload foto
	$target_dir = $_SERVER['DOCUMENT_ROOT']. "/template-file/assets/images/fotoguru/";
	$target_file = $target_dir . basename($_FILES["foto"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	//$check = getimagesize($_FILES["foto"]["tmp_name"]);

	if($_FILES["foto"]["size"] > 2000000){
		header('Location: ../guru.php?system_message=gagal&reason=gambar melebihi 2MB');
	}else{
	    $nip = $_POST['nip'];
		$nama = $_POST['nama'];
		$jk = $_POST['jk'];
		$alamat = $_POST['alamat'];
		$no_telpon = $_POST['no_telpon'];
		$foto = basename($_FILES["foto"]["name"]);


		//upload
		move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

		$sql = "INSERT INTO tb_guru (nip, nama, jk, alamat, no_telpon, foto) VALUES ('$nip', '$nama' , ' $jk', '$alamat', '$no_telpon', '$foto')";
		if($conn->query($sql) == TRUE){
			header('Location: ../guru.php?system_message=sukses');	
		}else{
			//echo $conn->error;
			header('Location: ../guru.php?system_message=gagal&reason='.$conn->error);
		}
	}
}
?>
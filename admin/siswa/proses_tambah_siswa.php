<?php
include("../config.php");
	
	// if($conn->query($sql) == TRUE){
	// 	echo "eb";
	// }else{
	// 	$conn->error;
	// }
	
if(isset($_POST['tambah_siswa'])){
	//upload foto
	$target_dir = $_SERVER['DOCUMENT_ROOT']. "/template-file/assets/images/fotosiswa/";
	$target_file = $target_dir . basename($_FILES["foto"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	//$check = getimagesize($_FILES["foto"]["time_sleep_until(timestamp)ame"]);

	if($_FILES["foto"]["size"] > 20000000){
		header('Location: ../siswa.php?system_message=gagal&reason=gambar melebihi 2MB');
	}else{
	    $nis = $_POST['nis'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$kelas = $_POST['kelas'];
		$jk = $_POST['jk'];
		$foto = basename($_FILES["foto"]["name"]);
		//upload
		move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

		$sql = "INSERT INTO tb_siswa (nis, nama, alamat, kelas, jk,foto) VALUES ('$nis','$nama','$alamat','$kelas','$jk','$foto')";
		if($conn->query($sql) == TRUE){
			header('Location: ../siswa.php?system_message=sukses');	
		}else{
			echo $conn->error;
			// header('Location: ../siswa.php?system_message=gagal');
		}
	}
}
?>
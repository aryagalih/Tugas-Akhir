<?php
include("../config.php");

$id = $_POST['id'];
$id_kelas = $_POST['id_kelas'];
$sql = "DELETE from tb_detail_jadwal where id=$id";
$conn->query($sql);
echo $conn->error;
if($conn->query($sql) == TRUE){
	header('Location: ../edit_jadwal_guru.php?system_message=sukses&nip='.$id);	
}else{
	echo $conn->error;
	// header('Location: ../edit_jadwal_guru.php?system_message=gagal&reason='.$conn->error);
}
?>
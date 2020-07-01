<?php
include("../config.php");

$id_jadwal = $_POST['id_jadwal'];
$nip = $_POST['nip'];
$sql = "DELETE from tb_jadwal where id_jadwal=$id_jadwal";
$conn->query($sql);
echo $conn->error;
if($conn->query($sql) == TRUE){
	header('Location: ../edit_jadwal_guru.php?system_message=sukses&nip='.$nip);	
}else{
	echo $conn->error;
	// header('Location: ../edit_jadwal_guru.php?system_message=gagal&reason='.$conn->error.);
}
?>
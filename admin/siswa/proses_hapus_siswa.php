<?php
include("../config.php");

$nis = $_POST['nis'];
$sql = "DELETE from tb_siswa where nis=$nis";
$conn->query($sql);
echo $conn->error;
if($conn->query($sql) == TRUE){
	header('Location: ../siswa.php?system_message=sukses');	
}else{
	echo $conn->error;
	// header('Location: ../siswa.php?system_message=gagal&reason='.$conn->error);
}	
?>
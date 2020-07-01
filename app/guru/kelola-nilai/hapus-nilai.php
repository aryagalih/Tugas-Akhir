<?php
include("../config.php");
$nis = $_POST['nis'];

$sql = "DELETE from tb_detail_penilaian where nis='$nis'";
$conn->query($sql);
echo $conn->error;
if($conn->query($sql) == TRUE){
	header('Location: ../edit-nilai-siswa.php?id_matpel='.$id_matpel.'&bab='.$id_nilai.'&system_message=sukses');
}else{
	header('Location: ../edit-nilai-siswa.php?system_message=gagal&reason='.$conn->error);
}	
?>
<?php
include("../config.php");
$nis = $_POST['del_id'];
$id_matpel = $_POST['id_matpel'];
$id_nilai = $_POST['id_nilai'];

$sql = "DELETE from tb_detail_penilaian where nis='$nis' and id_nilai=$id_nilai";
$conn->query($sql);
echo $conn->error;
if($conn->query($sql) == TRUE){
	header('Location: ../edit-nilai-siswa.php?id_matpel='.$id_matpel.'&bab='.$id_nilai.'&system_message=sukses');
}else{
	header('Location: ../edit-nilai-siswa.php?system_message=gagal&reason='.$conn->error);
}	
?>
<?php
include("../config.php");

$id = $_POST['id'];
$sql = "DELETE from tb_detail_penilaian where id='$id'";
$conn->query($sql);
echo $conn->error;
if($conn->query($sql) == TRUE){
	header('Location: ../edit-nilai-siswa.php?system_message=sukses');	
}else{
	header('Location: ../siswa.php?system_message=gagal&reason='.$conn->error);
}	
?>
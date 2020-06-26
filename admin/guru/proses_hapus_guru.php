<?php
include("../config.php");

$nip = $_POST['nip'];
$sql = "DELETE from tb_guru where nip=$nip";
$conn->query($sql);
echo $conn->error;
if($conn->query($sql) == TRUE){
	header('Location: ../guru.php?system_message=sukses');	
}else{
	//echo $conn->error;
	header('Location: ../guru.php?system_message=gagal&reason='.$conn->error);
}
?>
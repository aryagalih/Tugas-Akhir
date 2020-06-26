<?php
include("../config.php");

$id_matpel = $_POST['id_matpel'];
$sql = "DELETE from tb_matpel where id_matpel=$id_matpel";
// $conn->query($sql);
echo $conn->error;
if($conn->query($sql) == TRUE){
	header('Location: ../matpel.php?system_message=sukses');	
}else{
	// echo $conn->error;
	header('Location: ../matpel.php?system_message=gagal&reason='.$conn->error);
}
?>
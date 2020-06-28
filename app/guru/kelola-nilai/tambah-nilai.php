<?php 

require_once('../config.php');

$id_matpel = $_POST['id_matpel'];
$bab = $_POST['bab_kompetensi'];
$id_kelas = $_POST['idkelas'];
$id_nilai = mt_rand(1000, 9999);

$nis = $_POST['nis'];
$n_pengetahuan = $_POST['n_pengetahuan'];
$n_keterampilan = $_POST['n_keterampilan'];
$n_sikap = $_POST['n_sikap'];
if(isset($id_matpel)){
	$nilai = array(
		'id_nilai' => $id_nilai,
		'id_kelas' => $id_kelas,
		'id_matpel' => $id_matpel,
		'bab_kompetensi' => $bab
	);

	$nilai_columns = implode(", ",array_keys($nilai));
	$nilai_escaped_values = array_map('mysql_real_escape_string', array_values($nilai));
	$nilai_values  = implode("', '", $nilai_escaped_values);
	$nilai_sql = "INSERT INTO `tb_penilaian` ($nilai_columns) VALUES ('$nilai_values')";
	
	mysqli_query($conn, $nilai_sql);
	
	for($i = 0; $i<count($nis); $i++){
			try {
			$detail_sql = "INSERT INTO `tb_detail_penilaian` (id_nilai, nis, nilai_pengetahuan, nilai_keterampilan, nilai_sikap) VALUES ($id_nilai, $nis[$i], $n_pengetahuan[$i], $n_keterampilan[$i], $n_sikap[$i])";
			mysqli_query($conn, $detail_sql);
		} catch (Exception $e) {
			print_r($e);
		}
	}

	header("location: ../../guru/nilai.php?system_message=sukses");
}
?>
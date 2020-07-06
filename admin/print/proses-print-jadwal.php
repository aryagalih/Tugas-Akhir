<?php

require_once '../../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

include('../config.php');
$kelas = $_GET['id_kelas'];
$sql = "SELECT tb_jadwal.*, tb_guru.nama , tb_matpel.nama_matpel FROM `tb_jadwal` JOIN tb_guru ON tb_jadwal.nip = tb_guru.nip JOIN tb_matpel ON tb_matpel.id_matpel = tb_jadwal.id_matpel where tb_jadwal.id_kelas='".$kelas."' and hari='1' order by jam_pelajaran ASC";
 $query= mysqli_query($conn, $sql); 
 while($jadwal = mysqli_fetch_array($query)){

}
$html = '
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Print Jadwal</title>
	</head>
	<body>
		<h1 align="center">Jadwal Kelas</h1>
		<br>
		<table align = "center" border="1" cellpadding="10">
			<thead align="center" style="font-size: 17px;">
				<tr>
					<td colspan="3" align="center">Hari Senin</td>
				</tr>
				<tr>
					<td>Jam Pelajaran</td>
					<td>Mata Pelajaran</td>
					<td>Guru Pengajar</td>
				</tr>
			</thead>';

$html .= '</table>
	</body>
</html>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();

?>
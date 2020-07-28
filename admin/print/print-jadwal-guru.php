<?php

require_once '../../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

include('../config.php');
$harine = ["Senin", "Selasa", "Rabu", "Kamis", "Jum'at"];

$guru = $_GET['nip'];
$sql = "SELECT tb_jadwal.*, tb_guru.nama , tb_matpel.nama_matpel, tb_kelas.nama FROM `tb_jadwal` JOIN tb_guru ON tb_jadwal.nip = tb_guru.nip JOIN tb_matpel ON tb_matpel.id_matpel = tb_jadwal.id_matpel JOIN tb_kelas ON tb_kelas.id_kelas = tb_jadwal.id_kelas where tb_jadwal.nip=".$guru." order by jam_pelajaran ASC";
$query= mysqli_query($conn, $sql);
$query2= mysqli_query($conn, $sql);

$mapel = array();

while($jadwal = mysqli_fetch_array($query2)){
	$data = array(
		'jam' => $jadwal['jam_pelajaran'],
		'mapel' => $jadwal['nama_matpel'],
		'kelas' => $jadwal['nama'],
		'hari' => $jadwal['hari']
	);
	array_push($mapel, $data);
}


$html = '
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Print Jadwal Guru</title>
	</head>
	<body>
		<h1 align="center">Jadwal Jhonson</h1>
		<br>
		
			';



for ($i=0; $i < count($harine); $i++) { 
	$html .= '
			<table align = "center" class="table" border="1" cellpadding="10">
				<thead align="center" style="font-size: 17px;">
					<tr>
						<th colspan="3" align="center">Hari '.$harine[$i].'</th>
					</tr>
					<tr>
						<th>Jam Pelajaran</th>
						<th>Mata Pelajaran</th>
						<th>Kelas</th>
					</tr>
				</thead>
				<tbody>';

	for ($j=0; $j < count($mapel); $j++) { 
		
		if ($mapel[$j]['hari'] == ($i+1)) {
			
			$html .='
					<tr>
						<td>'.$mapel[$j]['jam'].'</td>
						<td>'.$mapel[$j]['mapel'].'</td>
						<td>'.$mapel[$j]['kelas'].'</td>
					</tr>
			';	
		}
	}

	$html .= '</tbody>
				</table>
				<br>';
}
			
$html .= '
	</body>
</html>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();

?>

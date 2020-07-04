<?php 
	require_once('config.php');
 ?>
<div class="table-responsive">
	<form action="edit-jadwal-kelas.php" method="POST">
		<table class="table" >
			<thead align="center">
	    		<tr>
		     		<th style="width: 75px;">No</th>
					<th>Mata Pelajaran</th>
					<th>BAB Kompetensi</th>
					<th style="width: 105px; font-size: 11px;"> Nilai <br> Pengetahuan</th>
             	    <th style="width: 105px; font-size: 11px;"> Nilai <br> Keterampilan</th>
                	<th style="width: 105px; font-size: 11px;"> Nilai <br> Sikap</th>
	    		</tr>
	  		</thead>
			<tbody>
				<?php
					include 'config.php';
		            $v_nilai="";
		            if (isset($_POST['nilai'])) {
		                $v_nilai = $_POST['nilai'];
		            
		            $search_nilai = $v_nilai;
		            $n = 1;
					$sql = "SELECT tb_penilaian.*, tb_matpel.nama_matpel, tb_detail_penilaian.nilai_pengetahuan, tb_detail_penilaian.nilai_keterampilan, tb_detail_penilaian.nilai_sikap FROM tb_detail_penilaian JOIN tb_penilaian on tb_detail_penilaian.id_nilai = tb_penilaian.id_nilai join tb_matpel on tb_penilaian.id_matpel  = tb_matpel.id_matpel where =".$search_nilai;
					$query= mysqli_query($conn, $sql);
					if($query){
						while($nilai = mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $n++; ?></td>
							<td><?php echo $nilai['nama_matpel']; ?></td>
							<td><?php echo $nilai['bab_kompetensi']; ?></td>
							<td><?php echo $nilai['nilai_pengetahuan']; ?></td>
							<td><?php echo $nilai['nilai_keterampilan']; ?></td>	
							<td><?php echo $nilai['nilai_sikap']; ?></td>	
						</tr>
						<?php
						}
					}
				?>
			</tbody>
		</table>
	</form>
</div>
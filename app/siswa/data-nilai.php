<?php 
	require_once('config.php');
 ?>
<div class="table-responsive">
	<form action="edit-jadwal-kelas.php" method="POST">
		<table class="table">
			<thead align="center">
	    		<tr>
		     		<th style="width: 75px;">No</th>
					<th scope="col">BAB Kompetensi</th>
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
		            }
		            $search_nilai = $v_nilai;
		            $n = 1;
					$sql = "SELECT a.*, b.nama_matpel as nama_jadwal, FROM tb_detail_penilaian a JOIN tb_matpel b on a.id_nilai = b.id_matpel where a.kelas =".$search_kelas;
					$query= mysqli_query($conn, $sql);
					if($query){
						while($siswa = mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $n++; ?></td>
							<td><?php echo $siswa['nis']; ?></td>
							<td><?php echo $siswa['nama']; ?></td>
							<td><?php echo $siswa['nama_kelas']; ?></td>
							<td><input type="checkbox" class="form-control" name="masuk[]" value="<?= $siswa['nis']; ?>"></td>	
						</tr>
						<?php
						}
					}
				?>
			</tbody>
		</table>
		<button class="btn btn-primary" name="lanjutkan" id><i class="zmdi zmdi-check"></i> Tambah</button>
	</form>
</div>
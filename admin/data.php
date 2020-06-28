<?php 
	require_once('config.php');
 ?>
<div class="table-responsive">
	<form action="edit-jadwal-kelas.php" method="POST">
		<table class="table">
			<thead align="center">
	    		<tr>
		     		<th style="width: 5px;">No</th>
		      		<th>NIS</th>
		      		<th>Nama</th>
		      		<th>Kelas</th>
		      		<th style="width: 15px;">Opsi</th>
	    		</tr>
	  		</thead>
			<tbody>
				<?php
					include 'config.php';
		            $v_kelas="";
		            if (isset($_POST['kelas'])) {
		                $v_kelas = $_POST['kelas'];
		            }
		            $search_kelas = $v_kelas;
		            $n = 1;
					$sql = "SELECT a.*, b.nama as nama_kelas,  b.status FROM tb_siswa a JOIN tb_kelas b on a.kelas = b.id_kelas where a.kelas =".$search_kelas;
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
<?php 
  require_once('partials/header.php');
  require_once('config.php');
 ?>

 <div class="clearfix"></div>
    <div class="content-wrapper">
        <div class="container-fluid"><br>
        	<h2><i class="zmdi zmdi-book"></i> Form Jadwal Kelas</h2>
            <div class="dropdown-divider"></div>
            <div class="row">
				<div class="col" style="margin-top: 22px;">
                    <div class="card">
                        <div class="card-body">
                            <h3 align="center">Pilih Siswa</h3>
                            <small>Pilih Siswal Untuk Bergabung Ke Jadwal Kelas<?= $_GET['id_kelas'] ?></small>
                            <div class="dropdown-divider"></div><br>
                            <form action="jadwalKelas/proses-gabung-kelas.php" method="post">
	                           <div class="table-responsive">
				               		<table class="table">
				                  		<thead align="center">
				                    		<tr>
	                                            <th style=" width: 50px;"> No </th>
				                      			<th>Nama</th>
				                      			<th style="width: 70px;">NIS</th>
				                      			<th style="width: 70px;">Kelas</th>
				                      			<th style="width: 50px;">Pilih</th>
				                    		</tr>
				                  		</thead>
				                  		<tbody>
				                  			<?php 
				                  				$sql = "SELECT a.*, b.nama as nama_kelas, b.status from tb_siswa a JOIN tb_kelas b on a.kelas = b.id_kelas";
				                  				$query= mysqli_query($conn, $sql);	
				                  				$n = 1;
				                  				while ($siswa = mysqli_fetch_array($query)) {
				                  				?>
					                  			<tr>
						                  			<td><?php echo $n++; ?></td>
						                  			<td><?php echo $siswa['nama']; ?></td>
						                  			<td><?php echo $siswa['nis']; ?></td>
						                  			<td><?php echo $siswa['nama_kelas'];?></td>
						                  			<td><input type="checkbox" class="form-control" name="masuk[]" value="pilih"></td>
					                  			</tr>
    			                  				<?php
    			                  				}
    			                  			 ?>
				                  		</tbody>
				               		</table>
				               		<button class="btn btn-primary"><i class='zmdi zmdi-collection-plus'>Simpan</i></button>
				              	</div>
				            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal edit matpel-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="e_id_matpel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form action="matpel/proses_edit_matpel.php" method="POST">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nip" class="col-lg-2 col-form-label form-control-label">ID Mata Pelajaran</label>
                        <div class="col-lg-10">
                            <input name="id_matpel" id="v_id_matpel" class="form-control" type="text" readonly="">
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nip" class="col-lg-2 col-form-label form-control-label">Nama</label>
                        <div class="col-lg-10">
                            <input name="nama_matpel" id="v_nama_matpel" class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </div>
            </form>
          </div>
        </div> 
      </div>

      <div class="modal fade" id="hapusModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">HAPUS MATA PELAJARAN</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">YAKIN MENGHAPUS MATA PELAJARAN ?</div>
                    <br><br>
                    <div class="pull-right">
                        <form action="matpel/proses_hapus_matpel.php" method="POST">
                            <input type="hidden" name="id_matpel" id="del_id_matpel" value="">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn btn-warning text-white">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <?php 
 	require_once('partials/footer.php');
?>
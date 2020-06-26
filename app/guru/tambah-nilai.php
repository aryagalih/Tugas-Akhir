<?php 
	require_once('partials/header.php');
	require_once('config.php');
 ?>
 <?php 	
	$query_kelas = mysqli_query($conn, "SELECT * FROM tb_kelas");
	$query_matpel = mysqli_query($conn, "SELECT * FROM tb_matpel");

	$idkel = $_GET['id_kelas'];
	$cek_penilaian = mysqli_query($conn, "SELECT id_matpel FROM tb_penilaian where id_kelas = $idkel");

	$datamapels = array();
	$datakelass = array();
	$matpel_sudah = array();
	while ($datamapel = mysqli_fetch_assoc($query_matpel)) {
		array_push($datamapels, $datamapel);
	}
	while ($datakelas = mysqli_fetch_assoc($query_kelas)) {
		array_push($datakelass, $datakelas);
	}
	while ($matpelh = mysqli_fetch_assoc($cek_penilaian)) {
		array_push($matpel_sudah, $matpelh['id_matpel']);
	}


?>
 <section>
 	<div class="clearfix"></div>
	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="card" style="margin-top: 22px;">
				<div class="card-body">
					<div class="row">
        				<div class="col">
          					<h2><i class="zmdi zmdi-home"></i> Tambah Nilai</h2>
        				</div>
      				</div>
      				<div class="dropdown-divider"></div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<h5 align="center">Input Nilai Kelas : <?= $_GET['id_kelas']; ?></h5><br>
					<form action="kelola-nilai/tambah-nilai.php" method="POST">
	                    <div class="form-group row">
	                        <label for="kelas" class="col-md-2 col-form-label form-control-label"> Pilih Mata Pelajaran : </label>
	                        <div class="col">
	                            <select name="id_matpel" required class="form-control">
	                                <option value="" disabled="" selected="">Pilih Mata Pelajaran</option>
	                                <?php foreach ($datamapels as $key): ?>
	                                	<option value="<?=$key['id_matpel']?>"><?=$key['nama_matpel']?></option>
			                        <?php endforeach ?>
	                            </select>
	                        </div>
	                    </div>
	                    <div class="form-group row">
                        	<label class="col-lg-2 col-form-label">Bab Kompetensi :</label>
                            <div class="col-lg-10">
                                <input name="bab_kompetensi" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="table-responsive" id="table">
	                        <table class="table">
								<thead align="center">
						    		<tr>
							     		<th style="width: 5px;">No</th>
							      		<th>Kelas</th>
							      		<th>Nama</th>
							      		<th style="width: 105px; font-size: 11px;"> Nilai <br> Pengetahuan</th>
							      		<th style="width: 105px; font-size: 11px;"> Nilai <br> Keterampilan</th>
							      		<th style="width: 105px; font-size: 11px;"> Nilai <br> Sikap</th>
						    		</tr>
						  		</thead>
								<tbody>
									<?php
										include 'config.php';
							            $n = 1;
							            $id_kelas = $_GET['id_kelas'];
										$sql = "SELECT a.*, b.nama as nama_kelas,  b.status FROM tb_siswa a JOIN tb_kelas b on a.kelas = b.id_kelas where a.kelas ='$id_kelas'";
										$query= mysqli_query($conn, $sql);
										if($query){
											while($siswa = mysqli_fetch_array($query)){
											?>
											<tr>
												<td align="center">
													<input type="hidden" name="nis[]" value="<?= $siswa['nis'] ?>">
													<?php echo $n++; ?>
												</td>
												<td align="center"><?php echo $siswa['nama_kelas']; ?></td>
												<td><?php echo $siswa['nama']; ?></td>
												<td><input name="n_pengetahuan[]" type="text" class="form-control text-center" placeholder="0"></td>	
												<td><input name="n_keterampilan[]" class="form-control text-center" placeholder="0"></td>	
												<td><input name="n_sikap[]" class="form-control text-center" placeholder="0"></td>	
											</tr>
											<?php
											}
										}
									?>
								</tbody>
							</table>
							<div style="float: right;">
								<input type="hidden" name="idkelas" value="<?= $_GET['id_kelas'] ?>">
								<button type="reset" class="btn btn-dark">Reset</button>
								<button type="submit" class="btn btn-primary">Tambah</button>
							</div>
						</div>
	                </form>
				</div>
			</div>
		</div>
	</div>
 </section>
 <?php 
	require_once('partials/footer.php');
 ?>
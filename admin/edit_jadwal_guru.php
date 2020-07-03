<?php 
  require_once('partials/header.php');
  require_once('config.php');
?>


<?php 	
	$query_kelas = mysqli_query($conn, "SELECT * FROM tb_kelas");
	$query_matpel = mysqli_query($conn, "SELECT * FROM tb_matpel");

	$datamapels = array();
	$datakelass = array();
	while ($datamapel = mysqli_fetch_assoc($query_matpel)) {
		array_push($datamapels, $datamapel);
	}
	while ($datakelas = mysqli_fetch_assoc($query_kelas)) {
		array_push($datakelass, $datakelas);
	}
$jampel = array(
	"07:00 - 07:40",
	"07:40 - 08:20",
	"08:20 - 09:00",
	"09:20 - 10:00",
	"10:00 - 10:40",
	"10:40 - 11:20",
	"12:20 - 13:00",
	"13:00 - 13:40",
	"13:40 - 14:20",
	"14:20 - 15:00",
);

?>

 <div class="clearfix"  id="editjadwal"></div>
    <div class="content-wrapper">
        <div class="container-fluid"><br>
        	<div class="card">
                <div class="card-body">
                    <h2><i class="icon-note"></i> Edit Jadwal guru</h2>
                    <div class="dropdown-divider"></div>
                    <?php 
		    			switch ((isset($_GET['system_message']) ? $_GET['system_message'] : '')) {
		    				case 'sukses':
			    				echo "<div class='alert alert-primary' role='alert'>
			    					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			    					<strong>Berhasil !</strong> Jadwal Guru Berhasil Diperbarui !!
			    				</div>";
		    					break;
		    				case 'gagal':
			    				echo "<div class='alert alert-danger' role='alert'>
					    				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			    					<strong>Gagal !</strong>
			    				</div>";
		    					break;
		    				default :
		    					echo "<div></div>";
		    				break;
		    			}
		        	?>
                </div>
            </div> 
            <div class="row">
				<div class="col">
                    <div class="card">
                        <div class="card-body">
                        	<h3>Kelola Jadwal Guru dengan nip: <?= $_GET['nip'];?></h3>
                            <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                            	
                                <li class="nav-item">
                                    <a href="javascript:void();" data-target="#senin" data-toggle="pill" class="nav-link active"><i class='icon-note'></i> <span class="hidden-xs">Senin</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void();" data-target="#selasa" data-toggle="pill" class="nav-link"><i class='icon-note'></i> <span class="hidden-xs">Selasa</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void();" data-target="#rabu" data-toggle="pill" class="nav-link"><i class='icon-note'></i> <span class="hidden-xs">Rabu</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void();" data-target="#kamis" data-toggle="pill" class="nav-link"><i class='icon-note'></i> <span class="hidden-xs">Kamis</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void();" data-target="#jumat" data-toggle="pill" class="nav-link"><i class='icon-note'></i> <span class="hidden-xs">Jum'at</span></a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="senin">
                                    <div class="card-body">
										<div class="table-responsive">
											<table class="table">
						                  		<thead align="center">
							                    	<tr>
							                     		<th>Jam Pelajaran</th>
							                      		<th>Pelajaran</th>
							                      		<th>Kelas</th>
							                      		<th style="width: 15px;">Action</th>
							                    	</tr>
							                  	</thead>
						                  		<tbody>
													<?php
														$guru = $_GET['nip']; 
														$sql = "SELECT tb_jadwal.*, tb_guru.nama , tb_matpel.nama_matpel, tb_kelas.nama FROM `tb_jadwal` JOIN tb_guru ON tb_jadwal.nip = tb_guru.nip JOIN tb_matpel ON tb_matpel.id_matpel = tb_jadwal.id_matpel JOIN tb_kelas ON tb_kelas.id_kelas = tb_jadwal.id_kelas where tb_jadwal.nip='".$guru."' and hari='1' 
														order by jam_pelajaran ASC";
														$query1= mysqli_query($conn, $sql);
														while($jadwalGuru = mysqli_fetch_array($query1)){
															echo "<tr>";
																echo "<td>".$jadwalGuru['jam_pelajaran']."</td>";
																echo "<td>".$jadwalGuru['nama_matpel']."</td>";
																echo "<td>".$jadwalGuru['nama']."</td>";
																echo "<td>
																		<a href='#' class='btn btn-primary' title='".$jadwalGuru['id_jadwal']."' onclick='editJadwal(this)'><i class='icon-note'></i></a>
																		<a href='#' class='btn btn-warning text-white' title='".$jadwalGuru['id_jadwal']."' onclick='hapusJadwal(this)'><i class='icon-trash'></i></a>
																	 </td>";
														 	echo "</tr>";
														}
													 ?>
						                  		</tbody>
						                  	</table>
						                  	<?php 
						                  		echo "<td>
														<a href='#' class='btn btn-primary text-white' title='".$jadwalGuru['id_jadwal']."' onclick='tambah(this)'><i class='zmdi zmdi-collection-plus'> Tambah Jadwal</i></a>
													</td>";	
						                  	 ?>
						                </div>
                                  	</div>
                                </div>
                                <div class="tab-pane" id="selasa">
                                    <div class="card-body">
										<div class="table-responsive">
											<table class="table">
						                  		<thead align="center">
							                    	<tr>
							                     		<th>Jam Pelajaran</th>
							                      		<th>Pelajaran</th>
							                      		<th>Kelas</th>
							                      		<th style="width: 15px;">Action</th>
							                    	</tr>
							                  	</thead>
						                  		<tbody>
													<?php 
														$guru = $_GET['nip'];
														$sql = "SELECT tb_jadwal.*, tb_guru.nama , tb_matpel.nama_matpel, tb_kelas.nama FROM `tb_jadwal` JOIN tb_guru ON tb_jadwal.nip = tb_guru.nip JOIN tb_matpel ON tb_matpel.id_matpel = tb_jadwal.id_matpel JOIN tb_kelas ON tb_kelas.id_kelas = tb_jadwal.id_kelas where tb_jadwal.nip='".$guru."' and hari='2' 
														order by jam_pelajaran ASC";
														$query= mysqli_query($conn, $sql);
														while($jadwalGuru = mysqli_fetch_array($query)){
															echo "<tr>";
																echo "<td>".$jadwalGuru['jam_pelajaran']."</td>";
																echo "<td>".$jadwalGuru['nama_matpel']."</td>";
																echo "<td>".$jadwalGuru['nama']."</td>";
																echo "<td>
																		<a href='#' class='btn btn-primary' title='".$jadwalGuru['id_jadwal']."' onclick='editJadwal(this)'><i class='icon-note'></i></a>
																		<a href='#' class='btn btn-warning text-white' title='".$jadwalGuru['id_jadwal']."' onclick='hapusJadwal(this)'><i class='icon-trash'></i></a>
																	 </td>";
														 	echo "</tr>";
														}
													 ?>
						                  		</tbody>
						                  	</table>
						                  	<?php 
						                  		echo "<td>
														<a href='#' class='btn btn-primary text-white' title='".$jadwalGuru['id_jadwal']."' onclick='tambahSelasa(this)'><i class='zmdi zmdi-collection-plus'> Tambah Jadwal</i></a>
													</td>";
						                  	 ?>
						                </div>
                                  	</div>
                                </div>
                                <div class="tab-pane" id="rabu">
                                    <div class="card-body">
										<div class="table-responsive">
											<table class="table">
						                  		<thead align="center">
							                    	<tr>
							                     		<th>Jam Pelajaran</th>
							                      		<th>Pelajaran</th>
							                      		<th>Kelas</th>
							                      		<th style="width: 15px;">Action</th>
							                    	</tr>
							                  	</thead>
						                  		<tbody>
													<?php 
														$guru = $_GET['nip'];
														$sql = "SELECT tb_jadwal.*, tb_guru.nama , tb_matpel.nama_matpel, tb_kelas.nama FROM `tb_jadwal` JOIN tb_guru ON tb_jadwal.nip = tb_guru.nip JOIN tb_matpel ON tb_matpel.id_matpel = tb_jadwal.id_matpel JOIN tb_kelas ON tb_kelas.id_kelas = tb_jadwal.id_kelas where tb_jadwal.nip='".$guru."' and hari='3' 
														order by jam_pelajaran ASC";
														$query= mysqli_query($conn, $sql);
														while($jadwalGuru = mysqli_fetch_array($query)){
															echo "<tr>";
																echo "<td>".$jadwalGuru['jam_pelajaran']."</td>";
																echo "<td>".$jadwalGuru['nama_matpel']."</td>";
																echo "<td>".$jadwalGuru['nama']."</td>";
																echo "<td>
																		<a href='#' class='btn btn-primary' title='".$jadwalGuru['id_jadwal']."' onclick='editJadwal(this)'><i class='icon-note'></i></a>
																		<a href='#' class='btn btn-warning text-white' title='".$jadwalGuru['id_jadwal']."' onclick='hapusJadwal(this)'><i class='icon-trash'></i></a>
																	 </td>";
														 	echo "</tr>";
														}
													 ?>
						                  		</tbody>
						                  	</table>
						                  	<?php 
						                  		echo "<td>
														<a href='#' class='btn btn-primary text-white' title='".$jadwalGuru['id_jadwal']."' onclick='tambahRabu(this)'><i class='zmdi zmdi-collection-plus'> Tambah Jadwal</i></a>
													</td>";
						                  	 ?>
						                </div>
                                  	</div>
                                </div>
                                <div class="tab-pane" id="kamis">
                                    <div class="card-body">
										<div class="table-responsive">
											<table class="table">
						                  		<thead align="center">
							                    	<tr>
							                     		<th>Jam Pelajaran</th>
							                      		<th>Pelajaran</th>
							                      		<th>Kelas</th>
							                      		<th style="width: 15px;">Action</th>
							                    	</tr>
							                  	</thead>
						                  		<tbody>
													<?php 
														$guru = $_GET['nip'];
														$sql = "SELECT tb_jadwal.*, tb_guru.nama , tb_matpel.nama_matpel, tb_kelas.nama FROM `tb_jadwal` JOIN tb_guru ON tb_jadwal.nip = tb_guru.nip JOIN tb_matpel ON tb_matpel.id_matpel = tb_jadwal.id_matpel JOIN tb_kelas ON tb_kelas.id_kelas = tb_jadwal.id_kelas where tb_jadwal.nip='".$guru."' and hari='4' 
														order by jam_pelajaran ASC";
														$query= mysqli_query($conn, $sql);
														while($jadwalGuru = mysqli_fetch_array($query)){
															echo "<tr>";
																echo "<td>".$jadwalGuru['jam_pelajaran']."</td>";
																echo "<td>".$jadwalGuru['nama_matpel']."</td>";
																echo "<td>".$jadwalGuru['nama']."</td>";
																echo "<td>
																		<a href='#' class='btn btn-primary' title='".$jadwalGuru['id_jadwal']."' onclick='editJadwal(this)'><i class='icon-note'></i></a>
																		<a href='#' class='btn btn-warning text-white' title='".$jadwalGuru['id_jadwal']."' onclick='hapusJadwal(this)'><i class='icon-trash'></i></a>
																	 </td>";
														 	echo "</tr>";
														}
													 ?>
						                  		</tbody>
						                  	</table>
						                  	<?php 
						                  		echo "<td>
														<a href='#' class='btn btn-primary text-white' title='".$jadwalGuru['id_jadwal']."' onclick='tambahKamis(this)'><i class='zmdi zmdi-collection-plus'> Tambah Jadwal</i></a>
													</td>";
						                  	 ?>
						                </div>
                                  	</div>
                                </div>
                               <div class="tab-pane" id="jumat">
                                    <div class="card-body">
										<div class="table-responsive">
											<table class="table">
						                  		<thead align="center">
							                    	<tr>
							                     		<th>Jam Pelajaran</th>
							                      		<th>Pelajaran</th>
							                      		<th>Kelas</th>
							                      		<th style="width: 15px;">Action</th>
							                    	</tr>
							                  	</thead>
						                  		<tbody>
													<?php 
														$guru = $_GET['nip'];
														$sql = "SELECT tb_jadwal.*, tb_guru.nama , tb_matpel.nama_matpel, tb_kelas.nama FROM `tb_jadwal` JOIN tb_guru ON tb_jadwal.nip = tb_guru.nip JOIN tb_matpel ON tb_matpel.id_matpel = tb_jadwal.id_matpel JOIN tb_kelas ON tb_kelas.id_kelas = tb_jadwal.id_kelas where tb_jadwal.nip='".$guru."' and hari='5' 
														order by jam_pelajaran ASC";
														$query= mysqli_query($conn, $sql); 
														while($jadwalGuru = mysqli_fetch_array($query)){
															echo "<tr>";
																echo "<td>".$jadwalGuru['jam_pelajaran']."</td>";
																echo "<td>".$jadwalGuru['nama_matpel']."</td>";
																echo "<td>".$jadwalGuru['nama']."</td>";
																echo "<td>
																		<a href='#' class='btn btn-primary' title='".$jadwalGuru['id_jadwal']."' onclick='editJadwal(this)'><i class='icon-note'></i></a>
																		<a href='#' class='btn btn-warning text-white' title='".$jadwalGuru['id_jadwal']."' onclick='hapusJadwal(this)'><i class='icon-trash'></i></a>
																	 </td>";
														 	echo "</tr>";
														}
													 ?>
						                  		</tbody>
						                  	</table>
						                  	<?php 
						                  		echo "<td>
														<a href='#' class='btn btn-primary text-white' title='".$jadwalGuru['id_jadwal']."' onclick='tambahJumat(this)'><i class='zmdi zmdi-collection-plus'> Tambah Jadwal</i></a>
													</td>";
						                  	 ?>
						                </div>
                                  	</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- tambah senin-->
     <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Tambah Jadwal Hari Senin</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	        <form action="jadwalGuru/proses-add-jadwal-guru.php" method="POST" enctype="multipart/form-data">
		        <div class="modal-body">
		        	<input type="hidden" name="hari" value="1">
		        	<input type="hidden" name="nip" value="<?= $_GET['nip']?>">
		        	<div class="form-group row">
	                	<label for="nip" class="col-lg-2 col-form-label form-control-label">Jam Pelajaran</label>
	                    <div class="col-lg-10">
	                    	<?php
	                    	$guru = $_GET['nip'];
							$sql = "SELECT tb_jadwal.*, tb_guru.nama , tb_matpel.nama_matpel, tb_kelas.nama FROM `tb_jadwal` JOIN tb_guru ON tb_jadwal.nip = tb_guru.nip JOIN tb_matpel ON tb_matpel.id_matpel = tb_jadwal.id_matpel JOIN tb_kelas ON tb_kelas.id_kelas = tb_jadwal.id_kelas where tb_jadwal.nip='".$guru."' and hari='1' 
							order by jam_pelajaran ASC";
							$query= mysqli_query($conn, $sql);
	                    	$jam1 = array();
	                    	while($jadwalGuru = mysqli_fetch_array($query)){
								array_push($jam1, $jadwalGuru['jam_pelajaran']);
							}
							
	                    	?>
	                         <select name="jam_pelajaran" class="form-control" required>
	                        	<option value="" disabled="" selected="">Jam Pelajaran</option>
	                        	<?php 
	                        	$i=0;
	                        	foreach ($jampel as $key => $value): ?>
	                        		<?php if ($value != $jam1[$i]): ?>
	                        			<option value="<?= @$value ?>"><?=$value?></option>}
	                        		<?php else: ?>
	                        			
	                        		<?php endif ?>
	                        	<?php $i++;endforeach ?>
	                        </select>
	                    </div>
	                </div>
	                <div class="form-group row">
	                	<label class="col-lg-2 col-form-label form-control-label">Pelajaran</label>
	                    <div class="col-lg-10">
	                         <select name="id_matpel" class="form-control" required>
	                        	<option value="" disabled="" selected="">Mata Pelajaran</option>
	                        	<?php foreach ($datamapels as $key): ?>
	                        		<option value="<?=$key['id_matpel']?>"><?=$key['nama_matpel']?></option>
	                        	<?php endforeach ?>
	                        </select>
	                    </div>
	                </div>
	                <div class="form-group row">
	                    <label for="kelas" class="col-lg-2 col-form-label form-control-label">Kelas</label>
	                    <div class="col-lg-10">
	                        <select name="id_kelas" required class="form-control">
	                        	<option value="" disabled="" selected="">Pilih Kelas</option>
								<?php foreach ($datakelass as $key): ?>
	                        		<option value="<?=$key['id_kelas']?>"><?=$key['nama']?></option>
	                        	<?php endforeach ?>
	                        </select>
	                    </div>
	                </div>
		      	</div>
		     	 <div class="modal-footer">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Batalkan</button>
		        	<button type="submit" class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
		       	</div>
			</form>
	      </div>
	    </div>
	  </div>
	</div>
	
	<!-- edit senin-->
	 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="e_id_jadwal"></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	        <form action="jadwalGuru/proses-edit-jadwal-guru.php" method="POST" enctype="multipart/form-data">
	        	<input type="hidden" name="nip" id="v_nip" value="<?= $_GET['nip']?>">
	        	<input type="hidden" name="hari" id="v_hari" value="1">
                <input type="hidden" name="id_jadwal" id="v_id_jadwal">
		        	<div class="modal-body">
		            	<div class="form-group row">
		                	<label for="nip" class="col-lg-2 col-form-label form-control-label">Jam Pelajaran</label>
		                    <div class="col-lg-10">
		                         <select name="jam_pelajaran" id="v_jam_pelajaran" class="form-control" required>
		                        	<option value="" disabled="" selected="">Jam Pelajaran</option>
		                        	<option value="07:00 - 07:40">07:00 - 07:40</option>
		                        	<option value="07:40 - 08:20">07:40 - 08:20</option>
		                        	<option value="08:20 - 09:00">08:20 - 09:00</option>
		                        	<option value="istirahat">Istirahat</option>
		                        	<option value="09:20 - 10:00">09:20 - 10:00</option>
		                        	<option value="10:00 - 10:40">10:00 - 10:40</option>
		                        	<option value="10:40 - 11:20">10:40 - 11:20</option>
		                        	<option value="istirahat">Istirahat</option>
		                        	<option value="12:20 - 13:00">12:20 - 13:00</option>
		                        	<option value="13:00 - 13:40">13:00 - 13:40</option>
		                        	<option value="13:40 - 14:20">13:40 - 14:20</option>
		                        	<option value="14:20 - 15:00">14:20 - 15:00</option>
		                        </select>
		                    </div>
	                	</div>
		            	 <div class="form-group row">
		                	<label class="col-lg-2 col-form-label form-control-label">Pelajaran</label>
		                    <div class="col-lg-10">
		                         <select name="id_matpel" id="v_id_matpel" class="form-control" required>
		                        	<option value="" disabled="" selected="">Mata Pelajaran</option>
		                        	<?php foreach ($datamapels as $key): ?>
		                        		<option value="<?=$key['id_matpel']?>"><?=$key['nama_matpel']?></option>
		                        	<?php endforeach ?>
		                        </select>
		                    </div>
		                </div>
		            	<div class="form-group row">
		                    <label for="kelas" class="col-lg-2 col-form-label form-control-label">Kelas</label>
		                    <div class="col-lg-10">
		                        <select name="id_kelas" id="v_kelas" required class="form-control">
		                        	<option value="" disabled="" selected="">Pilih Kelas</option>
									<?php foreach ($datakelass as $key): ?>
		                        		<option value="<?=$key['id_kelas']?>"><?=$key['nama']?></option>
		                        	<?php endforeach ?>
		                        </select>
		                    </div>
	                	</div>
		            </div>
		     	 <div class="modal-footer">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Batalkan</button>
		        	<button type="submit" class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
		       	</div>
			</form>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- tambah selasa-->
     <div class="modal fade" id="tambahSelasa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Tambah Jadwal Hari Selasa</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	        <form action="jadwalGuru/proses-add-jadwal-guru.php" method="POST" enctype="multipart/form-data">
		        <div class="modal-body">
		        	<input type="hidden" name="hari" value="2">
		        	<input type="hidden" name="nip" value="<?= $_GET['nip']?>">
		        	<div class="form-group row">
	                	<label for="nip" class="col-lg-2 col-form-label form-control-label">Jam Pelajaran</label>
	                    <div class="col-lg-10">
	                    	<?php
	                    	$guru = $_GET['nip'];
							$sql = "SELECT tb_jadwal.*, tb_guru.nama , tb_matpel.nama_matpel, tb_kelas.nama FROM `tb_jadwal` JOIN tb_guru ON tb_jadwal.nip = tb_guru.nip JOIN tb_matpel ON tb_matpel.id_matpel = tb_jadwal.id_matpel JOIN tb_kelas ON tb_kelas.id_kelas = tb_jadwal.id_kelas where tb_jadwal.nip='".$guru."' and hari='2' 
							order by jam_pelajaran ASC";
							$query= mysqli_query($conn, $sql);
	                    	$jam2 = array();
	                    	while($jadwalGuru = mysqli_fetch_array($query)){
								array_push($jam2, $jadwalGuru['jam_pelajaran']);
							}
	                    	?>
	                         <select name="jam_pelajaran" class="form-control" required>
	                        	<option value="" disabled="" selected="">Jam Pelajaran</option>
	                        	<?php 
	                        	$i=0;
	                        	foreach ($jampel as $key => $value): ?>
	                        		<?php if ($value != $jam2[$i]): ?>
	                        			<option value="<?= @$value ?>"><?=$value?></option>}
	                        		<?php else: ?>
	                        			
	                        		<?php endif ?>
	                        	<?php $i++;endforeach ?>
	                        </select>
	                    </div>
	                </div>
	                <div class="form-group row">
	                	<label class="col-lg-2 col-form-label form-control-label">Pelajaran</label>
	                    <div class="col-lg-10">
	                         <select name="id_matpel" class="form-control" required>
	                        	<option value="" disabled="" selected="">Mata Pelajaran</option>
	                        	<?php foreach ($datamapels as $key): ?>
	                        		<option value="<?=$key['id_matpel']?>"><?=$key['nama_matpel']?></option>
	                        	<?php endforeach ?>
	                        </select>
	                    </div>
	                </div>
	                <div class="form-group row">
	                    <label for="kelas" class="col-lg-2 col-form-label form-control-label">Kelas</label>
	                    <div class="col-lg-10">
	                        <select name="id_kelas" required class="form-control">
	                        	<option value="" disabled="" selected="">Pilih Kelas</option>
								<?php foreach ($datakelass as $key): ?>
	                        		<option value="<?=$key['id_kelas']?>"><?=$key['nama']?></option>
	                        	<?php endforeach ?>
	                        </select>
	                    </div>
	                </div>
		      	</div>
		     	 <div class="modal-footer">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Batalkan</button>
		        	<button type="submit" class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
		       	</div>
			</form>
	      </div>
	    </div>
	  </div>
	</div>
	
	<!-- edit selasa-->
	 <div class="modal fade" id="editSelasa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="e_id_jadwal"></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	        <form action="jadwalGuru/proses-edit-jadwal-guru.php" method="POST" enctype="multipart/form-data">
	        	<input type="hidden" name="nip" id="v_nip" value="<?= $_GET['nip']?>">
	        	<input type="hidden" name="hari" id="v_hari" value="2">
                <input type="hidden" name="id_jadwal" id="v_id_jadwal">
		        	<div class="modal-body">
		            	<div class="form-group row">
		                	<label for="nip" class="col-lg-2 col-form-label form-control-label">Jam Pelajaran</label>
		                    <div class="col-lg-10">
		                         <select name="jam_pelajaran" id="v_jam_pelajaran" class="form-control" required>
		                        	<option value="" disabled="" selected="">Jam Pelajaran</option>
		                        	<option value="07:00 - 07:40">07:00 - 07:40</option>
		                        	<option value="07:40 - 08:20">07:40 - 08:20</option>
		                        	<option value="08:20 - 09:00">08:20 - 09:00</option>
		                        	<option value="istirahat">Istirahat</option>
		                        	<option value="09:20 - 10:00">09:20 - 10:00</option>
		                        	<option value="10:00 - 10:40">10:00 - 10:40</option>
		                        	<option value="10:40 - 11:20">10:40 - 11:20</option>
		                        	<option value="istirahat">Istirahat</option>
		                        	<option value="12:20 - 13:00">12:20 - 13:00</option>
		                        	<option value="13:00 - 13:40">13:00 - 13:40</option>
		                        	<option value="13:40 - 14:20">13:40 - 14:20</option>
		                        	<option value="14:20 - 15:00">14:20 - 15:00</option>
		                        </select>
		                    </div>
	                	</div>
		            	 <div class="form-group row">
		                	<label class="col-lg-2 col-form-label form-control-label">Pelajaran</label>
		                    <div class="col-lg-10">
		                         <select name="id_matpel" id="v_id_matpel" class="form-control" required>
		                        	<option value="" disabled="" selected="">Mata Pelajaran</option>
		                        	<?php foreach ($datamapels as $key): ?>
		                        		<option value="<?=$key['id_matpel']?>"><?=$key['nama_matpel']?></option>
		                        	<?php endforeach ?>
		                        </select>
		                    </div>
		                </div>
		            	<div class="form-group row">
		                    <label for="kelas" class="col-lg-2 col-form-label form-control-label">Kelas</label>
		                    <div class="col-lg-10">
		                        <select name="id_kelas" id="v_kelas" required class="form-control">
		                        	<option value="" disabled="" selected="">Pilih Kelas</option>
									<?php foreach ($datakelass as $key): ?>
		                        		<option value="<?=$key['id_kelas']?>"><?=$key['nama']?></option>
		                        	<?php endforeach ?>
		                        </select>
		                    </div>
	                	</div>
		            </div>
		     	 <div class="modal-footer">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Batalkan</button>
		        	<button type="submit" class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
		       	</div>
			</form>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- tambah Rabu-->
     <div class="modal fade" id="tambahRabu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Tambah Jadwal Hari Rabu</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	        <form action="jadwalGuru/proses-add-jadwal-guru.php" method="POST" enctype="multipart/form-data">
		        <div class="modal-body">
		        	<input type="hidden" name="hari" value="3">
		        	<input type="hidden" name="nip" value="<?= $_GET['nip']?>">
		        	<div class="form-group row">
	                	<label for="nip" class="col-lg-2 col-form-label form-control-label">Jam Pelajaran</label>
	                    <div class="col-lg-10">
	                    	<?php
	                    	$guru = $_GET['nip'];
								$sql = "SELECT tb_jadwal.*, tb_guru.nama , tb_matpel.nama_matpel, tb_kelas.nama FROM `tb_jadwal` JOIN tb_guru ON tb_jadwal.nip = tb_guru.nip JOIN tb_matpel ON tb_matpel.id_matpel = tb_jadwal.id_matpel JOIN tb_kelas ON tb_kelas.id_kelas = tb_jadwal.id_kelas where tb_jadwal.nip='".$guru."' and hari='3' 
								order by jam_pelajaran ASC";
								$query= mysqli_query($conn, $sql);
		                    	$jam3 = array();
		                    	while($jadwalGuru = mysqli_fetch_array($query)){
									array_push($jam3, $jadwalGuru['jam_pelajaran']);
								}
		                    	?>
		                         <select name="jam_pelajaran" class="form-control" required>
		                        	<option value="" disabled="" selected="">Jam Pelajaran</option>
		                        	<?php 
		                        	$i=0;
		                        	foreach ($jampel as $key => $value): ?>
		                        		<?php if ($value != $jam3[$i]): ?>
		                        			<option value="<?= @$value ?>"><?=$value?></option>}
		                        		<?php else: ?>
		                        			
		                        		<?php endif ?>
		                        	<?php $i++;endforeach ?>
		                        </select>
	                    </div>
	                </div>
	                <div class="form-group row">
	                	<label class="col-lg-2 col-form-label form-control-label">Pelajaran</label>
	                    <div class="col-lg-10">
	                         <select name="id_matpel" class="form-control" required>
	                        	<option value="" disabled="" selected="">Mata Pelajaran</option>
	                        	<?php foreach ($datamapels as $key): ?>
	                        		<option value="<?=$key['id_matpel']?>"><?=$key['nama_matpel']?></option>
	                        	<?php endforeach ?>
	                        </select>
	                    </div>
	                </div>
	                <div class="form-group row">
	                    <label for="kelas" class="col-lg-2 col-form-label form-control-label">Kelas</label>
	                    <div class="col-lg-10">
	                        <select name="id_kelas" required class="form-control">
	                        	<option value="" disabled="" selected="">Pilih Kelas</option>
								<?php foreach ($datakelass as $key): ?>
	                        		<option value="<?=$key['id_kelas']?>"><?=$key['nama']?></option>
	                        	<?php endforeach ?>
	                        </select>
	                    </div>
	                </div>
		      	</div>
		     	 <div class="modal-footer">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Batalkan</button>
		        	<button type="submit" class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
		       	</div>
			</form>
	      </div>
	    </div>
	  </div>
	</div>
	
	<!-- edit Rabu-->
	 <div class="modal fade" id="editRabu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="e_id_jadwal"></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	        <form action="jadwalGuru/proses-edit-jadwal-guru.php" method="POST" enctype="multipart/form-data">
	        	<input type="hidden" name="nip" id="v_nip" value="<?= $_GET['nip']?>">
	        	<input type="hidden" name="hari" id="v_hari" value="3">
                <input type="hidden" name="id_jadwal" id="v_id_jadwal">
		        	<div class="modal-body">
		            	<div class="form-group row">
		                	<label for="nip" class="col-lg-2 col-form-label form-control-label">Jam Pelajaran</label>
		                    <div class="col-lg-10">
		                         <select name="jam_pelajaran" id="v_jam_pelajaran" class="form-control" required>
		                        	<option value="" disabled="" selected="">Jam Pelajaran</option>
		                        	<option value="07:00 - 07:40">07:00 - 07:40</option>
		                        	<option value="07:40 - 08:20">07:40 - 08:20</option>
		                        	<option value="08:20 - 09:00">08:20 - 09:00</option>
		                        	<option value="istirahat">Istirahat</option>
		                        	<option value="09:20 - 10:00">09:20 - 10:00</option>
		                        	<option value="10:00 - 10:40">10:00 - 10:40</option>
		                        	<option value="10:40 - 11:20">10:40 - 11:20</option>
		                        	<option value="istirahat">Istirahat</option>
		                        	<option value="12:20 - 13:00">12:20 - 13:00</option>
		                        	<option value="13:00 - 13:40">13:00 - 13:40</option>
		                        	<option value="13:40 - 14:20">13:40 - 14:20</option>
		                        	<option value="14:20 - 15:00">14:20 - 15:00</option>
		                        </select>
		                    </div>
	                	</div>
		            	 <div class="form-group row">
		                	<label class="col-lg-2 col-form-label form-control-label">Pelajaran</label>
		                    <div class="col-lg-10">
		                         <select name="id_matpel" id="v_id_matpel" class="form-control" required>
		                        	<option value="" disabled="" selected="">Mata Pelajaran</option>
		                        	<?php foreach ($datamapels as $key): ?>
		                        		<option value="<?=$key['id_matpel']?>"><?=$key['nama_matpel']?></option>
		                        	<?php endforeach ?>
		                        </select>
		                    </div>
		                </div>
		            	<div class="form-group row">
		                    <label for="kelas" class="col-lg-2 col-form-label form-control-label">Kelas</label>
		                    <div class="col-lg-10">
		                        <select name="id_kelas" id="v_kelas" required class="form-control">
		                        	<option value="" disabled="" selected="">Pilih Kelas</option>
									<?php foreach ($datakelass as $key): ?>
		                        		<option value="<?=$key['id_kelas']?>"><?=$key['nama']?></option>
		                        	<?php endforeach ?>
		                        </select>
		                    </div>
	                	</div>
		            </div>
		     	 <div class="modal-footer">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Batalkan</button>
		        	<button type="submit" class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
		       	</div>
			</form>
	      </div>
	    </div>
	  </div>
	</div>
	
	<!-- tambah Kamis-->
     <div class="modal fade" id="tambahKamis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Tambah Jadwal Hari Kamis</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	        <form action="jadwalGuru/proses-add-jadwal-guru.php" method="POST" enctype="multipart/form-data">
		        <div class="modal-body">
		        	<input type="hidden" name="hari" value="4">
		        	<input type="hidden" name="nip" value="<?= $_GET['nip']?>">
		        	<div class="form-group row">
	                	<label for="nip" class="col-lg-2 col-form-label form-control-label">Jam Pelajaran</label>
	                    <div class="col-lg-10">
	                        <?php
	                    	$guru = $_GET['nip'];
							$sql = "SELECT tb_jadwal.*, tb_guru.nama , tb_matpel.nama_matpel, tb_kelas.nama FROM `tb_jadwal` JOIN tb_guru ON tb_jadwal.nip = tb_guru.nip JOIN tb_matpel ON tb_matpel.id_matpel = tb_jadwal.id_matpel JOIN tb_kelas ON tb_kelas.id_kelas = tb_jadwal.id_kelas where tb_jadwal.nip='".$guru."' and hari='4' 
							order by jam_pelajaran ASC";
							$query= mysqli_query($conn, $sql);
	                    	$jam4 = array();
	                    	while($jadwalGuru = mysqli_fetch_array($query)){
								array_push($jam4, $jadwalGuru['jam_pelajaran']);
							}
	                    	?>
	                         <select name="jam_pelajaran" class="form-control" required>
	                        	<option value="" disabled="" selected="">Jam Pelajaran</option>
	                        	<?php 
	                        	$i=0;
	                        	foreach ($jampel as $key => $value): ?>
	                        		<?php if ($value != $jam4[$i]): ?>
	                        			<option value="<?= @$value ?>"><?=$value?></option>}
	                        		<?php else: ?>
	                        			
	                        		<?php endif ?>
	                        	<?php $i++;endforeach ?>
	                        </select>
	                    </div>
	                </div>
	                <div class="form-group row">
	                	<label class="col-lg-2 col-form-label form-control-label">Pelajaran</label>
	                    <div class="col-lg-10">
	                         <select name="id_matpel" class="form-control" required>
	                        	<option value="" disabled="" selected="">Mata Pelajaran</option>
	                        	<?php foreach ($datamapels as $key): ?>
	                        		<option value="<?=$key['id_matpel']?>"><?=$key['nama_matpel']?></option>
	                        	<?php endforeach ?>
	                        </select>
	                    </div>
	                </div>
	                <div class="form-group row">
	                    <label for="kelas" class="col-lg-2 col-form-label form-control-label">Kelas</label>
	                    <div class="col-lg-10">
	                        <select name="id_kelas" required class="form-control">
	                        	<option value="" disabled="" selected="">Pilih Kelas</option>
								<?php foreach ($datakelass as $key): ?>
	                        		<option value="<?=$key['id_kelas']?>"><?=$key['nama']?></option>
	                        	<?php endforeach ?>
	                        </select>
	                    </div>
	                </div>
		      	</div>
		     	 <div class="modal-footer">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Batalkan</button>
		        	<button type="submit" class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
		       	</div>
			</form>
	      </div>
	    </div>
	  </div>
	</div>
	
	<!-- edit kamis-->
	 <div class="modal fade" id="editKamis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="e_id_jadwal"></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	        <form action="jadwalGuru/proses-edit-jadwal-guru.php" method="POST" enctype="multipart/form-data">
	        	<input type="hidden" name="nip" id="v_nip" value="<?= $_GET['nip']?>">
	        	<input type="hidden" name="hari" id="v_hari" value="4">
                <input type="hidden" name="id_jadwal" id="v_id_jadwal">
		        	<div class="modal-body">
		            	<div class="form-group row">
		                	<label for="nip" class="col-lg-2 col-form-label form-control-label">Jam Pelajaran</label>
		                    <div class="col-lg-10">
		                         <select name="jam_pelajaran" id="v_jam_pelajaran" class="form-control" required>
		                        	<option value="" disabled="" selected="">Jam Pelajaran</option>
		                        	<option value="07:00 - 07:40">07:00 - 07:40</option>
		                        	<option value="07:40 - 08:20">07:40 - 08:20</option>
		                        	<option value="08:20 - 09:00">08:20 - 09:00</option>
		                        	<option value="istirahat">Istirahat</option>
		                        	<option value="09:20 - 10:00">09:20 - 10:00</option>
		                        	<option value="10:00 - 10:40">10:00 - 10:40</option>
		                        	<option value="10:40 - 11:20">10:40 - 11:20</option>
		                        	<option value="istirahat">Istirahat</option>
		                        	<option value="12:20 - 13:00">12:20 - 13:00</option>
		                        	<option value="13:00 - 13:40">13:00 - 13:40</option>
		                        	<option value="13:40 - 14:20">13:40 - 14:20</option>
		                        	<option value="14:20 - 15:00">14:20 - 15:00</option>
		                        </select>
		                    </div>
	                	</div>
		            	 <div class="form-group row">
		                	<label class="col-lg-2 col-form-label form-control-label">Pelajaran</label>
		                    <div class="col-lg-10">
		                         <select name="id_matpel" id="v_id_matpel" class="form-control" required>
		                        	<option value="" disabled="" selected="">Mata Pelajaran</option>
		                        	<?php foreach ($datamapels as $key): ?>
		                        		<option value="<?=$key['id_matpel']?>"><?=$key['nama_matpel']?></option>
		                        	<?php endforeach ?>
		                        </select>
		                    </div>
		                </div>
		            	<div class="form-group row">
		                    <label for="kelas" class="col-lg-2 col-form-label form-control-label">Kelas</label>
		                    <div class="col-lg-10">
		                        <select name="id_kelas" id="v_kelas" required class="form-control">
		                        	<option value="" disabled="" selected="">Pilih Kelas</option>
									<?php foreach ($datakelass as $key): ?>
		                        		<option value="<?=$key['id_kelas']?>"><?=$key['nama']?></option>
		                        	<?php endforeach ?>
		                        </select>
		                    </div>
	                	</div>
		            </div>
		     	 <div class="modal-footer">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Batalkan</button>
		        	<button type="submit" class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
		       	</div>
			</form>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- tambah Jumat-->
     <div class="modal fade" id="tambahJumat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Tambah Jadwal Hari Jum'at</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	        <form action="jadwalGuru/proses-add-jadwal-guru.php" method="POST" enctype="multipart/form-data">
		        <div class="modal-body">
		        	<input type="hidden" name="hari" value="5">
		        	<input type="hidden" name="nip" value="<?= $_GET['nip']?>">
		        	<div class="form-group row">
	                	<label for="nip" class="col-lg-2 col-form-label form-control-label">Jam Pelajaran</label>
	                    <div class="col-lg-10">
	                        <?php
	                    	$guru = $_GET['nip'];
							$sql = "SELECT tb_jadwal.*, tb_guru.nama , tb_matpel.nama_matpel, tb_kelas.nama FROM `tb_jadwal` JOIN tb_guru ON tb_jadwal.nip = tb_guru.nip JOIN tb_matpel ON tb_matpel.id_matpel = tb_jadwal.id_matpel JOIN tb_kelas ON tb_kelas.id_kelas = tb_jadwal.id_kelas where tb_jadwal.nip='".$guru."' and hari='5' 
							order by jam_pelajaran ASC";
							$query= mysqli_query($conn, $sql);
	                    	$jam5 = array();
	                    	while($jadwalGuru = mysqli_fetch_array($query)){
								array_push($jam5, $jadwalGuru['jam_pelajaran']);
							}
	                    	?>
	                         <select name="jam_pelajaran" class="form-control" required>
	                        	<option value="" disabled="" selected="">Jam Pelajaran</option>
	                        	<?php 
	                        	$i=0;
	                        	foreach ($jampel as $key => $value): ?>
	                        		<?php if ($value != $jam5[$i]): ?>
	                        			<option value="<?= @$value ?>"><?=$value?></option>}
	                        		<?php else: ?>
	                        			
	                        		<?php endif ?>
	                        	<?php $i++;endforeach ?>
	                        </select>
	                    </div>
	                </div>
	                <div class="form-group row">
	                	<label class="col-lg-2 col-form-label form-control-label">Pelajaran</label>
	                    <div class="col-lg-10">
	                         <select name="id_matpel" class="form-control" required>
	                        	<option value="" disabled="" selected="">Mata Pelajaran</option>
	                        	<?php foreach ($datamapels as $key): ?>
	                        		<option value="<?=$key['id_matpel']?>"><?=$key['nama_matpel']?></option>
	                        	<?php endforeach ?>
	                        </select>
	                    </div>
	                </div>
	                <div class="form-group row">
	                    <label for="kelas" class="col-lg-2 col-form-label form-control-label">Kelas</label>
	                    <div class="col-lg-10">
	                        <select name="id_kelas" required class="form-control">
	                        	<option value="" disabled="" selected="">Pilih Kelas</option>
								<?php foreach ($datakelass as $key): ?>
	                        		<option value="<?=$key['id_kelas']?>"><?=$key['nama']?></option>
	                        	<?php endforeach ?>
	                        </select>
	                    </div>
	                </div>
		      	</div>
		     	 <div class="modal-footer">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Batalkan</button>
		        	<button type="submit" class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
		       	</div>
			</form>
	      </div>
	    </div>
	  </div>
	</div>
	
	<!-- edit Jumat-->
	 <div class="modal fade" id="editRabu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="e_id_jadwal"></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	        <form action="jadwalGuru/proses-edit-jadwal-guru.php" method="POST" enctype="multipart/form-data">
	        	<input type="hidden" name="nip" id="v_nip" value="<?= $_GET['nip']?>">
	        	<input type="hidden" name="hari" id="v_hari" value="5">
                <input type="hidden" name="id_jadwal" id="v_id_jadwal">
		        	<div class="modal-body">
		            	<div class="form-group row">
		                	<label for="nip" class="col-lg-2 col-form-label form-control-label">Jam Pelajaran</label>
		                    <div class="col-lg-10">
		                         <select name="jam_pelajaran" id="v_jam_pelajaran" class="form-control" required>
		                        	<option value="" disabled="" selected="">Jam Pelajaran</option>
		                        	<option value="07:00 - 07:40">07:00 - 07:40</option>
		                        	<option value="07:40 - 08:20">07:40 - 08:20</option>
		                        	<option value="08:20 - 09:00">08:20 - 09:00</option>
		                        	<option value="istirahat">Istirahat</option>
		                        	<option value="09:20 - 10:00">09:20 - 10:00</option>
		                        	<option value="10:00 - 10:40">10:00 - 10:40</option>
		                        	<option value="10:40 - 11:20">10:40 - 11:20</option>
		                        	<option value="istirahat">Istirahat</option>
		                        	<option value="12:20 - 13:00">12:20 - 13:00</option>
		                        	<option value="13:00 - 13:40">13:00 - 13:40</option>
		                        	<option value="13:40 - 14:20">13:40 - 14:20</option>
		                        	<option value="14:20 - 15:00">14:20 - 15:00</option>
		                        </select>
		                    </div>
	                	</div>
		            	 <div class="form-group row">
		                	<label class="col-lg-2 col-form-label form-control-label">Pelajaran</label>
		                    <div class="col-lg-10">
		                         <select name="id_matpel" id="v_id_matpel" class="form-control" required>
		                        	<option value="" disabled="" selected="">Mata Pelajaran</option>
		                        	<?php foreach ($datamapels as $key): ?>
		                        		<option value="<?=$key['id_matpel']?>"><?=$key['nama_matpel']?></option>
		                        	<?php endforeach ?>
		                        </select>
		                    </div>
		                </div>
		            	<div class="form-group row">
		                    <label for="kelas" class="col-lg-2 col-form-label form-control-label">Kelas</label>
		                    <div class="col-lg-10">
		                        <select name="id_kelas" id="v_kelas" required class="form-control">
		                        	<option value="" disabled="" selected="">Pilih Kelas</option>
									<?php foreach ($datakelass as $key): ?>
		                        		<option value="<?=$key['id_kelas']?>"><?=$key['nama']?></option>
		                        	<?php endforeach ?>
		                        </select>
		                    </div>
	                	</div>
		            </div>
		     	 <div class="modal-footer">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Batalkan</button>
		        	<button type="submit" class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
		       	</div>
			</form>
	      </div>
	    </div>
	  </div>
	</div>
	
	<!-- hapus -->
	<div class="modal fade" id="hapusModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">HAPUS JADWAL</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
				</div>
				<div class="modal-body">
					<div class="text-center">YAKIN INGIN MENGHAPUS JADWAL?</div>
					<br><br>
					<div class="pull-right">
						<form action="jadwalGuru/proses-hapus-jadwal-guru.php" method="POST">
							<input type="hidden" name="id_jadwal" id="del_jadwal" value="">
							<input type="hidden" name="nip" id="nip" value="<?= $_GET['nip']?>">
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
<script>
	
	function hapusJadwal(obj){
 		var id_jadwal = $(obj).attr('title');
 		$('#hapusModal').modal('show');
 		$('#del_jadwal').val(id_jadwal);
 	}

	function editJadwal(obj){
 		$('#editModal').modal('show');
 		var id_jadwal = $(obj).attr('title');
 		$.ajax({
 			url : '<?php echo "http://localhost/template-file/admin/jadwalGuru/data-jadwalGuru.php?id_jadwal=" ?>'+id_jadwal,
 			type : 'GET',
 			data : function(data){
 				return JSON.stringfy(data);
 			},
 			success: function(data){
 				var json = JSON.parse(data);
 				$('#e_id_jadwal').html('<i class="icon-note"></i> Edit Jadwal guru dengan ID Jadwal : '+id_jadwal);
 				
 				$('#v_id_jadwal').val(json.id_jadwal);
 				$('#v_id_matpel').val(json.id_matpel);
 				$('#v_nip').val(json.nip);
 				$('#v_jam_pelajaran').val(json.jam_pelajaran);
 				$('#v_kelas').val(json.id_kelas);
 				$('#v_hari').val(json.hari);
 				console.log(data);
 			},
 			error: function(data){
 				console.log(data);
 			}
 		});
 	}

 	function tambah(obj){
 		$('#tambahModal').modal('show');
 		var nip = $(obj).attr('title');
 		$.ajax({
 			url : '<?php echo "http://localhost/template-file/admin/guru/data-guru.php?nip=" ?>'+nip,
 			type : 'GET',
 			data : function(data){
 				return JSON.stringfy(data);	
 			},

 			error: function(data){
 				console.log(data);
 			}
 		});
 	}

 	function tambahSelasa(obj){
 		$('#tambahSelasa').modal('show');
 		var nip = $(obj).attr('title');
 		$.ajax({
 			url : '<?php echo "http://localhost/template-file/admin/guru/data-guru.php?nip=" ?>'+nip,
 			type : 'GET',
 			data : function(data){
 				return JSON.stringfy(data);	
 			},

 			error: function(data){
 				console.log(data);
 			}
 		});
 	}

 	function tambahRabu(obj){
 		$('#tambahRabu').modal('show');
 		var nip = $(obj).attr('title');
 		$.ajax({
 			url : '<?php echo "http://localhost/template-file/admin/guru/data-guru.php?nip=" ?>'+nip,
 			type : 'GET',
 			data : function(data){
 				return JSON.stringfy(data);	
 			},

 			error: function(data){
 				console.log(data);
 			}
 		});
 	}

 	function tambahKamis(obj){
 		$('#tambahKamis').modal('show');
 		var nip = $(obj).attr('title');
 		$.ajax({
 			url : '<?php echo "http://localhost/template-file/admin/guru/data-guru.php?nip=" ?>'+nip,
 			type : 'GET',
 			data : function(data){
 				return JSON.stringfy(data);	
 			},

 			error: function(data){
 				console.log(data);
 			}
 		});
 	}

 	function tambahJumat(obj){
 		$('#tambahJumat').modal('show');
 		var nip = $(obj).attr('title');
 		$.ajax({
 			url : '<?php echo "http://localhost/template-file/admin/guru/data-guru.php?nip=" ?>'+nip,
 			type : 'GET',
 			data : function(data){
 				return JSON.stringfy(data);	
 			},

 			error: function(data){
 				console.log(data);
 			}
 		});
 	}
 </script>
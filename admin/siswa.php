<?php 
  require_once('partials/header.php');
  require_once('config.php');
 ?> 
<?php 	
	$query_kelas = mysqli_query($conn, "SELECT * FROM tb_kelas"); 
?>
 <div class="clearfix"></div>
    <div class="content-wrapper">
        <div class="container-fluid"><br>
        	<div class="card">
                <div class="card-body">
                    <div class="row">
        				<div class="col-md-3">
        					<h2><i class="zmdi zmdi-account-calendar"></i> Data Siswa</h2>
        				</div>
        				<div class="col-md-9">
        					<form class="search-bar">
					        <input type="text" class="form-control" id="search-field" placeholder="Search" title="Type in a name">
					         <a href="javascript:void();" class="search"><i class="icon-magnifier"></i></a>
					      </form>
        				</div>
        			</div>
                    <div class="dropdown-divider"></div>
                    <?php 
		    			switch ((isset($_GET['system_message']) ? $_GET['system_message'] : '')) {
		    				case 'sukses':
			    				echo "<div class='alert alert-primary' role='alert'>
			    					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			    					<strong>Berhasil !</strong> Data Siswa Berhasil Diperbarui !!
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
                            <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                                <li class="nav-item">
                                    <a href="javascript:void();" data-target="#siswa1" data-toggle="pill" class="nav-link active"><i class="icon-user"></i> <span class="hidden-xs">Siswal kelas 1</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void();" data-target="#siswa2" data-toggle="pill" class="nav-link"><i class="icon-user"></i> <span class="hidden-xs">Siswa Kelas 2</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void();" data-target="#siswa3" data-toggle="pill" class="nav-link"><i class="icon-user"></i> <span class="hidden-xs">Siswa Kelas 3</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void();" data-target="#tambah" data-toggle="pill" class="nav-link"><i class="zmdi zmdi-account-add"></i> <span class="hidden-xs">Tambah</span></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="siswa1">
                                    <div class="card-body">
						              	<div class="table-responsive">
						               		<table class="table table-content" id="tables">
						                  		<thead align="center">
							                    	<tr>
							                     		<th style="width: 5px;">No</th>
							                     		<th style="width: 10px;">Profile</th>
							                      		<th>NIS</th>
							                      		<th>Nama</th>
							                      		<th>Kelas</th>
							                      		<th>Alamat</th>
							                      		<th>JK</th>
							                      		<th style="width: 15px;">Action</th>
							                    	</tr>
							                  	</thead>
						                  		<tbody>
						                  			<?php
														$sql = "SELECT a.*, b.nama as nama_kelas, b.status from tb_siswa a JOIN tb_kelas b on a.kelas = b.id_kelas where b.status = 0";
														$query= mysqli_query($conn, $sql);	
														$n = 1;
														while($siswa = mysqli_fetch_array($query)){
															echo "<tr>";
																echo "<td>".$n++."</td>";
																if($siswa['foto'] == ''){
																	echo "<td><img style='witdh: 50px; height: 50px;' src='../assets/images/fotosiswa/siswa.png'/></td>";
																}else{
																	echo "<td><img style='witdh: 50px; height: 50px;' src='../assets/images/fotosiswa/".$siswa['foto']."'/></td>";
																}
																echo "<td>".$siswa['nis']. "</td>";
																echo "<td>".$siswa['nama']. "</td>";
																echo "<td>".$siswa['nama_kelas']. "</td>";
																echo "<td>".$siswa['alamat']. "</td>";
																echo "<td>".$siswa['jk']. "</td>";
																echo "<td>
																		<a href='#' class='btn btn-primary' title='".$siswa['nis']."' onclick='editSiswa(this)'><i class='icon-note'></i></a>
																		<a href='#' class='btn btn-warning text-white' title='".$siswa['nis']."' onclick='hapusSiswa(this)'><i class='icon-trash'></i></a>
																	</td>";	
														 	echo "</tr>";
														 }
													?>
						                  		</tbody>
						               		</table>
						              	</div>
						            </div>
                                </div>
                                <div class="tab-pane" id="siswa2">
                                    <div class="card-body">
						              	<div class="table-responsive">
						               		<table class="table table-content" id="tables">
						                  		<thead align="center">
							                    	<tr>
							                     		<th style="width: 5px;">No</th>
							                     		<th style="width: 10px;">Profile</th>
							                      		<th>NIS</th>
							                      		<th>Nama</th>
							                      		<th>Kelas</th>
							                      		<th>Alamat</th>
							                      		<th>JK</th>
							                      		<th style="width: 15px;">Action</th>
							                    	</tr>
							                  	</thead>
						                  		<tbody>
						                  			<?php
														$sql = "SELECT a.*, b.nama as nama_kelas, b.status from tb_siswa a JOIN tb_kelas b on a.kelas = b.id_kelas where b.status = 1";
														$query= mysqli_query($conn, $sql);	
														$n = 1;
														while($siswa = mysqli_fetch_array($query)){
															echo "<tr>";
															echo "<td>".$n++."</td>";
															if($siswa['foto'] == ''){
																echo "<td><img style='witdh: 50px; height: 50px;' src='../assets/images/fotosiswa/siswa.png'/></td>";
															}else{
																echo "<td><img style='witdh: 50px; height: 50px;' src='../assets/images/fotosiswa/".$siswa['foto']."'/></td>";
															}
															echo "<td>".$siswa['nis']. "</td>";
															echo "<td>".$siswa['nama']. "</td>";
															echo "<td>".$siswa['nama_kelas']. "</td>";
															echo "<td>".$siswa['alamat']. "</td>";
															echo "<td>".$siswa['jk']. "</td>";
															echo "<td>
																	<a href='#' class='btn btn-primary' title='".$siswa['nis']."' onclick='editSiswa(this)'><i class='icon-note'></i></a>
																	<a href='#' class='btn btn-warning text-white' title='".$siswa['nis']."' onclick='hapusSiswa(this)'><i class='icon-trash'></i></a>
																</td>";	
													 	echo "</tr>";
													 }
													?>
						                  		</tbody>
						               		</table>
						              	</div>
						            </div>
                                </div>
                                <div class="tab-pane" id="siswa3">
                                    <div class="card-body">
						              	<div class="table-responsive">
						               		<table class="table table-content" id="tables">
						                  		<thead align="center">
							                    	<tr>
							                     		<th style="width: 5px;">No</th>
							                     		<th style="width: 10px;">Profile</th>
							                      		<th>NIS</th>
							                      		<th>Nama</th>
							                      		<th>Kelas</th>
							                      		<th>Alamat</th>
							                      		<th>JK</th>
							                      		<th style="width: 15px;">Action</th>
							                    	</tr>
							                  	</thead>
						                  		<tbody>
						                  			<?php
														$sql = "SELECT a.*, b.nama as nama_kelas, b.status from tb_siswa a JOIN tb_kelas b on a.kelas = b.id_kelas where b.status = 2";
														$query= mysqli_query($conn, $sql);	
														$n = 1;
														while($siswa = mysqli_fetch_array($query)){
															echo "<tr>";
																echo "<td>".$n++."</td>";
																if($siswa['foto'] == ''){
																	echo "<td><img style='witdh: 50px; height: 50px;' src='../assets/images/fotosiswa/siswa.png'/></td>";
																}else{
																	echo "<td><img style='witdh: 50px; height: 50px;' src='../assets/images/fotosiswa/".$siswa['foto']."'/></td>";
																}
																echo "<td>".$siswa['nis']. "</td>";
																echo "<td>".$siswa['nama']. "</td>";
																echo "<td>".$siswa['nama_kelas']. "</td>";
																echo "<td>".$siswa['alamat']. "</td>";
																echo "<td>".$siswa['jk']. "</td>";
																echo "<td>
																		<a href='#' class='btn btn-primary' title='".$siswa['nis']."' onclick='editSiswa(this)'><i class='icon-note'></i></a>
																		<a href='#' class='btn btn-warning text-white' title='".$siswa['nis']."' onclick='hapusSiswa(this)'><i class='icon-trash'></i></a>
																	</td>";	
														 	echo "</tr>";
														 }
													?>
						                  		</tbody>
						               		</table>
						              	</div>
						            </div>
                                </div>
                                <!-- tambah siswa -->
                                <div class="tab-pane" id="tambah">
                                    <div class="card-body">
                                    	<h3 class="text-center">Tambah Siswa</h3><br>
                                    	<form action="siswa/proses_tambah_siswa.php" method="POST" enctype="multipart/form-data">
                                    		<div p align="center" class="image-upload" style="padding-bottom: 20px;">
											    <label for="file-input">
											        <img src="../assets/images/fotosiswa/user.jpg" id="profile" style="width: 80px; cursor: pointer; border-radius: 50%" /><br>
											        Foto Profile
											    </label>
											    <input name="foto" id="file-input" type="file" style="display: none" class="form-control" />
											</div>
                                    		<div class="form-group row">
                                            	<label for="nis" class="col-lg-2 col-form-label form-control-label">NIS</label>
	                                            <div class="col-lg-10">
	                                                <input name="nis" class="form-control" type="text" required>
	                                            </div>
	                                        </div>
                                    		<div class="form-group row">
                                            	<label for="nama" class="col-lg-2 col-form-label form-control-label">Nama </label>
	                                            <div class="col-lg-10">
	                                                <input name="nama" class="form-control" type="text" required>
	                                            </div>
	                                        </div>
	                                        <div class="form-group row">
                                            	<label for="alamat" class="col-lg-2 col-form-label form-control-label">Alamat </label>
	                                            <div class="col-lg-10">
	                                                <input name="alamat" class="form-control" type="text" required>
	                                            </div>
	                                        </div>
	                                        <div class="form-group row">
                                            	<label for="jk" class="col-lg-2 col-form-label form-control-label">Jenis Kelamin </label>
	                                            <div class="col-lg-10">
	                                                <select name="jk" required class="form-control">
	                                                	<option value="" disabled="" selected="">Pilih Jenis Kelamin</option>
	                                                	<option>Laki-Laki</option>
	                                                	<option>Perempuan</option>
	                                                </select>
	                                            </div>
	                                        </div>
	                                        <div class="form-group row">
	                                            <label for="kelas" class="col-lg-2 col-form-label form-control-label">Kelas</label>
	                                            <div class="col-lg-10">
	                                                <select name="kelas" required class="form-control">
	                                                	<option value="" disabled="" selected="">Pilih Kelas</option>
														<?php 
															while($data_kelas = mysqli_fetch_array($query_kelas)){
			                                              		echo "<option value='".$data_kelas['id_kelas']."'>".$data_kelas['nama']."</option>";
															}
														?>
	                                                </select>
	                                            </div>
	                                        </div>

	                                        <div class="form-group row">
                                            	<label class="col-lg-2 col-form-label form-control-label"></label>
	                                            <div class="col-lg-10">
	                                                <input type="reset" class="btn btn-dark" value="Cancel">
	                                                <input type="submit" class="btn btn-primary" value="Tambah" name="tambah_siswa">
	                                            </div>
                                        	</div>
                                    	</form>
						            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- modal edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="e_nis"></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	        <form action="siswa/proses_edit_siswa.php" method="POST" enctype="multipart/form-data">
		        <div class="modal-body">
		        	<div class="image-upload" style="padding-left: 45%; padding-bottom: 20px;">
					    <label for="file-input">
					        <img src="../assets/images/fotosiswa/user.jpg" style="width: 80px; cursor: pointer; border-radius: 50%" />
					    </label>
					    <input name="foto" id="v_foto" type="file" style="display: none" />
					</div>
		        	<div class="form-group row " >
	                	<label for="nip" class="col-lg-2 col-form-label form-control-label">NIS</label>
	                    <div class="col-lg-10">
	                        <input name="nis" id="v_nis" class="form-control" type="text" readonly="">
	                    </div>
	                </div>
	                <div class="form-group row">
	                	<label for="nip" class="col-lg-2 col-form-label form-control-label">Nama</label>
	                    <div class="col-lg-10">
	                        <input name="nama" id="v_nama" class="form-control" type="text">
	                    </div>

	                </div>
                    <div class="form-group row">
                        <label for="kelas" class="col-lg-2 col-form-label form-control-label">Kelas</label>
                        <div class="col-lg-10">
                            <select name="kelas" id="v_kelas" required class="form-control">
                            	<option value="" disabled="" selected="">Pilih Kelas</option>
								<?php 
									$query_kelas = mysqli_query($conn, "SELECT * FROM tb_kelas");
									while($data_kelas = mysqli_fetch_array($query_kelas)){
                                  		echo "<option value='".$data_kelas['id_kelas']."'>".$data_kelas['nama']."</option>";
									}
								?>
                            </select>
                        </div>
                    </div>
	                <div class="form-group row">
	                	<label for="alamat" class="col-lg-2 col-form-label form-control-label">Alamat</label>
	                    <div class="col-lg-10">
	                        <input name="alamat" id="v_alamat" class="form-control" type="text">
	                    </div>
	                </div>
	                <div class="form-group row">
	                	<label for="jk" class="col-lg-2 col-form-label form-control-label">JK</label>
	                    <div class="col-lg-10" >
	                        <select name="jk" id="v_jk" class="form-control">
	                        	<option value="" disabled="" selected="" >Pilih Jenis Kelamin</option>
	                        	<option>Laki-Laki</option>
	                        	<option>Perempuan</option>
	                        </select>
	                    </div>
	                </div>
		      	</div>
		     	 <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
			</form>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="hapusModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">HAPUS DATA SISWA</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
				</div>
				<div class="modal-body">
					<div class="text-center">YAKIN MENGHAPUS DATA SISWA ?</div>
					<br><br>
					<div class="pull-right">
						<form action="siswa/proses_hapus_siswa.php" method="POST">
							<input type="hidden" name="nis" id="del_nis" value="">
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

 	function hapusSiswa(obj){
 		var nis = $(obj).attr('title');
 		$('#hapusModal').modal('show');
 		$('#del_nis').val(nis);
 	}

 	function editSiswa(obj){
 		$('#editModal').modal('show');
 		var nis = $(obj).attr('title');
 		$.ajax({
 			url : '<?php echo "http://localhost/template-file/admin/siswa/data-siswa.php?nis=" ?>'+nis,
 			type : 'GET',
 			data : function(data){
 				return JSON.stringfy(data);
 			},
 			success: function(data){
 				console.log(data);
 				var json = JSON.parse(data);
 				$('#e_nis').html('<i class="icon-note"></i> Edit data siswa dengan nis : '+nis);
 				
 				$('#v_nis').val(json.nis);
 				$('#v_nama').val(json.nama);
 				$('#v_alamat').val(json.alamat);
 				$('#v_kelas').val(json.kelas);
 				$('#v_jk').val(json.jk);
 				$('#v_foto').val(json.foto);

 			},
 			error: function(data){
 				console.log(data);
 			}
 		});
 	}

	$('#search-field').on('keyup', function(){
	    var value = $(this).val().toLowerCase();
	    $(".table-content tr").each(function(index){
	        if (!index) return;
	        $(this).find("td").each(function () {
	            var id = $(this).text().toLowerCase().trim();
	            var not_found = (id.indexOf(value) == -1);
	            $(this).closest('tr').toggle(!not_found);
	            return not_found;
	        });
	    });
	});


 </script>
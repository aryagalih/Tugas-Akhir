<?php 
  require_once('partials/header.php');
  require_once('config.php');
 ?>


<?php 	
	$query_kelas = mysqli_query($conn, "SELECT * FROM tb_guru"); 
?>

 <div class="clearfix"></div>
    <div class="content-wrapper">
        <div class="container-fluid"><br>
        	<div class="card">
        		<div class="card-body">
        			<div class="row">
        				<div class="col-md-3">
        					<h2><i class="zmdi zmdi-account-calendar"></i> Data Guru</h2>
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
			    					<strong>Berhasil !</strong> Data Guru Berhasil Diperbarui !!
			    				</div>";
		    					break;
		    				case 'gagal':
			    				echo "<div class='alert alert-danger' role='alert'>
					    				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			    					<strong>Gagal !</strong> ".$_GET['reason']."
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
                                    <a href="javascript:void();" data-target="#guru" data-toggle="pill" class="nav-link active"><i class="icon-user"></i> <span class="hidden-xs">Guru</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void();" data-target="#tambah" data-toggle="pill" class="nav-link"><i class="zmdi zmdi-account-add"></i> <span class="hidden-xs">Tambah</span></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="guru">
                                    <div class="card-body">
						              	<div class="table-responsive">
						               		<table class="table table-content" id="tables">
						                  		<thead align="center">
							                    	<tr>
							                      		<th style="width: 5px;">No</th>
							                      		<th>Profile</th>
							                      		<th>NIP</th>
							                      		<th>Nama</th>
							                      		<th>JK</th>
							                      		<th>Alamat</th>
							                      		<th>No.Telpon</th>
							                      		<th style="width: 15px;">Opsi</th>
							                    	</tr>
							                  	</thead>
						                  		<tbody>
						                  			<?php
														$sql = "SELECT * FROM tb_guru";
														$query= mysqli_query($conn, $sql);	
														$n = 1;
														while($guru = mysqli_fetch_array($query)){
															echo "<tr>";
															echo "<td>".$n++."</td>";
															if($guru ['foto'] == ''){
																echo "<td><img style='witdh: 30px; height: 30px;' src='".$link."/assets/images/fotoguru/user.jpg'/></td>";
															}else{
																echo "<td><img style='witdh: 30px; height: 30px;' src='".$link."/assets/images/fotoguru/".$guru['foto']."'/></td>";
															}
															echo "<td>".$guru['nip']. "</td>";
															echo "<td>".$guru['nama']. "</td>";
															echo "<td>".$guru['jk']. "</td>";
															echo "<td>".$guru['alamat']. "</td>";
															echo "<td>".$guru['no_telpon']. "</td>";
															echo "<td>
																	<a href='#' class='btn btn-primary' title='".$guru['nip']."' onclick='editGuru(this)'><i class='icon-note'></i></a>
																	<a href='#' class='btn btn-warning text-white' title='".$guru['nip']."' onclick='hapusGuru(this)'><i class='icon-trash'></i></a>
																</td>";
														 	echo "</tr>";
														 }
													?>
						                  		</tbody>
						               		</table>
						              	</div>
						            </div>
                                </div>
                                <div class="tab-pane" id="tambah">
                                    <div class="card-body">
                                    	<h3 class="text-center">Tambah Guru</h3><br>
                                    	<form action="guru/proses_tambah_guru.php" method="POST" enctype="multipart/form-data">
	                                        <div class="image-upload" style="padding-left: 45%; padding-bottom: 20px;">
											    <label for="file-input">
											        <img src="../assets/images/fotosiswa/user.jpg" style="width: 80px; cursor: pointer; border-radius: 50%;"/> <br>
											        Foto Profile
											    </label>
											    <input name="foto" id="file-input" type="file" style="display: none;"/>
											</div>
                                    		<div class="form-group row">
                                            	<label for="nip" class="col-lg-2 col-form-label form-control-label">NIP</label>
	                                            <div class="col-lg-10">
	                                                <input name="nip" class="form-control" type="text" required>
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
	                                                <input name="alamat" class="form-control" type="textarea" required>
	                                            </div>
	                                        </div>
	                                        <div class="form-group row">
                                            	<label for="no_telpon" class="col-lg-2 col-form-label form-control-label">No.Telpon </label>
	                                            <div class="col-lg-10">
	                                                <input name="no_telpon" class="form-control" type="text" required>
	                                            </div>
	                                        </div>
	                                        <div class="form-group row">
                                            	<label for="jk" class="col-lg-2 col-form-label form-control-label">Jenis Kelamin </label>
	                                            <div class="col-lg-10">
	                                                <select name="jk" required class="form-control">
	                                                	<option value="" disabled="" selected="">--Pilih Jenis Kelamin--</option>
	                                                	<option>Laki-Laki</option>
	                                                	<option>Perempuan</option>
	                                                </select>
	                                            </div>
	                                        </div>
	                                        <div class="form-group row">
                                            	<label class="col-lg-2 col-form-label form-control-label"></label>
	                                            <div class="col-lg-10">
	                                                <input type="reset" class="btn btn-dark" value="Reset">
	                                                <input type="submit" class="btn btn-primary" value="Tambah" name="tambah_guru">
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
	        <h5 class="modal-title" id="e_nip"></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	        <form action="guru/proses_edit_guru.php" method="POST" enctype="multipart/form-data">
		        <div class="modal-body">
		        	<div class="image-upload" style="padding-left: 45%; padding-bottom: 20px;">
					    <label for="file-input">
					        <img src="../assets/images/fotoguru/user.jpg" style="width: 80px; cursor: pointer; border-radius: 50%" />
					    </label>
					    <input name="foto" id="v_foto" type="file" style="display: none" />
					</div>
		        	<div class="form-group row">
	                	<label for="nip" class="col-lg-2 col-form-label form-control-label">NIP</label>
	                    <div class="col-lg-10">
	                        <input name="nip" id="v_nip" class="form-control" type="text" readonly="">
	                    </div>
	                </div>
	                <div class="form-group row">
	                	<label for="nip" class="col-lg-2 col-form-label form-control-label">Nama</label>
	                    <div class="col-lg-10">
	                        <input name="nama" id="v_nama" class="form-control" type="text" required>
	                    </div>
	                </div>
	                <div class="form-group row">
                    	<label for="jk" class="col-lg-2 col-form-label form-control-label">Jenis Kelamin </label>
                        <div class="col-lg-10">
                            <select name="jk" id="v_jk" required class="form-control">
                            	<option value="" disabled="" selected="">--Pilih Jenis Kelamin--</option>
                            	<option>Laki-Laki</option>
                            	<option>Perempuan</option>
                            </select>
                        </div>
                    </div>	
	                <div class="form-group row">
	                	<label for="alamat" class="col-lg-2 col-form-label form-control-label">Alamat</label>
	                    <div class="col-lg-10">
	                        <input name="alamat" id="v_alamat" class="form-control" type="text" required>
	                    </div>
	                </div>
	                <div class="form-group row">
						<label for="nip" class="col-lg-2 col-form-label form-control-label">No.Tlpn</label>
	                    <div class="col-lg-10">
	                        <input name="no_telpon" id="v_tlpn" class="form-control" type="text" required>
	                    </div>
	                </div>
		      	</div>
		     	 <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
			</form>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="hapusModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">HAPUS DATA GURU</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
				</div>
				<div class="modal-body">
					<div class="text-center">YAKIN MENGHAPUS DATA  GURU ?</div>
					<br><br>
					<div class="pull-right">
						<form action="guru/proses_hapus_guru.php" method="POST">
							<input type="hidden" name="nip" id="del_nip" value="">
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

 	function hapusGuru(obj){
 		var nip = $(obj).attr('title');
 		$('#hapusModal').modal('show');
 		$('#del_nip').val(nip);
 	}

 	function editGuru(obj){
 		$('#editModal').modal('show');
 		var nip = $(obj).attr('title');
 		$.ajax({
 			url : '<?php echo "http://localhost/template-file/admin/guru/data-guru.php?nip=" ?>'+nip,
 			type : 'GET',
 			data : function(data){
 				return JSON.stringfy(data);
 			},
 			success: function(data){
 				var json = JSON.parse(data);
 				$('#e_nip').html('<i class="icon-note"></i> Edit data guru dengan nip : '+nip);
 				
 				$('#v_nip').val(json.nip);
 				$('#v_nama').val(json.nama);
 				$('#v_jk').val(json.jk);
 				$('#v_alamat').val(json.alamat);
 				$('#v_tlpn').val(json.no_telpon);
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
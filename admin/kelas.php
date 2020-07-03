<?php 
	require_once('partials/header.php');
 ?>
 <div class="clearfix"></div>
    <div class="content-wrapper">
        <div class="container-fluid"><br>
        	<div class="card">
        		<div class="card-body">
        			<div class="row">
        				<div class="col-md-3">
        					<h2><i class="zmdi zmdi-home"></i> Data Kelas</h2>
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
			    				echo "<div class='alert alert-primary role='alert'>
			    					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			    					<strong>Berhasil !</strong> Data Kelas Berhasil Diperbarui !!
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
                                    <a href="javascript:void();" data-target="#kelas1" data-toggle="pill" class="nav-link active"><i class="icon-user"></i> <span class="hidden-xs">Kelas 1</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void();" data-target="#kelas2" data-toggle="pill" class="nav-link"><i class="icon-user"></i> <span class="hidden-xs">Kelas 2</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void();" data-target="#kelas3" data-toggle="pill" class="nav-link"><i class="icon-user"></i> <span class="hidden-xs">Kelas 3</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void();" data-target="#tambah" data-toggle="pill" class="nav-link"><i class="icon-plus"></i> <span class="hidden-xs">Tambah</span></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="kelas1">
                                    <div class="card-body">
						              	<div class="table-responsive">
						               		<table class="table text-center table-content">
						                  		<thead>
						                    		<tr>
						                      			<th style="width: 5px;">No</th>
						                      			<th>Nama Kelas</th>
						                      			<th>Action</th>
						                    		</tr>
						                  		</thead>
						                  		<tbody>
						                  			<?php	
						                  				$sql = "SELECT * FROM tb_kelas where status='0' ";
														$query= mysqli_query($conn, $sql);	
														$n = 1;
														while($kelas = mysqli_fetch_array($query)){
															echo "<tr>";
															echo "<td>".$n++."</td>";
															echo "<td>".$kelas['nama']. "</td>";
															echo "<td>
																	<a href='#' class='btn btn-primary' title='".$kelas['id_kelas']."' onclick='editKelas(this)'><i class='icon-note'></i></a>
																	<a href='#' class='btn btn-warning text-white' title='".$kelas['id_kelas']."' onclick='hapusKelas(this)'><i class='icon-trash'></i></a>
																</td>";
															echo "</tr>";
														}
													?>
						                  		</tbody>
						               		</table>
						              	</div>
						            </div>
                                </div>
                                <div class="tab-pane" id="kelas2">
                                    <div class="card-body">
						              	<div class="table-responsive">
						               		<table class="table text-center table-content">
						                  		<thead>	
						                    		<tr>
						                      			<th style="width: 5px;">No</th>
						                      			<th>Nama Kelas</th>
						                      			<th>Action</th>
						                    		</tr>
						                  		</thead>
						                  		<tbody>
						                  			<?php	
						                  				$sql = "SELECT * FROM tb_kelas where status= 1";
														$query= mysqli_query($conn, $sql);	
														$n = 1;
														while($kelas = mysqli_fetch_array($query)){
															echo "<tr>";	
															echo "<td>".$n++."</td>";
															echo "<td>".$kelas['nama']. "</td>";
															echo "<td>
																	<a href='#' class='btn btn-primary' title='".$kelas['id_kelas']."' onclick='editKelas(this)'><i class='icon-note'></i></a>
																	<a href='#' class='btn btn-warning text-white' title='".$kelas['id_kelas']."' onclick='hapusKelas(this)'><i class='icon-trash'></i></a>
																</td>";
															echo "</tr>";
														}
													?>
						                  		</tbody>
						               		</table>
						              	</div>
						            </div>
                                </div>
                                <div class="tab-pane" id="kelas3">
                                    <div class="card-body">
						              	<div class="table-responsive">
						               		<table class="table text-center table-content">
						                  		<thead>
						                    		<tr>
						                      			<th style="width: 5px;">No</th>
						                      			<th>Nama Kelas</th>
						                      			<th>Action</th>
						                    		</tr>
						                  		</thead>
						                  		<tbody>
						                  			<?php	
						                  				$sql = "SELECT * FROM tb_kelas where status=2";
														$query= mysqli_query($conn, $sql);	
														$n = 1;
														while($kelas = mysqli_fetch_array($query)){
															echo "<tr>";
															echo "<td>".$n++."</td>";
															echo "<td>".$kelas['nama']. "</td>";
															echo "<td>
																	<a href='#' class='btn btn-primary' title='".$kelas['id_kelas']."' onclick='editKelas(this)'><i class='icon-note'></i></a>
																	<a href='#' class='btn btn-warning text-white' title='".$kelas['id_kelas']."' onclick='hapusKelas(this)'><i class='icon-trash'></i></a>
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
                                    	<h3 class="text-center">Tambah Kelas</h3>
                                    	<form action="kelas/proses_tambah_kelas.php" method="POST">
                                    		<div class="form-group row">
                                            	<label class="col-lg-2 col-form-label form-control-label">Nama Kelas</label>
	                                            <div class="col-lg-10">
	                                                <input name="nama" class="form-control" type="text" required>
	                                            </div>
	                                        </div>
	                                        <div class="form-group row">
                                            	<label class="col-lg-2 col-form-label form-control-label">Status</label>
	                                            <div class="col-lg-10">
	                                               <select name="status" class="form-control">
	                                                	<option value="" disabled="" selected="">Pilih Status Kelas</option>
	                                                	<option value="0">Kelas 1</option>
	                                                	<option value="1">Kelas 2</option>
	                                                	<option value="2">Kelas 3</option>
	                                                </select>
	                                            </div>
	                                        </div>
	                                        <div class="form-group row">
                                            	<label class="col-lg-2 col-form-label form-control-label"></label>
	                                            <div class="col-lg-10">
	                                                <input type="reset" class="btn btn-success" value="Reset">
	                                                <input type="submit" name="tambah_kelas" class="btn btn-primary" value="Tambah" >
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
	
	<!-- tambah kelas -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="e_id_kelas"></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	        <form action="Kelas/proses_edit_kelas.php" method="POST">
		        <div class="modal-body">
		        	<div class="form-group row">
	                	<label for="id_kelas" class="col-lg-2 col-form-label form-control-label">Id Kelas</label>
	                    <div class="col-lg-10">
	                        <input name="id_kelas" id="v_id_kelas" class="form-control" type="text" readonly="">
	                    </div>
	                </div>
	                <div class="form-group row">
	                	<label class="col-lg-2 col-form-label form-control-label">Nama Kelas</label>
	                    <div class="col-lg-10">
	                        <input name="nama" id="v_nama" class="form-control" type="text" required>
	                    </div>
	                </div>
                    <div class="form-group row">
	                	<label class="col-lg-2 col-form-label form-control-label">Status</label>
	                    <div class="col-lg-10">
	                       <select name="status" id="v_status" class="form-control">
	                        	<option value="" disabled="" selected="">Pilih Status Kelas</option>
	                        	<option value="0">Kelas 1</option>
	                        	<option value="1">Kelas 2</option>
	                        	<option value="2">Kelas 3</option>
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
					<h4 class="modal-title">HAPUS DATA KELAS</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
				</div>
				<div class="modal-body">
					<div class="text-center">YAKIN MENGHAPUS DATA KELAS ?</div>
					<br><br>
					<div class="pull-right">
						<form action="kelas/proses_hapus_kelas.php" method="POST">
							<input type="hidden" name="id_kelas" id="del_id_kelas" value="">
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

 	function hapusKelas(obj){
 		var nis = $(obj).attr('title');
 		$('#hapusModal').modal('show');
 		$('#del_id_kelas').val(nis);
 	}

 	function editKelas(obj){
 		$('#editModal').modal('show');
 		var id_kelas = $(obj).attr('title');
 		$.ajax({
 			url : '<?php echo "http://localhost/template-file/admin/kelas/data-kelas.php?id_kelas=" ?>'+id_kelas,
 			type : 'GET',
 			data : function(data){
 				return JSON.stringfy(data);
 			},
 			success: function(data){
 				console.log(data);
 				var json = JSON.parse(data);
 				$('#e_id_kelas').html('<i class="icon-note"></i> Edit data  Kelas dengan Id kelas : '+id_kelas);
 				
 				$('#v_id_kelas').val(json.id_kelas);
 				$('#v_nama').val(json.nama);
 				$('#v_status').val(json.status);

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
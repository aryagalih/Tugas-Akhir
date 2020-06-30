<?php 
	require_once('partials/header.php');
 ?>
 <?php 	
	$query_kelas = mysqli_query($conn, "SELECT * FROM tb_detail_penilaian"); 
?>
<section>
	<div class="clearfix"></div>
	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="card" style="margin-top: 22px;">
				<div class="card-body">
					<div class="row">
						<div class="col">
							<h2><i class="icon-note"></i> Edit Nilai Siswa</h2>
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
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table">
							<thead align="center">
								<tr>
									<th style="width: 50px;">no</th>
									<th>Nama</th>
									<th style="width: 50px;">Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$matpel = $_GET['bab'];
									$sql = "SELECT * from tb_detail_penilaian join tb_penilaian on tb_penilaian.id_nilai=tb_detail_penilaian.id_nilai join 
											tb_siswa on tb_detail_penilaian.nis = tb_siswa.nis 
											where tb_penilaian.id_nilai=$matpel";
									$query= mysqli_query($conn, $sql);	
									$n = 1;
									while($nilai = mysqli_fetch_array($query)){
										echo "<tr>";
											echo "<td>".$n++."</td>";
											echo "<td>".$nilai['nama']. "</td>";
											echo "<td>
													<a href='#' class='btn btn-primary' title='".$nilai['nis']."' onclick='editSiswa(this)'><i class='icon-note'></i></a>
													<a href='#' class='btn btn-warning text-white' title='".$nilai['id']."' onclick='hapus(this)'><i class='icon-trash'></i></a>
												</td>";	
									 	echo "</tr>";
									 }
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- modal -->
    <div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Nilai</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>	
        <form action="kelola-nilai/edit-nilai.php" method="POST">
        	<div class="modal-body text-center">
        		<span id="e_nis"></span>
        		<br/><br/>
        		<input type="hidden" value="<?= $_GET['id_matpel']; ?>" name="id_matpel">
        		<input type="hidden" id="v_id_nilai" name="id_nilai">
        		<input type="hidden" id="v_nis" name="nis">
        		<input type="hidden" id="v_nis" name="nis">
        		<input type="hidden" id="v_id" name="id">
        		<div class="form-group row">
        			<div class="col-md-4">
        				<label>Nilai Pengetahuan :</label>
        			</div>
        			<div class="col-md-8">
        				<input type="text" id="v_pengetahuan" name="pengetahuan" class="form-control text-center" placeholder="0" style="width: 75px;">
        			</div>
        		</div>
        		<div class="form-group row">
        			<div class="col-md-4 ">
        				<label>Nilai Keterampilan :</label>
        			</div>
        			<div class="col-md-8">
        				<input type="text" id="v_keterampilan" name="keterampilan" class="form-control text-center" placeholder="0" style="width: 75px;">
        			</div>
        		</div>
        		<div class="form-group row">
        			<div class="col-md-4">
        				<label>Nilai Sikap :</label>
        			</div>
        			<div class="col-md-8">
        				<input type="text" id="v_sikap" name="sikap" class="form-control text-center" placeholder="0" style="width: 75px;">
        			</div>
        		</div>
        	</div>
        	<div class="modal-footer">
        	  <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        	  <button type="submit" class="btn btn-primary">Simpan</button>
        	</div>
        </form>
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
						<form action="kelola-nilai/hapus-nilai.php" method="POST">
							<input type="hidden" name="id" id="del_id" value="">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Batalkan</button>
							<button type="submit" class="btn btn-warning text-white">Hapus</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
 <?php 
 	require_once('partials/footer.php');
  ?>
  <script>
  	function editSiswa(obj){
 		$('#editModal').modal('show');
 		var nis = $(obj).attr('title');
 		$.ajax({
 			url : '<?php echo "http://localhost/template-file/app/guru/data-nilai.php?nis=" ?>'+nis+'&id_nilai=<?= $matpel; ?>',
 			type : 'GET',
 			data : function(data){
 				return JSON.stringfy(data);
 			},
 			success: function(data){
 				//console.log(data);
 				var json = JSON.parse(data);
 				$('#e_nis').html('<i class="icon-note"></i> Edit data siswa dengan nis : '+nis);	
 				$('#v_id').val(json.id);
 				$('#v_id_nilai').val(json.id_nilai);
 				$('#v_nis').val(json.nis);
 				$('#v_pengetahuan').val(json.nilai_pengetahuan);
 				$('#v_keterampilan').val(json.nilai_keterampilan);
 				$('#v_sikap').val(json.nilai_sikap);
 			},
 			error: function(data){
 				//console.log(data);
 			}
 		});
 	}

 	function hapus(obj){
 		var id = $(obj).attr('title');
 		$('#hapusModal').modal('show');
 		$('#del_id').val(id);
 	}
  </script>
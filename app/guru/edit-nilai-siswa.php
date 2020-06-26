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
        <div class="modal-body text-center">
        	<div class="form-group row">
        		<div class="col-md-4">
        			<label>Nilai Pengetahuan :</label>
        		</div>
        		<div class="col-md-8">
        			<input type="text" id="v_pengetahuan" class="form-control text-center" placeholder="0" style="width: 75px;">
        		</div>
        	</div>
        	<div class="form-group row">
        		<div class="col-md-4 ">
        			<label>Nilai Keterampilan :</label>
        		</div>
        		<div class="col-md-8">
        			<input type="text" id="v_kompetensi" class="form-control text-center" placeholder="0" style="width: 75px;">
        		</div>
        	</div>
        	<div class="form-group row">
        		<div class="col-md-4">
        			<label>Nilai Sikap :</label>
        		</div>
        		<div class="col-md-8">
        			<input type="text" id="v_sikap" class="form-control text-center" placeholder="0" style="width: 75px;">
        		</div>
        	</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
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
 			url : '<?php echo "http://localhost/template-file/admin/siswa/data-siswa.php?nis=" ?>'+nis,
 			type : 'GET',
 			data : function(data){
 				return JSON.stringfy(data);
 			},
 			success: function(data){
 				console.log(data);
 				var json = JSON.parse(data);
 				$('#e_nis').html('<i class="icon-note"></i> Edit data siswa dengan nis : '+nis);	
 				$('#v_pengetahuan').val(json.nilai_pengetahuan);
 				$('#v_keterampilan').val(json.nilai_keterampilan);
 				$('#v_sikap').val(json.nilai_sikap);

 			},
 			error: function(data){
 				console.log(data);
 			}
 		});
 	}
  </script>
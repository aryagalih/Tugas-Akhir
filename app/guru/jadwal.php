<?php 
	require_once('partials/header.php');
?>
<?php 	
	$query_kelas = mysqli_query($conn, "SELECT * FROM tb_kelas");
	$query_matpel = mysqli_query($conn, "SELECT * FROM tb_matpel");
?>
<section>
	<div class="clearfix"></div>	
    <div class="content-wrapper">
      	<div class="container-fluid">
      		<div class="card" style="margin-top: 22px;">
      			<div class="card-body">
      				<h2><i class="icon-note"></i> Jadwal Mengajar</h2>
      				<div class="dropdown-divider"></div>
      			</div>
      		</div>
     		<div class="card">
        		<div class="card-body">
        			<ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                    	<li class="nav-item">
                        	<a href="javascript:void();" data-target="#senin" data-toggle="pill" class="nav-link active"><i class="icon-user"></i> <span class="hidden-xs">Senin</span></a>
                    	</li>
                    	<li class="nav-item">
                        	<a href="javascript:void();" data-target="#selasa" data-toggle="pill" class="nav-link"><i class="icon-user"></i> <span class="hidden-xs">Selasa</span></a>
                    	</li>
                    	<li class="nav-item">
                        	<a href="javascript:void();" data-target="#rabu" data-toggle="pill" class="nav-link"><i class="icon-user"></i> <span class="hidden-xs">Rabu</span></a>
                    	</li>
                    	<li class="nav-item">
                        	<a href="javascript:void();" data-target="#kamis" data-toggle="pill" class="nav-link"><i class="icon-user"></i> <span class="hidden-xs">Kamis</span></a>           
                    	</li>
                    	<li class="nav-item">
                        	<a href="javascript:void();" data-target="#jumat" data-toggle="pill" class="nav-link"><i class="icon-user"></i> <span class="hidden-xs">Jum'at</span></a>
                    	</li>
                	</ul>
                	<div class="tab-content">
                    	<div class="tab-pane active" id="senin">
                          	<div class="table-responsive">
		            			<table class="table">
		              				<thead align="center">
		                				<tr> 
		                  					<th>JAM PELAJARAN</th>
		                  					<th>MATA PELAJARAN</th>
					                      	<th>KELAS</th>
					                    </tr>
					                </thead>
					                <tbody>
					                  	<?php
											// $guru = $_GET['nip']; 
											$sql = "SELECT tb_jadwal.*, tb_guru.nama , tb_matpel.nama_matpel, tb_kelas.nama FROM `tb_jadwal` JOIN tb_guru ON tb_jadwal.nip = tb_guru.nip JOIN tb_matpel ON tb_matpel.id_matpel = tb_jadwal.id_matpel JOIN tb_kelas ON tb_kelas.id_kelas = tb_jadwal.id_kelas where tb_jadwal.nip='981273' and hari='1' 
											order by jam_pelajaran ASC";
											$query= mysqli_query($conn, $sql);
											while($jadwalGuru = mysqli_fetch_array($query)){
												echo "<tr>";
													echo "<td>".$jadwalGuru['jam_pelajaran']."</td>";
													echo "<td>".$jadwalGuru['nama_matpel']."</td>";
													echo "<td>".$jadwalGuru['nama']."</td>";
											 	echo "</tr>";
											}
										 ?>
					                 </tbody>
					            </table>
					        </div>
					    </div>
					    <div class="tab-pane" id="selasa">
					    	<div class="table-responsive">
		            			<table class="table">
		              				<thead align="center">
		                				<tr>
		                  					<th>JAM PELAJARAN</th>
		                  					<th>MATA PELAJARAN</th>
					                      	<th>KELAS</th>
					                    </tr>
					                </thead>
					                <tbody>
					                  <?php
											// $guru = $_GET['nip']; 
											$sql = "SELECT tb_jadwal.*, tb_guru.nama , tb_matpel.nama_matpel, tb_kelas.nama FROM `tb_jadwal` JOIN tb_guru ON tb_jadwal.nip = tb_guru.nip JOIN tb_matpel ON tb_matpel.id_matpel = tb_jadwal.id_matpel JOIN tb_kelas ON tb_kelas.id_kelas = tb_jadwal.id_kelas where tb_jadwal.nip='981273' and hari='2' 
											order by jam_pelajaran ASC";
											$query= mysqli_query($conn, $sql);
											while($jadwalGuru = mysqli_fetch_array($query)){
												echo "<tr>";
													echo "<td>".$jadwalGuru['jam_pelajaran']."</td>";
													echo "<td>".$jadwalGuru['nama_matpel']."</td>";
													echo "<td>".$jadwalGuru['nama']."</td>";
											 	echo "</tr>";
											}
										 ?>
					                 </tbody>
					            </table>
					        </div>
					    </div>
					    <div class="tab-pane" id="rabu">
					    	<div class="table-responsive">
		            			<table class="table">
		              				<thead align="center">
		                				<tr>
		                  					<th>JAM PELAJARAN</th>
		                  					<th>MATA PELAJARAN</th>
					                      	<th>KELAS</th>
					                    </tr>
					                </thead>
					                <tbody>
					                    <?php
											// $guru = $_GET['nip']; 
											$sql = "SELECT tb_jadwal.*, tb_guru.nama , tb_matpel.nama_matpel, tb_kelas.nama FROM `tb_jadwal` JOIN tb_guru ON tb_jadwal.nip = tb_guru.nip JOIN tb_matpel ON tb_matpel.id_matpel = tb_jadwal.id_matpel JOIN tb_kelas ON tb_kelas.id_kelas = tb_jadwal.id_kelas where tb_jadwal.nip='981273' and hari='3' 
											order by jam_pelajaran ASC";
											$query= mysqli_query($conn, $sql);
											while($jadwalGuru = mysqli_fetch_array($query)){
												echo "<tr>";
													echo "<td>".$jadwalGuru['jam_pelajaran']."</td>";
													echo "<td>".$jadwalGuru['nama_matpel']."</td>";
													echo "<td>".$jadwalGuru['nama']."</td>";
											 	echo "</tr>";
											}
										 ?>
					                 </tbody>
					            </table>
					        </div>
					    </div>
					    <div class="tab-pane" id="kamis">
					    	<div class="table-responsive">
		            			<table class="table">
		              				<thead align="center">
		                				<tr>
		                  					<th>JAM PELAJARAN</th>
		                  					<th>MATA PELAJARAN</th>
					                      	<th>KELAS</th>
					                    </tr>
					                </thead>
					                <tbody>
					                    <?php
											// $guru = $_GET['nip']; 
											$sql = "SELECT tb_jadwal.*, tb_guru.nama , tb_matpel.nama_matpel, tb_kelas.nama FROM `tb_jadwal` JOIN tb_guru ON tb_jadwal.nip = tb_guru.nip JOIN tb_matpel ON tb_matpel.id_matpel = tb_jadwal.id_matpel JOIN tb_kelas ON tb_kelas.id_kelas = tb_jadwal.id_kelas where tb_jadwal.nip='981273' and hari='4' 
											order by jam_pelajaran ASC";
											$query= mysqli_query($conn, $sql);
											while($jadwalGuru = mysqli_fetch_array($query)){
												echo "<tr>";
													echo "<td>".$jadwalGuru['jam_pelajaran']."</td>";
													echo "<td>".$jadwalGuru['nama_matpel']."</td>";
													echo "<td>".$jadwalGuru['nama']."</td>";
											 	echo "</tr>";
											}
										 ?>
					                 </tbody>
					            </table>
					        </div>
					    </div>
					    <div class="tab-pane" id="jumat">
					    	<div class="table-responsive">
		            			<table class="table">
		              				<thead align="center">
		                				<tr>
		                  					<th>JAM PELAJARAN</th>
		                  					<th>MATA PELAJARAN</th>
					                      	<th>KELAS</th>
					                    </tr>
					                </thead>
					                <tbody>
					                    <?php
											// $guru = $_GET['nip']; 
											$sql = "SELECT tb_jadwal.*, tb_guru.nama , tb_matpel.nama_matpel, tb_kelas.nama FROM `tb_jadwal` JOIN tb_guru ON tb_jadwal.nip = tb_guru.nip JOIN tb_matpel ON tb_matpel.id_matpel = tb_jadwal.id_matpel JOIN tb_kelas ON tb_kelas.id_kelas = tb_jadwal.id_kelas where tb_jadwal.nip='981273' and hari='5' 
											order by jam_pelajaran ASC";
											$query= mysqli_query($conn, $sql);
											while($jadwalGuru = mysqli_fetch_array($query)){
												echo "<tr>";
													echo "<td>".$jadwalGuru['jam_pelajaran']."</td>";
													echo "<td>".$jadwalGuru['nama_matpel']."</td>";
													echo "<td>".$jadwalGuru['nama']."</td>";
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
	    </div>
	</div>
</section>
<?php 
	require_once('partials/footer.php');
?>
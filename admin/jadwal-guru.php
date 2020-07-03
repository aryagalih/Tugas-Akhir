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
	            <h2><i class="zmdi zmdi-assignment"></i> Kelola Jadwal guru</h2>
	            <div class="dropdown-divider"></div>
	          </div>
	        </div>
            <div class="row">
				<div class="col">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link"><i class="zmdi zmdi-assignment"></i> Jadwal Guru</a>
                                    <div class="dropdown-divider"></div>
                                </li>
                            </ul>
                            <div class="tab-content">
                                    <div class="card-body">
						              	<div class="table-responsive">
						               		<table class="table">
						                  		<thead align="center">
							                    	<tr>
							                      		<th style="width: 5px;">No</th>
							                      		<th>NIP</th>
							                      		<th>Nama</th>
							                      		<th style="width: 15px;">Action</th>
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
															echo "<td>".$guru['nip']. "</td>";
															echo "<td>".$guru['nama']. "</td>";
															echo "<td>
																	<a href='edit_jadwal_guru.php?nip=".$guru['nip']."' name='pilih' class='btn btn-primary' title='".$guru['nip']."' onclick='editJadwalGuru(this)'><i class='icon-note'></i></a>
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
                    </div>
                </div>
            </div>
        </div>
 
<?php 
  require_once('partials/footer.php');
 ?>

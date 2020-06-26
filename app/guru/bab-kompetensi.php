<?php 
	require_once('partials/header.php');
 ?>
 <?php 	
	$query_kelas = mysqli_query($conn, "SELECT * FROM tb_kelas");
	$query_matpel = mysqli_query($conn, "SELECT * FROM tb_matpel");
	$query_matpel = mysqli_query($conn, "SELECT * FROM tb_penilaian");

?>
<section>
	<div class="clearfix"></div>
	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="card" style="margin-top: 22px;">
				<div class="card-body">
					<div class="row">
						<div class="col">
							<h2><i class="icon-note"></i> Edit Nilai</h2>
						</div>
					</div>
					<div class="dropdown-divider"></div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<h3>Pilih Bab Kompetensi</h3>
					<div class="dropdown-divider"></div><br>
					<div class="table-responsive">
						<table class="table">
							<thead align="center">
								<tr>
									<th style="width: 50px;">no</th>
									<th>Bab Kompetensi</th>
									<th style="width: 50px;">Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$matpel = $_GET['id_matpel'];
                                    $sql = "SELECT * FROM tb_penilaian where (id_matpel='$matpel')";
                                    $query= mysqli_query($conn, $sql);
                                    $n = 1;  
                                    while($matpel = mysqli_fetch_array($query)){
                                        echo "<tr>";
                                        echo "<td>".$n++."</td>";
                                        echo "<td>".$matpel['bab_kompetensi']. "</td>";
                                        echo "<td>
                                                <a href='edit-nilai-siswa.php?id_matpel=".$_GET['id_matpel']."&bab=".$matpel['id_nilai']."' class='btn btn-primary'><i class='icon-note'></i></a>
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
</section>
 <?php 
 	require_once('partials/footer.php');
  ?>
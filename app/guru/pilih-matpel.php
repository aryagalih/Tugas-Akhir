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
					<div class="row">
        				<div class="col">
          					<h2><i class="icon-note"></i> Edit Nilai kelas <?= $_GET['id_kelas']; ?></h2>
        				</div>
      				</div>
      				<div class="dropdown-divider"></div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<h3>Pilih Mata Pelajaran</h3>
					<div class="dropdown-divider"></div><br>
					<div class="table-responsive">
	               		<table class="table table-content">
	                  		<thead align="center">
	                    		<tr>
                                    <th style=" width: 50px;"> No </th>
	                      			<th>Mata Pelajaran</th>
	                      			<th style="width: 50px;">Action</th>
	                    		</tr>
	                  		</thead>
	                  		<tbody>
	                  			<?php 
	                  				$id_kelas = $_GET['id_kelas'];
                                    $sql = "SELECT tb_penilaian.*, tb_matpel.nama_matpel  FROM `tb_penilaian` JOIN tb_matpel ON tb_matpel.id_matpel = tb_penilaian.id_matpel where tb_penilaian.id_kelas='".$id_kelas."' group by tb_matpel.id_matpel";
                                    $query= mysqli_query($conn, $sql);
                                    $n = 1;  
                                    while($matpel = mysqli_fetch_array($query)){
                                        echo "<tr>";
                                        echo "<td>".$n++."</td>";
                                        echo "<td>".$matpel['nama_matpel']. "</td>";
                                        echo "<td>
                                                <a href='bab-kompetensi.php?id_matpel=".$matpel['id_matpel']."' class='btn btn-primary'><i class='icon-note'></i></a>
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
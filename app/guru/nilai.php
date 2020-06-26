<?php 
	require_once('partials/header.php');
 ?>
  <?php
  $query_kelas = mysqli_query($conn, "SELECT * FROM tb_kelas"); 
    $v_kelas="";
    if (isset($_POST['search'])) {
        $v_kelas = $_POST['v_kelas'];
    } 
 ?>
 <section>
	<div class="clearfix"></div>
		<div class="content-wrapper">
		<div class="container-fluid">
    		<div class="card" style="margin-top: 22px;">
      			<div class="card-body">
          			<div class="row">
            			<div class="col">
              				<h2><i class="zmdi zmdi-grid"></i> Kelola Nilai</h2>
            			</div>
          			</div>
          			<div class="dropdown-divider"></div>
	              	<?php 
	                	switch ((isset($_GET['system_message']) ? $_GET['system_message'] : '')) {
	                  	case 'sukses':
	                	echo "<div class='alert alert-primary role='alert'>
	                  			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
	                  			<strong>Berhasil !</strong> Data Nilai Berhasil Diperbarui, klik tombol Mata untuk melihat hasil !!
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
                        	</ul>
                        	<div class="tab-content">
                            	<div class="tab-pane active" id="kelas1">
                                	<div class="card-body">
                                  		<div class="table-responsive">
                                    		<table class="table text-center">
                                        		<thead>
                                          			<tr>
                                              			<th style="width: 5px;">No</th>
                                              			<th>Nama Kelas</th>
                                              			<th style="width: 50px;">Opsi</th>
                                          			</tr>
                                        		</thead>
                                        		<tbody>
	                                              	<?php 
	                                                	$sql = "SELECT * FROM tb_kelas where status=0 ";
	                                                	$query= mysqli_query($conn, $sql);  
	                                                	$n = 1;
	                                                	while($kelas = mysqli_fetch_array($query)){
	                                                  		echo "<tr>";
	                                                  		echo "<td>".$n++."</td>";
	                                                  		echo "<td>".$kelas['nama']. "</td>";
	                                                  		echo "<td>
	                                                      		<a href='tambah-nilai.php?id_kelas=".$kelas['id_kelas']."'' class='btn btn-primary' id='search' name='v_kelas' title='Tambah nilai' onclick='editKelas(this)'><i class='zmdi zmdi-collection-plus'></i></a>
	                                                      		<a href='pilih-matpel.php?id_kelas=".$kelas['id_kelas']."' class='btn btn-warning text-white' title='Edit nilai' onclick='hapusKelas(this)'><i class='icon-note'></i></a>
                                                            <a href='#' class='btn btn-primary text-white' title='Lihat Nilai' onclick='hapusKelas(this)'><i class='icon-eye'></i></a>
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
                                  			<table class="table text-center">
	                                          	<thead> 
	                                            	<tr>
	                                                	<th style="width: 5px;">No</th>
	                                                	<th>Nama Kelas</th>
	                                                	<th style="width: 50px;">Opsi</th>
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
	                                                    			<a href='tambah-nilai.php?id_kelas=".$kelas['id_kelas']."'' class='btn btn-primary' id='search' name='v_kelas' title='Tambah nilai' onclick='editKelas(this)'><i class='zmdi zmdi-collection-plus'></i></a>
                                                            <a href='pilih-matpel.php?id_kelas=".$kelas['id_kelas']."'' class='btn btn-warning text-white' title='Edit nilai' onclick='hapusKelas(this)'><i class='icon-note'></i></a>
                                                            <a href='pilih-matpel.php?id_kelas=".$kelas['id_kelas']."''  class='btn btn-primary text-white' title='Lihat Nilai' onclick='hapusKelas(this)'><i class='icon-eye'></i></a>
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
                                      		<table class="table text-center">
                                          		<thead>
                                            		<tr>
                                                		<th style="width: 5px;">No</th>
                                                		<th>Nama Kelas</th>
                                                		<th style="width: 50px;">Opsi</th>
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
                                                    				<a href='tambah-nilai.php?id_kelas=".$kelas['id_kelas']."'' class='btn btn-primary' id='search' name='v_kelas' title='Tambah nilai' onclick='editKelas(this)'><i class='zmdi zmdi-collection-plus'></i></a>
                                                            <a href='pilih-matpel.php' class='btn btn-warning text-white' title='Edit nilai' onclick='hapusKelas(this)'><i class='icon-note'></i></a>
                                                            <a href='pilih-matpel.php?id_kelas=".$kelas['id_kelas']."'' class='btn btn-primary text-white' title='Lihat Nilai' onclick='hapusKelas(this)'><i class='icon-eye'></i></a>      
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
	</div>
</section>
		
<?php 
	require_once('partials/footer.php');
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.data').load("data.php");
        
        $("#search").click(function(){
            var kelas = $("#v_kelas").val();
            $.ajax({
                type: 'POST',
                url: "data.php",
                data: { kelas: kelas },
                success: function(hasil) {           
                    $('.data').html(hasil);
                },
            });
        });
    });
</script>
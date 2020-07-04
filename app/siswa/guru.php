<?php 
  require_once('partials/header.php');
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
					         <input type="text" class="form-control" id="search-field" placeholder="Search" title="masukkan data">
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
                                    <a class="nav-link"><i class="icon-user"></i> Guru</a>
                                    <div class="dropdown-divider"></div>
                                </li>
                            </ul>
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
														echo "<td><img style='witdh: 30px; height: 30px;' src='../../assets/images/fotoguru/user.jpg'/></td>";
													}else{
														echo "<td><img style='witdh: 30px; height: 30px;' src='../../assets/images/fotoguru/".$guru['foto']."'/></td>";
													}
													echo "<td>".$guru['nip']. "</td>";
													echo "<td>".$guru['nama']. "</td>";
													echo "<td>".$guru['jk']. "</td>";
													echo "<td>".$guru['alamat']. "</td>";
													echo "<td>".$guru['no_telpon']. "</td>";
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

 
<?php 
  require_once('partials/footer.php');
 ?>
 
 <script>

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
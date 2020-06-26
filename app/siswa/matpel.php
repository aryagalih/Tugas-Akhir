<?php 
	require_once('partials/header.php');
?>
<section>
	<div class="clearfix"></div>	
	<div class="content-wrapper">
	   	<div class="container-fluid">
	   		<div class="card" style="margin-top: 22px;">
	          <div class="card-body">
	              <div class="row">
	                  <div class="col">
	                      <h2><i class="icon-user"></i> Data Mata Pelajaran</h2>
	                  </div>
	              </div>
	              <div class="dropdown-divider"></div>
	          </div>
	        </div>
	         	<div class="card">
	            	<div class="card-body">
		              	<div class="table-responsive">
		               		<table class="table table-content">
		                  		<thead align="center">
		                    		<tr>
	                                    <th style=" width: 50px;"> No </th>
		                      			<th>Mata Pelajaran</th>
		                    		</tr>
		                  		</thead>
		                  		<tbody>
		                  			<?php 
	                                    $sql = "SELECT * FROM tb_matpel
	                                            order by nama_matpel ASC";
	                                    $query= mysqli_query($conn, $sql);
	                                    $n = 1;  
	                                    while($matpel = mysqli_fetch_array($query)){
	                                        echo "<tr>";
	                                        echo "<td>".$n++."</td>";
	                                        echo "<td>".$matpel['nama_matpel']. "</td>";
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
</section>
<?php 
	require_once('partials/footer.php');
?>
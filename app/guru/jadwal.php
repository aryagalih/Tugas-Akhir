<?php 
	require_once('partials/header.php');
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
					                   <!-- <?php 
					                   		include 'config.php';
							            	$n = 1;
					                   		$sql = "SELECT * FROM tb_jadwal";
					                   		$query = mysqli_query($conn, $sql);
					                   		if($query){
											while($jadwalGuru = mysqli_fetch_array($query)){
											?>
											<tr>
												<td align="center"><?php echo $n++; ?></td>
												<td align="center"><?php echo $jadwalGuru['jam_pelajaran']; ?></td>
												<td><?php echo $jadwalGuru['id_matpel']; ?></td>
												<td><?php echo $jadwalGuru['id_kelas']; ?></td>
											</tr>
											<?php
											}
										}
					                    ?> -->
					                    <tr>
					                    	<td>07.00-07.40</td>
					                    	<td>Bahasa Indonesia</td>
					                    	<td>7B</td>
					                    </tr>
					                     <tr>
					                     	<td>07.40-08.20</td>
					                     	<td>Bahasa Indonesia</td>
					                     	<td>7A</td>
					                    </tr>
					                     <tr>
					                     	<td>08.20-09.00</td>
					                     	<td>Seni budaya</td>
					                     	<td>7B</td>
					                    </tr>
					                    <tr>
					                    	<td colspan="3" align="center">Istirahat</td>
					                    </tr>
					                    <tr>
					                    	<td>07.00-07.40</td>
					                    	<td>Bahasa Indonesia</td>
					                    	<td>7C</td>
					                    </tr>
					                     <tr>
					                     	<td>07.40-08.20</td>
					                     	<td>Bahasa Indonesia</td>
					                     	<td>7C</td>
					                    </tr>
					                     <tr>
					                     	<td>08.20-09.00</td>
					                     	<td>Seni budaya</td>
					                     	<td>7A</td>
					                    </tr>
					                    <tr>
					                    	<td colspan="3" align="center">Istirahat</td>
					                    </tr>
					                    <tr>
					                     	<td>08.20-09.00</td>
					                     	<td>Seni budaya</td>
					                     	<td>7B</td>
					                    </tr>
					                 </tbody>
					            </table>
					        </div>
					    </div>
					    <div class="tab-pane" id="selasa">
					    	<div class="table-responsive">
		            			<table class="table">
		              				<thead align="center">
		                				<tr>
		                  					<th style="width: 50px;">NO.</th>
		                  					<th>JAM PELAJARAN</th>
		                  					<th>MATA PELAJARAN</th>
					                      	<th>KELAS</th>
					                    </tr>
					                </thead>
					                <tbody>
					                    <tr>
					                      	<th scope="row">1</th>
					                      	<td></td>
					                      	<td></td>
					                      	<td></td>
					                    </tr>
					                 </tbody>
					            </table>
					        </div>
					    </div>
					    <div class="tab-pane" id="rabu">
					    	<div class="table-responsive">
		            			<table class="table">
		              				<thead align="center">
		                				<tr>
		                  					<th style="width: 50px;">NO.</th>
		                  					<th>JAM PELAJARAN</th>
		                  					<th>MATA PELAJARAN</th>
					                      	<th>KELAS</th>
					                    </tr>
					                </thead>
					                <tbody>
					                    <tr>
					                      	<th scope="row">1</th>
					                      	<td></td>
					                      	<td></td>
					                      	<td></td>
					                    </tr>
					                 </tbody>
					            </table>
					        </div>
					    </div>
					    <div class="tab-pane" id="kamis">
					    	<div class="table-responsive">
		            			<table class="table">
		              				<thead align="center">
		                				<tr>
		                  					<th style="width: 50px;">NO.</th>
		                  					<th>JAM PELAJARAN</th>
		                  					<th>MATA PELAJARAN</th>
					                      	<th>KELAS</th>
					                    </tr>
					                </thead>
					                <tbody>
					                    <tr>
					                      	<th scope="row">1</th>
					                      	<td></td>
					                      	<td></td>
					                      	<td></td>
					                    </tr>
					                 </tbody>
					            </table>
					        </div>
					    </div>
					    <div class="tab-pane" id="jumat">
					    	<div class="table-responsive">
		            			<table class="table">
		              				<thead align="center">
		                				<tr>
		                  					<th style="width: 50px;">NO.</th>
		                  					<th>JAM PELAJARAN</th>
		                  					<th>MATA PELAJARAN</th>
					                      	<th>KELAS</th>
					                    </tr>
					                </thead>
					                <tbody>
					                    <tr>
					                      	<th scope="row">1</th>
					                      	<td></td>
					                      	<td></td>
					                      	<td></td>
					                    </tr>
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
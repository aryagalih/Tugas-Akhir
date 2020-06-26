<?php 
	require_once('partials/header.php');
?>

 <?php  
  $query_kelas = mysqli_query($conn, "SELECT * FROM tb_kelas");
  $query_matpel = mysqli_query($conn, "SELECT * FROM tb_matpel");

  $datamapels = array();
  $datakelass = array();
  while ($datamapel = mysqli_fetch_assoc($query_matpel)) {
    array_push($datamapels, $datamapel);
  }
  while ($datakelas = mysqli_fetch_assoc($query_kelas)) {
    array_push($datakelass, $datakelas);
  }


?>

<div class="clearfix"></div>
  	<div class="content-wrapper">
    	<div class="container-fluid">
        <div class="card" style="margin-top: 22px;">
          <div class="card-body">
              <div class="row">
                  <div class="col">
                      <h2><i class="zmdi zmdi-grid"></i> Nilai Kompetensi</h2>
                  </div>
              </div>
              <div class="dropdown-divider"></div>
          </div>
        </div>
    	  	<div class="row mt-4">
        		<div class="col">
          			<div class="card">
            			<div class="card-body">
                      <div class="form-group row">
                          <label for="kelas" class="col-md-2 col-form-label form-control-label"> Pilih Mata Pelajaran : </label>
                          <div class="col">
                              <select required class="form-control">
                                  <option value="" disabled="" selected="">Pilih Mata Pelajaran</option>
                                  <?php foreach ($datamapels as $key): ?>
                                <option value="<?=$key['id_matpel']?>"><?=$key['nama_matpel']?></option>
                              <?php endforeach ?>
                              </select>
                          </div>
                      </div>
              				<div class="table-responsive">
                				<table class="table">
                  					<thead>
                    					<tr>
                      						<th scope="col">No</th>
                      						<th scope="col">BAB Kompetensi</th>
                      						<th scope="col">P</th>
                      						<th scope="col">K</th>
                      						<th scope="col">S</th>
                    					</tr>
                  					</thead>
                  					<tbody>
	                    				<tr>
	                      					<th scope="row">1</th>
	                      					<td>Matrix</td>
	                      					<td>80</td>
	                      					<td>75</td>
	                      					<td>90</td>
	                   			 		</tr>
                  					</tbody>
                				</table>
              				</div>
            			</div>
          			</div>
        		</div>
			</div>
		
<?php 
	require_once('partials/footer.php');
?>
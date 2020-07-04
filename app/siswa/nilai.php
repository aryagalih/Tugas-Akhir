<?php 
	require_once('partials/header.php');
?>

 <?php  
  $query_kelas = mysqli_query($conn, "SELECT * FROM tb_kelas");
  $query_matpel = mysqli_query($conn, "SELECT * FROM tb_matpel");
  include('config.php');
?>

 <?php
    $query_nilai = mysqli_query($conn, "SELECT * FROM tb_detail_penilaian"); 
    $v_nilai="";
    if (isset($_POST['search'])) {
        $v_nilai = $_POST['v_nilai'];
    } 

    $query_matpel = mysqli_query($conn, "SELECT * FROM tb_penilaian join tb_matpel on tb_penilaian.id_matpel = tb_matpel.id_matpel");
 ?>

<div class="clearfix"></div>
  	<div class="content-wrapper">
    	<div class="container-fluid">
        <div class="card" style="margin-top: 22px;">
          <div class="card-body">
              <div class="row">
                  <div class="col">
                      <h2><i class="zmdi zmdi-file-text"></i> Nilai Kompetensi</h2>
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
                      <label for="kelas" class="col-md-2 col-form-label form-control-label"> Pilih Matap Pelajaran : </label>
                      <div class="col-md-8">
                          <select name="v_nilai" id="v_nilai" required class="form-control">
                              <option value="" disabled="" selected="">Pilih Mata Pelajaran</option>
                              <?php 
                                while($data_nilai = mysqli_fetch_array($query_matpel)){
                                  echo "<option value='".$data_nilai['id_matpel']."'>".$data_nilai['nama_matpel']."</option>";
                                }
                              ?>
                          </select>
                      </div>
                      <div class="col-md-2">
                          <button id="search" name="search" class="btn btn-primary"><i class="fa fa-search"></i> Pilih</button>
                      </div>
                    </div>
            				<div class="data"></div>
            			</div>
          			</div>
        		</div>
			</div>
		
<?php 
	require_once('partials/footer.php');
?>

<script type="text/javascript">
    $(document).ready(function(){
        $('.data').load("data-nilai.php");
        
        $("#search").click(function(e){
            e.preventDefault();
            var nilai = $("#v_nilai").val();
            $.ajax({
                type: 'POST',
                url: "data.php",
                data: { nilai: nilai },
                success: function(hasil) {           
                    $('.data').html(hasil);
                },
            });
        });
    });
</script>
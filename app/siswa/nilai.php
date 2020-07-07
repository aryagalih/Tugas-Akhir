<?php 
	require_once('partials/header.php');
  require_once('config.php');
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
                    <div class="row">
                        <div align="center" class="col">
                            <h2><i class="zmdi zmdi-file-text"></i> Nilai Kompetensi Siswa</h2>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="table-responsive">
                          <table class="table">
                            <thead align="center">
                              <tr>
                                <td>No</td>
                                <td>Mata Pelajaraan</td>
                                <td>Bab Kompetensi</td>
                                <th style="width: 105px; font-size: 11px;"> Nilai <br> Pengetahuan</th>
                                <th style="width: 105px; font-size: 11px;"> Nilai <br> Keterampilan</th>
                                <th style="width: 105px; font-size: 11px;"> Nilai <br> Sikap</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                  $sql = "SELECT tb_detail_penilaian.*, tb_matpel.nama_matpel , tb_penilaian.bab_kompetensi from tb_detail_penilaian join tb_penilaian on tb_penilaian.id_nilai=tb_detail_penilaian.id_nilai join tb_siswa on tb_detail_penilaian.nis = tb_siswa.nis join tb_matpel on tb_penilaian.id_matpel = tb_matpel.id_matpel where tb_siswa.nis='12349' 
                                    order by nama_matpel ASC";
                                  $query= mysqli_query($conn, $sql);  
                                  $n = 1;
                                  while($nilai = mysqli_fetch_array($query)){
                                    echo "<tr>";
                                      echo "<td>".$n++."</td>";
                                      echo "<td>".$nilai['nama_matpel']. "</td>";
                                      echo "<td>".$nilai['bab_kompetensi']. "</td>";
                                      echo "<td>".$nilai['nilai_pengetahuan']. "</td>";
                                      echo "<td>".$nilai['nilai_keterampilan']. "</td>";
                                      echo "<td>".$nilai['nilai_sikap']. "</td>";
                                    echo "</tr>";
                                   }
                                ?>
                            </tbody>
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

<!-- <script type="text/javascript">
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
</script> -->
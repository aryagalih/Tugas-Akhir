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
<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid"><br> 
        <div class="card">
          <div class="card-body">
            <h2><i class="zmdi zmdi-assignment"></i> Kelola Jadwal Kelas</h2>
            <div class="dropdown-divider"></div>
            <?php 
                switch ((isset($_GET['system_message']) ? $_GET['system_message'] : '')) {
                    case 'sukses':
                        echo "<div class='alert alert-primary' role='alert'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <strong>Berhasil !</strong> Jadwal Kelas Berhasil Diperbarui !!
                        </div>";
                        break;
                    case 'gagal':
                        echo "<div class='alert alert-danger' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <strong>Gagal !</strong>
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
                                <a href="javascript:void();" data-target="#tambah" data-toggle="pill" class="nav-link active"><i class="icon-plus"></i> <span class="hidden-xs">Tambah Jadwal kelas</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#lihat1" data-toggle="pill" class="nav-link"><i class="zmdi zmdi-assignment"></i> <span class="hidden-xs">Lihat Jadwal Kelas 1</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#lihat2" data-toggle="pill" class="nav-link"><i class="zmdi zmdi-assignment"></i> <span class="hidden-xs">Lihat Jadwal Kelas 2</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#lihat3" data-toggle="pill" class="nav-link"><i class="zmdi zmdi-assignment"></i> <span class="hidden-xs">Lihat Jadwal Kelas 3</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tambah">
                                <div class="card-body">
                                    <h5 align="center">Pilih Siswa Untuk Di tambahkan Ke Jadwal Kelas</h5>
                                    <div class="form-group row">
                                        <label for="kelas" class="col-md-2 col-form-label form-control-label"> Pilih Kelas : </label>
                                        <div class="col-md-8">
                                            <select name="v_kelas" id="v_kelas" required class="form-control">
                                                <option value="" disabled="" selected="">Pilih Kelas</option>
                                                <?php 
                                                    while($data_kelas = mysqli_fetch_array($query_kelas)){
                                                        echo "<option value='".$data_kelas['id_kelas']."'>".$data_kelas['nama']."</option>";
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
                            <div class="tab-pane" id="lihat1">
                                <div class="card-body">
                                    <h5 align="center">Lihat Jadwal Kelas</h5>
                                    <div class="table-responsive">
                                        <table class="table text-center table-content">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5px;">No</th>
                                                    <th>Nama Kelas</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php   
                                                    $sql = "SELECT * FROM tb_kelas where status='0' ";
                                                    $query= mysqli_query($conn, $sql);  
                                                    $n = 1;
                                                    while($kelas = mysqli_fetch_array($query)){
                                                        echo "<tr>";
                                                        echo "<td>".$n++."</td>";
                                                        echo "<td>".$kelas['nama']. "</td>";
                                                        echo "<td>
                                                                <a href='lihat-jadwal-kelas.php' class='btn btn-primary' title='".$kelas['id_kelas']."' onclick='editKelas(this)'><i class='icon-eye'></i></a>
                                                            </td>";
                                                        echo "</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="lihat2">
                                <div class="card-body">
                                    <h5 align="center">Lihat Jadwal Kelas</h5>
                                    <div class="table-responsive">
                                        <table class="table text-center table-content">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5px;">No</th>
                                                    <th>Nama Kelas</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php   
                                                    $sql = "SELECT * FROM tb_kelas where status='1' ";
                                                    $query= mysqli_query($conn, $sql);  
                                                    $n = 1;
                                                    while($kelas = mysqli_fetch_array($query)){
                                                        echo "<tr>";
                                                        echo "<td>".$n++."</td>";
                                                        echo "<td>".$kelas['nama']. "</td>";
                                                        echo "<td>
                                                                <a href='lihat-jadwal-kelas.php' class='btn btn-primary' title='".$kelas['id_kelas']."' onclick='editKelas(this)'><i class='icon-eye'></i></a>
                                                            </td>";
                                                        echo "</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><div class="tab-pane" id="lihat3">
                                <div class="card-body">
                                    <h5 align="center">Lihat Jadwal Kelas</h5>
                                    <div class="table-responsive">
                                        <table class="table text-center table-content">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5px;">No</th>
                                                    <th>Nama Kelas</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php   
                                                    $sql = "SELECT * FROM tb_kelas where status='2'";
                                                    $query= mysqli_query($conn, $sql);  
                                                    $n = 1;
                                                    while($kelas = mysqli_fetch_array($query)){
                                                        echo "<tr>";
                                                        echo "<td>".$n++."</td>";
                                                        echo "<td>".$kelas['nama']. "</td>";
                                                        echo "<td>
                                                                <a href='lihat-jadwal-kelas.php' class='btn btn-primary' title='".$kelas['id_kelas']."' onclick='editKelas(this)'><i class='icon-eye'></i></a>
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
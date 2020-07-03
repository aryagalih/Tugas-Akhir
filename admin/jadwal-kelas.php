<?php 
    require_once('partials/header.php');
 ?>
 <?php
    $query_kelas = mysqli_query($conn, "SELECT * FROM tb_kelas"); 
    $v_kelas="";
    if (isset($_POST['search'])) {
        $v_kelas = $_POST['v_kelas'];
    } 

    $query_jadwal = mysqli_query($conn, "SELECT * FROM tb_jadwal join tb_matpel on tb_jadwal.id_matpel = tb_matpel.id_matpel");
 ?>
<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid"><br> 
        <div class="card">
          <div class="card-body">
            <h2><i class="zmdi zmdi-assignment"></i> Jadwal Kelas</h2>
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
                                <a href="javascript:void();" data-target="#jadwal1" data-toggle="pill" class="nav-link active"><i class="zmdi zmdi-assignment"></i> <span class="hidden-xs">Jadwal Kelas 1</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#jadwal2" data-toggle="pill" class="nav-link"><i class="zmdi zmdi-assignment"></i> <span class="hidden-xs">Jadwal Kelas 2</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#jadwal3" data-toggle="pill" class="nav-link"><i class="zmdi zmdi-assignment"></i> <span class="hidden-xs">Jadwal Kelas 3</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="jadwal1">
                                <div class="card-body">
                                    <h5 align="center">Lihat Jadwal Kelas</h5>
                                    <div class="table-responsive">
                                        <table class="table text-center table-content">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5px;">No</th>
                                                    <th>Nama Kelas</th>
                                                    <th>Action</th>
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
                                                                <a href='lihat-jadwal-kelas.php?id_kelas=".$kelas['id_kelas']."' class='btn btn-primary' title='".$kelas['id_kelas']."' onclick='editKelas(this)'><i class='icon-eye'></i></a>
                                                            </td>";
                                                        echo "</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="jadwal2">
                                <div class="card-body">
                                    <h5 align="center">Lihat Jadwal Kelas</h5>
                                    <div class="table-responsive">
                                        <table class="table text-center table-content">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5px;">No</th>
                                                    <th>Nama Kelas</th>
                                                    <th>Action</th>
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
                                                                <a href='lihat-jadwal-kelas.php?id_kelas=".$kelas['id_kelas']."' class='btn btn-primary' title='".$kelas['id_kelas']."' onclick='editKelas(this)'><i class='icon-eye'></i></a>
                                                            </td>";
                                                        echo "</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><div class="tab-pane" id="jadwal3">
                                <div class="card-body">
                                    <h5 align="center">Lihat Jadwal Kelas</h5>
                                    <div class="table-responsive">
                                        <table class="table text-center table-content">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5px;">No</th>
                                                    <th>Nama Kelas</th>
                                                    <th>Action</th>
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
                                                                <a href='lihat-jadwal-kelas.php?id_kelas=".$kelas['id_kelas']."' class='btn btn-primary' title='".$kelas['id_kelas']."' onclick='editKelas(this)'><i class='icon-eye'></i></a>
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
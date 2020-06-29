<?php 
	require_once('partials/header.php');
 ?>
 <?php 
    $query_kelas = mysqli_query($conn, "SELECT * FROM tb_jadwal"); 
    $query_kelas = mysqli_query($conn, "SELECT * FROM tb_detail_jadwal"); 
  ?>
<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid"><br> 
        <div class="card">
          <div class="card-body">
            <h2><i class="icon-eye"></i> Lihat Jadwal Kelas</h2>
            <div class="dropdown-divider"></div>
          </div>
        </div>
        <div class="row">
			<div class="col">
                <div class="card">
                    <div class="card-body">
                    	<ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#senins" data-toggle="pill" class="nav-link active"><i class="zmdi zmdi-format-list-bulleted"></i> <span class="hidden-xs">Senin</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#selasa" data-toggle="pill" class="nav-link"><i class="zmdi zmdi-format-list-bulleted"></i> <span class="hidden-xs">Selasa</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#rabu" data-toggle="pill" class="nav-link"><i class="zmdi zmdi-format-list-bulleted"></i> <span class="hidden-xs">Rabu</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#kamis" data-toggle="pill" class="nav-link"><i class="zmdi zmdi-format-list-bulleted"></i> <span class="hidden-xs">Kamis</span></a>
                            </li>
                             <li class="nav-item">
                                <a href="javascript:void();" data-target="#jumat" data-toggle="pill" class="nav-link"><i class="zmdi zmdi-format-list-bulleted"></i> <span class="hidden-xs">Jum'at</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="senin">
                                <div class="card-body">
                                	<div class="table-responsive">
                                		<table class="table">
                                			<thead align="center" style="font-size: 17px;">
                                				<tr>
                                					<td>Jam Pelajaran</td>
                                					<td>Mata Pelajaran</td>
                                					<td>Guru Pengajar</td>
                                                    <td style="width: 5px;">Opsi</td>
                                				</tr>
                                			</thead>
                                			<tbody>
                                				<?php 
                                                    include('config.php');
                                                    $kelas = $_GET['id_kelas'];
                                                    $sql = "SELECT * from tb_jadwal where id_kelas = '$kelas' and hari = '1'";
                                                    $query= mysqli_query($conn, $sql); 
                                                while($jadwal = mysqli_fetch_array($query)){
                                                    echo "<tr>";
                                                        echo "<td>".$jadwal['jam_pelajaran']. "</td>";
                                                        echo "<td>".$jadwal['id_matpel']. "</td>";
                                                        echo "<td>".$jadwal['nip']. "</td>";
                                                        echo "<td>
                                                                <a href='#' class='btn btn-warning' title='Hapus' onclick='editSiswa(this)'><i class='icon-trash'></i></a>
                                                            </td>"; 
                                                    echo "</tr>";
                                                 }

                                                 ?>
                                			</tbody>
                                		</table>
                                	</div>
                                </div>
                            </div>
                            <div class="tab-pane" id="selasa">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead align="center" style="font-size: 17px;">
                                                <tr>
                                                    <td>Jam Pelajaran</td>
                                                    <td>Mata Pelajaran</td>
                                                    <td>Guru Pengajar</td>
                                                    <td style="width: 5px;">Opsi</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    include('config.php');
                                                    $kelas = $_GET['id_kelas'];
                                                    $sql = "SELECT * from tb_jadwal where id_kelas = '$kelas' and hari = '2'";
                                                    $query= mysqli_query($conn, $sql); 
                                                while($jadwal = mysqli_fetch_array($query)){
                                                    echo "<tr>";
                                                        echo "<td>".$jadwal['jam_pelajaran']. "</td>";
                                                        echo "<td>".$jadwal['id_matpel']. "</td>";
                                                        echo "<td>".$jadwal['nip']. "</td>";
                                                        echo "<td>
                                                                <a href='#' class='btn btn-warning' title='Hapus' onclick='editSiswa(this)'><i class='icon-trash'></i></a>
                                                            </td>"; 
                                                    echo "</tr>";
                                                 }

                                                 ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="rabu">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead align="center" style="font-size: 17px;">
                                                <tr>
                                                    <td>Jam Pelajaran</td>
                                                    <td>Mata Pelajaran</td>
                                                    <td>Guru Pengajar</td>
                                                    <td style="width: 5px;">Opsi</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    include('config.php');
                                                    $kelas = $_GET['id_kelas'];
                                                    $sql = "SELECT * from tb_jadwal where id_kelas = '$kelas' and hari = '3'";
                                                    $query= mysqli_query($conn, $sql); 
                                                while($jadwal = mysqli_fetch_array($query)){
                                                    echo "<tr>";
                                                        echo "<td>".$jadwal['jam_pelajaran']. "</td>";
                                                        echo "<td>".$jadwal['id_matpel']. "</td>";
                                                        echo "<td>".$jadwal['nip']. "</td>";
                                                        echo "<td>
                                                                <a href='#' class='btn btn-warning' title='Hapus' onclick='editSiswa(this)'><i class='icon-trash'></i></a>
                                                            </td>"; 
                                                    echo "</tr>";
                                                 }

                                                 ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="kamis">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead align="center" style="font-size: 17px;">
                                                <tr>
                                                    <td>Jam Pelajaran</td>
                                                    <td>Mata Pelajaran</td>
                                                    <td>Guru Pengajar</td>
                                                    <td style="width: 5px;">Opsi</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    include('config.php');
                                                    $kelas = $_GET['id_kelas'];
                                                    $sql = "SELECT * from tb_jadwal where id_kelas = '$kelas' and hari = '4'";
                                                    $query= mysqli_query($conn, $sql); 
                                                while($jadwal = mysqli_fetch_array($query)){
                                                    echo "<tr>";
                                                        echo "<td>".$jadwal['jam_pelajaran']. "</td>";
                                                        echo "<td>".$jadwal['id_matpel']. "</td>";
                                                        echo "<td>".$jadwal['nip']. "</td>";
                                                        echo "<td>
                                                                <a href='#' class='btn btn-warning' title='Hapus' onclick='editSiswa(this)'><i class='icon-trash'></i></a>
                                                            </td>"; 
                                                    echo "</tr>";
                                                 }

                                                 ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="jumat">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead align="center" style="font-size: 17px;">
                                                <tr>
                                                    <td>Jam Pelajaran</td>
                                                    <td>Mata Pelajaran</td>
                                                    <td>Guru Pengajar</td>
                                                    <td style="width: 5px;">Opsi</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    include('config.php');
                                                    $kelas = $_GET['id_kelas'];
                                                    $sql = "SELECT * from tb_jadwal where id_kelas = '$kelas' and hari = '5'";
                                                    $query= mysqli_query($conn, $sql); 
                                                while($jadwal = mysqli_fetch_array($query)){
                                                    echo "<tr>";
                                                        echo "<td>".$jadwal['jam_pelajaran']. "</td>";
                                                        echo "<td>".$jadwal['id_matpel']. "</td>";
                                                        echo "<td>".$jadwal['nip']. "</td>";
                                                        echo "<td>
                                                                <a href='#' class='btn btn-warning' title='Hapus' onclick='editSiswa(this)'><i class='icon-trash'></i></a>
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
 <?php 
	require_once('partials/footer.php');
 ?>
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
            <h2><i class="zmdi zmdi-assignment"></i> Jadwal Kelas</h2>
            <div class="dropdown-divider"></div>
          </div>
        </div>
        <div class="row">
			<div class="col">
                <div class="card">
                    <div class="card-body">
                    	<ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#senin" data-toggle="pill" class="nav-link active"><i class="zmdi zmdi-format-list-bulleted"></i> <span class="hidden-xs">Senin</span></a>
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
                                				</tr>
                                			</thead>
                                			<tbody>
                                				<?php 
                                                    include('config.php');
                                                    $kelas = $_GET['id_kelas'];
                                                    $sql = "SELECT tb_jadwal.*, tb_guru.nama , tb_matpel.nama_matpel FROM `tb_jadwal` JOIN tb_guru ON tb_jadwal.nip = tb_guru.nip JOIN tb_matpel ON tb_matpel.id_matpel = tb_jadwal.id_matpel JOIN tb_kelas ON tb_kelas.id_kelas = tb_jadwal.id_kelas where tb_jadwal.id_kelas='".$kelas."' and hari='1' 
                                                        order by jam_pelajaran ASC";
                                                    $query= mysqli_query($conn, $sql); 
                                                while($jadwal = mysqli_fetch_array($query)){
                                                    echo "<tr>";
                                                        echo "<td>".$jadwal['jam_pelajaran']. "</td>";
                                                        echo "<td>".$jadwal['nama_matpel']. "</td>";
                                                        echo "<td>".$jadwal['nama']. "</td>";
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    include('config.php');
                                                    $sql = "SELECT tb_jadwal.*, tb_guru.nama , tb_matpel.nama_matpel FROM `tb_jadwal` JOIN tb_guru ON tb_jadwal.nip = tb_guru.nip JOIN tb_matpel ON tb_matpel.id_matpel = tb_jadwal.id_matpel JOIN tb_kelas ON tb_kelas.id_kelas = tb_jadwal.id_kelas where tb_kelas.id_kelas='".$kelas."' and hari='2'";
                                                    $query= mysqli_query($conn, $sql); 
                                                while($jadwal = mysqli_fetch_array($query)){
                                                    echo "<tr>";
                                                        echo "<td>".$jadwal['jam_pelajaran']. "</td>";
                                                        echo "<td>".$jadwal['nama_matpel']. "</td>";
                                                        echo "<td>".$jadwal['nama']. "</td>";
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    include('config.php');
                                                    $kelas = $_GET['id_kelas'];
                                                    $sql = "SELECT tb_jadwal.*, tb_guru.nama , tb_matpel.nama_matpel FROM `tb_jadwal` JOIN tb_guru ON tb_jadwal.nip = tb_guru.nip JOIN tb_matpel ON tb_matpel.id_matpel = tb_jadwal.id_matpel JOIN tb_kelas ON tb_kelas.id_kelas = tb_jadwal.id_kelas where tb_jadwal.id_kelas='".$kelas."' and hari='3' 
                                                        order by jam_pelajaran ASC";
                                                    $query= mysqli_query($conn, $sql); 
                                                while($jadwal = mysqli_fetch_array($query)){
                                                    echo "<tr>";
                                                        echo "<td>".$jadwal['jam_pelajaran']. "</td>";
                                                        echo "<td>".$jadwal['nama_matpel']. "</td>";
                                                        echo "<td>".$jadwal['nama']. "</td>";
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    include('config.php');
                                                    $kelas = $_GET['id_kelas'];
                                                    $sql = "SELECT tb_jadwal.*, tb_guru.nama , tb_matpel.nama_matpel FROM `tb_jadwal` JOIN tb_guru ON tb_jadwal.nip = tb_guru.nip JOIN tb_matpel ON tb_matpel.id_matpel = tb_jadwal.id_matpel JOIN tb_kelas ON tb_kelas.id_kelas = tb_jadwal.id_kelas where tb_jadwal.id_kelas='".$kelas."' and hari='4' 
                                                        order by jam_pelajaran ASC";
                                                    $query= mysqli_query($conn, $sql); 
                                                while($jadwal = mysqli_fetch_array($query)){
                                                    echo "<tr>";
                                                        echo "<td>".$jadwal['jam_pelajaran']. "</td>";
                                                        echo "<td>".$jadwal['nama_matpel']. "</td>";
                                                        echo "<td>".$jadwal['nama']. "</td>"; 
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    include('config.php');
                                                    $kelas = $_GET['id_kelas'];
                                                    $sql = "SELECT tb_jadwal.*, tb_guru.nama , tb_matpel.nama_matpel FROM `tb_jadwal` JOIN tb_guru ON tb_jadwal.nip = tb_guru.nip JOIN tb_matpel ON tb_matpel.id_matpel = tb_jadwal.id_matpel JOIN tb_kelas ON tb_kelas.id_kelas = tb_jadwal.id_kelas where tb_jadwal.id_kelas='".$kelas."' and hari='5' 
                                                        order by jam_pelajaran ASC";
                                                    $query= mysqli_query($conn, $sql); 
                                                while($jadwal = mysqli_fetch_array($query)){
                                                    echo "<tr>";
                                                        echo "<td>".$jadwal['jam_pelajaran']. "</td>";
                                                        echo "<td>".$jadwal['nama_matpel']. "</td>";
                                                        echo "<td>".$jadwal['nama']. "</td>";
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

<div class="modal fade" id="hapusModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">HAPUS JADWAL KELAS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">YAKIN MENGHAPUS JADWAL KELAS <?= $_GET['id_kelas'];?>?</div>
                <br>
                <div class="pull-right">
                    <form action="jadwalKelas/proses-hapus-jadwal-kelas.php" method="POST">
                        <input type="hidden" value="<?= $_GET['id']; ?>" name="id_matpel">
                        <input type="hidden" name="id_kelas" id="del_id" value="">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Batalkan</button>
                        <button type="submit" class="btn btn-warning text-white">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 <?php 
	require_once('partials/footer.php');
 ?>
 <script>
     function hapus(obj){
        var id_kelas = $(obj).attr('title');
        $('#hapusModal').modal('show');
        $('#del_id').val(id_kelas);
    }
 </script>
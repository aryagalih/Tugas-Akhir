<?php 
	require_once('partials/header.php');
    if(!empty($_POST['pilih'])) {
        foreach($_POST['pilih'] as $check) {
                echo $check; 
        }
    }
 ?>
 	<div class="clearfix"  id="editjadwal"></div>
    <div class="content-wrapper">
        <div class="container-fluid"><br>
        	<div class="card">
                <div class="card-body">
                    <h2><i class="icon-note"></i> Kelola Jadwal Kelas </h2>
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
                                <a href="javascript:void();" data-target="#senin" data-toggle="pill" class="nav-link active"><i class='icon-note'></i> <span class="hidden-xs">Senin</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#selasa" data-toggle="pill" class="nav-link"><i class='icon-note'></i> <span class="hidden-xs">Selasa</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#rabu" data-toggle="pill" class="nav-link"><i class='icon-note'></i> <span class="hidden-xs">Rabu</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#kamis" data-toggle="pill" class="nav-link"><i class='icon-note'></i> <span class="hidden-xs">Kamis</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#jumat" data-toggle="pill" class="nav-link"><i class='icon-note'></i> <span class="hidden-xs">Jum'at</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="senin">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th>Jam Pelajaran</th>
                                                    <th>Mata Pelajaran</th>
                                                    <th>Guru Pengajar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="selasa">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th>Jam Pelajaran</th>
                                                    <th>Mata Pelajaran</th>
                                                    <th>Guru Pengajar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                   
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="rabu">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th>Jam Pelajaran</th>
                                                    <th>Mata Pelajaran</th>
                                                    <th>Guru Pengajar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                   <input type="hidden" id="id_jadwal" name="id_jadwal" value="<$_GET[id_jadwal]>">
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="kamis">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th>Jam Pelajaran</th>
                                                    <th>Mata Pelajaran</th>
                                                    <th>Guru Pengajar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                   
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="jumat">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th>Jam Pelajaran</th>
                                                    <th>Mata Pelajaran</th>
                                                    <th>Guru Pengajar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                   
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
        </div>
    </div>

 <?php 
	require_once('partials/footer.php');
 ?>
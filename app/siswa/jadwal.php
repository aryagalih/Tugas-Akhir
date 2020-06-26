<?php 
	require_once('partials/header.php');
 ?>
<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid"><br> 
        <div class="card">
          <div class="card-body">
            <h2><i class="zmdi zmdi-calendar-check"></i> Lihat Jadwal Kelas</h2>
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
                                				</tr>
                                			</thead>
                                			<tbody>
                                				<tr>
                                					<td>07.00-07.40</td>
                                					<td>Bahasa Indonesia</td>
                                					<td>Arya Galih Ramdani</td>
                                				</tr>
                                				<tr>
                                					<td>07.40-08.20</td>
                                					<td>Bahasa Inggris</td>
                                					<td>Galih</td>
                                				</tr>
                                				<tr>
                                					<td>08.20-09.00</td>
                                					<td>Seni budaya</td>
                                					<td>Dani</td>
                                				</tr>
                                				<tr>
                                					<td colspan="4" align="center">Istirahat</td>
                                				</tr>
                                				<tr>
                                					<td>09.00-09.40</td>
                                					<td>Bahasa Indonesia</td>
                                					<td>Ramdani</td>
                                				</tr>
                                				<tr>
                                					<td>09.40-10.20</td>
                                					<td>Bahasa Inggris</td>
                                					<td>Arya</td>
                                				</tr>
                                				<tr>
                                					<td>10.20-11.00</td>
                                					<td>Seni budaya</td>
                                					<td>Adit</td>
                                				</tr>
                                				<tr>
                                					<td colspan="4" align="center">Istirahat</td>
                                				</tr>
                                			</tbody>
                                		</table>
                                	</div>
                                </div>
                            </div>
                        </div>
 <?php 
	require_once('partials/footer.php');
 ?>
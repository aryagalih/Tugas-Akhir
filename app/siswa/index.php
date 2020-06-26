<?php 
  require_once('partials/header.php');
 ?>

<div class="clearfix"></div>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="card" style="margin-top: 22px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <h2><i class="icon-user"></i> MY PROFIL</h2>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <?php 
                        switch ((isset($_GET['system_message']) ? $_GET['system_message'] : '')) {
                        case 'sukses':
                        echo "<div class='alert alert-primary role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <strong>Berhasil !</strong> Data Kelas Berhasil Diperbarui !!
                            </div>";
                            break;  
                        case 'gagal':
                        echo "<div class='alert alert-danger' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <strong>Gagal !</strong> ".$_GET['reason']."
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
                <div class="col-md-6" >
                    <div class="card">
                        <div class="card-body">
                           <h3 align="center">Profil Siswa</h3>
                           <div class="dropdown-divider"></div><br>
                            <img src="../../assets/images/fotosiswa/IMG_20200420_204347.jpg" alt="" style="width: 200px; border-radius: 50%; height: 190px; margin-left: 30%;"><br> 
                            <div class="">
                                NIP : 12350
                            </div>
                            <div> 
                                Nama : Arya
                            </div>
                            <div> 
                                Kelas : Laki-Laki
                            </div>
                            <div> 
                                Alamat : Pokopek
                            </div>
                            <div> 
                                Jenis Kelamin : Laki-Laki
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 align="center">Opsi</h3>
                            <div class="dropdown-divider"></div><br>
                            <div class="row">
                                <div class="col">
                                    <a href="#" class="btn btn-info" style="width: 100%; padding: 50px;"><h3>Lihat Nilai</h3></a>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <a href="#" class="btn btn-info" style="width: 100%; padding: 50px;"><h3>Lihat Jadwal </h3></a>
                                    
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
 <!-- SELECT 
tb_jadwal.*, tb_guru.nama , tb_matpel.nama_matpel, tb_kelas.nama
FROM `tb_jadwal` 
JOIN tb_guru ON tb_jadwal.nip = tb_guru.nip  
JOIN tb_matpel ON tb_matpel.id_matpel = tb_jadwal.id_matpel
JOIN tb_kelas ON tb_kelas.id_kelas = tb_jadwal.id_kelas
WHERE  tb_jadwal.id_kelas=30     -->
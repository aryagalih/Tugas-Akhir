<?php 
  require_once('partials/header.php');
  require_once('config.php');
 ?>
  <div class="clearfix"></div>
  <div class="content-wrapper">
    <div class="container-fluid">
        <div class="card" style="margin-top: 22px;">
          <div class="card-body">
            <h2><i class="zmdi zmdi-home"></i> DASHBOARD</h2>
            <div class="dropdown-divider"></div>
          </div>
        </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 align="center">Jumlah Siswa Kelas 1 :</h5>
                            <div class="dropdown-divider"></div>
                            <div class="card-body pt-5">
                              <a><i class="icon-user"></i>
                                <?php  
                                  $sql= "SELECT tb_kelas.status FROM tb_kelas JOIN tb_siswa ON tb_kelas.id_kelas = tb_siswa.kelas where tb_kelas.status = 0";
                                  $query = mysqli_query($conn, $sql);
                                  $jumlah = mysqli_num_rows($query);
                                  echo $jumlah;
                                ?>
                              </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 align="center">Jumlah Siswa Kelas 2 :</h5>
                            <div class="dropdown-divider"></div>
                            <div class="card-body pt-5">
                              <i class="icon-user"></i>
                              <?php  
                                  $sql= "SELECT tb_kelas.status FROM tb_kelas JOIN tb_siswa ON tb_kelas.id_kelas = tb_siswa.kelas where tb_kelas.status = 1";
                                  $query = mysqli_query($conn, $sql);
                                  $jumlah = mysqli_num_rows($query);
                                  echo $jumlah;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 align="center">Jumlah Siswa Kelas 3 : </h5>
                            <div class="dropdown-divider"></div>
                            <div class="card-body pt-5">
                              <i class="icon-user" ></i>
                                <?php  
                                  $sql= "SELECT tb_kelas.status FROM tb_kelas JOIN tb_siswa ON tb_kelas.id_kelas = tb_siswa.kelas where tb_kelas.status = 2";
                                  $query = mysqli_query($conn, $sql);
                                  $jumlah = mysqli_num_rows($query);
                                  echo $jumlah;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 align="center">Jumlah Guru :</h5>
                            <div class="dropdown-divider"></div>
                            <div class="card-body pt-5">
                              <i class="icon-user">
                                <?php  
                                  $sql= "SELECT * FROM tb_guru";
                                  $query = mysqli_query($conn, $sql);
                                  $jumlah = mysqli_num_rows($query);
                                  echo $jumlah;
                                ?>
                              </i>
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
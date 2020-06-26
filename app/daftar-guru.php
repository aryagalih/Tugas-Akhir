<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <title>Halaman Daftar Guru</title>

  <link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="../assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <link href="../assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <link href="../assets/css/sidebar-menu.css" rel="stylesheet"/>
  <link href="../assets/css/appstyle.css" rel="stylesheet"/>
  
  
</head>

<body><br><br><br>
  <div class="card card-authentication mx-auto my-4">
      <div class="card-body">
          <div class="card-content p-2">
              <div class="card-title text-uppercase text-center py-3">Silahkan Daftar</div><br>
              <form action="auth/proses-daftar-siswa.php">
                  <div class="form-group">
                     <div class="position-relative has-icon-right">
                        <input type="text" id="exampleInputName" class="form-control input-shadow" placeholder="NIP">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="position-relative has-icon-right">
                        <input type="text" id="exampleInputEmailId" class="form-control input-shadow" placeholder="Username">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="position-relative has-icon-right">
                        <input type="text" id="exampleInputPassword" class="form-control input-shadow" placeholder="Password">
                      </div>
                  </div>
              </form>
          </div><br>
          <button type="button" class="btn btn-primary btn-block">Daftar</button>
          <div class="text-center py-4">
            <p>Jika ingin membatalkan silahkan Klik!</p>
            <a href="../" type="button" class="btn btn-dark btn-md"> Batal</a>
          </div>
      </div>
  </div>
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/plugins/simplebar/js/simplebar.js"></script>
  <script src="../assets/js/sidebar-menu.js"></script>
  <script src="../assets/js/app-script.js"></script>
	
</body>
</html>

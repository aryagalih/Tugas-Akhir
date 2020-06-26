<?php
    include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Halaman Login</title>
  <script src="assets/js/pace.min.js"></script>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <link href="assets/css/appstyle.css" rel="stylesheet"/>
</head>

<body>

<form action="app/auth/proses_login.php" method="POST">
    <div id="wrapper" >
    	  <div class="card card-authentication mx-auto" style="margin-top: 135px;">
    		    <div class="card-body">
    		        <div class="card-content p-2">
    		            <div class="card-title text-uppercase text-center pt-3"><h3>silahkan Login</h3></div>
                    <br>
	                  <div class="form-group">
	                      <label class="sr-only"></label>
	                      <div class="position-relative has-icon-right">
		                        <input type="text" name="username" class="form-control input-shadow" placeholder="Username">
		                          <div class="form-control-position">
			                            <i class="icon-user"></i>
		                          </div>
	                      </div>
            			  </div>
            			  <div class="form-group">
            			      <label class="sr-only"></label>
            			      <div class="position-relative has-icon-right">
            				        <input type="password" name="password" class="form-control input-shadow" placeholder="Password">
            				        <div class="form-control-position">
            					          <i class="icon-lock"></i>
            				        </div>
            			      </div>
            			  </div>
                    <br>
                		<button type="submit" class="btn btn-primary btn-block">Login</button><br>
                </div>
                <div class="card-footer text-center">
                    <p>Jika Anda Belum mempunyai akun, Silahkan klik!</p><a type="button" class="btn btn-dark btn-md" data-toggle="modal" data-target="#myModal"> Daftar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pilih Daftar Sebagai</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body text-center">
          <a href="app/daftar-guru.php" class="btn btn-dark" style="width: 45%; padding: 50px;">DAFTAR GURU</a>
          <a href="app/daftar-siswa.php" class="btn btn-dark" style="width: 45%; padding: 50px;">DAFTAR SISWA</a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
</form>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/sidebar-menu.js"></script>
  <script src="assets/js/app-script.js"></script>
  
</body>
</html>
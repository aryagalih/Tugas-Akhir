    <?php 
    include "../app/config.php";
    session_start();
    if(!isset($_SESSION['username'])) echo header('location: ../');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Halaman Admin</title>
    <link href="../assets/images/icon-logo/admin.ico" rel="icon">
    <link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../assets/css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/css/icons.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/css/sidebar.css" rel="stylesheet"/>
    <link href="../assets/css/appstyle.css" rel="stylesheet"/>
</head>
<body>
    <header class="topbar">
        <nav class="navbar navbar-expand fixed-top">
            <ul class="navbar-nav mr-auto align-items-center">
                <a class="nav-link toggle-menu">
                    <i class="icon-menu menu-icon"></i>
                </a>
            </ul>
            <ul class="navbar-nav align-items-center right-nav-link">
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                        <span><i class="icon-user" name="nama"></i>  &nbsp;<?php echo $_SESSION['username']; ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#"><i class="icon-settings mr-2"></i> Setting</a>
                        <li class="dropdown-divider"></li>
                        <a class="dropdown-item" href="../app/auth/proses_logout.php"><i class="icon-power mr-2"></i> Logout</a>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <!-- sidebar -->
    <div id="wrapper">
        <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
            <div class="menu">
                <a>
                    <p class="text-menu">HALAMAN ADMIN</p>
                </a>
            </div>
            <div class="dropdown-divider"></div>
            <ul class="sidebar-menu do-nicescrol">
                <li>
                    <a href=".">
                        <i class="zmdi zmdi-home"></i> <span>DASHBOARD</span>
                    </a>
                </li>
                <li>
                    <a href="kelas.php">
                        <i class="zmdi zmdi-format-list-bulleted"></i> <span>DATA KELAS</span>
                    </a>
                </li>
                 <li>
                    <a href="siswa.php">
                        <i class="zmdi zmdi-account-calendar"></i> <span>DATA SISWA</span>
                    </a>
                </li>
                <li>
                    <a href="guru.php">
                        <i class="zmdi zmdi-account-calendar"></i> <span>DATA GURU</span>
                    </a>
                </li>
                <li>
                    <a href="matpel.php">
                        <i class="zmdi zmdi-book"></i> <span>MATA PELAJARAN</span>
                    </a>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#shapejadwal" aria-expanded="true" aria-control="#shapejadwal">
                        <i class="zmdi zmdi-assignment"></i> <span>KELOLA JADWAL</span>
                    </a>
                    <div id="shapejadwal" class="collapse" style="transition: 0.2s;">
                        <ul class="sidebar-menu">

                            <li>
                                <a href="jadwal-guru.php">Jadwal Guru</a>
                            </li>
                            <li>
                                <a href="jadwal-kelas.php">Jadwal Kelas</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
<?php 
    include "../config.php";
    session_start();
    if(!isset($_SESSION['username'])) echo header('location: ../../');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Halaman Guru</title>
    <link href="../../assets/images/icon-logo/guru.ico" rel="icon">
    <!-- <link href="../../assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/> -->
    <link href="../../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../../assets/css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/css/icons.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/css/sidebar.css" rel="stylesheet"/>
    <link href="../../assets/css/appstyle.css" rel="stylesheet"/>
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
                        <a class="dropdown-item" href="../auth/proses_logout.php"><i class="icon-power mr-2"></i> Logout</a>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <div id="wrapper">
        <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
            <div class="menu">
                <a>
                    <h5 style="padding-top: 20px;"><i class="zmdi zmdi-bookmark"></i> <b>GURU</b></h5>
                </a>
            </div>
            <div class="dropdown-divider"></div>
            <ul class="sidebar-menu do-nicescrol">
                <li>
                    <a href=".">
                        <i class="icon-user"></i> <span>MY PROFILE</span>
                    </a>
                </li>
                <li>
                    <a href="nilai.php">
                        <i class="zmdi zmdi-file-text"></i> <span>KELOLA NILAI</span>
                    </a>
                </li>
                <li>
                    <a href="jadwal.php">
                        <i class="zmdi zmdi-assignment"></i> <span>JADWAL MENGAJAR</span>
                    </a>
                </li>
            </ul>
        </div>
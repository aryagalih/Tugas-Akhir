<?php

	//celuk koneksi
	require_once('../config.php');

	//start session
	session_start();


	//get inputan form
	$username = $_POST['username'];
	$password = $_POST['password'];

	//query madakno inputan form karo database
	$query = mysqli_query($conn, "SELECT * FROM tb_user where username='".$username ."' AND password ='".$password."'");

	//data tak panggil ng jero variabel $data
	$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
	
	// print_r($data);
	// exit();
	//buat session
	$_SESSION['username']=$username;


	//cek session
	if ($data['role'] == 1) {
		$_SESSION['username'] == $data['username'];
		header('location:../../admin/');
	}else if($data["role"] == 2) {
		$_SESSION['username'] = $data['username'];
		header('location:../guru/');
	}else if($data["role"] == 3) {
		$_SESSION['username'] = $data['username'];
		header('location:../siswa/');
	}else {
		echo "username atau password salah";
		header('location:../../');
	}

	//nutup koneksi
	$conn->close();
?>
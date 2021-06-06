<?php

	include_once("assets/function/koneksi.php");
	include_once("assets/function/helper.php");
	
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	
	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND password='$password' AND status='on'");
	
	if(mysqli_num_rows($query) == 0){
		header("location:". base_url. "?page=login&notif=true");
	}else{
	
		$row = mysqli_fetch_assoc($query);
		
		session_start();
		
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['nama'] = $row['nama'];
		$_SESSION['level'] = $row['level'];
		$level = $_SESSION['level'];
		
		if(isset($_SESSION["proses_pesanan"])){
			unset($_SESSION["proses_pesanan"]);
			header("location: ".base_urls."?page=data_pemesan");
		}elseif ($level == "Penulis") {
			header("location: ".base_url."?module=artikel_blog&action=list");
		}else{
			// code...
			header("location: ".base_url."?page=main");
		}
		
	}
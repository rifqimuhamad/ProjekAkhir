<?php
    include("../../assets/function/koneksi.php");   
    include("../../assets/function/helper.php");  
     
    $user_id = $_GET['user_id'];
	
    $nama = $_POST['nama'];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$alamat = $_POST["alamat"];
	$level = $_POST["level"];
	$status = $_POST["status"];	

	mysqli_query($koneksi, "UPDATE user SET nama='$nama',
											   email='$email',
											   phone='$phone',
											   alamat='$alamat',
											   level='$level',
											   status='$status'
											   WHERE user_id='$user_id'");

    header("location: ".base_url."?module=user&action=list");
?>
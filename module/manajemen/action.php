<?php
    include("../../assets/function/koneksi.php");   
    include("../../assets/function/helper.php");   
     
	$provinsi = $_POST['provinsi'];
	$positif = $_POST['positif'];
	$sembuh = $_POST['sembuh'];
	$meninggal = $_POST['meninggal'];
	$status = $_POST['status'];
	$button = $_POST['button'];
	
	if($button == "Add"){
		mysqli_query($koneksi, "INSERT INTO provinsi (provinsi, positif, sembuh, meninggal) VALUES('$provinsi', '$positif', '$sembuh'), '$meninggal', '$status')");
	}
	else if($button == "Update"){
		$provinsi_id = $_GET['provinsi_id'];
		
		mysqli_query($koneksi, "UPDATE provinsi SET positif ='$positif',
													 sembuh ='$sembuh',
													 meninggal ='$meninggal',
													 status='$status' WHERE provinsi_id='$provinsi_id'");
	}
	
	header("location:" .base_url."?module=manajemen&action=list");
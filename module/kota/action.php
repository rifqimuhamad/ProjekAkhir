<?php
    include("../../assets/function/koneksi.php");   
    include("../../assets/function/helper.php");    
     
    $kota = $_POST['kota'];
    $tarif = $_POST['tarif'];
    $status = $_POST['status'];
    $button = $_POST['button'];
	
	if($button == "Add"){
		mysqli_query($koneksi, "INSERT INTO kota (kota, tarif, status) VALUES('$kota', '$tarif', '$status')");
	}
	else if($button == "Update"){
		$kota_id = $_GET['kota_id'];
		
		mysqli_query($koneksi, "UPDATE kota SET kota='$kota',
												tarif='$tarif',
												status='$status' WHERE kota_id='$kota_id'");
	}
	
	header("location:" .base_urls."?module=kota&action=list");
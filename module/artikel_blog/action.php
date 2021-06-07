<?php

	include("../../assets/function/koneksi.php");   
    include("../../assets/function/helper.php"); 
	
	$nama_artikel = $_POST['nama_artikel'];
	$kategori_blog_id = $_POST['kategori_blog_id'];
	$artikel = $_POST['artikel'];
	$status = $_POST['status'];
	$button = $_POST['button'];
	$update_gambar = "";
	
	if(!empty($_FILES["file"]["name"])){
		$nama_file = $_FILES["file"]["name"];
		move_uploaded_file($_FILES["file"]["tmp_name"], "../../assets/img/artikel/".$nama_file);
		
		$update_gambar = ", gambar='$nama_file'";
	}
	
	if($button == "Add"){
		mysqli_query($koneksi, "INSERT INTO artikel (nama_artikel, kategori_blog_id, artikel_blog, gambar, status) 
											VALUES ('$nama_artikel', '$kategori_blog_id', '$artikel', '$nama_file','$status')");
	}
	else if($button == "Update"){
		$artikel_id = $_GET['artikel_id'];
		
		mysqli_query($koneksi, "UPDATE artikel SET artikel_id='$artikel_id',
												  nama_artikel='$nama_artikel',
												  artikel_blog='$artikel',
												  status='$status'
												  $update_gambar WHERE artikel_id='$artikel_id'");
	}
	
	header("location:".base_url."?module=artikel_blog&action=list");

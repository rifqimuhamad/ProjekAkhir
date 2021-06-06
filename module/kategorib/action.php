<?php
    include("../../assets/function/koneksi.php");   
    include("../../assets/function/helper.php");   
     
    $kategori = $_POST['kategori'];
    $status = $_POST['status'];
    $button = $_POST['button'];
	
	if($button == "Add"){
		mysqli_query($koneksi, "INSERT INTO kategori_blog (kategori_blog, status) VALUES('$kategori', '$status')");
	}
	else if($button == "Update"){
		$kategori_blog_id = $_GET['kategori_blog_id'];
		
		mysqli_query($koneksi, "UPDATE kategori_blog SET kategori_blog='$kategori',
													status='$status' WHERE kategori_blog_id='$kategori_blog_id'");
	}
	
	header("location:" .base_urls."?module=kategorib&action=list");
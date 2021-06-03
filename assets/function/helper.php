<?php

	define("base_url", "http://localhost/Project%20Web/");
	define("base_urls", "http://localhost/Project%20Web/store.php");

	$arrayStatusPesanan[0] = "Menunggu Pembayaran";
	$arrayStatusPesanan[1] = "Pembayaran Sedang Di Validasi";
	$arrayStatusPesanan[2] = "Lunas";
	$arrayStatusPesanan[3] = "Pembayaran Di Tolak";
	
	function rupiah($nilai = 0){
		$string = "Rp," . number_format($nilai);
		return $string;
	}

	function jums($nilai = 0){
		$string =number_format($nilai);
		return $string;
	}
	
	function kategori($kategori_id = false){
		global $koneksi;
		
		$string = "<div id='menu-kategori'>";
			$string .= "<h3>Category</h3><hr />";
			
				$string .= "<ul>";
					
						$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");
						
						while($row=mysqli_fetch_assoc($query)){
							if($kategori_id == $row['kategori_id']){
								$string .= "<li><a href='".base_url."store.php?kategori_id=$row[kategori_id]' class='active'>$row[kategori]</a></li>";
							}else{
								$string .= "<li><a href='".base_url."store.php?kategori_id=$row[kategori_id]'>$row[kategori]</a></li>";
							}
						}
				
				$string .= "</ul>";
			
			$string .= "</div>";		
			
			return $string;
	}
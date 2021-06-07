<?php

	define("base_url", "https://projekweb.herokuapp.com/");

	
	function rupiah($nilai = 0){
		$string = "Rp," . number_format($nilai);
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
								$string .= "<li><a href='".base_url."?page=mainstore&kategori_id=$row[kategori_id]' class='active'>$row[kategori]</a></li>";
							}else{
								$string .= "<li><a href='".base_url."?page=mainstore&kategori_id=$row[kategori_id]'>$row[kategori]</a></li>";
							}
						}
				
				$string .= "</ul>";
			
			$string .= "</div>";		
			
			return $string;
	}
	function kategorib($kategori_id = false){
		global $koneksi;
		
		$string = "<div id='menu-kategori'>";
			$string .= "<h3>Category</h3><hr />";
			
				$string .= "<ul>";
					
						$query = mysqli_query($koneksi, "SELECT * FROM kategori_blog WHERE status='on'");
						
						while($row=mysqli_fetch_assoc($query)){
							if($kategori_id == $row['kategori_blog_id']){
								$string .= "<li><a href='".base_url."?page=blog&kategori_blog_id=$row[kategori_blog_id]' class='active'>$row[kategori_blog]</a></li>";
							}else{
								$string .= "<li><a href='".base_url."?page=blog&kategori_blog_id=$row[kategori_blog_id]'>$row[kategori_blog]</a></li>";
							}
						}
				
				$string .= "</ul>";
			
			$string .= "</div>";		
			
			return $string;
	}

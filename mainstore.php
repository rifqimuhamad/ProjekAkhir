

<div class="wrapper">
	<section id="store">
		<div id="kiri">

			<?php 
				
				echo kategori($kategori_id);
			
			?>
			
		</div>

		<div id="kanan">		
			
			<div id="frame-barang">
				<h3>Obat-obatan yang tersedia.</h3>
				<hr>
			
				<ul>
					<?php
						
						if($kategori_id){
							$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' AND kategori_id='$kategori_id' ORDER BY rand() DESC LIMIT 9");
						}else{
							$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' ORDER BY rand() DESC LIMIT 9");
						}
						
						$no=1;
						while($row=mysqli_fetch_assoc($query)){
							
							$style=false;
							if($no == 3){
								$style="style='margin-right:0px'";
								$no=0;
							}
							
							echo "<li $style>
									<p class='price'>".rupiah($row['harga'])."</p>
									<a href='".base_urls."?page=detail&barang_id=$row[barang_id]'>
										<img src='".base_url."/assets/img/items/$row[gambar]' />
									</a>
									<div class='keterangan-gambar'>
										<p><a href='".base_urls."?page=detail&barang_id=$row[barang_id]'>$row[nama_barang]</a></p>
										<span>Stok : $row[stok]</span>
									</div>
									<div class='button-add-cart'>
										<a href='".base_urls."tambah_keranjang.php?barang_id=$row[barang_id]'>+ add to cart</a>
									</div>";
							
							$no++;
						}
					
					?>
				</ul>
			
			</div>

		</div>
    </section>
</div>

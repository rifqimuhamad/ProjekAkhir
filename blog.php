

<div class="wrapper">
	<section id="store">
		<div id="kiri">

			<?php 
				
				echo kategorib($kategori_id);
			
			?>
			
		</div>

		<div id="kanan">		
			
			<div id="frame-barang">
				<h3>Artikel Terbaru.</h3>
				<hr>
			
				<ul>
					<?php
						
						if($kategori_id){
							$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE status='on' AND kategori_blog_id='$kategori_blog_id' ORDER BY rand() DESC LIMIT 9");
						}else{
							$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE status='on' ORDER BY rand() DESC LIMIT 9");
						}
						
						$no=1;
						while($row=mysqli_fetch_assoc($query)){
							
							$style=false;
							if($no == 3){
								$style="style='margin-right:0px'";
								$no=0;
							}
							
							echo "<li $style>
									<a href='".base_urls."?page=artikel&artikel_id=$row[artikel_id]'>
										<img src='".base_url."/assets/img/artikel/$row[gambar]' />
									</a>
									<div class='keterangan-gambar'>
										<p><a href='".base_urls."?page=artikel&artikel_id=$row[artikel_id]'>$row[nama_artikel]</a></p>
									</div>
									<div class='button-add-cart'>
										<a href='".base_urls."?page=artikel&artikel_id=$row[artikel_id]'>Baca Lebih Lanjut</a>
									</div>";

							
							$no++;
						}
					
					?>
				</ul>
			
			</div>

		</div>
    </section>
</div>
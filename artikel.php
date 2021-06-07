<div class="wrapper">
	<section id="store">
		<div id="kiri">

			<?php 
				
				echo kategorib($kategori_id);
			
			?>

		</div>

		<div id="kanan">
			<?php
				$artikel_id = $_GET['artikel_id'];
				
				$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE artikel_id='$artikel_id' AND status='on'");
				$row = mysqli_fetch_assoc($query);
				
				echo "<div id='detail-barang'>
							<h2>$row[nama_artikel]</h2>
							<div id='frame-gambar'>
								<img style=' height: 168px;
                                                width: 240px;
                                            ' src='".base_url."assets/img/artikel/$row[gambar]' />
							</div>
							<div id='keterangan'>
								<b>Artikel : </b> $row[artikel_blog]
							</div>
						</div>";				
				
			?>
		</div>
	</section>
</div>

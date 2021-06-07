<div class="wrapper row-padding">

	<div id="frame-tambah">
		<a href="<?php echo base_url."?module=manajemen&action=form"; ?>" class="tombol-action">+ Update Covid</a>
	</div>

	<?php
		$queryKategori = mysqli_query($koneksi, "SELECT * FROM provinsi");
		
		if(mysqli_num_rows($queryKategori) == 0){
			echo "<h3>Saat ini belum ada nama kategori di dalam table kategori</h3>";
		}else{
		
			echo "<table class='table-list'>";
			
			echo "<tr class='baris-title'>
					<th class='kolom-nomor'>No</th>
					<th class='kiri'>Nama Provinsi</th>
					<th class='kiri'>Status</th>
					<th class='tengah'>Kasus Positif</th>
					<th class='tengah'>Kasus Sembuh</th>
					<th class='tengah'>Kasus Meninggal</th>
					<th class='tengah'>Action</th>
				 </tr>";
				 
			$no=1;
			while($row=mysqli_fetch_assoc($queryKategori)){
				
				echo "<tr>
						<td class='kolom-nomor'>$no</td>
						<td class='kiri'>$row[provinsi]</td>
						<td class='kiri'>$row[status]</td>
						<td class='tengah'>$row[positif]</td>
						<td class='tengah'>$row[sembuh]</td>
						<td class='tengah'>$row[meninggal]</td>
						<td class='tengah'>
							<a class='tombol-action' href='".base_url."?module=manajemen&action=form&provinsi_id=$row[provinsi_id]'>Edit</a>
						</td>
					  </tr>";
					  
				$no++;
			}
			
			echo "</table>";
		
		}

	?>
</div>
<div class="row-padding"></div>	
<div class="wrapper row-padding">
	<div id="frame-tambah">
		<a href="<?php echo base_url."?module=artikel_blog&action=form"; ?>" class="tombol-action">+ Tambah Barang</a>
	</div>

	<?php

		$query = mysqli_query($koneksi, "SELECT artikel.*, kategori_blog.kategori_blog FROM artikel JOIN kategori_blog ON artikel.kategori_blog_id=kategori_blog.kategori_blog_id");

		if(mysqli_num_rows($query) == 0){
			echo "<h3>Saat ini belum ada artikel di dalam table artikel</h3>";
		}else{
		
			echo "<table class='table-list'>";
			
			echo "<tr class='baris-title'>
					<th class='kolom-nomor'>No</th>
					<th class='kiri'>Barang</th>
					<th class='kiri'>Kategori</th>
					<th class='tengah'>Status</th>
					<th class='tengah'>Action</th>
				 </tr>";
				 
			$no=1;
			while($row=mysqli_fetch_assoc($query)){
				
				echo "<tr>
						<td class='kolom-nomor'>$no</td>
						<td class='kiri'>$row[nama_artikel]</td>
						<td class='kiri'>$row[kategori_blog]</td>
						<td class='tengah'>$row[status]</td>
						<td class='tengah'>
							<a class='tombol-action' href='".base_url."?module=artikel_blog&action=form&artikel_id=$row[artikel_id]'>Edit</a>
						</td>
					  </tr>";
					  
				$no++;
			}
			
			echo "</table>";
		
		}

	?>
</div>
<div class="row-padding"></div>	
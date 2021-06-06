<div class="wrapper row-padding">
	<?php

		$artikel_id = isset($_GET['artikel_id']) ? $_GET['artikel_id'] : false;
		
		$nama_artikel = "";
		$kategori_blog_id = "";
		$artikel = "";
		$gambar = "";
		$status = "";
		$keterangan_gambar = "";
		$button = "Add";
		
		if($artikel_id){
			$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE artikel_id='$artikel_id'");
			$row = mysqli_fetch_assoc($query);
			
			$nama_artikel = $row['nama_artikel'];
			$kategori_blog_id = $row['kategori_blog_id'];
			$artikel = $row['artikel_blog'];
			$gambar = $row['gambar'];
			$status = $row['status'];
			$button = "Update";
			
			$keterangan_gambar = "(Klik pilih gambar jika ingin mengganti gambar disamping)";
			$gambar = "<img src='".base_urls."assets/img/artikel/$gambar' style='width: 200px;vertical-align: middle;' />";
		}

	?>

	<script src="<?php echo base_url."assets/js/ckeditor/ckeditor.js"; ?>"></script>

	<form action="<?php echo base_url."module/artikel_blog/action.php?artikel_id=$artikel_id"; ?>" method="POST" enctype="multipart/form-data">

		<div class="element-form">
			<label>Kategori</label>
			<span>
				
				<select name="kategori_blog_id">
					<?php
						$query = mysqli_query($koneksi, "SELECT kategori_blog_id, kategori_blog FROM kategori_blog WHERE status='on' ORDER BY kategori_blog ASC");
						while($row=mysqli_fetch_assoc($query)){
							if($kategori_blog_id == $row['kategori_blog_id']){
								echo "<option value='$row[kategori_blog_id]' selected='true'>$row[kategori_blog]</option>";
							}else{
								echo "<option value='$row[kategori_blog_id]'>$row[kategori_blog]</option>";
							}
						}
					?>
				</select>
			
			</span>
		</div>

		<div class="element-form">
			<label>Judul Atikel</label>
			<span><input type="text" name="nama_artikel" value="<?php echo $nama_artikel; ?>" /></span>
		</div>	

		<div style="margin-bottom:10px">
			<label style="font-weight:bold">Artikel</label>
			<span><textarea name="artikel" id="editor"><?php echo $artikel; ?></textarea></span>
		</div>	

		<div class="element-form">
			<label>Gambar Produk <?php echo $keterangan_gambar; ?></label>
			<span>
				<input type="file" name="file" /> <?php echo $gambar; ?>
			</span>
		</div>		
		
		<div class="element-form">
			<label>Status</label>
			<span>
				<input type="radio" name="status" value="on" <?php if($status == "on"){ echo "checked='true'"; } ?> /> On
				<input type="radio" name="status" value="off" <?php if($status == "off"){ echo "checked='true'"; } ?> /> Off
			</span>
		</div>	

		<div class="element-form">
			<span><input type="submit" name="button" value="<?php echo $button; ?>" /></span>
		</div>

	</form>

</div>
<div class="row-padding"></div>	
	<script>
		CKEDITOR.replace("editor");
	</script>
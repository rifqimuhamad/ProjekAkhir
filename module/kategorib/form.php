<div class="wrapper row-padding">

	<?php

		$kategori_blog_id = isset($_GET['kategori_blog_id']) ? $_GET['kategori_blog_id'] : false;
		
		$kategori = "";
		$status = "";
		$button = "Add";
		
		if($kategori_blog_id){
			$queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori_blog WHERE kategori_blog_id='$kategori_blog_id'");
			$row = mysqli_fetch_assoc($queryKategori);
			
			$kategori = $row['kategori'];
			$status = $row['status'];
			$button = "Update";
		}

	?>
	<form action="<?php echo base_url."module/kategorib/action.php?kategori_blog_id=$kategori_blog_id"; ?>" method="POST">

		<div class="element-form">
			<label>Kategori</label>
			<span><input type="text" name="kategori" value="<?php echo $kategori; ?>" /></span>
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
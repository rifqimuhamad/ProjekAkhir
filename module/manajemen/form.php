<div class="wrapper row-padding">

	<?php

		$provinsi_id = isset($_GET['provinsi_id']) ? $_GET['provinsi_id'] : false;
		
		$provinsi = "";
		$positif = "";
		$sembuh = "";
		$meninggal	 = "";
		$status = "";
		$button = "Add";
		
		if($provinsi_id){
			$queryKategori = mysqli_query($koneksi, "SELECT * FROM provinsi WHERE provinsi_id='$provinsi_id'");
			$row = mysqli_fetch_assoc($queryKategori);
			$provinsi = $row['provinsi'];
			$positif = $row['positif'];
			$sembuh = $row['sembuh'];
			$meninggal	 = $row['meninggal'];
			$status = $row['status'];
			$button = "Update";
		}

	?>
	<form action="<?php echo base_url."module/manajemen/action.php?provinsi_id=$provinsi_id"; ?>" method="POST">

		<div class="element-form">
			<label>Nama Provinsi</label>
			<span><input type="text" name="provinsi" value="<?php echo $provinsi; ?>" /></span>
		</div>
		<div class="element-form">
			<label>Kasus Positif</label>
			<span><input type="text" name="positif" value="<?php echo $positif; ?>" /></span>
		</div>
		<div class="element-form">
			<label>Kasus Meninggal</label>
			<span><input type="text" name="meninggal" value="<?php echo $meninggal; ?>" /></span>
		</div>
		<div class="element-form">
			<label>Kasus Sembuh</label>
			<span><input type="text" name="sembuh" value="<?php echo $sembuh; ?>" /></span>
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
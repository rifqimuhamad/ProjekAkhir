<div class="wrapper row-padding">
	<?php

		$pesanan_id = $_GET["pesanan_id"];

	?>

	<table class="table-list">

		<form action="<?php echo base_url."?module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="POST">
		
			<div class="element-form">
				<label>Nomor Rekening</label>
				<span><input type="text" name="nomor_rekening" /></span>
			</div>	

			<div class="element-form">
				<label>Nama Account</label>
				<span><input type="text" name="nama_account" /></span>
			</div>		
		
			<div class="element-form">
				<label>Tanggal Transfer (format: yyyy-mm-dd)</label>
				<span><input type="text" name="tanggal_transfer" /></span>
			</div>	

			<div class="element-form">
				<span><input type="submit" value="Konfirmasi" name="button" /></span>
			</div>		
		
		</form>

	</table>
</div>
<div class="row-padding"></div>
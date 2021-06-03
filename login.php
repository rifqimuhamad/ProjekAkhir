<?php

	if($user_id){
		header("location: ".base_url);
	}

?>

<div class="wrapper">

	<div id="container-user-akses" class="row-padding">

		<form action="<?php echo base_url."proses_login.php"; ?>" method="POST">
		
			<?php
			
				$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
				
				if($notif == true){
					echo "<div class='notif'>Maaf, email atau password yang kamu masukan tidak cocok</div>";
				}
			
			?>

			<div class="element-form">
				<label>Email</label>
				<span><input type="text" name="email" /></span>
			</div>
			
			<div class="element-form">
				<label>Password</label>
				<span><input type="password" name="password" /></span>
			</div>	

			<div class="element-form">
				<span><input type="submit" value="login" /></span>
			</div>	
		
		</form>
		
	</div>
</div>
<div class="row-padding"></div>
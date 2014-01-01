<?php echo !defined("ADMIN") ? die("Hacking?"): null; ?>

<article class="module width_full">
	
	<header><h3>SERVER TANITIM</h3></header>
	<div class="module_content">
	
		<p>*Tanıtım resiminizi yada metinizi buraya yazabilirsiniz.</p>
	   
		<?php
		include("../class/class.admin.php");
		$admin = new Admin();
	
		if($_POST){
		
			$icerik=htmlspecialchars($_POST['icerik']);
			$up=$admin->server_tanitim($icerik);
			if($up==1){
				
			echo '<h4 class="alert_success">Başarılı...</h4><br/>';

				
			}else{
				
			echo '<h4 class="alert_error">Beklenmedik HATA !!</h4><br/>';

			}

		}
		
		
		
		$query = $admin->link->db_conn_account->query("SELECT * FROM fy_promotion ");
		$result = $query->fetchAll();
						
		?>
	
	
	<form action="" method="post">
	
	 <textarea class="ckeditor" rows="10"  name="icerik"><?php echo $result[0]['icerik']; ?></textarea>

	</div>
		<footer>
		<div class="submit_link">
			<input type="submit" value="Bitir" class="alt_btn">
	
		</div>
			</footer>
	</form>
			</article>
		<div class="spacer"></div>
	
		
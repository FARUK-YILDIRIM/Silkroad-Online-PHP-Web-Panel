<?php echo !defined("ADMIN") ? die("Hacking?"): null; ?>

<article class="module width_full">
	<header><h3>İNDİRME LİNKİ DÜZENLE</h3></header>
	<div class="module_content">
		<?php
		$id =(int)htmlspecialchars($_GET['id']);
		include("../class/class.admin.php");
		$admin = new Admin();
	
		if($_POST){
			
				$ad = htmlspecialchars($_POST['ad']);
				$link = htmlspecialchars($_POST['link']);
				$boyut = htmlspecialchars($_POST['boyut']);
				$icerik = htmlspecialchars($_POST['icerik']);
				$resim = htmlspecialchars($_POST['resim']);

				if(empty($ad) || empty($link)){
				
					echo '<h4 class="alert_error">AD VE LİNK BOŞ BIRAKILAMAZ...</h4>';
				}else{
				
					if(empty($resim)){
					$resim ='./images/defaultdown.png';
					$downup = $admin->down_update($ad,$link,$boyut,$icerik,$resim,$id);
					}else{
					
					$downup = $admin->down_update($ad,$link,$boyut,$icerik,$resim,$id);

					}
					
					if ($downup == 1){
					 	echo '<h4 class="alert_success">İndirme Linki Güncellendi...</h4>';
					}else{
					
						echo '<h4 class="alert_error">HATA ! Eklenemedi </h4>';
					}
				}
		}
		
		
		
		$query = $admin->link->db_conn_account->query("SELECT * FROM fy_down WHERE id='$id'");
		$result = $query->fetchAll();
		foreach($result as $row){
						
			?>
	
	
		<form action="" method="post" >
						<fieldset>
							<label>AD</label>
							<input type="text" name="ad" value="<?php echo $row['ad']; ?>">
						</fieldset>
						<fieldset>
							<label>LİNK</label>
							<input type="text" name="link" value="<?php echo $row['link']; ?>">
						</fieldset>
						<fieldset>
							<label>BOYUT</label>
							<input type="text" name="boyut" value="<?php echo $row['boyut']; ?>">
						</fieldset>
						<fieldset>
							<label>İCERİK</label><em>Media.pk2 / Full Client Gibi</em>
							<input type="text" name="icerik" value="<?php echo $row['icerik']; ?>">
						</fieldset>
						<fieldset>
							<label>RESİM</label><em>Koymak istermiyorsanız boş bırakın</em>
							<input type="text" name="resim" value="<?php echo $row['resim']; ?>">
						</fieldset>
						
					</div>
				<footer>
				<div class="submit_link">
					<input type="submit" value="Bilgileri Güncelle" class="alt_btn">
			
				</div>
			</footer>
	</form>
			</article>
		<div class="spacer"></div>
		<?php } ?>
		
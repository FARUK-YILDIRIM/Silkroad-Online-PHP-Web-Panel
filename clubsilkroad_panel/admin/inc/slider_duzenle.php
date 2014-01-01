<?php echo !defined("ADMIN") ? die("Hacking?"): null; ?>

<article class="module width_full">
	<header><h3>SLİDER DÜZENLE</h3></header>
	<div class="module_content">
		<?php
		$id =(int)htmlspecialchars($_GET['id']);
		include("../class/class.admin.php");
		$admin = new Admin();
	
		if($_POST){
			
				$baslik = htmlspecialchars($_POST['baslik']);
				$link = htmlspecialchars($_POST['link']);
				$aciklama = htmlspecialchars($_POST['aciklama']);
				$resim = htmlspecialchars($_POST['resim']);

				if(empty($baslik) || empty($link) || empty($aciklama)){
				
					echo '<h4 class="alert_error">BAŞLIK,LİNK VE AÇIKLAMA BOŞ BIRAKILAMAZ...</h4>';
				}else{
				
					if(empty($resim)){
					$resim ='./images/defaultslider.png';
					$sliderup = $admin->slider_update($baslik,$link,$aciklama,$resim,$id);
					}else{
					
					$sliderup = $admin->slider_update($baslik,$link,$aciklama,$resim,$id);

					}
					
					if ($sliderup == 1){
					 	echo '<h4 class="alert_success">Slider güncellendi...</h4>';
					}else{
					
						echo '<h4 class="alert_error">HATA ! Eklenemedi </h4>';
					}
				}
		}
		
		
		
		$query = $admin->link->db_conn_account->query("SELECT * FROM fy_slider WHERE id='$id'");
		$result = $query->fetchAll();
		foreach($result as $row){
						
			?>
	
	
		<form action="" method="post" >
						<fieldset>
							<label>BAŞLIK</label>
							<input type="text" name="baslik" value="<?php echo $row['baslik']; ?>">
						</fieldset>
						<fieldset>
							<label>LİNK</label>
							<input type="text" name="link" value="<?php echo $row['link']; ?>">
						</fieldset>
						<fieldset>
							<label>AÇIKLAMA</label>
							<textarea rows="12" name="aciklama" ><?php echo $row['aciklama']; ?></textarea>
						</fieldset>
						<fieldset>
							<label>RESİM (600x290)</label><em>Koymak istermiyorsanız boş bırakın</em>
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
		
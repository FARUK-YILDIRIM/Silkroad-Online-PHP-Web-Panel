<?php echo !defined("ADMIN") ? die("Hacking?"): null; ?>

<article class="module width_full">
	<header><h3>REFERANSLARI DÜZENLE</h3></header>
	<div class="module_content">
		<?php
		$id =(int)htmlspecialchars($_GET['id']);
		include("../class/class.admin.php");
		$admin = new Admin();
	
		if($_POST){
		
				$ad = htmlspecialchars($_POST['ad']);
				$url = htmlspecialchars($_POST['url']);
				$resim = htmlspecialchars($_POST['resim']);

				if(empty($url)){
				
					echo '<h4 class="alert_error">URL BOŞ BIRAKILAMAZ...</h4>';
				}else{
				
				
					if(empty($resim)){
					$resim ='./images/defaultref.png';
					$hesapgun = $admin->ref_guncelle($ad,$url,$resim,$id);
					}else{
					
					$hesapgun = $admin->ref_guncelle($ad,$url,$resim,$id);

					}
					
					if ($hesapgun == 1){
					 	echo '<h4 class="alert_success">Referans Güncellendi.</h4>';
					}else{
					
						echo '<h4 class="alert_error">HATA !  </h4>';
					}
				}
			
		}
		
		
		
		$query = $admin->link->db_conn_account->query("SELECT * FROM fy_ref WHERE id='$id'");
		$result = $query->fetchAll();
		foreach($result as $row){
						
			?>
	
	
	<form action="" method="post" >
						<fieldset>
							<label>AD</label>
							<input type="text" name="ad" value="<?php echo $row['ad'] ; ?>">
						</fieldset>
						<fieldset>
							<label>SİTE LİNKİ</label>
							<input type="text" name="url" value="<?php echo $row['url']; ?>">
						</fieldset>
						<fieldset>
							<label>RESİM URL</label><em>Eklemek istemiyorsanız boş bırakın</em>
							<input type="text" name="resim" value="<?php echo $row['resim']; ?>">
						</fieldset>
			
						
					</div>
				<footer>
				<div class="submit_link">
					<input type="submit" value="Düzenlemeyi Bitir" class="alt_btn">
			
				</div>
			</footer>
	</form>
			</article>
		<div class="spacer"></div>
		<?php } ?>
		
<?php echo !defined("ADMIN") ? die("Hacking?"): null; ?>

<article class="module width_full">
	<header><h3>ÖDEME YOLU DÜZENLE</h3></header>
	<div class="module_content">
		<?php
		$id =(int)htmlspecialchars($_GET['id']);
		include("../class/class.admin.php");
		$admin = new Admin();
	
		if($_POST){
			
				$ad = htmlspecialchars($_POST['ad']);
				$link = htmlspecialchars($_POST['link']);
				$resim = htmlspecialchars($_POST['resim']);

				if(empty($ad) || empty($link)){
				
					echo '<h4 class="alert_error">ÖDEME ADI VE LİNK BOŞ BIRAKILAMAZ...</h4>';
				}else{
				
					if(empty($resim)){
					$resim ='./images/defaultpay.png';
					$payup = $admin->pay_update($ad,$link,$resim,$id);
					}else{
					
					$payup = $admin->pay_update($ad,$link,$resim,$id);

					}
					
					if ($payup == 1){
					 	echo '<h4 class="alert_success">Ödeme Yöntemi Güncellendi...</h4>';
					}else{
					
						echo '<h4 class="alert_error">HATA ! Eklenemedi </h4>';
					}
				}
		}
		
		
		
		$query = $admin->link->db_conn_account->query("SELECT * FROM fy_pay WHERE id='$id'");
		$result = $query->fetchAll();
		foreach($result as $row){
						
			?>
	
	
		<form action="" method="post" >
						<fieldset>
							<label>ÖDEME ADI</label>
							<input type="text" name="ad" value="<?php echo $row['ad']; ?>">
						</fieldset>
						<fieldset>
							<label>LİNK</label>
							<input type="text" name="link" value="<?php echo $row['link']; ?>">
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
		
<?php echo !defined("ADMIN") ? die("Hacking?"): null; ?>

<article class="module width_full">
	<header><h3>HESAP NUMARASINI DÜZENLE</h3></header>
	<div class="module_content">
		<?php
		$id =(int)htmlspecialchars($_GET['id']);
		include("../class/class.admin.php");
		$admin = new Admin();
	
		if($_POST){
		
				$hesap_sahibi = htmlspecialchars($_POST['hesap_sahibi']);
				$sube_no = htmlspecialchars($_POST['sube_no']);
				$hesap_no = htmlspecialchars($_POST['hesap_no']);
				$iban = htmlspecialchars($_POST['iban']);
				$banka_adi = htmlspecialchars($_POST['banka_adi']);
				$banka_logo = htmlspecialchars($_POST['banka_logo']);

				if(empty($hesap_sahibi) || empty($sube_no) || empty($hesap_no) || empty($iban) || empty($banka_adi)){
				
					echo '<h4 class="alert_error">HESAP SAHİBİ,ŞUBE - HESAP NUMARASI,IBAN VE BANKA ADI BOŞ BIRAKILAMAZ...</h4>';
				}else{
				
				
					if(empty($banka_logo)){
					$banka_logo ='./images/defaultbanka.png';
					$hesapgun = $admin->hesapno_guncelle($hesap_sahibi,$sube_no,$hesap_no,$iban,$banka_adi,$banka_logo,$id);
					}else{
					
					$hesapgun = $admin->hesapno_guncelle($hesap_sahibi,$sube_no,$hesap_no,$iban,$banka_adi,$banka_logo,$id);

					}
					
					if ($hesapgun == 1){
					
					 	echo '<h4 class="alert_success">Hesap Numarası Güncellendi.</h4>';
						
						
					}else{
	
						echo '<h4 class="alert_error">HATA !  </h4>';
					}
				}
			
		}
		
		
		
		$query = $admin->link->db_conn_account->query("SELECT * FROM fy_hesapno WHERE id='$id'");
		$result = $query->fetchAll();
		foreach($result as $row){
						
			?>
	
	
	<form action="" method="post" >
						<fieldset>
							<label>HESAP SAHİBİ</label>
							<input type="text" name="hesap_sahibi" value="<?php echo $row['hesapSahibi'] ; ?>">
						</fieldset>
						<fieldset>
							<label>ŞUBE NUMARASI</label>
							<input type="text" name="sube_no" value="<?php echo $row['subeNo']; ?>">
						</fieldset>
						<fieldset>
							<label>HESAP NUMARASI</label>
							<input type="text" name="hesap_no" value="<?php echo $row['hesapNo']; ?>">
						</fieldset>
						<fieldset>
							<label>IBAN</label>
							<input type="text" name="iban" value="<?php echo $row['IBAN']; ?>">
						</fieldset>
						<fieldset>
							<label>BANKA ADI</label>
							<input type="text" name="banka_adi" value="<?php echo $row['bankaAdi']; ?>">
						</fieldset>
						<fieldset>
							<label>BANKA LOGO URL</label><em>Bankanın sitesinden logo url'sine ulaşabilirsiniz.Koymak istermiyorsanız boş bırakın</em>
							<input type="text" name="banka_logo" value="<?php echo $row['bankaLogo'];?>">
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
		
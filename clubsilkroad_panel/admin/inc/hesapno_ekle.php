<?PHP error_reporting(E_ALL); ini_set("display_errors", 1); 
echo !defined("ADMIN") ? die("Hacking?"): null;?>	
<article class="module width_full">
	<header><h3>HESAP NUMARASI EKLE</h3></header>
	<div class="module_content">
		
		<?php 
		
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
				
					include("../class/class.admin.php");
					$admin = new Admin();	
					if(empty($banka_logo)){
					$banka_logo ='./images/defaultbanka.png';
					$hesapekle = $admin->hesapno_ekle($hesap_sahibi,$sube_no,$hesap_no,$iban,$banka_adi,$banka_logo);
					}else{
					
					$hesapekle = $admin->hesapno_ekle($hesap_sahibi,$sube_no,$hesap_no,$iban,$banka_adi,$banka_logo);

					}
					
					if ($hesapekle == 1){
					 	echo '<h4 class="alert_success">Hesap Numarası eklendi</h4>';
					}else{
					
						echo '<h4 class="alert_error">HATA ! Eklenemedi </h4>';
					}
				}
		}
	
		?>
	
	
	<form action="" method="post" >
						<fieldset>
							<label>HESAP SAHİBİ</label>
							<input type="text" name="hesap_sahibi">
						</fieldset>
						<fieldset>
							<label>ŞUBE NUMARASI</label>
							<input type="text" name="sube_no">
						</fieldset>
						<fieldset>
							<label>HESAP NUMARASI</label>
							<input type="text" name="hesap_no">
						</fieldset>
						<fieldset>
							<label>IBAN</label>
							<input type="text" name="iban">
						</fieldset>
						<fieldset>
							<label>BANKA ADI</label>
							<input type="text" name="banka_adi">
						</fieldset>
						<fieldset>
							<label>BANKA LOGO URL</label><em>Bankanın sitesinden logo url'sine ulaşabilirsiniz.Koymak istermiyorsanız boş bırakın</em>
							<input type="text" name="banka_logo">
						</fieldset>
						
					</div>
				<footer>
				<div class="submit_link">
					<input type="submit" value="Hesap Numarası Ekle" class="alt_btn">
			
				</div>
			</footer>
	</form>
</article>
		<div class="spacer"></div>
		
		
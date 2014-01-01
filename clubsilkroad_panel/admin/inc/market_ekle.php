<?PHP error_reporting(E_ALL); ini_set("display_errors", 1); 
echo !defined("ADMIN") ? die("Hacking?"): null;?>	
<article class="module width_full">
	<header><h3>MARKETE İTEM EKLE</h3></header>
	<div class="module_content">
		
		<?php 
		
			if($_POST){
				
				$isim = htmlspecialchars($_POST['isim']);
				$kod = htmlspecialchars($_POST['kod']);
				$arti_miktari =(int)$_POST['arti_miktari'];
				$pot_sc_miktari = (int)$_POST['pot_sc_miktari'];
				$silk =(int)$_POST['silk'];
				$tl = (int)$_POST['tl'];
				$resim = htmlspecialchars($_POST['resim']);
				
				if(empty($isim) || empty($kod))
				{
					echo '<h4 class="alert_error">İtemin Marketteki Adı ve Kodu\'nu doldurunuz.</h4>';
				}else
				{
					
					include("../class/class.admin.php");
					$admin = new Admin();	
					if(empty($resim)){
					$resim ='./images/defaultmarket.png';
					$item_ekle = $admin->market_item_ekle($isim,$kod,$arti_miktari,$pot_sc_miktari,$silk,$tl,$resim);
					}else{
					
					$item_ekle = $admin->market_item_ekle($isim,$kod,$arti_miktari,$pot_sc_miktari,$silk,$tl,$resim);

					}
					
					if ($item_ekle == 1){
					 	echo '<h4 class="alert_success">İtem eklendi...</h4>';
					}else{
					
						echo '<h4 class="alert_error">HATA ! Eklenemedi </h4>';
					}
					
				}
				
			}
	
		?>
	
	
	<form action="" method="post" >
						<fieldset>
							<label>MARKETTEKİ ADI</label><em>Premium Plus,+9 SUN BLADE gibi</em>
							<input type="text" name="isim">
						</fieldset>
						<fieldset>
							<label>İTEM KODU</label><em>ITEM_EU_STAFF_05_C_RARE gibi...</em>
							<input type="text" name="kod">
						</fieldset>
						<fieldset>
							<label>ARTI MİKTARI</label><em>Sadece İtemler için (blade,shoulder,glavie gibi)</em>
							<input type="text" name="arti_miktari" value="0">
						</fieldset>
						<fieldset>
							<label>POT-SC'LER İÇİN MİKTAR</label><em>HP,MP,VİGOR,SCROLL vb...  İtemler için bu kısmı kullanmayın</em>
							<input type="text" name="pot_sc_miktari" value="1">
						</fieldset>
						<fieldset>
							<label>GEREKLİ SİLK MİKTARI</label><em>İtem için istenilen Silk Miktarı</em>
							<input type="text" name="silk" value="0">
						</fieldset>
						<fieldset>
							<label>GEREKLİ TL MİKTARI</label><em> İtem için istenilen TL miktarı</em>
							<input type="text" name="tl" value="0">
						</fieldset>
						<fieldset>
							<label>KÜCÜK RESİM</label><em>Koymak istemiyorsanız boş bırakın</em>
							<input type="text" name="resim" >
						</fieldset>
						
					</div>
				<footer>
				<div class="submit_link">
					<input type="submit" value="Markete İtem Ekle" class="alt_btn">
			
				</div>
			</footer>
	</form>
</article>
		<div class="spacer"></div>
		
		
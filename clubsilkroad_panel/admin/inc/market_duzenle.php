<?php echo !defined("ADMIN") ? die("Hacking?"): null; ?>

<article class="module width_full">
	<header><h3>MARKET İTEM DÜZENLE</h3></header>
	<div class="module_content">
		<?php
		$id =(int)htmlspecialchars($_GET['id']);
		include("../class/class.admin.php");
		$admin = new Admin();
	
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
					
					if(empty($resim)){
					$resim ='./images/defaultmarket.png';
					$item_duzenle = $admin->market_update($isim,$kod,$arti_miktari,$pot_sc_miktari,$silk,$tl,$resim,$id);
					}else{
					
					$item_duzenle = $admin->market_update($isim,$kod,$arti_miktari,$pot_sc_miktari,$silk,$tl,$resim,$id);

					}
					
					if ($item_duzenle == 1){
					 	echo '<h4 class="alert_success">Düzenleme Başarılı...</h4>';
					}else{
					
						echo '<h4 class="alert_error">HATA ! </h4>';
					}
					
				}
				
			}
		
		
		$query = $admin->link->db_conn_account->query("SELECT * FROM fy_markets WHERE id='$id'");
		$result = $query->fetchAll();
		foreach($result as $row){
						
			?>
	
	
		<form action="" method="post" >
						<fieldset>
							<label>MARKETTEKİ ADI</label><em>Premium Plus,+9 SUN BLADE gibi</em>
							<input type="text" name="isim" value="<?php echo $row['item_adi'] ?>">
						</fieldset>
						<fieldset>
							<label>İTEM KODU</label><em>ITEM_EU_STAFF_05_C_RARE gibi...</em>
							<input type="text" name="kod" value="<?php echo $row['item_kodu'] ?>">
						</fieldset>
						<fieldset>
							<label>ARTI MİKTARI</label><em>Sadece İtemler için (blade,shoulder,glavie gibi)</em>
							<input type="text" name="arti_miktari" value="<?php echo $row['arti_miktari'] ?>">
						</fieldset>
						<fieldset>
							<label>POT-SC'LER İÇİN MİKTAR</label><em>HP,MP,VİGOR,SCROLL vb... İtemler için bu kısmı kullanmayın</em>
							<input type="text" name="pot_sc_miktari" value="<?php echo $row['pot_sc_miktari'] ?>">
						</fieldset>
						<fieldset>
							<label>GEREKLİ SİLK MİKTARI</label><em>İtem için istenilen Silk Miktarı</em>
							<input type="text" name="silk" value="<?php echo $row['silk'] ?>">
						</fieldset>
						<fieldset>
							<label>GEREKLİ TL MİKTARI</label><em> İtem için istenilen TL miktarı</em>
							<input type="text" name="tl" value="<?php echo $row['tl'] ?>">
						</fieldset>
						<fieldset>
							<label>KÜCÜK RESİM</label><em>Koymak istemiyorsanız boş bırakın</em>
							<input type="text" name="resim" value="<?php echo $row['resim'] ;?>">
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
		
<?PHP error_reporting(E_ALL); ini_set("display_errors", 1); 
echo !defined("ADMIN") ? die("Hacking?"): null;?>	
<article class="module width_full">
	<header><h3>İndirme Linki EKLE</h3></header>
	<div class="module_content">

		<?php 
		
		if($_POST){
			
				$ad = htmlspecialchars($_POST['ad']);
				$link = htmlspecialchars($_POST['link']);
				$boyut = htmlspecialchars($_POST['boyut']);
				$icerik = htmlspecialchars($_POST['icerik']);
				$resim = htmlspecialchars($_POST['resim']);

				if(empty($ad) || empty($link)){
				
					echo '<h4 class="alert_error">Site Adı Ve Link Boş Bırakılamaz...</h4>';
				}else{
				
					include("../class/class.admin.php");
					$admin = new Admin();	
					if(empty($resim)){
					$resim ='./images/defaultdown.png';
					$downekle = $admin->down_ekle($ad,$link,$boyut,$icerik,$resim);
					}else{
					
					$downekle = $admin->down_ekle($ad,$link,$boyut,$icerik,$resim);

					}
					
					if ($downekle == 1){
					 	echo '<h4 class="alert_success">İndirme Linki Eklendi...</h4>';
					}else{
					
						echo '<h4 class="alert_error">HATA ! Eklenemedi </h4>';
					}
				}
		}
	
		?>
	
	
	<form action="" method="post" >
						<fieldset>
							<label>SİTE ADI</label>
							<input type="text" name="ad">
						</fieldset>
						<fieldset>
							<label>LİNK</label>
							<input type="text" name="link">
						</fieldset>
						<fieldset>
							<label>BOYUT</label>
							<input type="text" name="boyut">
						</fieldset>
						<fieldset>
							<label>İÇERİK</label><em>Media.pk2 / Full Client Gibi</em>
							<input type="text" name="icerik">
						</fieldset>
						<fieldset>
							<label>RESİM</label><em>Koymak istermiyorsanız boş bırakın</em>
							<input type="text" name="resim">
						</fieldset>
						
					</div>
				<footer>
				<div class="submit_link">
					<input type="submit" value="İndirme Linki Ekle" class="alt_btn">
			
				</div>
			</footer>
	</form>
</article>
		<div class="spacer"></div>
		
		
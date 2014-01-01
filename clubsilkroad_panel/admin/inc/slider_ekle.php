<?PHP error_reporting(E_ALL); ini_set("display_errors", 1); 
echo !defined("ADMIN") ? die("Hacking?"): null;?>	
<article class="module width_full">
	<header><h3>SLİDER EKLE</h3></header>
	<div class="module_content">
		<p>*Ekleyeceğiniz resimlerin düzgün gözükmesi için boyutunu 600x290 olarak ayarlayınız.</p>
		<?php 
		
		if($_POST){
			
				$baslik = htmlspecialchars($_POST['baslik']);
				$link = htmlspecialchars($_POST['link']);
				$aciklama = htmlspecialchars($_POST['aciklama']);
				$resim = htmlspecialchars($_POST['resim']);

				if(empty($baslik) || empty($link) || empty($aciklama)){
				
					echo '<h4 class="alert_error">BAŞLIK,LİNK VE AÇIKLAMA BOŞ BIRAKILAMAZ...</h4>';
				}else{
				
					include("../class/class.admin.php");
					$admin = new Admin();	
					if(empty($resim)){
					$resim ='./images/defaultslider.png';
					$sliderekle = $admin->slider_ekle($baslik,$link,$aciklama,$resim);
					}else{
					
					$sliderekle = $admin->slider_ekle($baslik,$link,$aciklama,$resim);

					}
					
					if ($sliderekle == 1){
					 	echo '<h4 class="alert_success">Slider eklendi...</h4>';
					}else{
					
						echo '<h4 class="alert_error">HATA ! Eklenemedi </h4>';
					}
				}
		}
	
		?>
	
	
	<form action="" method="post" >
						<fieldset>
							<label>BAŞLIK</label>
							<input type="text" name="baslik">
						</fieldset>
						<fieldset>
							<label>LİNK</label>
							<input type="text" name="link">
						</fieldset>
						<fieldset>
							<label>AÇIKLAMA</label>
							<textarea rows="12" name="aciklama"></textarea>
						</fieldset>
						<fieldset>
							<label>RESİM (600x290)</label><em>Koymak istermiyorsanız boş bırakın</em>
							<input type="text" name="resim">
						</fieldset>
						
					</div>
				<footer>
				<div class="submit_link">
					<input type="submit" value="Slider Ekle" class="alt_btn">
			
				</div>
			</footer>
	</form>
</article>
		<div class="spacer"></div>
		
		
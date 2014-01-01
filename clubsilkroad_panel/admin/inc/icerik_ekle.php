<?PHP echo !defined("ADMIN") ? die("Hacking?"): null;?>	
<article class="module width_full">
	<header><h3>BLOG EKLE</h3></header>
	<div class="module_content">
		
		<?php 
		
		if($_POST){
			
				$konu_baslik = htmlspecialchars($_POST['konu_baslik']);
				$konu_anasayfa_aciklama = htmlspecialchars($_POST['konu_anasayfa_aciklama']);
				$konu_full_aciklama = htmlspecialchars($_POST['konu_full_aciklama']);
				$resim = htmlspecialchars($_POST['resim']);
				$tarih = date("d.m.Y H:i:s");
				
				if(empty($konu_baslik) || empty($konu_anasayfa_aciklama) || empty($konu_full_aciklama))
				{
					echo '<h4 class="alert_error">Başlık,Ana Sayfa İçerik,Full İçerik Boş Bırakılamaz.</h4>';
				}else if(strlen($konu_anasayfa_aciklama) > 400){
				
					echo '<h4 class="alert_error">Ana sayfa açıklama metni 400 karakterden fazla olamaz.(Boşluklar dahil)</h4>';
				}else{
				
				include('../class/class.admin.php');
				$admin = new Admin();
					if(empty($resim)){
					$resim = "./images/default.png";
					$ekle = $admin -> icerik_ekle($konu_baslik,$konu_anasayfa_aciklama,$konu_full_aciklama,$resim,$tarih);
					}else{
					$ekle = $admin -> icerik_ekle($konu_baslik,$konu_anasayfa_aciklama,$konu_full_aciklama,$resim,$tarih);
					}
					if ($ekle == 1){
					 	echo '<h4 class="alert_success">İçerik başarı ile eklendi</h4>';
					}else{
					
						echo '<h4 class="alert_error">HATA ! Eklenemedi </h4>';
					}
				}

		}
	
		?>
	
	
	<form action="" method="post" enctype="multipart/form-data">
						<fieldset>
							<label>KONU BAŞLIĞI</label>
							<input type="text" name="konu_baslik">
						</fieldset>
						<fieldset>
					        
							<label>KONU ANASAYFA AÇIKLAMASI</label> <em>(Maximum 400 karakter)</em>
							<textarea rows="3"  name="konu_anasayfa_aciklama"></textarea>
						</fieldset>
					
							<label><strong>KONU FULL AÇIKLAMASI</strong></label>
							<textarea class="ckeditor" rows="10"  name="konu_full_aciklama"></textarea>
						
						<fieldset>
							<label>ANA SAYFA KONU RESMİ</label> <em>Resim eklemek istiyorsanız resimin URL'sini buraya yazın</em>
							<input type="text" name="resim">
						</fieldset>		
					</div>
				<footer>
				<div class="submit_link">
					<input type="submit" value="Konu Ekle" class="alt_btn">
			
				</div>
			</footer>
	</form>
</article>
		<div class="spacer"></div>
		
		
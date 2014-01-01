<?php echo !defined("ADMIN") ? die("Hacking?"): null; ?>

<article class="module width_full">
	<header><h3>BLOG DÜZENLE</h3></header>
	<div class="module_content">
		<?php
		$id =(int)htmlspecialchars($_GET['id']);
		include("../class/class.admin.php");
		$admin = new Admin();
	
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
			$admin->icerik_guncelle($konu_baslik,$konu_anasayfa_aciklama,$konu_full_aciklama,$resim,$tarih,$id);
			if($admin == true){
			 echo '<h4 class="alert_success">Başarılı...</h4>';
			}else{
			
			 echo '<h4 class="alert_error">HATA !!</h4>';
			}
		}
	}
		
		
		
		$query = $admin->link->db_conn_account->query("SELECT * FROM fy_blog WHERE id='$id'");
		$result = $query->fetchAll();
		foreach($result as $row){
						
			?>
	
	
	<form action="" method="post">
				<fieldset>
					<label>KONU BAŞLIĞI</label>
					<input type="text" name="konu_baslik" value="<?php echo $row['baslik'] ?>">
				</fieldset>
				<fieldset>
					<label>KONU ANASAYFA AÇIKLAMASI</label> <em>(Maximum 400 karakter)</em>
					<textarea rows="3"  name="konu_anasayfa_aciklama" ><?php echo $row['icerik']; ?></textarea>
				</fieldset>
				
					<label><strong>KONU FULL AÇIKLAMASI</strong></label>
					<textarea class="ckeditor" rows="10"  name="konu_full_aciklama"><?php echo $row['icerikfull']; ?></textarea>
					
				<fieldset>
					<label>ANA SAYFA KONU RESMİ</label> <em>Resim eklemek istiyorsanız resimin URL'sini buraya yazın</em>
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
		
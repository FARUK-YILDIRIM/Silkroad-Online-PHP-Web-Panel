<?PHP echo !defined("ADMIN") ? die("Hacking?"): null; ?>	
<article class="module width_full">
	<header><h3>KULLANICI DÜZENLE</h3></header>
	<div class="module_content">
		
		<?php 
			include("../class/class.admin.php");
			$admin = new Admin();
			
			if (isset($_POST['islem'])){
			  $username = htmlspecialchars($_POST['username']);
			  if(empty($username)) { 
			  die ('<h4 class="alert_error">Kullanıcı Adı (id) Boş bırakılamaz.!</h4> <br />');
			  }
			  
			  $deger = $admin -> kullanici($username);
			 
			  if(sizeof($deger) == 0){
			  die ('<h4 class="alert_error">'.$username.' adında bir kullanıcı bulunamadı.</h4> <br />
				   <h4 class="alert_warning">Kullanıcı Adı Karakter(char) ismi değildir.Oyuna giriş yapılan id dir.</h4><br />');
			  }
			 
		
	echo '<form action="" method="post" >
						<fieldset>
							<label>KULLANICI ADI</label>
							<input type="hidden" name="username" value ="'.$deger[0]['StrUserID'].'">
							<input type="text" name="kul_adi" value ="'.$deger[0]['StrUserID'].'">
						</fieldset>
						<fieldset>
							<label>ŞİFRE (MD5)</label>
							<input type="text" name="sifre_md5" value ="'.$deger[0]['password'].'">
						</fieldset>
						<fieldset>
							<label>E-MAİL</label>
							<input type="text" name="email" value ="'.$deger[0]['Email'].'">
						</fieldset>
						<fieldset>
							<label>GİZLİ CEVAP</label>
							<input type="text" name="gizli_cevap" value ="'.$deger[0]['address'].'">
						</fieldset>
						<fieldset>
							<label>TL MİKTARI</label>
							<input type="text" name="tl" value ="'.$deger[0]['phone'].'">
						</fieldset>
						<fieldset>
							<label>KAYIT YAPILAN TARİH</label>
							<input type="text" name="tarih" value ="'.$deger[0]['regtime'].'">
						</fieldset>
						<fieldset>
							<label>KAYIT YAPILAN İP ADRESİ</label>
							<input type="text" name="reg_ip" value ="'.$deger[0]['reg_ip'].'">
						</fieldset>
						
					</div>
				<footer>
				<div class="submit_link">
					<input type="submit" value="Düzenlemeyi Bitir" class="alt_btn" name="bitir">
			
				</div>
			</footer>
	</form>
</article>
		<div class="spacer"></div> ';
	}else{

			echo '<form action="" method="post" enctype="multipart/form-data">
						<fieldset style="margin-bottom:15px">
							<label>Kullanıcı Adı</label>
							<input type="text" name="username">
						</fieldset>
						
					</div>
				<footer>
				<div class="submit_link">
					<input type="submit" value="işlem yap" class="alt_btn" name="islem">
				</div>
			</footer>
	</form>
</article>
		<div class="spacer"></div>';

	}	
			
		
			if(isset($_POST['bitir'])){
		  
			$kul_adi = htmlspecialchars($_POST['kul_adi']);
			$sifre_md5 = htmlspecialchars($_POST['sifre_md5']);
			$email = htmlspecialchars($_POST['email']);
			$gizli_cevap = htmlspecialchars($_POST['gizli_cevap']);
			$tl=(int)$_POST['tl'];
			$tarih = htmlspecialchars($_POST['tarih']);
			$reg_ip = htmlspecialchars($_POST['reg_ip']);
			$username =$_POST['username'];
			
			$deger = $admin->kullanici_update($kul_adi,$sifre_md5,$email,$gizli_cevap,$tl,$tarih,$reg_ip,$username);
			
			if($deger == 1){
			
			echo '<h4 class="alert_success">Başarılı ! Bilgiler Güncellendi.</h4>';
			
			}
			else{
			
			echo '<h4 class="alert_error">Beklenmedik HATA !!!</h4>';
			
			}

		}
	
	
	
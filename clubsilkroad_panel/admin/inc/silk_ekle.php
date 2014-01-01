<?PHP echo !defined("ADMIN") ? die("Hacking?"): null; ?>	
<article class="module width_full">
	<header><h3>SİLK EKLE / SİL</h3></header>
	<div class="module_content">
		<?php 
		include("../class/class.admin.php");
		$admin = new Admin();

		if(isset($_POST['islem'])){
		  $username = htmlspecialchars($_POST['username']);
		  if(empty($username)) { 
		  die ('<h4 class="alert_error">Kullanıcı Adı (id) Boş bırakılamaz.!</h4> <br />');
		  }
		  $deger = $admin->silk($username);
		 print_r($deger);
		  if(sizeof($deger) == 0){
		  die ('<h4 class="alert_error">'.$username.' adında bir kullanıcı bulunamadı.</h4> <br />
			   <h4 class="alert_warning">Kullanıcı Adı Karakter(char) ismi değildir.Oyuna giriş yapılan id dir.</h4><br />');
		  }else{
		  echo '*İşlem Yapılan Kullanıcı  = <strong style="font-size:16px">'.$username.'</strong><br />';
		   foreach($deger as $row){	   
 echo '<form action="" method="post" enctype="multipart/form-data">


						<fieldset style="width:48%; float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>SİLK EKLE</label>
							<input type="text" style="width:92%;" name="silkekle">
							<input type="hidden" name="jid" value="'.$row['JID'].'">
							<input type="submit" value="Ekle" class="alt_btn" name="silk_ekle" >
						</fieldset>
		
						<fieldset style="width:48%; float:left; "> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>SİLK SİL</label>
							<input type="hidden" name="jid" value="'.$row['JID'].'">
							<input type="text" style="width:92%;" name="silksil">
							<input type="submit" value="Sil" class="alt_btn" name="silk_sil" >
						</fieldset>

						<fieldset>
						<label>OYUNCUNUN SİLK MİKTARI</label>
						<input type="hidden" name="jid" value="'.$row['JID'].'">
						<input type="text" name="silkguncelle" value="'.$row['silk_own'].'">
						</fieldset>
					<div class="submit_link">
					<input type="submit" value="Silk Miktarını Güncelle" class="alt_btn" name="silk_guncelle">
					</div>
						<div class="clear"></div>
						<h4 class="alert_info">Silk eklemek ve silmek için sadece miktarı girip gerekli(ekle/sil) butona tıklamanız yeterli.İsteginize göre kişinin silk miktarınıda güncelleyebilirsiniz.</h4><br />
					</div>
				<footer>
				
			</footer>
	
</article>
		<div class="spacer"></div>';
			  

				 }
				 
	          } 

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
			if (isset($_POST['silk_ekle'])){
				$JID = $_POST['jid'];
				$addsilk =(int)$_POST['silkekle'];
				$ekle=$admin->silk_ver($addsilk,$JID);
				if($ekle == 1){ 

				echo '<h4 class="alert_success">Kullanıcıya <span style="font-size:15px;color:red">'.$addsilk.' SİLK </span> Başarıyla eklendi...</h4>';
				echo '<h4 class="alert_warning">Dikkat ! Sayfayı her yenilediğiniz de(F5)  kullanıcıya tekrar '.$addsilk.' Silk eklenecektir.</h4>';
				
				}
				else{
				
				echo '<h4 class="alert_error">Beklenmeyen Hata !! </h4>';
				
				}

			}
				
			if (isset($_POST['silk_sil'])){

				$JID = $_POST['jid'];
				$addsilk =(int)$_POST['silksil'];
				$ekle=$admin->silk_sil($addsilk,$JID);
				if($ekle == 1){ 

				echo '<h4 class="alert_success">Kullanıcıdan <span style="font-size:15px;color:red">'.$addsilk.' SİLK </span> Başarıyla silindi...</h4>';
				echo '<h4 class="alert_warning">Dikkat ! Sayfayı her yenilediğiniz de(F5)  kullanıcıdan tekrar '.$addsilk.' Silk silinecektir.</h4>';
				
				}
				else{
				
				echo '<h4 class="alert_error">Beklenmeyen Hata !! </h4>';
				
				}
					
			}

			if (isset($_POST['silk_guncelle'])){
			
				$JID = $_POST['jid'];
				$addsilk =(int)$_POST['silkguncelle'];
				$ekle=$admin->silk_guncelle($addsilk,$JID);
				if($ekle == 1){ 

				echo '<h4 class="alert_success">Kullanıcının silk miktarı başarıyla güncellenmiştir...Yeni Silk Miktarı =  <span style="font-size:15px;color:red">'.$addsilk.' SİLK</span> </h4>';
				
				}
				else{
				
				echo '<h4 class="alert_error">Beklenmeyen Hata !! </h4>';
				
				}
			}
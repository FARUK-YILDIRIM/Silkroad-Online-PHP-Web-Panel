<?PHP echo !defined("ADMIN") ? die("Hacking?"): null; ?>	
<article class="module width_full">
	<header><h3>GOLD EKLE / SİL</h3></header>
	<div class="module_content">
		<?php 
		include("../class/class.admin.php");
		$admin = new Admin();
		
		if (isset($_POST['islem'])){
			$username = htmlspecialchars($_POST['username']);
			  if(empty($username)) { 
				die ('<h4 class="alert_error">Karakter Adı Boş bırakılamaz.!</h4> <br />');
			}
			$deger =$admin->gold($username);
		 if(sizeof($deger) == 0){
		  die ('<h4 class="alert_error">'.$username.' adında bir karakter adı bulunamadı.</h4> <br />');
		  }else{
		  echo '*İşlem Yapılan Karakter  = <strong style="font-size:16px">'.$username.'</strong> <br />*Gold Miktarı = <strong>'.number_format($deger[0]['RemainGold']).'</strong><br />';
		   foreach($deger as $row){	   
 echo '<form action="" method="post" enctype="multipart/form-data">


						<fieldset style="width:48%; float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>GOLD EKLE</label>
							<input type="text" style="width:92%;" name="goldekle">
							<input type="hidden" name="jid" value="'.$row['CharName16'].'">
							<input type="submit" value="Ekle" class="alt_btn" name="gold_ekle" >
						</fieldset>
		
						<fieldset style="width:48%; float:left; "> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>GOLD SİL</label>
							<input type="hidden" name="jid" value="'.$row['CharName16'].'">
							<input type="text" style="width:92%;" name="goldsil">
							<input type="submit" value="Sil" class="alt_btn" name="gold_sil" >
						</fieldset>

						<fieldset>
						<label>KARAKTERİN GOLD  MİKTARI</label>
						<input type="hidden" name="jid" value="'.$row['CharName16'].'">
						<input type="text" name="gold_update" value="'.$row['RemainGold'].'" >
						</fieldset>
					<div class="submit_link">
					<input type="submit" value="Gold Miktarını Güncelle" class="alt_btn" name="gold_guncelle">
					</div>
						<div class="clear"></div>
						<h4 class="alert_warning">Dikkat !! Gold Ekleme işleminde karakterin oyunda olmaması yada işlem sona ermeden oyun içinde gold ile ilgili işlem yapmaması gerekir.</h4>
						<h4 class="alert_warning">Eklediğiniz goldun karakter de gözükmesi için karakterin bir yere ışınlanması gerekir.</h4>
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
							<label>Karakter Adı</label>
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
		
			if (isset($_POST['gold_ekle'])){
				$charname = $_POST['jid'];
				$addgold =(float)$_POST['goldekle'];
				$ekle=$admin->gold_ver($addgold,$charname);
				if($ekle == 1){ 

				echo '<h4 class="alert_success">Kullanıcıya <span style="font-size:15px;color:red">'.$addgold.' GOLD </span> Başarıyla eklendi...</h4>';
				echo '<h4 class="alert_warning">Dikkat ! Sayfayı her yenilediğiniz de(F5)  kullanıcıya tekrar '.$addgold.' Gold eklenecektir.</h4>';
				
				}
				else{
				
				echo '<h4 class="alert_error">Beklenmeyen Hata !! </h4>';
				
				}

			}
				
			if (isset($_POST['gold_sil'])){

				$charname = $_POST['jid'];
				$addgold =(float)$_POST['goldsil'];
				$ekle=$admin->gold_sil($addgold,$charname);
				if($ekle == 1){ 

				echo '<h4 class="alert_success">Kullanıcıdan <span style="font-size:15px;color:red">'.$addgold.' GOLD </span> Başarıyla silindi...</h4>';
				echo '<h4 class="alert_warning">Dikkat ! Sayfayı her yenilediğiniz de(F5)  kullanıcıdan tekrar '.$addgold.' Gold silinecektir.</h4>';
				
				}
				else{
				
				echo '<h4 class="alert_error">Beklenmeyen Hata !! </h4>';
				
				}
					
			}

			if (isset($_POST['gold_guncelle'])){
			
				$charname = $_POST['jid'];
				$addgold =(float)$_POST['gold_update'];
				$ekle=$admin->gold_guncelle($addgold,$charname);
				if($ekle == 1){ 

				echo '<h4 class="alert_success">Kullanıcının gold miktarı başarıyla güncellenmiştir...Yeni GOLD Miktarı =  <span style="font-size:15px;color:red">'.$addgold.' GOLD</span> </h4>';
				
				}
				else{
				
				echo '<h4 class="alert_error">Beklenmeyen Hata !! </h4>';
				
				}
			}
	
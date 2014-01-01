<?PHP error_reporting(E_ALL); ini_set("display_errors", 1); 
echo !defined("ADMIN") ? die("Hacking?"): null;?>	
<article class="module width_full">
	<header><h3>BUGDAN KURTAR</h3></header>
	<div class="module_content">
	
		<?php 
		
		include('../class/class.admin.php');
		$admin = new Admin();
		
		if($_POST){
			
			$karakter = htmlspecialchars($_POST['karakteradi']);
			@$sex = htmlspecialchars($_POST['sex']);
			 $deger = $admin->karakter($karakter);
			 
			 if(empty($karakter) || empty($sex)){
				 
				 echo "Gerekli Alanlar Doldurulmamış";
				 
			 }else  if(sizeof($deger) == 0){
				 
			  echo  ('<h4 class="alert_error">'.$karakter.' adında bir Karakter(char) bulunamadı.</h4> <br />');
			  
			  }else if($sex == "hotan"){
				 
			   $sonuc = $admin->bug(23431,1200,0,450,$karakter);
				if($sonuc == 1){
					
					echo '<h4 class="alert_success">İşlem Başarılı...</h4>';
				}else{
					
					echo '<h4 class="alert_error">Beklenmedik HATA !</h4>';
				}		
				
			 }else if($sex == "jangan"){
				 
				 $sonuc = $admin->bug(25000,1050,0,480,$karakter);
				if($sonuc == 1){
					
					echo '<h4 class="alert_success">İşlem Başarılı...</h4>';
				}else{
					
					echo '<h4 class="alert_error">Beklenmedik HATA !</h4>';
				}		
				
			 }else if($sex == "dw"){
			
				$sonuc = $admin->bug(26265,900,0,810,$karakter);
				if($sonuc == 1){
					
					echo '<h4 class="alert_success">İşlem Başarılı...</h4>';
				}else{
					
					echo '<h4 class="alert_error">Beklenmedik HATA !</h4>';
				}		
				
			 }else if($sex == "semer"){

				 $sonuc = $admin->bug(27244,60,0,840,$karakter);
				if($sonuc == 1){
					
					echo '<h4 class="alert_success">İşlem Başarılı...</h4>';
				}else{
					
					echo '<h4 class="alert_error">Beklenmedik HATA !</h4>';
				}		
			 }
			 
		     
		}
	
		?>
	
	
	<form action="" method="post" >
						<fieldset>
							<label>KARAKTER ADI</label>
							<input type="text" name="karakteradi">
						</fieldset>
						<fieldset>
						<input type="radio" name="sex" value="hotan">Hotan
						<input type="radio" name="sex" value="jangan">Jangan
						<input type="radio" name="sex" value="dw">Donwhang
						<input type="radio" name="sex" value="semer">Samarkand
						</fieldset>
						
					</div>
				<footer>
				<div class="submit_link">
					<input type="submit" value="Kurtar" class="alt_btn">
			
				</div>
			</footer>
	</form>
</article>
		<div class="spacer"></div>
		
		
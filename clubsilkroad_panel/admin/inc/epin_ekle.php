<?PHP error_reporting(E_ALL); ini_set("display_errors", 1); 
echo !defined("ADMIN") ? die("Hacking?"): null;?>	
<article class="module width_full">
	<header><h3>EPİN OLUŞTUR</h3></header>
	<div class="module_content">
	  

		 <p>E-Pin ve Güvenlik Kodu otomatik olarak oluşturulmaktadır.İsterseniz kendiniz'de yazabilirsiniz.</p>
		
		<?php 
		
	    function generateRandomString($length = 10) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
		
			$var = generateRandomString();
			$var2= generateRandomString();
			$epin = md5($var);
			$sec =$var2;

	
		if($_POST){
			
				$silk = (int)$_POST['silk'];
				$TL = (int)$_POST['tl'];
				$epinx = htmlspecialchars($_POST['epin']);
				$secx = htmlspecialchars($_POST['sec']);
				$durum = 1;
				
				
				if(empty($epinx) || empty($secx)){
				
					echo '<h4 class="alert_error">E-PİN VE GUVENLİK KODU BOŞ BIRAKILAMAZ...</h4>';
				}else{
				
					include("../class/class.admin.php");
					$admin = new Admin();	
					if(empty($silk)){
						
						$silk = 0;
						$epinekle=$admin -> epin_ekle($epinx,$secx,$silk,$TL,$durum);
						
					}else if(empty($tl)){
						
						$tl = 0;
						$epinekle=$admin -> epin_ekle($epinx,$secx,$silk,$TL,$durum);
						
					}else if (empty($silk) && empty($tl)){
						
						$silk = 0;
						$tl = 0;
						$epinekle=$admin -> epin_ekle($epinx,$secx,$silk,$TL,$durum);
						
					}else{
						
						$epinekle=$admin -> epin_ekle($epinx,$secx,$silk,$TL,$durum);
					}
					
					if ($epinekle == 1){
					 	echo '<h4 class="alert_success">E-Pin eklendi</h4><br/>';
						echo '<div style="border:1px dashed black;padding:5px">
							 <p>E-PİN  = <strong>'.$epinx.'</strong></p>
							 <p>GUVENLİK KODU = <strong>'.$secx.'</strong></p>
							 <p>İÇERİK = <strong>'.$silk.'</strong> SİLK VE <strong>'.$TL.'</strong> TL</p>
							 </div>';
					}else{
					
						echo '<h4 class="alert_error">HATA ! Eklenemedi </h4>';
					}
				}
		}
	
		?>
	
	
	<form action="" method="post" >
						<fieldset>
							<label>SİLK MİKTARI</label>
							<input type="text" name="silk">
						</fieldset>
						<fieldset>
							<label>TL MİKTARI</label>
							<input type="text" name="tl">
						</fieldset>
						<fieldset>
							<label>E-PİN</label>
							<input type="text" name="epin" value="<?php echo $epin; ?>">
						</fieldset>
						<fieldset>
							<label>Guvenlik Kodu</label>
							<input type="text" name="sec" value="<?php echo $sec; ?>">
						</fieldset>
					</div>
				<footer>
				<div class="submit_link">
					<input type="submit" value="Epin Oluştur" class="alt_btn">
			
				</div>
			</footer>
	</form>
</article>
		<div class="spacer"></div>
		
		
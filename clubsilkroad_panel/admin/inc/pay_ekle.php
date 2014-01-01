<?PHP error_reporting(E_ALL); ini_set("display_errors", 1); 
echo !defined("ADMIN") ? die("Hacking?"): null;?>	
<article class="module width_full">
	<header><h3>ÖDEME YOLU EKLE</h3></header>
	<div class="module_content">

			<h4 class="alert_info">Tavsiye ! Sitenizin güzel gözükmesi için en fazla 3 tane ekleyiniz.</h4>
			<p>* Resimler otomatik olarak boyutlandırılmaktadır.</p>
		<?php 
		
		if($_POST){
			
				$ad = htmlspecialchars($_POST['ad']);
				$link = htmlspecialchars($_POST['link']);
				$resim = htmlspecialchars($_POST['resim']);

				if(empty($ad) || empty($link)){
				
					echo '<h4 class="alert_error">Ödeme Adı Ve Link Boş Bırakılamaz...</h4>';
				}else{
				
					include("../class/class.admin.php");
					$admin = new Admin();	
					if(empty($resim)){
					$resim ='./images/defaultpay.png';
					$payekle = $admin->pay_ekle($ad,$link,$resim);
					}else{
					
					$payekle = $admin->pay_ekle($ad,$link,$resim);

					}
					
					if ($payekle == 1){
					 	echo '<h4 class="alert_success">Ödeme Yolu Eklendi...</h4>';
					}else{
					
						echo '<h4 class="alert_error">HATA ! Eklenemedi </h4>';
					}
				}
		}
	
		?>
	
	
	<form action="" method="post" >
						<fieldset>
							<label>ÖDEME ADI</label>
							<input type="text" name="ad">
						</fieldset>
						<fieldset>
							<label>LİNK</label>
							<input type="text" name="link">
						</fieldset>
						<fieldset>
							<label>RESİM</label><em>Koymak istermiyorsanız boş bırakın</em>
							<input type="text" name="resim">
						</fieldset>
						
					</div>
				<footer>
				<div class="submit_link">
					<input type="submit" value="Ödeme Yolu Ekle" class="alt_btn">
			
				</div>
			</footer>
	</form>
</article>
		<div class="spacer"></div>
		
		
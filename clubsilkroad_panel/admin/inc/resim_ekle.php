<?PHP error_reporting(E_ALL); ini_set("display_errors", 1); 
echo !defined("ADMIN") ? die("Hacking?"): null;?>	
<article class="module width_full">
	<header><h3>RESİM VEYA VİDEO EKLE</h3></header>
	<div class="module_content">

			<p>* Video Eklerken embed kodu içindeki src = "" içindekli kısımı link bölümüne ekleyin.</p>
		<?php 
		
		if($_POST){
			
				$durum = htmlspecialchars($_POST['durum']);
				$link = htmlspecialchars($_POST['link']);

				if(empty($link)){
				
					echo '<h4 class="alert_error">	 Link Boş Bırakılamaz...</h4>';
					
				}else{
				
	
					include("../class/class.admin.php");
					$admin = new Admin();	
					
					if($durum == 2){
					
					 $linkvideo = '<li><a class="shadowbox fancybox.iframe" href="'.$link.'" rel="main_gallery" ><img alt="galeri_video" src="./images/defaultvideo.png" /></a></li>';
					
					 $resimekle=$admin->resim_ekle($durum,$linkvideo);					
					
					}else{
						
						$linkresim = ' <li><a class="shadowbox " href="'.$link.'" rel="gallery" ><img alt="alt_example" src="'.$link.'" width = "204" height="166" /></a></li>';
						$resimekle=$admin->resim_ekle($durum,$linkresim);
					}
					
					if ($resimekle == 1){
					 	echo '<h4 class="alert_success">Resim / Video Başarıyla Eklendi...</h4>';
					}else{
					
						echo '<h4 class="alert_error">HATA ! Eklenemedi </h4>';
					}
					
				}
		}
	
		?>
	
	
	<form action="" method="post" >
						<fieldset>
							<label>Resim / Video</label>
							<select name="durum">
								<option value = "1" >Resim</option>
								<option value = "2" >Video</option>
							</select>
						</fieldset>
						<fieldset>
							<label>LİNK</label>
							<textarea name="link" id="" cols="30" rows="10"></textarea>
						</fieldset>		
					</div>
				<footer>
				<div class="submit_link">
					<input type="submit" value="Ekle" class="alt_btn">
			
				</div>
			</footer>
	</form>
</article>
		<div class="spacer"></div>
		
		
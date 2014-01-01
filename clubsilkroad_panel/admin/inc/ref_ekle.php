<?PHP error_reporting(E_ALL); ini_set("display_errors", 1); 
echo !defined("ADMIN") ? die("Hacking?"): null;?>	
<article class="module width_full">
	<header><h3>REFERANS EKLE</h3></header>
	<div class="module_content">
		<h4 class="alert_info">Tavsiye ! Sitenizin güzel gözükmesi için en fazla 6 refarans eklemenizi öneririz.</h4> <br/>
		<p>* Resimler otomatik olarak boyutlandırılmaktadır.</p>
		<?php 
		
		if($_POST){
			
				$ad = htmlspecialchars($_POST['ad']);
				$url = htmlspecialchars($_POST['url']);
				$resim = htmlspecialchars($_POST['resim']);
				

				if(empty($url)){
				
					echo '<h4 class="alert_error">URL BOŞ BIRAKILAMAZ...</h4>';
				}else{
				
					include("../class/class.admin.php");
					$admin = new Admin();	
					if(empty($resim)){
					$resim ='./images/defaultref.png';
					$refekle = $admin->ref_ekle($ad,$url,$resim);
					}else{
					
					$refekle = $admin->ref_ekle($ad,$url,$resim);

					}
					
					if ($refekle == 1){
					 	echo '<h4 class="alert_success">Referans eklendi</h4>';
					}else{
					
						echo '<h4 class="alert_error">HATA ! Eklenemedi </h4>';
					}
				}
		}
	
		?>
	
	
	<form action="" method="post" >
						<fieldset>
							<label>AD</label>
							<input type="text" name="ad">
						</fieldset>
						<fieldset>
							<label>SİTE LİNK</label>
							<input type="text" name="url">
						</fieldset>
						<fieldset>
							<label>RESİM URL</label><em>Sitenin logo'sunun urlesini ekleyebilirsiniz.Koymak istemiyorsanız boş bırakın</em>
							<input type="text" name="resim">
						</fieldset>

						
					</div>
				<footer>
				<div class="submit_link">
					<input type="submit" value="Referans Ekle" class="alt_btn">
			
				</div>
			</footer>
	</form>
</article>
		<div class="spacer"></div>
		
		
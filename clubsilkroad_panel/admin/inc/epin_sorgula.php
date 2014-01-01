<?PHP echo !defined("ADMIN") ? die("Hacking?"): null; ?>	
<article class="module width_full">
	<header><h3>E-PİN SORGULA</h3></header>
	<div class="module_content">
		<form action="" method="post" enctype="multipart/form-data">
								<fieldset style="margin-bottom:15px">
									<label>E-PİN</label>
									<input type="text" name="epin">
								</fieldset>
								
							</div>
						<footer>
						<div class="submit_link">
							<input type="submit"  class="alt_btn" value="Sorgula" >
						</div>
					</footer>
		</form>
</article>
		<div class="spacer">
		
		<?php 
		
		if(isset($_POST['epin'])){
			
			$islem = htmlspecialchars($_POST['epin']);
			
			if(empty($islem)){
				
				echo '<h4 class="alert_error">E-Pin Boş Bırakılamaz...</h4>';
			}else{
				
			include("../class/class.admin.php");
			$admin = new Admin();
			
			$deger = $admin->epin_varmi($islem);
			
				if(sizeof($deger) == 0){
					
					echo '<h4 class="alert_warning">E-Pin Bulunamadı.</h4>';
					
				}else {
					
					$durum = $deger[0]['durum'];
					
					if($durum == 1){
						
					 echo '<div class="module_content">
					<h2 style="color:green">E-Pin Kullanılabilir.</h2>

					<ul>
						<li><strong>E-Pin </strong> '.$deger[0]['epin'].'</li>
						<li><strong>Guvenlik Kodu</strong> '.$deger[0]['sec'].'</li>
						<li><strong>Silk Miktarı </strong>'.$deger[0]['silk'].'</li>
						<li><strong>TL Miktarı </strong>'.$deger[0]['TL'].'</li>
					</ul>
				</div>';
				
					}else{
						
					echo '<div class="module_content">
					<h2 style="color:red">E-Pin Kullanılmış.</h2>
					<p><em>'.$deger[0]['username'].'</em> Tarafından <em>'.$deger[0]['tarih'].'</em> tarihin\'de kullanılmıştır...</p>
					<ul>
						<li><strong>E-Pin </strong> '.$deger[0]['epin'].'</li>
						<li><strong>Guvenlik Kodu</strong> '.$deger[0]['sec'].'</li>
						<li><strong>Silk Miktarı </strong>'.$deger[0]['silk'].'</li>
						<li><strong>TL Miktarı </strong>'.$deger[0]['TL'].'</li>
					</ul>
				</div>';
				
					}
				}
			}		
		}
		
		?>
		
		</div>
		
		
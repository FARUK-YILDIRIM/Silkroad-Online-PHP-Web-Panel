<?PHP echo !defined("ADMIN") ? die("Hacking?"): null; ?>	
<article class="module width_full">
	<header><h3>İTEM EKLE </h3></header>
	<p>* POT,ZERK,SCROLL VERECEKSENİZ SADECE POT-SC'LER İÇİN MİKTARI KULLANIN</p>
	<p>* İTEM VERECEKSENİZ(SWORD,BLADE,CHEST) SADECE ARTI MİKTARINI KULLANIN</p>
	<div class="module_content">
		<form action="" method="post" enctype="multipart/form-data">
								<fieldset style="margin-bottom:15px">
									<label>İTEM</label>
									<input type="text" name="item_name">
								</fieldset>
								<fieldset style="margin-bottom:15px">
									<label>ARTI MİKTARI</label><em>Sadece İtemler için</em>
									<input type="text" name="arti" value="0">
								</fieldset>
								<fieldset style="margin-bottom:15px">
									<label>POT-SC'ler için miktar</label><em>HP,MP,VİGOR,SCROLL vb... için</em>
									<input type="text" name="miktar" value="1">
								</fieldset>
								<fieldset style="margin-bottom:15px">
									<label>Kime</label>
									<input type="text" name="username">
								</fieldset>
								
							</div>
						<footer>
						<div class="submit_link">
							<input type="submit"  class="alt_btn" value="EKLE" >
						</div>
					</footer>
		</form>
</article>
		<div class="spacer">
		
		<?php 
		if($_POST){
		include("../class/class.admin.php");
		$item = htmlspecialchars($_POST['item_name']);
		$arti =(int)$_POST['arti'];
		$miktar=(int)$_POST['miktar'];
		$username = htmlspecialchars($_POST['username']);
		
		$admin = new Admin();
		
		$ekle =$admin->link->db_conn_shard->query("exec _ADD_ITEM_EXTERN '$username','$item',$miktar,$arti");
		//print_r($ekle);
			error_reporting(0);
			if($ekle == 1){
				
				echo '<h4 class="alert_success">Başarılı...</h4>';
				
			}else{
				
				echo '<h4 class="alert_error">HATA...İtem Kodu-Kullanıcı Hatalı olabilir...</h4>';
			}
		}
		?>
		
		</div>
		
		
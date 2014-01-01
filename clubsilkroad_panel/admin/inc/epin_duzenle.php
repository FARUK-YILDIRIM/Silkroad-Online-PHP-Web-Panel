<?php echo !defined("ADMIN") ? die("Hacking?"): null; ?>

<article class="module width_full">
	<header><h3>E-PİN DÜZENLE</h3></header>
	<div class="module_content">
		<?php
		$id =(int)htmlspecialchars($_GET['id']);
		include("../class/class.admin.php");
		$admin = new Admin();
	
		if($_POST){
		
				$epin = htmlspecialchars($_POST['epin']);
				$sec  = htmlspecialchars($_POST['sec']);
				$silk =(int)$_POST['silk'];
				$TL =(int)$_POST['TL'];
				
				if(empty($epin) || empty($sec)){
				
					echo '<h4 class="alert_error">E-PİN VE GUVENLİK KODU BOŞ BIRAKILAMAZ...</h4>';
					
				}else{
				
					$epingun = $admin->epin_update($epin,$sec,$silk,$TL,$id);
					
					
					if ($epingun == 1){
					 	echo '<h4 class="alert_success">E-Pin Güncellendi.</h4>';
					}else{
					
						echo '<h4 class="alert_error">HATA !  </h4>';
					}
				}
			
		}
		
		
		
		$query = $admin->link->db_conn_account->query("SELECT * FROM fy_epin WHERE id='$id'");
		$result = $query->fetchAll();
		foreach($result as $row){
						
			?>
	
	
	<form action="" method="post" >
						<fieldset>
							<label>E-Pin</label>
							<input type="text" name="epin" value="<?php echo $row['epin'] ; ?>">
						</fieldset>
						<fieldset>
							<label>GUVENLİK KODU</label>
							<input type="text" name="sec" value="<?php echo $row['sec']; ?>">
						</fieldset>
						<fieldset>
							<label>SİLK</label>
							<input type="text" name="silk" value="<?php echo $row['silk']; ?>">
						</fieldset>
						<fieldset>
							<label>TL</label>
							<input type="text" name="TL" value="<?php echo $row['TL']; ?>">
						</fieldset>
						<fieldset>
							<SPAN>
							<?php 
							if($row['durum'] == 1){
								
								echo '<strong style="color:green">E-Pin Kullanılabilir.</strong>';
							}else{
								
								echo '<strong style="color:red">E-Pin  <em>'.$row['username'].'</em> tarafından <em>'.$row['tarih'].'</em> tarihin\'de KULLANILMIŞTIR.</strong>';
							}					
						
							?>
							</SPAN>
						</fieldset>						
					</div>
				<footer>
				<div class="submit_link">
					<?php 
					
					if($row['durum'] == 1)
					{
						echo '<input type="submit" value="Düzenlemeyi Bitir" class="alt_btn">';
					}else
					{
						echo '<label style="border:1px solid #30B0C8;text-shadow: 0 1px 0 #6CDCF9;color: #003E49;padding:5px">Kullanılmış Epinler Düzenlenemez</label>';

					}
					
					?>
					
				
				</div>
			</footer>
	</form>
			</article>
		<div class="spacer"></div>
		<?php } ?>
		
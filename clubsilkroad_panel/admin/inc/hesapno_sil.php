<?PHP echo !defined("ADMIN") ? die("Hacking?"): null; ?>	
<article style="padding-bottom: 20px" class="module width_full">
	<h3>HESAP NUMARASI SİL</h3>
	<div class="module_content">
			<?php
				
					$id = (int)htmlspecialchars($_GET['id']);
					include("../class/class.admin.php");
					$admin = new Admin();		
					$delete= $admin->link->db_conn_account->query("DELETE FROM fy_hesapno WHERE id='$id'");	
					
					if($delete){
					echo '<h4 class="alert_success">Hesap Numarası başarı ile silindi..Yönlendiriliyorsunuz.</h4>';
					?> <META HTTP-EQUIV="Refresh" CONTENT="1;URL=index.php?do=hesapno"> <?php 
					}else{
					echo '<h4 class="alert_error">MySql hatası: !</h4>';
					
						}
				  
		  ?>
	</div>
	</article>	
		
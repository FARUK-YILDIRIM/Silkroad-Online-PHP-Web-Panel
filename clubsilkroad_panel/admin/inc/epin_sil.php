<?PHP echo !defined("ADMIN") ? die("Hacking?"): null; ?>	
<article style="padding-bottom: 20px" class="module width_full">
	<h3>EPİN SİL</h3>
	<div class="module_content">
			<?php
				
					$id = (int)htmlspecialchars($_GET['id']);
					include("../class/class.admin.php");
					$admin = new Admin();		
					$delete= $admin->link->db_conn_account->query("DELETE FROM fy_epin WHERE id='$id'");	
					
					if($delete){
					echo '<h4 class="alert_success">E-Pin başarı ile silindi..Yönlendiriliyorsunuz.</h4>';
					?> <META HTTP-EQUIV="Refresh" CONTENT="1;URL=index.php?do=epin"> <?php 
					}else{
					echo '<h4 class="alert_error">MySql hatası: !</h4>';
					
						}
				  
			
			?>
	</div>
	</article>	
		
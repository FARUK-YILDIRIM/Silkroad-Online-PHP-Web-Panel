<?php echo !defined("ADMIN") ? die("Hacking?"): null; ?>
<article  class="module width_3_quarter" style="padding-bottom:20px; width:95%">
<div style="float: right; font-size:14px; font-weight: bold; padding: 6px;">
</div>
<header><h3 class="tabs_involved">MARKET LOG</h3></header>
			
			<div style="padding:10px;">
				
				<p>* Kullanıcı Adı:İtemin satın alındığı üyeliktir.</p>
				<p>*Karakter Adı: İtemin yüklendiği karakterdir.</p>
				
			<form action="" method="POST">
					<input type="submit" value="Tüm Kayıtlar" class="alt_btn" name="durumhepsi" >
					<input type="submit" value="Tüm Kayıtları Sil" class="alt_btn" name="durumsil" onclick="return confirm('Bütün Kayıtları Silmek İstediğinize Eminmisiniz ?')">
					<br />
					<br />
					<label for=""><strong>Kullanıcı Adı :</strong></label>
					<input type="text" name="username">
					<input type="submit" value="Arama Yap" class="alt_btn" name="durum1" >
					<label for=""><strong>Karakter Adı :</strong></label>
					<input type="text" name="charsearch">
					<input type="submit" value="Arama Yap" class="alt_btn" name="durumip" >
			</form>
			</div>	
				
		<div class="tab_container">
		
					
					
		<?php 
		
			include('../class/class.admin.php');
			$admin = new Admin();
			$degerler =$admin->link->db_conn_log->query("SELECT * FROM fy_markets_log ORDER BY tarih DESC");
			
			
			if(isset($_POST['durum1'])){
				$username = htmlspecialchars($_POST['username']);
				if(empty($username)){
					
					echo ' <h4 class="alert_error">Kullanıcı adı boş bırakılamaz...</h4> <br />';
					
				}else{
				$degerler =$admin->link->db_conn_log->query("SELECT * FROM fy_markets_log WHERE username = '$username' ORDER BY tarih DESC");
				if($degerler->rowCount() == 0){
						
						echo ' <h4 class="alert_warning">Kayıt BULUNAMADI...</h4></br>';
					}
				}
			}
			
			if(isset($_POST['durumip'])){
				$charsearch = htmlspecialchars($_POST['charsearch']);
				if(empty($charsearch)){
					
					echo ' <h4 class="alert_error">Karakter Adı boş bırakılamaz...</h4> <br />';
					
				}else{
				$degerler =$admin->link->db_conn_log->query("SELECT * FROM fy_markets_log WHERE oyuncu = '$charsearch' ORDER BY tarih DESC");
				if($degerler->rowCount() == 0){
						
						echo ' <h4 class="alert_warning">Kayıt BULUNAMADI...</h4></br>';
					}
				}
			}
			
			
			if(isset($_POST['durumsil'])){
				
			$degerler =$admin->link->db_conn_log->query("DELETE FROM fy_markets_log");
			echo ' <h4 class="alert_success">Tüm Kayıtlar Silindi...</h4><br/>';
			}
		
			
			if(isset($_POST['durumhepsi'])){
			$degerler =$admin->link->db_conn_log->query("SELECT * FROM fy_markets_log ORDER BY tarih DESC");
			}
			
		    if ($degerler->rowCount() == 0){
			 echo ' <h4 class="alert_warning">KAYIT BULUNAMADI...</h4>';
			}else{
			
			
		?>
		
		
			
			
			<div id="tab1" class="tab_ content">
			<table class="tablesorter" cellspacing="0"> 
			
			<thead> 
				<tr> 
   					<th width="20%">Kullanıcı Adı</th> 
    				<th width="30%">İtem Adı</th> 
    				<th width="20%">Karakter Adı</th> 
    				<th width="10%"></th> 
    				<th width="20%">Tarih</th> 
    				<th></th> 
				</tr> 
			</thead> 
			<?php  foreach($degerler as $row){?>
			<tbody> 
		
				<tr> 
   					<td><?php echo $row['username'] ?></td> 
    				<td><?php echo $row['item']; ?></td> 
    				<td><?php echo $row['oyuncu']; ?></td> 
    				<td><a href=""></a></td> 
    				<td><?php echo $row['tarih']; ?></td> 
				</tr> 
			</tbody> 
			 <?php }} ?>
			   
			</table>
		</div><!-- end of #tab1 -->
		  
				
		 
		 
		</div>
</article>
<?php echo !defined("ADMIN") ? die("Hacking?"): null; ?>
<article  class="module width_3_quarter" style="padding-bottom:20px; width:95%">
<div style="float: right; font-size:14px; font-weight: bold; padding: 6px;">
</div>
<header><h3 class="tabs_involved">[GM] UNİQUE LOG</h3></header>
			
			<div style="padding:10px;">
			
			<form action="" method="POST">
					<input type="submit" value="Tüm Kayıtlar" class="alt_btn" name="durumhepsi" >
					<input type="submit" value="Tüm Kayıtları Sil" class="alt_btn" name="durumsil" onclick="return confirm('Bütün Kayıtları Silmek İstediğinize Eminmisiniz ?')">
					<label for=""><strong>Kullanıcı Adı :</strong></label>
					<input type="text" name="username">
					<input type="submit" value="Arama Yap" class="alt_btn" name="durum1" >
					
			</form>
			</div>	
				
		<div class="tab_container">
		
					
		<?php 
		
			include('../class/class.admin.php');
			$admin = new Admin();
			$degerler =$admin->link->db_conn_account->query("select * from _SMCLog where szLog like '%summon%' ORDER BY dLogDate DESC");
			
			
			if(isset($_POST['durum1'])){
				$username = htmlspecialchars($_POST['username']);
				if(empty($username)){
					
					echo ' <h4 class="alert_error">Kullanıcı adı boş bırakılamaz...</h4> <br />';
					
				}else{
				$degerler =$admin->link->db_conn_account->query("select * from _SMCLog where szUserID ='$username' AND szLog like '%summon%' ORDER BY dLogDate DESC ");
				if($degerler->rowCount() == 0){
						
						echo ' <h4 class="alert_warning">Kayıt BULUNAMADI...</h4></br>';
					}
				}
			}
			

			if(isset($_POST['durumsil'])){
				
			$degerler =$admin->link->db_conn_account->query("DELETE FROM _SMCLog WHERE szLog like '%summon%'");
			echo ' <h4 class="alert_success">Tüm Kayıtlar Silindi...</h4><br/>';
			}
		
			
			if(isset($_POST['durumhepsi'])){
			$degerler =$admin->link->db_conn_account->query("select * from _SMCLog where szLog like '%summon%' ORDER BY dLogDate DESC");
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
    				<th width="40%">Unique</th> 
    				<th width="10%"></th> 
    				<th width="20%">Tarih</th> 
    				<th></th> 
				</tr> 
			</thead> 
			<?php  foreach($degerler as $row){?>
			<tbody> 
		
				<tr> 
   					<td><?php echo $row['szUserID'] ?></td> 
    				<td><?php echo $row['szLog']; ?></td> 
    				<td><a href=""></a></td> 
    				<td><?php echo $row['dLogDate']; ?></td> 
				</tr> 
			</tbody> 
			 <?php }} ?>
			   
			</table>
		</div><!-- end of #tab1 -->
		  
				
		 
		 
		</div>
</article>
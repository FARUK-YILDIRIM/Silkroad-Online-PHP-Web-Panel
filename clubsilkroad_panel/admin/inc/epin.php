<?php echo !defined("ADMIN") ? die("Hacking?"): null; ?>
<article  class="module width_3_quarter" style="padding-bottom:20px; width:95%">
<div style="float: right; font-size:14px; font-weight: bold; padding: 6px;">
<a href="?do=epin_ekle">Epin Ekle</a>
</div>
<header><h3 class="tabs_involved">EPİN</h3></header>
			
			<div style="padding:10px;">
			
			<form action="" method="POST">
					<input type="submit" value="Hepsi" class="alt_btn" name="durumhepsi" >
					<input type="submit" value="Kullanılmayan E-Pinler" class="alt_btn" name="durum1" >
					<input type="submit" value="Kullanılmış E-Pinler" class="alt_btn" name="durum0" >
					<input type="submit" value="Kullanılmış E-Pinleri Sil" class="alt_btn" name="durum0sil" onclick="return confirm('Kullanılan E-Pinleri Silmek İstediğinize Eminmisiniz ?')" >
					<input type="submit" value="Tüm E-Pin'leri Sil" class="alt_btn" name="durum10sil" onclick="return confirm('Bütün E-Pinleri Silmek İstediğinize Eminmisiniz ?')">
			</form>
			</div>	
				
		<div class="tab_container">
		
					
					
		<?php 
		
			include('../class/class.admin.php');
			$admin = new Admin();
			$degerler=$admin->epin_listele();
			
			if(isset($_POST['durum1'])){
				
			$degerler =$admin->link->db_conn_account->query("SELECT * FROM fy_epin WHERE durum=1");
				if($degerler->rowCount() == 0){
					
					echo ' <h4 class="alert_warning">E-Pin Bulunamadı...</h4></br>';
				}
			}
			
			if(isset($_POST['durum0'])){
				
			$degerler =$admin->link->db_conn_account->query("SELECT * FROM fy_epin WHERE durum=0");
				if($degerler->rowCount() == 0){
					
					echo ' <h4 class="alert_warning">E-Pin Bulunamadı...</h4></br>';
				}
			
			}
			
			if(isset($_POST['durum0sil'])){
				
			$degerler =$admin->link->db_conn_account->query("DELETE FROM fy_epin WHERE durum = 0");
			echo ' <h4 class="alert_success">Kullanılmış E-Pinler Silindi...</h4><br/>';
			}
			
			if(isset($_POST['durum10sil'])){
				
			$degerler =$admin->link->db_conn_account->query("DELETE FROM fy_epin ");
			echo ' <h4 class="alert_success">Bütün E-Pin\'ler Silindi...</h4><br/>';
			}
			
			if(isset($_POST['durumhepsi'])){
				
				$degerler=$admin->epin_listele();
			}
			
		    if (sizeof($degerler) == 0){
			 echo ' <h4 class="alert_warning">Siteye Henüz hiç E-PİN eklenmemiş...</h4>';
			}else{
			
			
		?>
		
		
			
			
			<div id="tab1" class="tab_ content">
			<table class="tablesorter" cellspacing="0"> 
			
			<thead> 
				<tr> 
   					<th width="20%">Durum</th> 
    				<th width="40%">Epin</th> 
    				<th width="10%">Silk</th> 
    				<th width="10%"></th> 
    				<th width="10%">TL</th> 
    				<th>İşlemler</th> 
				</tr> 
			</thead> 
			<?php  foreach($degerler as $row){?>
			<tbody> 
		
				<tr> 
   					<td>
					<?php $durum = $row['durum']; 
					if ($durum ==1){
						echo "<strong style='color:green'>Kullanılabilir</strong>";
					}else{
						echo "<strong style='color:red'>Kullanılmış</strong>";
					}
					?></td> 
    				<td><?php echo $row['epin']; ?></td> 
    				<td><?php echo $row['silk']; ?></td> 
    				<td><a href=""></a></td> 
    				<td><?php echo $row['TL']; ?></td> 
    				<td>
					<a href="?do=epin_duzenle&id=<?php echo $row['id']; ?>" title="Düzenle"><img src="images/icn_edit.png" alt="" /></a>
					<a onclick="return confirm('İçeriği Silmek İstediğiniz Eminmi siniz?')" style="margin-left: 10px" href="?do=epin_sil&id=<?php echo $row['id'];?>" title="Sil"><img src="images/icn_trash.png" alt="" /></a>
					</td> 
				</tr> 
			</tbody> 
			 <?php }} ?>
			   
			</table>
		</div><!-- end of #tab1 -->
		  
				
		 
		 
		</div>
</article>
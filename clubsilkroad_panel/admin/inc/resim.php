<?php echo !defined("ADMIN") ? die("Hacking?"): null; ?>
<article  class="module width_3_quarter" style="padding-bottom:20px; width:95%">
<div style="float: right; font-size:14px; font-weight: bold; padding: 6px;">
<a href="?do=resim_ekle">Resim veya Video Ekle</a>
</div>
<header><h3 class="tabs_involved">RESİM VEYA VİDEO SİL</h3></header>
		<div class="tab_container">
		
		<?php 
		
			include('../class/class.admin.php');
			$admin = new Admin();
			$deger = $admin->link->db_conn_account->query("SELECT id,durum FROM fy_gallery");
			$degerler = $deger->fetchAll();
		    if (sizeof($degerler) == 0){
			 echo ' <h4 class="alert_warning">Siteye Henüz hiç resim veya video eklenmemiş...</h4>';
			}else{
			
			
		?>
		
			
			
			<div id="tab1" class="tab_ content">
			<table class="tablesorter" cellspacing="0"> 
			
			<thead> 
				<tr> 
   					<th width="20px"></th> 
    				<th width="40%">ID</th> 
    				<th width="30%">Durum</th> 
    				<th width="10%"></th> 
    				<th></th> 
    				<th>İşlemler</th> 
				</tr> 
			</thead> 
			<?php  foreach($degerler as $row){?>
			<tbody> 
		
				<tr> 
   					<td></td> 
    				<td><?php echo $row['id']; ?></td> 
    				<td><?php echo $row['durum'] == 1  ?  "Resim" : "Video"; ?></td> 
    				<td><a href=""></a></td> 
    				<td></td> 
    				<td>
					<a onclick="return confirm('İçeriği Silmek İstediğiniz Eminmi siniz?')" style="margin-left: 10px" href="?do=resim_sil&id=<?php echo $row['id'];?>" title="Sil"><img src="images/icn_trash.png" alt="" /></a>
					</td> 
				</tr> 
			</tbody> 
			 <?php }} ?>
			   
			</table>
		</div><!-- end of #tab1 -->
		  
				
		 
		 
		</div>
</article>
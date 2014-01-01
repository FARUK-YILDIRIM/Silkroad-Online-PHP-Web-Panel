<?php echo !defined("ADMIN") ? die("Hacking?"): null; ?>
<article  class="module width_3_quarter" style="padding-bottom:20px; width:95%">
<div style="float: right; font-size:14px; font-weight: bold; padding: 6px;">
<a href="?do=ref_ekle">Referans Ekle</a>
</div>
<header><h3 class="tabs_involved">REFERANSLAR</h3></header>
		<div class="tab_container">
		
		<?php 
		
			include('../class/class.admin.php');
			$admin = new Admin();
			$degerler=$admin->ref_listele();
		    if (sizeof($degerler) == 0){
			 echo ' <h4 class="alert_warning">Siteye Henüz referans eklenmemiş...</h4>';
			}else{
			
			
		?>
		
			
			
			<div id="tab1" class="tab_ content">
			<table class="tablesorter" cellspacing="0"> 
			
			<thead> 
				<tr> 
   					<th width="20px"></th> 
    				<th width="20%">Referans Adı</th> 
    				<th width="40%">Site Link</th> 
    				<th width="20%"></th> 
    				<th></th> 
    				<th>İşlemler</th> 
				</tr> 
			</thead> 
			<?php  foreach($degerler as $row){?>
			<tbody> 
		
				<tr> 
   					<td></td> 
    				<td><?php echo $row['ad']; ?></td> 
    				<td><?php echo $row['url']; ?></td> 
    				<td><a href=""></a></td> 
    				<td></td> 
    				<td>
					<a href="?do=ref_duzenle&id=<?php echo $row['id']; ?>" title="Düzenle"><img src="images/icn_edit.png" alt="" /></a>
					<a onclick="return confirm('İçeriği Silmek İstediğiniz Eminmi siniz?')" style="margin-left: 10px" href="?do=ref_sil&id=<?php echo $row['id'];?>" title="Sil"><img src="images/icn_trash.png" alt="" /></a>
					</td> 
				</tr> 
			</tbody> 
			 <?php }} ?>
			   
			</table>
		</div><!-- end of #tab1 -->
		  
				
		 
		 
		</div>
</article>
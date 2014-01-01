<?php echo !defined("ADMIN") ? die("Hacking?"): null; ?>
<article  class="module width_3_quarter" style="padding-bottom:20px; width:95%">
<div style="float: right; font-size:14px; font-weight: bold; padding: 6px;">
<a href="?do=slider_ekle">Markete İtem Ekle</a>
</div>
<header><h3 class="tabs_involved">MARKET</h3></header>
		<div class="tab_container">
		
		<?php 
		
			include('../class/class.admin.php');
			$admin = new Admin();
			$degerler=$admin->market_listele();
		    if (sizeof($degerler) == 0){
			 echo ' <h4 class="alert_warning">Markete Henüz hiç item eklenmemiş...</h4>';
			}else{
			
			
		?>
		
			
			
			<div id="tab1" class="tab_ content">
			<table class="tablesorter" cellspacing="0"> 
			
			<thead> 
				<tr> 
   					<th width="20px"></th> 
    				<th width="45%">İtem Adı</th> 
    				<th width="20%">İtem Kodu</th> 
    				<th width="10%"></th> 
    				<th></th> 
    				<th>İşlemler</th> 
				</tr> 
			</thead> 
			<?php  foreach($degerler as $row){?>
			<tbody> 
		
				<tr> 
   					<td></td> 
    				<td><?php echo $row['item_adi']; ?></td> 
    				<td><?php echo $row['item_kodu']; ?></td> 
    				<td><a href=""></a></td> 
    				<td></td> 
    				<td>
					<a href="?do=market_duzenle&id=<?php echo $row['id']; ?>" title="Düzenle"><img src="images/icn_edit.png" alt="" /></a>
					<a onclick="return confirm('İtemi Silmek İstediğinizden Eminmi siniz?')" style="margin-left: 10px" href="?do=market_sil&id=<?php echo $row['id'];?>" title="Sil"><img src="images/icn_trash.png" alt="" /></a>
					</td> 
				</tr> 
			</tbody> 
			 <?php }} ?>
			   
			</table>
		</div><!-- end of #tab1 -->
		  
				
		 
		 
		</div>
</article>
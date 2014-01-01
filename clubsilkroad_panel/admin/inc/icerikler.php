<?php echo !defined("ADMIN") ? die("Hacking?"): null; ?>
<article  class="module width_3_quarter" style="padding-bottom:20px; width:95%">
<div style="float: right; font-size:14px; font-weight: bold; padding: 6px;">
<a href="?do=icerik_ekle">Blog Ekle</a>
</div>
<header><h3 class="tabs_involved">BLOG LİSTESİ</h3></header>
		<div class="tab_container">
		
		<?php 
		
			include('../class/class.admin.php');
			$admin = new Admin();
			$degerler=$admin->icerik_listele();
		    if (sizeof($degerler) == 0){
			 echo ' <h4 class="alert_warning">Siteye Henüz hiç içerik eklenmemiş...</h4>';
			}else{
			
			
		?>
		
			
			
			<div id="tab1" class="tab_ content">
			<table class="tablesorter" cellspacing="0"> 
			
			<thead> 
				<tr> 
   					<th width="20px"></th> 
    				<th width="40%">Başlık</th> 
    				<th width="10%"></th> 
    				<th width="10%"></th> 
    				<th>Tarih</th> 
    				<th>İşlemler</th> 
				</tr> 
			</thead> 
			<?php  foreach($degerler as $row){?>
			<tbody> 
		
				<tr> 
   					<td></td> 
    				<td><?php echo $row['baslik']; ?></td> 
    				<td><a href=""></a></td> 
    				<td><a href=""></a></td> 
    				<td><?php echo $row['tarih']; ?></td> 
    				<td>
					<a href="?do=icerik_duzenle&id=<?php echo $row['id']; ?>" title="Düzenle"><img src="images/icn_edit.png" alt="" /></a>
					<a onclick="return confirm('İçeriği Silmek İstediğiniz Eminmi siniz?')" style="margin-left: 10px" href="?do=icerik_sil&id=<?php echo $row['id'];?>" title="Sil"><img src="images/icn_trash.png" alt="" /></a>
					</td> 
				</tr> 
			</tbody> 
			 <?php }} ?>
			   
			</table>
		</div><!-- end of #tab1 -->
		  
				
		 
		 
		</div>
</article>
<?php 
error_reporting(E_ALL); ini_set("display_errors", 1);
include ('lib/reg_users.php');
include ('lib/header.php');

?>	
<style>

	table { 
		width: 100%; 
		border-collapse: collapse; 
	}
	/* Zebra striping */
	tr:nth-of-type(odd) { 
		background: #eee; 
	}
	th { 
		background: #333; 
		color: white; 
		font-weight: bold; 
	}
	td, th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
	}
	
}
</style>

 <!--********************************************* Main start *********************************************-->

		<!-- Full page wrapper Start -->
		<div id="full_page_wrapper">
					
			<div class="header">
				<h2><span><?php echo $gameName; ?> //</span> <?php echo $dil['market'] ?></h2>
			</div>
			 
			<div id="post_wrapper">
			
				
				<!-- Body Start -->
				<div id="body" style="min-height:500px;">
							

	<h1><?php echo $dil['market'] ?></h1>
	
	<?php 
	error_reporting(0);
	$getitem =(int)isset($_GET["item"]) ? $_GET["item"] : NULL;
	if(!(int)$getitem){ 
		
		$getitem = null;
	}
	
	if(isset($_SESSION['guardf']) && $getitem != null){
		$marketitem=$users->market_listele_id((int)$getitem); 
		//print_r($marketitem);
		
		if(sizeof($marketitem) == 0 ){
			
			?> <META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php"> <?php 
			exit;
		}
		
		if(isset($_POST['buy_item']))
		{ 
			$karakteradi=htmlspecialchars($_POST['karakteradi']);
			if(empty($karakteradi)){
				
				 echo "<strong style='color:#372222;font-size:20px;'>".$dil['m_hata1']."</strong>";
			}else{
				
				$charvarmi = $users->CharInfo($karakteradi);
				if($charvarmi == 1){
			
					$item_kodu=htmlspecialchars($_POST['item_kodu']);
					$miktar=(int)$_POST['miktar'];
					$arti=(int)$_POST['arti'];
					$silk=(int)$_POST['silk'];
					$tl=(int)$_POST['tl'];
					$JID=$_SESSION['JID'];
					$username=$_SESSION['username'];
					$silkmiktari = $users->silk($username);
					$guncelsilk=$silkmiktari[0]['silk_own'];
					$gunceltl =$_SESSION['tlmiktari'];
					$tarih = date("d.m.Y H:i:s");
					
					
					
				     if($_SESSION['silk'] >= $silk && $_SESSION['tlmiktari'] >= $tl)
					 {
						 
						 $yenisilk = $guncelsilk - $silk;
						 $yenitl  = $_SESSION['tlmiktari'] - $tl;
						
						 
						 $silkupdate = $users->link->db_conn_account->query("UPDATE SK_Silk SET silk_own = '$yenisilk' WHERE JID='$JID' ");
						 $tlupdate=$users->link->db_conn_account->query("UPDATE TB_User SET phone = '$yenitl' WHERE StrUserID = '$username' ");

						 if($silkupdate == 1 AND $tlupdate == 1){
							 
							 $_SESSION['silk']=$yenisilk;
							 $_SESSION['tlmiktari']=$yenitl;
							 
							$ekle = $users->link->db_conn_shard->query("exec _ADD_ITEM_EXTERN '$karakteradi','$item_kodu',$miktar,$arti");
							
									if($ekle == 1)
									{
										
										$market_log = $users->fy_markets_log($tarih,$username,$karakteradi,$marketitem[0]['item_adi']);
										
										echo "<strong style='color:green;font-size:20px;'>Başarılı ... Ürün $karakteradi isimli karaktere eklendi </strong>";
										
									}else{
										
										
										echo "<strong style='color:#372222;font-size:20px;'>HATA ! Çantanızda Boş Yer Yok </strong>";
										$silkupdate = $users->link->db_conn_account->query("UPDATE SK_Silk SET silk_own = '$guncelsilk' WHERE JID='$JID' ");
										$tlupdate=$users->link->db_conn_account->query("UPDATE TB_User SET phone = '$gunceltl' WHERE StrUserID = '$username' ");
										$_SESSION['silk']=$guncelsilk;
										$_SESSION['tlmiktari']=$gunceltl;
									}
							 
							 }else{
								 
								  echo "<strong style='color:#372222;font-size:20px;'>Yetersiz Bakiye ! </strong>";
							 }
						 
						 
					 }else{
						 
						 
						 echo "<strong style='color:#372222;font-size:20px;'>Yetersiz Bakiye ! </strong>";
					 }
					
				}else
				{
					
					 echo "<strong style='color:#372222;font-size:20px;'>$karakteradi Bu isimde bir karakter bulunamadı...</strong>";
				}
				 
				
			}
		}
		?>

	
          <h2><?php echo $marketitem[0]['item_adi']?></h2>
		  <img  src="<?php echo $marketitem[0]['resim']?>" height="130" width="130">
          <div class="content">
            <p>Satın almak istediğiniz item <strong><?php echo $marketitem[0]['item_adi'] ?></strong> Satın almak için gerekli Silk Miktarı: <strong style="font-size:17px"><?php echo $marketitem[0]['silk'] ?></strong><img src="./images/gold.png"  style="margin-left:3px;"/> 
			gerekli TL Miktari: <strong style="font-size:17px"><?php echo $marketitem[0]['tl']?></strong><img src="./images/tl.png"  style="margin-left:3px;"/>
			İtemi satın almak istediğiniz karakterin adını girip satışı tamamlayabilirsiniz.</p>
          <form action="" method="post">
		  <input type="text" placeholder="Karakter (char) Adı" name="karakteradi"/>
		  <input type="hidden" value="<?php echo $marketitem[0]['item_kodu'] ?>" name="item_kodu"/>
		  <input type="hidden" value="<?php echo $marketitem[0]['pot_sc_miktari'] ?>" name="miktar"/>
		  <input type="hidden" value="<?php echo $marketitem[0]['arti_miktari'] ?>" name="arti"/>
		  <input type="hidden" value="<?php echo $marketitem[0]['silk'] ?>" name="silk"/>
		  <input type="hidden" value="<?php echo $marketitem[0]['tl'] ?>" name="tl"/>
		  <label for=""></label>
		  <input  type="submit" value="Satışı Tamamla" class="read_more2"  name="buy_item" />
		 
		  </form>
		  </div>
       
	
	
		<?php
		echo "<hr />";
	}else{
		
		Null;
	}
	
	?>
	
	<?php  
	if(isset($_SESSION['guardf'])){
		
	echo "<p style='font-size:15px'>Hoşgeldiniz <strong>".$_SESSION['username']."</strong> 
	Sahip olduğunuz Silk Miktari:<strong>".$_SESSION['silk']."</strong><img src='./images/gold.png' style='margin-left:3px' />
	Sahip olduğunuz TL Miktari: <strong>".$_SESSION['tlmiktari']."</strong><img src='./images/tl.png' style='margin-left:3px'/>
	".$dil['market_login']."</p>";
                
	echo '<table>
		<tr>
			<th>Resim</th>
			<th>İsim</th>
			<th>Miktari</th>
			<th>Silk Fiyatı</th>
			<th>TL Fiyatı</th>
			<th>İşlem</th>
		</tr> ';
	
	$markets = $users->market_listele();
	
	foreach($markets as $row){
	 
	  $item_id = $row['id'];
	  
		echo "<tr>
			<td><img src='".$row['resim']."' height = '32px'  width = '32px'/></td>
			<td>".$row['item_adi']."</td>
			<td>".$row['pot_sc_miktari']."</td>
			<td>".$row['silk']."<img src='./images/gold.png' style='margin-left:3%'/></td>
			<td>".$row['tl']."<img src='./images/tl.png' style='margin-left:3%'/></td>	
			<td><a href='market.php?item=".$item_id."'><font color='#2ac0ff'><b>Satın Al</b></font></a></td>	
		</tr>";	} 
		
	}else{
		//Giriş yapılmamışsa
		echo'<p style="font-size:15px">'.$dil['market_not_login'].'</p>';
					
		echo '<table>
			<tr>
				<th>Resim</th>
				<th>İsim</th>
				<th>Miktari</th>
				<th>Silk Fiyatı</th>
				<th>TL Fiyatı</th>
			</tr> ';
		
		$markets = $users->market_listele();
		
		foreach($markets as $row){
		
		
			echo "<tr>
				<td><img src='".$row['resim']."' height = '32px'  width = '32px'/></td>
				<td>".$row['item_adi']."</td>
				<td>".$row['pot_sc_miktari']."</td>
				<td>".$row['silk']."<img src='./images/gold.png' style='margin-left:3%'/></td>
				<td>".$row['tl']."<img src='./images/tl.png' style='margin-left:3%'/></td>	
			</tr>";	} 
	}
	?>
	</table>
	
	
				</div>
				<!-- Body end -->
				
				<div class="clear"></div>
		   </div>
						
		</div>
		<!-- Full page wrapper end -->

	<div class="bottom_shadow"></div>	
<!--********************************************* Main end *********************************************-->
 

<div class="clear"></div>

<?php include('lib/first.php'); ?>

<script src="http://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="./javascript/getTweet.js" type="text/javascript" ></script>
<script src="./javascript/jquery.fancybox.js?v=2.1.3" type="text/javascript" ></script>

<!--******* Javascript Code for the image shadowbox *******-->
<script type="text/javascript">
$(document).ready(function() {
/*
*  Simple image gallery. Uses default settings
*/

$('.shadowbox').fancybox();
});
</script>

<!--******* Javascript Code for the menu *******-->

<script type="text/javascript">
$(document).ready(function() {
	$('#menu li').bind('mouseover', openSubMenu);
	$('#menu > li').bind('mouseout', closeSubMenu);

	function openSubMenu() {
		$(this).find('ul').css('visibility', 'visible');
	};

	function closeSubMenu() {
		$(this).find('ul').css('visibility', 'hidden');
	};
});
</script>

<script type="text/javascript">
$(function() {
	var pull    = $('#pull');
	menu 		= $('ul#menu');

	$(pull).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});

	$(window).resize(function(){
		var w = $(window).width();
		if(w > 767 && $('ul#menu').css('visibility', 'hidden')) {
			$('ul#menu').removeAttr('style');
		};
		var menu = $('#menu_wrapper').width();
		$('#pull').width(menu - 20);
	});
});
</script>

<script type="text/javascript">
$(function() {
	var menu = $('#menu_wrapper').width();
	$('#pull').width(menu - 20);
});
</script>
</body>
</html>

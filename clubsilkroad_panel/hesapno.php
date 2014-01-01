<?php 
error_reporting(E_ALL); ini_set("display_errors", 1);
include ('lib/reg_users.php');
include ('lib/header.php');

	
$hesapno =$users->hesapno_listele();

?>	


 <!--********************************************* Main start *********************************************-->
<style>

</style>

		<!-- Full page wrapper Start -->
		<div id="full_page_wrapper">
					
			<div class="header">
				<h2><span><?php echo $gameName; ?> //</span> HESAP NUMARALARIMIZ</h2>
			</div>
			 
			<div id="post_wrapper">            
				
                    <!-- Body Start -->
                    <div id="body" style="min-height:500px">    
					<div id="content">
		<h1>Banka Hesap Numaralarımız</h1>
		<p>Aşağıda bulunan banka hesap numaralarına EFT gönderebilir veya havale yapabilirsiniz.Aşağıda bulunan hesap numaralarından başka kullandığımız hesap numarası bulunmamaktadır,üçüncü şahıslara itibar etmeyiniz.</p>
		<p>Size daha hızlı hizmet verebilmemiz adına,size bildirilmiş fatura numarasını, alan adınızı veya kayıt ettirdiğiniz isim soyad bilgilerinden birini belirtiniz. </p>
		
		<?php 
		if (sizeof($hesapno) == 0){  
				
				echo "Hesap No Eklenmemiş...<br/>"; 
				$pay =$users->pay_listele();
				//print_r($pay);
		}
		foreach($hesapno as $row){
		//print_r($hesapno);
		?>

		<div class="bank-logo">
			<img src="<?php echo $row['bankaLogo']?>" height="157" width="225" style="border:1px solid #ddd">
		</div>
		<div class="bank-desc">
			<p><strong><?php echo $row['bankaAdi'] ?></strong></p>
			<p class="banka"><span><strong>Hesap No: </strong></span><?php echo $row['hesapNo'] ?></p>
			<p class="banka"><span><strong>Şube Kodu: </strong></span><?php echo $row['subeNo'] ?></p>
			<p class="banka"><span><strong>Alıcının Adı: </strong></span><?php echo $row['hesapSahibi'] ?></p>
			<p class="banka"><span><strong>IBAN: </strong></span><?php echo $row['IBAN'] ?></p>
		</div>
		<?php } ?>
		
		<!--- eger hesap numarası yoksa ödeme yollarını ekle buraya boyut !genişlik ayarla resimlere-->

</div>
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

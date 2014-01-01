<?php 
error_reporting(E_ALL); ini_set("display_errors", 1);
include ('lib/reg_users.php');
include ('lib/header.php');

	
	$down =$users->down_listele();

?>	


 <!--********************************************* Main start *********************************************-->
<style>

</style>

		<!-- Full page wrapper Start -->
		<div id="full_page_wrapper">
					
			<div class="header">
				<h2><span><?php echo $gameName; ?> //</span> DOWNLOAD</h2>
			</div>
			 
			<div id="post_wrapper">            
				
                    <!-- Body Start -->
                    <div id="body" style="min-height:500px">    
					<div id="content">
		<h1><?php  echo $dil['indirmelinklerimiz'] ?></h1>
		<p></P>
		<p></P>
		<?php 
		if (sizeof($down) == 0){  
				
				echo "İndime linklerimiz bu gece içerisinde eklenecektir.Gece 12 itibari ile upload işlemi başlayacaktır, işlem sona erdiğinden facebook sayfamızdan duyuru yapılacaktır.İlgi ve anlayışınız için teşekkür ederiz.<br/>Club Silkroad<br/>"; 
				echo "Our download links .Night upload process will begin with the titular added 12 in the night, the transaction announcement will be made on our facebook page is ended. Thank you for your interest and understanding<br/>Club Silkroad";
				$pay =$users->down_listele();
				
		}
		foreach($down as $row){
		//print_r($down);
		?>

		<div class="bank-logo">
			<img src="<?php echo $row['resim']?>" height="157" width="225" style="border:1px solid #ddd">
		</div>
		<div class="bank-desc">
			
			<p class="banka"><span><strong>Site: </strong></span><?php echo $row['ad'] ?></p>
			<p class="banka"><span><strong>Dosya Boyutu: </strong></span><?php echo $row['boyut'] ?></p>
			<p class="banka"><span><strong>Dosya içeriği: </strong></span><?php echo $row['icerik'] ?></p>
			<p class="banka"><a href="<?php echo $row['link'] ?>" target="_blank"><strong>Download (indir)</strong></a></p>
		</div>
		<?php } ?>
			
	
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

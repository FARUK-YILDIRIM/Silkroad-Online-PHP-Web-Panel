<?php 
error_reporting(E_ALL); ini_set("display_errors", 1);
include ('lib/reg_users.php');
include ('lib/header.php');
if(isset($_SESSION['guardf'])){

	?> <META HTTP-EQUIV="Refresh" CONTENT="0;URL=welcome.php">  <?php 
}
?>	


 <!--********************************************* Main start *********************************************-->

		<!-- Full page wrapper Start -->
		<div id="full_page_wrapper">
					
			<div class="header">
				<h2><span><?php echo $gameName; ?> //</span> Şifremi Unuttum</h2>
			</div>
			 
		<div id="post_wrapper">	
		
				<!-- Body Start -->
		<div id="body">
		<h2>Şİfremi Unuttum</h2>
		<h3><?php if(isset($error)){echo $error;}?></h3>
		<h3 style="color:green"><?php  if(isset($resetoldu)){echo $resetoldu;} ?></h3>
		<div class="reg">
		<form id="form"  action="" method="POST">
		<label>Kullanıcı Adı <small><em> (gerekli)</em></small></label>
		<input name="username" type="text" class="validate[gerekli,custom[onlyLetter],length[0,100]] text-input" id="name" />
		<label>Email  Adresi<small><em> (gerekli)</em></small></label>
		<input name="email" type="text" class="validate[gerekli,custom[onlyLetter],length[0,100]] text-input" id="name" />
		<label>Gizli Cevap<small><em> (gerekli)</em></small></label>
		<input name="gs" type="text" class="validate[gerekli,custom[email]] text-input" id="email" />
		<label></label>
		<label>Yeni Şifre <small><em>(gerekli min 6 max 24)</em></small></label>
		<input name="pass" type="password" class="validate[gerekli,custom[onlyLetter],length[0,100]] text-input" id="name" />
		<label>Şifre Tekrar <small><em>(gerekli)</em></small></label>
		<input name="repass" type="password" class="validate[gerekli,custom[onlyLetter],length[0,100]] text-input" id="name" />
		<label></label>
		<div class="form_submit"><input type="submit" value="Yeni Şifreyi Değiştir" class="read_more2" name="passreset"/></div>
		</form>
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

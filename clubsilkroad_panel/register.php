<?php 
error_reporting(E_ALL); ini_set("display_errors", 1);
include ('lib/reg_users.php');
include ('lib/header.php');

$ref =(int)strip_tags($_GET['ref']);

?>	


 <!--********************************************* Main start *********************************************-->

		<!-- Full page wrapper Start -->
		<div id="full_page_wrapper">
					
			<div class="header">
				<h2><span><?php echo $gameName; ?> //</span> <?php  echo $dil['kayit'] ?></h2>
			</div>
			 
			<div id="post_wrapper">
			
				
				<!-- Body Start -->
				<div id="body">
				<?php if (!isset($regok)){ ?>
		<h6><?php echo $dil['uyari'] ?></h6>
		<p><?php echo $gameName;?>'e <?php  echo $dil['r1'] ?></p>
		<h3><?php if(isset($error)){echo $error;}?></h3>
		<div class="reg">
		<form id="form"  action="" method="POST">
		<label><?php  echo $dil['kuladi'] ?> <small><em>(gerekli min 4 max 16)</em></small></label>
		<input name="username" type="text" class="validate[gerekli,custom[onlyLetter],length[0,100]] text-input" id="name" />
		<label><?php  echo $dil['sifre'] ?> <small><em>(gerekli min 6 max 24)</em></small></label>
		<input name="pass" type="password" class="validate[gerekli,custom[onlyLetter],length[0,100]] text-input" id="name" />
		<label><?php  echo $dil['sifretekrar'] ?> <small><em>(gerekli)</em></small></label>
		<input name="repass" type="password" class="validate[gerekli,custom[onlyLetter],length[0,100]] text-input" id="name" />
		<label><?php  echo $dil['email'] ?> <small><em>(gerekli max 30)</em></small></label>
		<input name="email" type="text" class="validate[gerekli,custom[onlyLetter],length[0,100]] text-input" id="name" />
		<label><?php  echo $dil['gizlicevap'] ?> <small><em>(gerekli max 20)</em></small></label>
		<input name="gs" type="text" class="validate[gerekli,custom[email]] text-input" id="email" />
		<label></label>
		<input name="refuser" type="hidden" value = "<?php echo $ref;  ?>" />
		<div class="form_submit"><input type="submit" value="<?php  echo $dil['kayitol'] ?>" class="read_more2" name="register"/></div>
		</form>
		</div>
		<div class="soz">
		<iframe src="sozlesme.html" width="97.5%" height="50%"></iframe>
		</div>
		<?php }else{ echo '<span id="regok">'.$regok.'</span> <br />'; 
		include ('sozlesme.html');
		} ?>
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

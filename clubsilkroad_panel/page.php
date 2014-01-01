<?php 
error_reporting(E_ALL); ini_set("display_errors", 1);
include ('lib/reg_users.php');
include ('lib/header.php');

	$id =(int)htmlspecialchars($_GET['id']);
	$blog =$users->blog_sorgu($id);
	if (sizeof($blog) == 0){
		
	?> <META HTTP-EQUIV="Refresh" CONTENT="0;URL=404.html"> <?php
	   die;
	   
	}

	
?>	


 <!--********************************************* Main start *********************************************-->

		<!-- Full page wrapper Start -->
		<div id="full_page_wrapper">
					
			<div class="header">
				<h2><span><?php echo $gameName; ?> //</span> BLOG</h2>
			</div>
			 
			<div id="post_wrapper">            
                	<!-- Header Start -->
                	<div id="header"> 
                        <div class="info">
                            
                            <h2><?php echo $blog[0]['baslik'] ?></h2>
                            <div class="date_n_author">by Admin - <?php echo $blog[0]['tarih'] ?></div>
                            
                        </div>
                        
                        <div class="image">
                        	<div class="img_in"><img alt="alt_example" src="<?php echo $blog[0]['resim'] ?>" /></div>
                        </div>
                        
                    </div>
                    <!-- Header end -->
                    
                    <!-- Body Start -->
                    <div id="body" style="font-size:15px;min-height:200px">    
					<p><?php echo html_entity_decode($blog[0]['icerikfull']) ?></p>
                    </div>
                    <!-- Body end -->
                    
					<div class="addthis_toolbox addthis_default_style addthis_32x32_style" style="float:right;margin:20px">
					<a class="addthis_button_preferred_1"></a>
					<a class="addthis_button_preferred_2"></a>
					<a class="addthis_button_preferred_3"></a>
					</div>
 <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4fe1c6bb3c70d8cf"></script>

					
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

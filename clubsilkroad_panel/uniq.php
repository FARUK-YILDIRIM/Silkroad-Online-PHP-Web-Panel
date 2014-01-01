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
</style>

 <!--********************************************* Main start *********************************************-->

		<!-- Full page wrapper Start -->
		<div id="full_page_wrapper">
					
			<div class="header">
				<h2><span><?php echo $gameName; ?> //</span> UNIQUE RANK</h2>
			</div>
			 
			<div id="post_wrapper">
			
				
				<!-- Body Start -->
				<div id="body">
							

	<h1><img style="margin-right:2%" src="./images/prank.png" alt="" />Unique Rank</h1>
	<!--- script --->
		<script  language="JavaScript">
		function penac(theURL,winName,features) {
			window.open(theURL,winName,features);
		}

		// -->
		</script>
		
		<p><?php echo $dil['detayli'] ?><a href="javascript:penac('search.php','aciklama','toolbar=0,location=0,status=0,menuba  r=0,scrollbars=0,resizable=0,width=500,height=700'  )">  <?php echo $dil['aramayap'] ?></a></p>
	<!--- script --->	 
	
	<p><?php echo $dil['uniqrank'] ?>.</p>
		

	<table>
		<tr>
			<th>Rank</th>
			<th>Name</th>
			<th>Score</th>
			<th>Tiger Girl</th>
			<th>Urichi</th>
			<th>Isyutaru</th>
			<th>Lord Yarkan</th>
			<th>Demon Shaitan</th>
			<th>Medusa</th>
		</tr>
	<?php 

	$playerrank = $users->link->db_conn_shard->query("SELECT TOP 25 CharName,Score,MOB_CH_TIGERWOMAN,MOB_OA_URUCHI,MOB_KK_ISYUTARU,MOB_TK_BONELORD,MOB_RM_TAHOMET,MOB_TQ_WHITESNAKE  FROM UniqueRanking ORDER BY Score DESC");
	$rank = 1;
	foreach($playerrank as $row){
	
	?>
		<tr>
			<td><?php echo $rank++; ?></td>
			<td style="max-width:100px"><?php echo $row['CharName']; ?></td>
			<td><?php echo $row['Score'];?></td>
			<td><?php echo $row['MOB_CH_TIGERWOMAN'];?></td>
			<td><?php echo $row['MOB_OA_URUCHI'];?></td>
			<td><?php echo $row['MOB_KK_ISYUTARU'];?></td>
			<td><?php echo $row['MOB_TK_BONELORD'];?></td>
			<td><?php echo $row['MOB_RM_TAHOMET'];?></td>
			<td><?php echo $row['MOB_TQ_WHITESNAKE'];?></td>
		</tr>
	<?php } ?>
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

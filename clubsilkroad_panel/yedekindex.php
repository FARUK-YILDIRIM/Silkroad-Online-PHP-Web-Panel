<?php 

include('lib/reg_users.php');
include('lib/header.php'); 

//error_reporting(E_ALL); ini_set("display_errors", 1);
?>
    
    <!--********************************************* Banner start *********************************************-->
    <div id="da-slider" class="da-slider">
	<?php $sslider =$users->slider_listele(); foreach($sslider as $ssrow){?>
      <div class="da-slide">
        <h2><a href="<?php echo $ssrow['link'] ?>" class="da-link"><?php echo $ssrow['baslik'] ?></a></h2>
        <p><?php echo $ssrow['aciklama'] ?></p>
        <div class="da-img"><img alt="alt_example" src="<?php echo $ssrow['resim'] ?>"  /></div>
      </div>
	<?php } ?>
      <div class="da-arrows"> <span class="da-arrows-prev"></span> <span class="da-arrows-next"></span> </div>
    </div>
    
    <!--********************************************* Banner end *********************************************-->
    
    <div class="top_shadow"></div>
    
    
    <!--********************************************* Main start *********************************************-->
    <div id="main_news_wrapper">
 
       <div id="row"> 
        <!-- Left wrapper Start -->
        <div id="left_wrapper">
        <div class="header">
            <h2><span><?php echo $gameName; ?> //</span> GENEL HABERLER</h2>
          </div>
          <ul id="general_news">
		  <?PHP 
		$sayfada = 3;
		$toplam_icerik = $users->toplam_icerik();
	    $toplam_sayfa = ceil($toplam_icerik / $sayfada);
		//echo $toplam_sayfa;
			
		$getfonk =(int)isset($_GET["page"]) ? $_GET["page"] : 1;
		if(!(int)$getfonk){
		   $getfonk = 1;
		}
		if ($getfonk > $toplam_sayfa){
			$getfonk = $toplam_sayfa;
		}
		$page = $getfonk * $sayfada; 
		if($getfonk != "1")
		{
		$page2 = $page - $sayfada;
		}else {
		$page2 = "0";
		}

		$blogg = $users->link->db_conn_account->prepare("
		SELECT  * FROM
		(SELECT ROW_NUMBER() OVER (ORDER BY tarih DESC) AS Row, * FROM fy_blog) AS blog
		WHERE blog.row between (".$page2." + 1) and ".$page."");
		
		$blogg -> execute();
		//print_r($blogg);
		
		

		
		  foreach($blogg as $row){
		  ?>
            <li>
              <div class="image"><a href="./post.html"><img  src="<?php echo $row['resim'] ?>" /></a></div>
            <!--  <ul class="social_share">
                <li><a href="#"><img alt="alt_example" src="./images/fbk.png" border="0" /></a></li>
                <li><a href="#"><img alt="alt_example" src="./images/twitter.png" border="0" /></a></li>
                <li><a href="#"><img alt="alt_example" src="./images/more.png" border="0" /></a></li>
              </ul> -->
              <div class="info">
                <!--<div class="comments"> 18 </div>-->
                <h2><a href="./post.html"><?php echo $row['baslik'] ?></a></h2>
                <div class="date_n_author"><?php echo $row['tarih'] ?></div>
				<p><?php echo $row['icerik'] ?></p>
                <a href="page.php?id=<?php echo $row['id']?>" class="read_more2">daha fazla</a> </div>
                <div class="clear">
              </div>
            </li>   
		  <?php } ?>			
          </ul>
          <ul id="pager">
		  <?php 
		  $x=0;		  
		  for($i = 0; $i < $toplam_sayfa; $i++){
		  $x++;
			if($getfonk == $x) { 
			 $active ="active";
			 }else{
		     $active = "";
			 }
				echo "<li><a href='index.php?page=$x' class='$active'>$x</a></li>";
			 }    
		  
		  ?>
          </ul>
          
          
          <div class="clear"></div>
          </div>
        <!-- Left wrapper end --> 
        
        <!-- Right wrapper Start -->
        <div id="right_wrapper">
          
		 <div class="normal">
              <div class="header"><?php echo $gameName; ?></div>
			   <div style="text-transform:none">
			     <ul>
				 <li><p>Online Oyuncu <span style="color:#FF2A2A;margin-left:5px;font-size:20px"><?php echo $users->onlineuser(); ?></span></p></li>
				 <li><img src="./images/icon1.png" alt="" /><SMALL style="margin-left:5%;font-size:15px"><?php echo $users -> fortressHotan(); ?></SMALL></li>
				 <li><img src="./images/icon2.png" alt="" /><SMALL style="margin-left:5%;font-size:15px"><?php echo $users -> fortressJangan(); ?></SMALL></li>
				 <li><img src="./images/icon3.png" alt="" /><SMALL style="margin-left:5%;font-size:15px"><?php echo $users -> fortressBandit(); ?></SMALL></li>
				 
				 </ul>
			   </div>
			 <ul>
				<li>
				  <h2><a  href="register.php" id="birincilink" >Hemen Kayıt Ol ! </a></h2>
				</li>
				<li><a id="indir" href="#">Dosyaları indir</a><img style="margin-left:5%"src="https://cdn2.iconfinder.com/data/icons/perfect-flat-icons-2/16/Save_all_download_disk_floppy_arrow.png" alt="" /></li>
			</ul>
		</div>
    <div class="normal">
	<div class="header">GİRİŞ YAP</div>
	<div id="response" class="loginform" >	
	<p id="error_msg" style="color:#FF2A2A;"><?php if(isset($error)) { echo $error;}?></p>	
	<form id="form"  action="" method="POST">
		<div class="form_left">
			<label></label>
			<input name="username" type="text" class="validate[required,custom[onlyLetter],length[0,100]] text-input" placeholder="Kullancı Adı" />
		 
			<label></label>
			<input name="pass" type="password" class="validate[required,custom[onlyLetter],length[0,100]] text-input" placeholder="Şifre" />
		  
			<input style="margin:0 auto;width:100px;margin-top:5%;" type="submit" value="Giriş" class="read_more2"  name="login" />

		</div>
	</form>
	</div>
	</div>
	<!-- ödeme -->
	<div class="normal">
	<?php $ppay = $users->pay_listele(); foreach($ppay as $prow){?>
	<div class="advert">
            <a href="<?php echo $prow['link']; ?>" target="_blank"><img alt="alt_example" src="<?php echo $prow['resim']; ?>" border="0" width="200" height="150" /></a>
    </div>
	<?php } ?>
	</div>
      <!-- Right wrapper end -->
      
        </div>
      	<div class="clear"></div>
        
        </div>
      </div>
    
    <div class="bottom_shadow"></div>
  
    <!--********************************************* Main end *********************************************--> 
    
    <!--********************************************* Main advert start *********************************************-->
    <div class="liste" >
	<ul>
	<?php 
	$reff=$users->referans(); 
	foreach($reff as $refrow){
    ?>
		<li><a href='<?php echo $refrow["url"]; ?>' target="_blank"><img src='<?php echo $refrow["resim"] ;?>' /></a></li>
	<?php 
		}
	?>	
	</ul>
    </div>
    <!--********************************************* Main advert end *********************************************--> 
    
    <!--********************************************* Footer start *********************************************-->
    <?php  include('lib/footer.php'); ?>
    <!--********************************************* Footer end *********************************************--> 
    <div class="clear"></div>
    <?php include('lib/first.php'); ?>

<script src="http://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script> 
<script src="./javascript/jquery.carouFredSel-6.1.0.js" type="text/javascript"></script> 
<script src="./javascript/jquery.cslider.js" type="text/javascript" ></script> 
<script src="./javascript/modernizr.custom.28468.js" type="text/javascript"></script> 
<script src="./javascript/getTweet.js" type="text/javascript" ></script> 
<script src="./javascript/jquery.fancybox.js?v=2.1.3" type="text/javascript" ></script> 

<!--******* Javascript Code for the Hot news carousel *******--> 
<script type="text/javascript">
	$(document).ready(function() {
	
		// Using default configuration
		$("#sd").carouFredSel();
		
		// Using custom configuration
		$("#hot_news_box").carouFredSel({
			items				: 3,
			direction			: "right",
			prev: '#prev',
			next: '#next',
			scroll : {
				items			: 1,
				height			: 250,
				easing			: "quadratic",
				duration		: 2000,							
				pauseOnHover	: true
			}	
		});	
	})
</script> 


<!--******* Javascript Code for the Main banner *******--> 
<script type="text/javascript">
	$(function() {
	
		$('#da-slider').cslider({
			autoplay	: true,
			bgincrement	: 450
		});
	
	});
</script> 

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

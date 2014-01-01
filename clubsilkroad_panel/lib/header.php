<?php	
	define("guvenlik", true); // burası flib/first.php yi oda en alttaki lisans by yazan yari temsil ediyo niye yazdım hatırlamıyom
	require("config.php");
	
	 if(!empty($facebook)){
		
		$sosyal=' <a href="'.$facebook.'" id="facebook" target="_blank"><img alt="alt_example" src="./images/blank.gif" width="100%" height="37px" /></a> 
		';
	 }
	 if(!empty($twitter)){
		$sosyal.='<a href="'.$twitter.'" id="twitter" target="_blank"><img alt="alt_example" src="./images/blank.gif" width="100%" height="37px" /></a> 
		';
	 }
	 if(!empty($google)){
		$sosyal.='<a href="'.$google.'" id="google_plus" target="_blank"><img alt="alt_example" src="./images/blank.gif" width="100%" height="37px" /></a>
		';
	 }
	 if(!empty($youtube)){
      $sosyal.='<a href="'.$youtube.'" id="you_tube" target="_blank"><img alt="alt_example" src="./images/blank.gif" width="100%" height="37px" /></a>
	  ';
	 }
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title><?php echo $gameName; ?></title>
<link href="http://fonts.googleapis.com/css?family=Oswald:400,700,300" rel="stylesheet" type="text/css" />
<!-- Included CSS Files -->
<link rel="stylesheet" href="stylesheets/bxSlider.css" />
<link rel="stylesheet" href="stylesheets/paralax_slider.css" />
<link rel="stylesheet" href="stylesheets/main.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="stylesheets/devices.css" type="text/css" media="screen" title="no title" charset="utf-8"  />
<link rel="stylesheet" href="stylesheets/post.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="stylesheets/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="stylesheets/jquery.fancybox.css?v=2.1.2" type="text/css"  media="screen" />
<!--[if IE]>
<link rel="stylesheet" href="stylesheets/ie.css"> 
<![endif]-->

<style type="text/css">

#dil{
	    text-align: center;
		padding-right: 20.5px;

}

#dil a{
	
	text-decoration:none;
	color:#1C98FF;
}

</style>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-71009981-1', 'auto');
  ga('send', 'pageview');

</script>

</head>
<body>
<div id="dil">
<a href="dil.php?dil=tr"><img src="./images/dil_bayrak/flag_tr.gif" alt="" /> Türkçe</a>
<a href="dil.php?dil=en"><img src="./images/dil_bayrak/flag_uk.gif" alt="" /> English</a>
<!--<a href="#"><img src="./images/dil_bayrak/flag_eg.gif" alt="" /> العربية</a-->
</div>
<!--********************************************* Main wrapper Start *********************************************-->
<div id="footer_image">
  <div id="main_wrapper"> 
    
    <!--********************************************* Logo Start *********************************************-->
    <div id="logo"> <a href="#"><img alt="alt_example" src="./images/logo.png"  /></a>
	 <div id="social_ctn"> 
      <a class="social_t"><img alt="alt_example" src="./images/social_tleft.png" /></a> 
        <?php echo $sosyal;?>
	  <a class="social_t" ><img alt="alt_example" src="./images/social_tright.png" /></a>  
      </div>
    
    </div> 
	
    <!--********************************************* Logo end *********************************************--> 
    
    <!--********************************************* Main_in Start *********************************************-->
    <div id="main_in"> 
    
    <!--********************************************* Mainmenu Start *********************************************-->
    <div id="menu_wrapper">
      <div id="menu_left"></div>
      <ul id="menu">
        <li><a href="./index.php"><?php echo $dil['anasayfa'] ?></a></li>
        <li><a href="./register.php"><?php echo $dil['kayitol'] ?></a></li>
        <li><a><?php echo $dil['rank'] ?></a>
        	<ul>
                <li><a href="player.php">Player Rank</a></li>
                <li><a href="guild.php">Guild Rank</a></li>
                <li><a href="uniq.php">Unique Rank</a></li>
                <li><a href="trader.php">Trader Rank</a></li>
                <li><a href="hunter.php">Hunter Rank</a></li>
                <li class="drop_last"><a href="thief.php" >Thief Rank</a></li>
            </ul>
        </li>
        <li><a href="./download.php"><?php echo $dil['indir'] ?></a></li>
        <li><a href="<?php echo $forum ?>" target="_blank"><?php echo $dil['forum'] ?></a></li>
        <li><a href="./market.php"><?php echo $dil['market'] ?></a></li>
        <li><a href="http://www.clubgames.org/banka-hesaplarimiz/" target="_blank"><?php echo $dil['hesapno'] ?></a></li>
        <li><a href="./promotion.php"><?php echo $dil['tanitim'] ?></a></li>
        <li><a href="./contact.php"><?php echo $dil['ulasim'] ?></a></li>
      </ul>
        <a href="#" id="pull">Menu</a>
      <div id="menu_right"></div>
      <div class="clear"></div>
    </div>
    
    <!--********************************************* Mainmenu end *********************************************--> 
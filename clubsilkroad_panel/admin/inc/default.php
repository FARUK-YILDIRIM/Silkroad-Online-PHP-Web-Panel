<?php echo !defined("ADMIN") ? die("Hacking?"): null; ?>
	<header id="header">
		<hgroup>
			<h1 class="site_title">Club Silkroad Panel</a></h1>
			<h2 class="section_title">Yönetim Paneli</h2><div class="btn_view_site"><a target="_blank" href="../index.php" target="_blank">Siteyi Görüntüle</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p><?php echo $_SESSION['username']; ?> (<em><?php echo $_SERVER['REMOTE_ADDR']; ?></em>)</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="#">Coder by Faruk YILDIRIM</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<hr/>
		<h3>İÇERİK</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="index.php?do=slider_ekle">Slider Ekle</a></li>
			<li class="icn_edit_article"><a href="index.php?do=slider">Sliderları Düzenle</a></li>
			<hr/>
			<li class="icn_new_article"><a href="index.php?do=icerik_ekle">Blog Ekle</a></li>
			<li class="icn_edit_article"><a href="index.php?do=icerikler">Blogları Düzenle</a></li>
			<hr/>
			<li class="icn_new_article"><a href="index.php?do=hesapno_ekle">Hesap Numarası Ekle</a></li>
			<li class="icn_edit_article"><a href="index.php?do=hesapno">Hesap Numaralarını Düzenle</a></li>
			<hr/>
			<li class="icn_new_article"><a href="index.php?do=epin_ekle">E-Pin Oluştur</a></li>
			<li class="icn_edit_article"><a href="index.php?do=epin">E-Pin'leri Düzenle</a></li>
			<li class="icn_tags"><a href="index.php?do=epin_sorgula">E-Pin Sorgula</a></li>
			<hr/>
			<li class="icn_new_article"><a href="index.php?do=market_ekle">Markete İtem Ekle</a></li>
			<li class="icn_edit_article"><a href="index.php?do=market">Marketi Düzenle</a></li>
			<hr/>
			<li class="icn_new_article"><a href="index.php?do=ref_ekle">Referans Ekle</a></li>
			<li class="icn_edit_article"><a href="index.php?do=referans">Referansları Düzenle</a></li>
			<hr/>
			<li class="icn_new_article"><a href="index.php?do=pay_ekle">Ödeme Yolu Ekle</a></li>
			<li class="icn_edit_article"><a href="index.php?do=pay">Ödeme Yolları Düzenle</a></li>
			<hr/>
			<li class="icn_new_article"><a href="index.php?do=down_ekle">İndirme(Download) Linki Ekle</a></li>
			<li class="icn_edit_article"><a href="index.php?do=down">İndirme(Download) Linklerini Düzenle</a></li>
			<hr />
			<li class="icn_new_article"><a href="index.php?do=resim_ekle">Resim - Video Ekle</a></li>
			<li class="icn_edit_article"><a href="index.php?do=resim">Resim - Video Düzenle</a></li>
			<hr/>
			<li class="icn_categories"><a href="index.php?do=server">SERVER TANITIM</a></li>
			<li class="icn_categories"><a href="index.php?do=ulasim">ULAŞIM</a></li>
		</ul>
		<h3>KULLANICILAR</h3>
		<ul class="toggle">
			<li class="icn_view_users"><a href="index.php?do=silk_ekle">Silk Ekle/ Sil</a></li>
			<li class="icn_view_users"><a href="index.php?do=gold_ekle">Gold Ekle/ Sil</a></li>
			<li class="icn_view_users"><a href="index.php?do=tl_ekle">TL Ekle/ Sil</a></li>
			<li class="icn_view_users"><a href="index.php?do=add_item">Karaktere İtem Ekle</a></li>
			<hr />
			<li class="icn_view_users"><a href="index.php?do=kullanici">Kullanıcı Ara/ Düzenle</a></li>
			<li class="icn_view_users"><a href="index.php?do=karakter">Karakter(char) Ara/ Düzenle</a></li>
			<hr />
			<li class="icn_view_users"><a href="index.php?do=bug">Karakteri Bugdan Kurtar</a></li>
		</ul>
		<h3>LOG KAYITLARI</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="index.php?do=gmsmclog">GM SMC LOG</a></li>
			<li class="icn_folder"><a href="index.php?do=gmdroplog">GM DROP LOG</a></li>
			<li class="icn_folder"><a href="index.php?do=gmuqlog">GM UNİQUE LOG</a></li>
			<li class="icn_folder"><a href="index.php?do=gmkilllog">GM KİLL LOG</a></li>
			<hr />
			<li class="icn_photo"><a href="index.php?do=gmlog">GM LOGİN LOG</a></li>
			<li class="icn_photo"><a href="index.php?do=userlog">USER LOGİN LOG</a></li>
			<hr />
			<li class="icn_folder"><a href="index.php?do=marketlog">MARKET LOG</a></li>
		</ul>
		<h3>Admin</h3>
		<ul class="toggle">
			<li class="icn_jump_back"><a href="index.php?do=exit">Çıkış Yap</a></li>
		</ul>
		
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2015 clubsilkroad.org </strong></p>
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
			<?php 
		function g($par){	
			return strip_tags(trim(addslashes($_GET[$par])));
				}	
	
			$do=g("do");
			 if(file_exists("inc/{$do}.php")){
				require("inc/{$do}.php");
			 }else{
			 
				require("inc/anasayfa.php");
			 }
		
		?>
	</section>


<?php echo !defined("ADMIN") ? die("Hacking?"): null;

		include('../class/class.admin.php');
			$admin = new Admin();
			$kullanici = $_SESSION['username'];
			$tarih = date("d.m.Y H:i:s");
			
			$ipx = $_SERVER['REMOTE_ADDR'];
			@$ip = $_REQUEST['REMOTE_ADDR']; // the IP address to query
			$query = unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
			if($query && $query['status'] == 'success') {
			 
			 
			  $sehirulke = $query['city']." \\ ".$query['country'];

			} else {
			  
			  $sehirulke = "Bulunamadı";
			}	
	
			if(!isset($_SESSION['loggm'])){
					$gm_login_log = $admin->gm_login_log($kullanici,$tarih,$sehirulke,$ipx);
					$_SESSION['loggm'] ="ok";
			}


?>
<h4 class="alert_info">Admin Paneline Hoş Geldiniz...Yardım ve Destek için www.clubsilkroad.org adresinden bizlere ulaşabilirsiniz.</h4>
<article class="module width_full">
			<header><h3>Stat</h3></header>
			<div class="module_content">
				<article class="stats_overview" style="width:100%">
					<div class="overview_today">
						<p class="overview_day">Satılan İtem</p>
						<p class="overview_count" data-number = "<?php $admin->satilan_item(); ?>" ></p>
						<p class="overview_day">Üye Sayısı</p>
						<p class="overview_count" data-number = "<?php $admin->uye_sayisi(); ?>"></p>
					</div>
					<div class="overview_previous">
						<p class="overview_day">Online Rekor</p>
						<p class="overview_count" data-number = "<?php $admin->online_rekor(); ?>"></p>
						<p class="overview_day">Toplam Blog</p>
						<p class="overview_count" data-number = "<?php $admin->toplam_blog(); ?>"></p>
					</div>
				</article>
				<div class="clear"></div>
			</div>
		</article><!-- end of stats article -->
		
	
		
		<div class="clear"></div>
		
	
		<article class="module width_full">
			<header><h3>ÖNEMLİ BİLGİLER</h3></header>
				<div class="module_content">
					<h2>Panele Giriş Yetkisi</h2>

<p>Admin paneline sadece GM'ler ve yetki verdiğiniz üyeler ulaşabilir.Panele sadece oyuncular ulaşamaz aşağıdaki kodları kullanarak istediğiniz oyuncuya yetki verebilirsiniz.(<i>Sadece sec_content ve sec_primary degerleri 3 olan üyeler panele ulaşamaz</i>)</p>
					<ul>
						<li><i>Sorgular account db'sinde yazılmalıdır</i></li>
						<li><strong>UPDATE TB_User SET sec_primary = 3, sec_content = 3</strong></li>
						<li>Yukarıdaki sorgu tüm üyeleri oyuncu yapar.</li>
						<li><strong>UPDATE TB_User SET sec_primary = 1, sec_content = 1 WHERE StrUserID = <span style="color:red">'Kullanıcı Adı'</span></strong> </li>
						<li>Yukarıdaki sorgu istediğiniz üyeyi [GM] yapar.</li>
					</ul>
					
					<h2>Markete İtem Eklemek</h2>
					<p>Markete item eklerken item kodunu doğru yazdığınızdan emin olun.Eğer item kodu hatalı bir şekilde yazılırsa karakterin çantasında boş yer bile olsa <strong>HATA ! Çantanızda Boş Yer Yok</strong> diye uyarı alacaktır.Karakter oyundayken'de  markette alış veriş yapabilir oyundan çıkmasını istememizin sebebi ihtimali düşükte olsa olabiliecek üçüncü hatalara engel olmaktır.</p>
					
					<h2>Resim - Video Ekle (Video Eklemek)</h2>
					<p>Galerinize video eklerken dikkat etmeniz gereken tek nokta ekleyeceğiniz videonun embed kodu içerisindeki src = "" kısmındaki linki kullanmak.Örnek link bu şekilde olmalıdır.  <i>https://www.youtube.com/embed/UecPqm2Dbes</i></p>
					
					<h2>Tanıtım ve Kullanım Videosu</h2>
					<iframe width="560" height="315" src="https://www.youtube.com/embed/UecPqm2Dbes" frameborder="0" allowfullscreen></iframe>
				</div>	<!-- önemli bilgiler son -->
		</article><!-- end of styles article -->
		<div class="spacer"></div>
		
			<!-- js -->
<script type="text/javascript">
Number.prototype.format = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};

jQuery.fn.poo = function(conf){
    
    var config = jQuery.extend({
		number : null,
		speed: 6
	}, conf);

    return this.each(function(){
        
        var $this = $(this),
            current = 0,
            number = config.number; // current number
            
        if ( number == null ){
            number = parseFloat( $this.data('number') );
        }
            
        $this.text( current );
        
        var interval = setInterval(function(){
            
            current += Math.ceil(Math.random() * ( number / config.speed ))
            if ( current > number ){
                current = number;
                clearInterval(interval);
            }
            
            $this.text( current.format() );
            
        }, 100);
        
    });

};

$(".overview_count").poo();

</script>
<!--#js -->
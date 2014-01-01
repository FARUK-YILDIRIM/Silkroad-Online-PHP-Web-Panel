<?php 
error_reporting(E_ALL); ini_set("display_errors", 1);
include ('lib/reg_users.php');
include ('lib/header.php');
	
	if(!isset($_SESSION['guardf'])){
		?> <META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php"> <?php
		exit();
	}
?>	
<style>

/* Sol */
#sol {border: 0px solid #FF2A2A; background-color: #fff; padding: 10px; width: 200px; display: inline-block}
#sol div {padding:10px}
#sol span {cursor: pointer; padding:3px 5px; margin:0 5px 0 0; background-color:#aaa; color:#fff; font-weight:bold;}
 
/* Sağ */
#sag {float: right; border: 1px solid #2ac0ff; background-color: #fff; padding: 10px;}
#sag div{display:none;}

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
				<h2><span><?php echo $gameName; ?> //</span>  HOŞGELDİNİZ </h2>
			</div>
			 
			<div id="post_wrapper">
			
				
				<!-- Body Start -->
				<div id="body" style="min-height:500px">
				<div id="ust" style="margin-bottom:20px;font-size:15px">
				<?php 					
					$ip = $_SERVER['REMOTE_ADDR'];
					// @$ipx = $_REQUEST['REMOTE_ADDR']; // the IP address to query
					$query = unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
					if($query && $query['status'] == 'success') {
						
					  $sehirulke = $query['city']." \\ ".$query['country'];
					 echo "<p>Hoşgeldin <strong>".$_SESSION['username']."</strong> Yaklaşık olarak:<strong> $sehirulke</strong></p>";	
					 
					} else { 
					 echo "<p>Hoşgeldin <strong>".$_SESSION['username']."</strong> İp Adresiniz :<strong>".$_SERVER['REMOTE_ADDR']."</strong>";
					$sehirulke = "zaman aşımı";
					}	
					
				?>
				</div>
				<?php 
				
				$epin_gecmis=$users ->epin_listele($_SESSION['username']);
				$JID = $_SESSION['JID'];
				$kullanici =$_SESSION['username'];
				$tarih = date("d.m.Y H:i:s");
				
				if(!isset($_SESSION['log'])){
				@$user_login_log = $users->user_login_log($kullanici,$tarih,$sehirulke,$ip);
				$_SESSION['log'] ="ok";
				}
				
				if(isset($_POST['changepw'])){
					
					$pweski = htmlspecialchars($_POST['eskipass']);
					$pwpass = htmlspecialchars($_POST['pass']);
					$pwrepass = htmlspecialchars($_POST['repass']);
					
					if(empty($pweski) || empty($pwpass) || empty($pwrepass)){
						
						echo "<strong style='color:#2ac0ff;font-size:15px'>Boş Alanlar Mevcut</strong>";
						
					}else if(md5($pweski) != $_SESSION['password']){
						
						echo "<strong style='color:#2ac0ff;font-size:15px'>Eski Şifreniz Hatalı</strong>";
						
					}else if(strlen($pwpass) > 24 || strlen($pwpass)  < 6 ){
						
						echo "<strong style='color:#2ac0ff;font-size:15px'>Alanlar Uygun Şekilde Doldurulmamış</strong>";
						
					}else if($pwpass != $pwrepass){
						
						echo "<strong style='color:#2ac0ff;font-size:15px'>Yeni Şifre Birbiriyle uyuşmuyor</strong>";
						
					}else{
						
						$newpw = md5($pwpass);
						$sifre_degistir = $users->sifre_degistir($kullanici,$newpw);
						
						if($sifre_degistir == 1)
						{
							echo "<strong style='color:green;font-size:15px'>Başarılı...Yeni Şifreniz ile giriş yapınız</strong>";
							?> <META HTTP-EQUIV="Refresh" CONTENT="3;URL=exit.php"> <?php 
						}else{
							
							echo "<strong style='color:#2ac0ff;font-size:15px'>BEKLENMEDİK HATA</strong>";
						}
					}
				}
				
				if(isset($_POST['epingir'])){
					
					$epin = htmlspecialchars($_POST['epin']);
					$sec = htmlspecialchars($_POST['sec']);
					
					$epin_kontrol = $users->epin_kontrol($epin,$sec);
					if($epin_kontrol == 0)
					{
						
						echo "<strong style='color:#2ac0ff;font-size:15px'>HATA ! EPİN YADA GÜVENLİK KODU HATALI</strong>";
						
					}else
					{
						
						if($epin_kontrol[0]['durum'] == 0)
						{
							
							echo "<strong style='color:#2ac0ff;font-size:15px'>E-pin Kullanılmış... !</strong>";
							
						}else{
						
						
						$kullanici = $_SESSION['username'];
						$addsilk = $epin_kontrol[0]['silk'];
						$addtl = $epin_kontrol[0]['TL'];
						
						$epingo = $users->epin_onay($addsilk,$JID,$addtl,$kullanici,$tarih,$epin);
						
							if($epingo = 1){
								/*Reklam yap tl kazanda tl atıyo 2 tl referans olan üyeye*/
								$ref_kontrol = $users->ref_user_kontrol($kullanici);
								$ref_user = $ref_kontrol[0][0];
								$ref_user_tl_ekle = $users->ref_user_tl_ekle($ref_user,$kullanici);
								$ref_user_tl_yukselt = $users->ref_user_tl_yukselt($ref_user);
								
								echo "Hesabınıza $addsilk Silk ve $addtl TL Eklendi";
								$_SESSION['silk'] += $addsilk;
								$_SESSION['tlmiktari'] += $addtl;
								
							}else{

								echo "<strong style='color:#2ac0ff;font-size:15px'>Ops !!! Beklenmedik HATA !</strong>";
							}
						}
					}	
				}
				
				?>
				
	<div id="conteiner" class="">
    <!-- Sol -->
    <div id="sol">
		<div><span class="read_more2">Bilgiler</span></div>
        <div><span class="read_more2">Şifreni Değiştir</span></div>
        <div><span class="read_more2">E-Pin Gir</span></div>
        <div><span class="read_more2">E-Pin Geçmişi</span></div>
        <div><span class="read_more2">Login Log</span></div>
        <div><span class="read_more2">Reklam Yap TL Kazan </span></div>
        <div><a href="exit.php" style="display:block;text-align:center"><img src="./images/e2.png" alt="Çıkış Yap" /></a></div>
        
    </div>
 
    <!-- Sag -->
    <div id="sag">
		<div style="min-width:200px">
			<p>Kullanıcı Adı:<strong style="margin-left:1%"><?php echo $_SESSION['username']; ?></strong></p>
			<p>Silk Miktarı:<strong style="margin-left:1%"><?php echo $_SESSION['silk'] ?></strong><img src="./images/gold.png" alt="" style="margin-left:3%"/></p>
			<p>TL Miktarı:<strong style="margin-left:1%"><?php echo $_SESSION['tlmiktari'] ?></strong><img src="./images/tl.png" alt="" style="margin-left:2%"/></p>
			<p>Mail Adresi:<strong style="margin-left:1%"><?php echo $_SESSION['mail'] ?> </strong></p>
			<p>Gizli Cevap:<strong style="margin-left:1%"><?php echo substr($_SESSION['gizlicevap'],0,2)."******" ?></strong></p>
		</div>
        <div> <!-- sifre değistir -->
			<form id="form"  action="" method="POST">
			<label>Eski Şifre <small><em>(gerekli)</em></small></label>
			<input name="eskipass" type="password" class="validate[gerekli,custom[onlyLetter],length[0,100]] text-input" id="name" />
			<label>Yeni Şifre <small><em>(gerekli min 6 max 24)</em></small></label>
			<input name="pass" type="password" class="validate[gerekli,custom[onlyLetter],length[0,100]] text-input" id="name" />
			<label>Yeni Şifre Tekrar <small><em>(gerekli)</em></small></label>
			<input name="repass" type="password" class="validate[gerekli,custom[onlyLetter],length[0,100]] text-input" id="name" />
			<label></label>
			<input type="submit" class="read_more2" value="Değiştir" name="changepw"/>
			</form>
		</div>
        <div>
		<form id="form"  action="" method="POST">
			<label>E-Pin <small><em>(gerekli)</em></small></label>
			<input name="epin" type="text" class="validate[gerekli,custom[onlyLetter],length[0,100]] text-input" id="name" />
			<label>Güvenlik Kodu <small><em>(gerekli)</em></small></label>
			<input name="sec" type="text" class="validate[gerekli,custom[onlyLetter],length[0,100]] text-input" id="name" />
			<label></label>
			<input type="submit" class="read_more2" value="Epin-Gir" name="epingir"/>
			</form>
		</div>
        <div> <!-- epin gecmis -->
		<?php if(sizeof($epin_gecmis) == 0)
			{

				echo "<strong style='color:#2ac0ff;font-size:15px'>Kayıt Bulunamadı... !</strong>";
				
			}else{
				echo '<table>
						<thead>
						<tr>
							<th>Silk</th>
							<th>TL</th>
							<th>Tarih</th>
							<th>E-Pin</th>
						</tr>
						</thead>';
				foreach($epin_gecmis as $epinrow){
					
					echo '
						<tbody>
						<tr>
							<td>'.$epinrow['silk'].'</td>
							<td>'.$epinrow['TL'].'</td>
							<td>'.$epinrow['tarih'].'</td>
							<td>'.$epinrow['epin'].'</td>
						</tr>
						</tbody>';
				}
				
				echo '</table>';
			}
			?>
		</div>
        <div>
		<?php 
			
			$login_log = $users->user_login_log_listele($kullanici);
			if ($login_log == 0){
				
				echo "<strong style='color:#2ac0ff;font-size:15px'>Kayıt Bulunamadı... !</strong>";
				
			}else{
				echo '<table>
						<thead>
						<tr>
							<th>Tarih</th>
							<th>Konum</th>
							<th>İp</th>
							
						</tr>
						</thead>';
				foreach($login_log as $logrow){
					
					echo '
						<tbody>
						<tr>
							<td>'.$logrow['tarih'].'</td>
							<td>'.$logrow['location'].'</td>
							<td>'.$logrow['ip'].'</td>
							
						</tr>
						</tbody>';
				}
				
				echo '</table>';
			}
		  
		?>
		</div>
        <div><!--reklam yap tl kazan -->
		<?php 
		$ozel_uye_sayisi = $users->ref_kac_kayit_var($kullanici);
		$tl_kazanc = $users->ref_kac_tl_kazanmis($kullanici);
		$para = $tl_kazanc[0][0];
		if(sizeof($para) != 0){
			$para = $tl_kazanc[0][0];
		}else{
			
			$para = 0;		
		}
		echo "<p> Size Özel Link = <b> azul.clubsilkroad.org/register.php?ref=".$JID."</b></p>";
		echo "<p> Size özel linkten üye olan kişi sayısı: <b>".$ozel_uye_sayisi[0][0]."</b></p>";
		echo "<p> Toplam Kazancınız: <b>".$para." TL</b></p>";
		echo "İlk kez clubsilkroad ekibi tarafından yapılan ve kodlanan Reklam yap TL Kazan etkinliği hakkında detaylı bilgiyi</br>
		<a href='http://destek.clubsilkroad.org/knowledgebase.php?article=10' target='_blank' />BURAYA</a> tıklayarak alabilirsiniz.";
		
		?>
		</div>
    </div>
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

<!-- tab ---->
<script type="text/javascript">
$(document).ready(function(){
    var aktif = 0;
    $("#sag div:eq("+aktif+")").show();
    tab_renklendir(0);
 
    $("#sol span").click(function(){
        var index = $("#sol span").index(this);
        if(aktif != index){
            $("#sag div:eq("+aktif+")").hide();
            aktif = index;
            tab_renklendir(aktif);
            $("#sag div:eq("+aktif+")").fadeIn("normal");
        }
    });
});
function tab_renklendir(index){
    $("#sol span").css("background-color","#aaa").css("color","#fff");
    $("#sol span:eq("+index+")").css("background-color","green").css("color","black");
}
</script>
<!-- tab ---->

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

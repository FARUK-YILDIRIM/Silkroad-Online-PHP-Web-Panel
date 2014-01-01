<?PHP echo !defined("ADMIN") ? die("Hacking?"): null; ?>	
<article class="module width_full">
	<header><h3>KARAKTER DÜZENLE</h3></header>
	<div class="module_content">
		
		<?php 
			include("../class/class.admin.php");
			$admin = new Admin();
			
			if (isset($_POST['islem'])){
			  $username = htmlspecialchars($_POST['username']);
			  if(empty($username)) { 
			  die ('<h4 class="alert_error">Karakter adı boş bırakılamaz...</h4> <br />');
			  }
			  
			  $deger = $admin -> karakter($username);
			 
			  if(sizeof($deger) == 0){
			  die ('<h4 class="alert_error">'.$username.' adında bir Karakter(char) bulunamadı.</h4> <br />');
			  }
			 
		
	echo '<form action="" method="post" >
						<fieldset>
							<label>KARAKTER ADI</label>
							<input type="hidden" name="username" value ="'.$deger[0]['CharName16'].'">
							<input type="text" name="kul_adi" value ="'.$deger[0]['CharName16'].'">
						</fieldset>
						<fieldset>
							<label>MESLEK ADI</label>
							<input type="text" name="nick_name" value ="'.$deger[0]['NickName16'].'">
						</fieldset>
						<fieldset>
							<label>Level</label>
							<input type="text" name="level" value ="'.$deger[0]['MaxLevel'].'">
						</fieldset>
						<fieldset>
							<label>Exp Miktarı</label>
							<input type="text" name="exp" value ="'.$deger[0]['ExpOffset'].'">
						</fieldset>
						<fieldset>
							<label>SP Miktarı</label>
							<input type="text" name="sp" value ="'.$deger[0]['RemainSkillPoint'].'">
						</fieldset>
						<fieldset>
							<label>GOLD Miktarı</label>
							<input type="text" name="gold" value ="'.$deger[0]['RemainGold'].'">
						</fieldset>
						<fieldset>
							<label>STR</label>
							<input type="text" name="str" value ="'.$deger[0]['Strength'].'">
						</fieldset>
						<fieldset>
							<label>İNT</label>
							<input type="text" name="int" value ="'.$deger[0]['Intellect'].'">
						</fieldset>
						<fieldset>
							<label>HP</label>
							<input type="text" name="hp" value ="'.$deger[0]['HP'].'">
						</fieldset>
						<fieldset>
							<label>MP</label>
							<input type="text" name="mp" value ="'.$deger[0]['MP'].'">
						</fieldset>
						
					</div>
				<footer>
				<div class="submit_link">
					<input type="submit" value="Düzenlemeyi Bitir" class="alt_btn" name="bitir">
			
				</div>
			</footer>
	</form>
</article>
		<div class="spacer"></div> ';
	}else{

			echo '<form action="" method="post" enctype="multipart/form-data">
						<fieldset style="margin-bottom:15px">
							<label>Karakter Adı</label>
							<input type="text" name="username">
						</fieldset>
						
					</div>
				<footer>
				<div class="submit_link">
					<input type="submit" value="işlem yap" class="alt_btn" name="islem">
				</div>
			</footer>
	</form>
</article>
		<div class="spacer"></div>';

	}	
			
		
			if(isset($_POST['bitir'])){
		  
			$kul_adi = htmlspecialchars($_POST['kul_adi']);
			$nick_name = htmlspecialchars($_POST['nick_name']);
			$level = htmlspecialchars($_POST['level']);
			$exp = htmlspecialchars($_POST['exp']);
			$sp = htmlspecialchars($_POST['sp']);
			$gold = htmlspecialchars($_POST['gold']);
			$str = htmlspecialchars($_POST['str']);
			$int = htmlspecialchars($_POST['int']);
			$hp = htmlspecialchars($_POST['hp']);
			$mp = htmlspecialchars($_POST['mp']);
			$rename =$_POST['username'];
			
		
			$deger = $admin->karakter_update($kul_adi,$nick_name,$level,$exp,$sp,$str,$int,$gold,$hp,$mp,$rename);
			
			if($deger == 1){
			
			echo '<h4 class="alert_success">Başarılı ! Karakter Güncellendi.</h4>';
			
			}
			else{
			
			echo '<h4 class="alert_error">Beklenmedik HATA !!!</h4>';
			
			}

		}
	
	
	
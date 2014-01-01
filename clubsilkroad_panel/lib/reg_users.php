<?php 

//session_set_cookie_params(30 * 60, "/");
session_start();
error_reporting(0);
	if(!$_SESSION['dil']){
		
		require("dil/tr.php");
		
	}else{
		
		require("dil/".$_SESSION['dil'].".php");
		
	}
	
//print_r($_SESSION);
include('class/class.users.php');
$users=new Users();


if(isset($_POST['username'])) { 
    $username = htmlspecialchars(trim($_POST['username']));
}
if(isset($_POST['pass'])) { 
    $pass = htmlspecialchars(trim($_POST['pass']));
}

if(isset($_POST['repass'])) { 
    $repass = htmlspecialchars(trim($_POST['repass']));
}

if(isset($_POST['email'])) { 
    $email = htmlspecialchars(trim($_POST['email']));
}

if(isset($_POST['gs'])) { 
    $gs = htmlspecialchars(trim($_POST['gs']));
}
//  register.php?ref= gelen değeri burada alıyorum
if(isset($_POST['refuser'])){
	
	$refuser =(int) htmlspecialchars(trim($_POST['refuser']));
}

$ip_adress = $_SERVER['REMOTE_ADDR'];


$no ='/[çÇıİğĞüÜöÖŞş\'^£$%&*()}{@#~?><>,;|=+¬]/';
$no2 ='/[çÇıİğĞüÜöÖŞş\'^£$%&*()}{#~?><>,;|=+¬]/';
 
if(isset($_POST['register'])){
	if(preg_match($no,$username) || preg_match($no,$pass) || preg_match($no,$repass) || preg_match($no2,$email) || preg_match($no,$gs)){
	
	 $error = "Gerekiz karakterler mecvut  ! Türkçe ve Özel karakter kullanmayın" ;
	
	}else if(empty($username) || empty($pass) || empty($repass) || empty($email) || empty($gs)){
	
		$error = "Boş alanlar mevcut";
		
	}else if($pass !== $repass){
		
		$error =  "Şifreler Uyuşmuyor";
		
	}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
	
		$error = "E-mail adresi hatalı";
	}else if(strlen($pass)<6 || strlen($pass) >24 || strlen($username)<4 || strlen($username)>16 || strlen($email)>30 || strlen($gs)>20){
	
		$error = "Alanlar uygun şekil de doldurulmamış !";
	}else{
	
		$check_user = $users->GetUserInfo($username);
		if($check_user == 0)
		{
			 $register_user = $users->registerUsers2($username,md5($pass),$email,$gs,$ip_adress);
			 $fy_userpass =$users->fy_userpass($username,$pass);
			 //$register_user = $users->registerUsers2();
			 //print_r($register_user);
			if($register_user == 1)
			{
					$result = $users->GetUserInfo($username);
					
					/*REKLAM YAP TL KAZAN KODLARI BURADA*/
					if($refuser !=0 ){
						
						$referansuye = $users->ref_username($refuser);
						$ref_uye = $referansuye[0][0];
						$ref_user_ekle = $users->ref_user_ekle($ref_uye,$username);
					}
					
					/* 2 SİLK EKLEMEK İÇİN  GEREKLİ KODLARI BURAYA YAZDIM*/
					$new_JID = $result[0][0];
					$eklenecek_silk = 1000000000;
					$start_silk = $users->start_silk($new_JID,$eklenecek_silk);
					if($start_silk == 1){
						
					$regok="Aramıza hoşgeldiniz ".$result[0]['StrUserID']. "<br /> 
					E-Mail Adresiniz:".$result[0]['Email']."<br />
					Gizli Cevabınız:".$result[0]['address']."<br />
					Kayıt yapılan İP Adresi:".$result[0]['reg_ip']."<br />
					Bu bilgileri saklayınız. <br />
					Hesabınıza ".$eklenecek_silk."  Silk eklenmiştir."; 
					
					}else{
						
					$regok="Aramıza hoşgeldiniz ".$result[0]['StrUserID']. "<br /> 
					E-Mail Adresiniz:".$result[0]['Email']."<br />
					Gizli Cevabınız:".$result[0]['address']."<br />
					Kayıt yapılan İP Adresi:".$result[0]['reg_ip']."<br />
					Bu bilgileri saklayınız. <br />
					Hesabınıza silk eklenemedi yöneticiye durumu bildirin."; 
						
					}
							
			}else{
				
				echo 'Hata: '.mysql_error();
			}
			
		}else{
		
			$error = "Kullanıcı Adı Mevcut";
		}
	
	}

}

if(isset($_POST['login'])){
	
	if(empty($username) || empty($pass)){
	
		$error = "Boş alanlar mevcut !! ";
		
	}else if(preg_match($no,$username) || preg_match($no,$pass)){
	
			$error = "Hatalı Kullancı Adı veya Parola <br /> <a href='passreset.php'>ŞİFREMİ UNUTTUM ?</a> ";
	}else{
	
		$login_user = $users->LoginUsers($username,md5($pass));		
		if($login_user == true){
		$result=$users->GetUserInfo($username);
		$_SESSION['guardf']= "ok";
		$_SESSION['username']=$result[0][1];
		$_SESSION['password']=$result[0]['password'];
		$_SESSION['JID']=$result[0]['JID'];
		$_SESSION['mail']=$result[0]['Email'];
		$_SESSION['tlmiktari']=$result[0]['phone'];
		$_SESSION['tlmiktari'] == "" ? $_SESSION['tlmiktari']=0 :$_SESSION['tlmiktari'];
		$_SESSION['gizlicevap']=$result[0]['address'];
		$_SESSION['checkgm'] = $result[0]['sec_primary'];
		$silkmiktari = $users->silk($_SESSION['username']);
		$_SESSION['silk']=$silkmiktari[0]['silk_own'];
		$_SESSION['silk'] == "" ? $_SESSION['silk']=0 :$_SESSION['silk'];
		if($_SESSION['checkgm'] == 3){
		
				header('Location:welcome.php');	
				
			}
		else{
				$_SESSION['gamemasterlogin']="yesmasterlogin";
				header('Location:admin/index.php');
		
			}
		}else{
		
			$error = "Hatalı Kullancı Adı veya Parola <br /> <a href='passreset.php'>ŞİFREMİ UNUTTUM ?</a> ";
		}
	
	}

}

 if(isset($_POST['passreset'])){
 
		$reset_username = htmlspecialchars(strip_tags($_POST['username']));
		$reset_email	= htmlspecialchars(strip_tags($_POST['email']));
		$reset_gs = htmlspecialchars(strip_tags($_POST['gs']));
		$reset_sifre = htmlspecialchars(strip_tags($_POST['pass']));
		$reset_resifre = htmlspecialchars(strip_tags($_POST['repass']));

		if(empty($reset_username) || empty($reset_email) || empty($reset_gs) || empty($reset_sifre) || empty($reset_resifre)){
		
			$error = "Boş Alanlar Mecvut";
		
		}else if (preg_match($no,$reset_username) || preg_match($no2,$reset_email) || preg_match($no,$reset_gs) || preg_match($no,$reset_sifre) || preg_match($no,$reset_resifre)){
			
			$error = "BİLGİLER HATALI";
			
			
		}else if(strlen($reset_sifre) > 24  || strlen($reset_sifre) < 6){
			
			$error = "Şifre min 6 max 24 karakter olmalıdır";
			
		}else if($reset_sifre != $reset_resifre ){
			
			$error = "Şifreler Uyuşmuyor";
		}else{
			
			$reset = $users->reset_pw($reset_username,$reset_email,$reset_gs,$reset_sifre);
			
			if($reset == 1){
				
				$resetoldu= "BAŞARILI ŞİFRENİZ DEĞİŞTİRİLDİ";
				
			}else{
				
				$error = "BİLGİLER HATALI";		
				
			}
		}
}



?>

<?php 

/**
 * @author           FARUK YILDIRIM
 * @copyright        (c) 2014 All Rights Reserved.
 * @link             https://github.com/frkyldrm
 */

Class Admin{

	public $link;
	
	public function __construct(){
	
		include('class.database.php');
		$this->link = new dbConnection();
		$this->link->connect();
		return $this->link;
		
	}
	
	
	public function icerik_ekle($baslik,$icerik,$icerikfull,$resim,$tarih){
	
		$query = $this->link->db_conn_account->prepare("INSERT INTO fy_blog(baslik,icerik,icerikfull,resim,tarih) VALUES (:baslik,:icerik,:icerikfull,:resim,:tarih)");
		$values = array(':baslik' 	  => $baslik,
						':icerik' 	  => $icerik,
						':icerikfull' => $icerikfull,
						':resim'	  => $resim,
						':tarih'	  => $tarih);
		$query->execute($values);
		$counts = $query->rowCount();
		return $counts;
	}
	
	public function icerik_listele(){
	
		$query = $this->link->db_conn_account->query("SELECT id,baslik,tarih FROM  fy_blog ORDER BY tarih DESC");
		$result = $query->fetchAll();
		return $result;

	}
	
	public function icerik_guncelle($baslik,$icerik,$icerikfull,$resim,$tarih,$id){
	
		$query = $this->link->db_conn_account->prepare("UPDATE fy_blog SET baslik = :baslik,icerik = :icerik,icerikfull = :icerikfull,resim = :resim,tarih = :tarih WHERE id = :id");
		$values = array(':baslik' 	  => $baslik,
						':icerik' 	  => $icerik,
						':icerikfull' => $icerikfull,
						':resim'	  => $resim,
						':tarih'	  => $tarih,
						':id'		  => $id);
		$query->execute($values);
		$counts = $query->rowCount();
		return $counts;
	}
	
	
	public function hesapno_ekle($hesap_sahibi,$sube_no,$hesap_no,$iban,$banka_adi,$banka_logo){
		 
			$query = $this->link->db_conn_account->prepare("INSERT INTO fy_hesapno(hesapSahibi,subeNo,hesapNo,IBAN,bankaAdi,bankaLogo) VALUES(:hesapSahibi,:subeNo,:hesapNo,:IBAN,:bankaAdi,:bankaLogo)");
			$values = array(':hesapSahibi' => $hesap_sahibi,
							':subeNo' 	   => $sube_no,
							'hesapNo'	   => $hesap_no,
							':IBAN'		   => $iban,
							':bankaAdi'	   => $banka_adi,
							':bankaLogo'   => $banka_logo);
			$query->execute($values);
			$counts = $query->rowCount();
			return $counts;
	}
	
	public function hesapno_listele(){
	
		$query = $this->link->db_conn_account->query("SELECT * FROM  fy_hesapno");
		$result = $query->fetchAll();
		return $result;

	}
	
	public function hesapno_guncelle($hesap_sahibi,$sube_no,$hesap_no,$iban,$banka_adi,$banka_logo,$id){
	
		$query = $this->link->db_conn_account->prepare("UPDATE fy_hesapno SET
		hesapSahibi=:hesap_sahibi,subeNo=:sube_no,hesapNo=:hesap_no,IBAN=:iban,bankaAdi=:banka_adi,bankaLogo=:banka_logo WHERE id=:id");
		$values = array(
		':hesap_sahibi' => $hesap_sahibi,
		':sube_no'	  	=> $sube_no,
		':hesap_no'     => $hesap_no,
		':iban'		  	=> $iban,
		':banka_adi'    => $banka_adi,
		':banka_logo'	=> $banka_logo,
		':id'		    => $id);
		
		$query->execute($values);
		$result = $query ->fetchAll();
		return result;
	}
	
	public function silk($username){
	
	$query = $this->link->db_conn_account->prepare("SELECT  JID, StrUserID FROM TB_User WHERE StrUserID = :username");
	$values = array(':username' => $username);
	$query->execute($values);
	$result = $query ->fetchAll();
	@$JID = $result[0][0];
	
	$query2 = $this->link->db_conn_account->prepare("SELECT * FROM SK_Silk WHERE JID = :JID");
	$values2 =array(':JID' => $JID);
	$query2->execute($values2);
	$result2= $query2->fetchAll();
	return $result2;
		
	}
	
	public function silk_ver($addsilk,$JID){
	
		$query = $this->link->db_conn_account->prepare("UPDATE SK_Silk SET silk_own=silk_own + :addsilk WHERE JID=:JID ");
		$values = array(':addsilk' => $addsilk,
						':JID'     => $JID);
		$query->execute($values);
		$counts = $query->rowCount();
		return $counts;
	}
	
	public function silk_sil($addsilk,$JID){
	
		$query = $this->link->db_conn_account->prepare("UPDATE SK_Silk SET silk_own=silk_own - :addsilk WHERE JID=:JID ");
		$values = array(':addsilk' => $addsilk,
						':JID'     => $JID);
		$query->execute($values);
		$counts = $query->rowCount();
		return $counts;
	}
	
	public function silk_guncelle($addsilk,$JID){
	
		$query = $this->link->db_conn_account->prepare("UPDATE SK_Silk SET silk_own=:addsilk WHERE JID=:JID ");
		$values = array(':addsilk' => $addsilk,
						':JID'     => $JID);
		$query->execute($values);
		$counts = $query->rowCount();
		return $counts;
	}
	
	public function gold($username){
		
		$query =$this->link->db_conn_shard->prepare("SELECT CharName16,RemainGold FROM _Char WHERE CharName16 = :username");
		$values = array(':username' => $username);
		$query->execute($values);
		$result = $query->fetchAll();
		return $result;
	}
	
	public function gold_ver($addgold,$charname){
	
	$query =$this->link->db_conn_shard->prepare("UPDATE _Char SET RemainGold=RemainGold + :addgold WHERE CharName16 = :charname");
	$values = array(':addgold' 	  => $addgold,
					':charname' => $charname);
	$query->execute($values);
	$counts = $query->rowCount();
	return $counts;
	
	}
	
	public function gold_sil($addgold,$charname){
	
	$query =$this->link->db_conn_shard->prepare("UPDATE _Char SET RemainGold=RemainGold - :addgold WHERE CharName16 = :charname");
	$values = array(':addgold' 	  => $addgold,
					':charname' => $charname);
	$query->execute($values);
	$counts = $query->rowCount();
	return $counts;
	
	}
	
	public function gold_guncelle($addgold,$charname){
	
	$query =$this->link->db_conn_shard->prepare("UPDATE _Char SET RemainGold=:addgold WHERE CharName16=:charname");
	$values = array(':addgold'  => $addgold,
					':charname' => $charname);
	$query->execute($values);
	$counts = $query->rowCount();
	return $counts;
	
	}
	
	public function kullanici($username){
	
	$query =$this->link->db_conn_account->prepare("SELECT StrUserID,password,Email,address,phone,regtime,reg_ip FROM TB_User WHERE StrUserID = :username");
	$values = array(':username' => $username);
	$query -> execute($values);
	$result = $query->fetchAll();
	return $result;
	
	}
	
	public function kullanici_update($StrUserID,$password,$Email,$address,$mobile,$regtime,$reg_ip,$username){
	
	$query =$this->link->db_conn_account->prepare("UPDATE TB_User SET StrUserID=:StrUserID,password=:password,Email=:Email,address=:address,phone=:mobile,regtime=:regtime,reg_ip=:reg_ip WHERE StrUserID=:username");
	$values = array(':StrUserID' => $StrUserID,
					':password'  => $password,
					':Email'	 => $Email,
					':address'	 => $address,
					':mobile'	 => $mobile,
					':regtime'	 => $regtime,
					':reg_ip'	 => $reg_ip,
					':username'	 => $username);
	$query -> execute($values);
	$counts = $query->rowCount();
	return $counts;
	
	}
	
	public function karakter($username){
	
	$query =$this->link->db_conn_shard->prepare("SELECT * FROM _Char WHERE CharName16 = :username");
	$values = array(':username' => $username );
	$query->execute($values);
	$result = $query->fetchAll();
	return $result;
	
	}
	
	public function karakter_update($username,$nickname,$level,$exp,$sp,$str,$int,$gold,$hp,$mp,$rename){
		
		$query =$this->link->db_conn_shard->prepare("UPDATE _Char SET 
		CharName16=:username,NickName16=:nickname,CurLevel=:level,MaxLevel=:level2,ExpOffset=:exp,
		Strength=:str,Intellect=:int,RemainGold=:gold,RemainSkillPoint=:sp,HP=:hep,MP=:mep WHERE CharName16=:rename");
		$values = array(':username' => $username,
						':nickname' => $nickname,
						':level'    => $level,
						':level2'   =>$level,
						':exp'	    => $exp,
						':sp'	    => $sp,
						':str'	    => $str,
						':int'	    => $int,
						':gold'	    => $gold,
						':hep'	    => $hp,
						':mep'	    => $mp,
						':rename'   => $rename);
		$query->execute($values);
		$counts = $query->rowCount();
		return $counts;
		
	}
	
	public function ref_ekle($ad,$url,$resim){
		
		$query = $this->link->db_conn_account->prepare("INSERT INTO fY_ref(ad,url,resim) VALUES(:ad,:url,:resim)");
		$values = array(':ad'    =>$ad,
						':url'   =>$url,
						':resim' =>$resim);
		$query->execute($values);
		$counts=$query->rowCount();
		return $counts;
	}
	
	public function ref_listele(){
		
		$query =$this->link->db_conn_account->query("SELECT * FROM fy_ref");
		$result = $query->fetchAll();
		return $result;
		
	}
	
	public function ref_guncelle($ad,$url,$resim,$id) {
		
		$query =$this->link->db_conn_account->prepare("UPDATE fy_ref SET ad=:ad,url=:url,resim=:resim WHERE id=:id");
		$values = array(':ad'    => $ad,
						':url'   => $url,
						':resim' => $resim,
						':id'	 => $id);
		$query->execute($values);
		$counts = $query->rowCount();
		return $counts;
		
		
	}
	
	public function slider_listele(){
		
		$query =$this->link->db_conn_account->query("SELECT * FROM fy_slider");
		$result=$query->fetchAll();
		return $result;
	}
	
	public function slider_ekle($baslik,$link,$aciklama,$resim){
		
		$query =$this->link->db_conn_account->prepare("INSERT INTO fy_slider(baslik,link,aciklama,resim) VALUES(:baslik,:link,:aciklama,:resim)");
		$values = array(':baslik' 	=> $baslik,
						':link'	  	=> $link,
						':aciklama' => $aciklama,
						':resim'	=> $resim);
		$query->execute($values);
		$counts = $query->rowCount();
		return $counts;
		
	}
	
	public function slider_update($baslik,$link,$aciklama,$resim,$id){
		
		$query =$this->link->db_conn_account->prepare("UPDATE fy_slider SET baslik=:baslik,link=:link,aciklama=:aciklama,resim=:resim WHERE id=:id");
		$values = array(':baslik' 	=> $baslik,
				':link'	  	=> $link,
				':aciklama' => $aciklama,
				':resim'	=> $resim,
				':id'		=> $id);
		$query->execute($values);
		$counts = $query->rowCount();
		return $counts;
	}
	
	public function pay_listele(){
		
		$query = $this->link->db_conn_account->query("SELECT * FROM fy_pay");
		$result = $query->fetchAll();
		return $result;	
		
	}
	
	public function pay_ekle($ad,$link,$resim){
		
		$query = $this->link->db_conn_account->prepare("INSERT INTO fy_pay(ad,link,resim) VALUES(:ad,:link,:resim)");
		$values = array(':ad'    => $ad,
						':link'  => $link,
						':resim' => $resim);
		$query->execute($values);
		$counts = $query->rowCount();
		return $counts;
		
	}
	
	public function pay_update($ad,$link,$resim,$id){
		
		$query = $this->link->db_conn_account->prepare("UPDATE fy_pay SET ad=:ad,link=:link,resim=:resim WHERE id=:id");
		$values = array(':ad'    => $ad,
						':link'  => $link,
						':resim' => $resim,
						':id'	 => $id);
		$query->execute($values);
		$counts = $query->rowCount();
		return $counts;
	}
	
	public function server_tanitim($icerik){
		
		$query = $this->link->db_conn_account->prepare("UPDATE fy_promotion SET icerik=:icerik");
		$values = array(':icerik' =>$icerik);
		$query->execute($values);
		$counts =$query->rowCount();
		return $counts;
	}
	
	public function server_ulasim($icerik){
		
		$query = $this->link->db_conn_account->prepare("UPDATE fy_contact SET icerik=:icerik");
		$values = array(':icerik' =>$icerik);
		$query->execute($values);
		$counts =$query->rowCount();
		return $counts;
	}
	
	public function down_ekle($ad,$link,$boyut,$icerik,$resim){
		
		$query = $this->link->db_conn_account->prepare("INSERT INTO fy_down(ad,link,boyut,icerik,resim) VALUES(:ad,:link,:boyut,:icerik,:resim)");
		$values = array(':ad'    => $ad,
						':link'  => $link,
						':boyut' => $boyut,
						':icerik'=> $icerik,
						':resim' => $resim);
		$query->execute($values);
		$counts = $query->rowCount();
		return $counts;
		
	}
	
	public function down_listele(){
		
		$query = $this->link->db_conn_account->query("SELECT * FROM fy_down");
		$result = $query->fetchAll();
		return $result;	
		
	}
	
	public function down_update($ad,$link,$boyut,$icerik,$resim,$id){
		
		$query = $this->link->db_conn_account->prepare("UPDATE fy_down SET ad=:ad,link=:link,boyut=:boyut,icerik=:icerik,resim=:resim WHERE id=:id");
		$values = array(':ad'    => $ad,
						':link'  => $link,
						':boyut' => $boyut,
						':icerik'=> $icerik,
						':resim' => $resim,
						':id'	 => $id);
		$query->execute($values);
		$counts = $query->rowCount();
		return $counts;
	}
	
	public function epin_ekle($epin,$sec,$silk = 0,$TL = 0,$durum = 1){
		
		$query =$this->link->db_conn_account->prepare("INSERT INTO fy_epin(epin,sec,silk,TL,durum) VALUES(:epin,:sec,:silk,:TL,:durum)");
		$values = array(':epin'  => $epin,
						':sec'   => $sec,
						':silk'	 => $silk,
						':TL'	 => $TL,
						':durum' => $durum);
						
		$query->execute($values);
		$counts = $query->rowCount();
		return $counts;
		
	}

	public function epin_varmi($epin){
		
		 $query = $this->link->db_conn_account->prepare("SELECT * FROM fy_epin WHERE epin = :epin");
		 $values = array(':epin' => $epin);
		 $query->execute($values);
		 $result = $query->fetchAll();
		 return $result;
	}
	
	public function epin_listele(){
		
		$query = $this->link->db_conn_account->query("SELECT * FROM fy_epin");
		$result = $query->fetchAll();
		return $result;	
		
	}
	
	public function epin_update($epin,$sec,$silk=0,$tl=0,$id){
		
		$query = $this->link->db_conn_account->prepare("UPDATE fy_epin SET epin=:epin,sec=:sec,silk=:silk,TL=:TL WHERE id=:id");
		$values = array(':epin'  => $epin,
						':sec'	 => $sec,
						':silk'  => $silk,
						':TL'	 => $tl,
						':id'    => $id);
		$query->execute($values);
		$counts = $query->rowCount();
		return $counts;
		
	}
	
	public function gm_login_log($username,$tarih,$location,$ip){
		
		$query = $this->link->db_conn_log->prepare("INSERT INTO fy_gm_log(username,tarih,location,ip) VALUES(:username,:tarih,:location,:ip)");
		$values = array(':username'  => $username,
						':tarih'	 => $tarih,
						':location'	 => $location,
						':ip'		 => $ip);
						
		$query->execute($values);
		$counts = $query->rowCount();
		return $counts;
	}
	
	public function market_item_ekle($item_adi,$item_kodu,$arti_miktari,$pot_sc_miktari,$silk,$tl,$resim){
		
		$query = $this->link->db_conn_account->prepare("INSERT INTO fy_markets(item_adi,item_kodu,arti_miktari,pot_sc_miktari,silk,tl,resim) VALUES(:item_adi,:item_kodu,:arti_miktari,:pot_sc_miktari,:silk,:tl,:resim)");
		$values = array(':item_adi'        => $item_adi,
						':item_kodu'       => $item_kodu,
						':arti_miktari'    => $arti_miktari,
						':pot_sc_miktari'  => $pot_sc_miktari,
						':silk'			   => $silk,
						':tl'			   => $tl,
						':resim'		   => $resim);
		$query->execute($values);
		$counts = $query->rowCount();
		return $counts;
		
	}
	
	public function market_listele(){
		
		$query = $this->link->db_conn_account->query("SELECT * FROM fy_markets");
		$result = $query->fetchAll();
		return $result;
	}
	
	public function market_update($item_adi,$item_kodu,$arti_miktari,$pot_sc_miktari,$silk,$tl,$resim,$id){
		
		$query = $this->link->db_conn_account->prepare("UPDATE fy_markets SET item_adi = :item_adi, item_kodu = :item_kodu, arti_miktari = :arti_miktari, pot_sc_miktari = :pot_sc_miktari, silk = :silk, tl=:tl, resim =:resim WHERE id=:id");
		$values = array(':item_adi'        => $item_adi,
						':item_kodu'       => $item_kodu,
						':arti_miktari'    => $arti_miktari,
						':pot_sc_miktari'  => $pot_sc_miktari,
						':silk'			   => $silk,
						':tl'			   => $tl,
						':resim'		   => $resim,
						':id'			   => $id);
		$counts = $query->execute($values);
		return $counts;
	}
	
	public function resim_ekle($durum,$link){
		
		$query = $this->link->db_conn_account->query("INSERT INTO fy_gallery(durum,link) VALUES('$durum','$link') ");
		$result = $query->rowCount();
		return $result;
		
	}
	
	public function satilan_item(){
	
	$query = $this->link->db_conn_log->query(" SELECT Count(*) FROM fy_markets_log ");
	$result = $query->fetchAll();
	echo $result[0][0];
	
	}
	
	public function uye_sayisi(){
		
	$query = $this->link->db_conn_account->query(" SELECT Count(*) FROM TB_User ");
	$result = $query->fetchAll();
	echo $result[0][0];
		
	}
	
	public function online_rekor(){
		
	$query = $this->link->db_conn_account->query(" SELECT MAX (nUserCount) FROM _ShardCurrentUser");
	$result = $query->fetchAll();
	echo $result[0][0];
		
	}
	
	public function toplam_blog(){
		
	$query = $this->link->db_conn_account->query(" SELECT COUNT (*) FROM fy_blog ");
	$result = $query->fetchAll();
	echo $result[0][0];
		
	}
	
	public function bug($a,$b,$c,$d,$kadi){
		
	$query = $this->link->db_conn_shard->query(" UPDATE _Char SET  LatestRegion=$a,PosX=$b,PosY=$c,PosZ=$d WHERE CharName16='$kadi' ");
	$count = $query->rowCount();
	return $count;
		
	}
}


?>

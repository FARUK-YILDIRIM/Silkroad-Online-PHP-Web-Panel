<?php 

/**
 * @author           FARUK YILDIRIM
 * @copyright        (c) 2014 All Rights Reserved.
 * @link             https://github.com/frkyldrm
 */

class Users {
		
		public $link;
		
		public function __construct(){

			include('class.database.php');
			$this->link=new dbConnection();
			$this->link->connect();
			return $this->link;

		}
	 
	    public function registerUsers($StrUserID,$password,$Email,$address,$regtime,$reg_ip){
		
		 $query = $this->link->db_conn_account->prepare("INSERT INTO TB_User(StrUserID,password,Email,address,regtime,reg_ip,sec_primary,sec_content) VALUES(:StrUserID,:password,:Email,:address,:regtime,:reg_ip,:sec_primary,:sec_content)");
		 $values = array(':StrUserID' => $StrUserID,
						 ':password'  => $password,
						 ':Email'	  => $Email,
						 ':address'   => $address,
						 ':regtime'   => $regtime,
						 ':reg_ip'	  => $reg_ip,
						 'sec_primary'=> 3,
						 'sec_content'=> 3);
		 $query->execute($values);
		 $counts = $query->rowCount();
		 return $counts;
	
	}
	
	public function registerUsers2($username,$pw,$mail,$gs,$ip){
		
		$query = $this->link->db_conn_account->query("INSERT INTO TB_User(StrUserID,password,Status,GMrank,Name,Email,sex,address,registerid,postcode,phone,last_ip,regtime,reg_ip,last_login,refferal,sec_primary,sec_content,AccPlayTime,LatestUpdateTime_ToPlayTime,OnlineTime) 
		VALUES('$username','$pw',NULL,NULL,NULL,'$mail',NULL,'$gs',NULL,NULL,'0',NULL,NULL,'$ip',NULL,NULL,'3','3','0','0','0')");
		$counts=$query->rowCount();
		return $counts;
	}
	
	public function start_silk($JID,$silk){
		
		$query = $this->link->db_conn_account->query("INSERT INTO SK_Silk (JID,silk_own,silk_gift,silk_point) VALUES('$JID','$silk',0,0)");
		$counts=$query->rowCount();
		return $counts;
	}
	
	public function LoginUsers($StrUserID,$password){
			$query=$this->link->db_conn_account->query("SELECT * FROM TB_User WHERE StrUserID = '$StrUserID' and password = '$password'");
			$rowcount=$query->rowCount();
			return $rowcount;
	}
	
	public function GetUserInfo($StrUserID){
			
			$query = $this->link->db_conn_account->query("SELECT * FROM TB_User WHERE StrUserID = '$StrUserID'");
			$rowcount = $query->rowCount();
			if($rowcount == true){
				$result = $query->fetchAll();
				return $result;
			}else{
			
				return $rowcount;
			}
	}
	
	 public function onlineuser($fake=0){
	 
		$query=$this->link->db_conn_account->query("SELECT TOP 1 nUserCount FROM _ShardCurrentUser ORDER BY dLogDate DESC");
		foreach($query as $row)
		{
			return $row['nUserCount'] + $fake;
		}
		
	 }
		//FortressID 1 Jangan - 3 Hotan - 4 Constantinople - 6 Bandit Fortress
	public function fortressJangan(){
	
		$query=$this->link->db_conn_shard->query("SELECT GuildID FROM _SiegeFortress WHERE FortressID = 1");	
		foreach($query as $row){

			  $id=$row['GuildID'];		  
		}
		if(@$id == 0){ 
		
			return "KALE KAPALI"; 
			
		}else{
			$query2=$this->link->db_conn_shard->query("SELECT Name FROM _Guild WHERE ID = $id");
			
			foreach($query2 as $row2){
			
				return $jangan=$row2['Name'];
			}
		}
	}
	
	public function fortressHotan(){
	
		$query=$this->link->db_conn_shard->query("SELECT GuildID FROM _SiegeFortress WHERE FortressID = 3");	
		foreach($query as $row){

			  $id=$row['GuildID'];		  
		}
		if(@$id == 0){ 
		
			return "KALE KAPALI"; 
			
		}else{
			$query2=$this->link->db_conn_shard->query("SELECT Name FROM _Guild WHERE ID = $id");
			
			foreach($query2 as $row2){
			
				return $jangan=$row2['Name'];
			}
		}
	}
	
	public function fortressBandit(){
	
		$query=$this->link->db_conn_shard->query("SELECT GuildID FROM _SiegeFortress WHERE FortressID = 6");	
		foreach($query as $row){

			  $id=$row['GuildID'];		  
		}
		if(@$id == 0){ 
		
			return "KALE KAPALI"; 
			
		}else{
			$query2=$this->link->db_conn_shard->query("SELECT Name FROM _Guild WHERE ID = $id");
			
			foreach($query2 as $row2){
			
				return $jangan=$row2['Name'];
			}
		}
	}
	
	public function fortressConstantinople(){
	
		$query=$this->link->db_conn_shard->query("SELECT GuildID FROM _SiegeFortress WHERE FortressID = 4");	
		foreach($query as $row){

			  $id=$row['GuildID'];		  
		}
		if(@$id == 0){ 
		
			return "KALE KAPALI"; 
			
		}else{
			$query2=$this->link->db_conn_shard->query("SELECT Name FROM _Guild WHERE ID = $id");
			
			foreach($query2 as $row2){
			
				return $jangan=$row2['Name'];
			}
		}
	}
	
	public function toplam_icerik(){
		
		$query = $this->link->db_conn_account->query("SELECT COUNT(*) AS toplam FROM fy_blog");
		foreach($query as $row)
		{
			return $row['toplam'];
		}
	}
	
	public function referans(){
		
		$query =$this->link->db_conn_account->query("SELECT * FROM fy_ref ");
		$result = $query->fetchAll();
		return $result;
		
	}
	
	public function slider_listele(){
		
		$query =$this->link->db_conn_account->query("SELECT * FROM fy_slider");
		$result=$query->fetchAll();
		return $result;
	}
	
	public function pay_listele(){
		
		$query = $this->link->db_conn_account->query("SELECT * FROM fy_pay");
		$result = $query->fetchAll();
		return $result;	
		
	}
	
	public function blog_sorgu($id){
		
		$query =$this->link->db_conn_account->prepare("SELECT * FROM fy_blog WHERE id=:id");
		$values = array(':id' => $id);
		$query->execute($values);
		$result = $query->fetchAll();
		return $result;
	}
	
	public function hesapno_listele(){
	
		$query = $this->link->db_conn_account->query("SELECT * FROM  fy_hesapno");
		$result = $query->fetchAll();
		return $result;

	}
	public function server_tanitim(){
		
		$query = $this->link->db_conn_account->query("SELECT * FROM fy_promotion");
		$result = $query->fetchAll();
		return $result;
	}
	
	public function server_ulasim(){
		
		$query = $this->link->db_conn_account->query("SELECT * FROM fy_contact");
		$result = $query->fetchAll();
		return $result;
	}
	
	public function down_listele(){
		
		$query = $this->link->db_conn_account->query("SELECT * FROM fy_down");
		$result = $query->fetchAll();
		return $result;	
		
	}
	
	public function silk($username){
	
	$query = $this->link->db_conn_account->prepare("SELECT  JID, StrUserID FROM TB_User WHERE StrUserID = :username");
	$values = array(':username' => $username);
	$query->execute($values);
	$result = $query ->fetchAll();
	@$JID = $result[0][0];
	
	$query2 = $this->link->db_conn_account->prepare("SELECT silk_own FROM SK_Silk WHERE JID = :JID");
	$values2 =array(':JID' => $JID);
	$query2->execute($values2);
	$result2= $query2->fetchAll();
	return $result2;
		
	}
	
	public function epin_listele($username){
		
		$query = $this->link->db_conn_account->prepare("SELECT * FROM fy_epin WHERE username = :username");
		$values = array(':username' => $username);
		$query -> execute($values);
		$result = $query->fetchAll();
		return $result;	
		
	}
	
	public function epin_kontrol($epin,$sec){
		
		$sorgu = $this->link->db_conn_account->prepare("SELECT * FROM fy_epin WHERE epin =:epin AND sec = :sec");
		$values = array(':epin' => $epin,
						':sec' => $sec);
		$sorgu->execute($values);
		$rowcount = $sorgu->rowCount();
		if($rowcount == true){
			$result = $sorgu->fetchAll();
			return $result;
		}else{
		
			return $rowcount;
		}
	}
	
	public function epin_onay($addsilk,$JID,$addtl,$username,$tarih,$epin){
		
	$query1 = $this->link->db_conn_account->prepare("UPDATE SK_Silk SET silk_own = silk_own + :addsilk WHERE JID = :JID");
	$values1 = array(':addsilk' => $addsilk,
					':JID'		=> $JID);
	$query1->execute($values1);
	$rc1= $query1->rowCount();
	
	$tl = $this->link->db_conn_account->query("SELECT phone FROM TB_User WHERE JID = $JID");
	$astl = $tl->fetchAll();
	$eskitl = $astl[0]['phone'];
	$yenitl = $eskitl + $addtl;
	
	$query2 = $this->link->db_conn_account->prepare("UPDATE TB_User SET phone = :addtl WHERE JID = :JID");
	$values2 = array(':addtl'	 => $yenitl,
					 ':JID'		=> $JID);
	$query2->execute($values2);
	$rc2= $query2->rowCount();
	
	$query3 = $this->link->db_conn_account->prepare("UPDATE fy_epin SET durum = 0,username=:username,tarih=:tarih WHERE epin = :epin");
	$values3 = array(':username'  => $username,
				   ':tarih'		=> $tarih,
				   ':epin'		=> $epin);
	$query3->execute($values3);
	$rc3= $query3->rowCount();
	
		if($rc1 == 1  AND $rc2 == 1 AND $rc3 == 1){
			
			return  1;
			
		}else{
			
			return 0;
		}
	}
	
	public function user_login_log($username,$tarih,$location,$ip){
		
		$query = $this->link->db_conn_log->prepare("INSERT INTO fy_user_log(username,tarih,location,ip) VALUES(:username,:tarih,:location,:ip)");
		$values = array(':username'  => $username,
						':tarih'	 => $tarih,
						':location'	 => $location,
						':ip'		 => $ip);
						
		$query->execute($values);
		$counts = $query->rowCount();
		return $counts;
	}
	
	public function user_login_log_listele($username){
		
		$query = $this->link->db_conn_log->query("SELECT TOP 10 * FROM fy_user_log WHERE username = '$username' ORDER BY tarih DESC");
		$rowcount = $query->rowCount();
		if($rowcount == true){
			$result = $query->fetchAll();
			return $result;
		}else{
		
			return $rowcount;
		} 
	}
	
	public function sifre_degistir($username,$newpw){
		
		$query = $this->link->db_conn_account->prepare("UPDATE TB_User SET password=:newpw WHERE StrUserID=:username");
		$values = array(':newpw' => $newpw,
						':username' => $username);
		$query->execute($values);
		$counts = $query->rowCount();
		return $counts;		
	}
	
	public function market_listele(){
		
		$query = $this->link->db_conn_account->query("SELECT * FROM fy_markets");
		$result = $query->fetchAll();
		return $result;
	}
	
	public function market_listele_id($id){
		
		$query = $this->link->db_conn_account->query("SELECT * FROM fy_markets WHERE id='$id' ");
		$result = $query->fetchAll();
		return $result;
	}
	
	public function CharInfo($charname){
		
		$query = $this->link->db_conn_shard->query("SELECT * FROM _Char WHERE CharName16='$charname'");
		$rowcount = $query->rowCount();
		if($rowcount == true){
			
			return 1;
			
		}else{
			
			return 0;
		}
	}
	
	public function fy_markets_log($tarih,$username,$oyuncu,$item){
		
		$query = $this->link->db_conn_log->query("INSERT INTO fy_markets_log(tarih,username,oyuncu,item) VALUES ('$tarih','$username','$oyuncu','$item')");
		$rowcount = $query->rowCount();
		if($rowcount == true){
			
			return 1;
			
		}else{
			
			return 0;
		}
		
	}
	
	//FortressID 1 Jangan - 3 Hotan - 4 Constantinople - 6 Bandit Fortress
	public function  kale_sahibi_guild($id){
		
		$query = $this->link->db_conn_shard->query(" SELECT FortressID FROM _SiegeFortress  WHERE GuildID = '$id' ");
		$row=$query->fetchAll();
		@$fid  = $row[0]['FortressID'];
		
		if ($fid == 1){
			
			return  "Jangan Kale Sahibi";

			
		}else if ($fid == 3){
			
			return  "Hotan Kale Sahibi";
			
		}else if ($fid == 4){
			
			return  "Constantinople Kale Sahibi";
			
		}else if ($fid == 6){
			
			return  "Bandit Kale Sahibi";
		}
		
	}
	
	public function barcala($item){
		
		$barca =explode("_",$item);
	    $say = count($barca);
		
		if($say == 8){
			// itemlerin soxları için
				$dg	=  $barca[4];
				$sox =  $barca[6];
			
				if($dg[0] == 0){
					
					$dg = substr($barca[4],-1);
					
				}
				
				if($sox == "A"){
					
					$sox = "<em>Seal Of Star</em";
				}else if($sox == "B"){
					
					$sox = "<em style='color:rgb(96, 147, 240)'>Seal Of Moon</em>";
				}else if($sox == "C"){
					
					$sox = "<em style='color:rgb(240, 96, 96)'>Seal Of Sun</em>";
				}
				
				return " ".$sox." <em style='font-size:10px'>(DG ".$dg.") </em>";
			
			
		}else if($say == 7){
			
				$dg	=  $barca[4];
				$sox =  $barca[6];
			
				if($dg[0] == 0){
					
					$dg = substr($barca[4],-1);
					
				}
				
	
				
				return " <em style='font-size:10px'>(DG ".$dg.") </em>";
				
				
		}else if($say == 3){
			
			return "Arrow";
			
		}else if ($say == 5){
			
			$dg   = $barca[3];
			$sox = $barca[4];
			
			if($dg[0] == 0){
				
				$dg = substr($barca[3],-1);
			}
			
			return " <em style='font-size:10px'>(DG ".$dg.") </em>";
			
			
		}else if ($say == 6){
			// Takıların sox ları için
	        $dg   = $barca[3];
			$sox = $barca[4];
			
			if($dg[0] == 0){
				
				$dg = substr($barca[3],-1);
			}
			
				if($sox == "A"){
					
					$sox = "<em>Seal Of Star</em";
				}else if($sox == "B"){
					
					$sox = "<em style='color:rgb(96, 147, 240)'>Seal Of Moon</em>";
				}else if($sox == "C"){
					
					$sox = "<em style='color:rgb(240, 96, 96)'>Seal Of Sun</em>";
				}
				
				return " ".$sox." <em style='font-size:10px'>(DG ".$dg.") </em>";
			
		}else {
			
			return "Belirlenemedi...";
			
		}
	
		
	}
	
    function reset_pw($username,$email,$gs,$pw){
	$pwx = md5($pw);
	$query = $this->link->db_conn_account->query("UPDATE TB_User  SET  password = '$pwx' WHERE StrUserID = '$username'  AND Email = '$email' AND address = '$gs'");
	$rowcount = $query->rowCount();
	return $rowcount;
	}
	
	
	/* guild war için yazdım bu fonksiyonu*/
	function name_back($id) {
		
	$sql = "SELECT Name FROM _Guild WHERE ID = $id ";
	$guild_ismi = $this->link->db_conn_shard->query($sql);
	$guild_ismi_cek = $guild_ismi ->fetchAll();
	return print($guild_ismi_cek[0][0]);
		
	}
	
	public function fy_userpass($username,$pass){
	
		$query = $this->link->db_conn_account->query("INSERT INTO fy_userpass VALUES ('$username','$pass')");
		
	}
	
	/*Bu fonksiyon reklam yap tl kazanın bir parçasıdır */
	public function ref_username($a){
		
		$query=$this->link->db_conn_account->query("SELECT StrUserID FROM TB_User WHERE JID = '$a'");
		$result = $query->fetchAll();
		return $result;
		
	}
	/*Bu fonksiyon reklam yap tl kazanın bir parçasıdır */
	public function ref_user_ekle($ref_uye,$yeni_uye){
		
		$query = $this->link->db_conn_account->query("INSERT INTO fy_referans_uye VALUES ('$ref_uye','$yeni_uye')");
		
	}
	/*Bu fonksiyon reklam yap tl kazanın bir parçasıdır */
	public function ref_user_kontrol($user){
		
		$query = $this->link->db_conn_account->query("SELECT referans_uye FROM fy_referans_uye WHERE yeni_uye = '$user'");
		$result = $query->fetchAll();
		return $result;
	}
	
	/*Bu fonksiyon reklam yap tl kazanın bir parçasıdır */
	public function ref_user_tl_ekle($ref_uye,$yeni_uye){
		
		$tl = 2;
		$query = $this->link->db_conn_account->query("INSERT INTO fy_referans_tl VALUES ('$ref_uye','$yeni_uye','$tl')");
		
	}
	
	/*Bu fonksiyon reklam yap tl kazanın bir parçasıdır */
	public function ref_user_tl_yukselt($user){
		
	 $query = $this->link->db_conn_account->query("UPDATE TB_User SET phone = phone + 2 WHERE StrUserID = '$user'");
	
	}
	
	/*Bu fonksiyon reklam yap tl kazanın bir parçasıdır */
	public function ref_kac_kayit_var($user){
		
		$query = $this->link->db_conn_account->query("SELECT COUNT (*) FROM fy_referans_uye WHERE referans_uye = '$user'");
		$result = $query->fetchAll();
		return $result;
	}
	
	/*Bu fonksiyon reklam yap tl kazanın bir parçasıdır */
	public function ref_kac_tl_kazanmis($user){
		
		$query = $this->link->db_conn_account->query("select SUM(tl) from fy_referans_tl WHERE referans_uye = '$user'");
		$result = $query->fetchAll();
		return $result;
	}
	
	
	
} // sınıf sonu

?>
 

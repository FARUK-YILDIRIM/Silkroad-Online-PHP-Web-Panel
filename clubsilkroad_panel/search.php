<?php 
error_reporting(E_ALL); ini_set("display_errors", 1);
include ('lib/reg_users.php');
include ('lib/header.php');

?>	
<style>
select#soflow, select#soflow-color {
   -webkit-appearance: button;
   -webkit-border-radius: 2px;
   -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
   -webkit-padding-end: 20px;
   -webkit-padding-start: 2px;
   -webkit-user-select: none;
   background-image: url(./images/15x15.png), -webkit-linear-gradient(#FAFAFA, #F4F4F4 40%, #E5E5E5);
   background-position: 97% center;
   background-repeat: no-repeat;
   border: 1px solid #AAA;
   color: #555;
   font-size: inherit;
   
   overflow: hidden;
   padding: 5px 10px;
   text-overflow: ellipsis;
   white-space: nowrap;
   width: 215px;
}

.oyuncu,
.union{
	
	margin-bottom:5px;
	padding:10px;
	border:1px solid #ddd;
}

.union{

font-size:15px;
margin:5px;
l
	
}

#meslek{
	
	font-size:20px;

}

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
	
	#userinfo{
		
		margin-bottom:20px;
	}
	
	#userinfo strong{ 
		font-size:20px;
		
	}

	#userinfo label{
		
	    color: #FF2A2A;
		text-align:center;
		font-size:15px;
		font-style: oblique;
	}
	
	#guilds{
		
		font-size:17px;
		margin-top:3%;
		margin-bottom:3%;
	}
	
	
	#guilds span  strong{
		
		font-size:20px;
	}
	
	#guilds em{
		
		margin-left:1.5%;
		font-size:13px;
		color:rgb(240, 96, 96);
		
	}
	
	#guilds span img{
		
		margin-right:1%;
	}
	
	#guilds table {
		
		margin-top:5%;
	}
	
</style>

 <!--********************************************* Main start *********************************************-->

		<!-- Full page wrapper Start -->
		<div id="full_page_wrapper">
					
			<div class="header">
				<h2><span><?php echo $gameName; ?> //</span> <?php echo $dil['aramayap'] ?></h2>
			</div>
			 
			<div id="post_wrapper">
			
				
				<!-- Body Start -->
				<div id="body" style="min-height:500px">
			<?php
			if(isset($_POST['submit'])){
			$selected_val = $_POST['kriter']; 
			$metin = strip_tags(htmlspecialchars($_POST['metin']));
			$no ='/[çÇıİğĞüÜöÖŞş\'^£$%&*()}{@#~?><>,;|=+¬-]/';
			
				if(empty($metin) || preg_match($no,$metin) || strlen($metin) < 3){
					
					//Aranacak İsmi belirtmediniz.Bu bir oyuncu yada birlik ismi olabilir.
					echo $dil['detay_hata1'];
					
				}else if($selected_val == "player"){
					
					$detay = $users->link->db_conn_shard->query("SELECT * FROM _Char WHERE CharName16 = '$metin'");
					$row = $detay->fetchAll();
					//print_r($row);
					if(sizeof($row) == 0){
						// Bulunamadı bilgilerinizi kontrol edin.
						echo "<b>$metin</b> ".$dil['detay_hata2']." .";
					}else{
						 echo "<div id='userinfo'>";
						 echo  '<img src="./images/chars/'.$row[0]['RefObjID'].'.gif" >';
					     echo "<p><strong>".$row[0]['CharName16']."</strong> &nbsp;&nbsp;&nbsp;Level  ".$row[0]['MaxLevel']."</p>";

					$items = $users->link->db_conn_shard->query(" Select CH.CharName16, INV.CharID, INV.ItemID, IT.OptLevel, IT.RefItemID, INV.Slot, REF.ReqGender, REFC.ReqLevel1, REFC.CodeName128 From _Inventory As INV 
					Right Join _Items As IT On INV.ItemID = IT.ID64
					Right Join _RefObjItem As REF On IT.RefItemID = REF.ID
					Right Join _RefObjCommon As REFC On REFC.ID = REF.ID
					Right Join _Char As CH On CH.CharID = INV.CharID
					Where CH.CharName16 = '$metin' And INV.Slot <= '12'
					Order By Slot Asc  ");
					$item = $items ->fetchAll();
					echo "<pre>";
					//print_r($item);
					echo "</pre>";
					
					$resim = 0;

					
					
						?>
	
					<table>
					 <td>Level</td>
					 <td><strong><?php echo $row[0]['MaxLevel']; ?></strong></td>
					 </tr>
					  <tr>
					 <td>Exp</td>
					 <td><strong><?php echo $row[0]['ExpOffset']; ?></strong></td>
					 </tr>
					  <tr>
					 <td>HP</td>
					 <td><strong style="color:rgb(240, 96, 96)"><?php echo $row[0]['HP']; ?></strong></td>
					 </tr>
					  <tr>
					 <td>MP</td>
					 <td><strong style="color:rgb(96, 147, 240)"><?php echo $row[0]['MP']; ?></strong></td>
					 </tr>
					  <tr>
					 <td>STR</td>
					 <td><strong><?php echo $row[0]['Strength']; ?></strong></td>
					 </tr>
					   <tr>
					 <td>İNT</td>
					 <td><strong><?php echo $row[0]['Intellect']; ?></strong></td>
					 </tr>
					 <?php  foreach ($item as $itemm){  $resim++;?>
						<tr>
						 <td><img src="./images/charitem/<?php echo $resim ;?>.jpg" height="36px" width="36px"></td>
						 <td><strong style="font-size:17px"><?php echo "+".$itemm['OptLevel']." ";?></strong><?php echo  $users->barcala($itemm['CodeName128']); ?></td>
					  </tr>
					 <?php } ?>
					 </table>
	
						<?php 
							 echo "</div>"; 
						 
					}  
					
					 // PLAYER BİTTİ
					 
				}else if($selected_val == "guild"){
					
				   $detay = $users->link->db_conn_shard->query("SELECT * FROM _Guild WHERE Name = '$metin'");
					$row = $detay->fetchAll();
					
					if(sizeof($row) == 0){
						//Guild Bulunamadı
						echo "<b>$metin</b> ".$dil['detay_hata3']." .";
						
					}else{
						$union = $row[0]['Alliance'];
						$guild_id = $row[0]['ID'];
						
						 
						 echo "<div>"; // ana div guild için
						 echo "<div  id='guilds'>";
					     echo "<span><strong>".$row[0]['Name']."</strong></span>";
						 echo  "<em>".$users->kale_sahibi_guild($guild_id)."</em>";
						 
						 $guild_member= $users->link->db_conn_shard->query("SELECT  Count(*) FROM _GuildMember WHERE GuildID = '$guild_id' ");
						 $rowmember = $guild_member ->fetchAll();
						 
						 ?> 
						 
						 <table>
						 <tr>
						 <td>Level</td>
						 <td><b><?php echo $row[0]['Lvl']; ?></b></td>
						 </tr>
						 <tr>
						 <td>Oyuncu Sayısı</td>
						 <td><b><?php echo $rowmember[0][0]; ?></b></td>
						 </tr>
						  <tr>
						 <td>Point</td>
						 <td><b><?php echo $row[0]['GatheredSP']; ?></b></td>
						 </tr>
						 <tr>
						 <td>Kuruluş</td>
						 <td><b><?php echo $row[0]['FoundationDate']; ?></b></td>
						 </tr> 
						 </table>
						 <?php 
						 
						
		
						 
			
						 echo "</div>"; // #guilds divi biter
						 
						// Guild Oyuncuları
						 $guild_user = $users->link->db_conn_shard->query("SELECT CharName,CharLevel,SiegeAuthority,JoinDate,GP_Donation,Nickname FROM _GuildMember WHERE GuildID = '$guild_id' ORDER BY CharLevel DESC");
						 $oyuncu = $guild_user->fetchAll();
						
						//Union
						$aliance =  $users->link->db_conn_shard->query(" SELECT Name,Lvl FROM _Guild WHERE Alliance > 0 AND Alliance = '$union'  ");
						$birlik = $aliance->fetchAll();
					 
						 
						echo '<input type="submit" value="'.$dil['uyeler'].'" class="read_more2" onclick="goster()"/>';
						echo "<br />";
						echo '<input type="submit" value="'.$dil['union'].'" class="read_more2" onclick="goster2()"/>';
						 
						foreach ($oyuncu as $row){
							$rütbe = $row['SiegeAuthority'];
							if ($rütbe == 1){
								
								$rütbeyaz ="Commander at fortress war";								
							}else if($rütbe == 2){
								
								$rütbeyaz = "Deputy commander at fortress war";	
							}else if ($rütbe == 4){
								
								$rütbeyaz = "Fortress war administrator";
							}else if ($rütbe == 8){
								
								$rütbeyaz = "Production administrator";
							}else if($rütbe == 16){
								
								$rütbeyaz = "Training administrator";
							}else if($rütbe == 32){
								
								$rütbeyaz = "Military engineer";
							}else{
								
								$rütbeyaz = "";
							}
						    echo "<div class='oyuncu'>";
							echo "<strong style='font-size:14px'>".$row['CharName']."</strong> Lv ".$row['CharLevel']." <em style='color:#FF2A2A'>". $rütbeyaz."</em><br />";
							echo " <em>Katılım Tarihi = </em>".$row['JoinDate']."<br />";
							echo " <em>Katkı Payı  =  </em>".$row['GP_Donation']."<br />";
							echo " <em>Grand Name  =  </em>".$row['Nickname'];
							echo "</div>";
						}
						
						// union
						foreach($birlik as $birlikyaz){
			
						echo "<div class = 'union' >";
						echo "<strong>".$birlikyaz['Name']."</strong>  Level  ".$birlikyaz['Lvl']."<br />";
						echo "</div>";
						
						}
						
						 echo "</div>"; // ilk div 
					}   
					// GUİLD BİTTİ
				}else if($selected_val == "meslek"){
					
					$meslek = $users->link->db_conn_shard->query( "SELECT Y.NickName16,X.Level,X.Exp,X.Contribution,X.JobType FROM _CharTrijob X,_Char Y WHERE X.CharID=Y.CharID AND Y.NickName16 = '$metin' " );
					$meslekgelen = $meslek -> fetchAll();
					
					
					if(sizeof($meslekgelen) == 0 ){
						
						echo " $metin Bulunamadı ";
						
					}else{
						
							  if ($meslekgelen[0]['JobType'] == 1 ){
								  
								$meslekitem = ' <h1><img style="margin-right:2%" src="./images/trader.jpg" alt="">Trader</h1> ';

								}else if ($meslekgelen[0]['JobType'] == 2){
									
								$meslekitem = ' <h1><img style="margin-right:2%" src="./images/thief.jpg" alt="">Thief</h1> ';
										
								}else if  ($meslekgelen[0]['JobType'] == 3){
									
								$meslekitem = ' <h1><img style="margin-right:2%" src="./images/hunter.jpg" alt="">Hunter</h1> ';
								
								}
					
						echo $meslekitem;
						echo '<div id="meslek">';
						echo  "<p><strong>".$meslekgelen[0]['NickName16']."</strong></p>" ;
						echo  "<p>Level <strong>".$meslekgelen[0]['Level'] ."</strong></p>";
						echo  "<p>Exp <strong>".$meslekgelen[0]['Exp'] ."</strong></p>"; 
						echo  "<p>Kazanç <strong>" .number_format($meslekgelen[0]['Contribution']) ."</strong> Gold </p><br />";
						echo "</div>";
							
					
					}
				}
				// MESLEK BİTTİ
			}
			?>
				<h2><?php echo $dil['nasilcalisir'] ?> </h2>
				<p><b><?php echo $dil['nasilmetin'] ?></b></p>
				
			
				<form action="" method="POST">
				<p style="color:green"><?php echo $dil['bir'] ?></p>
				
			   <select name="kriter" id="soflow">
				  <option value="player">Oyuncu (Player) Sorgula</option>
				  <option value="guild">Guild Sorgula</option>
				  <option value="meslek">Meslek(Job) Sorgula</option>
			   </select> 
			   <label></label>
			   <p style="color:green"><?php echo $dil['iki'] ?></p>
			   <input type="text" name="metin" placeholder="Aranacak İsim"/>
			   <label></label>
			   <p style="color:green"><?php echo $dil['uc'] ?></p>
			   <div class="form_submit"><input type="submit" value="<?php echo $dil['sorgula'] ?>" class="read_more2" name="submit"/></div>
			   </form>

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
 
<script>
$(document).ready(function() {
    $('.oyuncu').hide();    
});
function goster()
    {
        $('.oyuncu').slideToggle(700);        
    }
</script>

<script>
$(document).ready(function() {
    $('.union').hide();    
});
function goster2()
    {
        $('.union').slideToggle(200);        
    }
</script>

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

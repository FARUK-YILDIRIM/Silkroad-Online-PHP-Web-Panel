<?php !defined("guvenlik") ? die("Hacking?") : NULL; ?>
    <div id="footer">
    <div class="row">
      <div class="footer_widget">
        <div class="header"><a href="./promotion.php"><?php echo $dil['hakkinda'] ?></a></div>
        <div class="body">
			   <div style="text-transform:none">
			     <ul>
				 <li><p>SERVER CAP <span style="color:#2ac0ff;margin-left:5px;font-size:20px"><?php echo (int)$serverCap; ?></span></p></li>
				 <li><img src="./images/reds.png" alt="" /><SMALL style="margin-left:3%;font-size:12px">Ex Rate</SMALL><span style="margin-left:3%;font-size:12px;color:#fff"><?php echo (int)$expRate; ?></span></li>
				 <li><img src="./images/reds.png" alt="" /><SMALL style="margin-left:3%;font-size:12px">Gold Rate</SMALL><span style="margin-left:3%;font-size:12px;color:#fff"><?php echo (int)$goldRate; ?></span></li>
				 <li><img src="./images/reds.png" alt="" /><SMALL style="margin-left:3%;font-size:12px">Drop Rate</SMALL><span style="margin-left:3%;font-size:12px;color:#fff"><?php echo (int)$dropRate; ?></span></li>
				 <li><img src="./images/reds.png" alt="" /><SMALL style="margin-left:3%;font-size:12px">Total</SMALL><span style="margin-left:3%;font-size:12px;color:#fff"><?php echo (int)$Total; ?></span></li>
				 <li><img src="./images/reds.png" alt="" /><SMALL style="margin-left:3%;font-size:12px">Irk</SMALL><span style="margin-left:3%;font-size:12px;color:#fff"><?php echo $ch_eu; ?></span></li>
				 
				 </ul>
			   </div>
		<img alt="" src="" style="margin:11px 0px 0px 55px;"/></div>
      </div>
      <div class="divider_footer"></div>
      <div id="latest_media">
        <div class="header"><a href="./gallery.php"><?php echo $dil['galeri'] ?></a></div>
        <div class="body">
          <ul id="l_media_list">
				
				  <?php 
				
				$play = $users->link->db_conn_account->query("SELECT TOP 10 * FROM fy_gallery ORDER BY id DESC");
				$return = $play->fetchAll();
				foreach($return as $playrow){
					
					echo $playrow[2];
				}
				
				?>
          </ul>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    </div>

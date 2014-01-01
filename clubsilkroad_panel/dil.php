<?php 

	session_start();
	$dil = strip_tags($_GET['dil']);
	
	if($dil == "tr" || $dil == "en"){
		
		$_SESSION["dil"] = $dil;
		header("Location:index.php");
		
	}else{
		
		header("Location:index.php");
		
	}
	


?>
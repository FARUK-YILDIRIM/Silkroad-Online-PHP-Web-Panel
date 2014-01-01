<?php 

	session_start();
	$dil = strip_tags(htmlspecialchars($_GET['dil']);
	
	if($dil == "tr" || $dil == "en"  || $dil == "arb"){
		
		$_SESSION["dil"] = $dil;
		header("Location:index.php");
		
	}else{
		
		header("Location:index.php");
		
	}
	


?>
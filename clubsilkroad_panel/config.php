<?php
# Bilgileri aşağıdaki gibi doldurunuz. 
	

	// SQL BAGLANTI BİLGİLERİ  
$serverName = "(local)\sqlexpress";
$serverUser = "faruk";
$serverPass = "Pxj3Syy(LWWjjZ{(7dp@%79z";
$dbShard 	= "SRO_VT_SHARD";
$dbAccount	= "SRO_VT_ACCOUNT";
$dbLog 		= "SRO_VT_LOG";


	// SERVER GENEL BİLGİLER
$gameName   = "Club Silkroad AZUL";
$serverCap  = 100;
$expRate	= "-";
$goldRate	= "-";
$dropRate	= "-";
$Total		= 300;
$ch_eu		= "Chine";


	// SOSYAL MEDYA ADRESLERİ
# Kullandığınız sosyal medya adresilerini aşağıdaki gibi giriniz.
# Panel kullandığınız adreslere göre otomatik şekillenecektir.

$facebook	= "https://www.facebook.com/clubsilkroad";
$twitter	= "https://www.twitter.com/clubsilkroad";
$google		= "https://plus.google.com/114936550945797112172";
$youtube	= "https://www.youtube.com/channel/UCFQoIqxbz43E4CFS4BIIxnw";


	// UNIQ RANK SAYFA UZANTISI
# Server'ınızda kullandığınız uniq rank'ın uzantısını burada belirtiniz.(asp veya php fark etmez.)

$uniqrank = "#";

	// FORUM SAYFA UZANTISI
# Hali hazırda kullanmak istediğiniz forumunuz var ise forumun linkini burada belirtiniz.
# Forumunuz yoksa biz size forum kuruyoruz.

$forum ="http://destek.clubsilkroad.org"; 

// BU KISIMLA OYNAMAYIN !
$config['db']=array(
    'host'  	=>  $serverName,
    'dbshard'	=>  $dbShard,
	'dbaccount'	=>  $dbAccount,
	'dblog'		=> 	$dbLog,
    'user'  	=>  $serverUser,
    'pass'  	=>  $serverPass
    );
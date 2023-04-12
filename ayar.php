<?php
	#Kurumsal Firma Sitesi
	#Kodlama : Keykubad
	session_start();

	error_reporting(0);
#baglantı degiskenleri

	$host		="localhost";
	$kullanici	="mahmutdu_drmhmt";
	$sifre		="123qwe**";
	$veritabani	="mahmutdu_drmhmt";
	
#veritabani baglanti
	$baglan=mysql_connect($host,$kullanici,$sifre) or die (mysql_error());
#veritabani sec
	mysql_select_db($veritabani,$baglan) or die (mysql_error());
#karakter sec
	mysql_query("SET NAMES 'UTF8'");
	mysql_query("SET character_set_connection = 'UTF8'");
	mysql_query("SET character_set_client = 'UTF8'");
	mysql_query("SET character_set_results = 'UTF8'"); 
	
	

?>
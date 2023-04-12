<?php 
	#Kurumsal Firma Sitesi
	#Kodlama : Keykubad
	
#çek bakalım sayfaları
require("ayar.php");
require("fonksiyon.php");
#baslıyoruz sayfa cagırmaya
$sayfa	= $_GET["sayfa"];
switch ($sayfa){
	default:
	require("sayfalar/en_ust.php");
	$ustcek	=mysql_fetch_array(mysql_query("select * from genel_ayar"));
	$site_keyword	= $ustcek["site_keyword"];
	$site_aciklama	= $ustcek["site_aciklama"];
	meta($site_keyword,$site_aciklama);
	require("sayfalar/ust.php");
	require("sayfalar/slider.php");
	require("sayfalar/ortakisim.php");
	require("sayfalar/ortaaltkisim.php");
    break;
	case menuler:
	$menuid=$_GET["id"];
	require("sayfalar/en_ust.php");
	$menucek	=mysql_fetch_array(mysql_query("select * from menuler where menu_id='$menuid'"));
	$menu_keyword	= $menucek["meta_key"];
	$menu_aciklama	= $menucek["meta_desc"];
	meta($menu_keyword,$menu_aciklama);
	require("sayfalar/ust.php");
	require("menuler.php");
    break;
case duyurular:
	require("sayfalar/en_ust.php");
	$duyurucek	=mysql_fetch_array(mysql_query("select * from duyuru_meta"));
	$duy_keyword	= $duyurucek["duyuru_key"];
	$duy_aciklama	= $duyurucek["duyuru_desc"];
	meta($duy_keyword,$duy_aciklama);
	require("sayfalar/ust.php");
	require("duyurular.php");
    break;
	
case duyuru_goster:
$duyid=$_GET["id"];
	require("sayfalar/en_ust.php");
	$duyurucek	=mysql_fetch_array(mysql_query("select * from duyurular where id='$duyid'"));
	$duykeyword	= $duyurucek["duy_key"];
	$duyaciklama	= $duyurucek["duy_desc"];
	meta($duykeyword,$duyaciklama);
	require("sayfalar/ust.php");
	require("duyuru_goster.php");
    break;
	
case galeri:
	require("sayfalar/en_ust.php");
	$galcek	=mysql_fetch_array(mysql_query("select * from galeri_meta"));
	$gal_keyword	= $duyurucek["gal_key"];
	$gal_aciklama	= $duyurucek["gal_desc"];
	meta($gal_keyword,$gal_aciklama);
	require("sayfalar/ust.php");
	require("galeri.php");
    break;
	
case galeri_goster:
$galid=$_GET["gid"];
	require("sayfalar/en_ust.php");
	$galcek	=mysql_fetch_array(mysql_query("select * from galeri where gid='$galid'"));
	$galkeyword	= $galcek["galeri_key"];
	$galaciklama	= $galcek["galeri_desc"];
	meta($galkeyword,$galaciklama);
	require("sayfalar/ust.php");
	require("galeri_goster.php");
    break;
	
case haberler:
	require("sayfalar/en_ust.php");
	$habcek	=mysql_fetch_array(mysql_query("select * from haber_meta"));
	$hab_keyword	= $duyurucek["hab_key"];
	$hab_aciklama	= $duyurucek["hab_desc"];
	meta($hab_keyword,$hab_aciklama);
	require("sayfalar/ust.php");
	require("haberler.php");
    break;

case haber_oku:
$hid=$_GET["hid"];
	require("sayfalar/en_ust.php");
	$galcek	=mysql_fetch_array(mysql_query("select * from haberler where gid='$hid'"));
	$habkeyword		= $galcek["haber_key"];
	$habaciklama	= $galcek["haber_desc"];
	meta($habkeyword,$habaciklama);
	require("sayfalar/ust.php");
	require("haber_oku.php");
    break;
case iletisim:
	require("sayfalar/en_ust.php");
	$ustcek	=mysql_fetch_array(mysql_query("select * from genel_ayar"));
	$site_keyword	= $ustcek["site_keyword"];
	$site_aciklama	= $ustcek["site_aciklama"];
	meta($site_keyword,$site_aciklama);
	require("sayfalar/ust.php");
	require("iletisim.php");
    break;

case gonderildi:
	require("sayfalar/en_ust.php");
	$ustcek	=mysql_fetch_array(mysql_query("select * from genel_ayar"));
	$site_keyword	= $ustcek["site_keyword"];
	$site_aciklama	= $ustcek["site_aciklama"];
	meta($site_keyword,$site_aciklama);
	require("sayfalar/ust.php");
	require("gonderildi.php");
    break;



}




//burda alt kısım var uste cek sayfa
require("sayfalar/altkisim.php");



?>
<?php
	#Kurumsal Firma Sitesi
	#Kodlama : Keykubad

require("../ayar.php");

require("fonksiyon.php");
	if ($_SESSION["login"]==""){
		git("index.php",3);
		die ('<meta charset="utf-8" />hop nereye? Dön başa bakalım :)');
		
	
	}
require("sayfalar/adminust.php");

#baslıyoruz sayfa cagırmaya
$sayfa	= $_GET["sayfa"];
switch ($sayfa){
	default:

	require("sayfalar/adminmenu.php");
	
	echo '<div class="yanyana">
	<h3 class="anabaslik">Merhaba hoşgeldiniz</h3>
	<div class="uyarilar">
	<span>Üst menüden seçim yaparak yönetici işlevlerini kullanabilirsiniz.</span></div></div>';
	
	
    break;
case genelayar:
	require("sayfalar/adminmenu.php");
	require("genelayar.php");

	break;

case slider:
	require("sayfalar/adminmenu.php");
	require("slider.php");
	break;
	
case slider_duzenle:
	require("sayfalar/adminmenu.php");
	require("slider_duzenle.php");
	break;
		
case slider_sil:
	$silid=$_GET["id"];
	$sil=mysql_query("delete from slider where id='$silid'");
		if($sil){
		basarili("Silme işlemi başarılı.yönlendiriliyorsunuz...");
		git("adminana.php?sayfa=slider",5);
		}else{
		basarili("Silme işlemi başarısız!.yönlendiriliyorsunuz...");
		git("adminana.php?sayfa=slider",5);
		}
	require("sayfalar/adminmenu.php");
	break;
	
case menuler:

	require("sayfalar/adminmenu.php");
	require("menuler.php");
	break;
case menu_duzenle:
	require("sayfalar/adminmenu.php");
	require("menu_duzenle.php");
	break;
case menu_sil:
	$menuid=$_GET["id"];
	$sil=mysql_query("delete from menuler where menu_id='$menuid'");
		if($sil){
		basarili("Silme işlemi başarılı.yönlendiriliyorsunuz...");
		git("adminana.php?sayfa=menuler",5);
		}else{
		basarisiz("Silme işlemi başarısız!.yönlendiriliyorsunuz...");
		git("adminana.php?sayfa=menuler",5);
		}
	require("sayfalar/adminmenu.php");
	break;
case ufak_tanitim:
	require("sayfalar/adminmenu.php");
	require("tanitim.php");
	break;
case tanitim_duzenle:
	require("sayfalar/adminmenu.php");
	require("tanitim_duzenle.php");
	break;
case tanitim_sil:
	$id=$_GET["id"];
	$sil=mysql_query("delete from ufak_tanitim where id='$id'");
		if($sil){
		basarili("Silme işlemi başarılı.yönlendiriliyorsunuz...");
		git("adminana.php?sayfa=ufak_tanitim",5);
		}else{
		basarisiz("Silme işlemi başarısız!.yönlendiriliyorsunuz...");
		git("adminana.php?sayfa=ufak_tanitim",5);
		}
	require("sayfalar/adminmenu.php");
	break;
case duyurular:
	require("sayfalar/adminmenu.php");
	require("duyuru.php");
	break;
	
case duyuru_duzenle:
	require("sayfalar/adminmenu.php");
	require("duyuru_duzenle.php");
	break;
case duyuru_sil:
	$id=$_GET["id"];
	$sil=mysql_query("delete from duyurular where id='$id'");
		if($sil){
		basarili("Silme işlemi başarılı.yönlendiriliyorsunuz...");
		git("adminana.php?sayfa=duyurular",5);
		}else{
		basarisiz("Silme işlemi başarısız!.yönlendiriliyorsunuz...");
		git("adminana.php?sayfa=duyurular",5);
		}
	require("sayfalar/adminmenu.php");
	break;
	
case galeri:
	require("sayfalar/adminmenu.php");
	require("galeri.php");
	break;

case galeri_duzenle:
	require("sayfalar/adminmenu.php");
	require("galeri_duzenle.php");
	break;
	
case galeri_sil:
	$gid=$_GET["id"];
	$sil=mysql_query("delete from galeri where gid='$gid'");
		if($sil){
		basarili("Silme işlemi başarılı.yönlendiriliyorsunuz...");
		git("adminana.php?sayfa=galeri",5);
		}else{
		basarisiz("Silme işlemi başarısız!.yönlendiriliyorsunuz...");
		git("adminana.php?sayfa=galeri",5);
		}
	require("sayfalar/adminmenu.php");
	break;
case haberler:
	require("sayfalar/adminmenu.php");
	require("haberler.php");
	break;
case haber_duzenle:
	require("sayfalar/adminmenu.php");
	require("haber_duzenle.php");
	break;
	
case haber_sil:
	$gid=$_GET["id"];
	$sil=mysql_query("delete from haberler where hid='$gid'");
		if($sil){
		basarili("Silme işlemi başarılı.yönlendiriliyorsunuz...");
		git("adminana.php?sayfa=haberler",5);
		}else{
		basarisiz("Silme işlemi başarısız!.yönlendiriliyorsunuz...");
		git("adminana.php?sayfa=haberler",5);
		}
	require("sayfalar/adminmenu.php");
	break;
	
case referanslar:
	require("sayfalar/adminmenu.php");
	require("referanslar.php");
	break;
	
case referans_duzenle:
	require("sayfalar/adminmenu.php");
	require("referans_duzenle.php");
	break;
	
case referans_sil:
	$gid=$_GET["id"];
	$sil=mysql_query("delete from referanslar where rid='$gid'");
		if($sil){
		basarili("Silme işlemi başarılı.yönlendiriliyorsunuz...");
		git("adminana.php?sayfa=haberler",5);
		}else{
		basarisiz("Silme işlemi başarısız!.yönlendiriliyorsunuz...");
		git("adminana.php?sayfa=haberler",5);
		}
	require("sayfalar/adminmenu.php");
	break;
	
case takvim:
	require("sayfalar/adminmenu.php");
	require("takvim.php");
	break;
	
case takvim_duzenle:
	require("sayfalar/adminmenu.php");
	require("takvimduzenle.php");
	break;
	
case takvim_sil:
	$gid=$_GET["id"];
	$sil=mysql_query("delete from takvim where tid='$gid'");
		if($sil){
		basarili("Silme işlemi başarılı.yönlendiriliyorsunuz...");
		git("adminana.php?sayfa=takvim",5);
		}else{
		basarisiz("Silme işlemi başarısız!.yönlendiriliyorsunuz...");
		git("adminana.php?sayfa=takvim",5);
		}
	require("sayfalar/adminmenu.php");
	break;
case cikis:
	require("sayfalar/adminmenu.php");
	require("cikis.php");
	break;
	
case sifre:
	require("sayfalar/adminmenu.php");
	require("sifre.php");
	break;
	
}

require("sayfalar/adminalt.php");
?>
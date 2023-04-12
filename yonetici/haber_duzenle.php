<?php
//Kurumsal firma sitesi
//Kodlayan Keykubad
$idsi=$_GET["id"];
$sorgu	= mysql_fetch_array(mysql_query("select * from haberler where hid='$idsi'"));
		$hbaslik		=$sorgu["haber_baslik"];
		$hkey			=$sorgu["haber_key"];
		$hdesc			=$sorgu["haber_desc"];
		$hkicerik		=$sorgu["haber_kicerik"];
		$hicerik		=$sorgu["haber_icerik"];
		$hresim			=$sorgu["haber_resim"];
		$htarih			=$sorgu["haber_tarih"];
		
		

?>
<div class="yanyana">
<h3 class="anabaslik">Haber Yönetimi</h3>
<div class="formlar">
<form enctype="multipart/form-data" method="POST">
<div class="">
<div class=""><li class="sol_li">Haber başlık<span>:</span></li><input class="input inp4 "  value="<?php echo $hbaslik;?>" name="hbaslik"></div>
<div class=""><li class="sol_li">Haber anahtar(keywords)<span>:</span></li><input class="input inp4 "name="hkey" value="<?php echo trim($hkey);?>"></div>

<div class=""><li class="sol_li">Haber açıklama(description)<span>:</span></li><input class="input inp4 "  name="hdesc" value="<?php echo $hdesc;?>"></div>
<div class=""><li class="sol_li">Haber tarih<span>:</span></li><input class="input inp4 "  name="htarih" value="<?php echo $htarih;?>" id="tarih"></div>
<div style="margin-left:210px;">Link eklenmeyecekse boş bırakınız.</div>
<div class=""><li class="sol_li">Haber kısa içerik<span>:</span></li> <textarea class="input inp4 " name="hkicerik"><?php echo $hkicerik;?></textarea></div>
<div class=""><li class="sol_li">Haber içerik<span>:</span></li> <textarea class="input inp4 " name="hicerik" id="elm1"><?php echo $hicerik;?></textarea></div>
<div class=""><li class="sol_li">Haber resim<span>:</span></li><input class="input inp4 "  name="hresim" type="file"></div>

<div class=""><li class="sol_li">Resim önizleme<span>:</span></li>

<img src="<?php echo "../".$hresim;?>" height="30" width="70" style="margin-top:5px;margin-left:10px;">

</div>





<div class="yolla">
<input type="submit" class="button" value="Kaydet"> 
<input type="reset" class="button danger" value="Temizle"> 
</form>
<br>
<br>

	</div>
</div>




<?php
//Kurumsal firma sitesi
// kodlayan Keykubad
if ($_POST){
$habbaslik	=$_POST["hbaslik"];
$habkey		=$_POST["hkey"];
$habdesc	=$_POST["hdesc"];
$habkicerik	=$_POST["hkicerik"];
$habicerik	=$_POST["hicerik"];
$habicerik=str_replace("'","",$habicerik);
$habicerik=str_replace('"','',$habicerik);
$habtarih	=$_POST["htarih"];
$habresim	=$_FILES["hresim"]["tmp_name"];




if (($habresim=="")){ 


$guncelle=mysql_query("update haberler set haber_baslik='$habbaslik',haber_key='	$habkey',haber_desc='$habdesc',
	haber_kicerik='$habkicerik',haber_icerik='$habicerik' where hid='$idsi' ");
		if($guncelle){
			basarili("Haber güncellendi.");
			git("adminana.php?sayfa=haber_duzenle&id=".$idsi."",5);
		}
		else{
			basarisiz("HATA! Haber güncellenemedi.");
		}
}else{
$resim = "../yuklenenler/haber/" . $_FILES['hresim']['name'];
copy($habresim,$resim);
if ($resim){
$resim=str_replace("../","",$resim);
}
		$guncelle=mysql_query("update haberler set haber_baslik='$habbaslik',haber_key='$habkey',haber_desc='$habdesc',
		haber_kicerik='$habkicerik',haber_icerik='$habicerik',haber_resim='$resim' where hid='$idsi' ");
		if($guncelle){
			basarili("Haber başarı ile güncellendi.");
			git("adminana.php?sayfa=haber_duzenle&id=".$idsi."",5);
		}
		else{
			basarisiz("HATA! Haber güncellenemedi.");
		}


}


}




?>
</div>
</div>
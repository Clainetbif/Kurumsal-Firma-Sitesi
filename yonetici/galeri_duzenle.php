<?php
//Kurumsal firma sitesi
//Kodlayan Keykubad
$idsi=$_GET["id"];
$sorgu	= mysql_fetch_array(mysql_query("select * from galeri where gid='$idsi'"));
		$gbaslik		=$sorgu["galeri_baslik"];
		$gkey			=$sorgu["galeri_key"];
		$gdesc			=$sorgu["galeri_desc"];
		$gkicerik		=$sorgu["galeri_kicerik"];
		$gicerik		=$sorgu["galeri_icerik"];
		$galresim		=$sorgu["galeri_resim"];
		
		

?>
<div class="yanyana">
<h3 class="anabaslik">Galeri Yönetimi</h3>
<div class="formlar">
<form enctype="multipart/form-data" method="POST">
<div class="">
<div class=""><li class="sol_li">Galeri başlık<span>:</span></li><input class="input inp4 "  value="<?php echo $gbaslik;?>" name="gbaslik"></div>
<div class=""><li class="sol_li">Galeri anahtar(keywords)<span>:</span></li><input class="input inp4 "name="gkey" value="<?php echo trim($gkey);?>"></div>
<div class=""><li class="sol_li">Galeri açıklama(description)<span>:</span></li><input class="input inp4 "  name="gdesc" value="<?php echo $gdesc;?>"></div>
<div style="margin-left:210px;">Link eklenmeyecekse boş bırakınız.</div>
<div class=""><li class="sol_li">Galeri kısa içerik<span>:</span></li> <textarea class="input inp4 " name="gkicerik"><?php echo $gkicerik;?></textarea></div>
<div class=""><li class="sol_li">Galeri içerik<span>:</span></li> <textarea class="input inp4 " name="gicerik" id="elm1"><?php echo $gicerik;?></textarea></div>
<div class=""><li class="sol_li">Galeri resim<span>:</span></li><input class="input inp4 "  name="gresim" type="file"></div>

<div class=""><li class="sol_li">Resim önizleme<span>:</span></li>

<img src="<?php echo "../".$galresim;?>" height="30" width="70" style="margin-top:5px;margin-left:10px;">

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
$galbaslik	=$_POST["gbaslik"];
$galkey		=$_POST["gkey"];
$galdesc	=$_POST["gdesc"];
$galkicerik	=$_POST["gkicerik"];
$galicerik	=$_POST["gicerik"];
$galicerik=str_replace("'","",$galicerik);
$galicerik=str_replace('"','',$galicerik);
$galresim	=$_FILES["gresim"]["tmp_name"];




if (($galresim=="")){ 


$guncelle=mysql_query("update galeri set galeri_baslik='$galbaslik',galeri_key='	$galkey',galeri_desc='$galdesc',
	galeri_kicerik='$galkicerik',galeri_icerik='$galicerik' where gid='$idsi' ");
		if($guncelle){
			basarili("Galeri güncellendi.");
			git("adminana.php?sayfa=galeri_duzenle&id=".$idsi."",5);
		}
		else{
			basarisiz("HATA! Galeri güncellenemedi.");
		}
}else{
$resim = "../yuklenenler/galeri/" . $_FILES['gresim']['name'];
copy($galresim,$resim);
if ($resim){
$resim=str_replace("../","",$resim);
}
		$guncelle=mysql_query("update galeri set galeri_baslik='$galbaslik',galeri_key='	$galkey',galeri_desc='$galdesc',
		galeri_kicerik='$galkicerik',galeri_icerik='$galicerik',galeri_resim='$resim' where gid='$idsi' ");
		if($guncelle){
			basarili("Galeri başarı ile güncellendi.");
			git("adminana.php?sayfa=galeri_duzenle&id=".$idsi."",5);
		}
		else{
			basarisiz("HATA! Galeri güncellenemedi.");
		}


}


}




?>
</div>
</div>
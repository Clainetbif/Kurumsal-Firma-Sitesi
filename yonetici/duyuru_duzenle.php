<?php
//Kurumsal firma sitesi
//Kodlayan Keykubad
$idsi=$_GET["id"];
$sorgu	= mysql_fetch_array(mysql_query("select * from duyurular where id='$idsi'"));
		$duyurubaslik		=$sorgu["duyuru_baslik"];
		$duyurukisa		 	=$sorgu["duyuru_kisa"];
		$duyuruicerik		=$sorgu["duyuru_icerik"];
		$duykey				=$sorgu["duy_key"];
		$duydesc			=$sorgu["duy_desc"];
	
?>
<div class="yanyana">
<h3 class="anabaslik">Duyuru düzenle</h3>
<div class="formlar">
<form method="POST">
<div class="">
<div class=""><li class="sol_li">Duyuru başlık<span>:</span></li><input class="input inp4 "  value="<?php echo $duyurubaslik;?>" name="duyurubaslik"></div>
<div class=""><li class="sol_li">Duyuru keywords<span>:</span></li><input class="input inp4 "  value="<?php echo $duykey;?>" name="duykey"></div>
<div class=""><li class="sol_li">Duyuru description<span>:</span></li><input class="input inp4 "  value="<?php echo $duydesc;?>" name="duydesc"></div>
<div class=""><li class="sol_li">Duyuru kısa yazı<span>:</span></li> <textarea class="input inp4 " name="duyurukisa"><?php echo $duyurukisa;?></textarea></div>
<div style="">
<li class="sol_li">Duyuru içerik<span>:</span></li> 
<div style="margin-top:10px;"><textarea id="elm1" name="duyuruicerik" ><?php echo $duyuruicerik;?></textarea></div></div>







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
$duyurubaslik			=$_POST["duyurubaslik"];
$duyurukisa				=$_POST["duyurukisa"];
$duyuruicerik			=$_POST["duyuruicerik"];
$duyuruicerik=str_replace("'","",$duyuruicerik);
$duyuruicerik=str_replace('"','',$duyuruicerik);
$duyurukey				=$_POST["duykey"];
$duyurudesc				=$_POST["duydesc"];




$guncelle=mysql_query("update duyurular set duyuru_baslik='$duyurubaslik',duyuru_kisa='$duyurukisa',duyuru_icerik='$duyuruicerik',duy_key='$duyurukey',duy_desc='$duyurudesc' where id='$idsi' ");

		if($guncelle){
			basarili("Duyuru güncellendi.");
			git("adminana.php?sayfa=duyurular",5);
		}
		else{
			basarisiz("HATA! Duyuru güncellenemedi.");
			git("adminana.php?sayfa=duyuru_duzenle&id=".$idsi."",5);
		}
}
?>
</div>
</div>
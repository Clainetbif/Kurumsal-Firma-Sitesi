<?php
//Kurumsal firma sitesi
//Kodlayan Keykubad
$idsi=$_GET["id"];
$sorgu	= mysql_fetch_array(mysql_query("select * from ufak_tanitim where id='$idsi'"));
		$tanitbaslik		=$sorgu["tanit_baslik"];
		$tanityazi		 	=$sorgu["tanit_yazi"];
		$tanitikon			=$sorgu["tanit_ikon"];
	

$ikonlar		=mysql_fetch_array(mysql_query("select * from ikon"));
	

?>
<div class="yanyana">
<h3 class="anabaslik">Tanıtım düzenle</h3>
<div class="formlar">
<form method="POST">
<div class="">
<div class=""><li class="sol_li">Tanıtım başlık<span>:</span></li><input class="input inp4 "  value="<?php echo $tanitbaslik;?>" name="tanitbaslik"></div>
<div class=""><li class="sol_li">Tanitim yazı<span>:</span></li><input class="input inp4 "name="tanityazi" value="<?php echo $tanityazi;?>"></div>
<div class=""><li class="sol_li">İkon seç<span>:</span></li> 
<select class="input inp3" name="ikon">
<?php
################mysql gelen veriyi parcalayıp ekliyoruz
		$ikon	=$ikonlar["ikon"];
		$degisken=explode(",", $ikon);
foreach ($degisken as $ikons) {
$ikons=preg_replace('/\s+/',' ',$ikons);

?>
<option value="<?=$ikons;?>" <?php if($tanitikon==$ikons){ echo "selected";}?>><?=$ikons;?></option>
<?php
}
?>
</select></div>






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
$tabaslik		=$_POST["tanitbaslik"];
$tayazi			=$_POST["tanityazi"];
$taikon			=$_POST["ikon"];




$guncelle=mysql_query("update ufak_tanitim set tanit_baslik='$tabaslik',tanit_yazi='$tayazi',tanit_ikon='$taikon' where id='$idsi' ");

		if($guncelle){
			basarili("Tanitim güncellendi.");
			git("adminana.php?sayfa=ufak_tanitim",5);
		}
		else{
			basarisiz("HATA! Tanitim güncellenemedi.");
			git("adminana.php?sayfa=tanitim_duzenle&id=".$idsi."",5);
		}
}
?>
</div>
</div>
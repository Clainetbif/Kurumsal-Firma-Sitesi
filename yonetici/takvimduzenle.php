<?php
//Kurumsal firma sitesi
//Kodlayan Keykubad
$idsi=$_GET["id"];
$sorgu	= mysql_fetch_array(mysql_query("select * from takvim where tid='$idsi'"));
		$tbaslik			=$sorgu["takvimadi"];
		$ticerik		 	=$sorgu["takvimicerik"];
		$ttarih				=$sorgu["takvimtarih"];
	

	

?>
<div class="yanyana">
<h3 class="anabaslik">Takvim düzenle</h3>
<div class="formlar">
<form method="POST">
<div class="">
<div class=""><li class="sol_li">Takvim başlık<span>:</span></li><input class="input inp4 "  value="<?php echo $tbaslik;?>" name="tbaslik"></div>
<div class=""><li class="sol_li">Takvim icerik<span>:</span></li><input class="input inp4 "name="ticerik" value="<?php echo $ticerik;?>"></div>
<div class=""><li class="sol_li">Takvim tarih<span>:</span></li><input class="input inp4 "name="ttarih" value="<?php echo $ttarih;?>" id="tarih"></div>







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
$tabaslik		=$_POST["tbaslik"];
$taicerik		=$_POST["ticerik"];
$tatarih		=$_POST["ttarih"];




$guncelle=mysql_query("update takvim set takvimadi='$tabaslik',takvimicerik='$taicerik',takvimtarih='$tatarih' where tid='$idsi' ");

		if($guncelle){
			basarili("Takvim güncellendi.");
			git("adminana.php?sayfa=takvim",5);
		}
		else{
			basarisiz("HATA! Takvim güncellenemedi.");
			git("adminana.php?sayfa=takvim_duzenle&id=".$idsi."",5);
		}
}
?>
</div>
</div>
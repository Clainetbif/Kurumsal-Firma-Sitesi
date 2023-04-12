<?php
//Kurumsal firma sitesi
//Kodlayan Keykubad
$idsi=$_GET["id"];
$sorgu	= mysql_fetch_array(mysql_query("select * from referanslar where rid='$idsi'"));
		$rfirma			=$sorgu["ref_firma"];
		$ricerik		=$sorgu["ref_icerik"];
		$rresim			=$sorgu["ref_resim"];
?>
<div class="yanyana">
<h3 class="anabaslik">Referans Yönetimi</h3>
<div class="formlar">
<form enctype="multipart/form-data" method="POST">
<div class="">
<div class=""><li class="sol_li">Referans firma<span>:</span></li><input class="input inp4 "  value="<?php echo $rfirma;?>" name="rfirma"></div>




<div class=""><li class="sol_li">Referans içerik<span>:</span></li> <textarea class="input inp4 " name="ricerik"><?php echo trim($ricerik);?></textarea></div>

<div class=""><li class="sol_li">Referans resim<span>:</span></li><input class="input inp4 "  name="refresim" type="file"></div>


<div class=""><li class="sol_li">Resim önizleme<span>:</span></li>

<img src="<?php echo "../".$rresim;?>" height="30" width="70" style="margin-top:5px;margin-left:10px;">

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
$reffirma	=$_POST["rfirma"];
$reficerik	=$_POST["ricerik"];

$refresim	=$_FILES["refresim"]["tmp_name"];

if (($refresim=="") ){ 


$guncelle=mysql_query("update referanslar set ref_firma='$reffirma',ref_icerik='	$reficerik' where rid='$idsi' ");
		if($guncelle){
			basarili("Referans güncellendi.");
			git("adminana.php?sayfa=referanslar",5);
		}
		else{
			basarisiz("HATA! Referans güncellenemedi.");
		}
}else{
		
		$resim = "../yuklenenler/referans/" .$_FILES["refresim"]["name"];;
		copy($refresim,$resim);
		$resim=str_replace("../","",$resim);
			$guncelle=mysql_query("update referanslar set ref_firma='$reffirma',ref_icerik='$reficerik',ref_resim='$resim' where rid='$idsi' ");
		if($guncelle){
			basarili("Referans başarı ile güncellendi.");
			git("adminana.php?sayfa=referanslar",5);
		}
		else{
			basarisiz("HATA! Referans güncellenemedi.");
		}
		



}



}
?>
</div>
</div>
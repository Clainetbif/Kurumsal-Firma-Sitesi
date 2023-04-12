<?php
//Kurumsal firma sitesi
//Kodlayan Keykubad
$idsi=$_GET["id"];
$sorgu	= mysql_fetch_array(mysql_query("select * from slider where id='$idsi'"));
		$slidebaslik	=$sorgu["slider_baslik"];
		$slidelink		=$sorgu["slider_link"];
		$slidelbaslik	=$sorgu["slider_lbaslik"];
		$slideaciklama	=$sorgu["slider_ufak"];
		$slideresim		=$sorgu["slider_resim"];
		$slidearka		=$sorgu["slider_back"];
		$slider_altacik	=$sorgu["slider_altaciklama"];
		

?>
<div class="yanyana">
<h3 class="anabaslik">Slider Yönetimi</h3>
<div class="formlar">
<form enctype="multipart/form-data" method="POST">
<div class="">
<div class=""><li class="sol_li">Slider başlık<span>:</span></li><input class="input inp4 "  value="<?php echo $slidebaslik;?>" name="slider_baslik"></div>
<div class=""><li class="sol_li">Slider link<span>:</span></li><input class="input inp4 "name="slider_link" value="<?php echo trim($slidelink);?>"></div>
<div style="margin-left:210px;">Link eklenmeyecekse boş bırakınız.</div>
<div class=""><li class="sol_li">Slider link başlık<span>:</span></li><input class="input inp4 "  name="slider_lbaslik" value="<?php echo $slidelbaslik;?>"></div>
<div style="margin-left:210px;">Link eklenmeyecekse boş bırakınız.</div>
<div class=""><li class="sol_li">Slider ufak açıklama<span>:</span></li> <textarea class="input inp4 " name="slider_ufak"><?php echo $slideaciklama;?></textarea></div>
<div class=""><li class="sol_li">Slider alt açıklama (kısa)<span>:</span></li> <textarea class="input inp4 " name="slider_altacik"><?php echo $slider_altacik;?></textarea></div>
<div class=""><li class="sol_li">Slider resim<span>:</span></li><input class="input inp4 "  name="slider_resim" type="file"></div>

<div class=""><li class="sol_li">Slider aktif resim<span>:</span></li>
<?php 
if($slideresim==""){
echo '<div style="margin-left:210px;padding-top:14px;">Resim yok eklemeniz zorunlu değildir.</div>';
}else{
?>
<img src="<?php echo "../".$slideresim;?>" height="30" width="70" style="margin-top:5px;margin-left:10px;">
<?php }?>
</div>
<div class=""><li class="sol_li">Slider arka plan<span>:</span></li><input class="input inp4 "  name="slider_back" type="file"></div>
<div class=""><li class="sol_li">Slider arka resim<span>:</span></li>

<img src="<?php echo "../".$slidearka;?>" height="30" width="70" style="margin-top:5px;margin-left:10px;">

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
$slider_baslik	=$_POST["slider_baslik"];
$slider_link	=$_POST["slider_link"];
$slider_lbaslik	=$_POST["slider_lbaslik"];
$slider_ufak	=$_POST["slider_ufak"];
$slider_altacik	=$_POST["slider_altacik"];
$slider_resim	=$_FILES["slider_resim"]["tmp_name"];
$slider_back	=$_FILES["slider_back"]["tmp_name"];




if (($slider_resim=="") and ($slider_back=="") ){ 


$guncelle=mysql_query("update slider set slider_baslik='$slider_baslik',slider_link='	$slider_link',slider_lbaslik='$slider_lbaslik',
	slider_ufak='$slider_ufak',slider_altaciklama='$slider_altacik' where id='$idsi' ");
		if($guncelle){
			basarili("Slider güncellendi.");
			git("adminana.php?sayfa=slider_duzenle&id=".$idsi."",5);
		}
		else{
			basarisiz("HATA! Slider güncellenemedi.");
		}
}elseif($slider_resim==""){
$resim_back = "../yuklenenler/" . $_FILES['slider_back']['name'];
copy($slider_back,$resim_back);
if ($resim_back){
$resim_back=str_replace("../","",$resim_back);
}
		$guncelle=mysql_query("update slider set slider_baslik='$slider_baslik',slider_link='	$slider_link',slider_lbaslik='$slider_lbaslik',
		slider_ufak='$slider_ufak',slider_back='$resim_back',slider_altaciklama='$slider_altacik' where id='$idsi' ");
		if($guncelle){
			basarili("Slider başarı ile güncellendi.");
			git("adminana.php?sayfa=slider_duzenle&id=".$idsi."",5);
		}
		else{
			basarisiz("HATA! Slider güncellenemedi.");
		}


}elseif($slider_back==""){
$resim = "../yuklenenler/" . $_FILES['slider_resim']['name']; 
copy($slider_resim,$resim);
if ($resim){
$resim=str_replace("../","",$resim);
}
		$guncelle=mysql_query("update slider set slider_baslik='$slider_baslik',slider_link='	$slider_link',slider_lbaslik='$slider_lbaslik',
		slider_ufak='$slider_ufak',slider_resim='$resim',slider_altaciklama='$slider_altacik' where id='$idsi' ");
		if($guncelle){
			basarili("Slider başarı ile güncellendi.");
			git("adminana.php?sayfa=slider_duzenle&id=".$idsi."",5);
		}
		else{
			basarisiz("HATA! Slider güncellenemedi.");
		}
}else{
		$resim = "../yuklenenler/" . $_FILES['slider_resim']['name']; 
		$resim_back = "../yuklenenler/" . $_FILES['slider_back']['name'];
		copy($slider_resim,$resim);
		copy($slider_back,$resim_back);
		if ($resim){
		$resim=str_replace("../","",$resim);
		}
		if ($resim_back){
		$resim_back=str_replace("../","",$resim_back);
			$guncelle=mysql_query("update slider set slider_baslik='$slider_baslik',slider_link='	$slider_link',slider_lbaslik='$slider_lbaslik',
		slider_ufak='$slider_ufak',slider_resim='$resim',slider_back='$resim_back',slider_altaciklama='$slider_altacik' where id='$idsi' ");
		if($guncelle){
			basarili("Slider başarı ile güncellendi.");
			git("adminana.php?sayfa=slider_duzenle&id=".$idsi."",5);
		}
		else{
			basarisiz("HATA! Slider güncellenemedi.");
		}
		
}


}



}
?>
</div>
</div>
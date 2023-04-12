
<div class="yanyana">
<h3 class="anabaslik">Slider Yönetimi</h3>
<div class="formlar">
<form enctype="multipart/form-data" method="POST">
<div class="">
<div class=""><li class="sol_li">Slider başlık<span>:</span></li><input class="input inp4 "  name="slider_baslik"></div>
<div class=""><li class="sol_li">Slider link<span>:</span></li><input class="input inp4 "  name="slider_link"></div><div style="margin-left:210px;">Link eklenmeyecekse boş bırakınız.</div>
<div class=""><li class="sol_li">Slider link başlık<span>:</span></li><input class="input inp4 "  name="slider_lbaslik"></div>
<div style="margin-left:210px;">Link eklenmeyecekse boş bırakınız.</div>
<div class=""><li class="sol_li">Slider ufak açıklama<span>:</span></li> <textarea class="input inp4 " name="slider_ufak"></textarea></div>
<div class=""><li class="sol_li">Slider alt açıklama (kısa)<span>:</span></li> <textarea class="input inp4 " name="slider_altacik"></textarea></div>
<div class=""><li class="sol_li">Slider resim<span>:</span></li><input class="input inp4 "  name="slider_resim" type="file"></div>
<div style="margin-left:210px;">Resim girmeniz zorunlu degildir slider ön resmidir.</div>
<div class=""><li class="sol_li">Slider arka plan<span>:</span></li><input class="input inp4 "  name="slider_back" type="file"></div>
<div style="margin-left:210px;">Mutlaka resim girilmelidir.Sliderin resim arkasıdır.
<br>
<font color="red">Ölçüler 1065 * 450 olmalıdır.</font>

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


$sorgu = mysql_query("insert into slider (slider_baslik,slider_link,slider_lbaslik,slider_ufak,slider_altaciklama) values('$slider_baslik','$slider_link','$slider_lbaslik','$slider_ufak','$slider_altacik')"); 
		if($sorgu){
			basarili("Slider resim,url ve başlıkları başarı ile yüklendi.");
		}
		else{
			basarisiz("Ekleme işlemi başarısız");
		}
}elseif($slider_resim==""){
$resim_back = "../yuklenenler/" . $_FILES['slider_back']['name'];
copy($slider_back,$resim_back);
if ($resim_back){
$resim_back=str_replace("../","",$resim_back);
}
$sorgu = mysql_query("insert into slider (slider_back,slider_baslik,slider_link,slider_lbaslik,slider_ufak,slider_altaciklama) values('$resim_back','$slider_baslik','$slider_link','$slider_lbaslik','$slider_ufak','$slider_altacik')"); 
		if($sorgu){
			basarili("Slider resim,url ve başlıkları başarı ile yüklendi.");
		}
		else{
		basarisiz("Ekleme işlemi başarısız");
		}


}elseif($slider_back==""){
$resim = "../yuklenenler/" . $_FILES['slider_resim']['name']; 
copy($slider_resim,$resim);
if ($resim){
$resim=str_replace("../","",$resim);
}
$sorgu = mysql_query("insert into slider (slider_resim,slider_baslik,slider_link,slider_lbaslik,slider_ufak,slider_altaciklama) values('$resim','$slider_baslik','$slider_link','$slider_lbaslik','$slider_ufak','$slider_altacik')"); 
		if($sorgu){
			basarili("Slider resim,url ve başlıkları başarı ile yüklendi.");
		}
		else{
		basarisiz("Ekleme işlemi başarısız");
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
	$sorgu = mysql_query("insert into slider (slider_resim,slider_back,slider_baslik,slider_link,slider_lbaslik,slider_ufak,slider_altaciklama) values('$resim','$resim_back','$slider_baslik','$slider_link','$slider_lbaslik','$slider_ufak','$slider_altacik')"); 
		if($sorgu){
			basarili("Slider resim,url ve başlıkları başarı ile yüklendi.");
		}
		else{
		basarisiz("Ekleme işlemi başarısız");
		}
		
}


}
}

?>
</div>
</div>

<div class="yanyana">
<h3 class="anabaslik">Listeleme Alanı </h3>
<form> 
<div class="tablo">

<li class="no"><b>No</b></li>
<li class="durum"><b>Arka Plan</b></li>
<li class="durum"><b>Resim</b></li>
<li class="baslik"><b>Başlık</b></li>
<li class="islem"><b>İşlemler</b></li>
<div class="temizle"></div>
</div>

<div class="tablo2">


<?php
################################sayfalama kısmım burda ##############################
$sayfa            	= @intval($_GET['s']);
					if(!$sayfa) $sayfa = 1;
$toplam           	= mysql_num_rows(mysql_query("select * from slider"));
$limit            	= 5;
$sayfa_sayisi    	= ceil($toplam/$limit);
					if($sayfa > $sayfa_sayisi) $sayfa = 1;
$goster            	= $sayfa * $limit - $limit;
 

$gorunen        = 3;
 
    if($sayfa > 1){
        $onceki    = $sayfa - 1;
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=slider' class='button'>İlk</a>";
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=slider&s=$onceki' class='button icon arrowleft danger'>Geri</a>";
		
    }
 
    for($i= $sayfa - $gorunen; $i < $sayfa + $gorunen + 1; $i++){
 
        if($i > 0 and $i <= $sayfa_sayisi){
                if($i == $sayfa){
                   $sayfalamaYaz.= "<a class='button'>$i</a>";
				   
            }else{
                $sayfalamaYaz.= "<a href='adminana.php?sayfa=slider&s=$i' class='button'>$i</a>";
				
            }
        }
    }
 
    if($sayfa != $sayfa_sayisi){
        $sonraki     = $sayfa +1;
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=slider&s=$sonraki' class='button icon arrowright danger'>İleri</a>";
		
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=slider&s=$sayfa_sayisi' class='button'>Son</a>";

    }              

################################sayfalama kısmı bitiş ##############################

################################burda limit veriyorum sql e basla ve limitim ile########
	$vericek	= mysql_query("select * from slider ORDER BY id ASC LIMIT $goster,$limit");
	while ($yazveri	=mysql_fetch_array($vericek)){
		$slidebaslik=$yazveri["slider_baslik"];
		$slideresim	=$yazveri["slider_resim"];
		$slideback	=$yazveri["slider_back"];
		$slideid	=$yazveri["id"];
	
?>
<div class="satir">

<li class="no"><?php echo $slideid;?></li>
<li class="durum" style="margin-top:-5px;"><?php 	if($slideback==""){echo "Boş</li>";}else{
echo '<img width="50" height="25" src="../'.$slideback.'"></li>';
}
?>
<li class="durum" style="margin-top:-5px;">
<?php 	if($slideresim==""){echo "Boş</li>";}else{
echo '<img width="50" height="25" src="../'.$slideresim.'"></li>';
}
?>
<li class="baslik"><?php echo $slidebaslik;?></li>

<li class="islem">
<li class="edit"><a href="adminana.php?sayfa=slider_duzenle&id=<?php echo $slideid;?>" class="button icon edit">Düzenle</a></li>
<li class="sil"> <a href="adminana.php?sayfa=slider_sil&id=<?php echo $slideid;?>" class="button icon remove danger">Sil</a></li>
</li>
<div class="temizle"></div>
</div>
<?php
	}




?>


</form>
<div class="sayfala">
<?php



echo $sayfalamaYaz;





?>

</div>
<div class="toplam">Sistemde Toplam <?php print_r($toplam);?> içerik bulunuyor..</div>
</div>
</div>



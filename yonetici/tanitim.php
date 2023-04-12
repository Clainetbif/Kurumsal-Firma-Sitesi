<?php
$ikonlar		=mysql_fetch_array(mysql_query("select * from ikon"));
?>
<form method="post">
<div class="yanyana">
<h3 class="anabaslik">Kısa Tanıtım Yazısı ve İkonu Ekle</h3>
<div class="formlar">
<div class=""><li class="sol_li">Tanıtım başlık<span>:</span></li><input class="input inp4 " name="tanitbaslik"></div>

<div class=""><li class="sol_li">Tanıtım kısa açıklama<span>:</span></li><input class="input inp4 " name="tanityazi"></div>

<div class=""><li class="sol_li">İkon seç<span>:</span></li> 
<select class="input inp3" name="ikon">
<?php
################mysql gelen veriyi parcalayıp ekliyoruz
		$ikon	=$ikonlar["ikon"];
		$degisken=explode(",", $ikon);
foreach ($degisken as $ikons) {
$ikons=preg_replace('/\s+/',' ',$ikons);

?>
<option value="<?=$ikons;?>"><?=$ikons;?></option>
<?php
}
?>
</select></div>
<div class="yolla">
<input type="submit" class="button" value="Kaydet"> 
<input type="reset" class="button danger" value="Temizle"> 
</div>
</form>

</div>

<?php
//kodlayan Keykubad
if ($_POST){
$tanitbaslik	=$_POST["tanitbaslik"];
$tanitkisa		=$_POST["tanityazi"];

$tanitikon		=$_POST["ikon"];


	$eklet	=mysql_query("insert into ufak_tanitim (tanit_baslik,tanit_yazi,tanit_ikon) values ('$tanitbaslik','$tanitkisa','$tanitikon')");
		if($eklet){
			basarili("Tanıtım başarıyla eklendi.");
			git("adminana.php?sayfa=ufak_tanitim",5);
		
		}else{
			basarisiz("Tanıtım eklenemedi.");
			git("adminana.php?sayfa=ufak_tanitim",5);
		
		}


}
?>
</div>
<!-- menu ekleme kısmı bitti-->
<div class="yanyana">
<h3 class="anabaslik">Tanıtım listesi</h3>
<form> 
<div class="tablo">

<li class="no"><b>No</b></li>
<li class="durum"><b>Tanıtım başlık</b></li>
<li class="durum"><b>Tanıtım yazı</b></li>
<li class="baslik"><b>Tanıtım ikon</b></li>
<li class="islem"><b>İşlemler</b></li>
<div class="temizle"></div>
</div>

<div class="tablo2">


<?php
################################sayfalama kısmım burda ##############################
$sayfa            	= @intval($_GET['s']);
					if(!$sayfa) $sayfa = 1;
$toplam           	= mysql_num_rows(mysql_query("select * from ufak_tanitim"));
$limit            	= 5;
$sayfa_sayisi    	= ceil($toplam/$limit);
					if($sayfa > $sayfa_sayisi) $sayfa = 1;
$goster            	= $sayfa * $limit - $limit;
 

$gorunen        = 3;
 
    if($sayfa > 1){
        $onceki    = $sayfa - 1;
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=ufak_tanitim' class='button'>İlk</a>";
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=ufak_tanitim&s=$onceki' class='button icon arrowleft danger'>Geri</a>";
		
    }
 
    for($i= $sayfa - $gorunen; $i < $sayfa + $gorunen + 1; $i++){
 
        if($i > 0 and $i <= $sayfa_sayisi){
                if($i == $sayfa){
                   $sayfalamaYaz.= "<a class='button'>$i</a>";
				   
            }else{
                $sayfalamaYaz.= "<a href='adminana.php?sayfa=ufak_tanitim&s=$i' class='button'>$i</a>";
				
            }
        }
    }
 
    if($sayfa != $sayfa_sayisi){
        $sonraki     = $sayfa +1;
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=ufak_tanitim&s=$sonraki' class='button icon arrowright danger'>İleri</a>";
		
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=ufak_tanitim&s=$sayfa_sayisi' class='button'>Son</a>";

    }              

################################sayfalama kısmı bitiş ##############################

################################burda limit veriyorum sql e basla ve limitim ile########
	$vericek	= mysql_query("select * from ufak_tanitim ORDER BY id desc LIMIT $goster,$limit");
	while ($yazveri	=mysql_fetch_array($vericek)){
		$tanitbaslik =$yazveri["tanit_baslik"];
		$tanityazi	 =$yazveri["tanit_yazi"];
		$id			 =$yazveri["id"];
		$tanitikon	 =$yazveri["tanit_ikon"];
	
?>
<div class="satir">

<li class="no"><?php echo $id	;?></li>
<li class="durum" style="margin-top:-5px;"><?php echo $tanitbaslik;?></li>

<li class="durum" style="margin-top:-5px;"><?php echo substr($tanityazi,0,50);?></li>


<li class="baslik"><?php 
if($tanitikon==""){
echo "BOŞ";
}else{
echo $tanitikon;
}
?></li>

<li class="islem">
<li class="edit"><a href="adminana.php?sayfa=tanitim_duzenle&id=<?php echo $id;?>" class="button icon edit">Düzenle</a></li>
<li class="sil"> <a href="adminana.php?sayfa=tanitim_sil&id=<?php echo $id;?>" class="button icon remove danger">Sil</a></li>
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



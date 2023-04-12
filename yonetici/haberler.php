<?php
$duycek=mysql_fetch_array(mysql_query("select * from haber_meta"));
$hab_key	=$duycek["hab_key"];
$hab_desc	=$duycek["hab_desc"];

?>
<form method="post">
<div class="yanyana">
<h3 class="anabaslik">Haber Sayfası Meta Tag</h3>
<div class="formlar">
<div class=""><li class="sol_li">Haber keywords <span>:</span></li><input class="input inp4 " name="habkey" value="<?=$hab_key;?>"></div>
<div class=""><li class="sol_li">Haber description<span>:</span></li><input class="input inp4 " name="habdesc" value="<?=$hab_desc;?>"></div>
<div class="yolla">
<input type="submit" name="gonder" class="button" value="Kaydet"> 
<input type="reset" class="button danger" value="Temizle"> 
</div>
</form>
<?php
if($_POST["gonder"]){
$habkey		=$_POST["habkey"];
$habdesc	=$_POST["habdesc"];
	$galguncel=mysql_query("update haber_meta set hab_key='$habkey',hab_desc='$habdesc'");
		if($galguncel){
		basarili("Haber meta guncellendi.");
		}else{
		basarisiz("Haber meta guncellenemedi.");
		}
}
?>
</div>
</div>
<div class="yanyana">
<h3 class="anabaslik">Haber Yönetimi</h3>
<div class="formlar">
<form enctype="multipart/form-data" method="POST">
<div class="">
<div class=""><li class="sol_li">Haber başlık<span>:</span></li><input class="input inp4 "  name="hbaslik"></div>
<div class=""><li class="sol_li">Haber anahtar(keywords)<span>:</span></li><input class="input inp4 "  name="hkey"></div>
<div class=""><li class="sol_li">Haber açıklama(description)<span>:</span></li><input class="input inp4 "  name="hdesc"></div>
<div class=""><li class="sol_li">Haber tarih<span>:</span></li><input class="input inp4 "  name="htarih" id="tarih"></div>
<div class=""><li class="sol_li">Haber kısa açıklama<span>:</span></li> <textarea class="input inp4 " name="hkisa"></textarea></div>
<div class=""><li class="sol_li">Haber içerik<span>:</span></li> <textarea class="input inp4 " name="huzun" id="elm1"></textarea></div>

<div class=""><li class="sol_li">Haber resim<span>:</span></li><input class="input inp4 "  name="hresim" type="file"></div>
<div style="margin-left:210px;">Mutlaka resim girilmelidir.
<br>
<font color="red">Ölçüler 480 * 320 boyutunda olmalıdır</font>

</div>





<div class="yolla">
<input type="submit" name="gondersin" class="button" value="Kaydet"> 
<input type="reset" class="button danger" value="Temizle"> 
</form>
<br>
<br>

	</div>
</div>




<?php
//Kurumsal firma sitesi
// kodlayan Keykubad
if ($_POST["gondersin"]){
$hbaslik	=$_POST["hbaslik"];
$hkey		=$_POST["hkey"];
$hdesc		=$_POST["hdesc"];
$hkisa		=$_POST["hkisa"];
$huzun		=$_POST["huzun"];
$huzun=str_replace("'","",$huzun);
$huzun=str_replace('"','',$huzun);
$htarih		=$_POST["htarih"];
$htarih		=str_replace("/","-",$htarih);
$hresim		=$_FILES["hresim"]["tmp_name"];
$resim = "../yuklenenler/haber/" . $_FILES['hresim']['name'];
copy($hresim,$resim);
if ($resim){
$resim=str_replace("../","",$resim);
}
$sorgu = mysql_query("insert into haberler (haber_baslik,haber_key,haber_desc,haber_kicerik,haber_icerik,haber_resim,haber_tarih) values('$hbaslik','$hkey','$hdesc','$hkisa','$huzun','$resim','$htarih')"); 
		if($sorgu){
			basarili("Haber içeriği başarı ile yüklendi.");
		}
		else{
			basarisiz("Ekleme işlemi başarısız");
		}
}





?>
</div>
</div>

<div class="yanyana">
<h3 class="anabaslik">Haber Listeleme Alanı </h3>
<form> 
<div class="tablo">

<li class="no"><b>No</b></li>
<li class="durum"><b>Resim</b></li>
<li class="durum"><b>Tarih</b></li>
<li class="baslik"><b>Başlik</b></li>
<li class="islem"><b>İşlemler</b></li>
<div class="temizle"></div>
</div>

<div class="tablo2">


<?php
################################sayfalama kısmım burda ##############################
$sayfa            	= @intval($_GET['s']);
					if(!$sayfa) $sayfa = 1;
$toplam           	= mysql_num_rows(mysql_query("select * from haberler"));
$limit            	= 5;
$sayfa_sayisi    	= ceil($toplam/$limit);
					if($sayfa > $sayfa_sayisi) $sayfa = 1;
$goster            	= $sayfa * $limit - $limit;
 

$gorunen        = 3;
 
    if($sayfa > 1){
        $onceki    = $sayfa - 1;
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=haberler' class='button'>İlk</a>";
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=haberler&s=$onceki' class='button icon arrowleft danger'>Geri</a>";
		
    }
 
    for($i= $sayfa - $gorunen; $i < $sayfa + $gorunen + 1; $i++){
 
        if($i > 0 and $i <= $sayfa_sayisi){
                if($i == $sayfa){
                   $sayfalamaYaz.= "<a class='button'>$i</a>";
				   
            }else{
                $sayfalamaYaz.= "<a href='adminana.php?sayfa=haberler&s=$i' class='button'>$i</a>";
				
            }
        }
    }
 
    if($sayfa != $sayfa_sayisi){
        $sonraki     = $sayfa +1;
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=haberler&s=$sonraki' class='button icon arrowright danger'>İleri</a>";
		
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=haberler&s=$sayfa_sayisi' class='button'>Son</a>";

    }              

################################sayfalama kısmı bitiş ##############################

################################burda limit veriyorum sql e basla ve limitim ile########
	$vericek	= mysql_query("select * from haberler ORDER BY hid desc LIMIT $goster,$limit");
	while ($yazveri	=mysql_fetch_array($vericek)){
		$habbaslik	=$yazveri["haber_baslik"];
		$habresim	=$yazveri["haber_resim"];
		$habtarih	=$yazveri["haber_tarih"];
		$hid		=$yazveri["hid"];
	
?>
<div class="satir">

<li class="no"><?php echo $hid;?></li>
<li class="durum" style="margin-top:-5px;"><?php 	if($habresim==""){echo "Boş</li>";}else{
echo '<img width="50" height="25" src="../'.$habresim.'"></li>';
}
?>
<li class="durum"><?php echo tarih(substr($habtarih,0,10));?></li>
<li class="baslik"><?php echo substr($habbaslik,0,40);?></li>

<li class="islem">
<li class="edit"><a href="adminana.php?sayfa=haber_duzenle&id=<?php echo $hid;?>" class="button icon edit">Düzenle</a></li>
<li class="sil"> <a href="adminana.php?sayfa=haber_sil&id=<?php echo $hid;?>" class="button icon remove danger">Sil</a></li>
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




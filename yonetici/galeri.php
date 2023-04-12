<?php
$duycek=mysql_fetch_array(mysql_query("select * from galeri_meta"));
$galkey=$duycek["gal_key"];
$galdesc=$duycek["gal_desc"];

?>
<form method="post">
<div class="yanyana">
<h3 class="anabaslik">Galeri Sayfası Meta Tag</h3>
<div class="formlar">
<div class=""><li class="sol_li">Galeri keywords <span>:</span></li><input class="input inp4 " name="galkey" value="<?=$galkey;?>"></div>
<div class=""><li class="sol_li">Galeri description<span>:</span></li><input class="input inp4 " name="galdesc" value="<?=$galdesc;?>"></div>
<div class="yolla">
<input type="submit" name="gonder" class="button" value="Kaydet"> 
<input type="reset" class="button danger" value="Temizle"> 
</div>
</form>
<?php
if($_POST["gonder"]){
$galkey		=$_POST["galkey"];
$galdesc	=$_POST["galdesc"];
	$galguncel=mysql_query("update galeri_meta set gal_key='$galkey',gal_desc='$galdesc'");
		if($galguncel){
		basarili("Galeri meta guncellendi.");
		}else{
		basarisiz("Galeri meta guncellenemedi.");
		}
}
?>
</div>
</div>
<div class="yanyana">
<h3 class="anabaslik">Galeri Yönetimi</h3>
<div class="formlar">
<form enctype="multipart/form-data" method="POST">
<div class="">
<div class=""><li class="sol_li">Galeri başlık<span>:</span></li><input class="input inp4 "  name="gbaslik"></div>
<div class=""><li class="sol_li">Galeri anahtar(keywords)<span>:</span></li><input class="input inp4 "  name="gkey"></div><div style="margin-left:210px;">Link eklenmeyecekse boş bırakınız.</div>
<div class=""><li class="sol_li">Galeri açıklama(description)<span>:</span></li><input class="input inp4 "  name="gdesc"></div>
<div style="margin-left:210px;">Link eklenmeyecekse boş bırakınız.</div>
<div class=""><li class="sol_li">Galeri kısa açıklama<span>:</span></li> <textarea class="input inp4 " name="gkisa"></textarea></div>
<div class=""><li class="sol_li">Galeri içerik<span>:</span></li> <textarea class="input inp4 " name="guzun" id="elm1"></textarea></div>

<div class=""><li class="sol_li">Galeri resim<span>:</span></li><input class="input inp4 "  name="gresim" type="file"></div>
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
$gbaslik	=$_POST["gbaslik"];
$gkey		=$_POST["gkey"];
$gdesc		=$_POST["gdesc"];
$gkisa		=$_POST["gkisa"];
$guzun		=$_POST["guzun"];
$guzun=str_replace("'","",$guzun);
$guzun=str_replace('"','',$guzun);
$gresim		=$_FILES["gresim"]["tmp_name"];
$resim = "../yuklenenler/galeri/" . $_FILES['gresim']['name'];
copy($gresim,$resim);
if ($resim){
$resim=str_replace("../","",$resim);
}
$sorgu = mysql_query("insert into galeri (galeri_baslik,galeri_key,galeri_desc,galeri_kicerik,galeri_icerik,galeri_resim) values('$gbaslik','$gkey','$gdesc','$gkisa','$guzun','$resim')"); 
		if($sorgu){
			basarili("Galeri içeriği başarı ile yüklendi.");
		}
		else{
			basarisiz("Ekleme işlemi başarısız");
		}
}





?>
</div>
</div>

<div class="yanyana">
<h3 class="anabaslik">Galeri Listeleme Alanı </h3>
<form> 
<div class="tablo">

<li class="no"><b>No</b></li>
<li class="durum"><b>Resim</b></li>
<li class="durum"><b>İçerik</b></li>
<li class="baslik"><b>Başlik</b></li>
<li class="islem"><b>İşlemler</b></li>
<div class="temizle"></div>
</div>

<div class="tablo2">


<?php
################################sayfalama kısmım burda ##############################
$sayfa            	= @intval($_GET['s']);
					if(!$sayfa) $sayfa = 1;
$toplam           	= mysql_num_rows(mysql_query("select * from galeri"));
$limit            	= 5;
$sayfa_sayisi    	= ceil($toplam/$limit);
					if($sayfa > $sayfa_sayisi) $sayfa = 1;
$goster            	= $sayfa * $limit - $limit;
 

$gorunen        = 3;
 
    if($sayfa > 1){
        $onceki    = $sayfa - 1;
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=galeri' class='button'>İlk</a>";
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=galeri&s=$onceki' class='button icon arrowleft danger'>Geri</a>";
		
    }
 
    for($i= $sayfa - $gorunen; $i < $sayfa + $gorunen + 1; $i++){
 
        if($i > 0 and $i <= $sayfa_sayisi){
                if($i == $sayfa){
                   $sayfalamaYaz.= "<a class='button'>$i</a>";
				   
            }else{
                $sayfalamaYaz.= "<a href='adminana.php?sayfa=galeri&s=$i' class='button'>$i</a>";
				
            }
        }
    }
 
    if($sayfa != $sayfa_sayisi){
        $sonraki     = $sayfa +1;
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=galeri&s=$sonraki' class='button icon arrowright danger'>İleri</a>";
		
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=galeri&s=$sayfa_sayisi' class='button'>Son</a>";

    }              

################################sayfalama kısmı bitiş ##############################

################################burda limit veriyorum sql e basla ve limitim ile########
	$vericek	= mysql_query("select * from galeri ORDER BY gid ASC LIMIT $goster,$limit");
	while ($yazveri	=mysql_fetch_array($vericek)){
		$galbaslik	=$yazveri["galeri_baslik"];
		$galresim	=$yazveri["galeri_resim"];
		$galacik	=$yazveri["galeri_kicerik"];
		$galid		=$yazveri["gid"];
	
?>
<div class="satir">

<li class="no"><?php echo $galid;?></li>
<li class="durum" style="margin-top:-5px;"><?php 	if($galresim==""){echo "Boş</li>";}else{
echo '<img width="50" height="25" src="../'.$galresim.'"></li>';
}
?>
<li class="durum"><?php echo substr($galacik,0,10);?></li>
<li class="baslik"><?php echo $galbaslik;?></li>

<li class="islem">
<li class="edit"><a href="adminana.php?sayfa=galeri_duzenle&id=<?php echo $galid;?>" class="button icon edit">Düzenle</a></li>
<li class="sil"> <a href="adminana.php?sayfa=galeri_sil&id=<?php echo $galid;?>" class="button icon remove danger">Sil</a></li>
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



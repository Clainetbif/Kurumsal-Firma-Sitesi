<form method="post">
<div class="yanyana">
<h3 class="anabaslik">Etkinlik Ekle</h3>
<div class="formlar">
<div class=""><li class="sol_li">Etkinlik başlık<span>:</span></li><input class="input inp4 " name="tarihbaslik"></div>

<div class=""><li class="sol_li">Etkinlik açıklama<span>:</span></li><input class="input inp4 " name="tarihicerik"></div>

<div class=""><li class="sol_li">Etkinlik tarih<span>:</span></li><input class="input inp4 " name="etarih" id="tarih"></div>

<div class="yolla">
<input type="submit" class="button" value="Kaydet"> 
<input type="reset" class="button danger" value="Temizle"> 
</div>
</form>

</div>

<?php
//kodlayan Keykubad
if ($_POST){
$takbaslik		=$_POST["tarihbaslik"];
$takicerik		=$_POST["tarihicerik"];
$taktarih		=$_POST["etarih"];


	$eklet	=mysql_query("insert into takvim (takvimadi,takvimicerik,takvimtarih) values ('$takbaslik','$takicerik','$taktarih')");
		if($eklet){
			basarili("Etkinlik başarıyla eklendi.");
			git("adminana.php?sayfa=takvim",5);
		
		}else{
			basarisiz("Etkinlik eklenemedi.");
			git("adminana.php?sayfa=takvim",5);
		
		}


}
?>
</div>
<!-- menu ekleme kısmı bitti-->
<div class="yanyana">
<h3 class="anabaslik">Takvim listesi</h3>
<form> 
<div class="tablo">

<li class="no"><b>No</b></li>
<li class="durum"><b>Başlık</b></li>
<li class="durum"><b>Tarih</b></li>
<li class="baslik"><b>İçerik</b></li>
<li class="islem"><b>İşlemler</b></li>
<div class="temizle"></div>
</div>

<div class="tablo2">


<?php
################################sayfalama kısmım burda ##############################
$sayfa            	= @intval($_GET['s']);
					if(!$sayfa) $sayfa = 1;
$toplam           	= mysql_num_rows(mysql_query("select * from takvim"));
$limit            	= 5;
$sayfa_sayisi    	= ceil($toplam/$limit);
					if($sayfa > $sayfa_sayisi) $sayfa = 1;
$goster            	= $sayfa * $limit - $limit;
 

$gorunen        = 3;
 
    if($sayfa > 1){
        $onceki    = $sayfa - 1;
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=takvim' class='button'>İlk</a>";
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=takvim&s=$onceki' class='button icon arrowleft danger'>Geri</a>";
		
    }
 
    for($i= $sayfa - $gorunen; $i < $sayfa + $gorunen + 1; $i++){
 
        if($i > 0 and $i <= $sayfa_sayisi){
                if($i == $sayfa){
                   $sayfalamaYaz.= "<a class='button'>$i</a>";
				   
            }else{
                $sayfalamaYaz.= "<a href='adminana.php?sayfa=takvim&s=$i' class='button'>$i</a>";
				
            }
        }
    }
 
    if($sayfa != $sayfa_sayisi){
        $sonraki     = $sayfa +1;
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=takvim&s=$sonraki' class='button icon arrowright danger'>İleri</a>";
		
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=takvim&s=$sayfa_sayisi' class='button'>Son</a>";

    }              

################################sayfalama kısmı bitiş ##############################

################################burda limit veriyorum sql e basla ve limitim ile########
	$vericek	= mysql_query("select * from takvim ORDER BY tid desc LIMIT $goster,$limit");
	while ($yazveri	=mysql_fetch_array($vericek)){
		$tbaslik 	=$yazveri["takvimadi"];
		$ticerik	=$yazveri["takvimicerik"];
		$tid		=$yazveri["tid"];
		$ttarih	 	=$yazveri["takvimtarih"];
	
?>
<div class="satir">

<li class="no"><?php echo $tid	;?></li>
<li class="durum" style="margin-top:-5px;"><?php echo $tbaslik;?></li>
<li class="durum" style="margin-top:-5px;"><?php echo $ttarih;?></li>
<li class="baslik" style="margin-top:-5px;"><?php echo $ticerik;?></li>



<li class="islem">
<li class="edit"><a href="adminana.php?sayfa=takvim_duzenle&id=<?php echo $tid;?>" class="button icon edit">Düzenle</a></li>
<li class="sil"> <a href="adminana.php?sayfa=takvim_sil&id=<?php echo $tid;?>" class="button icon remove danger">Sil</a></li>
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



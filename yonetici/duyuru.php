<?php
$duycek=mysql_fetch_array(mysql_query("select * from duyuru_meta"));
$duykey=$duycek["duyuru_key"];
$duydesc=$duycek["duyuru_desc"];

?>
<form method="post">
<div class="yanyana">
<h3 class="anabaslik">Duyurular Sayfası Meta Tag</h3>
<div class="formlar">
<div class=""><li class="sol_li">Duyuru keywords <span>:</span></li><input class="input inp4 " name="dgkey" value="<?=$duykey;?>"></div>
<div class=""><li class="sol_li">Duyuru description<span>:</span></li><input class="input inp4 " name="dgdesc" value="<?=$duydesc;?>"></div>
<div class="yolla">
<input type="submit" name="gonder" class="button" value="Kaydet"> 
<input type="reset" class="button danger" value="Temizle"> 
</div>
</form>
<?php
if($_POST["gonder"]){
$duykey		=$_POST["dgkey"];
$duydesc	=$_POST["dgdesc"];
	$duyguncel=mysql_query("update duyuru_meta set duyuru_key='$duykey',duyuru_desc='$duydesc'");
		if($duyguncel){
		basarili("Duyuru meta guncellendi.");
		}else{
		basarisiz("Duyuru meta guncellenemedi.");
		}
}
?>
</div>
</div>


<form method="post">
<div class="yanyana">
<h3 class="anabaslik">Duyuru ekle</h3>
<div class="formlar">
<div class=""><li class="sol_li">Duyuru başlık<span>:</span></li><input class="input inp4 " name="duyurubaslik"></div>
<div class=""><li class="sol_li">Duyuru anahtar(keywords)<span>:</span></li><input class="input inp4 " name="duyurukey"></div>
<div class=""><li class="sol_li">Duyuru aciklama(description)<span>:</span></li><input class="input inp4 " name="duyurudesc"></div>
<div class=""><li class="sol_li">Duyuru kısa<span>:</span></li> <textarea class="input inp4 " name="duyurukisa"></textarea></div>
<div style="">
<li class="sol_li">Duyuru içerik<span>:</span></li> 
<div style="margin-top:10px;"><textarea id="elm1" name="duyuruicerik" ></textarea></div></div>


<div class="yolla">
<input type="submit" name="gonderici" class="button" value="Kaydet"> 
<input type="reset" class="button danger" value="Temizle"> 
</div>
</form>

</div>

<?php
//kodlayan Keykubad
if ($_POST["gonderici"]){
$duyurubaslik	=$_POST["duyurubaslik"];
$duyurukisa		=$_POST["duyurukisa"];
$duyuruicerik	=$_POST["duyuruicerik"];
$duyuruicerik=str_replace("'","",$duyuruicerik);
$duyuruicerik=str_replace('"','',$duyuruicerik);
$duyurukey		=$_POST["duyurukey"];
$duyurudesc		=$_POST["duyurudesc"];


	$eklet	=mysql_query("insert into duyurular (duyuru_baslik,duyuru_kisa,duyuru_icerik,duy_key,duy_desc) values ('$duyurubaslik','$duyurukisa','$duyuruicerik','$duyurukey','$duyurudesc')");
		if($eklet){
			basarili("Duyuru başarıyla eklendi.");
			git("adminana.php?sayfa=duyurular",5);
		
		}else{
			basarisiz("Duyuru eklenemedi.");
			git("adminana.php?sayfa=duyurular",5);
		
		}


}
?>
</div>
<!-- menu ekleme kısmı bitti-->
<div class="yanyana">
<h3 class="anabaslik">Duyuru listesi</h3>
<form> 
<div class="tablo">

<li class="no"><b>No</b></li>
<li class="durum"><b>Başlık</b></li>
<li class="durum"><b>Duyuru kısa</b></li>
<li class="baslik"><b>Duyuru içerik</b></li>
<li class="islem"><b>İşlemler</b></li>
<div class="temizle"></div>
</div>

<div class="tablo2">


<?php
################################sayfalama kısmım burda ##############################
$sayfa            	= @intval($_GET['s']);
					if(!$sayfa) $sayfa = 1;
$toplam           	= mysql_num_rows(mysql_query("select * from duyurular"));
$limit            	= 5;
$sayfa_sayisi    	= ceil($toplam/$limit);
					if($sayfa > $sayfa_sayisi) $sayfa = 1;
$goster            	= $sayfa * $limit - $limit;
 

$gorunen        = 3;
 
    if($sayfa > 1){
        $onceki    = $sayfa - 1;
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=duyurular' class='button'>İlk</a>";
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=duyurular&s=$onceki' class='button icon arrowleft danger'>Geri</a>";
		
    }
 
    for($i= $sayfa - $gorunen; $i < $sayfa + $gorunen + 1; $i++){
 
        if($i > 0 and $i <= $sayfa_sayisi){
                if($i == $sayfa){
                   $sayfalamaYaz.= "<a class='button'>$i</a>";
				   
            }else{
                $sayfalamaYaz.= "<a href='adminana.php?sayfa=duyurular&s=$i' class='button'>$i</a>";
				
            }
        }
    }
 
    if($sayfa != $sayfa_sayisi){
        $sonraki     = $sayfa +1;
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=duyurular&s=$sonraki' class='button icon arrowright danger'>İleri</a>";
		
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=duyurular&s=$sayfa_sayisi' class='button'>Son</a>";

    }              

################################sayfalama kısmı bitiş ##############################

################################burda limit veriyorum sql e basla ve limitim ile########
	$vericek	= mysql_query("select * from duyurular ORDER BY id desc LIMIT $goster,$limit");
	while ($yazveri	=mysql_fetch_array($vericek)){
		$duyurubaslik 	=$yazveri["duyuru_baslik"];
		$duyurukisa	 	=$yazveri["duyuru_kisa"];
		$id			 	=$yazveri["id"];
		$duyuruicerik	=$yazveri["duyuru_icerik"];
	
?>
<div class="satir">

<li class="no"><?php echo $id	;?></li>
<li class="durum" style="margin-top:-5px;"><?php echo $duyurubaslik;?></li>

<li class="durum" style="margin-top:-5px;"><?php echo substr($duyurukisa,0,16);?></li>
<li class="baslik"><?php echo strip_tags(substr($duyuruicerik,0,15));?></li>


<li class="islem">
<li class="edit"><a href="adminana.php?sayfa=duyuru_duzenle&id=<?php echo $id;?>" class="button icon edit">Düzenle</a></li>
<li class="sil"> <a href="adminana.php?sayfa=duyuru_sil&id=<?php echo $id;?>" class="button icon remove danger">Sil</a></li>
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



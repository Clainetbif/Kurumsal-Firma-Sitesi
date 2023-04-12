
<div class="yanyana">
<h3 class="anabaslik">Referans Yönetimi</h3>
<div class="formlar">
<form enctype="multipart/form-data" method="POST">
<div class="">
<div class=""><li class="sol_li">Referans firma<span>:</span></li><input class="input inp4 "  name="rfirma"></div>


<div class=""><li class="sol_li">Referans açıklama<span>:</span></li> <textarea class="input inp4 " name="raciklama"></textarea></div>

<div class=""><li class="sol_li">Referans resim<span>:</span></li><input class="input inp4 "  name="rresim" type="file"></div>
<div style="margin-left:210px;">Referans resmi arka plan beyaz yada transparan olmalıdır.</div>







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
$rfirma			=$_POST["rfirma"];
$raciklama		=$_POST["raciklama"];
$rresim			=$_FILES["rresim"]["tmp_name"];

		$resim = "../yuklenenler/referans/" . $_FILES['rresim']['name']; 
		copy($rresim,$resim);
		if ($resim){
		$resim=str_replace("../","",$resim);
		}
		$sorgu = mysql_query("insert into referanslar (ref_firma,ref_icerik,ref_resim) values ('$rfirma','$raciklama','$resim')"); 
		if($sorgu){
			basarili("Referans başarıyla eklendi");
		}
		else{
			basarisiz("Ekleme işlemi başarısız");
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
<li class="durum"><b>Firma</b></li>
<li class="baslik"><b>Resim</b></li>
<li class="islem"><b>İşlemler</b></li>
<div class="temizle"></div>
</div>

<div class="tablo2">


<?php
################################sayfalama kısmım burda ##############################
$sayfa            	= @intval($_GET['s']);
					if(!$sayfa) $sayfa = 1;
$toplam           	= mysql_num_rows(mysql_query("select * from referanslar"));
$limit            	= 5;
$sayfa_sayisi    	= ceil($toplam/$limit);
					if($sayfa > $sayfa_sayisi) $sayfa = 1;
$goster            	= $sayfa * $limit - $limit;
 

$gorunen        = 3;
 
    if($sayfa > 1){
        $onceki    = $sayfa - 1;
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=referanslar' class='button'>İlk</a>";
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=referanslar&s=$onceki' class='button icon arrowleft danger'>Geri</a>";
		
    }
 
    for($i= $sayfa - $gorunen; $i < $sayfa + $gorunen + 1; $i++){
 
        if($i > 0 and $i <= $sayfa_sayisi){
                if($i == $sayfa){
                   $sayfalamaYaz.= "<a class='button'>$i</a>";
				   
            }else{
                $sayfalamaYaz.= "<a href='adminana.php?sayfa=referanslar&s=$i' class='button'>$i</a>";
				
            }
        }
    }
 
    if($sayfa != $sayfa_sayisi){
        $sonraki     = $sayfa +1;
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=referanslar&s=$sonraki' class='button icon arrowright danger'>İleri</a>";
		
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=referanslar&s=$sayfa_sayisi' class='button'>Son</a>";

    }              

################################sayfalama kısmı bitiş ##############################

################################burda limit veriyorum sql e basla ve limitim ile########
	$vericek	= mysql_query("select * from referanslar ORDER BY rid ASC LIMIT $goster,$limit");
	while ($yazveri	=mysql_fetch_array($vericek)){
		$refbaslik	=$yazveri["ref_firma"];
		$refresim	=$yazveri["ref_resim"];
		$rid		=$yazveri["rid"];
	
?>
<div class="satir">

<li class="no"><?php echo $rid;?></li>
<li class="durum" style="margin-top:-5px;">
<?php 	if($refresim==""){echo "Boş</li>";}else{
echo '<img width="50" height="25" src="../'.$refresim.'"></li>';
}
?>
<li class="baslik"><?php echo $refbaslik;?></li>

<li class="islem">
<li class="edit"><a href="adminana.php?sayfa=referans_duzenle&id=<?php echo $rid;?>" class="button icon edit">Düzenle</a></li>
<li class="sil"> <a href="adminana.php?sayfa=referans_sil&id=<?php echo $rid;?>" class="button icon remove danger">Sil</a></li>
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



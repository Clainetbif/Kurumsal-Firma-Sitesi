<?php
//kurumsal site
// kodlayan keykubad
$cektir		= mysql_query("select * from menuler order by menu_altid asc");



?>
<div class="yanyana">
<h3 class="anabaslik">Menü Yönetimi</h3>
<div class="formlar">
<form method="POST">
<div class="">
<div class=""><li class="sol_li">Menü adı<span>:</span></li><input class="input inp4 "  name="menu_adi"></div>
<div class=""><li class="sol_li">Anahtar kelimeler(meta keywords)<span>:</span></li><input class="input inp4 "  name="meta_key"></div>
<div style="margin-left:210px;">Meta etiketi 260 karakterden az olmalıdır.</div>
<div class=""><li class="sol_li">Açıklama (meta description)<span>:</span></li><input class="input inp4 "  name="meta_desc"></div>
<div class=""><li class="sol_li">Menü sırası<span>:</span></li><input class="input inp4 "  name="menu_sira"></div>
<div class=""><li class="sol_li">Alt kategorisi<span>:</span></li> 
<select name="menu_alt_id" class="input inp3">
<option value="0" selected>Hiçbiri</option>
<?php
	while ($dondur=mysql_fetch_array($cektir)){
		$menuadi=$dondur["menu_baslik"];
		$menu_id=$dondur["menu_id"];
		$menualtid=$dondur["menu_altid"];
?>
<option value="<?php echo $menu_id;?>">
<?php 
if($menualtid >0){
echo "-".$menuadi;
}else{
echo $menuadi;
}
?>
</option>
<?php }?>
</select></div>

<div style="">
<li class="sol_li">Menü içerik<span>:</span></li> 
<div style="margin-top:10px;"><textarea id="elm1"   name="altmenu_icerik" ></textarea></div></div>


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
//Kodlayan keykubad
if($_POST){
$menu_adi=str_replace("-","",$menu_adi);
$menu_adi	=$_POST["menu_adi"];
$menusira	=$_POST["menu_sira"];
$menu_alt	=$_POST["menu_alt_id"];
$menu_icerik=$_POST["altmenu_icerik"];
$menu_icerik=str_replace("'","",$menu_icerik);
$menu_icerik=str_replace('"','',$menu_icerik);
$metakey	=$_POST["meta_key"];
$metadesc	=$_POST["meta_desc"];

	$cek	=mysql_query("insert into menuler (menu_baslik,menu_altid,menu_icerik,menu_sira,meta_key,meta_desc) values ('$menu_adi','$menu_alt','$menu_icerik','$menusira','$metakey','$metadesc')");
		if($cek){
		basarili("Menü başarı ile eklendi");
		}else{
		basarisiz("Menü ekleme başarısız!");
		}

}
?>

</div>
<!-- menu ekleme kısmı bitti-->
<div class="yanyana">
<h3 class="anabaslik">Menü Listeleme Alanı </h3>
<form> 
<div class="tablo">

<li class="no"><b>No</b></li>
<li class="durum"><b>Menu adı</b></li>
<li class="durum"><b>Menu sıra</b></li>
<li class="baslik"><b>Alt kategori</b></li>
<li class="islem"><b>İşlemler</b></li>
<div class="temizle"></div>
</div>

<div class="tablo2">


<?php
################################sayfalama kısmım burda ##############################
$sayfa            	= @intval($_GET['s']);
					if(!$sayfa) $sayfa = 1;
$toplam           	= mysql_num_rows(mysql_query("select * from menuler"));
$limit            	= 5;
$sayfa_sayisi    	= ceil($toplam/$limit);
					if($sayfa > $sayfa_sayisi) $sayfa = 1;
$goster            	= $sayfa * $limit - $limit;
 

$gorunen        = 3;
 
    if($sayfa > 1){
        $onceki    = $sayfa - 1;
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=menuler' class='button'>İlk</a>";
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=menuler&s=$onceki' class='button icon arrowleft danger'>Geri</a>";
		
    }
 
    for($i= $sayfa - $gorunen; $i < $sayfa + $gorunen + 1; $i++){
 
        if($i > 0 and $i <= $sayfa_sayisi){
                if($i == $sayfa){
                   $sayfalamaYaz.= "<a class='button'>$i</a>";
				   
            }else{
                $sayfalamaYaz.= "<a href='adminana.php?sayfa=menuler&s=$i' class='button'>$i</a>";
				
            }
        }
    }
 
    if($sayfa != $sayfa_sayisi){
        $sonraki     = $sayfa +1;
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=menuler&s=$sonraki' class='button icon arrowright danger'>İleri</a>";
		
        $sayfalamaYaz.= "<a href='adminana.php?sayfa=menuler&s=$sayfa_sayisi' class='button'>Son</a>";

    }              

################################sayfalama kısmı bitiş ##############################

################################burda limit veriyorum sql e basla ve limitim ile########
	$vericek	= mysql_query("select * from menuler ORDER BY menu_id ASC LIMIT $goster,$limit");
	while ($yazveri	=mysql_fetch_array($vericek)){
		$menubaslik =$yazveri["menu_baslik"];
		$menusira	=$yazveri["menu_sira"];
		$menu_altid	=$yazveri["menu_altid"];
		$menuid		=$yazveri["menu_id"];
	
?>
<div class="satir">

<li class="no"><?php echo $menuid	;?></li>
<li class="durum" style="margin-top:-5px;"><?php echo $menubaslik;?></li>

<li class="durum" style="margin-top:-5px;"><?php echo $menusira;?></li>


<li class="baslik"><?php echo $menu_altid;?></li>

<li class="islem">
<li class="edit"><a href="adminana.php?sayfa=menu_duzenle&id=<?php echo $menuid;?>" class="button icon edit">Düzenle</a></li>
<li class="sil"> <a href="adminana.php?sayfa=menu_sil&id=<?php echo $menuid;?>" class="button icon remove danger">Sil</a></li>
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



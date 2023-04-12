<?php
//Kurumsal firma sitesi
//Kodlayan Keykubad
$idsi=$_GET["id"];
$sorgu	= mysql_fetch_array(mysql_query("select * from menuler where menu_id='$idsi'"));
		$menubaslik		=$sorgu["menu_baslik"];
		$menuid			=$sorgu["menu_id"];
		$menuicerik 	=$sorgu["menu_icerik"];
		$menusira		=$sorgu["menu_sira"];
		$menualtid		=$sorgu["menu_altid"];
		$menukey		=$sorgu["meta_key"];
		$menudesc		=$sorgu["meta_desc"];
		

?>
<div class="yanyana">
<h3 class="anabaslik">Menü Yönetimi</h3>
<div class="formlar">
<form method="POST">
<div class="">
<div class=""><li class="sol_li">Menü başlık<span>:</span></li><input class="input inp4 "  value="<?php echo $menubaslik;?>" name="menubaslik"></div>
<div class=""><li class="sol_li">Menü sıra<span>:</span></li><input class="input inp4 "name="menusira" value="<?php echo $menusira;?>"></div>
<div class=""><li class="sol_li">Menü anahtar (keywords)<span>:</span></li><input class="input inp4 "name="menukey" value="<?php echo $menukey;?>"></div>
<div style="margin-left:210px;">260 karakterden fazla girmeyin.</div>
<div class=""><li class="sol_li">Menü açıklama (description)<span>:</span></li><input class="input inp4 "name="menudesc" value="<?php echo $menudesc;?>"></div>
<div class=""><li class="sol_li">Alt kategorisi<span>:</span></li> 
<select name="menualtid" class="input inp3">
<option value="0">Hiçbiri</option>
<option value="<?php echo $menuid;?>"  <?php if($menuid==0){echo "selected";}?>><?php echo $menubaslik;?>
</option>
<?php
$cektir=mysql_query("select * from menuler");
	while ($dondur=mysql_fetch_array($cektir)){
		$menuadi=$dondur["menu_baslik"];
		$menu_id=$dondur["menu_id"];
		$menualtid1=$dondur["menu_altid"];
?>
<option value="<?php echo $menu_id;?>"><?php echo $menuadi;?>
</option>
<?php }?>
</select></div>


<div class=""><li class="sol_li">Menu içerik<span>:</span></li> <textarea class="input inp4 " id="elm1" name="menuicerik"><?php echo $menuicerik;?></textarea></div>


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
$menubaslik		=$_POST["menubaslik"];
$menusira		=$_POST["menusira"];
$menukey		=$_POST["menukey"];
$menudesc		=$_POST["menudesc"];
$menualtid		=$_POST["menualtid"];

$menuicerik		=addslashes($_POST["menuicerik"]);



$guncelle=mysql_query("update menuler set menu_baslik='$menubaslik',menu_sira='$menusira',meta_key='$menukey',
	meta_desc='$menudesc',menu_altid='$menualtid',menu_icerik='$menuicerik' where menu_id='$idsi' ");

		if($guncelle){
			basarili("Menü güncellendi.");
			git("adminana.php?sayfa=menuler",5);
		}
		else{
			basarisiz("HATA! Menü güncellenemedi.");
			git("adminana.php?sayfa=menu_duzenle&id=".$idsi."",5);
		}
}
?>
</div>
</div>
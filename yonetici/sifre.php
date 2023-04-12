<?php
	#Kurumsal Firma Sitesi
	#Kodlama : Keykubad
$genelayar= mysql_fetch_array(mysql_query("select * from yonetici"));
	$kullanici	= $genelayar["admin_adi"];
	$sifre		= $genelayar["admin_sifre"];
?>
<div class="yanyana">
<h3 class="anabaslik">Hesabım</h3>
<div class="formlar">
<form method="post">
<div class="">
<div class=""><li class="sol_li">Admin adı<span>:</span></li><input class="input inp4 " value="<?php echo $kullanici;?>"  name="adminad"></div>
<div class=""><li class="sol_li">Admin şifre<span>:</span></li><input class="input inp4 " name="adminsifre"></div>






<div class="yolla">
<input type="submit" class="button" value="Kaydet"> 
<input type="reset" class="button danger" value="Temizle"> 
</form>
<br>
<br>
<?php
$adminad		= $_POST["adminad"];
$adminsifre		= md5($_POST["adminsifre"]);

	if($_POST){
	$guncelle=mysql_query("update yonetici set admin_adi='$adminad',admin_sifre='$adminsifre' ");
	
	
	?>
	</div>
</div>
	<?php
		basarili("Admin bilgileri güncellendi");
		
	}





?>

</div>
</div>
</div>
</div>
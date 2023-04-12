<?php
	#Kurumsal Firma Sitesi
	#Kodlama : Keykubad
$genelayar= mysql_fetch_array(mysql_query("select * from genel_ayar"));
	$site_baslik	= $genelayar["site_baslik"];
	$site_adi		= $genelayar["site_adi"];
	$site_slogan	= $genelayar["site_slogan"];
	$site_logo		= $genelayar["site_logo"];
	$google_analiz	= $genelayar["google_analiz"];
	$site_keyword	= $genelayar["site_keyword"];
	$site_aciklama	= $genelayar["site_aciklama"];
	$site_adres		= $genelayar["site_adres"];
	$site_tel		= $genelayar["site_tel"];
	$site_mail		= $genelayar["site_mail"];
	$face			= $genelayar["face"];
	$twit			= $genelayar["twit"];
	$link			= $genelayar["link"];
	$google			= $genelayar["google"];
	$tema			=$genelayar["tema"];

?>
<div class="yanyana">
<h3 class="anabaslik">Genel Ayarlar</h3>
<div class="formlar">
<form method="post">
<div class="">
<div class=""><li class="sol_li">Site adı(Title)<span>:</span></li><input class="input inp4 " value="<?php echo $site_adi;?>"  name="adi_site"></div>
<div class=""><li class="sol_li">Tema seç<span>:</span></li> 
<select name="tema" class="input inp3">
<option value="colors-classic.css" <?php if($tema=="colors-classic.css"){ echo "selected"; } ?>>Klasik mavi tema</option>
<option value="colors-deep-blue.css" <?php if($tema=="colors-deep-blue.css"){ echo "selected"; } ?>>Koyu mavi tema</option>
<option value="colors-eco-earth.css" <?php if($tema=="colors-eco-earth.css"){ echo "selected"; } ?>>Eko toprak tema</option>
<option value="colors-golden.css" <?php if($tema=="colors-classic.css"){ echo "selected"; } ?>>Altın rengi tema</option>
<option value="colors-passion-red.css" <?php if($tema=="colors-golden.css"){ echo "selected"; } ?>>Kırmızı tutku tema</option>
<option value="colors-silver-grey.css" <?php if($tema=="colors-silver-grey.css"){ echo "selected"; } ?>>Gümüş gri tema</option>
</select></div>
<div class=""><li class="sol_li">Site başlık<span>:</span></li><input class="input inp4 " value="<?php echo $site_baslik;?>"  name="baslik_site"></div>
<div class=""><li class="sol_li">Site slogan<span>:</span></li><input class="input inp4 " value="<?php echo $site_slogan;?>" name="slogan_site"></div>
<div class=""><li class="sol_li">Site keyword<span>:</span></li><input class="input inp4 " value="<?php echo $site_keyword;?>" name="keyword_site"></div>
<div class=""><li class="sol_li">Site logo<span>:</span></li><input class="input inp4 " value="<?php echo $site_logo;?>" name="logo_site"></div>
<div class=""><li class="sol_li">Site açıklama<span>:</span></li><input class="input inp4 " value="<?php echo $site_aciklama;?>" name="aciklama_site"></div>
<div class=""><li class="sol_li">Site telefon<span>:</span></li><input class="input inp4 " value="<?php echo $site_tel;?>" name="tel_site"></div>
<div class=""><li class="sol_li">Site mail<span>:</span></li><input class="input inp4 " value="<?php echo $site_mail;?>" name="mail_site"></div>
<div class=""><li class="sol_li">Google Analytics<span>:</span></li> <textarea class="input inp4 " name="analiz_site"><?php echo $google_analiz;?></textarea></div>
<div class=""><li class="sol_li">Site adres<span>:</span></li> <textarea class="input inp4 " name="adres_site"><?php echo $site_adres;?></textarea></div>
<div style="margin-left:210px;">Örnek: 1830 sokak örnek caddesi,izmir,Türkiye.<br>Örnek gibi giriş yaparsanız google harita yerinizi iletişimde gösterecektir.</div>
<div class=""><li class="sol_li">Facebook<span>:</span></li><input class="input inp4 " value="<?php echo $face;?>" name="face"></div>
<div class=""><li class="sol_li">Twitter<span>:</span></li><input class="input inp4 " value="<?php echo $twit;?>" name="twit"></div>
<div class=""><li class="sol_li">Linkedin<span>:</span></li><input class="input inp4 " value="<?php echo $link;?>" name="link"></div>
<div class=""><li class="sol_li">Google plus<span>:</span></li><input class="input inp4 " value="<?php echo $google;?>" name="google"></div>



<div class="yolla">
<input type="submit" class="button" value="Kaydet"> 
<input type="reset" class="button danger" value="Temizle"> 
</form>
<br>
<br>
<?php
$adi_site		= $_POST["adi_site"];
$baslik_site	= $_POST["baslik_site"];
$mail_site		= $_POST["mail_site"];
$logo_site		= $_POST["logo_site"];
$analiz_site	= $_POST["analiz_site"];
$slogan_site	= $_POST["slogan_site"];
$keyword_site	= $_POST["keyword_site"];
$aciklama_site	= $_POST["aciklama_site"];
$adres_site		= $_POST["adres_site"];
$tel_site		= $_POST["tel_site"];
$temasite		= $_POST["tema"];
$fbook			= $_POST["face"];
$twitt			= $_POST["twit"];
$links			= $_POST["link"];
$goog			= $_POST["google"];
$analiz_site=str_replace("'","#",$analiz_site);
$analiz_site=str_replace('"','$',$analiz_site);
	if($_POST){
	$guncelle=mysql_query("update genel_ayar set site_adi='$adi_site',tema='$temasite',site_baslik='$baslik_site',site_mail='$mail_site',
	site_logo='$logo_site',google_analiz='$analiz_site',site_slogan='$slogan_site',site_keyword='$keyword_site',
	site_aciklama='$aciklama_site',site_adres='$adres_site',site_tel='$tel_site',face='$fbook',twit='$twitt',link='$links',google='$goog' ");
	
	
	?>
	</div>
</div>
	<?php
		basarili("Site ayarları başarı ile güncellendi.Yönleniyorsunuz bekleyin...");
		git(2,"adminana.php?sayfa=genelayar");
		
	}





?>

</div>
</div>
</div>
</div>
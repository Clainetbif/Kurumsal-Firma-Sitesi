<?php
	#Kurumsal Firma Sitesi
	#Kodlama : Keykubad
	require_once("../ayar.php");
	require_once("fonksiyon.php");
	if ($_SESSION["login"]){
		require("adminana.php");
		git("adminana.php",2);
	}
	else{


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kurumsal Firma Yönetim Paneli Giriş</title>
<link href="css/giris.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="" method="post">
<div id="site">
<div id="sitebosluk"></div>
<div id="ortainput">
<div id="kullaniciadi"><label>Kullanıcı Adı</label>
<div id="kullaniciadiinput"><input name="kullaniciadi" size="20px" type="text" /></div>
</div>

<div id="sifre">
<label>Şifre</label>
<div id="sifreinput"><input type="password" name="sifre" size="20px" /></div>
</div>
<div id="alt">
<?php
	if ($_POST){
		$kadi=$_POST["kullaniciadi"];
		$pass=md5($_POST["sifre"]);
		if(!$kadi || !$pass){
		echo '<div id="hata"><img src="images/hata.png" alt="" /> <a>Hata :</a> Kullanıcı adı ve şifre boş olamaz!</div>';
		
		}else{
		$bak=mysql_query("select * from yonetici where admin_adi='$kadi' && admin_sifre='$pass'");
			if(mysql_affected_rows()){
			$dondur	=mysql_fetch_array($bak);
			$session=array(
				"login"=> true,
				"admin_adi" =>$dondur["admin_adi"]
				
			
			);
			session($session);
			git("adminana.php",2);
			
			}else{
			echo '<div id="hata"><img src="images/hata.png" alt="" /> <a>Hata :</a> Kullanıcı adı veya şifreniz yanlış!</div>';
			
			}
		}
	
	
	}
?>
<div id="girisyap" style="margin-left:450px;"><input type="submit" /></div>
</div>
</div>
</div>
</form>
</body>
</html>

<?php }//session else bitimi?>
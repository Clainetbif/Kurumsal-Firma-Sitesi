<?php
	#Kurumsal Firma Sitesi
	#Kodlama : Keykubad
	
	
	
	#session olusturma yapıyoruz
function session($don){
	foreach($don as $anahtar => $deger){
	$_SESSION[$anahtar]=$deger;
	}
}
#yonlendirme işlemi
function git($git,$sure){
	echo '<meta http-equiv="refresh" content="'.$sure.';URL='.$git.'">';
	
}

#basarılı uyari
function basarili($uyarb){
	echo '<div class="uyar basarili"><img src="images/icon/basarili.png"><span>'.$uyarb.'</span></div>';
	
}
function basarisiz($uyarb){
	echo '<div class="uyar error"><img src="images/icon/errors.png"><span>'.$uyarb.'</span></div>';

}
//Tarih Çevirme Fonksiyonu
function tarih($tarih) {
$parcala = explode("-",$tarih);
$yeni_tarih= $parcala[1]."-".$parcala[0]."-".$parcala[2];
return $yeni_tarih;
}



?>
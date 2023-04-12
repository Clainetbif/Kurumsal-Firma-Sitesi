<?php
//Kurumsal Firma sitesi
// Kodlayan  Keykubad

//Seo fonksiyonum buda linkleri duzenletir
Function Seo($tr1) {  
$turkce=array("ş","Ş","ı","(",")","'","ü","Ü","ö","Ö","ç","Ç"," ","/","*","?","ş","Ş","ı","ğ","Ğ","İ","ö","Ö","Ç","ç","ü","Ü");  
$duzgun=array("s","S","i","","","","u","U","o","O","c","C","-","-","-","","s","S","i","g","G","I","o","O","C","c","u","U");  
$tr1=str_replace($turkce,$duzgun,$tr1);  
$tr1 = preg_replace("@[^A-Za-z0-9\-_]+@i","",$tr1);  
return $tr1;  
}

//sınırsız kategori yap :)
function SinirsizKategoriListele($kategoriArray , $ebeveyn = 0  , $kademe_pixel = 5 ,  $i = 0  ,  $menuler = NULL , $nested = FALSE )
{
 
   // Sayfalar Boşşa boş döndür.
    if( empty($kategoriArray) ){
        return;
    }
 
    // Eğer fonksiyon içinden çağırılmıyorsa
    if( !$nested ){
        // Sayfaları ebeveyn idsi ile yeni dizi oluştur
        foreach($kategoriArray as $row):
            $items[$row['menu_altid']][]=$row;
        endforeach;
    }else{
        // Nested ise gelen sayfaları al
        $items=$kategoriArray;
    }
 
    // Gelen sayfaları aç
    foreach( $items[$ebeveyn] as $sayfa ){
        // Boşluk hesapla
        $bosluk=str_repeat(' ',($i * $kademe_pixel));
 
        // Menuleri değişkene aktar
        $menuler .= '<li><a href="'.Seo($sayfa['menu_baslik']).'-'.$sayfa['menu_id'].'-menu.html">'.$sayfa['menu_baslik'].'</a>'.PHP_EOL;
 
        // Açılan menude bir alt sayfa var ise nested çağır
        if(isset($items[$sayfa['menu_id']])){
            $menuler .= '<ul class="sub-menu">'.PHP_EOL;
            $menuler=SinirsizKategoriListele($items,$sayfa['menu_id'],$kademe_pixel,($i + 1),$menuler,TRUE);
            $menuler .= '</ul>'.PHP_EOL;
        }
 
        $menuler .= '</li>'.PHP_EOL;
    }
 
    // Oluşan menüleri return et
    return $menuler;
}
##burada meta tag fonksiyonum var
function meta($key,$desc){
	echo '
		<meta name="keywords" content="'.$key.'" />
		<meta name="description" content="'.$desc.'" />';
	
}
//tarih duzeltme fonksiyonu burda
function tarih($tarih) {
$parcala = explode("-",$tarih);
$yeni_tarih= $parcala[1]."-".$parcala[0]."-".$parcala[2];
return $yeni_tarih;
}
//tarih duzeltme fonksiyonu burda
function tarihtakvim($tarih) {
$parcala = explode("/",$tarih);
$yeni_tarih= $parcala[1]."/".$parcala[0]."/".$parcala[2];
return $yeni_tarih;
}
//sadece gün haber için
function tarih1($tarih) {
$parcala = explode("-",$tarih);
$yeni_tarih= $parcala[1];
return $yeni_tarih;
}
//sadece ay haber için
function tarih2($tarih) {
$parcala = explode("-",$tarih);
$yeni_tarih= $parcala[0];
$yeni_tarih=str_replace("01","OCK",$yeni_tarih);
$yeni_tarih=str_replace("02","ŞBT",$yeni_tarih);
$yeni_tarih=str_replace("03","MRT",$yeni_tarih);
$yeni_tarih=str_replace("04","NSN",$yeni_tarih);
$yeni_tarih=str_replace("05","MAY",$yeni_tarih);
$yeni_tarih=str_replace("06","HAZ",$yeni_tarih);
$yeni_tarih=str_replace("07","TEM",$yeni_tarih);
$yeni_tarih=str_replace("08","AĞU",$yeni_tarih);
$yeni_tarih=str_replace("09","EYL",$yeni_tarih);
$yeni_tarih=str_replace("10","EKİ",$yeni_tarih);
$yeni_tarih=str_replace("11","KAS",$yeni_tarih);
$yeni_tarih=str_replace("12","ARA",$yeni_tarih);
return $yeni_tarih;
}

function lisans($license_code)
{
    // Ben yazdığım scriptlerde sript urlsini almak için bunun gibi bir değişken kullanırım. Değişken içeriği örneğin şöyledir:
   
    global $scripturl;

    // Şimdi site adresini alağıcağız. Ancak işimizi şans bırakmamak amacıyla burada kendimizi biraz kasacağız.
    // $_SERVER['SERVER_NAME'] bazenleri boş dönebiliyor. Bunu kontrol ediyoruz. Boş ise bir sonraki $_SERVER['HTTP_HOST']'a bakıyoruz.
    if (!empty($_SERVER['SERVER_NAME']))
        $site = $_SERVER['SERVER_NAME'];
    // $_SERVER['HTTP_HOST']'de bazen boş dönebilir. İşimizi şansa bırakmak olmaz. Bu nedenle bir sonraki else'ye geçiyoruz. $scripturl'nin içinden http://www. sız site adresini alıyoruz.
    elseif (!empty($_SERVER['HTTP_HOST']))
        $site = $_SERVER['HTTP_HOST'];
    // Burası biraz daha karmaşık kısaca $scripturl içinden http://www. kısmı dışını alıyor.
    else
        $site = preg_match('~(http|ftp)[s]?:\/\/[w\.]*([a-zA-Z0-9\.]+)\/~i', $scripturl, $match) ? $match[2] : '';

    // Yukarıda yaptığımız tüm işlemlere rağmen bir site adresi elde edemediysek, müşteriyi kasmaya gerek yok. Lisans işlemini devre dışı bırakıyoruz. null olarak döndürüyoruz fonksiyonu.
    if (empty($site))
        return;

    // Nuraya geçebildiysek site adresini almışız. Ama ki site adresinin başında yine www. varsa siliyoruz...
    if (strpos($site, 'www.') !== false)
        $site = substr($site, 4);

    // Burada algoritmamızı kullanarak site adresinizi şifreliyor. Tekrar aynı lisans şifresini almaya çalışıyoruz.
    $site_hash = sha1(sha1(md5($site. 'karistir')). 'karistir2');
    $site_hash = substr($site_hash, 0, 25);
    $site_hash = wordwrap($site_hash, 5, '-', true);
    $site_hash = mb_strtoupper($site_hash);

    // Evettt. Can alıcı nokta. 2-5 satır üstteki aldığım şifre ile müşteriye verdiğimiz lisans kodunu eşşeltirmeye/denkleştirmeye çalışıyor. Eğerki eşleşmez veya denkleşmez ise vay onun haline: scripti öldüyoruz!
    if ($site_hash != $license_code || $site_hash !== $license_code)
        die ('<meta charset="utf-8" />Lütfen geçerli lisans kodu girin!' . $site);
}

lisans('B0275-F2F71-10BC7-12BB4-8B6E2'); 
 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/js.js"></script>
<script type="text/javascript" src="tinymce/js/tiny_mce.js"></script>
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">
tinyMCE.init({
        // General options
        mode : "exact",
        theme : "advanced",
		language : 'tr',
		elements : "elm1",//editor cekme adı id="ad"
        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
       theme_advanced_buttons1 : "bold,italic,underline,strikethrough,separator,"
    + "justifyleft,justifycenter,justifyright,justifyfull,formatselect,"
    + "bullist,numlist,outdent,indent",
    theme_advanced_buttons2 : "link,unlink,anchor,image,separator,"
    +"undo,redo,cleanup,code,separator,sub,sup,charmap",
	theme_advanced_buttons3 :"tablecontrols,"
+"hr,removeformat,visualaid,"
+"sub,sup,|,charmap,"
+"emotions,iespell,"
+"advhr,",
theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",

		height:"400px",
		width:"600px",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Skin options
        skin : "o2k7",
        skin_variant : "silver",

        // Example content CSS (should be your site CSS)
content_css : "",
        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "tinymce/js/template_list.js",
        external_link_list_url : "tinymce/js/link_list.js",
        external_image_list_url : "tinymce/js/image_list.js",
        media_external_list_url : "tinymce/js/media_list.js",

        // Replace values for the template plugin
        template_replace_values : {
                username : "Some User",
                staffid : "991234"
        }
});
</script>
<script>
$(function() {    
	        $( "#tarih" ).datepicker();  
	});

</script>

<meta charset="utf-8" />
</head>


<div class="enust">
<img src="images/avatar.gif" width="50" height="50">
Merhaba <b><?php echo $_SESSION["admin_adi"];?></b></br> 
<a class="button" href="adminana.php?sayfa=sifre">Hesabım</a>
<a class="button icon remove danger" href="adminana.php?sayfa=cikis">Çıkış</a>

</div>

<div class="logo">
<a href="#"><img src="images/logo.png" width="250px" height="80px"></a>
</div>


<div class="menu">
<a class="buton" href="adminana.php"><strike><span>Anasayfa</span></strike></a>
<a class="buton" href="adminana.php?sayfa=menuler"><strike><span>Menüler</span></strike></a>
<a class="buton" href="adminana.php?sayfa=genelayar"><strike><span>Genel Ayarlar</span></strike></a>
<a class="buton" href="adminana.php?sayfa=haberler"><strike><span>Haberler</span></strike></a>
<a class="buton" href="adminana.php?sayfa=takvim"><strike><span>Takvim</span></strike></a>
</div>
<h3 class="navbar">Yönetim Paneline Hoşgeldiniz</h3>
<div class="arama">
<?php
$habersay=mysql_num_rows(mysql_query("select * from haberler"));
$duysay=mysql_num_rows(mysql_query("select * from duyurular"));
$galsay=mysql_num_rows(mysql_query("select * from galeri"));
?>
<li class="siparisler">HABERLER<span><?php echo $habersay;?></span></li>
<li class="siparisler"><a href="#">GALERİ</a><span><?php echo $galsay;?></span></li>
<li class="siparisler"><a href="#">DUYURULAR</a><span><?php echo $duysay;?></span></li>

</form>
</div>
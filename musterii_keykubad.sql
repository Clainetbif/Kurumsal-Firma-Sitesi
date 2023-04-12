-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 05 Mar 2015, 17:40:52
-- Sunucu sürümü: 5.5.42-cll
-- PHP Sürümü: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `musterii_keykubad`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyurular`
--

CREATE TABLE IF NOT EXISTS `duyurular` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `duyuru_baslik` varchar(225) COLLATE utf8_turkish_ci NOT NULL,
  `duyuru_kisa` text COLLATE utf8_turkish_ci NOT NULL,
  `duyuru_icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `duy_key` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `duy_desc` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `duyurular`
--

INSERT INTO `duyurular` (`id`, `duyuru_baslik`, `duyuru_kisa`, `duyuru_icerik`, `duy_key`, `duy_desc`, `tarih`) VALUES
(1, 'Sitemiz açıldı', 'Sitemiz aktif hale gelmiştir.Sitemiz responsive yani mobil uyumlu haldedir,isterseniz akıllı telefonlarınız sayesinde sitemizde rahatça dolanabilir ve işlemler yapabilirsiniz.Seo ayarları sayesinde arama motorlarında ilk sıraya siz çıkın.370 adet ikon ile firmanızı en iyi şekilde yansıtın.', '<p>Sitemiz aktif hale gelmiştir.Sitemiz responsive yani mobil uyumlu haldedir,isterseniz akıllı telefonlarınız sayesinde sitemizde rahat&ccedil;a dolanabilir ve işlemler yapabilirsiniz</p>\r\n<p>Sitemiz aktif hale gelmiştir.Sitemiz responsive yani mobil uyumlu haldedir,isterseniz akıllı telefonlarınız sayesinde sitemizde rahat&ccedil;a dolanabilir ve işlemler yapabilirsiniz</p>\r\n<p>Sitemiz aktif hale gelmiştir.Sitemiz responsive yani mobil uyumlu haldedir,isterseniz akıllı telefonlarınız sayesinde sitemizde rahat&ccedil;a dolanabilir ve işlemler yapabilirsiniz</p>\r\n<p>Sitemiz aktif hale gelmiştir.Sitemiz responsive yani mobil uyumlu haldedir,isterseniz akıllı telefonlarınız sayesinde sitemizde rahat&ccedil;a dolanabilir ve işlemler yapabilirsiniz</p>', 'simgola tasarim,duyurular,sitemiz faliyette', 'Duyuru açıklamamız', '2013-11-08 15:04:53');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyuru_meta`
--

CREATE TABLE IF NOT EXISTS `duyuru_meta` (
  `duyuru_key` text COLLATE utf8_turkish_ci NOT NULL,
  `duyuru_desc` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `duyuru_meta`
--

INSERT INTO `duyuru_meta` (`duyuru_key`, `duyuru_desc`) VALUES
('duyuru genel,genel duyuru,bu ayrı36', 'Duyuruların genel liste sayfası36');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galeri`
--

CREATE TABLE IF NOT EXISTS `galeri` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `galeri_baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `galeri_icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `galeri_kicerik` text COLLATE utf8_turkish_ci NOT NULL,
  `galeri_resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `galeri_desc` text COLLATE utf8_turkish_ci NOT NULL,
  `galeri_key` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=9 ;

--
-- Tablo döküm verisi `galeri`
--

INSERT INTO `galeri` (`gid`, `galeri_baslik`, `galeri_icerik`, `galeri_kicerik`, `galeri_resim`, `galeri_desc`, `galeri_key`) VALUES
(1, 'Galeri deneme', '<p>&ldquo;Lenovo Uluslararası &Ccedil;in merkezli bilişim teknoloji şirketi. Masa&uuml;st&uuml; Bilgisayar, Diz&uuml;st&uuml; Bilgisayar, El Bilgisayarı, Sunucu ve bilgisayar teknolojisi aksesuar ve donanımlarının &uuml;retimini yapmaktadır.&rdquo;</p>\r\n<p>&ldquo;Lenovo Uluslararası &Ccedil;in merkezli bilişim teknoloji şirketi. Masa&uuml;st&uuml; Bilgisayar, Diz&uuml;st&uuml; Bilgisayar, El Bilgisayarı, Sunucu ve bilgisayar teknolojisi aksesuar ve donanımlarının &uuml;retimini yapmaktadır.&rdquo;</p>', 'Lenovo Uluslararası Çin merkezli bilişim teknoloji şirketi. Masaüstü Bilgisayar, Dizüstü Bilgisayar, El Bilgisayarı, Sunucu ve bilgisayar teknolojisi aksesuar ve donanımlarının üretimini yapmaktadır.', 'yuklenenler/vladstudio_missing_him_480x320.jpg', 'galeri iç açıklama,description', '	galeri iç meta,keywords,idyegöre'),
(3, 'Galeri deneme3', '<p>dfddfdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfs</p>', 'dfdfdfsdfdsdfsd dfddsfdfsfsd', 'yuklenenler/vladstudio_mothers_day_tiny_wings_480x320.jpg', 'fdsdfsdfs', '	dffddfdf'),
(4, 'Galeri deneme', '<p>dfsfsdffdsfsdfds</p>\r\n<p>dsfds</p>\r\n<p>fd</p>\r\n<p>fsd</p>\r\n<p>fds</p>\r\n<p>fds</p>\r\n<p>fds</p>\r\n<p>dffdsfsdsfd</p>', 'dfsdffsdfddffd  drrewreerwre erwrerwerwerwre erwrerwerwwreer  rewerwerwerrwe erwrewrewwe  eerr3434', 'yuklenenler/vladstudio_little_anglerfish_480x320.jpg', 'galeri iç açıklama,description', '	galeri iç meta,keywords,idyegöre'),
(5, 'Galeri deneme2', '<p>g</p>\r\n<p>ffhgfghgf gh</p>\r\n<p>gthghfggfh</p>\r\n<p>hgf</p>\r\n<p>hgfhgf</p>\r\n<p>hgfgfhfhgghfhghgf</p>\r\n<p>&nbsp;</p>\r\n<p>gfhhgfhgfhgfhfghghgfhghg</p>\r\n<p>&nbsp;</p>', 'ghghhgh', 'yuklenenler/galeri/vladstudio_little_elephant_big_ukulele_480x320.jpg', 'ghghgh', 'hghghghg'),
(6, 'Galeri Yeni', '<p>&ldquo;Lenovo Uluslararası &Ccedil;in merkezli bilişim teknoloji şirketi. Masa&uuml;st&uuml; Bilgisayar, Diz&uuml;st&uuml; Bilgisayar, El Bilgisayarı, Sunucu ve bilgisayar teknolojisi aksesuar ve donanımlarının &uuml;retimini yapmaktadır.&rdquo;</p>\r\n<p>&ldquo;Lenovo Uluslararası &Ccedil;in merkezli bilişim teknoloji şirketi. Masa&uuml;st&uuml; Bilgisayar, Diz&uuml;st&uuml; Bilgisayar, El Bilgisayarı, Sunucu ve bilgisayar teknolojisi aksesuar ve donanımlarının &uuml;retimini yapmaktadır.&rdquo;</p>\r\n<p>&ldquo;Lenovo Uluslararası &Ccedil;in merkezli bilişim teknoloji şirketi. Masa&uuml;st&uuml; Bilgisayar, Diz&uuml;st&uuml; Bilgisayar, El Bilgisayarı, Sunucu ve bilgisayar teknolojisi aksesuar ve donanımlarının &uuml;retimini yapmaktadır.&rdquo;</p>', 'Lenovo Uluslararası Çin merkezli bilişim teknoloji şirketi. Masaüstü Bilgisayar, Dizüstü Bilgisayar, El Bilgisayarı, Sunucu ve bilgisayar teknolojisi aksesuar ve donanımlarının üretimini yapmaktadır.', 'yuklenenler/galeri/vladstudio_precise_pangolin_480x320.jpg', 'galeri iç açıklama,description', '	galeri iç meta,keywords,idyegöre'),
(7, 'tezpa', '<p>en iyi makinacı</p>', 'logo', 'yuklenenler/galeri/tezpa logo yeni adresli.jpg', 'makinacı', ''),
(8, '', '', '', 'yuklenenler/galeri/', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galeri_meta`
--

CREATE TABLE IF NOT EXISTS `galeri_meta` (
  `gal_key` text COLLATE utf8_turkish_ci NOT NULL,
  `gal_desc` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `galeri_meta`
--

INSERT INTO `galeri_meta` (`gal_key`, `gal_desc`) VALUES
('YAPIM AŞAMASINDAYIZ', 'galeri acıklama genel3434');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `genel_ayar`
--

CREATE TABLE IF NOT EXISTS `genel_ayar` (
  `site_adi` text NOT NULL,
  `tema` varchar(255) NOT NULL,
  `site_slogan` text NOT NULL,
  `site_keyword` text NOT NULL,
  `site_baslik` text NOT NULL,
  `site_logo` text NOT NULL,
  `site_aciklama` text NOT NULL,
  `google_analiz` text NOT NULL,
  `site_adres` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_tel` text NOT NULL,
  `site_mail` text NOT NULL,
  `face` text NOT NULL,
  `twit` text NOT NULL,
  `link` text NOT NULL,
  `google` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `genel_ayar`
--

INSERT INTO `genel_ayar` (`site_adi`, `tema`, `site_slogan`, `site_keyword`, `site_baslik`, `site_logo`, `site_aciklama`, `google_analiz`, `site_adres`, `id`, `site_tel`, `site_mail`, `face`, `twit`, `link`, `google`) VALUES
('DOKTOR3D', 'colors-classic.css', 'SİZ HAYAL EDİN DOKTOR3D YAPSIN', 'kurumsal,firma,kurumsal php,script,php firma,kurumsal firma sitesi,satın al', 'DOKTOR3D', 'http://DR. 3D ', 'Bu site bir firma sitesidir.', '<script type=$text/javascript$>\r\n\r\n  var _gaq = _gaq || [];\r\n  _gaq.push([#_setAccount#, #UA-39370516-1#]);\r\n  _gaq.push([#_setDomainName#, #keykubad.com#]);\r\n  _gaq.push([#_setAllowLinker#, true]);\r\n  _gaq.push([#_trackPageview#]);\r\n\r\n  (function() {\r\n    var ga = document.createElement(#script#); ga.type = #text/javascript#; ga.async = true;\r\n    ga.src = (#https:# == document.location.protocol ? #https://# : #http://#) + #stats.g.doubleclick.net/dc.js#;\r\n    var s = document.getElementsByTagName(#script#)[0]; s.parentNode.insertBefore(ga, s);\r\n  })();\r\n\r\n</script>', ' YAPIM AŞAMASINDAYIZ', 1, '02125760030 YAPIM AŞAMASINDAYIZ', 'site@kurumsal.com', 'http://www.facebook.com/user1', 'https://twitter.com/user1', 'https://tr.linkedin.com/user1', 'https://plus.google.com/1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haberler`
--

CREATE TABLE IF NOT EXISTS `haberler` (
  `hid` int(11) NOT NULL AUTO_INCREMENT,
  `haber_baslik` text COLLATE utf8_turkish_ci NOT NULL,
  `haber_icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `haber_kicerik` text COLLATE utf8_turkish_ci NOT NULL,
  `haber_resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `haber_desc` text COLLATE utf8_turkish_ci NOT NULL,
  `haber_key` text COLLATE utf8_turkish_ci NOT NULL,
  `haber_tarih` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`hid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=10 ;

--
-- Tablo döküm verisi `haberler`
--

INSERT INTO `haberler` (`hid`, `haber_baslik`, `haber_icerik`, `haber_kicerik`, `haber_resim`, `haber_desc`, `haber_key`, `haber_tarih`) VALUES
(1, 'Deneme Haber', '<p>fsddfsdffsdsdf</p>\r\n<p>fsd</p>\r\n<p>dfsfsdfdsdfsdfsssdffsddfsds dfsfdsfsdfsdsdf&nbsp; dfdfsfsd dfsfds</p>\r\n<p>&nbsp;</p>\r\n<p>dfsfdsfsddfsfsddfsdfdfs dffdssdffsdf dsdffds</p>', 'dfsaddssdfsdf', 'yuklenenler/haber/vladstudio_cheshire_kitten_480x320.jpg', 'haber açıklama,deneme', 'haber deneme,deneme key', '11-06-2013'),
(3, 'Deneme Haber3', '<p>dfsfsdsfdfsd</p>\r\n<p>fdsfdsfdsfdsfdssdffsd</p>\r\n<p>fsdfdsfdsfsd</p>\r\n<p>As of jQuery 1.4.3, an optional string naming an easing function may be used. Easing functions specify the speed at which the animation progresses at different points within the animation. The only easing implementations in the jQuery library are the default, called swing, and one that progresses at a constant pace, called linear. More easing functions are available with the use of plug-ins, most notably the jQuery UI suite.</p>', 'dvfdfsdfs', 'yuklenenler/haber/vladstudio_black_cat_white_cat_color4_480x320.jpg', 'haber açıklama,deneme', 'haber deneme,deneme key', '11-07-2013'),
(4, 'Haber Deneme', '<p>As of jQuery 1.4.3, an optional string naming an easing function may be used. Easing functions specify the speed at which the animation progresses at different points within the animation. The only easing implementations in the jQuery library are the default, called swing, and one that progresses at a constant pace, called linear. More easing functions are available with the use of plug-ins, most notably the jQuery UI suite.</p>', 'sadsaddsasda\r\nsadsdadsa', 'yuklenenler/haber/vladstudio_library_480x320.jpg', 'haber açıklama,deneme', 'haber deneme,deneme key', '11-18-2013'),
(5, 'Deneme Haber', '<p>sdadsadsa</p>\r\n<p>If multiple elements are animated, it is important to note that the callback is executed once per matched element, not once for the animation as a whole.</p>', 'sadadsas', 'yuklenenler/haber/vladstudio_newborn_480x320.jpg', 'sdaass', 'fdsfdsfdsrew', '11-25-2013'),
(6, 'Deneme Haber7834', '<p>If multiple elements are animated, it is important to note that the callback is executed once per matched element, not once for the animation as a whole.</p>', 'saddsadsa', 'yuklenenler/haber/vladstudio_jellyfish_480x320.jpg', 'sddsaads', 'dsasdasd', '11-04-2013'),
(7, 'Deneme Haber35', '<p>If multiple elements are animated, it is important to note that the callback is executed once per matched element, not once for the animation as a whole.</p>\r\n<p><strong>As of jQuery 1.4.3,</strong> an optional string naming an easing function may be used. Easing functions specify the speed at which the animation progresses at different points within the animation. The only easing implementations in the jQuery library are the default, called swing, and one that progresses at a constant pace, called linear. More easing functions are available with the use of plug-ins, most notably the jQuery UI suite.</p>\r\n<p>If multiple elements are animated, it is important to note that the callback is executed once per matched element, not once for the animation as a whole.</p>', 'ssdsdsds35', 'yuklenenler/haber/vladstudio_alice_dragon_tree_1024x768_signed.jpg', 'haber açıklama,deneme35', 'haber deneme,deneme key35', '11-07-2013'),
(8, 'Dünyadaki milyarlarca insan arasında kaçıncısınız? Doğduğunuzda kaçıncı insandınız? Cevap bu sitede!', '<div id=contextual>\r\n<p>D&uuml;nya &uuml;zerindeki insan n&uuml;fusu son 50 yıl i&ccedil;erisinde tam iki katına &ccedil;ıktı. Yaşam s&uuml;relerinin teknolojinin gelişimlerinin de desteği ile uzaması, kaynakların eski zamanlara g&ouml;re daha bol hale gelmesi son 50 yıl i&ccedil;erisinde k&uuml;resel D&uuml;nya savaşların yaşanmaması gibi fakt&ouml;rler n&uuml;fusun bu <strong>hızlı artışının</strong> &ouml;nemli nedenleri arasında yer alıyor.</p>\r\n<p><strong>7 milyar</strong> rakamı ise <strong>Birleşmiş Milletler</strong>in yaptığı bir &ccedil;alışmaya ile ortaya &ccedil;ıktı. Hindistanda doğan bir kız &ccedil;ocuğunu d&uuml;nyadaki 7 milyarıncı insan olarak belirleyen BM, buna rağmen hesaplamalarında %1 ile %2 arasında bir sapma olabileceğini s&ouml;yl&uuml;yor. Yani n&uuml;fus bu rakamdan yaklaşık <strong>100 milyon</strong> daha fazla ya da az olabilir.</p>\r\n<p>Peki bu 7 milyar i&ccedil;erisinde siz ka&ccedil;ıncı sıradasınız? BBC\nin sitesinde yer alan ufak bir <a href=http://www.chip.com.tr/redir/?url=http%3A%2F%2Fwww.bbc.co.uk%2Fnews%2Fworld-15391515 rel=\nofollow target=\\_blank><span style=	ext-decoration: underline;>hesaplama aracı</span></a> bu sorunun cevabını vermek i&ccedil;in geliştirilmiş. Şu adresten ulaşabileceğiniz araca &ouml;nce g&uuml;n, ay, yıl olarak <strong>doğum tarihinizi</strong> girmeniz ve &ouml;nce Go ardından da Next bağlantılarına tıklamanız gerekiyor. Sonraki ekranda <strong>&uuml;lkenizi</strong>, bir sonrakinde <strong>cinsiyetinizi</strong> se&ccedil;ip son kez Nexte tıklayarak kendi sıralamanızı g&ouml;rebilirsiniz.</p>\r\n</div>', 'Doğduğunuzda kaçıncı insan oldunuz?', 'yuklenenler/haber/20111103113119.jpg', 'haber açıklama,deneme', 'haber deneme,deneme key', '11-22-2013'),
(9, 'YAPIM AŞAMASINDAYIZ', '', '', 'yuklenenler/haber/', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haber_meta`
--

CREATE TABLE IF NOT EXISTS `haber_meta` (
  `hab_key` text COLLATE utf8_turkish_ci NOT NULL,
  `hab_desc` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `haber_meta`
--

INSERT INTO `haber_meta` (`hab_key`, `hab_desc`) VALUES
('haber genel keywords', 'haber genel açıklasma');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ikon`
--

CREATE TABLE IF NOT EXISTS `ikon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ikon` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `ikon`
--

INSERT INTO `ikon` (`id`, `ikon`) VALUES
(1, 'icon-glass,\r\nicon-music,\r\nicon-search,\r\nicon-envelope-alt,\r\nicon-heart,\r\nicon-star,\r\nicon-star-empty,\r\nicon-user,\r\nicon-film,\r\nicon-th-large,\r\nicon-th,\r\nicon-th-list,\r\nicon-ok,\r\nicon-remove,\r\nicon-zoom-in,\r\nicon-zoom-out,\r\nicon-power-off,\r\nicon-signal,\r\nicon-gear,\r\nicon-cog,\r\nicon-trash,\r\nicon-home,\r\nicon-file-alt,\r\nicon-time,\r\nicon-road,\r\nicon-download-alt,\r\nicon-download,\r\nicon-upload,\r\nicon-inbox,\r\nicon-play-circle,\r\nicon-rotate-right,\r\nicon-refresh,\r\nicon-list-alt,\r\nicon-lock,\r\nicon-flag,\r\nicon-headphones,\r\nicon-volume-off,\r\nicon-volume-down,\r\nicon-volume-up,\r\nicon-qrcode,\r\nicon-barcode,\r\nicon-tag,\r\nicon-tags,\r\nicon-book,\r\nicon-bookmark,\r\nicon-print,\r\nicon-camera,\r\nicon-font,\r\nicon-bold,\r\nicon-italic,\r\nicon-text-height,\r\nicon-text-width,\r\nicon-align-left,\r\nicon-align-center,\r\nicon-align-right,\r\nicon-align-justify,\r\nicon-list,\r\nicon-indent-left,\r\nicon-indent-right,\r\nicon-facetime-video,\r\nicon-picture,\r\nicon-pencil,\r\nicon-map-marker,\r\nicon-adjust,\r\nicon-tint,\r\nicon-edit,\r\nicon-share,\r\nicon-check,\r\nicon-move,\r\nicon-step-backward,\r\nicon-fast-backward,\r\nicon-backward,\r\nicon-play,\r\nicon-pause,\r\nicon-stop,\r\nicon-forward,\r\nicon-fast-forward,\r\nicon-step-forward,\r\nicon-eject,\r\nicon-chevron-left,\r\nicon-chevron-right,\r\nicon-plus-sign,\r\nicon-minus-sign,\r\nicon-remove-sign,\r\nicon-ok-sign,\r\nicon-question-sign,\r\nicon-info-sign,\r\nicon-screenshot,\r\nicon-remove-circle,\r\nicon-ok-circle,\r\nicon-ban-circle,\r\nicon-arrow-left,\r\nicon-arrow-right,\r\nicon-arrow-up,\r\nicon-arrow-down,\r\nicon-mail-forward,\r\nicon-share-alt,\r\nicon-resize-full,\r\nicon-resize-small,\r\nicon-plus,\r\nicon-minus,\r\nicon-asterisk,\r\nicon-exclamation-sign,\r\nicon-gift,\r\nicon-leaf,\r\nicon-fire,\r\nicon-eye-open,\r\nicon-eye-close,\r\nicon-warning-sign,\r\nicon-plane,\r\nicon-calendar,\r\nicon-random,\r\nicon-comment,\r\nicon-magnet,\r\nicon-chevron-up,\r\nicon-chevron-down,\r\nicon-retweet,\r\nicon-shopping-cart,\r\nicon-folder-close,\r\nicon-folder-open,\r\nicon-resize-vertical,\r\nicon-resize-horizontal,\r\nicon-bar-chart,\r\nicon-twitter-sign,\r\nicon-facebook-sign,\r\nicon-camera-retro,\r\nicon-key,\r\nicon-gears,\r\nicon-cogs,\r\nicon-comments,\r\nicon-thumbs-up-alt,\r\nicon-thumbs-down-alt,\r\nicon-star-half,\r\nicon-heart-empty,\r\nicon-signout,\r\nicon-linkedin-sign,\r\nicon-pushpin,\r\nicon-external-link,\r\nicon-signin,\r\nicon-trophy,\r\nicon-github-sign,\r\nicon-upload-alt,\r\nicon-lemon,\r\nicon-phone,\r\nicon-unchecked,\r\nicon-check-empty,\r\nicon-bookmark-empty,\r\nicon-phone-sign,\r\nicon-twitter,\r\nicon-facebook,\r\nicon-github,\r\nicon-unlock,\r\nicon-credit-card,\r\nicon-rss,\r\nicon-hdd,\r\nicon-bullhorn,\r\nicon-bell,\r\nicon-certificate,\r\nicon-hand-right,\r\nicon-hand-left,\r\nicon-hand-up,\r\nicon-hand-down,\r\nicon-circle-arrow-left,\r\nicon-circle-arrow-right,\r\nicon-circle-arrow-up,\r\nicon-circle-arrow-down,\r\nicon-globe,\r\nicon-wrench,\r\nicon-tasks,\r\nicon-filter,\r\nicon-briefcase,\r\nicon-fullscreen,\r\nicon-group,\r\nicon-link,\r\nicon-cloud,\r\nicon-beaker,\r\nicon-cut,\r\nicon-copy,\r\nicon-paperclip,\r\nicon-paper-clip,\r\nicon-save,\r\nicon-sign-blank,\r\nicon-reorder,\r\nicon-list-ul,\r\nicon-list-ol,\r\nicon-strikethrough,\r\nicon-underline,\r\nicon-table,\r\nicon-magic,\r\nicon-truck,\r\nicon-pinterest,\r\nicon-pinterest-sign,\r\nicon-google-plus-sign,\r\nicon-google-plus,\r\nicon-money,\r\nicon-caret-down,\r\nicon-caret-up,\r\nicon-caret-left,\r\nicon-caret-right,\r\nicon-columns,\r\nicon-sort,\r\nicon-sort-down,\r\nicon-sort-up,\r\nicon-envelope,\r\nicon-linkedin,\r\nicon-rotate-left,\r\nicon-undo,\r\nicon-legal,\r\nicon-dashboard,\r\nicon-comment-alt,\r\nicon-comments-alt,\r\nicon-bolt,\r\nicon-sitemap,\r\nicon-umbrella,\r\nicon-paste,\r\nicon-lightbulb,\r\nicon-exchange,\r\nicon-cloud-download,\r\nicon-cloud-upload,\r\nicon-user-md,\r\nicon-stethoscope,\r\nicon-suitcase,\r\nicon-bell-alt,\r\nicon-coffee,\r\nicon-food,\r\nicon-file-text-alt,\r\nicon-building,\r\nicon-hospital,\r\nicon-ambulance,\r\nicon-medkit,\r\nicon-fighter-jet,\r\nicon-beer,\r\nicon-h-sign,\r\nicon-plus-sign-alt,\r\nicon-double-angle-left,\r\nicon-double-angle-right,\r\nicon-double-angle-up,\r\nicon-double-angle-down,\r\nicon-angle-left,\r\nicon-angle-right,\r\nicon-angle-up,\r\nicon-angle-down,\r\nicon-desktop,\r\nicon-laptop,\r\nicon-tablet,\r\nicon-mobile-phone,\r\nicon-circle-blank,\r\nicon-quote-left,\r\nicon-quote-right,\r\nicon-spinner,\r\nicon-circle,\r\nicon-mail-reply,\r\nicon-reply,\r\nicon-github-alt,\r\nicon-folder-close-alt,\r\nicon-folder-open-alt,\r\nicon-expand-alt,\r\nicon-collapse-alt,\r\nicon-smile,\r\nicon-frown,\r\nicon-meh,\r\nicon-gamepad,\r\nicon-keyboard,\r\nicon-flag-alt,\r\nicon-flag-checkered,\r\nicon-terminal,\r\nicon-code,\r\nicon-reply-all,\r\nicon-mail-reply-all,\r\nicon-star-half-full,\r\nicon-star-half-empty,}\r\nicon-location-arrow,\r\nicon-crop,\r\nicon-code-fork,\r\nicon-unlink,\r\nicon-question,\r\nicon-info,\r\nicon-exclamation,\r\nicon-superscript,\r\nicon-subscript,\r\nicon-eraser,\r\nicon-puzzle-piece,\r\nicon-microphone,\r\nicon-microphone-off,\r\nicon-shield,\r\nicon-calendar-empty,\r\nicon-fire-extinguisher,\r\nicon-rocket,\r\nicon-maxcdn,\r\nicon-chevron-sign-left,\r\nicon-chevron-sign-right,\r\nicon-chevron-sign-up,\r\nicon-chevron-sign-down,\r\nicon-html5,\r\nicon-css3,\r\nicon-anchor,\r\nicon-unlock-alt,\r\nicon-bullseye,\r\nicon-ellipsis-horizontal,\r\nicon-ellipsis-vertical,\r\nicon-rss-sign,\r\nicon-play-sign,\r\nicon-ticket,\r\nicon-minus-sign-alt,\r\nicon-check-minus,\r\nicon-level-up,\r\nicon-level-down,\r\nicon-check-sign,\r\nicon-edit-sign,\r\nicon-external-link-sign,\r\nicon-share-sign,\r\nicon-compass,\r\nicon-collapse,\r\nicon-collapse-top,\r\nicon-expand,\r\nicon-euro,before,icon-eur,\r\nicon-gbp,\r\nicon-dollar,\r\nicon-usd,\r\nicon-rupee,\r\nicon-inr,\r\nicon-yen,\r\nicon-jpy,\r\nicon-renminbi,\r\nicon-cny,\r\nicon-won,\r\nicon-krw,\r\nicon-bitcoin,\r\nicon-btc,\r\nicon-file,\r\nicon-file-text,\r\nicon-sort-by-alphabet,\r\nicon-sort-by-alphabet-alt,\r\nicon-sort-by-attributes,\r\nicon-sort-by-attributes-alt,\r\nicon-sort-by-order,\r\nicon-sort-by-order-alt,\r\nicon-thumbs-up,\r\nicon-thumbs-down,\r\nicon-youtube-sign,\r\nicon-youtube,\r\nicon-xing,\r\nicon-xing-sign,\r\nicon-youtube-play,\r\nicon-dropbox,\r\nicon-stackexchange,\r\nicon-instagram,\r\nicon-flickr,\r\nicon-adn,\r\nicon-bitbucket,\r\nicon-bitbucket-sign,\r\nicon-tumblr,\r\nicon-tumblr-sign,\r\nicon-long-arrow-down,\r\nicon-long-arrow-up,\r\nicon-long-arrow-left,\r\nicon-long-arrow-right,\r\nicon-apple,\r\nicon-windows,\r\nicon-android,\r\nicon-linux,\r\nicon-dribbble,\r\nicon-skype,\r\nicon-foursquare,\r\nicon-trello,\r\nicon-female,\r\nicon-male,\r\nicon-gittip,\r\nicon-sun,\r\nicon-moon,\r\nicon-archive,\r\nicon-bug,\r\nicon-vk,\r\nicon-weibo,\r\nicon-renren,');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menuler`
--

CREATE TABLE IF NOT EXISTS `menuler` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_sira` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `menu_baslik` text COLLATE utf8_turkish_ci NOT NULL,
  `menu_icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `menu_altid` int(11) NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `meta_desc` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=15 ;

--
-- Tablo döküm verisi `menuler`
--

INSERT INTO `menuler` (`menu_id`, `menu_sira`, `menu_baslik`, `menu_icerik`, `menu_altid`, `meta_key`, `meta_desc`) VALUES
(1, '1', 'About Us', '<p>Simgola.com, firmalara,şahıslara ve kurumlara web sayfası hizmeti sunan, profesyonel tasarımları kolayca y&ouml;netmenizi sağlayan kontrol panelli web sayfası sistemini sizlerin hizmetine sunan bir kuruluştur.Bu sistem ile web sayfanızı kolay şekilde y&ouml;netebilecek ve g&uuml;ncelleyebileceksiniz.Şu ana kadar 100e yakın firma ve şahıs <strong>simgola.com</strong>&rsquo; dan web sitesi hizmeti almıştır.M&uuml;şterilerimiz arasında &ccedil;eşitli sekt&ouml;rlerden kişiler bulunmaktadır.<br /> <br /> <strong>&Uuml;r&uuml;nlerimizin temel &ouml;zellikleri;</strong><br /> Ekonomik,kolay y&ouml;netilebilir,kapsamlı ve kaliteli olmalarıdır.Sizlerden gelen taleplere g&ouml;re web sitelerimiz s&uuml;rekli geliştirilmektedir.Kolay y&ouml;netilebilir olması sayesinde,m&uuml;şterilerimiz kimseye ihtiya&ccedil; duymadan internete bağlanabildikleri herhangi bir bilgisayardan websitelerini kolayca y&ouml;netebilecektir.Web yazılım &uuml;r&uuml;nlerimiz bu a&ccedil;ıdan diğer firmaların &uuml;r&uuml;nlerinden bir adım &ouml;ne &ccedil;ıkmaktadır.<br /> <br /> <strong>Hedefimiz;</strong><br /> M&uuml;şteri odaklı &ccedil;alışma stratejisi ile en iyi olmayı hedeflemek,insan kaynaklarına gereken &ouml;nemi vermek,gelişimin kaynak yaratmaktan ge&ccedil;tiğini unutmamak,iş ahlakı ve d&uuml;r&uuml;stl&uuml;ğ&uuml; olmazsa olmaz koşul haline getirmek ve &uuml;lkemize g&uuml;&ccedil; katmanın g&uuml;&ccedil; verdiğinin bilincinde bir d&uuml;nya oyuncusu olmak en temel ilkemizdir.<br /> <br /> <strong>Bizim i&ccedil;in değerlisiniz.</strong><br /> M&uuml;şterilerimiz i&ccedil;in değer yaratmak, beklentilerine kalite ve istikrarla karşılık vermek ilk &ouml;nceliğimizdir. &Uuml;r&uuml;nlerimize sahip &ccedil;ıkmak ve satış sonrasında da m&uuml;şterilerimizin her zaman yanında olmak g&ouml;revimizdir.</p><br />\r\n<p>&nbsp;</p><br />\r\n<p><strong>Daima en iyi olmak, vazge&ccedil;ilmez hedefimizdir;</strong><br /> <span>Kalitede, hizmette, ikmal kaynaklarımız ve bayi ilişkilerimizde, kamuoyunda sahip olduğumuz bu imajı korumak ana hedefimizdir. Bu hedefe ulaşmak &uuml;zere faaliyet g&ouml;sterilen alanlarda y&ouml;netimi &uuml;stlenmek ve piyasada lider olmak temel ilkemizdir.</span></p>', 1, 'kurumsal,bilgiler,simgola,demo script', 'kurumsal açıklama buda'),
(11, '2', 'Products', '<p><strong>Teknolojinin &ouml;nc&uuml;s&uuml; kimliği altında m&uuml;şterilerine en kaliteli hizmetleri sunan uluslararası bir firma olmak.</strong></p><br />\r\n<p>&nbsp;</p><br />\r\n<p>M&uuml;şteri odaklı bir bakış a&ccedil;ısıyla teknoloji hizmet d&ouml;n&uuml;ş&uuml;m&uuml;n&uuml; sağlayarak m&uuml;şterilerimize her yerde her zaman en y&uuml;ksek standartlarla hizmetlerimizi sunabilmek.</p><br />\r\n<p>&nbsp;</p><br />\r\n<p><strong>* M&uuml;şteri odaklı<br /> </strong></p><br />\r\n<p><strong>* Yenilik&ccedil;i<br /> </strong></p><br />\r\n<p><strong>* Hesaplı<br /> </strong></p><br />\r\n<p><strong>* Fiyat avantajı sağlayacak hizmet<br /> </strong></p><br />\r\n<p><strong>* Her koşulda her zaman m&uuml;şteriye &ccedil;&ouml;z&uuml;m &uuml;retebilmek<br /> </strong></p><br />\r\n<p><strong>* G&uuml;venilir, kaliteli bir hizmet ile fark yaratmak<br /> </strong></p><br />\r\n<p><strong>* T&uuml;rkiye internet tekonolojileri sekt&ouml;r&uuml;ne ivme kazandıracak yenilik&ccedil;i hizmetler sunmak</strong></p>', 11, 'Simgola vizyon,vizyonumuz', 'vizyon açıklama'),
(12, '2', 'Concact', '<h3><strong><strong><span><img style="display: block; margin-left: auto; margin-right: auto;" title="webtasarim" src="http://www.pronsa.com/uploads/web_tasarim.png" alt="webtasarim" width="138" height="200" /></span></strong></strong></h3><br />\r\n<h3><strong><strong><span>WEB TASARIM</span></strong></strong></h3><br />\r\n<p><span><span><strong>Web Sitesi Nedir&nbsp; ?</strong></span></span></p><br />\r\n<p>&nbsp;</p><br />\r\n<p>Internet, b&uuml;y&uuml;k ve k&uuml;&ccedil;&uuml;k firmaları bir araya getiren dijital bir ara&ccedil;tır. G&uuml;n&uuml;m&uuml;zde artık hemen herkesin internetle bağlantısı olduğunu d&uuml;ş&uuml;n&uuml;r isek, artık&nbsp;&nbsp;<strong>web sitesi</strong>&nbsp;&nbsp; &ccedil;ok &ouml;nemli bir organ haline gelmiştir. M&uuml;şteriler &ccedil;alıştıkları yada iş yaptıkları firmalar hakkında detaylı bilgiye sahip olmak isterler. Bu durumda web sitesi devreye gider. Web sitesi i&ccedil;erisinde, firmanın yaptığı işler, &uuml;r&uuml;nler yada hizmetler, referanslar vb. bilgiler bulunur.&nbsp;</p><br />\r\n<p>&nbsp;</p><br />\r\n<p><span><span><strong>Neden Web Sitesi Yapılır ?</strong></span></span></p><br />\r\n<p>&nbsp;</p><br />\r\n<p><strong>Internet sayfası g&uuml;n&uuml;m&uuml;zde en yaygın ve en ucuz iletişim aracıdır.</strong>&nbsp;Bu sayede m&uuml;şterileriniz ve internet kullanıcıları size d&uuml;nyanın her yerinden ulaşabilir, firmanızın kurumsal yapısı, ilgi alanınız ve &uuml;r&uuml;nleriniz hakkında detaylı bilgiye sahip olabilir, sitenizde bulunan e-mail yada formlar aracılığı ile sizinle kolayca irtibat kurabilir.&nbsp;<strong>Web sitesi bir şirketin imajını belirler</strong>. G&uuml;n&uuml;m&uuml;zde web sitesi firmanızın prestiji i&ccedil;in gerekli bir duruma gelmiştir. Bir web siteniz var ise bile, k&ouml;t&uuml; bir web sitesi firmanızın prestijini zedeleyebilir. G&uuml;n&uuml;m&uuml;z ve gelecek iletişim aracı olan internetle şirketinizi&nbsp; Simgola&nbsp; tanıştırıyor,&nbsp;<strong>sizlere profesyonel &ccedil;&ouml;z&uuml;mler sunuyor, web siteniz varsa bile; yepyeni, profesyonel bir site ile firmanıza yeni bir kimlik kazandırıyor.</strong></p><br />\r\n<p>&nbsp;</p><br />\r\n<p><span><span><strong>Tasarım Politikamız</strong></span></span></p><br />\r\n<p>&nbsp;</p><br />\r\n<p>Simgola olarak, &ouml;ncelikle danışmanınız olup, web sitesi yaparken izlemeniz gereken yolu, &ouml;nerilerimizi sizlere aktarıyoruz.</p><br />\r\n<p>Tek taraflı değil, karşılıklı olarak fikir alış-verişi ile proje &uuml;zerinde konuşup firmanızın kurumsal yapısına, renklerine uygun web sitesini hazırlıyoruz.Web sitesini hazırlarken en son teknoloji, efektler ve animasyonlar ile sitenizi g&ouml;rsel hale getiriyoruz. M&uuml;şterileriniz, web sitenize girdiklerinde site i&ccedil;erisinde kaybolmadan kolayca gezinebilmesine dikkat ediyoruz. Ve herşeyden &ouml;nemlisi i&ccedil;eriğin en sade ve anlaşılır bi&ccedil;imde sunulmasına &ouml;zen g&ouml;steriyoruz. Web siteniz hazırlanıp yayına sunulduktan sonra sitenizin, gelişmesi ve g&uuml;ncellenmesi konusunda ve eşitli teknik konularda da d&uuml;zenli hizmetler sunuyoruz.&nbsp;<strong>Konu ile ilgili karşılıklı g&ouml;r&uuml;şmek isterseniz aşağıdaki formu doldurabilir yada telefonlarımızdan bize ulaşabilirsiniz.</strong></p>', 12, 'hizmetlerimiz,webtasarim,webyazilim,tasarim şirketi', 'Hizmetlerimiz hakkında'),
(10, '1', 'Home', '<div class="icerik"><br />\r\n<p>Her insanın, her işletmenin, yaşamı d&uuml;ş&uuml;nen ve irdeleyen t&uuml;m etkin bireylerin kendilerine klavuzluk eden ama&ccedil;ları olmalı. Bu niyetle Simgola misyonunu ziyaret&ccedil;ilerimizle paylaşmak isteriz.</p><br />\r\n<p>Misyonumuz, kurum ve kuruluşların, t&uuml;zel ve bireysel kişilerin internet teknolojilerinden maksimum fayda elde edebilecekleri hizmetleri sunmak, iştirak&ccedil;ilerimizin ve &ccedil;alışanlarımızın mesleklerini icra ederken işlerinden duydukları memnuniyeti ve gelir d&uuml;zeylerini maksimize edecek ortam yaratmak, sevk ve idaresini sağlamaktır.</p><br />\r\n<div class="icerik"><br />\r\n<p>Simgola olarak temel hedefimiz, etkili ve kullanışlı web siteleri &uuml;retmektir.</p><br />\r\n<p>Tasarımın temel amacı, ziyaret&ccedil;i ile i&ccedil;erik arasında ger&ccedil;ekleşen iletişimi kolaylaştırmaktır. Simgola İnternet &Ccedil;&ouml;z&uuml;mleri, hi&ccedil;bir g&ouml;rsel estetik unsurdan taviz vermeden, site ziyaret&ccedil;ilerinin i&ccedil;eriği &ouml;zg&uuml;rce keşfedebilecekleri aray&uuml;z &ccedil;alışmasını geliştirmeyi prensip edinmiştir.</p><br />\r\n<p>G&ouml;rsellik ve sadelik g&ouml;z &ouml;n&uuml;nde tutularak işlenen pikseller sonucunda ortaya &ccedil;ıkan &ouml;zg&uuml;n tasarımlar, m&uuml;şterilerimizin ve ziyaret&ccedil;ilerimizin taleplerini en doğru şekilde karşılamak &uuml;zere hazırlanır.</p><br />\r\n</div><br />\r\n</div>', 10, 'Simgola misyon,misyonumuz,simgola', 'Misyon açıklaması');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `referanslar`
--

CREATE TABLE IF NOT EXISTS `referanslar` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `ref_firma` text COLLATE utf8_turkish_ci NOT NULL,
  `ref_icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `ref_resim` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=7 ;

--
-- Tablo döküm verisi `referanslar`
--

INSERT INTO `referanslar` (`rid`, `ref_firma`, `ref_icerik`, `ref_resim`) VALUES
(1, 'Hewlet Packard2', '	If multiple elements are animated, it is important to note that the callback is executed once per matched element, not once for the animation as a whole.', 'yuklenenler/referans/icerik.jpg'),
(2, 'Lenovo', 'Lenovo Uluslararası Çin merkezli bilişim teknoloji şirketi. Masaüstü Bilgisayar, Dizüstü Bilgisayar, El Bilgisayarı, Sunucu ve bilgisayar teknolojisi aksesuar ve donanımlarının üretimini yapmaktadır.', 'yuklenenler/referans/lenovo.gif'),
(3, 'Apple', 'Apple Inc. ya da eski adıyla Apple Computer, Inc., merkezi Cupertino, California’da bulunan; tüketici elektroniği, bilgisayar yazılımı ve kişisel bilgisayar tasarlayan, geliştiren ve satan Amerikan çok uluslu şirkettir', 'yuklenenler/referans/apple.jpg'),
(4, 'Casper', 'Masaüstü, dizüstü, sunucu ve mobil ürünler sunuyor. Siteden firma kampanyalarına, satış noktalarına ve ürün tanıtımlarına ulaşabilirsiniz.', 'yuklenenler/referans/casper_logo.jpg'),
(5, 'Asus', 'ASUS, yenlilikçi fikirlerle hareket eden ve içlerinde dizüstü bilgisayarlar, anakartlar, ekran kartları, monitörler, masaüstü bilgisayarlar, sunucular, kablosuz ...', 'yuklenenler/referans/Asus_logo.jpg'),
(6, 'Toshiba', 'Klima, bilgisayar, televizyon faks ve fotokopi makineleri, medikal sistemler ve sunum ve aydınlatma gereçleri üreticisinin Türkiye sitesi.', 'yuklenenler/referans/2012-11-21-10-40-12-toshiba-logo.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_baslik` text NOT NULL,
  `slider_ufak` text NOT NULL,
  `slider_altaciklama` text NOT NULL,
  `slider_link` text NOT NULL,
  `slider_lbaslik` text NOT NULL,
  `slider_resim` text NOT NULL,
  `slider_back` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`id`, `slider_baslik`, `slider_ufak`, `slider_altaciklama`, `slider_link`, `slider_lbaslik`, `slider_resim`, `slider_back`) VALUES
(1, 'FİRMANIZI ZİRVEYE TAŞIYIN', 'Şık ve benzersiz tasarım', 'renk seçenekleri', '	', '', 'yuklenenler/slideimage2.png', 'yuklenenler/slideback2.jpg'),
(2, 'ARAMA MOTORLARINDA BAŞARILI', 'Başarınızı hem şıklıkla hemde zirvede yansıtın', 'Tüm aramalarda ilk olun', '	http://www.ekonomikhost.net', 'Ekonomikhost', 'yuklenenler/arama-motoru.png', 'yuklenenler/slideback1.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `takvim`
--

CREATE TABLE IF NOT EXISTS `takvim` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `takvimadi` text COLLATE utf8_turkish_ci NOT NULL,
  `takvimicerik` text COLLATE utf8_turkish_ci NOT NULL,
  `takvimtarih` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `takvim`
--

INSERT INTO `takvim` (`tid`, `takvimadi`, `takvimicerik`, `takvimtarih`) VALUES
(1, '10 Kasım Atatürk''ü anma günü', '10 Kasım Atatürk''ü anma günü', '11/10/2013'),
(2, '24 kasım öğretmenler günü', '24 kasım öğretmenler günü', '11/24/2013'),
(3, '24 kasım öğretmenler günü', '24 kasım öğretmenler günü', '11/24/2013');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ufak_tanitim`
--

CREATE TABLE IF NOT EXISTS `ufak_tanitim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanit_baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `tanit_yazi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `tanit_ikon` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=15 ;

--
-- Tablo döküm verisi `ufak_tanitim`
--

INSERT INTO `ufak_tanitim` (`id`, `tanit_baslik`, `tanit_yazi`, `tanit_ikon`) VALUES
(9, 'Fantastik Tasarım', 'Mobil uyumlu responsive', ' icon-copy'),
(10, 'Temiz Kodlama', 'Seo başarısı yüksek', ' icon-html5'),
(11, 'Renk Şeması', '6 adet renk seçeneği', ' icon-cog'),
(12, 'Dinamik Meta Tag', 'Dinamik meta girişi sayesinde zirvede olun', ' icon-star'),
(13, 'Kolay Yönetim', 'Yönetici panelinden tam müdahale', ' icon-user'),
(14, 'Firmanızı Öne Çıkarın', 'Firmanızı tasarım ve şıklıkla internette temsil edin', ' icon-archive');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetici`
--

CREATE TABLE IF NOT EXISTS `yonetici` (
  `admin_adi` text NOT NULL,
  `admin_sifre` text NOT NULL,
  `admin_email` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yonetici`
--

INSERT INTO `yonetici` (`admin_adi`, `admin_sifre`, `admin_email`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

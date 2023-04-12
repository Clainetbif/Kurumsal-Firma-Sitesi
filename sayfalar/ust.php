<?php
	#Kurumsal Firma Sitesi
	#Kodlama : Keykubad
require_once("ayar.php");
	$ustcek	=mysql_fetch_array(mysql_query("select * from genel_ayar"));
	$site_baslik	= $ustcek["site_baslik"];
	$site_adi		= $ustcek["site_adi"];
	$site_slogan	= $ustcek["site_slogan"];
	$site_logo		= $ustcek["site_logo"];
	$google_analiz	= $ustcek["google_analiz"];
	$site_keyword	= $ustcek["site_keyword"];
	$site_aciklama	= $ustcek["site_aciklama"];
	$site_adres		= $ustcek["site_adres"];
	$site_tel		= $ustcek["site_tel"];
	$site_mail		= $ustcek["site_mail"];
	$temasite		= $ustcek["tema"];
	$face		= $ustcek["face"];
	$twit		= $ustcek["twit"];
	$link		= $ustcek["link"];
	$goog		= $ustcek["google"];
	
	

?>


	
	<link rel="Shortcut Icon" type="image/ico" href="imgs/favicon.ico" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<!-- CSS ______________________________________-->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/magnificpopup.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	
	<link href="css/master.css" rel="stylesheet" />
	<link href="css/<?=$temasite;?>" rel="stylesheet" />   <!-- The color scheme -->
	
	<!-- Javascripts ______________________________________-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
		<!-- include Easing --
		<!-- include mixitup for filtering items -->
		<script src="js/jquery.mixitup.min.js"></script>


		<script src="js/jquery.easing.js"></script> 
			<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script src="js/jquery.gmap.min.js"></script> 
		<!-- include Cycle -->
		<script src="js/jquery.cycle.all.js"></script> 
		<!-- include jCarousel -->
		<script src="js/jquery.jcarousel.min.js"></script> 
		<!-- include image popups -->
		<script src="js/jquery.magnific-popup.min.js"></script> 
		<!-- include mobile menu -->
		<script src="js/jquery.mobilemenu.js"></script> 
		<!-- include custom script -->
		<script src="js/scripts.js"></script>

	<!-- Fixing Internet Explorer ______________________________________-->
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<link rel="stylesheet" href="css/ie.css" />
	<![endif]-->

	<!--[if IE 7]>
		<link rel="stylesheet" href="css/ie7.css" />
		<link rel="stylesheet" href="css/font-awesome-ie7.min.css">
	<![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head> 

<body class="home">

<div id="wrapperbox">

	<!-- HEADER ______________________________________-->
	<header role="banner">
		
		<div class="wrapper">
			<!-- Logo ______________________________________-->
			<div id="logo">
				<h1>
					<a href="/" rel="home"><img src="<?=$site_logo;?>" alt="Logo" /></a>
					<a href="/" rel="home"><span class="blue"><?=$site_baslik;?></span></a> <br />
					<span class="subtitle"><?=$site_slogan;?></span>
				</h1>
			</div>
			
			<!-- Address Microdata ______________________________________-->
			<div id="address-block" itemscope="" itemtype="http://schema.org/Organization"> 
			   <span itemprop="name" class="hidden">Keykubad</span> 
			   <div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
					
				  <span itemprop="streetAddress"><?php echo $site_adres;?></span>
				  
			   </div>
			   <span itemprop="telephone"><i class="icon-mobile-phone"></i> <strong><?php echo $site_tel;?></strong></span> 
			   <a href="mailto:<?php echo $site_mail;?>" itemprop="email"><i class="icon-envelope"></i> <?php echo $site_mail;?></a>
			</div>	
			
			<!-- Social icons ______________________________________-->
			<div id="social-block">
				<ul>
					<li><a href="<?=$twit;?>" target="_blank" title="Twitter"><i class="icon-twitter"></i></a></li>
					<li><a href="<?=$face;?>" target="_blank" title="Facebook"><i class="icon-facebook"></i></a></li>
					<li><a href="<?=$link;?>" target="_blank" title="Linkedin"><i class="icon-linkedin"></i></a></li>
					<li><a href="<?=$goog;?>" target="_blank" title="Google Plus"><i class="icon-google-plus"></i></a></li>
					<!-- 	<li><a href="#" target="_blank" title="Youtube"><i class="icon-youtube"></i></a></li>
					<li><a href="#" target="_blank" title="Dribbble"><i class="icon-dribbble"></i></a></li>
					<li><a href="#" target="_blank" title="Flickr"><i class="icon-flickr"></i></a></li>
					<li><a href="#" target="_blank" title="Tumblr"><i class="icon-tumblr"></i></a></li>
					<li><a href="#" target="_blank" title="Skype"><i class="icon-skype"></i></a></li> -->
				</ul>
			</div>
		</div>  <!-- END .wrapper -->
		
		<!-- Main menu ______________________________________-->
		<nav id="mainmenu" role="navigation">
			<ul>
				<li><a href="anasayfa.html" class="active">Anasayfa</a></li>
			<?php
			$sql_kategori=mysql_query("SELECT * FROM menuler order by menu_sira ASC");
			$kategori_list=array();
			$i=0;
			while($row_kategori=mysql_fetch_object($sql_kategori)){
				$kategori_list[$i]['menu_id']=$row_kategori->menu_id;
				$kategori_list[$i]['menu_altid']=$row_kategori->menu_altid;
				$kategori_list[$i]['menu_baslik']=$row_kategori->menu_baslik;
				
				$i++;
				
			}
				echo  SinirsizKategoriListele($kategori_list);
			?>
			<li><a href="bilgiler.html">Bilgiler</a></li>
			<li><a href="galeri.html">Galeri</a></li>
			<li><a href="iletisim.html">İletişim</a></li>
		</ul>

			<!-- Search box ______________________________________-->
			<div id="sitesearch">
				<i class="icon-search"></i>
			</div>
			<div id="search-results">
				<script>
				  (function() {
					var cx = '017683756184911932766:rvnzs1j9m1g';
					var gcse = document.createElement('script');
					gcse.type = 'text/javascript';
					gcse.async = true;
					gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
						'//www.google.com/cse/cse.js?cx=' + cx;
					var s = document.getElementsByTagName('script')[0];
					s.parentNode.insertBefore(gcse, s);
				  })();
				</script>
				<div id="search-box">
					<div class="gcse-search"></div>
				</div>
			</div>
			
		</nav> <!-- END #mainmenu -->
	</header>
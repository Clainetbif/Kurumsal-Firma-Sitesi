<?php
//Kurumsal firma sitesi
//Kodlayan Keykubad
//id ye göre içerik çekiyoruz hadi bakalım
$duyid			=$_GET["id"];
$cekmenu		= mysql_fetch_array(mysql_query("select * from duyurular where id='$duyid'"));
				$duyurubaslik	= $cekmenu["duyuru_baslik"];
				$duyuruicerik	= $cekmenu["duyuru_icerik"];
?>
<div class="clear"></div>
	<div class="wrapper">
		
			<!-- Heading _____________________________________________-->
			<h1><?=$duyurubaslik;?></h1>
			
			<!-- Breadcrumbs _____________________________________________-->
			<p itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" id="breadcrumbs"><a href="/" rel="home" itemprop="url"><span itemprop="title">Anasayfa</span></a> <i class="icon-chevron-right"></i>Duyuru</p>
			<hr />
			
			<!-- WYSIWYG Content _____________________________________________-->
			<p class="big">
			<?=$duyuruicerik;?>
			</p>
	
			<br />
	
			
			<!-- END of WYSIWYG content _____________________________________________-->
			
		 <!-- END .content -->	
			
		<div class="clear"></div>	  
		
	</div> <!-- END .wrapper -->
<?php
//Kurumsal firma sitesi
// Kodlayan Keykubad

#####burada hakkımızda kısmı meta acıklama yazısı ekliyoruz#####
$genelayar	=mysql_fetch_array(mysql_query("select * from genel_ayar"));
		$genelaciklama	=$genelayar["site_aciklama"];
		$geneltitle		=$genelayar["site_baslik"];
		$genelgg		=$genelayar["google_analiz"];
		$geneladres		=$genelayar["site_adres"];
?>
<!-- Footer ______________________________________-->
	<footer role="contentinfo" id="footer">
		<div class="wrapper">
			<div class="footerbox">
				<h3>Hakkımızda</h3>
				<p><?=$genelaciklama;?></p>
			</div> <!-- END .footerbox -->

			<div class="footerbox">
				<h3>Son Haberler</h3>
				<ul>
						<?php
						#####burada haberler kısmı son 3 haber ekliyoruz#####
						$haberler	=mysql_query("select * from haberler order by hid DESC LIMIT 0,3");
						while ($haberyaz=mysql_fetch_array($haberler)){
						$hbaslik	=$haberyaz["haber_baslik"];
						$htarih		=$haberyaz["haber_tarih"];
						$haberid	=$haberyaz["hid"];
						?>
					<li>
						<i class="icon-file-text"></i> 
						<h4><a href="haberoku-<?=$haberid;?>.html"><?=mb_substr($hbaslik,0,18,"UTF8")."...";?></a></h4>
						<p class="small"><strong><?=tarih2($htarih);?> <?=tarih1($htarih);?></strong></p>
					</li>
					<?php } ?>
				</ul>
			</div> <!-- END .footerbox -->
			
			<div class="footerbox">
				<h3>Etkinlikler</h3>
				<ul>
				<?php
					$etkin=mysql_query("select * from takvim order by tid DESC LIMIT 0,3");
					while($etcek=mysql_fetch_array($etkin)){
					$etbaslik	=$etcek["takvimadi"];
					$eticerik	=$etcek["takvimicerik"];
					$ettarih	=$etcek["takvimtarih"];
				?>
					<li>
						<i class="icon-calendar"></i> 
						<h4 style="color:#FFF;"><?=$etbaslik;?></h4>
						<p class="small"><strong><?=tarihtakvim($ettarih);?></strong> / <?=$eticerik;?> </p>
					</li>
				<?php
				}
				?>
				</ul>
			</div> <!-- END .footerbox -->
			
			<div class="footerbox last">
				<h3>E-BÜLTEN</h3>
			
					<p>Sitemiz hakkında gelişmelerden haberdar olmak için lütfen mailinizi ekleyiniz</p>
					
					<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=Keykubad-BiliimTeknolojiVeInternet', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><p>Email adresinizi giriniz</p><p><input type="text" name="email"/></p><input type="hidden" value="Keykubad-BiliimTeknolojiVeInternet" name="uri"/><input type="hidden" name="loc" value="en_US"/><input type="submit" value="Mail Ekle" /></form>
				
			</div> <!-- END .footerbox -->
			<div class="clear"></div>

			<hr />
			<p class="left small">Copyright &copy; <?php echo date('Y');?> <?php echo $geneltitle;?>. <br />All rights reserved.</p>
	
			<ul class="footermenu">
				<li><a href="anasayfa.html">Anasayfa</a></li>
				<li><a href="galeri.html">Galeri</a></li>
				<li><a href="bilgiler.html">Bilgiler</a></li>
				<li><a href="duyurular.html">Duyurular</a></li>
				<li><a href="iletisim.html">İletişim</a></li>
			</ul> <!-- END .footermenu -->
			<div class="clear"></div>
			-YASAL UYARI:
Web sitemiz dahilindeki tüm sayfalar, bu sayfaları gösteren tüm ekranlar ve içerdiği her türlü bilgi ve bağlı materyal, yerleşim ve öğeler -çözüm ortaklarının logoları ve yasal hakları hariç- Ekonomikhost'a aittir.
Yazılı izin olmaksızın ve kaynak belirtilmedikçe kopyalanamaz ya da yayınlanamaz.
		</div>  <!-- END .wrapper -->
	</footer>
</div> <!-- END #wrapperbox -->
<br class="clear" /> <!-- This is the end, my friend -->


<!-- Initializing scripts ______________________________________-->
	<script> 			
	jQuery(window).load(function() {
		// init Cycle for slider
		
		$('#slides').after('<div id="circle-pager">').cycle({
			fx:      'fade', 
			speed:    300, 
			timeout:  8000,
			cleartype:  true,
			cleartypeNoBg: false,
			pager: '#circle-pager',
			next:  '#slider .next1', 
			prev:  '#slider .prev1',
			slideResize: true,
			fit: 1,
			width: '100%',
			before:  function(currSlideElement, nextSlideElement) { 
				// hide elements and put them in start position		
				$(this).find('.slide-image').css({
					'opacity': '0',
					'left': '-50px'
				});
				$(this).find('.slide-text').css({
					'opacity': '0',
					'top': '0'
				});
				$(this).find('.slide-text p').css({
					'opacity': '0',
					'left': '15px'
				});
			},
			after:  function(currSlideElement, nextSlideElement) { 			
				// fade in image
				$(this).find('.slide-image').animate({
					'opacity': '1',
					'left': '0'
				}, 500, 'linear');
				// bring the text box from top
				$(this).find('.slide-text').delay(500).animate({
					'opacity': '1',
					'top': '25%'
				}, 500, 'easeOutBack');
				// bring the paragraphs in
				$(this).find('.slide-text p:eq(0)').delay(500).animate({
					'opacity': '1',
					'left': '0'
				}, 500, 'easeOutBack');
				$(this).find('.slide-text p:eq(1)').delay(700).animate({
					'opacity': '1',
					'left': '0'
				}, 500, 'easeOutBack');
				$(this).find('.slide-text p:eq(2)').delay(900).animate({
					'opacity': '1',
					'left': '0'
				}, 500, 'easeOutBack');
				$(this).find('.slide-text p:eq(3)').delay(1100).animate({
					'opacity': '1',
					'left': '0'
				}, 500, 'easeOutBack');

			} 
		});

		// init Cycle for testimonials
		$('#quotes').cycle({
			fx:      'fade', 
			speed:    400, 
			timeout:  0,
			cleartype:  false,
			next:  '#quotes-nav .next2', 
			prev:  '#quotes-nav .prev2',
			slideResize: true,
			fit: 1,
			width: '100%'
		});
		
		// init jCarousel for portfolio projects
		$('.carousel4').jcarousel({
			'visible': 4,
			'wrap': 'both'
		});
		$('#latest-projects .prev1').click(function() {
			$('.carousel4').jcarousel('scroll', '-=1');
		});
		$('#latest-projects .next1').click(function() {
			$('.carousel4').jcarousel('scroll', '+=1');
		});

		// init jCarousel for recent news
		$('.carousel-vert4').jcarousel({
			'vertical': true,
			'visible': 4,
			'wrap': 'both'
		});
		$('#recent-news .prev2').click(function() {
			$('.carousel-vert4').jcarousel('scroll', '-=1');
		});
		$('#recent-news .next2').click(function() {
			$('.carousel-vert4').jcarousel('scroll', '+=1');
		});
		 
		// init jCarousel for client logos
		$('.carousel7').jcarousel({
			'wrap': 'circular'
		}).jcarouselAutoscroll({
			'interval': 2000,
			'autostart': true,
			'target': '+=1'
		});	
	});
	</script>
	<!-- Initializing scripts  __________________________________________-->
	<script type="text/javascript"> 			
	jQuery(document).ready(function() {
		// init gmap
		 $('#map-content').gMap({
			address: "<?=$geneladres;?>",
			scrollwheel: false,
			zoom: 12,
			markers:[
				{
					address: "<?=$geneladres;?>"
				}
			]
		});
	});
	</script>
	<!-- Your Google Analytics ______________________________________-->
<?php

$genelgg=str_replace('#',"'",$genelgg);
$genelgg=str_replace('$','"',$genelgg);
echo $genelgg;

?>
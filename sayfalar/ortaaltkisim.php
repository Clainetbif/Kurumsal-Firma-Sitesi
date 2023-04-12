
<!-- Recent News ______________________________________-->
<div class="wrapper">
		<div id="recent-news">
			<h2>Pratik Bilgiler</h2>
			<div class="carousel-vert4">
				<ul>
				<?php
				$habercek	=mysql_query("select * from haberler order by hid desc");
					while($habgel=mysql_fetch_array($habercek)){
					$habertarih	=$habgel["haber_tarih"];
					$haberbaslik=$habgel["haber_baslik"];
					$haberresim	=$habgel["haber_resim"];
					$habid		=$habgel["hid"];
					
				?>
					<li>
						<article class="recent-blog">
							<section class="date">
								<span class="day"><?=tarih1($habertarih);?></span>
								<span class="month"><?=tarih2($habertarih);?></span>
							</section>
							<figure>
								<a href="haberoku-<?=$habid;?>.html"><img src="resimkirp.php?w=150&h=100&src=<?=$haberresim;?>" alt="" /></a>
							</figure>
							<h3><a href="haberoku-<?=$habid;?>.html"><?=substr($haberbaslik,0,80)."...";?></a></h3>
						</article>
					</li>
				<?php } ?>
				</ul>
			</div>
			<a class="read-more" href="bilgiler.html">Tüm bilgileri oku</a>
			<a href="javascript:void(0)" class="next2"><i class="icon-chevron-down"></i></a>
			<a href="javascript:void(0)" class="prev2"><i class="icon-chevron-up"></i></a>
		</div> <!-- END #recent-news -->
	
		<!-- Testimonials ______________________________________-->
		<div id="testimonials">
			<h2>Sağlık Hakkında Pratik Bilgiler</h2>
	
			<div id="quotes">
			<?php 
				$refcek	=mysql_query("select * from referanslar");
					while($refyaz=mysql_fetch_array($refcek)){
					$reffirma	=$refyaz["ref_firma"];
					$reficerik	=$refyaz["ref_icerik"];
					$refresim	=$refyaz["ref_resim"];
			?>
				<div class="quote">

					<blockquote>
						<p>“<?=$reficerik;?>”</p>
					</blockquote>
					<footer>
						<img src="<?=$refresim;?>" alt="Firma" />
						<small class="author"><?=$reffirma;?></small>
					</footer>
			
				</div>
			<?php
			}
			?>
			</div>
		
			<div id="quotes-nav">
				<a href="javascript:void(0)" class="next2"><i class="icon-chevron-right"></i></a>
				<a href="javascript:void(0)" class="prev2"><i class="icon-chevron-left"></i></a>
			</div>
		</div> <!-- END #testimonials -->
	

</div>
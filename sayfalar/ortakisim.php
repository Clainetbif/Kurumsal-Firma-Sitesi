<?php
//Kurumsal site
//Kodlayan Keykubad
	$duyurucek		=mysql_fetch_array(mysql_query("select * from duyurular order by id desc"));
	$duyurubaslik 	=$duyurucek["duyuru_baslik"];
	$duyurukisa		=$duyurucek["duyuru_kisa"];
	$duyid			=$duyurucek["id"];
?>
<!-- Slogan text ______________________________________-->
	<div id="slogan">
		<div class="wrapper">
			<h2><?=$duyurubaslik;?></h2>
			<p><?=substr($duyurukisa,0,400);?></p>
			<p><a href="duyurular.html" class="small">Tüm duyuruları görmek için</a></p>
			<div class="clear"></div>
		</div> <!-- END .wrapper -->
	</div> <!-- END #slogan -->

	<div class="wrapper">
		<!-- Latest Projects ______________________________________-->
		<div id="latest-projects">
			<h2>Galeri <span class="small grey"> &nbsp;/&nbsp; <a href="galeri.html">Tümü</a></span></h2>
			<div class="carousel4">
			
				<ul>
					<?php
					$galericek		=mysql_query("select * from galeri");
						while($galcek=mysql_fetch_array($galericek)){
						$galresim	=$galcek["galeri_resim"];
						$galkisa	=$galcek["galeri_kicerik"];
						$galbaslik	=$galcek["galeri_baslik"];
					?>
					<li>
						<a class="popup" href="<?php echo $galresim;?>"><img src="resimkirp.php?w=264&h=160&src=<?php echo $galresim;?>" alt="Two Hearts" /></a>
						<h3><?php echo $galbaslik;?></h3>
						<p><?php echo substr($galkisa,0,50);?></p>
					</li>
					<?php } ?>
				</ul>
			</div>
			<a href="javascript:void(0)" class="prev1"><i class="icon-chevron-left"></i></a>
			<a href="javascript:void(0)" class="next1"><i class="icon-chevron-right"></i></a>
		</div> </div><!-- END #latest-projects -->
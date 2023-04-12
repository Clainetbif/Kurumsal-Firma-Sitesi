	<div class="wrapper">
	<div id="slider">
<div id="slides">
<?php
	#Kurumsal Firma Sitesi
	#Kodlama : Keykubad
$ustcek	=mysql_query("select * from slider");
	while($don			= mysql_fetch_array($ustcek)){
	$slideback			= $don["slider_back"];
	$slideresim			= $don["slider_resim"];
	$slidebaslik		= $don["slider_baslik"];
	$slideufak			= $don["slider_ufak"];
	$slidelink			= $don["slider_link"];
	$slidelbaslik		= $don["slider_lbaslik"];
	$slidealtaciklama	= $don["slider_altaciklama"];
?>

		<!-- Slider banner ______________________________________-->
		
			
			<div class="slide">
				
					<?php if($slideresim==""){}else { echo '<img class="slide-image" src="resimkirp.php?h=450&src='.$slideresim.'" alt="" />';}?>
				<?php if($slideback==""){}else { echo '<img class="slide-back" src="resimkirp.php?h=450&src='.$slideback.'" alt="" />';} ?>
					<div class="slide-text">
						<p><?php echo $slideufak;?></p>
						<p class="extrabig superbold"><?php echo $slidebaslik;?></p>
						<p><strong><?php echo $slidealtaciklama;?></strong></p>
						<p class="inline"><a href="<?php echo $slidelink;?>" class="button"><?php echo $slidelbaslik;?></a></p>
					</div>
				</div>
		
					
			
			<?php
			}
			?>
			
	
			</div>
						<a href="javascript:void(0)" class="prev1"><i class="icon-chevron-left"></i></a>
			<a href="javascript:void(0)" class="next1"><i class="icon-chevron-right"></i></a>
		</div> <!-- END #slider -->
	
		<!-- Features - 6 icons ______________________________________-->
		<div id="features">
			<hr />
			<?php 
			$tanitim	= mysql_query("select * from ufak_tanitim order by id desc LIMIT 0,6");
				while($dontan=mysql_fetch_array($tanitim)){
				$tanbaslik	=$dontan["tanit_baslik"];
				$tanyazi	=$dontan["tanit_yazi"];
				$tanikon	=$dontan["tanit_ikon"];
			?>
			<div class="feature">
				<span class="circle"><i class="<?=$tanikon;?>"></i></span>
				<h3><?=$tanbaslik;?></h3>
				<p><?=$tanyazi;?></p>
			</div>
			<?php
			}
			?>
			<div class="clear"></div>
		</div> <!-- END #features -->
	</div> <!-- END .wrapper -->